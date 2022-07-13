@extends('layouts.user.default')

@section('page_class', 'l-diagnose')
@section('description', 'このページはミキワメ転職の適職診断、結果ページです。あなたは超提案型 セールスマーケタータイプです。')
@section('title', 'あなたの本当の資質は!？適職診断')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <p class="c-text__weight--700 c-text__lv3 c-text--center">あなたの適職診断結果は…</p>
    @endslot
    @slot('body')
    <div class="c-box bg-fff">
      <div class="c-box__head">
        <p class="c-text__main c-text__lv2 c-text--center c-text__weight--700">アイディア提案が光る<span class="c-text__main c-text__lv4"></span><br />
        超提案型 セールスマーケタータイプ
        </p>
      </div>
      <div class="c-box__body">
        <div class="l-12 l-12--gap16">
          <div class="l-6">
            <p class="c-text__lv5 c-text__space--wrap">基本的に何に対しても前向きなあなたは、恵まれた環境で育っているせいか、とても華やかで、周囲から「デキる人」と思われるタイプ。初対面の人に対しても物おじせずに話しかけることができ、行動力もあるため、管理職としても手腕を発揮することでしょう。

しかし、失敗して手痛い思いをした経験が少ない分、誰かからしかられるということに慣れておらず、上司から思わぬ叱責（しっせき）を受けると、それだけで実にアッサリと心が折れてしまうことも。

また、自分が特別だという意識が強いせいか、周囲の人に対して「上から目線」なところもありますから、知らず知らずのうちに距離をとられてしまうことも……。そうした弱点を克服できれば成功することでしょう。</p>
          </div>
          <div class="l-6">
            <div class="c-image__square result_1"></div>
          </div>
        </div>
      </div>
    </div>
    @endslot
    @slot('foot')
    <div class="p-grid">
      <ul class="p-list__split3">
      <?php
        function cardList(){
          return [
            [
              'id' => '1',
              'density' => '3',//data-input
              'color' => '',//class
              'image_path' => '/image/sample/image_1.jpg',//image
              'title' => '「喜んでもらえて嬉しい」を本当に感じられるセールスディレクター',//date
              'company' => '株式会社MIKIWAME',//date
              'update' => '2022.07.31',//date
            ],
            ['id' => '2','density' => '1', 'color' => 'white','image_path' => '/image/sample/image_2.jpg','update' => '2022.07.30',
            'title' => '「仕事に自由である」ことを共に体現！プログラマ＆エンジニア募集！','company' => '株式会社And Innovation Engineering'],
            ['id' => '3','density' => '5', 'color' => 'red','image_path' => '/image/sample/image_3.jpg','update' => '2022.07.29',
            'title' => '【未経験歓迎】人事職 ～急成長企業の1人目採用担当を募集します～','company' => '株式会社THE ONE'],
            ['id' => '4','density' => '4', 'color' => 'yellow','image_path' => '/image/sample/image_4.jpg','update' => '2022.07.29',
            'title' => '非連続成長を続けるSaaS Startupで経営企画を募集（リモート可）','company' => '株式会社G・B・A'],
            ['id' => '5','density' => '2', 'color' => 'green','image_path' => '/image/sample/image_5.jpg','update' => '2022.07.29',
            'title' => '【急募】IoTベンチャー／会社を成長させる人事担当募集！','company' => '株式会社クロス・マーケティング'],
            ['id' => '6','density' => '4', 'color' => 'blue','image_path' => '/image/sample/image_6.jpg','update' => '2022.07.29',
            'title' => '【広報／PR・マネジャー候補】オールアバウトグループが手掛け…','company' => '株式会社やまもと'],
          ];
        }
      ?>
      @php($cardList = cardList())
      @foreach($cardList as $card)
        <li target="_blank" data-href="{{ route('job') }}" class="fadeInUp c-card" data-input="{{ $card['density'] }}">
          <div class="c-card--content {{ $card['color'] }}">
            <div class="c-upper">
              <div class="c-checkbox c-checkbox__icon">
                <input type="checkbox" name="check" id="{{ $card['id'] }}">
                <label for="{{ $card['id'] }}"><span class="c-icon__w40 c-icon--favorite"></span></label>
              </div>
              <div class="c-tag">
                <ul>
                  <li><p class="c-text__min">新しい挑戦がある</p></li>
                  <li><p class="c-text__min">神奈川県</p></li>
                  <li><p class="c-text__min">リモートOK</p></li>
                </ul>
              </div>
            </div>
            <div class="c-image">
              <img src="{{ $card['image_path'] }}" alt="{{ $card['title'] }}のメイン画像">
            </div>
            <div class="c-text">
              <h4 class="c-text__lv4 c-text__weight--700">{{ $card['title'] }}</h4>
              <div class="c-lower">
                <p class="c-text__lv7">{{ $card['company'] }}</p>
                <p class="c-text__min"><time>{{ $card['update'] }}</time>更新</p>
              </div>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    @endslot
  @endcomponent

@endsection
