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
		  $('#nav_toggle > span').toggleClass('current');
		  $('.navi').fadeToggle(0);
		});
//閉じる
	
$('.navi ul a').on('click',function(){
  $('#nav_toggle > span').removeClass('current');
    if (window.matchMedia('(max-width: 950px)').matches) {
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
//画像アップロード
  $('.c-input--file input[type=file]').change(function() {
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
  $('a[href^="#"].smooth_scroll').click(function() {
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
  $('.c-sortable').sortable({
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

// タブ切り替えスクリプト
document.addEventListener('DOMContentLoaded', function(){
  // タブに対してクリックイベントを適用
  const tabs = document.getElementsByClassName('tab');
  for(let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', tabSwitch, false);
  }

  // タブをクリックすると実行する関数
  function tabSwitch(){
    // タブのclassの値を変更
    document.getElementsByClassName('active')[0].classList.remove('active');
    this.classList.add('active');
    // コンテンツのclassの値を変更
    document.getElementsByClassName('show')[0].classList.remove('show');
    const arrayTabs = Array.prototype.slice.call(tabs);
    const index = arrayTabs.indexOf(this);
    document.getElementsByClassName('c-content')[index].classList.add('show');
  };
}, false);


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
//デザイン用スクリプト
$(".c-favorite").click(function(){
  $(this).toggleClass("select");
});
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
$('.c-input--image input[type=file]',).change(function() {
  var This = $(this);
  var file = $(this).prop('files')[0];
  // 画像表示
  var reader = new FileReader();
  reader.onload = function() {
    This.parent().find('label').attr('style', 'background-image: url('+reader.result+')');
  }
  reader.readAsDataURL(file);
});
$('.c-input--file input[type=file]',).change(function() {
  var This = $(this);
  var file = $(this).prop('files')[0];
  // 画像表示
  var reader = new FileReader();
  reader.onload = function() {
    This.parent().find('label').attr('style', 'background-image: url('+reader.result+')');
  }
  reader.readAsDataURL(file);
});