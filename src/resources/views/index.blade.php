@extends('layouts.user.default')

@section('page_class', 'l-home')
@section('description', '未来へのかけ橋、オンリーワンの自分発見。')
@section('title', 'ミキワメ転職 | 未来へのかけ橋、オンリーワンの自分発見')

@section('content')
  <section class="p-topic">
    <div class="p-topic__body">
      <ul class="p-list__slider">
        <li data-href="{{route('contentDetail')}}">
          <article style="background-image:url({{ asset('image/sample/image_1.jpg') }})">
            <img class="image" src="{{ asset('image/sample/image_1.jpg') }}">
            <div class="c-text">
              <p class="tag">トピック</p>
              <h4 class="c-text__lv6">【上昇志向の秘訣】採用の際、企業に好まれるビジネス思考法まとめ</h4>
              <time>{{ date('Y/m/d') }}</time>
            </div>
          </article>
        </li>
        <!-- 仮 -->
        <li data-href="{{route('contentDetail')}}"><article style="background-image:url({{ asset('image/sample/image_2.jpg') }})"><img class="image" src="{{ asset('image/sample/image_2.jpg') }}"><div class="c-text"><p class="tag">お知らせ</p><h4 class="c-text__lv6">企業ページにINFORMATIONページがアップデートされました</h4><time>{{ date('Y/m/d') }}</time></div></article></li>
        <li data-href="{{route('contentDetail')}}"><article style="background-image:url({{ asset('image/sample/image_3.jpg') }})"><img class="image" src="{{ asset('image/sample/image_3.jpg') }}"><div class="c-text"><p class="tag">ムービー</p><h4 class="c-text__lv6">株式会社キャラバン阿部鷹文 取締役と対談 -DXの近未来とは-</h4><time>{{ date('Y/m/d') }}</time></div></article></li>
        <li data-href="{{route('contentDetail')}}"><article style="background-image:url({{ asset('image/sample/image_4.jpg') }})"><img class="image" src="{{ asset('image/sample/image_4.jpg') }}"><div class="c-text"><p class="tag">お知らせ</p><h4 class="c-text__lv6">適職診断が追加されました！</p><time>{{ date('Y/m/d') }}</time></div></article></li>
        <li data-href="{{route('contentDetail')}}"><article style="background-image:url({{ asset('image/sample/image_5.jpg') }})"><img class="image" src="{{ asset('image/sample/image_5.jpg') }}"><div class="c-text"><p class="tag">トピック</p><h4 class="c-text__lv6">ビジネス観を捨てた時に見つけた、ビジネス勘という考え</h4><time>{{ date('Y/m/d') }}</time></div></article></li>
        <li data-href="{{route('contentDetail')}}"><article style="background-image:url({{ asset('image/sample/image_6.jpg') }})"><img class="image" src="{{ asset('image/sample/image_6.jpg') }}"><div class="c-text"><p class="tag">ムービー</p><h4 class="c-text__lv6">株式会社キャラバン阿部鷹文 取締役と対談 -DXの近未来とは-</h4><time>{{ date('Y/m/d') }}</time></div></article></li>
        <li data-href="{{route('contentDetail')}}"><article style="background-image:url({{ asset('image/sample/image_7.jpg') }})"><img class="image" src="{{ asset('image/sample/image_7.jpg') }}"><div class="c-text"><p class="tag">トピック</p><h4 class="c-text__lv6">ビジネス観を捨てた時に見つけた、ビジネス勘という考え</h4><time>{{ date('Y/m/d') }}</time></div></article></li>
        <!-- 仮 -->
      </ul>
    </div>
  </section>
  <!--タブを切り替えて表示する絞り込み-->
  <section class="p-sort">
    <ul class="p-list__tab">
      <li class="tab c-tab--star active"><p class="c-text__label">仕事に求める魅力</p></li>
      <li class="tab c-tab--area"><p class="c-text__label">エリア</p></li>
      <li class="tab c-tab--lg"><p class="c-text__label">職種 大分類</p></li>
      <li class="tab c-tab--sm"><p class="c-text__label">職種 小分類</p></li>
      <li class="tab c-tab--ex"><p class="c-text__label">こだわり条件</p></li>
    </ul>
    <div class="p-content">
      <form action="">
        <div class="c-content c-tab--star show">
          @include('component.form._star')
        </div>
        <div class="c-content c-tab--area">
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
      </form>
    </div>
  </section>
  <section class="p-entry">
    <div class="p-entry__head">
      <p class="c-text__lv5"><span class="c-text__main c-text__lv1 c-italic__en">1,234</span>件がHITしました</p>
      <form action="">
        <div class="c-checkbox c-checkbox__icon">
          <input type="checkbox" name="sort" id="check">
          <label for="check"><span class="c-icon__w32 c-icon--favorite"></span>チェック済みだけを表示</label>
        </div>
      </form>
    </div>
    <div class="p-entry__body">
      @include('component._card')
      @include('component.user._rise')
    </div>
  </section>
  @include('component._loading')

@endsection
