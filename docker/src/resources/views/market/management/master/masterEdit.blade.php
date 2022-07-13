<div class="l-auto" id="js-common-edit" style="display: none;">
    <div class="c-box">
        <form>
            @csrf
            <div class="c-box__head f-a_center">
                <p class="c-text__lv4 c-text__main c-text__weight--900 ">マスタ項目の登録</p>
                <div class="c-buttonArea__end">
                    <button class="c-button__lineGray c-button__min" data-remodal-target="modal_delete">削除</button>
                </div>
            </div>
            <div class="c-box__body">
                <ul class="p-listForm">
                    <input type="hidden" name="id">
                    <li id="category-select" style="display: none;">
                        <div class="head">
                            <label class="c-text__note ">カテゴリ</label>
                        </div>
                        <div class="data">
                            <div class="c-input--select c-input_200">
                                {{Form::select('m_category_id',$m_categories->pluck('name','id'),null,['placeholder' => '選択してください'])}}
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head">
                            <label class="c-text__note ">入力項目</label>
                        </div>
                        <div class="data">
                            <div class="c-input">
                                <input type="text" name="name" placeholder="入力してください" id="js-target-box" value="">
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
