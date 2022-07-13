<?php

namespace App\Console\Commands;

use App\Models\OrderStock;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldOrderStockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeleteOldOrderStock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '24時間以上経過した在庫を削除する';

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
        return OrderStock::where('created_at', '<=', Carbon::now()->subDay())
            ->delete();
    }
}
