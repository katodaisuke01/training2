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