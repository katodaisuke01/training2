<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderBusinessGroup;
use App\Mail\ShippingComplete;
use Mail;

class UpdateShippingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:UpdateShippingStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Status Shipping Data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("=========================== START Update Status Shipping Data ===========================");
        $this->info("\n\n");

        $today = new Carbon('now');
        $date = $today->format('Y-m-d');
        $time = $today->format('H:i');
        $target_groups = OrderBusinessGroup::query()
            ->where(function ($query) use ($date, $time) {
                $query->where('shipping_schedule_time', $time)
                    ->where('shipping_date', $date);
            })
            ->get();
        $target_orders = Order::query()
            ->select(['orders.id', 'orders.shipping_status'])
            ->join('order_business_groups as business', function ($join) use ($time) {
                $join->on('business.id', '=', 'orders.order_business_group_id')
                    ->where('business.shipping_schedule_time', $time);
            })
            ->where(function ($query) use ($date) {
                $query->where('business.shipping_date', $date);
            })
            ->get();
        if ($target_orders) {
            foreach ($target_orders as $target) {
                $target->shipping_status = Order::TYPE_COMPLETE;
                $target->update();
            }
            foreach ($target_groups as $group) {
                $group->shipping_status = OrderBusinessGroup::TYPE_COMPLETE;
                $group->update();

                // メール配信
                Mail::to(data_get($group, 'm_business.email'))->send(new ShippingComplete($group, $date));
                Mail::send(new \App\Mail\OrderSupply([
                    'to' => data_get($group, 'm_business.email'),
                    'business_name' => data_get($group, 'm_business.name'),
                    'link' => route('output.supply.index', ['business' => $group->id]),
                    'industry_name' => '株式会社リブル',
                    'from' => (config('mail.from.address')),
                    'subject' => '【' . Carbon::parse(data_get($group, 'created_at'))->format("Y年m月d日") . '発注分】納品書'
                ]));
            }
        }

        echo PHP_EOL;

        $this->info("\n\n");
        $this->info("=========================== END Update Status Shipping Data ===========================");
    }
}
