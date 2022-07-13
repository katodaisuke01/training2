<!-- マスタ管理 -->
<script>
    // マスタの切り替え
    let data = @json($clients);
    let table = 'Clients';
    //ボタンを押したタイミングで発火する
    $(".tab").click(function () {
        $('#js-client-edit').hide();
        $('#js-delivery-edit').hide();
        table = $(this).data('table');
        let url = '/warehouse/master/get' + table;
        $.ajax({
            type: "get", //HTTP通信の種類
            url: url,
            dataType: "json",
        })
            //通信が成功したとき
            .done((res) => { // resの部分にコントローラーから返ってきた値 $clients が入る
                $('.master_list').empty(); //もともとある要素を空にする
                data = res;
                $.each(res, function (index, value) {
                    html = `
              <li data-item="${value.name}" data-id="${value.id}"  data-table="${table}">
              <span class="c-icon c-icon__movable"></span>
              <p class="c-text__note">${value.name}</p>
              </li>
          `;
                    $(".master_list").append(html); //できあがったテンプレートをmaster_listクラスの中に追加
                });
                $('#js-item-push').data('table', table);
                getMaster();
            })
            //通信が失敗したとき
            .fail((error) => {
                console.log(error.statusText);
            });
    });
</script>

<script>
    // 編集の表示
    function getMaster() {
        let edit_data = {};
        var clickEventType = ((window.ontouchstart !== null) ? 'click' : 'touchend');

        if (clickEventType = 'click') {
            $('#js-item-push').on('click', function () {
                console.log($(this).data('table'));
                if ($(this).data('table') == 'Clients') {
                    $('#js-delivery-edit').hide();
                    $('#js-client-edit').show();
                    $('input[name="name"]').val("");
                    $('input[name="zip_code"]').val("");
                    $('select[name="prefecture_name"]').val("");
                    $('input[name="address1"]').val("");
                    $('input[name="address2"]').val("");
                    $('input[name="address3"]').val("");
                    $('input[name="tel"]').val("");
                    $('input[name="manager_last_name"]').val("");
                    $('input[name="manager_first_name"]').val("");
                    $('input[name="email"]').val("");
                    $('select[name="delivery_partnar_id"]').val("");
                    $('.js-master-edit').data('action', 'addClient');
                    $('.js-master-edit').data('table', 'Clients');
                }
                if ($(this).data('table') == 'Deliveries') {
                    $('#js-client-edit').hide();
                    $('#js-delivery-edit').show();
                    $('input[name="name"]').val("");
                    $('input[name="manager_last_name"]').val("");
                    $('input[name="manager_first_name"]').val("");
                    $('input[name="tel"]').val("");
                    $('input[name="email"]').val("");
                    $('input[name="delivery_category"]').val("");
                    $('.js-master-edit').data('action', 'addDelivery');
                    $('.js-master-edit').data('table', 'Deliveries');
                }
            })

            $('#js-master-edit li').on('click', function () {
                if ($(this).data('table') == 'Clients') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#js-delivery-edit').hide();
                    $('#js-client-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('input[name="zip_code"]').val(edit_data['zip_code']);
                    $('select[name="prefecture_name"]').val(edit_data['prefecture_name']);
                    $('input[name="address1"]').val(edit_data['address1']);
                    $('input[name="address2"]').val(edit_data['address2']);
                    $('input[name="address3"]').val(edit_data['address3']);
                    $('input[name="tel"]').val(edit_data['tel']);
                    $('input[name="manager_last_name"]').val(edit_data['manager_last_name']);
                    $('input[name="manager_first_name"]').val(edit_data['manager_first_name']);
                    $('input[name="email"]').val(edit_data['email']);
                    $('select[name="delivery_partnar_id"]').val(edit_data['delivery_partnar_id']);
                    $('.js-master-edit').data('action', 'editClient');
                    $('.js-master-delete').data('action', 'deleteClient');
                    $('.js-master-edit').data('table', 'Clients');
                }
                if ($(this).data('table') == 'Deliveries') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#js-client-edit').hide();
                    $('#js-delivery-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('input[name="manager_last_name"]').val(edit_data['manager_last_name']);
                    $('input[name="manager_first_name"]').val(edit_data['manager_first_name']);
                    $('input[name="tel"]').val(edit_data['tel']);
                    $('input[name="email"]').val(edit_data['email']);
                    $('select[name="delivery_category"]').val(edit_data['delivery_category']);
                    $('.js-master-edit').data('action', 'editDelivery');
                    $('.js-master-delete').data('action', 'deleteDelivery');
                    $('.js-master-edit').data('table', 'Deliveries');
                }

            })
        } else {
            $('#js-item-push').on('touchend', function () {
                if ($(this).data('table') == 'Clients') {
                    $('#js-delivery-edit').hide();
                    $('#js-client-edit').show();
                    $('input[name="name"]').val("");
                    $('input[name="zip_code"]').val("");
                    $('select[name="prefecture_name"]').val("");
                    $('input[name="address1"]').val("");
                    $('input[name="address2"]').val("");
                    $('input[name="address3"]').val("");
                    $('input[name="tel"]').val("");
                    $('input[name="manager_first_name"]').val("");
                    $('input[name="manager_last_name"]').val("");
                    $('input[name="email"]').val("");
                    $('select[name="delivery_partnar_id"]').val("");
                    $('.js-master-edit').data('action', 'addClient');
                    $('.js-master-edit').data('table', 'Clients');
                }
                if ($(this).data('table') == 'Deliveries') {
                    $('#js-client-edit').hide();
                    $('#js-delivery-edit').show();
                    $('input[name="name"]').val("");
                    $('input[name="manager_last_name"]').val("");
                    $('input[name="manager_first_name"]').val("");
                    $('input[name="tel"]').val("");
                    $('input[name="email"]').val("");
                    $('input[name="delivery_category"]').val("");
                    $('.js-master-edit').data('action', 'addDelivery');
                    $('.js-master-edit').data('table', 'Deliveries');
                }
            })

            $('#js-master-edit li').on('touchend', function () {
                if ($(this).data('table') == 'Clients') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#js-delivery-edit').hide();
                    $('#js-client-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('input[name="zip_code"]').val(edit_data['zip_code']);
                    $('select[name="prefecture_name"]').val(edit_data['prefecture_name']);
                    $('input[name="address1"]').val(edit_data['address1']);
                    $('input[name="address2"]').val(edit_data['address2']);
                    $('input[name="address3"]').val(edit_data['address3']);
                    $('input[name="tel"]').val(edit_data['tel']);
                    $('input[name="manager_last_name"]').val(edit_data['manager_last_name']);
                    $('input[name="manager_first_name"]').val(edit_data['manager_first_name']);
                    $('input[name="email"]').val(edit_data['email']);
                    $('select[name="delivery_partnar_id"]').val(edit_data['delivery_partnar_id']);
                    $('.js-master-edit').data('action', 'editClient');
                    $('.js-master-delete').data('action', 'deleteClient');
                    $('.js-master-edit').data('table', 'Clients');
                }
                if ($(this).data('table') == 'Deliveries') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#js-client-edit').hide();
                    $('#js-delivery-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('input[name="manager_last_name"]').val(edit_data['manager_last_name']);
                    $('input[name="manager_first_name"]').val(edit_data['manager_first_name']);
                    $('input[name="tel"]').val(edit_data['tel']);
                    $('input[name="email"]').val(edit_data['email']);
                    $('input[name="delivery_category"]').val("delivery_category");
                    $('.js-master-edit').data('action', 'editDelivery');
                    $('.js-master-delete').data('action', 'deleteDelivery');
                    $('.js-master-edit').data('table', 'Deliveries');
                }

            })

        }
    }

    // タブを押していない時も発動
    getMaster();

    $(".js-master-post").click(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        let action = $(this).data('action');
        let url2 = '/warehouse/master/' + action;
        let form = $(this).closest('form');
        let data = new FormData(form.get(0));

        event.preventDefault(); //エラー削除

        removeInputErrors(form);
        ajaxRequestForm(url2, data, 'json', //datatype
            function (data) {
                //リロードする
                location.reload();
            }, function (jqXHR) {
                if (jqXHR.responseJSON) {
                    var errors = jqXHR.responseJSON.errors; //フラッシュメッセージ
                    showFlashMsg('更新に失敗しました<br/>入力内容をお確かめください', 'error'); //エラーメッセージを表示
                    $('#modal_delete_master').hide();
                    for (var errorName in errors) {
                        var errorMsg = errors[errorName][0];
                        var inputName = '';
                        var inputErrors = errorName.split('.');

                        for (var s in inputErrors) {
                            var tmpStr = inputErrors[s];

                            if (s > 0) {
                                tmpStr = '[' + tmpStr + ']';
                            }

                            inputName += tmpStr;
                        }

                        var targetInput = form.find('[name="' + inputName + '"]'); //エラーメッセージの設置場所指定
                        $(targetInput).addClass('alert-item');
                        var appendTarget = targetInput.parent().parent();
                        appendTarget.append('<div class="c-text__error">' + errorMsg + '</div>');
                    } //エラーの場合のみロードフラグをfalse

                    loadingFlg = false;
                } else {
                    if (typeof jqXHR.responseText != 'undefind' && jqXHR.responseText == 'ng') {
                        $('.remodal-close').click();
                        showFlashMsg('顧客に紐づいています', 'error'); //削除失敗メッセージを表示
                    } else {
                        // 成功するとここに入る
                        let target = document.getElementById(table);
                        target.click();
                        $('.remodal-close').click();
                        showFlashMsg('更新に成功しました', 'success'); //成功メッセージを表示
                    }
                }
            }, function () {
            });
    });

    function ajaxRequestForm(url, data, dataType, callback, errorCallback, finallyCallback) {
        var me = this;
        var dType = 'json';

        if (!!dataType) {
            if (typeof dataType === 'string' || dataType instanceof String) {
                dType = dataType;
            }
        }

        var $jqxhr = $.ajax({
            type: 'POST',
            url: url,
            dataType: dType,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: data,
            cache: false
        }); // Ajax通信成功

        $jqxhr.done(function (data, textStatus, jqXHR) {
            console.log(data);
            if (dType === 'html') {
                // サーバエラー時、ダイアログ表示
                var obj;

                try {
                    obj = JSON.parse(data);

                    if (!!obj.err) {
                        console.log('error');
                        return;
                    }
                } catch (e) {// JSONに変換できない場合は何もしない
                }
            }

            if (!!callback) callback(data);
        }); // Ajax通信失敗

        $jqxhr.fail(function (jqXHR, textStatus, errorThrown) {
            ajaxError(jqXHR, textStatus, errorThrown, errorCallback);
        }); // Ajax通信完了

        $jqxhr.always(function () {
            if (!!finallyCallback) finallyCallback();
        });
    };

    function removeInputErrors(target) {
        target.find('.alert-danger').remove();
        target.find('.alert-item').removeClass('alert-item');
        $('.area_flash').remove();
    }

    function ajaxError(jqXHR, textStatus, errorThrown, errorCallback) {
        //メモ：エラーメッセージを取得したいとき：jqXHR.responseJSON.errors
        if (!!errorCallback) errorCallback(jqXHR);
//     console.log('サーバ接続に失敗しました(' + jqXHR.status + ')(' + textStatus + ')(' + errorThrown + ')');
    }

    //=======================================================-
    // Ajax用フラッシュメッセージ
    //=======================================================-
    function showFlashMsg(message) {
        var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
        //フラッシュメッセージの種類はsuccessとerrorのみ
        var liClass = 'flash_success';

        if (type == 'error') {
            liClass = 'flash_error';
        } //html生成

        var html = '<section class="area_flash" style="z-index:100;"><ul class="list_flash"><li class="flash_error"><article class="link_float"><div class="data"><p>' + message + '</p></div></article></li></ul></section>';

        $('body').prepend(html);
    }
</script>
