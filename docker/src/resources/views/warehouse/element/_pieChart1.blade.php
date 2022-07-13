<canvas id="pieChart1"></canvas>
<script text="javascript">
    const ctx = document.getElementById("pieChart1");
    const pieChart1 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["荷受け済み", "荷捌き済み", "店舗別仕分け済み", "摘み取り済み", "出荷チェック済み"], //データ項目のラベル
            datasets: [{
                backgroundColor: [
                    "#F96384",
                    "#FB9F40",
                    "#FDCD55",
                    "#4BC0C0",
                    "#36A2EB",
                ],
                data: [
                    {{ $m_business->count_not_confirmed }},
                    {{ $m_business->count_confirmed }},
                    {{ $m_business->count_sorted }},
                    {{ $m_business->count_picked }},
                    {{ $m_business->count_shipped }},
                ], //グラフのデータ
                borderWidth: 0,
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
                text: 'ステータス'
            }
        }
    });
</script>
