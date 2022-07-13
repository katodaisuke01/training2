
<!-- muuri -->
<script>
$(window).on('load',function(){ //画面遷移時にギャラリーの画像が被らないように、すべての読み込みが終わった後に実行する

//＝＝＝Muuriギャラリープラグイン設定
var grid = new Muuri('.p-list__grid', {

//アイテムの表示速度※オプション。入れなくても動作します
showDuration: 600,
showEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
hideDuration: 600,
hideEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
  
// アイテムの表示/非表示状態のスタイル※オプション。入れなくても動作します
  visibleStyles: {
    opacity: '1',
    transform: 'scale(1)'
  },
  hiddenStyles: {
    opacity: '0',
    transform: 'scale(0.5)'
  } 
});

//＝＝＝並び替えボタン設定
$('.p-grid .p-list li').on('click',function(){//並び替えボタンをクリックしたら
  var className = $(this).attr("class")//クリックしたボタンのクラス名を取得
  className = className.split(' '); //「.p-list__grid .p-list li」のクラス名を分割して配列にする

    //ボタンにクラス名activeがついている場合
  if($(this).hasClass("active")){ 
    if(className[0] != "all"){//ボタンのクラス名がallでなければ
      $(this).removeClass("active");//activeクラスを消す
      var selectElms = $(".p-grid .p-list li.active"); //ボタン内にactiveクラスがついている要素を全て取得
      if(selectElms.length == 0){//取得した配列内にactiveクラスがついている要素がなければ
        $(".p-grid .p-list li.all").addClass("active");//ボタンallにactiveを追加し
        grid.show('');//ギャラリーの全ての画像を表示
      }else{
        filterDo();//取得した配列内にactiveクラスがついている要素があれば並び替えを行う
      }
    } 
  }
    //ボタンにクラス名activeがついていない場合
    else{
    if(className[0] == "all"){//ボタンのクラス名にallとついていたら
      $(".p-grid .p-list li").removeClass("active");//ボタンのli要素の全てのactiveを削除し
      $(this).addClass("active");//allにactiveクラスを付与
      grid.show('');//ギャラリーの全ての画像を表示
    }else{
      if($(".all").hasClass("active")){//allクラス名にactiveクラスが付いていたら
        $(".p-grid .p-list li.all").removeClass("active");//ボタンallのactiveクラスを消し
      }
      $(this).addClass("active");//クリックしたチェックボックスへactiveクラスを付与
      filterDo();//並び替えを行う
    }
  }
});
//＝＝＝画像の並び替え設定
function filterDo(){
  var selectElms = $(".p-grid .p-list li.active"); //全てのボタンのactive要素を取得
  var selectElemAry = [];//activeクラスがついているボタンのクラス名（sortXX）を保存する配列を定義
  $.each(selectElms, function(index, selectElm) {
    var className = $(this).attr("class")//activeクラスがついている全てのボタンのクラス名（sortXX）を取得
    className = className.split(' ');//ボタンのクラス名を分割して配列にし、
    selectElemAry.push("."+className[0]);//selectElemAry配列に、チェックのついたクラス名（sortXX）を追加
  })
  str = selectElemAry.join(',');//selectElemAry配列に追加されたクラス名をカンマ区切りでテキストにして
  grid.filter(str);//grid.filter(str);のstrに代入し、ボタンのクラス名と<li>につけられたクラス名が一致したら出現
}

});
</script>

<!-- slick -->
<script>
  $('.p-list__slider').slick({
    autoplay: true, //「オプション名: 値」の形式で書く
    dots: false, //複数書く場合は「,」でつなぐ
    arrows: false, //前/次にスライドを切り替える矢印
    slidesToShow: 5, //表示するスライド数
    slidesToScroll: 1, //1回で動くスライド数
    fade: false,
    swipe: true,
    accessibility: true,
    speed:500,
    autoplay:true,
    autoplaySpeed:4000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow:4, 
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow:3, 
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow:2, 
        }
      },
    ]
  });
  $('.p-list__slider--job').slick({
    autoplay: true, //「オプション名: 値」の形式で書く
    dots: true, //複数書く場合は「,」でつなぐ
    arrows: true, //前/次にスライドを切り替える矢印
    slidesToShow: 1, //表示するスライド数
    slidesToScroll: 1, //1回で動くスライド数
    fade: false,
    swipe: true,
    accessibility: true,
    speed:500,
    autoplay:true,
    autoplaySpeed:4000,
  });
</script>

<!-- lightbox -->
<script>
lightbox.option({
  'resizeDuration': 400,
  'wrapAround': true
})
</script>
<script>
  $('.datepicker').datepicker({
    dateFormat: 'yy/mm/dd',
    changeYear: true,
    changeMonth: true,
    duration: 100,
    showAnim: 'show',
    monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
  });
</script>