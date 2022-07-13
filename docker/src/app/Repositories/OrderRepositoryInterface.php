<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

interface OrderRepositoryInterface
{
    public function search(Request $request);
}