@extends('layouts.company.default')

@section('page_class', 'l-page')
@section('title', '求職者検索')

@section('content')
  @component('component.company.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--building"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-right">
        <form action="">
          <div class="c-input">
            <div class="c-checkbox c-checkbox__button">
              <input type="radio" name="list" id="list_all" checked>
              <label for="list_all">すべて</label>
            </div>
            <div class="c-checkbox c-checkbox__button">
              <input type="radio" name="list" id="checked">
              <label for="checked"><span class="c-icon__w24 c-icon--check"></span>チェック！リスト</label>
            </div>
            <div class="c-checkbox c-checkbox__button">
              <input type="radio" name="list" id="interest">
              <label for="interest"><span class="c-icon__w24 c-icon--star"></span>気になる！リスト</label>
            </div>
          </div>
        </form>
      </div>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="p-search">
        <div class="p-search__head">
          <form action="" class="p-form c-box bg-fff">
            <div class="p-form__head">
              <ul class="p-list__wrap">
                <li>
                  <div class="head">
                    <p class="c-text__main">検索</p>
                  </div>
                  <div class="body">
                    <div class="c-input__200 c-input--search">
                      <input type="text" placeholder="キーワード検索" value="">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__main">年齢</p>
                  </div>
                  <div class="body">
                    <div class="c-input--center">
                      <div class="c-input__select">
                        <select name="">
                          <option value="">18</option>
                          <option value="">20</option>
                          <option value="">25</option>
                          <option value="">30</option>
                          <option value="">35</option>
                          <option value="">40</option>
                          <option value="">45</option>
                          <option value="">50</option>
                          <option value="">55</option>
                        </select>
                      </div>
                      <span class="c-text__lv5">〜</span>
                      <div class="c-input__select">
                        <select name="">
                          <option value="">20</option>
                          <option value="">25</option>
                          <option value="">30</option>
                          <option value="">35</option>
                          <option value="">40</option>
                          <option value="">45</option>
                          <option value="">50</option>
                          <option value="">55</option>
                          <option value="" selected>60</option>
                        </select>
                      </div>
                      <span class="c-text__unit">歳</span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__main">年収</p>
                  </div>
                  <div class="body">
                    <div class="c-input--center">
                      <div class="c-input__select">
                        <select name="">
                          <option value="">200</option>
                          <option value="">300</option>
                          <option value="">400</option>
                          <option value="">500</option>
                          <option value="">600</option>
                          <option value="">700</option>
                          <option value="">800</option>
                          <option value="">900</option>
                          <option value="">1000</option>
                          <option value="">1200</option>
                          <option value="">1400</option>
                          <option value="">1600</option>
                          <option value="">1800</option>
                        </select>
                      </div>
                      <span class="c-text__lv5">〜</span>
                      <div class="c-input__select">
                        <select name="">
                          <option value="">200</option>
                          <option value="">300</option>
                          <option value="">400</option>
                          <option value="">500</option>
                          <option value="">600</option>
                          <option value="">700</option>
                          <option value="">800</option>
                          <option value="">900</option>
                          <option value="">1000</option>
                          <option value="">1200</option>
                          <option value="">1400</option>
                          <option value="">1600</option>
                          <option value="" selected>1800</option>
                        </select>
                      </div>
                      <span class="c-text__unit">万円</span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__main">性別</p>
                  </div>
                  <div class="body">
                    <div class="c-input__select">
                      <select name="">
                        <option value="">指定なし</option>
                        <option value="">男性</option>
                        <option value="">女性</option>
                        <option value="">その他</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__main">離職期間</p>
                  </div>
                  <div class="body">
                    <div class="c-input__select">
                      <select name="">
                        <option value="">指定なし</option>
                        <option value="">1ヶ月以内</option>
                        <option value="">3ヶ月以内</option>
                        <option value="">半年以内</option>
                        <option value="">一年以内</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__main">経験社数</p>
                  </div>
                  <div class="body">
                    <div class="c-input__select">
                      <select name="">
                        <option value="">指定なし</option>
                        <option value="">1社以内</option>
                        <option value="">2社以内</option>
                        <option value="">3社以内</option>
                        <option value="">4社以内</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__main">雇用形態</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <li class="c-checkbox">
                        <input type="checkbox" name="employ" id="employ_1">
                        <label for="employ_1">正社員</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="employ" id="employ_2">
                        <label for="employ_2">契約社員</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="employ" id="employ_3">
                        <label for="employ_3">派遣社員</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="employ" id="employ_4">
                        <label for="employ_4">取締役</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="employ" id="employ_5">
                        <label for="employ_5">その他</label>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__main">アプローチ状況</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_1">
                        <label for="approach_1"><small>貴社が</small>プロフィール閲覧していない</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_2">
                        <label for="approach_2"><small>貴社が</small>チェック！に追加していない</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_3">
                        <label for="approach_3"><small>対象へ</small>気になる！送信可能</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_4">
                        <label for="approach_4"><small>対象へ</small>気になる！未送信</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_5">
                        <label for="approach_5"><small>対象へ</small>スカウト送信可能</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_6">
                        <label for="approach_6"><small>対象へ</small>スカウト未送信</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_7">
                        <label for="approach_7"><small>貴社が</small>気になる！送信済み</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_8">
                        <label for="approach_8"><small>貴社が</small>スカウト送信済み</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_9">
                        <label for="approach_9">貴社の求人を見ている</label>
                      </li>
                      <li class="c-checkbox">
                        <input type="checkbox" name="approach" id="approach_10">
                        <label for="approach_10">貴社の求人に気になる！を送信している</label>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <div class="p-form__body">
              <ul class="p-list__tab">
                <li class="tab c-tab--area "><p class="c-text__label">エリア</p></li>
                <li class="tab c-tab--lg"><p class="c-text__label">職種 大分類</p></li>
                <li class="tab c-tab--sm"><p class="c-text__label">職種 小分類</p></li>
                <li class="tab c-tab--ex"><p class="c-text__label">こだわり条件</p></li>
                <li class="tab c-tab--star "><p class="c-text__label">仕事に求める魅力</p></li>
                <li class="tab c-tab--none active"><p class="c-text__label" style="opacity:.6">閉じる</p></li>
              </ul>
              <div class="p-content">
                <div class="c-content c-tab--area ">
                  @include('component.form._prefecture')
                </div>
                <div class="c-content c-tab--lg">
                  @include('component.form._division1')
                </div>
                <div class="c-content c-tab--sm">
                  @include('component.form._division2')
                </div>
                <div class="c-content c-tab--ex">
                  @include('component.form._other')
                </div>
                <div class="c-content c-tab--star ">
                  @include('component.form._star')
                </div>
                <div class="c-content c-tab--none show">
                </div>
              </div>
            </div>
            <div class="p-form__foot">
              <div class="c-buttonArea__end">
                <button class="c-button__gray c-button__sm">検索条件のクリア</button>
                <button class="c-button__line c-button__sm">検索条件の保存</button>
                <input type="submit" class="c-button__sm" value="絞り込む">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="f-a_center">
        <p class="c-text__lv5">あと<span class="c-text__lv3 c-text__weight--900 c-text__900">234</span>人スカウトできます</p>
          <a href="{{route('companySearchUserScout')}}" class="c-button__line c-button__min">まとめてスカウトを送る</a>
        <div class="c-right">
          <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note c-unit__before">該当ユーザー数</span>20/89</p>
        </div>
      </div>
      <div class="p-search__body">
        <div class="l-12 l-12--gap8">
          <div class="l-1">
            <div class="c-checkbox">
              <input type="checkbox" name="selectUser" id="all_selectUser">
              <label for="all_selectUser" class="c-text__min">全選択</label>
            </div>
          </div>
          <div class="l-2"><p>最終ログイン</p></div>
          <div class="l-2"><p>年齢・姓<br />住所</p></div>
          <div class="l-3"><p>経験職種</p></div>
          <div class="l-2"><p>出身校<br />現（前）勤務先</p></div>
          <div class="l-2"><p>現（前）年収<br />希望勤務地</p></div>
        </div>
        @include('component.company._searchUser')
        @include('component._pagination')
        {{-- 該当者なしのときはこれ↓↓↓↓↓↓↓↓↓ --}}
        @include('component._data_none')
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
