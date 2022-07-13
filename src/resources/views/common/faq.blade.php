@section('page_class', 'l-page p-setting')
@section('description', 'このページはミキワメ転職のよくあるご質問ページです。')
@section('title', 'よくあるご質問')
@section('page_title', 'よくあるご質問 | ミキワメ転職')
@extends('layouts.user.default')

@section('content')
  @component('component.user.frame._default_short')
    @slot('body')
      <div class="c-box c-box__900 bg-fff">
        <div class="c-box__body">
          <ul class="p-list__border p-list">
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. 転職にあたって、Greenを利用するのに料金はかかりますか？</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. 全てのサービスを無料にてご利用いただけます。</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. 求人検索をするのに会員登録は必要ですか？</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. 会員登録がなくても、全ての検索サービスをご利用いただけます。<br />ただし、求人に「応募」する際には、会員登録が必要となります。</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. 会員登録が確認できません。</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. 新規会員登録が完了していなかった可能性があります。<br />「[ミキワメ転職]ご登録ありがとうございます」という登録完了メールが届かない場合、お手数ですがもう一度はじめからご登録ください。</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. パスワードを忘れてしまいました。</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. <a href="{{route('reset')}}" class="c-text__main">パスワードの再発行</a>が必要です。以下のページから「メールアドレス（ID）」を入力のうえ、パスワード再発行手続きをしてください。</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. 現在勤務中の企業に職務経歴書を見られたくないのですが。</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. 次の手順で設定をすることで特定企業の検索の対象外となり、あなたの匿名公開情報を非公開にできます。<br />１）ログインし、登録情報へ<br />２）登録情報トップページの「マイページ」をクリック<br />３)「非表示企業設定」にて、情報を公開したくない企業名を追加<br />４）保存するボタンをクリック</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. 間違って応募や「気になる」、「話を聞いてみたい」をしたのですが、取り消せますか</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. 申し訳ございませんが、操作を取り消すことはできません。<br />企業から返信があった場合には、必要に応じて辞退をいただけますと幸いです。</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. 応募した企業は、どこまでの情報を閲覧できるのですか？</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. 応募した企業には「プロフィール」の本名、メールアドレス、電話番号以外の情報が公開されます。</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="c-text__main c-text__lv6">Q. 履歴書や職務経歴書を更新した場合、応募済み企業にはどのように見えますか？</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">A. プロフィールを更新した場合でも、過去に応募した企業の画面ではプロフィールは変更されませんのでご安心ください。</p>
              </div>              
            </li>
          </ul>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
