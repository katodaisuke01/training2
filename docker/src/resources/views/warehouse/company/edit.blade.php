@extends('layouts.layout_admin')
@section('content')
    <div class="l-container l-page">
        <section class="p-index__800">
            <form action="{{ route('warehouse.company.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-index__head">
                    <span class="c-icon__w24 c-icon__company"></span>
                    <h2 class="c-text__lv3 c-text__weight--900">
                        事業者情報設定<small>編集</small>
                    </h2>
                </div>
                <div class="p-index__body">
                    <div class="shadow c-box">
                        <div class="c-box__body">
                            <div class="l">
                                <div class="l-fix l-fix__300">
                                    <ul class="p-list">
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">事業者名</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input">
                                                    <input type="text" placeholder="株式会社 日本水産" name="name"
                                                           value="{{ old('name') ?? $m_business->name }}">
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
                                                <div class="c-input c-input_150">
                                                    <input type="text" placeholder="1234567" name="zip_code"
                                                           value="{{ old('zip_code') ?? $m_business->zip_code }}">
                                                </div>
                                                @if ($errors->has('zip_code'))
                                                    <p class="c-text__error">郵便番号は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="f-a_start">
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
                                                                    {{ $key == old('prefecture', $m_business->prefecture) ? 'selected' : '' }}
                                                                >
                                                                    {{ $val }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="中央区日本橋1-1-1" name="address1"
                                                               value="{{ old('address1') ?? $m_business->address1 }}">
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="日本橋ビル10F" name="address2"
                                                               value="{{ old('address2') ?? $m_business->address2 }}">
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
                                                <p class="c-text__label">配送先<br/>郵便番号</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input_150">
                                                    <input type="text" placeholder="1234567" name="delivery_zipcode"
                                                           value="{{ old('delivery_zipcode') ?? $m_business->delivery_zipcode }}">
                                                </div>
                                                @if ($errors->has('delivery_zipcode'))
                                                    <p class="c-text__error">配送先郵便番号は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="f-a_start">
                                            <div class="head">
                                                <p class="c-text__label">配送先住所</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__col">
                                                    <div class="c-input--select c-input__150">
                                                        <select name="delivery_prefecture" class="form-control">
                                                            @foreach(config('prefecture') as $key => $val)
                                                                <option
                                                                    value="{{ $key }}"
                                                                    {{ $key == old('delivery_prefecture', $m_business->delivery_prefecture) ? 'selected' : '' }}
                                                                >
                                                                    {{ $val }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="中央区日本橋1-1-1"
                                                               name="delivery_address1"
                                                               value="{{ old('delivery_address1') ?? $m_business->delivery_address1 }}">
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" placeholder="日本橋ビル10F"
                                                               name="delivery_address2"
                                                               value="{{ old('delivery_address2') ?? $m_business->delivery_address2 }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has('delivery_prefecture') || $errors->has('delivery_address1') || $errors->has('delivery_address2'))
                                                    <p class="c-text__error">配送先住所は必ず入力してください</p>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="l-auto">
                                    <ul class="p-list">
                                        <li class="f-a_start">
                                            <div class="head">
                                                <p class="c-text__label">配送場所画像</p>
                                            </div>
                                            <div class="data c-full">
                                                <div class="c-input__file">
                                                    <input type="file" id="image_1" name="image">
                                                    <label for="image_1"
                                                           style="background-image:url({{ $m_business->image }})"></label>
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
                                                <div class="c-input--select">
                                                    <select>
                                                        <option>選択してください</option>
                                                        <option selected>星野 健一郎</option>
                                                        <option>山田 太郎</option>
                                                        <option>田中 幸子</option>
                                                        <option>佐藤 一郎</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <p class="c-text__error">管理者の中から担当者を選択してください</p>
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
                                                           value="{{ old('email') ?? $m_business->email }}">
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
                                                           value="{{ old('tel') ?? $m_business->tel }}">
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
                                                           value="{{ old('fax') ?? $m_business->fax }}">
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
