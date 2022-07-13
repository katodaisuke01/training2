@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', '企業管理 求人一覧')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--building"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{route('adminCompanyEntryCreate')}}" class="c-button__min">新規作成</a>
      </div>
    @endslot
    @slot('body')
    <div class="p-grid">
      <ul class="p-list__split4">
      <?php
        function cardList(){
          return [
            [
              'id' => '1',//id for
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
        <li target="_blank" class="fadeInUp c-card" data-input="{{ $card['density'] }}">
          <div class="c-card--content {{ $card['color'] }}">
            <a href="{{ route('job') }}" target="_blank" rel="noopener"></a>
            <div class="hover">
              <div class="c-buttonArea__center">
                <a href="{{route('adminCompanyEntryEdit')}}" class="c-button__min c-button__line--white">編集</a>
              </div>
            </div>
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
    @slot('foot')
    @endslot
  @endcomponent

@endsection
