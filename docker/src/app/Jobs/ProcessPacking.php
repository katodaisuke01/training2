<?php

namespace App\Jobs;

use App\Mail\PackingComplete;
use App\Models\DeliveryUser;
use App\Models\Order;
use App\Models\Package;
use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use DB;
use Mail;

class ProcessPacking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;
    protected $package;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request, Package $package)
    {
        $this->request = $request;
        $this->package = $package;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            // 箱の紐付け処理
            
            foreach ($this->request->get('sort') as $k => $v) {
                $order = Order::find($k);
                $order->shipping_status = Order::TYPE_PROCESS_DONE;
                $order->package_id = $this->package->id;
                $order->update();
            }
            // 箱ステータス変更
            $this->package->pack_status = Package::TYPE_CONFIRMED;
            $this->package->m_business_id = $this->request->get('m_business_id');
            $this->package->shipping_date = date('Y-m-d');
            // 現状配送業者がソラシドエアのみなのでいったん1を入れる
            $this->package->delivery_partnar_id = 1;
            $this->package->update();

            // 箱詰め完了通知を送る(POC)
            $target_users = DeliveryUser::where('delivery_partner_id', 1)->where('type', 'manager')->get();

            foreach ($target_users as $target):
                if ($target->email):
                    Mail::send(new PackingComplete([
                        'to' => $target->email,
                        'industry_name' => data_get(\Auth::user(), 'industry_group.name'),
                        'link' => route('itemList', ['package' => $this->package->id]),
                        'delivery_name' => '株式会社ソラシドエア（Solaseed Air Inc.）',
                        'from' => (config('mail.from.address')),
                        'subject' => '【' . date('Y/m/d') . '集荷】１個口準備完了'
                    ]));
                endif;
            endforeach;
        } catch (\Exception $e) {
            DB::rollback();
            $order_id_array = [];
            foreach ($this->request->get('sort') as $k => $v) {
                array_push($order_id_array,$k);
            }
            Log::info("【" . data_get(\Auth::user(), 'industry_group.name') . "：梱包作業】" .  "次の商品の紐づけに失敗しました。箱ID" . $this->package->id . ",商品ID" . implode(",",$order_id_array));
            return false;
        }
        DB::commit();
    }
}
