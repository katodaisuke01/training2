<aside class="l-sidebar">
  <div class="l-sidebar__head">
    <a href="{{ route('admin.index') }}">
      <img src="{{asset('../image/admin/logo/logo.png')}}" alt="ロゴ" class="c-logo">
    </a>
  </div>
  <nav class="l-sidebar__body">
    <?php
      function navList(){
        return [
          ['class' => 'dashboard','link' => 'user','text' => 'ダッシュボード'],
          ['class' => 'user','link' => 'user','text' => 'ユーザー管理'],
          ['class' => 'company','link' => 'user','text' => '企業管理'],
          ['class' => 'contact','link' => 'user','text' => '問い合わせ管理'],
          ['class' => 'master','link' => 'user','text' => 'マスター管理'],
          ['class' => 'message','link' => 'user','text' => 'メッセージ管理'],
          ['class' => 'post','link' => 'user','text' => '投稿管理'],
          ['class' => 'setting','link' => 'user','text' => '設定']
        ];
      }
    ?>
    @php($navList = navList())
    @foreach($navList as $nav)
      <div class="{{ $nav['class'] }}">
        <a href="{{ $nav['link'] }}">
          {{ $nav['text'] }}
        </a>
      </div>
    @endforeach
  </nav>
  <div class="l-sidebar__foot">
      <div class="c-buttonArea">
        <a href="" class="c-button__line c-button__min">ログアウト</a>
      </div>
  </div>
</aside>