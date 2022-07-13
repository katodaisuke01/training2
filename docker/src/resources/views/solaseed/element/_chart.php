<canvas id="chart_solaseed"></canvas>
<script text="javascript">
    var ChartData;
    var ctx = document.getElementById('chart_solaseed').getContext('2d');

    ChartData = new Chart(ctx, {

        type: 'bar',
        data: {

            //X軸の情報
            labels: ['8/1', '8/2', '8/3', '8/4', '8/5', '8/6', '8/7', '8/8', '8/9', '8/10', '8/11', '8/12', '8/13', '8/14', '8/15', '8/16', '8/17', '8/18', '8/19', '8/20', '8/21', '8/22', '8/23', '8/24', '8/25', '8/26', '8/27', '8/28', '8/29', '8/30', '8/31'],

            //Y軸の情報
            datasets: [{
                //グラフの種類
                type: 'bar',
                //凡例名
                label: "受注件数",
                //情報
                data: [50, 220, 170, 240, 40, 200, 140, 150],
                //背景色
                backgroundColor: "rgba(54,162,235,0.2)",
                //線色
                borderColor: 'rgb(54,162,235)',
                //先の太さ
                borderWidth: 1,
            },
                {
                    type: 'line',  //折れ線グラフ
                    label: "集荷量",
                    data: [50, 20, 20, 30, 30, 40, 10],
                    backgroundColor: "rgba(255, 99, 132,0.2)",
                    borderColor: "rgb(255, 99, 132)",
                    borderWidth: 1.2,
                    //ポイントの背景色
                    pointBackgroundColor: "rgba(255, 99, 132, 0.2)",
                    //ポイントの形(circle[○],rect[□],triangle[△]等がある)
                    pointStyle: 'circle',
                    //ポイントの半径
                    radius: 4,
                    //ホバー時のポイント背景色
                    pointHoverBackgroundColor: "rgba(255, 99, 132, 0.2)",
                    //ホバー時のポイントの半径
                    pointHoverRadius: 6,
                    //ホバー時のポイント背景色
                    pointHoverBorderColor: "rgb(255, 99, 132)",
                    //ホバー時の先の太さ
                    pointHoverBorderWidth: 2,
                    //ベジェ曲線の張力（0＝直線）
                    lineTension: 0,
                    //線下を塗りつぶすかどうか
                    fill: false,
                    //軸のID（複数軸存在する場合）
                    yAxisID: "y2"
                }
                , {
                    type: 'line',
                    label: "出荷量",
                    data: [30, 90, 60, 80, 20, 70, 50],
                    backgroundColor: "rgba(100, 170, 100,0.2)",
                    borderColor: "rgb(100, 170, 100)",
                    pointBackgroundColor: "rgba(100, 170, 100, 0.2)",
                    pointHoverBackgroundColor: "rgba(100, 170, 100, 0.2)",
                    pointStyle: 'triangle',
                    radius: 4,
                    pointHoverRadius: 7,
                    borderWidth: 1.2,
                    pointHoverBorderColor: "rgb(100, 170, 100)",
                    pointHoverBorderWidth: 2,
                    lineTension: 0,
                    fill: false,
                    yAxisID: "y2"
                }]
        },
        options: {
            legend: {
                //凡例
                display: true
            },
            tooltips: {
                //ツールチップ
                enabled: true
            },
            scales: {
                //Y軸のオプション
                yAxes: [{
                    scaleLabel: {
                        fontColor: "black"
                    },
                    gridLines: {
                        color: "rgba(126, 126, 126, 0.4)",
                        zeroLineColor: "black"
                    },
                    ticks: {
                        fontColor: "black",
                        beginAtZero: true,
                        suggestedMax: 250,
                        stepSize: 50
                    }
                },
                    {
                        id: "y2",
                        position: "right",
                        autoSkip: true,
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            fontColor: "black",
                            beginAtZero: true,
                            max: 100,
                            stepSize: 20,
                            callback: function (val) {
                                return val + '%';
                            }
                        }
                    }],
                //X軸のオプション
                xAxes: [{
                    scaleLabel: {
                        fontColor: "black",
                        display: false,
                        labelString: '日付'
                    },
                    gridLines: {
                        color: "rgba(126, 126, 126, 0.4)",
                        zeroLineColor: "black"
                    },
                    ticks: {
                        fontColor: "black"
                    }
                }]
            }
        }
    });
</script>
