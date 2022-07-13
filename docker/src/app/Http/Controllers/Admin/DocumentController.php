<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderInvoice;
use App\Mail\OrderSupply;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderBusinessGroup;
use Carbon\Carbon;
use DB;
use App\Services\MailAttachmentService;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * @var MailAttachmentService
     */
    private $mailAttachmentService;

    public function __construct(MailAttachmentService $mailAttachmentService)
    {
        $this->mailAttachmentService = $mailAttachmentService;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $order_business_groups = OrderBusinessGroup::query()
            ->where('industry_group_id', $user->industry_group_id)
            ->where('total_quantity', '>', 0);

        $day = new Carbon('today');
        $today = $day->format('Y/m/d');
        $start_line = $day->format('Y-m-d H:i:s');
        $end_line = $day->addDay()->subSecond()->format('Y-m-d H:i:s');

        $select_date_start = \Carbon::parse($request->get('select_date_start'))->format('Y-m-d H:i:s');
        $select_date_end = \Carbon::parse($request->get('select_date_end'))->format('Y-m-d H:i:s');
        // 日付ソート
        if (!empty($request->get('select_date_start')) &&
            !empty($request->get('select_date_end'))
        ) {
            $order_business_groups->whereBetween('created_at', [$select_date_start, $select_date_end]);
        } elseif (!empty($request->get('select_date_start'))) {
            $order_business_groups->where('created_at', '>=', $select_date_start);
        } elseif (!empty($request->get('select_date_end'))) {
            $order_business_groups->where('created_at', '<=', $select_date_end);
        } else {
            $order_business_groups->whereBetween('created_at', [$start_line, $end_line]);
        }

        return view('market/management/document/index', [
            'today' => $today,
            'order_business_groups' => $order_business_groups
                ->sortByDates($request->get('sort_created_at'), $request->get('sort_shipping_date'))
                ->get(),
            'total_orders' => $order_business_groups->count(),
        ]);
    }

    public function invoice(Request $request)
    {
        $user = Auth::user();
        // 注文詳細データ
        $orders = Order::select('*')->selectRaw('sum(orders.weight) as total_weight')->whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })
            ->where('orders.order_business_group_id', $request->get('businessGroup'))
            ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->leftJoin('packages', 'packages.id', '=', 'orders.package_id');

        $industry = data_get((clone $orders)->first(), 'order_product.industry_group');

        $packages = (clone $orders)->groupBy('package_id')->get();
        return view('market/management/document/invoice', [
            'orders' => $orders->selectRaw('count(*) as product_count')->groupBy('orders.order_product_id')->get(),
            'industry' => $industry,
            'packages' => $packages,
            'business_group' => OrderBusinessGroup::find($request->get('businessGroup'))
        ]);
    }

    public function document(Request $request)
    {
        $user = Auth::user();
        $business_group = OrderBusinessGroup::where('industry_group_id', $user->industry_group_id)
            ->find($request->get('businessGroup'));
        $orders = Order::select('*')->selectRaw('sum(orders.weight) as total_weight')->whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })
            ->where('orders.m_business_id', $business_group->m_business_id)
            ->where('orders.shipping_status', '>=', 2)
            ->where('orders.shipping_date', $business_group->shipping_date);
        $industry = data_get((clone $orders)->first(), 'order_product.industry_group');

        $total_price = (clone $orders)
            ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->sum('order_products.price');

        return view('market/management/order/document', [
            'business_group' => $business_group,
            'orders' => $orders->selectRaw('count(*) as product_count')->groupBy('orders.order_product_id')->get(),
            'industry' => $industry,
            'total_price' => $total_price,
            'packages' => $orders->groupBy('package_id')->select('package_id')->distinct()->get(),
        ]);
    }

    public function sendMail(Request $request)
    {
        $user = Auth::user();
        $business_group = OrderBusinessGroup::where('industry_group_id', $user->industry_group_id)
            ->find($request->get('businessGroup'));

        if (data_get($business_group, 'm_business.email')) {
            \Mail::send(new OrderInvoice([
                'to' => data_get($business_group, 'm_business.email'),
                'business_name' => data_get($business_group, 'm_business.name'),
                'link' => route('output.invoice.index', ['business' => $business_group->id,'industryGroupId' => $user->industry_group_id]),
                'industry_name' => '株式会社リブル',
                'from' => (config('mail.from.address')),
                'subject' => '【' . Carbon::parse(data_get($business_group, 'created_at'))->format("Y年m月d日") . '発注分】ご請求書'
            ]));

            return redirect()->to(route('admin.document.invoice', [
                'businessGroup' => $business_group->id
            ]))->with('flash_message', 'メールを送信しました。');
        } else {
            return redirect()->to(route('admin.document.invoice', [
                'businessGroup' => $business_group->id
            ]))->with('flash_message', 'メールを送信に失敗しました。');
        }
    }

    public function sendSupplyMail(Request $request)
    {
        $user = Auth::user();
        $business_group = OrderBusinessGroup::where('industry_group_id', $user->industry_group_id)
            ->find($request->get('businessGroup'));

        if (data_get($business_group, 'm_business.email')) {
            \Mail::send(new OrderSupply([
                'to' => data_get($business_group, 'm_business.email'),
                'business_name' => data_get($business_group, 'm_business.name'),
                'link' => route('output.supply.index', ['business' => $business_group->id,'industryGroupId' => $user->industry_group_id]),
                'industry_name' => '株式会社リブル',
                'from' => (config('mail.from.address')),
                'subject' => '【' . Carbon::parse(data_get($business_group, 'created_at'))->format("Y年m月d日") . '発注分】納品書'
            ]));

            return redirect()->to(route('admin.document.document', [
                'businessGroup' => $business_group->id
            ]))->with('flash_message', 'メールを送信しました。');
        } else {
            return redirect()->to(route('admin.document.document', [
                'businessGroup' => $business_group->id
            ]))->with('flash_message', 'メールを送信に失敗しました。');
        }
    }

    public function download($business)
    {
        $user = Auth::user();
        // タイムアウト対策
        ini_set('max_execution_time', '-1');

        $orders = Order::whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })
            ->where('order_business_group_id', $business);

        $business_group = OrderBusinessGroup::where('industry_group_id', $user->industry_group_id)
            ->find($business);

        $industry = data_get((clone $orders)->first(), 'order_product.industry_group');
        $packages = (clone $orders)->groupBy('package_id')->get();
        if (str_contains(url()->previous(), 'invoice')) {
            $total_price = (clone $orders)->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')->sum('order_products.price');
            $pdf = \PDF::loadView('market/management/document/generatePdf', [
                'orders' => $orders->select('*')->selectRaw('count(*) as product_count')->selectRaw('sum(orders.weight) as total_weight')->groupBy('order_product_id')->get(),
                'business_group' => $business_group,
                'industry' => $industry,
                'total_price' => $total_price,
                'packages' => $packages
            ]);
            return $pdf->download('販売代金請求書.pdf');
        } else {
            $orders = Order::select('*')->selectRaw('sum(orders.weight) as total_weight')->whereHas('order_product', function ($query) use ($user) {
                $query->where('industry_group_id', $user->industry_group_id);
            })
                ->where('orders.m_business_id', $business_group->m_business_id)
                ->where('orders.shipping_status', '>=', 2)
                ->where('orders.shipping_date', $business_group->shipping_date);
            $total_price = (clone $orders)->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')->sum('order_products.price');
            $pdf = \PDF::loadView('market/management/document/generateSupplyPdf', [
                'business_group' => $business_group,
                'orders' => $orders->selectRaw('count(*) as product_count')->groupBy('orders.order_product_id')->get(),
                'packages' => $orders->groupBy('package_id')->select('package_id')->distinct()->get(),
                'total_price' => $total_price,
            ]);
            return $pdf->download('納品書.pdf');
        }
    }
}
