jQuery(function($){ 
  $.extend( $.fn.dataTable.defaults, { 
    language: {
      "sProcessing":   "処理中です",
      "sLengthMenu":   "_MENU_ 件表示",
      "sZeroRecords":  "データはありません。",
      "sInfo":         " _TOTAL_ 件中 _START_ から _END_ まで表示",
      "sInfoEmpty":    " 0 件中 0 から 0 まで表示",
      "sInfoFiltered": "（全 _MAX_ 件）",
      "sInfoPostFix":  "",
      "sSearch":       "検索:",
      "sUrl":          "",
      "oPaginate": {
        "sFirst":    "先頭へ",
        "sPrevious": "前へ",
        "sNext":     "次へ",
        "sLast":     "最終へ"
      }
    } 
  }); 
});


$(document).ready(function() {

  minDate = new DateTime($('#min'), {
    format: 'YYYY/MM/DD'
  });
  maxDate = new DateTime($('#max'), {
    format: 'YYYY/MM/DD'
  });
  // DataTables initialisation
  var table = $('.data-table').DataTable({
    lengthChange: false,
    scrollX: true,
    displayLength: 15,
    scrollY: 500
  });
  // DataTables initialisation
  var table = $('.data-table__300').DataTable({
    lengthChange: false,
    scrollX: true,
    displayLength: 10,
    scrollY: 300
  });
  // Refilter the table
  $('#min, #max').on('change', function () {
      table.draw();
  });
  
} );