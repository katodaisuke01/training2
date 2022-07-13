@extends('layouts.admin.form')

@section('page_class', 'l-user')
@section('title', 'メッセージ管理 詳細')
@section('page_title', '山田陽子さんと株式会社インターコンチネンタル様のメッセージ')

@section('content')
  @component('component.admin.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--mail"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <form action="">
          <div class="c-checkbox c-checkbox__button">
            <input type="checkbox" name="flag" id="flag">
            <label for="flag"><span class="c-icon--flag c-icon__w16"></span>フラグチェック</label>
          </div>
        </form>
      </div>
    @endslot
    @slot('body')
      <div class="c-concave">
        <div class="p-message">
          <div class="p-message__head">
            <div class="bg-fff c-circle shadow">
              <div class="c-image__circle" style="background-image:url({{ asset('../image/sample/user/img_2.png') }})"></div>
              <p class="c-text__lv5 c-text__weight--700">山田 陽子<span class="c-text__unit">さん</span></p>
              <p class="c-text__lv5 c-text__weight--700"><span class="c-text__unit">ID</span>yoco45678uj</p>
            </div>
            <div class="c-icon__w32 c-icon--cross"></div>
            <div class="bg-fff c-circle shadow">
              <div class="c-image__square" style="background-image:url({{ asset('../image/sample/company/img_2.png') }})"></div>
              <p class="c-text__lv5 c-text__weight--700">株式会社MIKIWAME</p>
            </div>
          </div>
          <div class="p-message__body">
            <p class="c-tag__main full">スカウト</p>
            <p class="message">Yoco276q394様
              はじめまして、私ども株式会社ミキワメと申します。
              Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただきました。
              下記にあります、弊社からの求人情報・募集要項などをご覧いただき、少しでもご興味感じていただけましたら是非一度お話しできればと考えております。
              ご多用中とは存じますが、よろしくお願い申し上げます。

              株式会社MIKIWAME 採用担当
            </p>
            <a target="_blanc" rel="noopener noreferrer" href="{{route('job')}}" class="c-box bg-fff shadow">
              <div class="l">
                <div class="l-fix__160">
                  <div class="c-image" style="background-image:url({{ asset('../image/sample/image_2.jpg') }})"></div>
                </div>
                <div class="l-auto">
                  <div class="c-text">
                    <p class="c-text__main c-text__lv4 c-text__weight--700">
                      「喜んでもらえて嬉しい」を本当に感じられる！セールスディレクター募集
                    </p>
                    <p class=" c-text__lv5 c-text__weight--700">
                      株式会社MIKIWAME <span class="c-text__note">2022.05.14更新</span>
                    </p>
                    <ul class="p-list__wrap">
                      <li><p class="c-tag__black">神奈川県</p></li>
                      <li><p class="c-tag__black">セールスディレクター</p></li>
                      <li><p class="c-tag__black--line">福利厚生充実</p></li>
                      <li><p class="c-tag__black--line">残業なし</p></li>
                      <li><p class="c-tag__black--line">昇給・昇格あり</p></li>
                    </ul>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="p-message__foot c-border--top">
            <ul class="p-list">
              <li class="user">
                <article class="c-box">
                  <div class="c-box__head">
                    <p class="c-text__main">お礼のご連絡<span class="c-text__note">From 山田 陽子</span></p>
                    <div class="c-right"><p class="c-text__min">2022.05.15 11:24</p></div>
                  </div>
                  <div class="c-box__body">
                    <p class="message">株式会社MIKIWAME 採用担当 様
                      ご連絡ありがとうございます。
                      貴社の採用情報拝見し、とても魅力的に感じ、是非選考に応募させていただければと考えています。
                      つきましては面談の可能な日時、場所などご教授いただければと存じます。
                      よろしくお願いいたします。

                      山田陽子
                    </p>
                  </div>
                </article>
              </li>
              <li class="company">
                <article class="c-box">
                  <div class="c-box__head">
                    <p class="c-text__main">お礼のご連絡<span class="c-text__note">From 株式会社MIKIWAME</span></p>
                    <div class="c-right"><p class="c-text__min">2022.05.15 14:32</p></div>
                  </div>
                  <div class="c-box__body">
                    <p class="message">山田 様
                      ご連絡ありがとうございます。ミキワメ採用担当の斎藤と申します。
                      この度は選考へのご応募、誠にありがとうございます。
                      面談担当者のスケジュール等確認のために少しお時間いただけますでしょうか。数日中にはご連絡させていただきます。
                      何卒、よろしくお願いいたします。

                      株式会社ミキワメ 採用担当
                    </p>
                  </div>
                </article>
              </li>
            </ul>
          </div>
        </div>
      </div>
    @endslot
  @endcomponent

@endsection
