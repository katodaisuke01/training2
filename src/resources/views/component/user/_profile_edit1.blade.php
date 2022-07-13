  <form action="" method="POST">
    @include('component._message_form_caution')
    @csrf
    <div class="l">
      <div class="l-fix__270">
        <ul class="p-list">
          <li>
            <div class="c-box bg-fff shadow">
              <div class="c-input--image c-user">
                <input type="file" id="user_pic">
                <label for="user_pic"></label>
              </div>
            </div>
          </li>
          <li>
            <div class="c-buttonArea__center">
              <label for="user_pic" class="c-button">本人画像を登録</label>
            </div>
          </li>
          <li>
            <div class="c-radio c-switch" style="margin:0 auto">
              <input type="radio" name="publish_photo" id="publish_photo_1" checked>
              <label for="publish_photo_1">公開</label>
              <input type="radio" name="publish_photo" id="publish_photo_2">
              <label for="publish_photo_2">非公開</label>
            </div>
            <p class="c-text__error">画像は2MB以内のJPG、PNGで登録してください</p>
            <p class="c-text__min">登録画像は2MB以内のJPG、PNGで登録してください</p>
            <p class="c-text__min">プライバシー保護の観点から、本人画像非公開ご希望の場合は下記の仮画像選択も可能です</p>
          </li>
          <li>
            <div class="c-box c-box__200 bg-fff shadow">
              <div class="c-input--image c-user">
                <input type="file" id="dummy_pic">
                <label data-remodal-target="modal_select_thumbnail" for="dummy_pic" style="background-image:"></label>
              </div>
            </div>
          </li>
          <li>
            <div class="c-buttonArea__center">
              <a data-remodal-target="modal_select_thumbnail" class="c-button__line">仮画像を選択</a>
            </div>
          </li>
          <li>
            <div class="head">
              <p>ファイルアップロード</p>
            </div>
            <div class="body">
              <label for="file1" class="c-button__line c-button__min">
                <input type="file" name="file" id="file1" style="display:block">
              </label>
              <p class="c-text__min">ファイルは5MB以内のJPG、PNG、PDF、Word、Excel、PowerPointで登録してください</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="l-auto">
        <div class="p-form c-full">
          <div class="p-form__body c-concave">
            <div class="c-mgb16">
              <p class="c-text__lv5">※ 掲載中でも本名、メールアドレス、電話番号は企業には公開されません</p>
              <p class="c-text__lv5">※ 応募した企業には登録画像が公開されます。</p>
            </div>
            <ul class="p-list__row">
              <li>
                <div class="head">
                  <p class="c-text__">求職者情報の掲載</p>
                </div>
                <div class="body">
                  <div class="c-radio c-switch">
                    <input type="radio" name="publish_profile" id="publish_profile_1" checked>
                    <label for="publish_profile_1">掲載</label>
                    <input type="radio" name="publish_profile" id="publish_profile_2">
                    <label for="publish_profile_2">非掲載</label>
                  </div>
                </div>
              </li>
              <li>
                <div class="head">
                  <p class="c-text__">匿名スカウトサービス</p>
                </div>
                <div class="body">
                  <div class="c-radio">
                    <input type="radio" name="anonymous" id="1" checked>
                    <label for="1">利用する</label>
                    <input type="radio" name="anonymous" id="2">
                    <label for="2">利用しない</label>
                  </div>
                </div>
              </li>
              <li>
                <div class="head">
                  <p>直接エントリー</p>
                </div>
                <div class="body">
                  <div class="c-radio">
                    <input type="radio" name="directEntry" id="directEntry_yes" checked>
                    <label for="directEntry_yes">利用する</label>
                    <input type="radio" name="directEntry" id="directEntry_no">
                    <label for="directEntry_no">利用しない</label>
                  </div>
                </div>
              </li>
              <li>
                <div class="head">
                  <p>エージェント人材紹介</p>
                </div>
                <div class="body">
                  <div class="c-radio">
                    <input type="radio" name="recruitment" id="1" checked>
                    <label for="1">利用する</label>
                    <input type="radio" name="recruitment" id="2">
                    <label for="2">利用しない</label>
                  </div>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>氏名</p>
                </div>
                <div class="body">
                  <div class="c-input c-input__half">
                    <div class="c-input">
                      <input type="text" required name="name" value="" placeholder="山田"/>
                    </div>
                    <div class="c-input">
                      <input type="text" required name="name" value="" placeholder="太郎"/>
                    </div>
                  </div>
                  <p class="c-text__error">この項目は必ず入力してください</p>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>ふりがな</p>
                </div>
                <div class="body">
                  <div class="c-input c-input__half">
                    <div class="c-input">
                      <input type="text" required name="name" value="" placeholder="やまだ"/>
                    </div>
                    <div class="c-input">
                      <input type="text" required name="name" value="" placeholder="たろう"/>
                    </div>
                  </div>
                  <p class="c-text__error">この項目は必ず入力してください</p>
                </div>
              </li>
              <li>
                <div class="head">
                  <p>性別</p>
                </div>
                <div class="body">
                  <div class="c-radio">
                    <input type="radio" name="gender" id="man" checked>
                    <label for="man">男性</label>
                    <input type="radio" name="gender" id="woman">
                    <label for="woman">女性</label>
                    <input type="radio" name="gender" id="others">
                    <label for="others">その他</label>
                  </div>
                </div>
              </li>
              <li>
                <div class="head">
                  <p>配偶者</p>
                </div>
                <div class="body">
                  <div class="c-radio">
                    <input type="radio" name="marriage" id="1" >
                    <label for="1">あり</label>
                    <input type="radio" name="marriage" id="2" checked>
                    <label for="2">なし</label>
                  </div>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>生年月日</p>
                </div>
                <div class="body">
                  <div class="c-input">
                    <div class="c-input__select c-input__100">
                      @include('component.form.select._select-year')
                    </div>
                    <div class="c-input__select c-input__100">
                      @include('component.form.select._select-month')
                    </div>
                    <div class="c-input__select c-input__100">
                      @include('component.form.select._select-day')
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>現住所<br /><span class="c-text__note">都道府県のみ公開されます</span></p>
                </div>
                <div class="body">
                  <div class="c-input">
                    <div class="c-input__select c-input__150 c-input">
                      @include('component.form.select._select-prefecture')
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="head ">
                </div>
                <div class="body">
                  <div class=" c-input--full">
                    <input type="text" id="" required value="" placeholder="市区町村 番地"/>
                  </div>
                </div>
              </li>
              <li>
                <div class="head ">
                </div>
                <div class="body">
                  <div class="c-input c-input--full">
                    <input type="text" id="" required value="" placeholder="建物名"/>
                  </div>
                  <p class="c-text__error">この項目は必ず入力してください</p>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>メールアドレス</p>
                </div>
                <div class="body">
                  <div class="c-input c-input__300">
                    <input type="email" id="" required value="" placeholder="your-info@mail.co.jp"/>
                  </div>
                  <p class="c-text__error">この項目は必ず入力してください</p>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>電話番号</p>
                </div>
                <div class="body">
                  <div class="c-input c-input__300">
                    <input type="tel" id="" required value="" placeholder="09012345678"/>
                  </div>
                  <p class="c-text__error">この項目は必ず入力してください</p>
                </div>
              </li>
              <li>
                <div class="head optional">
                  <p>現（前）年収</p>
                </div>
                <div class="body">
                  <div class="c-input__end">
                    <div class="c-input c-input__150">
                      <input type="number" id="" required value="" placeholder="400"/>
                    </div>
                    <span class="c-text__unit">万円</span>
                  </div>
                  <p class="c-text__error">この項目は半角数字で入力してください</p>
                </div>
              </li>
              <li>
                <div class="head optional">
                  <p>最終学歴</p>
                </div>
                <div class="body">
                  <div class="c-input--full c-input">
                    <input type="text" id="" required value="" placeholder="コロンビア大学経営大学院修士課程"/>
                  </div>
                </div>
              </li>
              <li>
                <div class="head">
                </div>
                <div class="body">
                  <div class="c-input">
                    <div class="c-input__select c-input__100">
                      @include('component.form.select._select-year')
                    </div>
                    <div class="c-input__select c-input__100">
                      @include('component.form.select._select-month')
                    </div>
                    <div class="c-input__select c-input__100">
                      <select name="" id="">
                        <option value="">卒業</option>
                        <option value="">卒業見込</option>
                      </select>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="head optional">
                  <p>語学</p>
                </div>
                <div class="body">
                  <div class="c-input--full c-input">
                    <input type="text" id="" required value="" placeholder="日本語 英語 スペイン語"/>
                  </div>
                </div>
              </li>
              <li>
                <div class="head optional">
                  <p>資格</p>
                </div>
                <div class="body">
                  <div class="c-input--full c-input">
                    <textarea id="" cols="30" rows="10" placeholder="オラクルマスターゴールド／日商簿記検定1級／秘書検定1級等"></textarea>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="p-form__foot">
            <div class="c-buttonArea__center c-column">
              <?php
              $url = $_SERVER['REQUEST_URI'];
              ?>
              @if(strstr($url,'mypage'))
                <a href="{{route('mypage')}}?flash=successSave" class="c-button__lg">入力内容を保存</a>
              @elseif(strstr($url,'admin'))
                <a href="{{route('userDetail')}}?flash=successSave" class="c-button__lg">入力内容を保存</a>
              @endif
              <!-- <input type="submit" class="c-button__lg" value="入力内容を保存"> -->
              <a class="c-button__min c-button__gray" href="javascript:history.back()">キャンセル</a>
            </div>
          </div>
        </div>
      </div>
    </form>