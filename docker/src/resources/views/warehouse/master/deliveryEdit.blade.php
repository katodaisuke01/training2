<div class="l-auto" id="js-delivery-edit" style="display: none;">
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
                            <label class="c-text__note">運送区分</label>
                        </div>
                        <div class="data">
                            <div class="c-select c-select_300">
                                <select name="delivery_category">
                                    <option value="">未選択</option>
                                    <option value="0">陸運</option>
                                    <option value="1">海運</option>
                                    <option value="2">空運</option>
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

