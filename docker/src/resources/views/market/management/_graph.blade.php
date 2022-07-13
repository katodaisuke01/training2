<canvas id="chart_order"></canvas>
<script>
    //値をグラフに表示させる
    Chart.plugins.register({
        afterDatasetsDraw: function (chart, easing) {
            var ctx = chart.ctx;

            chart.data.datasets.forEach(function (dataset, i) {
                var meta = chart.getDatasetMeta(i);
                if (!meta.hidden) {
                    meta.data.forEach(function (element, index) {
                        // 値の表示
                        ctx.fillStyle = 'rgb(0, 0, 0,0.8)';//文字の色
                        var fontSize = 12;//フォントサイズ
                        var fontStyle = 'normal';//フォントスタイル
                        var fontFamily = 'Arial';//フォントファミリー
                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                        var dataString = dataset.data[index].toString();

                        // 値の位置
                        ctx.textAlign = 'center';//テキストを中央寄せ
                        ctx.textBaseline = 'middle';//テキストベースラインの位置を中央揃え

                        var padding = 5;//余白
                        var position = element.tooltipPosition();
                        ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);

                    });
                }
            });
        }
    });


    //=========== 折れ線グラフ（複数） ============//
    $('#chart_order').on('inview', function (event, isInView) {//画面上に入ったらグラフを描画
        if (isInView) {

            var ctx = document.getElementById("chart_order");//グラフを描画したい場所のid
            var chart = new Chart(ctx, {
                type: 'line',//グラフのタイプ
                data: {//グラフのデータ
                    labels: [{{$to_graph['label'] }}],//データの名前
                    datasets: [
                        {
                            label: "実績数",//グラフのタイトル
                            borderColor: "rgba(48,73,155,1)",//グラフの線の色
                            backgroundColor: "rgba(48,73,155,0)",//グラフの背景色透過
                            data: [{{$to_graph['prediction'] }}]//横列に並ぶデータ
                        },
                        {
                            label: "予測数",//グラフのタイトル
                            borderColor: "rgba(0,196,226,1)",//グラフの線の色
                            backgroundColor: "rgba(0,196,226,0.2)",//グラフの背景色透過
                            data: ["62", "40", "18", "4", "5", "3", "22", "55", "42", "10", "10", "0", "0", "84", "0", "0", "28", "10", "6", "35", "54", "8", "6", "47", "10", "22", "4", "50", "0", "75", "62", "40", "18", "4", "5", "3", "22", "55", "42", "10", "10", "0", "0", "63", "0", "0", "28", "10", "6", "35", "54", "8", "6", "37", "10", "22", "4", "60", "0", "40", "22", "4",
                            ]//横列に並ぶデータ
                        },
                    ]

                },
                options: {//グラフのオプション
                    legend: {
                        display: true//グラフの説明を表示
                    },
                    tooltips: {//グラフへカーソルを合わせた際のツールチップ詳細表示の設定
                        callbacks: {
                            label: function (tooltipItems, data) {
                                if (tooltipItems.yLabel == "0") {
                                    return "";
                                }
                                return data.datasets[tooltipItems.datasetIndex].label + "：" + tooltipItems.yLabel + "個";
                            }
                        }

                    },
                    title: {//上部タイトル表示の設定
                        display: false,
                        fontSize: 13,
                        text: '単位：個'
                    },
                    scales: {
                        yAxes: [//グラフ縦軸（Y軸）設定
                            {
                                ticks: {
                                    beginAtZero: true,//0からスタート
                                    suggestedMax: 100,//最大が100
                                    suggestedMin: 0,//最小が0
                                    stepSize: 10,//10づつ数値が刻まれる
                                    callback: function (value) {
                                        return value + '個'//数字＋%で表示
                                    }
                                }
                            }
                        ],
                        xAxes: [//棒グラフ横（X軸）設定
                            {
                                barPercentage: 0.2,//バーの太さ
                            }
                        ]
                    }
                }
            });

        }
    });
</script>
