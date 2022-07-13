<canvas id="barChartStaffWork"></canvas>
<script text="javascript">

    $(document).ready(function(){
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'POST',
            url: "/warehouse/home/getChart"
        })
        .done(function(response) {
            var jdata = JSON.parse(response);

            {{-- ラベルの不要な文字列を削除して成形 --}}
            var label = [];
            var dates = jdata[0];
            dates.forEach(function(value){
                label.push(value.substr(0,10));
            })

            var params = {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: jdata[1]
                },
                options: jdata[2]
            };

            const ctx = document.getElementById("barChartStaffWork");
            const barChartStaffWork = new Chart(ctx,params);  
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log("XMLHttpRequest : " + XMLHttpRequest.status);
            console.log("textStatus     : " + textStatus);
            console.log("errorThrown    : " + errorThrown.message);
        });
    })
</script>