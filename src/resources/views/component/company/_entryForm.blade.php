<form action="" name="" class="p-form">
  @include('component._message_form_caution')
  <div class="p-form__head">
    <ul class="p-list__wrap">
      <li>
        <div class="head">
          <p>公開ステータス</p>
        </div>
        <div class="body">
          <div class="c-radio c-switch">
            <input type="radio" name="publish" id="1" checked>
            <label for="1">公開</label>
            <input type="radio" name="publish" id="2">
            <label for="2">非公開</label>
          </div>
        </div>
      </li>
      <li>
        <div class="head">
          <p>求人カード背景カラー</p>
        </div>
        <div class="body">
          <div class="c-radio c-color">
            <input type="radio" name="color" id="white" checked>
            <label for="white"><span></span></label>
            <input type="radio" name="color" id="orange" >
            <label for="orange"><span></span></label>
            <input type="radio" name="color" id="red" >
            <label for="red"><span></span></label>
            <input type="radio" name="color" id="yellow">
            <label for="yellow"><span></span></label>
            <input type="radio" name="color" id="green" >
            <label for="green"><span></span></label>
            <input type="radio" name="color" id="aqua">
            <label for="aqua"><span></span></label>
            <input type="radio" name="color" id="violet">
            <label for="violet"><span></span></label>
          </div>
        </div>
      </li>
      <li class="c-full">
        <div class="head required">
          <p>求人タイトル</p>
        </div>
        <div class="body">
          <div class="c-input--full">
            <input type="text" placeholder="求人募集のキャッチコピーとなるタイトルを入力してください" value="">
          </div>
          <p class="c-text__error">この項目には必ず入力してください</p>
        </div>
      </li>
      <li class="c-full">
        <div class="head required">
          <p>求人タイトル捕捉（100字程度）</p>
        </div>
        <div class="body">
          <div class="c-input--full">
            <input type="text" placeholder="タイトルを補足説明する、求人を魅力的に見せるテキストを入力してください" value="">
          </div>
          <p class="c-text__error">この項目には必ず入力してください</p>
        </div>
      </li>
    </ul>
  </div>
  <div class="p-form__body">
    <div class="c-box bg-fff">
      <ul class="p-list">
        <li>
          <div class="head required">
            <p>トップ画像 <small>1画像のファイルサイズは2MB以内、画像1に登録したものがカードにも使用されます</small></p>
          </div>
          <div class="body">
            <ul class="p-list__wrap p-list__job--pic">
              <li>
                <div class="c-input--file">
                  <input type="file" id="top_1">
                  <label for="top_1"></label>
                </div>
              </li>
              <li>
                <div class="c-input--file">
                  <input type="file" id="top_2">
                  <label for="top_2"></label>
                </div>
              </li>
              <li>
                <div class="c-input--file">
                  <input type="file" id="top_3">
                  <label for="top_3"></label>
                </div>
              </li>
              <li>
                <div class="c-input--file">
                  <input type="file" id="top_4">
                  <label for="top_4"></label>
                </div>
              </li>
              <li>
                <div class="c-input--file">
                  <input type="file" id="top_5">
                  <label for="top_5"></label>
                </div>
              </li>
              <li>
                <a data-remodal-target="modal_select_dummy" class="c-button__square">画像が用意できていない<br />場合には仮の画像を<br />こちらから選択してください<br /><small>（選択した場合画像は1枚のみ）</small></a>
              </li>
            </ul>
            <p class="c-text__error">この項目は必ず一つ以上選択してください</p>
            <p class="c-text__error">1画像のファイルサイズは2MB以内としてください</p>
          </div>
        </li>
        <li>
          <div class="head required">
            <p>仕事に求めるやりがい（5個まで設定可）</p>
          </div>
          <div class="body">
            @include('component.form._star')
            <p class="c-text__error">この項目は必ず一つ以上選択してください</p>
          </div>
        </li>
        <li>
          <div class="head optional">
            <p>職務内容</p>
          </div>
          <div class="body">
            <div class="c-input--full">
              <textarea name="" placeholder="職務の魅力的な説明を入力してください（推奨文字数400文字以上）" cols="30" rows="10"></textarea>
            </div>
          </div>
        </li>
        <li>
          <div class="head optional">
            <p>職務内容をイメージさせる画像とその説明　 <small>1画像のファイルサイズは2MB以内</small></p>
          </div>
          <div class="body">
            <div class="l-12 l-12--gap16">
              <div class="l-6">
                <div class="c-input__column">
                  <div class="c-input c-input--file">
                    <input type="file" id="job_1">
                    <label for="job_1"></label>
                  </div>
                  <div class="c-input">
                    <textarea name="" id="" cols="30" rows="10" placeholder="画像の説明を入力してください（推奨文字数100文字以上）"></textarea>
                  </div>
                </div>
              </div>
              <div class="l-6">
                <div class="c-input__column">
                  <div class="c-input c-input--file">
                    <input type="file" id="job_2">
                    <label for="job_2"></label>
                  </div>
                  <div class="c-input">
                    <textarea name="" id="" cols="30" rows="10" placeholder="画像の説明を入力してください（推奨文字数100文字以上）"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="c-full">
          <div class="head optional">
            <p>職務内容をイメージさせる画像とその説明　 <small>1画像のファイルサイズは2MB以内</small></p>
          </div>
          <div class="body">
            <div class="c-input__column">
              <div class="c-input c-input--file">
                <input type="file" id="job_1">
                <label for="job_1"></label>
              </div>
              <div class="c-input__600">
                    <textarea name="" id="" cols="30" rows="10" placeholder="画像の説明を入力してください（推奨文字数100文字以上）"></textarea>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="l-12 l-12--gap16">
            <div class="l-6">
              <div class="head required">
                <p>職種</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="例）営業職">
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </div>
            <div class="l-6">
              <div class="head required">
                <p>雇用区分</p>
              </div>
              <div class="body">
                <div class="c-input__select">
                  <select>
                    <option value="">雇用区分を選択</option>
                    <option value="">正社員</option>
                    <option value="">契約社員</option>
                    <option value="">派遣社員</option>
                    <option value="">アルバイト</option>
                    <option value="">その他</option>
                  </select>
                </div>
                <div class="c-input__select">
                  <select>
                    <option value="">雇用区分を選択</option>
                    <option value="">正社員</option>
                    <option value="">契約社員</option>
                    <option value="">派遣社員</option>
                    <option value="">アルバイト</option>
                    <option value="">その他</option>
                  </select>
                </div>
              </div>
              <p class="c-text__error">この項目は必ず一つ以上選択してください</p>
            </div>
          </div>
        </li>
        <li>
          <div class="l-12 l-12--gap16">
            <div class="l-6">
              <div class="head optional">
                <p>職務について</p>
              </div>
              <div class="body">
                <div class="c-input--center">
                  <p>勤務時間</p>
                  <div class="c-input__100">
                    <input type="time" placeholder="09:00" value="09:00">
                  </div>
                  <p>〜</p>
                  <div class="c-input__100">
                    <input type="time" placeholder="18:00" value="18:00">
                  </div>
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" cols="30" rows="10" placeholder="職務についての説明を入力してください（推奨文字数200文字以上）"></textarea>
                </div>
              </div>
            </div>
            <div class="l-6">
              <div class="head optional">
                <p>職務について</p>
              </div>
              <div class="body">
                <div class="c-input--center">
                  <p>想定年収</p>
                  <div class="c-input__70">
                    <input type="number" placeholder="400" value="400">
                  </div>
                  <p>〜</p>
                  <div class="c-input__70">
                    <input type="number" placeholder="600" value="600">
                  </div>
                  <p class="c-text__unit">万円</p>
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" cols="30" rows="10" placeholder="給与についての説明を入力してください（推奨文字数200文字以上）"></textarea>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="l-12 l-12--gap16">
            <div class="l-6">
              <div class="head optional">
                <p>選考プロセス</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" cols="30" rows="10" placeholder="選考プロセスについての説明を入力してください（推奨文字数200文字以上）"></textarea>
                </div>
              </div>
            </div>
            <div class="l-6">
              <div class="head optional">
                <p>勤務地</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" cols="30" rows="10" placeholder="勤務地についての説明を入力してください（推奨文字数200文字以上）"></textarea>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="l-12 l-12--gap16">
            <div class="l-6">
              <div class="head optional">
                <p>待遇・福利厚生</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" cols="30" rows="10" placeholder="待遇・福利厚生についての説明を入力してください（推奨文字数200文字以上）"></textarea>
                </div>
              </div>
            </div>
            <div class="l-6">
              <div class="head optional">
                <p>休日・休暇</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" cols="30" rows="10" placeholder="休日・休暇についての説明を入力してください（推奨文字数200文字以上）"></textarea>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="l-12 l-12--gap16">
            <div class="l-6">
              <div class="head optional">
                <p>教育制度</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" cols="30" rows="10" placeholder="教育制度についての説明を入力してください（推奨文字数200文字以上）"></textarea>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="head optional">
            <p>こだわり条件</p>
          </div>
          <div class="body">
            @include('component.form._other')
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="p-form__foot">
    <div class="c-buttonArea__end">
      <a data-remodal-target="modal_delete" class="c-button__gray c-button__min">削除する</a>
      <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        @if(strstr($url,'company'))
          <a href="{{route('companyEntry')}}?flash=successSave" class="c-button__lg">保存する</a>
        @elseif(strstr($url,'admin'))
          <a href="{{route('adminCompanyAccount')}}?flash=successSave" class="c-button__lg">保存する</a>
        @endif
      <!-- <input type="submit" class="c-button" value="保存する"> -->
    </div>
  </div>
</form>