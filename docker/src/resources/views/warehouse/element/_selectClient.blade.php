<div class="l-auto" id="client_information">
    <div class="c-box">
        <p class="c-text__lv5 c-text__weight--900">注文顧客設定</p>
        <ul class="p-list__wrap">
            <li class="c-full">
                <div class="head">
                    <p class="label">注文顧客選択</p>
                </div>
                <div class="c-input__400 c-input--select">
                    <select name="client_id" value="{{old('client_id')}}" id="js-client-selector">
                        <option value="new_client" id="new_client">新規顧客を作成する</option>
                        <option disabled>注文顧客名を選択</option>
                        @foreach($clients as $key => $value)
                            @if(!empty(old('client_id')))
                                <option value='{{ $value->id }}'
                                        @if($value->id === (int)old('client_id')) selected @endif>{{ $value->name }}</option>
                            @else
                                <option value='{{ $value->id }}'>{{ $value->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </li>
            <li class="c-full client_name_input" style="display:none;">
                <div class="head">
                    <p class="label">新規顧客名</p>
                </div>
                <div class="c-input__400 c-input">
                    <input type="text" name="client_name" placeholder="リストランテ銀座" value="{{old('client_name')}}"
                           id="client_name">
                </div>
                @if ($errors->has('client_name'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('client_name')) }}
                    </p>
                @endif
            </li>
            <li>
                <div class="head">
                    <p class="label">郵便番号</p>
                </div>
                <div class="c-input">
                    <div class="c-input c-input__100">
                        <input type="number" name="zipcode" placeholder="1234567" value="{{old('zipcode')}}"
                               id="zipcode">

                    </div>
                    <!-- <button class="c-button__min">自動入力</button> -->
                </div>
                @if ($errors->has('zip_code'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('zip_code')) }}
                    </p>
                @endif
            </li>
            <li>
                <div class="head">
                    <p class="label">都道府県</p>
                </div>
                <div class="c-input">
                    <div class="c-input c-input__200 c-input--select">
                        <select name="prefecture_name" value="{{old('prefecture_name')}}" placeholder="東京都"
                                id="prefecture">
                            <option value>都道府県を選択</option>
                            @foreach($prefs as $key => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="c-input c-input__200" style="display: none">
                        <input type="text" placeholder="東京都" value="" id="prefecture">
                    </div>
                </div>
                @if ($errors->has('prefecture_name'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('prefecture_name')) }}
                    </p>
                @endif
            </li>
            <li>
                <div class="head">
                    <p class="label">市区町村</p>
                </div>
                <div class="c-input c-input__full">
                    <input type="text" name="address1" placeholder="中央区銀座" value="{{old('address1')}}" id="address1">
                </div>
                @if ($errors->has('address1'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('address1')) }}
                    </p>
                @endif
            </li>
            <li>
                <div class="head">
                    <p class="label">番地</p>
                </div>
                <div class="c-input c-input__full">
                    <input type="text" name="address2" placeholder="1-1-1" value="{{old('address2')}}" id="address2">
                </div>
                @if ($errors->has('address2'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('address2')) }}
                    </p>
                @endif
            </li>
            <li>
                <div class="head">
                    <p class="label">建物名など</p>
                </div>
                <div class="c-input c-input__full">
                    <input name="address3" type="text" placeholder="銀座ビル101" value="{{old('address3')}}" id="address3">
                </div>
            </li>
            <li>
                <div class="head">
                    <p class="label">電話番号</p>
                </div>
                <div class="c-input">
                    <div class="c-input c-input__full ">
                        <input type="tel" name="tel" placeholder="0312345678" value="{{old('tel')}}" id="telephone">
                    </div>
                </div>
                @if ($errors->has('tel'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('tel')) }}
                    </p>
                @endif
            </li>
            <li>
                <div class="head">
                    <p class="label">メールアドレス</p>
                </div>
                <div class="c-input">
                    <div class="c-input c-input__full ">
                        <input type="email" name="email" placeholder="sample@example.com" value="{{old('email')}}"
                               id="email">
                    </div>
                </div>
                @if ($errors->has('email'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('email')) }}
                    </p>
                @endif
            </li>
            <li>
                <div class="head">
                    <p class="label">配送業者</p>
                </div>
                <div class="c-input__300 c-input--select">
                    <select name="delivery_partnar" value="" id="delivery_partnar">
                        <option value>配送業者を選択</option>
                        @foreach ($delivery_partnars as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('delivery_partnar'))
                    <p class="c-text__error" style="display:inline-block;">
                        {{ __($errors->first('delivery_partnar')) }}
                    </p>
                @endif
            </li>
        </ul>
    </div>
</div>
