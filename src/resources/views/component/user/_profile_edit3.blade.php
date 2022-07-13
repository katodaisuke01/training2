
  <form action="" method="POST" class="p-form">
    <div class="p-form__body">
      @csrf
      <ul class="p-list p-list__history">
        <li class="history">
          <ul class="p-list__wrap">
            <li>
              <div class="head required">
                <p class="">会社名</p>
              </div>
              <div class="body">
                <div class="c-input__300">
                  <input type="text" name="" value="" placeholder="株式会社ミキワメ">
                </div>
              </div>
              <p class="c-text__error">この項目は必ず入力してください</p>
            </li>
            <li>
              <div class="head required">
                <p class="">職種</p>
              </div>
              <div class="body">
                <div class="c-input__300">
                  <input type="text" name="" value="" placeholder="営業職">
                </div>
              </div>
              <p class="c-text__error">この項目は必ず入力してください</p>
            </li>
            <li class="c-full">
              <div class="head required">
                <p class="">在籍期間</p>
              </div>
              <div class="body">
                <div class="c-input--center">
                  <div class="c-input__select c-input__100">
                    <select>
                      <option>2010年</option>
                      <option>2011年</option>
                      <option>2012年</option>
                    </select>
                  </div>
                  <div class="c-input__select c-input__70">
                    <select>
                      <option>1月</option>
                    </select>
                  </div>
                  <span class="c-wave">〜</span>
                  <div class="c-input__select c-input__100">
                    <select>
                      <option>2010年</option>
                      <option>2011年</option>
                      <option>2012年</option>
                    </select>
                  </div>
                  <div class="c-input__select c-input__70">
                    <select>
                      <option>現職</option>
                      <option>1月</option>
                    </select>
                  </div>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
            <li class="c-full">
              <div class="head required">
                <p class="">職務内容</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" name="" value="" placeholder="職務の概要について記載してください。（500文字以上推奨）">
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
            <li class="c-full">
              <div class="head required">
                <p class="">職務詳細</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="職務の詳細や評価について記載してください。（500文字以上推奨）"></textarea>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
            <li class="c-full">
              <div class="head required">
                <p class="">退職理由</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="【退職理由】について記載してください。（100文字以上推奨）"></textarea>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="p-form__foot">
      <div class="c-buttonArea__center">
        <div class="c-icon__w40 c-icon--plus" id="button--add"></div>
      </div>
      <div class="c-buttonArea__center c-column c-mgt24">
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
  </form>


<!-- ! 個別スクリプト -->
<!-- ! フォーム追加 -->
<script>
  $("#button--add").click(function(){
    $('.p-list').append(
      '<li class="history">'+
        '<ul class="p-list__wrap">'+
          '<li>'+
            '<div class="head required">'+
              '<p class="">会社名</p>'+
            '</div>'+
            '<div class="body">'+
              '<div class="c-input__300">'+
                '<input type="text" name="" value="" placeholder="株式会社ミキワメ">'+
              '</div>'+
            '</div>'+
            '<p class="c-text__error">この項目は必ず入力してください</p>'+
          '</li>'+
          '<li>'+
            '<div class="head required">'+
              '<p class="">職種</p>'+
            '</div>'+
            '<div class="body">'+
              '<div class="c-input__300">'+
                '<input type="text" name="" value="" placeholder="営業職">'+
              '</div>'+
            '</div>'+
            '<p class="c-text__error">この項目は必ず入力してください</p>'+
          '</li>'+
          '<li class="c-full">'+
            '<div class="head required">'+
              '</div>'+
                '<div class="c-input--center">'+
                  '<div class="c-input__select c-input__100">'+
                    '<select>'+
                      '<option>2010年</option>'+
                    '</select>'+
                  '</div>'+
                  '<div class="c-input__select c-input__70">'+
                    '<select>'+
                      '<option>1月</option>'+
                    '</select>'+
                  '</div>'+
                '<span class="c-wave">〜</span>'+
                '<div class="c-input__select c-input__100">'+
                  '<select>'+
                    '<option>2010年</option>'+
                  '</select>'+
                '</div>'+
                '<div class="c-input__select c-input__70">'+
                  '<select>'+
                    '<option>1月</option>'+
                  '</select>'+
                '</div>'+
              '</div>'+
              '<p class="c-text__error">この項目は必ず入力してください</p>'+
            '</div>'+
          '</li>'+
          '<li class="c-full">'+
            '<div class="head required">'+
              '<p class="">職務内容</p>'+
            '</div>'+
            '<div class="body">'+
              '<div class="c-input--full">'+
                '<input type="text" name="" value="" placeholder="職務の概要について記載してください。（500文字以上推奨）">'+
              '</div>'+
              '<p class="c-text__error">この項目は必ず入力してください</p>'+
            '</div>'+
          '</li>'+
          '<li class="c-full">'+
            '<div class="head required">'+
              '<p class="">職務詳細</p>'+
            '</div>'+
            '<div class="body">'+
              '<div class="c-input--full">'+
                '<textarea name="" id="" cols="30" rows="10" placeholder="職務の詳細や評価について記載してください。（500文字以上推奨）"></textarea>'+
              '</div>'+
              '<p class="c-text__error">この項目は必ず入力してください</p>'+
            '</div>'+
          '</li>'+
          '<li class="c-full">'+
            '<div class="head required">'+
              '<p class="">退職理由</p>'+
            '</div>'+
            '<div class="body">'+
              '<div class="c-input--full">'+
                '<textarea name="" id="" cols="30" rows="10" placeholder="【退職理由】について記載してください。（100文字以上推奨）"></textarea>'+
              '</div>'+
              '<p class="c-text__error">この項目は必ず入力してください</p>'+
            '</div>'+
          '</li>'+
        '</ul>'+
        '<div class="c-icon__w40 c-icon--minus button--delete"></div>'+
      '</li>'
      );
  });
</script>
<!-- ! フォーム削除 -->
<script>
  $(document).on('click', '.button--delete', function(){
    let This = $(this),
        Wrap = This.parent(),
        Pare = This.parents('li');       
    // 削除
    Wrap.remove();
    let Id = Pare.find('.p-list > li').length + 1;
    for(let i = 0; i < Id; i++){
      let Num = i + 1;
      // IDの場合
      if(Pare.has('.history')){
        This.parents('.history').find('.c-input > input').eq(i).find('input').attr('id','history_'+ Num);
      }
    }
  });
</script>