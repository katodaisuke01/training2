<div class="l-auto" id="js-client-edit" style="display: none;">
    <div class="c-box">
        <form>
            @csrf
            <div class="c-box__head f-a_center">
                <p class="c-text__lv4 c-text__main c-text__weight--700 ">マスタ項目の登録</p>
                <div class="c-buttonArea__end">
                    <button class="c-button__lineGray c-button__min" data-remodal-target="modal_delete">削除</button>
                </div>
            </div>
            <div class="c-box__body">
                <ul class="p-listForm">
                    <input type="hidden" name="id">
                    <li>
                        <div class="head">
                            <label class="c-text__note ">注文顧客名</label>
                        </div>
                        <div class="data">
                            <div class="c-input">
                                <input type="text" name="name" placeholder="入力してください" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">郵便番号</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_150">
                                <input type="number" name="zip_code" placeholder="1234567" value="">
                            </div>
                            <!-- 自動入力搭載できたら下 -->
                            <!-- <div class="c-input">
                               <div class="c-input c-input_150">
                                  <input type="number" name="name" placeholder="1234567" value="">
                               </div>
                               <div class="c-buttonArea c-input">
                                  <button class="c-button__sm">自動入力</button>
                               </div>
                            </div> -->
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">都道府県</label>
                        </div>
                        <div class="data">
                            <div class="c-input--select c-input_200">
                                <select name="prefecture_name">
                                    <option value>都道府県を選択</option>
                                    @foreach($prefs as $key => $pref)
                                        <option value="{{ $pref }}"
                                                @if($key == 0) selected=selected @endif>{{ $pref }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">住所1</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_300">
                                <input type="text" name="address1" placeholder="中央区銀座" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">住所2</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_300">
                                <input type="text" name="address2" placeholder="銀座1-1-1" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">建物名</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_300">
                                <input type="text" name="address3" placeholder="銀座ビル1F" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">電話番号</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_300">
                                <input type="tel" name="tel" placeholder="0312345678" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">担当者：姓</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_300">
                                <input type="text" name="manager_last_name" placeholder="田中" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">担当者：名</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_300">
                                <input type="text" name="manager_first_name" placeholder="太郎" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">メールアドレス</label>
                        </div>
                        <div class="data">
                            <div class="c-input c-input_300">
                                <input type="email" name="email" placeholder="sample@example.com" value="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">運送業者</label>
                        </div>
                        <div class="data">
                            <div class="c-input--select c-input_300">
                                <select name="delivery_partnar_id">
                                    <option value>運送業者を選択</option>
                                    @foreach($deliveries as $key => $delivery)
                                        <option value="{{ $delivery['id'] }}">{{ $delivery['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="c-buttonArea__end c-buttonArea__bottom">
                            <a href="javascript:history.back()" class="c-button__min c-button__gray c-button__round">キャンセル</a>
                            <button class="c-button__sm c-button__wide c-button__round js-master-edit js-master-post">
                                保存する
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>

