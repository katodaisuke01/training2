@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', 'スタッフ管理編集')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index l-container__600">
                <form action="{{ route('solaseed.account.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $delivery_user->id }}">
                    <div class="p-index__head">
                        <a class="c-icon__back" href="{{ route('solaseed.account.index') }}"></a>
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__pickup"></span>
                            スタッフ管理<small class="c-text__lv5 c-text__main">編集</small>
                        </p>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box">
                            <div class="c-box__head f">
                                <p class="c-text__lv5">スタッフ情報入力</p>
                                <div class="c-buttonArea__end">
                                    <a href="{{ route('solaseed.account.pw', ['delivery_user' => $delivery_user]) }}"
                                       class="c-button__min">パスワード編集</a>
                                </div>
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
                                                    <input type="file" name="photo" id="photo">
                                                    <label for="photo"
                                                           style="background-image:url({{ $delivery_user->image }})"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">氏名</p>
                                                </div>
                                                <div class="c-input">
                                                    <div class="c-input">
                                                        <input type="text" required placeholder="姓" name="last_name"
                                                               value="{{ old('last_name') ?? $delivery_user->last_name }}">
                                                    </div>
                                                    <div class="c-input">
                                                        <input type="text" required placeholder="名" name="first_name"
                                                               value="{{ old('first_name') ?? $delivery_user->first_name }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has('last_name') || $errors->has('first_name'))
                                                    <p class="c-text__error">名前は必ず正しく入力してください</p>
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
                                                                {{ $key == old('type', $delivery_user->type) ? 'selected' : '' }}
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
                                                           value="{{ old('tel') ?? $delivery_user->tel }}">
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
                                                           name="email"
                                                           value="{{ old('email') ?? $delivery_user->email }}">
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
                                                           name="vehicle_number"
                                                           value="{{ old('vehicle_number') ?? $delivery_user->vehicle_number }}">
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
                                                           value="{{ old('service_id') ?? $delivery_user->service_id }}">
                                                </div>
                                                @if ($errors->has('service_id'))
                                                    <p class="c-text__error">この項目は必ず半角英数字で正しく入力してください</p>
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
                            <input type="submit" form="destroy-staff" class="c-button__gray c-button__min" value="スタッフを削除する">
                            <input type="submit" class="c-button__wide c-button__accent" value="保存する">
                        </div>
                    </div>
                </form>
            </div>
            <form method="POST" id="destroy-staff" action="{{ route('solaseed.account.destroy', ['delivery_user' => $delivery_user]) }}">
                @csrf
            </form>
        </main>
    </div>
@endsection
