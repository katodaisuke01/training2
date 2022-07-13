      <form action="" name="" class="p-form">
        <div class="l">
          <div class="l-auto">
            <div class="c-concave">
              @include('component._message_form_caution')
              <ul class="p-list">
                <li class="c-full">
                  <div class="head required">
                    <p>投稿タイトル</p>
                  </div>
                  <div class="body">
                    <div class="c-input--full">
                      <input type="text" placeholder="投稿のタイトルを入力してください" value="">
                    </div>
                    <p class="c-text__error">この項目は必ず入力してください</p>
                  </div>
                </li>
                <li>
                  <div class="head optional">
                    <p>SEO keywordタグ</p>
                  </div>
                  <div class="body">
                    <div class="c-input c-input--full">
                      <input type="text" placeholder="keywordsを入力してください" value="">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head optional">
                    <p>URLエイリアス設定</p>
                  </div>
                  <div class="body">
                    <div class="c-input c-input__300">
                      <input type="text" placeholder="URLエイリアスを入力してください" value="">
                    </div>
                  </div>
                </li>
                <li class="c-full">
                  <div class="head required">
                    <p>投稿内容</p>
                  </div>
                  <div class="body">
                    @include ('component.admin._editor')
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="l-fix__300">
            <div class="c-concave">
              <ul class="p-list">
                <li>
                  <div class="head required">
                    <p>サムネイル設定</p>
                  </div>
                  <div class="body">
                    <p class="c-text__min">拡張子はjpgまたはpng、2MB以内のサイズとしてください</p>
                    <div class="c-input--file">
                      <input type="file" id="post_thumbnail" value="">
                      <label for="post_thumbnail"></label>
                    </div>
                    <p class="c-text__error">ファイルの拡張子はjpgまたはpng、2MB以内のサイズとしてください</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p>公開ステータス</p>
                  </div>
                  <div class="body">
                    <div class="c-radio c-switch">
                      <input type="radio" name="publish" id="1">
                      <label for="1">公開</label>
                      <input type="radio" name="publish" id="2" checked>
                      <label for="2">非公開</label>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="c-buttonArea__center">
                  <?php
                    $url = $_SERVER['REQUEST_URI'];
                    ?>
                    @if(strstr($url,'company'))
                      <a href="{{ route('companyPost') }}?flash=successSave" class="c-button">保存する</a>
                    @elseif(strstr($url,'admin'))
                      <a href="{{ route('adminCompanyPost') }}?flash=successSave" class="c-button">保存する</a>
                    @endif
                    <!-- <input type="submit" class="c-button" value="保存する"> -->
                    <a data-remodal-target="#modal_delete" class="c-button__gray c-button__min">削除する</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </form>