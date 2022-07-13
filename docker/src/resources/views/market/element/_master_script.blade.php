<!-- マスタ管理 -->
<script>
    // マスタの切り替え
    let data = @json($m_categories);
    let table = 'MCategories';
    //ボタンを押したタイミングで発火する
    $(".tab").click(function () {
        $('#js-common-edit').hide();
        table = $(this).data('table');
        let url = '/admin/master/get' + table;
        $.ajax({
            type: "get", //HTTP通信の種類
            url: url,
            dataType: "json",
        })
            //通信が成功したとき
            .done((res) => { // resの部分にコントローラーから返ってきた値 $clients が入る
                $('.master_list').empty(); //もともとある要素を空にする
                if (table == 'MCategories') {
                    $('select[name="m_category_id"]').empty();
                    $('select[name="m_category_id"]').append('<option value>選択してください</option>')
                }
                data = res;
                $.each(res, function (index, value) {
                    html = `
                <li data-item="${value.name}" data-id="${value.id}"  data-table="${table}">
                <span class="c-icon c-icon__movable"></span>
                <p class="c-text__note">${value.name}</p>
                </li>
            `;
                    $(".master_list").append(html); //できあがったテンプレートをmaster_listクラスの中に追加
                    if (table == 'MCategories') {
                        select = `<option value="${value.id}">${value.name}</option>`;
                        $('select[name="m_category_id"]').append(select);
                    }
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
                if ($(this).data('table') == 'MCategories') {
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="name"]').val("");
                    $('.js-master-edit').data('action', 'addMCategory');
                    $('.js-master-edit').data('table', 'MCategories');
                }
                if ($(this).data('table') == 'MFishCategories') {
                    $('#category-select').show();
                    $('#js-common-edit').show();
                    $('input[name="name"]').val("");
                    $('select[name="m_category_id"]').val("");
                    $('.js-master-edit').data('action', 'addMFishCategory');
                    $('.js-master-edit').data('table', 'MFishCategories');
                }
                if ($(this).data('table') == 'MProcesses') {
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="name"]').val("");
                    $('.js-master-edit').data('action', 'addMProcess');
                    $('.js-master-edit').data('table', 'MProcesses');
                }
            })

            $('#js-master-edit li').on('click', function () {
                if ($(this).data('table') == 'MCategories') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('.js-master-edit').data('action', 'editMCategory');
                    $('.js-master-delete').data('action', 'deleteMCategory');
                    $('.js-master-edit').data('table', 'MCategories');
                }
                if ($(this).data('table') == 'MFishCategories') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#category-select').show();
                    $('select[name="m_category_id"]').val(edit_data['m_category_id']);
                    $('#js-common-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('.js-master-edit').data('action', 'editMFishCategory');
                    $('.js-master-delete').data('action', 'deleteMFishCategory');
                    $('.js-master-edit').data('table', 'MFishCategories');
                }
                if ($(this).data('table') == 'MProcesses') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('.js-master-edit').data('action', 'editMProcess');
                    $('.js-master-delete').data('action', 'deleteMProcess');
                    $('.js-master-edit').data('table', 'MProcesses');
                }
            })
        } else {
            $('#js-item-push').on('touchend', function () {
                if ($(this).data('table') == 'MCategories') {
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="name"]').val("");
                    $('.js-master-edit').data('action', 'addMCategory');
                    $('.js-master-edit').data('table', 'MCategories');
                }
                if ($(this).data('table') == 'MFishCategories') {
                    $('#category-select').show();
                    $('#js-common-edit').show();
                    $('input[name="name"]').val("");
                    $('select[name="m_category_id"]').val("");
                    $('.js-master-edit').data('action', 'addMFishCategory');
                    $('.js-master-edit').data('table', 'MFishCategories');
                }
                if ($(this).data('table') == 'MProcesses') {
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="name"]').val("");
                    $('.js-master-edit').data('action', 'addMProcess');
                    $('.js-master-edit').data('table', 'MProcesses');
                }
            })

            $('#js-master-edit li').on('touchend', function () {
                if ($(this).data('table') == 'MCategories') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('.js-master-edit').data('action', 'editMCategory');
                    $('.js-master-delete').data('action', 'deleteMCategory');
                    $('.js-master-edit').data('table', 'MCategories');
                }
                if ($(this).data('table') == 'MFishCategories') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#category-select').show();
                    $('select[name="m_category_id"]').val(edit_data['m_category_id']);
                    $('#js-common-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('.js-master-edit').data('action', 'editMFishCategory');
                    $('.js-master-delete').data('action', 'deleteMFishCategory');
                    $('.js-master-edit').data('table', 'MFishCategories');
                }
                if ($(this).data('table') == 'MProcesses') {
                    let edit_data = data.find((v) => v.id == $(this).data('id'));
                    $('#category-select').hide();
                    $('#js-common-edit').show();
                    $('input[name="id"]').val($(this).data('id'));
                    $('input[name="name"]').val(edit_data['name']);
                    $('.js-master-edit').data('action', 'editMProcess');
                    $('.js-master-delete').data('action', 'deleteMProcess');
                    $('.js-master-edit').data('table', 'MProcesses');
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
        let url2 = '/admin/master/' + action;
        let form = $(this).closest('form');
        let data = new FormData(form.get(0));
        console.log(url2);

        event.preventDefault(); //エラー削除

        removeInputErrors(form);
        ajaxRequestForm(url2, data, 'json', //datatype
            function (data) {
                //リロードする
                location.reload();
            },
            function (jqXHR) {
                if (jqXHR.responseJSON) {
                    var errors = jqXHR.responseJSON.errors; //フラッシュメッセージ
                    showFlashMsg('更新に失敗しました<br/>入力内容をお確かめください', 'error'); //エラーメッセージを表示
                    console.log(jqXHR);
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
                        showFlashMsg('魚種に紐づいています', 'error'); //削除失敗メッセージを表示
                    } else {
                        // 成功するとここに入る
                        let target = document.getElementById(table);
                        target.click();
                        $('.remodal-close').click();
                        showFlashMsg('更新に成功しました', 'success'); //成功メッセージを表示
                    }
                }
            },
            function () {
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
                } catch (e) { // JSONに変換できない場合は何もしない
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
