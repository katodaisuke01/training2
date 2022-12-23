<nav class="p-sidebar">
  @foreach([
    'dashboard'=> [
      'label' => 'ダッシュボード',
      'path' => 'cms.dashboard',
    ],
    'item'=> [
      'label' => '商品',
      'path' => 'cms.item',
    ],
    'sales'=> [
      'label' => '売上',
      'path' => 'cms.sales',
    ],
    'user'=> [
      'label' => 'ユーザー',
      'path' => 'cms.user',
    ],
    'news'=> [
      'label' => 'お知らせ',
      'path' => 'cms.news',
    ],
    'contact'=> [
      'label' => 'お問い合わせ',
      'path' => 'cms.contact',
    ],
  ] as $key => $val)
    <a
      href="{{route($val['path'])}}"
      class="
        p-sidebar__btn
        {{ in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? 'is-active' : '' }}
      "
    >
      <svg class="icon">
        <use xlink:href="{{'#'.$key}}"/>
      </svg>
      {{$val['label']}}
    </a>
  @endforeach
  <div class="p-sidebar__ttl">
    設定
  </div>
  @foreach([
    'master'=> [
      'label' => 'マスタ',
      'path' => 'cms.master',
    ],
  ] as $key => $val)
    <a
      href="{{route($val['path'])}}"
      class="
        p-sidebar__btn
        {{ in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? 'is-active' : '' }}
      "
    >
      <svg class="icon">
        <use xlink:href="{{'#'.$key}}"/>
      </svg>
      {{$val['label']}}
    </a>
  @endforeach
</nav>