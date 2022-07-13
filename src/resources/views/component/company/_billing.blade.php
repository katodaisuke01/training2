
  <ul class="p-list">
    <li>
      <div class="head required">
        <p>会社名</p>
      </div>
      <div class="body">
        <div class="c-input--full">
          <input type="text" required placeholder="例）株式会社MIKIWAME" value="">
        </div>
      </div>
    </li>
    <li>
      <div class="head optional">
        <p>担当者名</p>
      </div>
      <div class="body">
        <div class="c-input__200">
          <input type="text" placeholder="例）山田 太郎" value="">
        </div>
      </div>
    </li>
    <li>
      <div class="head optional">
        <p>メールアドレス</p>
      </div>
      <div class="body">
        <div class="c-input__300">
          <input type="email" placeholder="sample@mail.com" value="">
        </div>
      </div>
    </li>
    <li>
      <div class="head optional">
        <p>電話番号</p>
      </div>
      <div class="body">
        <div class="c-input__200">
          <input type="tel" placeholder="0312345678" value="">
        </div>
      </div>
    </li>
    <li>
      <div class="head optional">
        <p>請求先住所</p>
      </div>
      <div class="body">
        <div class="c-input__column">
          <div class="c-input__select c-input__150">
            @include('component.form.select._select-prefecture')
          </div>
          <div class="c-input__300">
            <input type="text" placeholder="中央区銀座1-2-3" value="">
          </div>
          <div class="c-input__300">
            <input type="text" placeholder="中央区銀座ビルディング10F" value="">
          </div>
        </div>
      </div>
    </li>
  </ul>