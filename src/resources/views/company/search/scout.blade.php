@extends('layouts.company.default')

@section('page_class', 'l-form')
@section('title', '求職者検索')
@section('page_title', 'スカウト')

@section('content')
  @component('component.company.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--license"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title') </small></h1>
    @endslot
    @slot('body')
      <form action="" class="p-form">
        <div class="p-form__body">
          <div class="c-concave">
            <ul class="p-list">
              <li>
                <div class="head required">
                  <p class="c-text__main">スカウトする求人を選択</p>
                </div>
                <div class="body">
                  <div class="c-input__select">
                    <select name="">
                      <option value="">求人を選択してください</option>
                      <option value="">【開発責任者候補】サービスシステム開発マネージャー</option>
                      <option value="">営業職</option>
                      <option value="">エンジニア職</option>
                      <option value="">広報職</option>
                    </select>
                  </div>
                </div>
                <p class="c-text__error">この項目は必ず選択してください</p>
              </li>
              <li>
                <div class="head optional">
                  <p class="c-text__main">メッセージテンプレートを選択</p>
                </div>
                <div class="body">
                  <div class="c-input__select">
                    <select name="">
                      <option value="">メッセージテンプレートを選択してください</option>
                      <option value="">テンプレートA</option>
                      <option value="">テンプレートB</option>
                      <option value="">テンプレートC</option>
                      <option value="">テンプレートD</option>
                    </select>
                  </div>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p class="c-text__main">メッセージ内容</p>
                </div>
                <div class="body">
                  <div class="c-input--full">
                    <textarea name="" placeholder="メッセージ内容を入力" cols="30" rows="10">株式会社 ミキワメ
代表取締役の山田と申します。

この度、弊社のWEB・アプリ開発エンジニアの幹部としてご活躍いただける方を募集しており、Greenにご登録いただいている貴殿の
ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
（※個人の経験、経験していた会社名に触れて送付してください。）
ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
を拝見し、このような形でご連絡をさせていただきました。

弊社は、クライアントの「新規事業の立ち上げ」と「既存事業の発展」を
「Webシステム・アプリの開発」によりご支援させていただく事業を展開しています。

この様な事業を展開していく上で、より良いご支援を行うために
組織体制強化を重要な経営アジェンダとして掲げており、
「開発現場を牽引する」リーダーを募集しております。

また、クライアントだけでなく、弊社自体の「新規事業」や「組織体制・ガバナンスの強化」
といった成長戦略を共に描ける「幹部候補」のメンバーを募集しております。

Greenにて当社の紹介ページがございますが、少しでもご興味を
お持ち頂けるようでしたら、直接お会いしてお話をさせていただき、
双方の理解を深められればと考えております。

応募フォームにメッセージをご記載いただける欄がございますので、
ご面接可能な日時を複数ご記載いただければ、できるだけ迅速に
ご連絡させて頂きます。

貴殿からのご連絡をお待ちしております。

￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢
株式会社 ミキワメ
代表取締役 山田 太郎
http://www.mikiwame/company/00001
￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢￢
</textarea>
                  </div>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{route('companySearchUser')}}" class="c-button__min c-button__gray">キャンセル</a>
            <button class="c-button__line">テンプレートとして保存</button>
            <a href="{{route('companySearchUserConfirm')}}" class="c-button" >確認する</a>
            {{-- <input type="submit" class="c-button" value="確認する"> --}}
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
