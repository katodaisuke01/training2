<form action="" method="POST" class="p-form">
  <div class="c-concave">
    @include('component._message_form_caution')
    @csrf
    <div class="l">
      <div class="l-fix__270">
        <ul class="p-list c-full">
          <li>
            <div class="head">
              <p class="c-text">ページの公開</p>
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
            <div class="head required">
              <p>企業ロゴ</p>
            </div>
            <div class="c-input--image square">
              <input type="file" id="company_logo">
              <label for="company_logo"></label>
            </div>
          </li>
          <li>
            <div class="c-buttonArea__center">
              <label for="company_logo" class="c-button">企業ロゴを登録</label>
            </div>
            <p class="c-text__error">企業ロゴは必ず登録してください</p>
          </li>
          <li>
            <div class="head optional">
              <p>タグライン</p>
            </div>
            <div class="c-input--full">
              <input type="text" value="例）今を見つめて未来を作る" placeholder="タグラインを入力してください">
            </div>
          </li>
        </ul>
      </div>
      <div class="l-auto">
        <div class="c-full">
          <ul class="p-list">
            <li>
              <div class="head required">
                <p>会社名</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" required value="" placeholder="株式会社MIKIWAME"/>
                </div>
                <p class="c-text__error">会社名は必ず入力してください</p>
              </div>
            </li>
            <li>
              <div class="head required">
                <p>キャッチコピー</p>
              </div>
              <div class="body">
                <div class="c-input__300">
                  <input type="text" required value="" placeholder="キャッチコピー1行目を入力してください"/>
                </div>
                <div class="c-input__300">
                  <input type="text" required value="" placeholder="キャッチコピー2行目を入力してください"/>
                </div>
              </div>
              <p class="c-text__error">キャッチコピーは必ず1つは入力してください</p>
            </li>
            <li>
              <div class="head required">
                <p>トップビューの背景を選択</p>
              </div>
              <div class="body">
                <div class="c-input--image wide">
                  <input type="file" id="company_view">
                  <label for="company_view"></label>
                </div>
              </div>
              <p class="c-text__error">背景画像は必ず登録してください</p>
            </li>
            <li>
              <div class="head required">
                <p>会社の事業<small>サブタイトル</small></p>
              </div>
              <div class="body">
                <div class="c-input__column">
                  <div class="c-input--full">
                    <input type="text" required value="例）新たな一歩を踏み出す求職者のみなさんへ" placeholder="求職者への呼びかけを入力してください"/>
                  </div>
                  <div class="c-input--full">
                    <input type="text" required value="例）株式会社◯◯は環境に配慮した、さまざまな事業をおこなっております。" placeholder="会社の事業について入力してください"/>
                  </div>
                </div>
              </div>
              <p class="c-text__error">会社の事業<small>サブタイトル</small>は必ず入力してください</p>
            </li>
            <li>
              <div class="head required">
                <p>会社の事業1</p>
              </div>
              <div class="body">
                <div class="l-12 l-12--gap8">
                  <div class="l-5">
                    <div class="c-input--image">
                      <input type="file" id="company_business1">
                      <label for="company_business1"></label>
                    </div>
                  </div>
                  <div class="l-7">
                    <div class="c-input__column">
                      <div class="c-input--full">
                          <input type="text" required value="例）◯◯事業" placeholder="事業1のタイトルを入力してください"/>
                      </div>
                      <div class="c-input--full">
                        <textarea name="" id="" cols="30" rows="10" placeholder="事業1の内容を入力してください"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <p class="c-text__error">会社の事業1の各項目は必ず入力してください</p>
            </li>
            <li>
              <div class="head optional">
                <p>会社の事業2</p>
              </div>
              <div class="body">
                <div class="l-12 l-12--gap8">
                  <div class="l-5">
                    <div class="c-input--image">
                      <input type="file" id="company_business2">
                      <label for="company_business2"></label>
                    </div>
                  </div>
                  <div class="l-7">
                    <div class="c-input__column">
                      <div class="c-input--full">
                          <input type="text" required value="例）◯◯事業" placeholder="事業2のタイトルを入力してください"/>
                      </div>
                      <div class="c-input--full">
                        <textarea name="" id="" cols="30" rows="10" placeholder="事業2の内容を入力してください"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="head optional">
                <p>会社の事業3</p>
              </div>
              <div class="body">
                <div class="l-12 l-12--gap8">
                  <div class="l-5">
                    <div class="c-input--image">
                      <input type="file" id="company_business3">
                      <label for="company_business3"></label>
                    </div>
                  </div>
                  <div class="l-7">
                    <div class="c-input__column">
                      <div class="c-input--full">
                          <input type="text" required value="例）◯◯事業" placeholder="事業3のタイトルを入力してください"/>
                      </div>
                      <div class="c-input--full">
                        <textarea name="" id="" cols="30" rows="10" placeholder="事業3の内容を入力してください"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="head optional">
                <p>会社の事業4</p>
              </div>
              <div class="body">
                <div class="l-12 l-12--gap8">
                  <div class="l-5">
                    <div class="c-input--image">
                      <input type="file" id="company_business4">
                      <label for="company_business4"></label>
                    </div>
                  </div>
                  <div class="l-7">
                    <div class="c-input__column">
                      <div class="c-input--full">
                          <input type="text" required value="例）◯◯事業" placeholder="事業4のタイトルを入力してください"/>
                      </div>
                      <div class="c-input--full">
                        <textarea name="" id="" cols="30" rows="10" placeholder="事業4の内容を入力してください"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="head required">
                <p>会社での働き方<small>サブタイトル</small></p>
              </div>
              <div class="body">
                <div class="c-input__column">
                  <div class="c-input--full">
                    <input type="text" required value="例）バリューは“Initiative”、“Liberty”、“Creativity”" placeholder="働き方のコンセプトを入力してください"/>
                  </div>
                  <div class="c-input--full">
                    <input type="text" required value="例）現在、社員数30名で、平均年齢32.9歳というまだまだ若い組織です！" placeholder="働き方について入力してください"/>
                  </div>
                </div>
              </div>
              <p class="c-text__error">会社での働き方<small>サブタイトル</small>は必ず入力してください</p>
            </li>
            <li>
              <div class="head required">
                <p>会社での働き方<small>概要</small></p>
              </div>
              <div class="body">
                <div class="l-12 l-12--gap8">
                  <div class="l-6">
                    <div class="c-input--full">
                      <textarea name="" id="" cols="30" rows="10" required placeholder="会社での働き方の概要を入力してください"></textarea>
                    </div>
                  </div>
                  <div class="l-6">
                    <div class="c-input--image">
                      <input type="file" id="company_work1">
                      <label for="company_work1"></label>
                    </div>
                  </div>
                </div>
              </div>
              <p class="c-text__error">会社での働き方<small>概要</small>は必ず入力・登録してください</p>
            </li>
            <li>
              <div class="head required">
                <p>会社での働き方<small>詳細の画像</small></p>
              </div>
              <div class="body">
                <div class="c-input--image wide">
                  <input type="file" required id="company_work2">
                  <label for="company_work2"></label>
                </div>
              </div>
              <p class="c-text__error">会社での働き方<small>詳細の画像</small>は必ず登録してください</p>
            </li>
            <li>
              <div class="head optional">
                <p>会社での働き方<small>詳細のテキスト</small></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="会社での働き方の詳細を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li>
              <div class="head required">
                <p>福利厚生<small>サブタイトル</small></p>
              </div>
              <div class="body">
                <div class="c-input__column">
                  <div class="c-input--full">
                    <input type="text" required value="例）バリューは“Initiative”、“Liberty”、“Creativity”" placeholder="働き方のコンセプトを入力してください"/>
                  </div>
                  <div class="c-input--full">
                    <input type="text" required value="例）現在、社員数30名で、平均年齢32.9歳というまだまだ若い組織です！" placeholder="働き方について入力してください"/>
                  </div>
                </div>
              </div>
              <p class="c-text__error">福利厚生<small>サブタイトル</small>は必ず入力してください</p>
            </li>
            <li>
              <div class="head optional">
                <p>福利厚生<small>概要</small></p>
              </div>
              <div class="body">
                <div class="l-12 l-12--gap8">
                  <div class="l-5">
                    <div class="c-input__column">
                      <div class="c-input c-input--image">
                        <input type="file" id="company_wealth1">
                        <label for="company_wealth1"></label>
                      </div>
                      <div class="c-input c-input--image">
                        <input type="file" id="company_wealth2">
                        <label for="company_wealth2"></label>
                      </div>
                    </div>
                  </div>
                  <div class="l-7">
                    <div class="c-input--full">
                      <textarea name="" id="" cols="30" rows="10" placeholder="会社での働き方の概要を入力してください"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <p class="c-text__error">福利厚生<small>概要</small>は必ず入力・登録してください</p>
            </li>
            <li>
              <div class="head required">
                <p>目指す未来<small>サブタイトル</small></p>
              </div>
              <div class="body">
                <div class="c-input__column">
                  <div class="c-input--full">
                    <input type="text" required value="例）目指す未来はここに" placeholder="目指す未来のコンセプトを入力してください"/>
                  </div>
                  <div class="c-input--full">
                    <input type="text" required value="例）「地球に優しい」リーディングカンパニー" placeholder="目指す未来について入力してください"/>
                  </div>
                </div>
              </div>
              <p class="c-text__error">目指す未来<small>サブタイトル</small>は必ず入力してください</p>
            </li>
            <li>
              <div class="head optional">
                <p>目指す未来<small>概要</small></p>
              </div>
              <div class="body">
                <div class="l-12 l-12--gap8">
                  <div class="l-6">
                    <div class="c-input--full">
                      <textarea name="" id="" cols="30" rows="10" placeholder="会社の目指す未来を入力してください"></textarea>
                    </div>
                  </div>
                  <div class="l-6">
                    <div class="c-input--image">
                      <input type="file" id="company_work1">
                      <label for="company_work1"></label>
                    </div>
                  </div>
                </div>
              </div>
              <p class="c-text__error">目指す未来<small>概要</small>は必ず入力・登録してください</p>
            </li>
            <li>
              <div class="head required">
                <p>求人情報<small>サブタイトル</small></p>
              </div>
              <div class="body">
                <div class="c-input__column">
                  <div class="c-input--full">
                    <input type="text" required value="例）私たちはともに大きな目標に向かう仲間を探しています" placeholder="求人情報のコンセプトを入力してください"/>
                  </div>
                </div>
              </div>
              <p class="c-text__error">求人情報<small>サブタイトル</small>は必ず入力してください</p>
            </li>
            <li>
              <div class="head required">
                <p>企業情報<small>サブタイトル</small></p>
              </div>
              <div class="body">
                <div class="c-input__column">
                  <div class="c-input--full">
                    <input type="text" required value="例）会社概要をご紹介します" placeholder="企業情報のコンセプトを入力してください"/>
                  </div>
                </div>
              </div>
              <p class="c-text__error">企業情報<small>サブタイトル</small>は必ず入力してください</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="c-buttonArea__end c-mgt24">
    <a href="{{route('adminCompanyDetail')}}" class="c-button__min c-button__gray">キャンセル</a>
    <?php
      $url = $_SERVER['REQUEST_URI'];
      ?>
      @if(strstr($url,'company'))
        <a href="{{route('companySetting')}}?flash=successSave" class="c-button__lg">保存する</a>
      @elseif(strstr($url,'admin'))
        <a href="{{route('adminCompanyDetail')}}?flash=successSave" class="c-button__lg">保存する</a>
      @endif
    <!-- <input type="submit" class="c-button__lg" value="保存する"></input> -->
  </div>
</form>