    <div class="l">
      <div class="l-fix__500 l-fix">
        <div class="p-areaTitle">
          <h2 class="c-text__lv3 c-text__weight--900">
            @yield('title')
          </h2>
          <p class="c-text__lv4 c-text__weight--700">
            株式会社MIKIWAME - メディアミックス戦略で顧客の期待値を超える。 東証一部上場企業、大手製造業を中心に多数の実績。
          </p>
          <div class="c-buttonArea">
            <a href="{{route('corporate')}}" class="c-button__line--black c-button__sm c-button__square">企業情報を見に行く<span class="c-icon__w16 c-icon__arrow"></span></a>
          </div>
        </div>
      </div>
      <div class="p-job__image l-auto">
        <ul class="p-list__slider--job">
          <li><div><img src="{{ asset('../image/sample/image_15.jpg') }}" alt="@yield('title')のトップ画像1"></div></li>
          <li><div><img src="{{ asset('../image/sample/image_14.jpg') }}" alt="@yield('title')のトップ画像2"></div></li>
          <li><div><img src="{{ asset('../image/sample/image_13.jpg') }}" alt="@yield('title')のトップ画像3"></div></li>
          <li><div><img src="{{ asset('../image/sample/image_12.jpg') }}" alt="@yield('title')のトップ画像4"></div></li>
          <li><div><img src="{{ asset('../image/sample/image_11.jpg') }}" alt="@yield('title')のトップ画像5"></div></li>
        </ul>
      </div>
    </div>