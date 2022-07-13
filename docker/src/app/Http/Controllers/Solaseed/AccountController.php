<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryUser;
use App\Http\Requests\UpdateDeliveryUser;
use App\Http\Requests\UpdateDeliveryUserPassword;
use App\Models\DeliveryUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        $delivery_users = DeliveryUser::where('delivery_partner_id', $user->delivery_partner_id)->get();

        return view('solaseed/account/index', ['delivery_users' => $delivery_users]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function pw(DeliveryUser $delivery_user)
    {
        return view('solaseed/account/pw', ['delivery_user' => $delivery_user]);
    }

    /**
     * @param UpdateDeliveryUserPassword $request
     * @return RedirectResponse
     */
    public function updatePw(UpdateDeliveryUserPassword $request)
    {
        $user = Auth::user();
        $params = $request->all();

        $params['password'] = Hash::make($request->input('password'));

        $delivery_user = DeliveryUser::where('delivery_partner_id', $user->delivery_partner_id)
            ->find($request->get('id'));
        $delivery_user->update($params);
        $delivery_user->save();

        return redirect()
            ->route('solaseed.account.pw', ['delivery_user' => $delivery_user])
            ->with('flash_message', '更新が完了しました。');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('solaseed/account/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(StoreDeliveryUser $request)
    {
        $user = Auth::user();
        $params = $request->all();

        $params['password'] = Hash::make($request->input('password'));

        if (isset($params['photo'])) {
            // バケットの`delivery_users`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('delivery_users', $params['photo']);
            $params['image_path'] = $path;
        }

        $params['delivery_partner_id'] = $user->delivery_partner_id;

        DeliveryUser::create($params);

        return redirect()
            ->route('solaseed.account.index')
            ->with('flash_message', '更新が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(DeliveryUser $delivery_user)
    {
        return view('solaseed/account/edit', ['delivery_user' => $delivery_user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDeliveryUser $request
     * @return RedirectResponse
     */
    public function update(UpdateDeliveryUser $request): RedirectResponse
    {
        $user = Auth::user();
        $params = $request->all();

        if (isset($params['photo'])) {
            // バケットの`delivery_users`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('delivery_users', $params['photo']);
            $params['image_path'] = $path;
        }

        $delivery_user = DeliveryUser::where('delivery_partner_id', $user->delivery_partner_id)
            ->find($request->get('id'));
        $delivery_user->update($params);
        $delivery_user->save();

        return redirect()
            ->route('solaseed.account.edit', ['delivery_user' => $delivery_user])
            ->with('flash_message', '更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeliveryUser $delivery_user
     * @return RedirectResponse
     */
    public function destroy(DeliveryUser $delivery_user)
    {
        $user = Auth::user();
        if ($user->delivery_partner_id !== $delivery_user->delivery_partner_id) {
            return redirect()
                ->back()
                ->with('flash_message', '削除に失敗しました');
        }
        $delivery_user->delete();

        return redirect()
            ->route('solaseed.account.index')
            ->with('flash_message', 'スタッフを削除しました');
    }
}
