@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', 'スタッフ管理新規作成')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index l-container__600">
                <form action="{{ route('solaseed.account.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-index__head">
                        <a class="c-icon__back" href="{{ route('solaseed.account.index') }}"></a>
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__pickup"></span>
                            スタッフ管理<small class="c-text__lv5 c-text__main">新規作成</small>
                        </p>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box">
                            <div class="c-box__head f">
                                <p class="c-text__lv5">スタッフ情報入力</p>
                            </div>
                            <div class="c-box__body">
                                <div class="l">
                                    <div class="l-fix__300">
                                        <ul class="p-list__col">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">スタッフ画像</p>
                                                </div>
                                                <div class="c-input__image">
                                                    <input type="file" required name="photo" id="photo">
                                                    <label for="photo"></label>
                                                </div>
                                                @if ($errors->has('photo'))
                                                    <p class="c-text__error">スタッフ画像は必ず登録してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">氏名</p>
                                                </div>
                                                <div class="c-input">
                                                    <div class="c-input">
                                                        <input type="text" required placeholder="姓" name="last_name"
                                                               value="{{ old('last_name') }}">
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" required placeholder="名" name="first_name"
                                                               value="{{ old('first_name') }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has('last_name') || $errors->has('first_name'))
                                                    <p class="c-text__error">この項目は必ず正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">種別</p>
                                                </div>
                                                <div class="c-input--select c-input__150">
                                                    <select name="type" class="form-control">
                                                        @foreach(\App\Models\DeliveryUser::AUTHORITY_LIST as $key => $val)
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
                                        </ul>
                                    </div>
                                    <div class="l-auto">
                                        <ul class="p-list__col">
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
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">車両番号</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="text" required placeholder="品川あ 00-00"
                                                           name="vehicle_number" value="{{ old('vehicle_number') }}">
                                                </div>
                                                @if ($errors->has('vehicle_number'))
                                                    <p class="c-text__error">この項目は必ず正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">ID（ログイン用）</p>
                                                </div>
                                                <div class="c-input c-input__full">
                                                    <input type="text" required placeholder="ID" name="service_id"
                                                           value="{{ old('service_id') }}">
                                                </div>
                                                @if ($errors->has('service_id'))
                                                    <p class="c-text__error">この項目は必ず半角英数字で正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">パスワード</p>
                                                </div>
                                                <div class="c-input--pw c-input__full">
                                                    <input type="password" required name="password"
                                                           placeholder="•••••••" value="">
                                                    <span><i class="c-icon__eye"></i></span>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <p class="c-text__error">この項目は必ず半角英数字で正しく入力してください</p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">パスワード（確認）</p>
                                                </div>
                                                <div class="c-input--pw c-input__full">
                                                    <input type="password" required name="password_confirmation"
                                                           placeholder="•••••••" value="">
                                                    <span><i class="c-icon__eye"></i></span>
                                                </div>
                                                @if ($errors->has('password_confirmation'))
                                                    <p class="c-text__error">パスワード（確認）項目は必ず「パスワード」と同様のものを正しく入力してください</p>
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
                            <a href="{{ route('solaseed.account.index') }}" class="c-button__gray c-button__min">戻る</a>
                            <input type="submit" class="c-button__wide c-button__accent" value="保存する">
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
