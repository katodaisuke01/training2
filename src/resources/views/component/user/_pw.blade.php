<form action="{{ route('login') }}" method="POST">
  @csrf
  <ul class="p-list__row">
    <li>
      <div class="head required">
        <p>パスワード</p>
      </div>
      <div class="body">
        <div class="c-input--full c-input--pw">
          <input type="password" id="password" name="password" placeholder="8文字以上の半角英数字" value=""/>
          <span><i class="c-icon__eye"></i></span>
        </div>
        <p class="c-text__error">この項目は8文字以上の半角英数字で入力してください</p>
      </div>
    </li>
    <li>
      <div class="head required">
        <p>パスワード<br /><small>（確認用）</small></p>
      </div>
      <div class="body">
        <div class="c-input--full c-input--pw">
          <input type="password" id="password" name="password" placeholder="8文字以上の半角英数字" value=""/>
          <span><i class="c-icon__eye"></i></span>
        </div>
        <p class="c-text__error">同様のパスワードを入力してください</p>
      </div>
    </li>
  </ul>
</form>