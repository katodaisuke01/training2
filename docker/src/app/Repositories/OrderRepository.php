<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderSearch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    public function search(OrderSearch $search)
    {
        dd($search);
    }
}