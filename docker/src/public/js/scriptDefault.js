// レスポンシブ メニュー
//   開く
		  wow = new WOW(
		    {
		    boxClass: 'wow', // default
		    animateClass: 'animated', // default
		    offset:0// アニメーションをスタートさせる距離
		    }
		  );
		  wow.init();

		$('#nav_toggle').on('click',function(){
		  $('#nav_toggle > span').toggleClass('close');
		  $('.navi').fadeToggle(0);
		});
  //閉じる
  $('.p-list__nav > li > a').on('click',function(){
    $('#nav_toggle > span').removeClass('close');
      if (window.matchMedia('(max-width: 900px)').matches) {
        $('.navi').fadeToggle(0);
    }
  });

//  ナビアクティブ時の表示
    jQuery('#navi a').each(function(){
        var $href = $(this).attr('href');
        if(location.href.match($href)) {
        jQuery(this).parent('li').addClass('current');
        } else {
        jQuery(this).removeClass('current');
        }
    })

    // $('.p-sidebar__item').mouseover(function(e) {
    //   $('.p-sidebar__megaMenu',this).addClass('view');
    // }).mouseout(function(e) {
    //   $('.p-sidebar__megaMenu',this).removeClass('view');
    // });

//画像アップロード
  $('.c-input__file input[type=file],.c-input__image input[type=file]').change(function() {
    var This = $(this);
    var file = $(this).prop('files')[0];
    // 画像表示
    var reader = new FileReader();
    reader.onload = function() {
      This.parent().find('label').attr('style', 'background-image: url('+reader.result+')');
    }
    reader.readAsDataURL(file);
  });

