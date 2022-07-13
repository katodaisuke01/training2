
  <div class="c-chart">
    <canvas id="c-chart__company--1"></canvas>
  </div>
<script>
  var ctx = document.getElementById('c-chart__company--1').getContext('2d');
  var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'line',

    // データセットのデータ
    data: {
      labels: ["7/1","7/2","7/3","7/4","7/5","7/6","7/7","7/8","7/9","7/10","7/11","7/12","7/13","7/14"],
      datasets: [
        {
          label:"企業情報ページ",//グラフのタイトル
          borderColor: "rgba(242,113,19,1)",//グラフの線の色
          backgroundColor:"rgba(255,0,0,0)",//グラフの背景色透過
          data:["60","55","54","50","49","47","60","55","54","50","49","47","60","19"]//横列に並ぶデータ
        },{
          label:"「喜んでもらえて嬉しい」を本当に感じられるセールスディレクター",
          borderColor: "rgba(0,156,213,1)",
          backgroundColor:"rgba(130,201,169,0)",
          data:["90","85","74","60","59","50","90","85","74","60","59","50","90","85"]
        },{
          label:"「仕事に自由である」ことを共に体現！プログラマ＆エンジニア募集！",
          borderColor: "rgba(217,61,61,1)",
          backgroundColor:"rgba(255,183,76,0)",
          data:["78","75","70","67","60","45","78","75","70","67","60","45","78","75"]
        },{
          label:"【急募】IoTベンチャー／会社を成長させる人事担当募集！",
          borderColor: "rgba(6,198,138,1)",
          backgroundColor:"rgba(255,183,76,0)",
          data:["60","59","50","90","85","74","59","50","90","85","74","60","90","15"]
        },{
          label:"【未経験歓迎】人事職 ～急成長企業の1人目採用担当を募集します～",
          borderColor: "rgba(221,214,45,1)",
          backgroundColor:"rgba(255,0,0,0)",
          data:["20","33","34","30","49","47","60","33","34","30","49","47","60","35"]
        },{
          label:"非連続成長を続けるSaaS Startupで経営企画を募集（リモート可）",
          borderColor: "rgba(158,29,196,1)",
          backgroundColor:"rgba(158,29,196,0)",
          data:["40","87","74","60","74","70","40","87","74","60","74","70","40","27"]
        },{
          label:"【広報／PR・マネジャー候補】オールアバウトグループが手掛け…",
          borderColor: "rgba(0,18,232,1)",
          backgroundColor:"rgba(0,18,232,0)",
          data:["8","5","0","6","10","15","8","5","0","6","20","16","8","5"]
        },{
          label:"次世代デバイスのプラットフォームを通じて人々のライフスタイルを…",
          borderColor: "rgba(99,198,0,1)",
          backgroundColor:"rgba(99,198,0,0)",
          data:["22","29","20","61","29","21","19","82","74","9","82","74","31","91"]
        },{
          label:"これからの会社の成長を支えるバックオフィス人材を募集",
          borderColor: "rgba(227,22,188,1)",
          backgroundColor:"rgba(227,22,188,0)",
          data:["30","30","85","74","85","74","60","53","50","60","53","50","30","8"]
        },{
          label:"★離職率1.4%★急成長中のIT企業を支える情シス担当募集！",
          borderColor: "rgba(45,201,221,1)",
          backgroundColor:"rgba(45,201,221,0)",
          data:["45","18","15","10","18","15","10","61","60","61","60","45","18","90"]
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