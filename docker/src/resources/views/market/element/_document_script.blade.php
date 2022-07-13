<script>
    function partialPrint() {
        var printPage = $('#invoice_for_print').html();

        // 「すべての要素に非表示用のclass「print-off」を指定し、非表示
        var not_print_element = document.querySelectorAll("body > *")
        for (var i = 0; i < not_print_element.length; ++i) {
            not_print_element[i].classList.add("non-print-object")
        }

        // //プリント用の要素「#print」を作成
        document.body.insertAdjacentHTML('beforeend', '<div id="print" class="print_pages"></div>')
        // //印刷エリアの要素を代入
        document.getElementById("print").insertAdjacentHTML('beforeend', printPage)

        //印刷
        window.print();
        window.close();

        // スタイルを元に戻す
        $('#print').remove();
        $('.non-print-object').removeClass('non-print-object');
    }

    // $(function() {
    //   $('#js-target-on').trigger('focus');
    //   $(document).on('blur', '#js-target-on', function() {
    //       $('#js-target-on').trigger('focus');
    //   })

    //   $(document).on('input', '#js-target-on', function() {
    //     var res = $(this).val().split('_');
    //     console.log(res[0]);
    //     if (res[1] == "list") {
    //       if (res[0]) {
    //         var url = "/admin/management/order/itemList/" + res[0];
    //         window.location.href = url;
    //       }
    //     } else if (res[1] == "detail") {
    //       if (res[0]) {
    //         var url = "/admin/management/order/itemDetail/" + res[0];
    //         window.location.href = url;
    //       }
    //     }
    //   })
    // })
</script>
<style>
    /* @media print {
      #invoice_for_print {
        margin: 20px;
      }
    } */

    /* .print_pages > .p-document {
      font-size: 25px;
    } */
    .non-print-object {
        display: none !important;
    }
</style>