//スムーズスクロール
$(function(){
  // #で始まるリンクをクリックしたら実行されます
  $('a[href^="#"].scroll').click(function() {
    // スクロールの速度
    var speed = 500; // ミリ秒で記述
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});

//テーブルのtrにリンク
  $('tr[data-href]').click( function() {
      window.location = $(this).attr('data-href');
  }).find('a,.c-checkbox,.c-input').hover( function() {
      $(this).parents('tr').unbind('click');
  }, function() {
      $(this).parents('tr').click( function() {
          window.location = $(this).attr('data-href');
      });
  });
//リストのliにリンク
$('li[data-href]').click( function() {
    window.location = $(this).attr('data-href');
}).find('a,.c-checkbox,.c-input').hover( function() {
    $(this).parents('li').unbind('click');
}, function() {
    $(this).parents('li').click( function() {
        window.location = $(this).attr('data-href');
    });
});
//liを動かせる
$(function() {
  $('#sortable-list').sortable({
      items: 'li',
      cursor: 'move',
      opacity: 0.5
  });
$('#sortable-first').disableSelection();
});

// クリックでクラス付与
$('.updown').click(function(){
  $(this).toggleClass('change');
});
// クリックでクラス付与 チェックボタン専用
$(document).on('click', '.c-button__check', (function(){
  $(this).addClass('checked');
}));
// パスワードの可視or不可視
$(".c-icon__eye").click(function () {
   //アイコンの切り替え
   $(this).toggleClass("visible");
   //入力フォームの取得
   var input = $(this).parent().prev("input");
   //パスワードの表示切替
   if (input.attr("type") == "password") {
      input.attr("type", "text");
   } else {
      input.attr("type", "password");
   }
});

  // タブ切り替えスクリプト
  $(function() {
    let tabs = $(".c-list__tab > li"); // c-list__tab > liのクラスを全て取得し、変数c-list__tab > lisに配列で定義
    $(".c-list__tab > li").on("click", function() { // c-list__tab > liをクリックしたらイベント発火
      $(".active").removeClass("active"); // activeクラスを消す
      $(this).addClass("active"); // クリックした箇所にactiveクラスを追加
      const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
      $(".c-list__content > li").removeClass("show").eq(index).addClass("show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
    })
  })
  $(function() {
    let tabs = $(".p-list > li.tab"); // c-list > liのクラスを全て取得し、変数c-list > lisに配列で定義
    $(".p-list > li.tab").on("click", function() { // c-list > liをクリックしたらイベント発火
      $(".switch").removeClass("switch"); // switch
      $(this).addClass("switch"); // クリックした箇所にactiveクラスを追加
      const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
      $(".p-list > li").removeClass("show").eq(index).addClass("show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
    })
  })
// <!— ! セレクト2 —————————————————————————————— —>
  if($('.select2').length){
    $(document).ready(function() { $(".select2").select2(); });
  }
  // <!— ! datepicker デイトピッカー —————————————————————————————— —>
  $(function() {
    $(".datetimepicker").datetimepicker({});
  });
  // <!— ! datepicker デイトピッカー —————————————————————————————— —>
  $(function() {
    $(".datepicker").datepicker({});
  });
  // <!— ! timepicker —————————————————————————————— —>
  var options = {
    now: "10:00", //hh:mm 24 hour format only, defaults to current time
    twentyFour: true, //Display 24 hour format, defaults to false
    upArrow: 'wickedpicker__controls__control-up', //The up arrow class selector to use, for custom CSS
    downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
    close: 'wickedpicker__close', //The close class selector to use, for custom CSS
    hoverState: 'hover-state', //The hover state class to use, for custom CSS
    title: 'Timepicker', //The Wickedpicker's title,
    showSeconds: false, //Whether or not to show seconds,
    secondsInterval: 10, //Change interval for seconds, defaults to 1 ,
    minutesInterval: 10, //Change interval for minutes, defaults to 1
    beforeShow: null, //A function to be called before the Wickedpicker is shown
    show: null, //A function to be called when the Wickedpicker is shown
    clearable: false, //Make the picker's input clearable (has clickable "x")
};
  $('.timepicker').wickedpicker(options);

// <!— ! datepicker デイトピッカー_範囲 —————————————————————————————— —>
 var format = 'yy-mm-dd';
  // 開始日の設定
  var start = $("[name=start]").datepicker({
      dateFormat: 'yy-mm-dd',
      step:30,
  }).on("change", function () {
      // 開始日が選択されたとき
      // 終了日の選択可能最小日を設定
      end.datepicker("option", "minDate", getDate(this));
  });
  // 終了日の設定
  var end = $("[name=end]").datepicker({
      dateFormat: 'yy-mm-dd',
      step:30,
  }).on("change", function () {
      // 開始日が選択されたとき
      // 開始日の選択可能最大日を設定
      start.datepicker("option", "maxDate", getDate(this));
  });
  /**
   * 選択された日付をminDate,maxDate用に変換
   */
  function getDate(element) {
      var date;
      try {
          date = $.datepicker.parseDate(format, element.value);
      } catch (error) {
          date = null;
      }
      return date;
  }



// <!-- フラッシュを閉じる -->
  $(document).on('click', '.list_flash > li', function() {
      $(this).addClass('flash_remove');
    }
  );


// <!-- フラッシュの表示 -->
    $(function() {
      var query = location.search;
      var value = query.split('=');
      if(decodeURIComponent(value[1]) == 'successReset' || decodeURIComponent(value[1]) == 'success_reissue' ||  decodeURIComponent(value[1]) == 'on') {
        $('.area_flash').addClass('flash_on');
      }
    });

    var ctx = document.getElementById("pieChart1");
    var pieChart1 = new Chart(ctx, {
       type: 'pie',
       data: {
          labels: ["荷受け済み", "仕分け待ち", "店舗別仕分け済み", "摘取り済み", "出荷チェック済み"], //データ項目のラベル
          datasets: [{
             backgroundColor: [
                "#F96384",
                "#FB9F40",
                "#FDCD55",
                "#4BC0C0",
                "#36A2EB"
             ],
             data: [45, 20, 12, 18, 5] //グラフのデータ
          }]
       },
       options: {
          legend: {
             display: false
          },
          responsive: true,
          title: {
          display: false,
          //グラフタイトル
          text: '進捗ステータス'
          }
       }
    });
