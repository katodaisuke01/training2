<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartner;
use App\Http\Requests\UpdatePartner;
use App\Models\Client;
use App\Models\IndustryGroup;
use App\Models\MBusiness;
use App\Models\Partner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class DocumentController extends Controller
{
    public function index()
    {
        return view('solaseed/document/index');
    }

    public function invoice()
    {
        return view('solaseed/document/invoice');
    }
}
