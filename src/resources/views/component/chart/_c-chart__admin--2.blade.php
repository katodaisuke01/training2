<div class="p-chart">
  <div class="p-chart__head f-a_center">
    <p class="c-text__lv4 c-text__main">
      <span class="c-text__lv6 c-text__main">公開中の求人数</span>405<span class="c-text__lv6 c-text__main">件</span>
    </p>
    <div class="c-right">
      <p class="c-text__note">期間：2022/07/01〜2022/07/14</p>
    </div>
  </div>
  <div class="p-chart__body">
    <div class="c-chart__admin">
      <canvas id="c-chart__admin--2"></canvas>
    </div>
  </div>
</div>
<script>
  var ctx = document.getElementById('c-chart__admin--2').getContext('2d');
  var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'line',

    // データセットのデータ
    data: {
      labels: ["7/1","7/2","7/3","7/4","7/5","7/6","7/7","7/8","7/9","7/10","7/11","7/12","7/13","7/14"],
      datasets: [
        {
          label:"",//グラフのタイトル
          borderColor: "rgba(242,113,19,1)",//グラフの線の色
          backgroundColor:"rgba(242,113,19,0.1)",//グラフの背景色透過
          data:["455","451","450","419","417","430","405","460","415","434","440","438","417","420"]//横列に並ぶデータ
        }
      ]
    },

    // ここに設定オプションを書きます
    options: {
      legend:{
        display: false//グラフの説明を表示
      },
      tooltips:{//グラフへカーソルを合わせた際のツールチップ詳細表示の設定
        callbacks:{
          label: function(tooltipItems, data) {
            return data.datasets[tooltipItems.datasetIndex].label + "：" + tooltipItems.yLabel + "件";
          }
        }
        
      },
      title:{//上部タイトル表示の設定
        display: false,
        fontSize:10,
        text: '公開中の求人数'
      },
      scales:{
        yAxes:[//グラフ縦軸（Y軸）設定
          {
            ticks:{
              beginAtZero:false,//0からスタート
              stepSize: 10,//10づつ数値が刻まれる
              callback: function(value){
                return  value +  '件'//数字＋%で表示      
              }
            }
          }
        ],
        xAxes:[//棒グラフ横（X軸）設定
          {
            barPercentage:0.3,//バーの太さ
          }
        ]
      }
    }
  });
</script>