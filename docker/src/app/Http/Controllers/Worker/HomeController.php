<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\MBusiness;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:worker');
    }

    public function index()
    {
        //Wuser
        $user = Auth::user();

        $m_business = MBusiness::with(['packages' => function ($query) use ($user) {
            $query->where('m_business_id', $user->m_business_id)
                ->with(['orders' => function ($query) {
                    $query->whereDate('shipping_date', Carbon::today());
                }])
                ->withCount(['orders' => function ($query) {
                    $query->whereDate('shipping_date', Carbon::today());
                }]);
        }])->first();

        return view('worker/home', ['user' => $user, 'm_business' => $m_business]);
    }

}
