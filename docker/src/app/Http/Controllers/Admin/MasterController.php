<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MCategory;
use App\Models\MFishCategory;
use App\Models\MProcess;

class MasterController extends Controller
{
    public function index()
    {
        $m_categories = MCategory::all();
        return view('market/management/master/index', [
            'm_categories' => $m_categories,
        ]);
    }

    public function getMCategories()
    {
        return MCategory::all();
    }

    public function getMFishCategories()
    {
        return MFishCategory::all();
    }

    public function getMProcesses()
    {
        return MProcess::all();
    }

    public function addMCategory(Request $request)
    {
        MCategory::create([
            'name' => $request['name'],
        ]);
    }

    public function addMFishCategory(Request $request)
    {
        MFishCategory::create([
            'name' => $request['name'],
            'm_category_id' => $request['m_category_id'],
        ]);
    }

    public function addMProcess(Request $request)
    {
        MProcess::create([
            'name' => $request['name'],
        ]);
    }

    public function editMCategory(Request $request)
    {
        $data = $request->all();
        $client = MCategory::find($data['id']);
        $client->fill($data)->save();
    }

    public function editMFishCategory(Request $request)
    {
        $data = $request->all();
        $client = MFishCategory::find($data['id']);
        $client->fill($data)->save();
    }

    public function editMProcess(Request $request)
    {
        $data = $request->all();
        $client = MProcess::find($data['id']);
        $client->fill($data)->save();
    }

    public function deleteMCategory(Request $request)
    {
        if (MFishCategory::where('m_category_id', $request->get('id'))->first()) {
            return 'ng';
        } else {
            $client = MCategory::find($request->get('id'));
            return $client->delete();
        }
    }

    public function deleteMFishCategory(Request $request)
    {
        $client = MFishCategory::find($request->get('id'));
        $client->delete();
    }

    public function deleteMProcess(Request $request)
    {
        $data = $request->all();
        $client = MProcess::find($request->get('id'));
        $client->delete();
    }
}
