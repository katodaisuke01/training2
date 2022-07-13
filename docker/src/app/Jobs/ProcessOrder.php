<?php

namespace App\Jobs;

use App\Http\Requests\StoreCatalogOrderCreate;
use App\Models\Client;
use App\Models\DeliveryUser;
use App\Models\IndustryGroup;
use App\Models\MBusiness;
use App\Models\OrderGroup;
use App\Models\OrderBusinessGroup;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderStock;
use App\Models\User;
use App\Models\Job;
use Carbon\Carbon;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ProcessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * 注文インスタンス
     *
     */
    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StoreCatalogOrderCreate $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = Auth::user();
        $products = session('products');
        $params = $this->request->all();
        $code = [];
        $sum_quantity = 0;
        $industry_group = [];
        // ログ出力用の配列
        $order_product_id_list = [];
        foreach ($products['order'] as $key => $loop) {
            $product = OrderProduct::find($key);
            $code[$key] = Order::generateCode();
            if (isset($loop['quantity'])) {
                $quantity = $loop['quantity'];
                array_push($order_product_id_list,"ID：" . $key . ',数量：' . $quantity);
            } elseif (isset($loop['weight'])) {
                $quantity = floor($loop['weight'] / data_get($product, 'base_weight'));
                array_push($order_product_id_list,"ID：" . $key . ',数量：' . $quantity);
            } else {
                continue;
            }
            $sum_quantity += $quantity;
            if(!in_array($loop['industry_group_id'],$industry_group)){
                $industry_group[$loop['industry_group_id']] = [];
            }
        }

        foreach($industry_group as $key => $value){
            $divied_quantity = 0;
            foreach($products['order'] as $order){
                $product = OrderProduct::find($key);
                if($key == $order['industry_group_id']){
                    if(isset($order['quantity'])){
                        $divied_quantity += $order['quantity'];
                    }elseif(isset($order['weight'])){
                        $divied_quantity += floor($order['weight'] / data_get($product, 'base_weight'));
                    }else{
                        continue;
                    }
                    $industry_group[$key]['divied_quantity'] = $divied_quantity;
                    $industry_group[$key]['orders'][] = $order;
                }
            }
        }
        // 既に「同顧客」且つ「同じ日付」の発注履歴が存在する場合
        $today = new Carbon('today');
        $start_line = $today->format('Y-m-d H:i:s');
        $end_line = $today->addDay()->subSecond()->format('Y-m-d H:i:s');

        $client_id = $params['client_id'];
        // グルーピング用
        if ($client_id == 'new_client') {
            $new_client = Client::create([
                'name' => $params['client_name'],
                'tel' => $params['tel'],
                'email' => $params['email'],
                'zip_code' => $params['zipcode'],
                'prefecture_name' => $params['prefecture_name'],
                'address1' => $params['address1'],
                'address2' => $params['address2'],
                'address3' => $params['address3'],
            ]);
            $client_name = $new_client->name;
            $client_id = $new_client->id;
        } else {
            $client_name = Client::find($params['client_id'])->name;
        }
        $addition = Order::where('client_id', $client_id)
            ->where('m_business_id', $user->m_business_id)
            ->where('shipping_date', $params['shipping_date'])
            ->whereBetween("created_at", [$start_line, $end_line])
            ->first();

        $business_name = MBusiness::find($user->m_business_id)->name;
        $group_name = Carbon::parse($params['shipping_date'])->format('Ymd') . '_' . $client_name . '_' . $business_name . '_' . Carbon::now()->format('Ymd');
        $business_group_name = Carbon::parse($params['shipping_date'])->format('Ymd') . '_' . $business_name . '_' . Carbon::now()->format('Ymd');

        DB::beginTransaction();

        try {
            if ($addition == null) {
                $order_group = OrderGroup::create([
                    'group_name' => $group_name,
                    'm_business_id' => $user->m_business_id,
                    'client_id' => $client_id,
                    'delivery_partnar_id' => $params['delivery_partnar'],
                    'shipping_date' => $params['shipping_date'],
                    'total_quantity' => $client_id == 'new_client' ? $params['quantity'] : $sum_quantity,
                ]);
            } else {
                // 顧客グループの合計注文数を更新
                $order_group = OrderGroup::where('group_name', $group_name)->first();
                $total_quantity = $order_group->total_quantity + $sum_quantity;
                $order_group->fill(['total_quantity' => $total_quantity])->save();
            }
            foreach($industry_group as $_key => $divied_order){
                $business_group_name = Carbon::parse($params['shipping_date'])->format('Ymd') . '_' . $business_name . '_' . IndustryGroup::find($_key)->name . '_' . Carbon::now()->format('Ymd');
                $business_addition = OrderBusinessGroup::where('m_business_id', $user->m_business_id)
                ->where('shipping_date', $params['shipping_date'])
                ->where('industry_group_id',$_key)
                ->whereBetween("created_at", [$start_line, $end_line])
                ->first();

                if ($business_addition == null) {
                    $order_business_group = OrderBusinessGroup::create([
                        'group_name' => $business_group_name,
                        'm_business_id' => $user->m_business_id,
                        'delivery_partnar_id' => $params['delivery_partnar'],
                        'shipping_date' => $params['shipping_date'],
                        'total_quantity' => $divied_order['divied_quantity'],
                        'shipping_schedule_time' => User::DEFAULT_SHIPPING_SCHEDULE_TIME,
                        'industry_group_id' => $_key
                    ]);


                    // orderを作るforeach
                    foreach($divied_order['orders'] as $product){
                        // 注文数の数だけレコード作成
                        $p = OrderProduct::find($product['id']);
                            if (isset($product['quantity'])) {
                                $repetition = $product['quantity'];
                            } elseif (isset($product['weight'])) {
                                $repetition = floor($product['weight'] / data_get($p, 'base_weight'));
                            } else {
                                continue;
                            }
                        $target_product = OrderProduct::find($product['id']);
                        $limit_price = $this->request->get('limit_price' . $product['id']) ? $this->request->get('limit_price' . $product['id']) : null;
                        
                        for($i = 0; $i < $repetition; $i++) {
                            $order_stock = OrderStock::where('order_product_id', $product['id'])
                            ->where('status', OrderStock::STATUS_TYPE_EXSIST)
                            ->orderBy('id', 'asc')
                            ->first();
                            $latest_order = Order::create([
                                'm_business_id' => \Auth::user()->m_business_id,
                                'order_product_id' => $product['id'],
                                'client_id' => $client_id,
                                'delivery_partnar_id' => $params['delivery_partnar'],
                                'quantity' => $repetition,
                                'shipping_date' => $params['shipping_date'],
                                'simultaneous_order_code' => $code[$product['id']],
                                'page_number' => $i + 1,
                                'order_group_id' => $order_group->id,
                                'order_business_group_id' => $order_business_group->id,
                                'shipping_status' => 0,
                                'landing_configuration_date' => \Carbon\Carbon::parse($params['shipping_date'])->subDays(data_get($target_product, 'landing_configuration', 0))->format('Y-m-d'),
                                'purification_configuration_date' => \Carbon\Carbon::parse($params['shipping_date'])->subDays(data_get($target_product, 'purification_configuration', 0))->format('Y-m-d'),
                                'limit_price' => $limit_price,
                                'approval_flg' => $limit_price == null ? 1 : 0,
                                'image_path' => data_get($order_stock, 'image_path') ? data_get($order_stock, 'image_path') : null,
                                'weight' => data_get($order_stock, 'weight') ? data_get($order_stock, 'weight') : null,
                                'order_stock_id' => data_get($order_stock, 'id') ? data_get($order_stock, 'id') : null,
                            ]);
                            $latest_order_id = $latest_order->id;

                            if ($order_stock) {
                            $order_stock->status = OrderStock::STATUS_TYPE_NON;
                            $order_stock->order_id = $latest_order_id;
                            $order_stock->update();
                            }
                        }
                    }
                    // orderを作るforeach ここまで



                } else {
                    // 事業者グループの合計注文数を更新
                    $order_business_group = OrderBusinessGroup::where('group_name', $business_group_name)->first();
                    $business_total_quantity = $order_business_group->total_quantity + $divied_order['divied_quantity'];
                    $order_business_group->fill(['total_quantity' => $business_total_quantity])->save();

                    // orderを作るforeach
                    foreach($divied_order['orders'] as $product){
                        // 注文数の数だけレコード作成
                        $p = OrderProduct::find($product['id']);
                            if (isset($product['quantity'])) {
                                $repetition = $product['quantity'];
                            } elseif (isset($product['weight'])) {
                                $repetition = floor($product['weight'] / data_get($p, 'base_weight'));
                            } else {
                                continue;
                            }
                        $target_product = OrderProduct::find($product['id']);
                        $limit_price = $this->request->get('limit_price' . $product['id']) ? $this->request->get('limit_price' . $product['id']) : null;
                        
                        for($i = 0; $i < $repetition; $i++) {
                            $order_stock = OrderStock::where('order_product_id', $product['id'])
                            ->where('status', OrderStock::STATUS_TYPE_EXSIST)
                            ->orderBy('id', 'asc')
                            ->first();
                            $latest_order = Order::create([
                                'm_business_id' => \Auth::user()->m_business_id,
                                'order_product_id' => $product['id'],
                                'client_id' => $client_id,
                                'delivery_partnar_id' => $params['delivery_partnar'],
                                'quantity' => $repetition,
                                'shipping_date' => $params['shipping_date'],
                                'simultaneous_order_code' => $code[$product['id']],
                                'page_number' => $i + 1,
                                'order_group_id' => $order_group->id,
                                'order_business_group_id' => $order_business_group->id,
                                'shipping_status' => 0,
                                'landing_configuration_date' => \Carbon\Carbon::parse($params['shipping_date'])->subDays(data_get($target_product, 'landing_configuration', 0))->format('Y-m-d'),
                                'purification_configuration_date' => \Carbon\Carbon::parse($params['shipping_date'])->subDays(data_get($target_product, 'purification_configuration', 0))->format('Y-m-d'),
                                'limit_price' => $limit_price,
                                'approval_flg' => $limit_price == null ? 1 : 0,
                                'image_path' => data_get($order_stock, 'image_path') ? data_get($order_stock, 'image_path') : null,
                                'weight' => data_get($order_stock, 'weight') ? data_get($order_stock, 'weight') : null,
                                'order_stock_id' => data_get($order_stock, 'id') ? data_get($order_stock, 'id') : null,
                            ]);
                            $latest_order_id = $latest_order->id;

                            if ($order_stock) {
                            $order_stock->status = OrderStock::STATUS_TYPE_NON;
                            $order_stock->order_id = $latest_order_id;
                            $order_stock->update();
                            }
                        }
                    }
                    // orderを作るforeach ここまで
                }
            }

            DB::commit();

            // 産地管理者にお知らせメール送信
            $industry_group = IndustryGroup::find(1);
            $target = $industry_group->AdminEmailAddress;
            // ソラシドエア管理者にお知らせメール送信
            $s_target = DeliveryUser::select('email')
                ->where('delivery_partner_id', 1)
                ->select('email')
                ->where('type', 'MANAGER')
                ->pluck('email');

            foreach ($target as $val) {
                \Mail::send(new \App\Mail\NoticeOrder([
                    'to' => $val,
                    'business_name' => $user->BusinessName,
                    'from' => (config('mail.from.address')),
                    'subject' => ('【' . env('APP_NAME', '産地管理システム') . '】' . __('発注がありました。'))
                ]));
            }
            foreach ($s_target as $val) {
                \Mail::send(new \App\Mail\NoticeDeliveryOrder([
                    'to' => $val,
                    'business_name' => $user->BusinessName,
                    'from' => (config('mail.from.address')),
                    'subject' => ('【' . env('APP_NAME', '物流管理システム') . '】' . __('発注がありました。'))
                ]));
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::info('次のユーザーIDの方からの注文が正常に完了しませんでした。ユーザーID：' . $user->id . ",注文商品【" . implode(",",$order_product_id_list) . "】,クライアント：" . $client_name);
        }


    }
}
