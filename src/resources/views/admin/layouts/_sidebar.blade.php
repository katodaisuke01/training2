<aside class="l-sidebar">
  @include('admin.layouts._header')
  <nav class="l-sidebar__body">    
    @foreach([
      'dashboard'=> [
        'label' => 'ダッシュボード',
        'path' => 'admin.dashboard',
        'class' => 'dashboard',
      ],
      'item'=> [
        'label' => 'ユーザー管理',
        'path' => 'admin.user',
        'class' => 'user',
      ],
      'sales'=> [
        'label' => '企業管理',
        'path' => 'admin.company',
        'class' => 'company',
      ],
      'user'=> [
        'label' => '問い合わせ管理',
        'path' => 'admin.contact',
        'class' => 'contact',
      ],
      'news'=> [
        'label' => 'メッセージ管理',
        'path' => 'admin.message',
        'class' => 'message',
      ],
      'news'=> [
        'label' => '投稿管理',
        'path' => 'admin.post',
        'class' => 'post',
      ],
      'contact'=> [
        'label' => 'マスター管理',
        'path' => 'admin.master',
        'class' => 'master',
      ],
      'contact'=> [
        'label' => '設定',
        'path' => 'admin.setting',
        'class' => 'setting',
      ],
    ] as $key => $val)
        <div class="{{$val['class']}} {{ in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? 'is-active' : '' }}">
          <a href="{{ route($val['path'] )}}">
            {{$val['label']}}
          </a>
        </div>
    @endforeach
  </nav>
  <div class="l-sidebar__foot">
  </div>
</aside>