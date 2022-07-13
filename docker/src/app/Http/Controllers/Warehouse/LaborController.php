<?php

namespace App\Http\Controllers\Warehouse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wuser;
use App\Http\Requests\StoreWuserCreate;
use App\Http\Requests\EditWuserUpdate;
use Illuminate\Support\Facades\Hash;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;

class LaborController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Wuser::where('m_business_id', $user->m_business_id)
            ->orderBy('created_at', 'desc')
            ->keywordSearch($request->get('keyword'));

        return view('warehouse/labor/index', [
            'labors' => $query->get(),
        ]);
    }

    public function create()
    {
        return view('warehouse/labor/create');
    }

    public function store(StoreWuserCreate $request)
    {
        $params = $request;
        $user = Auth::user();

        $params['password'] = Hash::make($request->input('password'));

        if ($params['dealing_type'] == Wuser::TYPE_NORMAL) {
            $params['dealing_type'] = 'NORMAL';
        } else {
            $params['dealing_type'] = 'MANAGER';
        }

        try {
            // バケットの`wusers`フォルダへアップロード
            Wuser::create([
                'last_name' => $params['last_name'],
                'first_name' => $params['first_name'],
                'last_name_kana' => $params['last_name_kana'],
                'first_name_kana' => $params['first_name_kana'],
                'service_id' => $params['service_id'],
                'm_business_id' => $user['m_business_id'],
                'email' => $params['email'],
                'password' => $params['password'],
                'type' => $params['dealing_type'],
                'image_path' => isset($params['image']) ? Storage::disk('s3')->putFile('wusers', $params['image']) : null,
            ]);

            return redirect(route('warehouse.labor.index'))->with('flash_message', '登録が完了しました。');

        } catch (\Exception $e) {
            return back()->withInput()->with('flash_message', '登録に失敗しました。');
        }
    }

    public function detail()
    {
        return view('warehouse/labor/detail');
    }

    public function edit(Request $request)
    {
        $labor = Wuser::find($request->get('labor'));

        return view('warehouse/labor/edit', [
            'labor' => $labor,
        ]);
    }

    public function update(EditWuserUpdate $request)
    {
        $params = $request->all();
        unset($params['_token']);

        if (isset($params['image'])) {
            // バケットの`wusers`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('wusers', $params['image']);
            $params['image_path'] = $path;
        }

        $labor = Wuser::find($request->get('labor'));

        $labor->fill($params)->save();

        return redirect()->to(route('warehouse.labor.index'))->with('flash_message', '更新が完了しました。');
    }

    public function pwEdit()
    {
        return view('warehouse/labor/pwEdit');
    }

    public function pwEditStore(StoreWuserCreate $request)
    {
        $w_user = Wuser::find($request->get('labor'));
        $password = Hash::make($request->input('password'));
        $w_user->fill(['password' => $password])->save();

        return redirect()->to(route('warehouse.labor.edit', ['labor' => $request->get('labor')]))
            ->with('flash_message', 'パスワードを変更しました。');
    }

    public function destroy(Request $request)
    {
        $labor = Wuser::find($request->get('id'));

        $labor->fill(['deleted_at' => \Carbon::now()->format('Y-m-d H:i:s')])->save();

        return redirect()->to(route('warehouse.labor.index'))->with('flash_message', '更新が完了しました。');
    }
}
