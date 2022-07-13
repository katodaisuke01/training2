$(function () {
  $('#calendar').fullCalendar({
    // 月名称
    monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    // 月略称
    monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    // 曜日名称
    dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
    // 曜日略称
    dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
    // 選択可
    selectable: true,
    // 選択時にプレースホルダーを描画
    selectHelper: true,
    // 自動選択解除
    unselectAuto: true,
    // 自動選択解除対象外の要素
    unselectCancel: '',
    // イベントソース
    eventSources: [
        {
            events: [
                {
                    title: '',
                    start: '2020-12-01'
                },
                {
                    start: '2020-12-16',
                    end: '2020-12-17'
                },
                {
                    start: '2020-12-23',
                    allDay: false
                }
            ]
        }
    ]
  });
})