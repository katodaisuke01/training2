@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index__800">
            <form action="{{ route('admin.company.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-index__head">
                    <h2 class="title">
                        <span class="c-icon c-icon__staff"></span>
                        管理者情報管理<small>編集</small>
                    </h2>
                </div>
                <div class="p-index__body">
                    <div class="shadow c-box">
                        <div class="c-box__body">
                            <div class="l">
                                <div class="l-fix l-fix__300">
                                    <ul class="">
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">事業者名</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input">
                                                    <input type="text" placeholder="株式会社 日本水産" name="name"
                                                           value="{{ old('name') ?? $industry_group->name }}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <p class="c-text__error">事業者名は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">郵便番号</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input_200">
                                                    <input type="text" placeholder="1234567" name="zip_code"
                                                           value="{{ old('zip_code') ?? $industry_group->zip_code }}">
                                                </div>
                                                @if ($errors->has('zip_code'))
                                                    <p class="c-text__error">郵便番号は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">住所</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__col">
                                                    <div class="c-input--select c-input__150">
                                                        <select name="prefecture" class="form-control">
                                                            @foreach(config('prefecture') as $key => $val)
                                                                <option
                                                                    value="{{ $key }}"
                                                                    {{ $key == old('prefecture', $industry_group->prefecture) ? 'selected' : '' }}
                                                                >
                                                                    {{ $val }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="中央区日本橋1-23-456" name="address1"
                                                               value="{{ old('address1') ?? $industry_group->address1 }}">
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="日本橋ビル10F" name="address2"
                                                               value="{{ old('address2') ?? $industry_group->address2 }}">
                                                    </div>
                                                </div>
                                                <div class="c-input c-input_full">
                                                </div>
                                                @if ($errors->has('prefecture') || $errors->has('address1') || $errors->has('address2'))
                                                    <p class="c-text__error">住所は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">集荷先<br/>郵便番号</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input_200">
                                                    <input type="text" placeholder="1234567" name="pickup_zipcode"
                                                           value="{{ old('pickup_zipcode') ?? $industry_group->pickup_zipcode }}">
                                                </div>
                                                @if ($errors->has('pickup_zipcode'))
                                                    <p class="c-text__error">集荷先郵便番号は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">集荷先住所</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__col">
                                                    <div class="c-input--select c-input__150">
                                                        <select name="pickup_prefecture" class="form-control">
                                                            @foreach(config('prefecture') as $key => $val)
                                                                <option
                                                                    value="{{ $key }}"
                                                                    {{ $key == old('pickup_prefecture', $industry_group->pickup_prefecture) ? 'selected' : '' }}
                                                                >
                                                                    {{ $val }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="中央区日本橋1-1-1"
                                                               name="pickup_address1"
                                                               value="{{ old('pickup_address1') ?? $industry_group->pickup_address1 }}">
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="日本橋ビル10F" name="pickup_address2"
                                                               value="{{ old('pickup_address2') ?? $industry_group->pickup_address2 }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has('pickup_prefecture') || $errors->has('pickup_address1') || $errors->has('pickup_address2'))
                                                    <p class="c-text__error">集荷先住所は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="l-auto">
                                    <ul class="p-list__row">
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">集荷場所画像</p>
                                            </div>
                                            <div class="data c-full">
                                                <div class="c-input__file">
                                                    <input type="file" id="image_1" name="image">
                                                    @if(!is_null($industry_group->image_path))
                                                        <label for="image_1"
                                                               style="background-image:url({{ $industry_group->image }})"></label>
                                                    @else
                                                        <label for="image_1" style="background-image:url"></label>
                                                    @endif

                                                </div>
                                                <p class="c-text__unit">画像サイズ：最大5MB以内</p>
                                                @if ($errors->has('image'))
                                                    <p class="c-text__error">画像アップロードサイズは5MB以内としてください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">担当者名</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input--select c-input__300">
                                                    <select name="user_name">
                                                        <option>選択してください</option>
                                                        @foreach($industry_group->users as $user)
                                                            <option
                                                                value="{{ $user->name }}"
                                                                {{ $user->name == old('user_name', $industry_group->responsible_name) ? 'selected' : '' }}
                                                            >
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <p class="c-text__error">担当者を管理者から選択してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">E-Mail</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__300">
                                                    <input type="email" placeholder="sample@mail.co.jp" name="email"
                                                           value="{{ old('email') ?? $industry_group->email }}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <p class="c-text__error">メールアドレスは半角英数で正しく入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">電話番号</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__300">
                                                    <input type="tel" placeholder="0312345678" name="tel"
                                                           value="{{ old('tel') ?? $industry_group->tel }}">
                                                </div>
                                                @if ($errors->has('tel'))
                                                    <p class="c-text__error">電話番号は半角英数で正しく入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">FAX番号</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__300">
                                                    <input type="tel" placeholder="0312345678" name="fax"
                                                           value="{{ old('fax') ?? $industry_group->fax }}">
                                                </div>
                                                @if ($errors->has('fax'))
                                                    <p class="c-text__error">FAX番号は半角英数で正しく入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="p-index__foot">
                    <div class="c-buttonArea__end c-buttonArea__bottom">
                        <a href="javascript:history.back()" class="c-button__min c-button__gray c-button__round">戻る</a>
                        <input type="submit" href="{{ route('admin.company.edit') }}"
                               class="c-button__wide c-button__round" value="保存する">
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
