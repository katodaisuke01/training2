@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '荷主管理新規登録')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index l-container__600">
                <form action="{{ route('solaseed.partner.store') }}" method="post">
                    @csrf
                    <div class="p-index__head">
                        <a class="c-icon__back" href="{{ route('solaseed.partner.index') }}"></a>
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__pickup"></span>
                            荷主管理<small class="c-text__lv5 c-text__main">新規登録</small>
                        </p>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box">
                            <div class="c-box__head">
                                <p class="c-text__lv5">荷主情報入力</p>
                            </div>
                            <div class="c-box__body">
                                <div class="l">
                                    <div class="l-fix__300">
                                        <ul class="p-list__col">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">荷主名称</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="text" required placeholder="株式会社サンプル" name="name"
                                                           value="{{ old('name') }}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <p class="c-text__error">この項目は必ず正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">種別</p>
                                                </div>
                                                <div class="c-input--select c-input__150">
                                                    <select name="type" class="form-control">
                                                        @foreach(\App\Models\Partner::TYPE_LIST as $key => $val)
                                                            <option
                                                                value="{{ $key }}"
                                                                {{ $key == old('type') ? 'selected' : '' }}
                                                            >
                                                                {{ $val }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">住所（配送先）</p>
                                                </div>
                                                <div class="c-input c-input__col c-input__full">
                                                    <div class="c-input--select c-input__150">
                                                        <select name="prefecture" class="form-control">
                                                            @foreach(config('prefecture') as $key => $val)
                                                                <option
                                                                    value="{{ $key }}"
                                                                    {{ $key == old('prefecture') ? 'selected' : '' }}
                                                                >
                                                                    {{ $val }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="c-input c-input__full">
                                                        <input type="text" required placeholder="中央区銀座1-1-1"
                                                               name="address1" value="{{ old('address1') }}">
                                                    </div>
                                                    <div class="c-input c-input__full">
                                                        <input type="text" placeholder="日本ビルディング1F" name="address2"
                                                               value="{{ old('address2') }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has('prefecture') || $errors->has('address1') || $errors->has('address2'))
                                                    <p class="c-text__error">この項目は必ず正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">電話番号</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="tel" required placeholder="0312345678" name="tel"
                                                           value="{{ old('tel') }}">
                                                </div>
                                                @if ($errors->has('tel'))
                                                    <p class="c-text__error">この項目は必ず半角数字で正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">メールアドレス</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="email" required placeholder="sample@mail.com"
                                                           name="email" value="{{ old('email') }}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <p class="c-text__error">この項目は必ず半角英数字で正しく入力してください</p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-auto">
                                        <ul class="p-list__col">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">担当者名</p>
                                                </div>
                                                <div class="c-input">
                                                    <div class="c-input">
                                                        <input type="text" required placeholder="姓"
                                                               name="responsible_last_name"
                                                               value="{{ old('responsible_last_name') }}">
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" required placeholder="名"
                                                               name="responsible_first_name"
                                                               value="{{ old('responsible_first_name') }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has('responsible_last_name') || $errors->has('responsible_first_name'))
                                                    <p class="c-text__error">この項目は必ず正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">取引銀行</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="text" placeholder="◯◯銀行" name="bank_name"
                                                           value="{{ old('bank_name') }}">
                                                </div>
                                                @if ($errors->has('bank_name'))
                                                    <p class="c-text__error">正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">支店名</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="text" placeholder="◯◯支店" name="bank_branch"
                                                           value="{{ old('bank_branch') }}">
                                                </div>
                                                @if ($errors->has('bank_branch'))
                                                    <p class="c-text__error">正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">口座種別</p>
                                                </div>
                                                <div class="c-input--select c-input__150">
                                                    <select name="bank_account_type" class="form-control">
                                                        @foreach(\App\Models\Bank::TYPE_LIST as $key => $val)
                                                            <option
                                                                value="{{ $key }}"
                                                                {{ $key == old('bank_account_type') ? 'selected' : '' }}
                                                            >
                                                                {{ $val }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">口座番号</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="text" placeholder="1234567890"
                                                           name="bank_account_number"
                                                           value="{{ old('bank_account_number') }}">
                                                </div>
                                                @if ($errors->has('bank_account_number'))
                                                    <p class="c-text__error">この項目は必ず半角数字で正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">口座名義</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="text" placeholder="カブシキガイシャサンプル"
                                                           name="bank_account_holder"
                                                           value="{{ old('bank_account_holder') }}">
                                                </div>
                                                @if ($errors->has('bank_account_holder'))
                                                    <p class="c-text__error">この項目はカタカナで正しく入力してください</p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-index__foot">
                        <div class="c-buttonArea__end f-a_end">
                            <a href="{{ route('solaseed.partner.index') }}" class="c-button__gray c-button__min">戻る</a>
                            <input type="submit" class="c-button__wide c-button__accent" value="保存する">
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
