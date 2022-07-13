
<div class="c-chart">
  <canvas id="c-chart__company--2"></canvas>
</div>
<script>
  var ctx = document.getElementById('c-chart__company--2').getContext('2d');
  var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'line',

    // データセットのデータ
    data: {
      labels: ["7/1","7/2","7/3","7/4","7/5","7/6","7/7","7/8","7/9","7/10","7/11","7/12","7/13","7/14"],
      datasets: [
        {
          label:"送信した気になる！",//グラフのタイトル
          borderColor: "rgba(242,113,19,1)",//グラフの線の色
          backgroundColor:"rgba(255,0,0,0)",//グラフの背景色透過
          data:["60","55","54","50","49","47","60","55","54","50","49","47","60","19"]//横列に並ぶデータ
        },{
          label:"受信した気になる！",
          borderColor: "rgba(0,156,213,1)",
          backgroundColor:"rgba(130,201,169,0)",
          data:["90","85","74","60","59","50","90","85","74","60","59","50","90","85"]
        }
      ]
    },

    // ここに設定オプションを書きます
    options: {
      legend:{
        display: true//グラフの説明を表示
      },
      tooltips:{//グラフへカーソルを合わせた際のツールチップ詳細表示の設定
        callbacks:{
          label: function(tooltipItems, data) {
            if(tooltipItems.yLabel == "0"){
                return "";
            }
            return data.datasets[tooltipItems.datasetIndex].label + "：" + tooltipItems.yLabel + "PV";//Kgを最後につける
          }
        }
        
      },
      title:{//上部タイトル表示の設定
        display: true,
        fontSize:10,
        text: ''
      },
      scales:{
        yAxes:[//グラフ縦軸（Y軸）設定
          {
            ticks:{
              beginAtZero:true,//0からスタート
              suggestedMax: 100,//最大が100
              suggestedMin: 0,//最小が0
              stepSize: 10,//10づつ数値が刻まれる
              callback: function(value){
                return  value +  'PV'//数字＋%で表示      
              }
            }
          }
        ],
        xAxes:[//棒グラフ横（X軸）設定
          {
            barPercentage:0.5,//バーの太さ
          }
        ]
      }
    }
  });
</script>