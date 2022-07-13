<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserCreate;
use App\Http\Requests\EditUserUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Storage;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $staffs = User::where('industry_group_id', $user->industry_group_id)
            ->orderBy('created_at', 'desc')
            ->keywordSearch($request->get('keyword'))
            ->get();

        return view('market/management/staff/index', [
            'staffs' => $staffs,
        ]);
    }

    public function create()
    {
        return view('market/management/staff/staffCreate');
    }

    public function store(StoreUserCreate $request)
    {
        $params = $request;

        $params['password'] = Hash::make($request->input('password'));

        if ($params['dealing_type'] == User::TYPE_NORMAL) {
            $params['dealing_type'] = 'NORMAL';
        } else {
            $params['dealing_type'] = 'MANAGER';
        }

        try {
            User::create([
                'last_name' => $params['last_name'],
                'first_name' => $params['first_name'],
                'last_name_kana' => $params['last_name_kana'],
                'first_name_kana' => $params['first_name_kana'],
                'service_id' => $params['service_id'],
                'email' => $params['email'],
                'password' => $params['password'],
                'type' => $params['dealing_type'],
                'image_path' => isset($params['image']) ? Storage::disk('s3')->putFile('users', $params['image']) : null,
                'industry_group_id' => \Auth::user()->industry_group_id,
            ]);

            return redirect(route('admin.staff.index'))->with('flash_message', '登録が完了しました。');
        } catch (\Exception $e) {
            return back()->withInput()->with('flash_message', '登録に失敗しました。');
        }
    }

    public function edit(Request $request, User $staff)
    {
        return view('market/management/staff/staffEdit', [
            'staff' => $staff,
        ]);
    }

    public function update(EditUserUpdate $request, User $staff)
    {
        $params = $request->all();
        unset($params['_token']);
        DB::beginTransaction();
        try {
            if (isset($params['image'])) {
                // バケットの`users`フォルダへアップロード
                $path = Storage::disk('s3')->putFile('users', $params['image']);
                $params['image_path'] = $path;
            }

            $staff->fill($params)->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('flash_message', '更新に失敗しました。');
        }
        DB::commit();

        return redirect()->to(route('admin.staff.index'))
            ->with('flash_message', '更新が完了しました。');
    }

    public function pwEdit()
    {
        return view('market/management/staff/pwEdit');
    }

    public function pwEditStore(StoreUserCreate $request, User $staff)
    {
        $password = Hash::make($request->input('password'));
        DB::beginTransaction();
        try {
            $staff->fill(['password' => $password])->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('flash_message', '更新に失敗しました。');
        }
        DB::commit();

        return redirect()->to(route('admin.staff.index'))
            ->with('flash_message', 'パスワードを変更しました。');
    }

    public function destroy(Request $request, User $staff)
    {
        DB::beginTransaction();
        try {
            $staff->fill(['deleted_at' => \Carbon::now()->format('Y-m-d H:i:s')])->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('flash_message', '更新に失敗しました。');
        }
        DB::commit();

        return redirect()->to(route('admin.staff.index'))
            ->with('flash_message', '更新が完了しました。');
    }
}
