<script>
    let clients = @json($clients);

    $(function () {
        $('.start_camera').on('click', function () {
            if ($(this).is('[disabled]')) return

            const video = document.querySelector("#camera");
            const canvas = document.querySelector("#pickup_picture");
            const se = document.querySelector('#se');

            /**
             * カメラを<video>と同期
             */
            navigator.mediaDevices.getUserMedia({
                video: {facingMode: "environment"},
                audio: false
            }).then((stream) => {
                video.srcObject = stream;
                video.onloadedmetadata = (e) => {
                    video.play();
                };

                document.querySelector("#shutter").addEventListener("click", () => {
                    const ctx = canvas.getContext("2d");

                    // 演出的な目的で一度映像を止めてSEを再生する
                    video.pause();  // 映像を停止
                    se.play();      // シャッター音

                    // canvasに画像を貼り付ける
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    $('#pickup_picture').css({'display': 'block', 'width': '380px'});
                    $('#pickup_picture').attr('data-file', 'on');
                    $('#dummy_place').css('display', 'none');

                    // カメラストップ
                    stream.getVideoTracks().forEach((track) => {
                        track.stop();
                    });
                    stream.getAudioTracks().forEach((track) => {
                        track.stop();
                    });

                    $('.issue_label').removeAttr('disabled')
                    $('.c-box__head').show()
                    createLabel()
                });
            })
                .catch((err) => {
                    console.log(err.name + ": " + err.message);
                });
        });

        function createLabel() {
            const shelf_key = $('.pickup-checkbox:checked').first().data('shelf-key')
            const client = clients.find(client => client.shelf.position_key === shelf_key)

            $('.client-name').text(client.name)
            $('.client-address').text(client.display_address)
            $('.client-tel').text(client.tel)
            $('.client-manager-name').text(client.manager_last_name + ' ' + client.manager_first_name + ' 様')
            $('.client_area_id').text(client.client_area_name)
            $('.c-qr').css('display','block')
        }

        $(document).on('change', '.pickup-checkbox', function () {
            const start_camera = $('.start_camera')
            if ($(this).prop('checked')) {
                const shelf_key = $(this).data('shelf-key')
                $('.pickup-checkbox')
                    .not('[data-shelf-key="' + shelf_key + '"]')
                    .prop('disabled', true)

                start_camera.removeAttr('disabled')
                start_camera.attr('data-remodal-target', 'modal_camera')

                if ($('#pickup_picture').is('[data-file]')) {
                    $('.issue_label').removeAttr('disabled')
                }
            } else if ($('.pickup-checkbox:checked').length === 0) {
                $('.pickup-checkbox').prop('disabled', false)

                start_camera.attr('disabled', 'disabled')
                start_camera.attr('data-remodal-target', '')

                $('.issue_label').attr('disabled', 'disabled')
            }
        })

        $(document).on('click', '.issue_label', function () {
            partialPrint()
            storePicking()
        })

        $(document).on('click', '.button-store-picking', function () {
            storePicking()
        })

        function partialPrint() {
            const printPage = $('.c-label__area');

            //「すべての要素に非表示用のclass「print-off」を指定し、非表示
            const not_print_element = document.querySelectorAll("body > *");
            for (let i = 0; i < not_print_element.length; ++i) {
                not_print_element[i].classList.add("print-off")
            }
            $('.c-label__area--head').addClass('print-off')

            //プリント用の要素「#print」を作成
            document.body.insertAdjacentHTML('beforeend', '<div id="print" style="max-width: 510px"></div>')
            //印刷エリアの要素を代入
            $('#print').append(printPage.clone())
            // $('.c-label__area--body').css('padding', '0 16px 0 8px');

            //印刷
            window.print();
            window.close();

            // スタイルを元に戻す
            $('#print').remove();
            $('.print-off').removeClass('print-off');
        }

        function storePicking() {
            {{-- canvasの写真を送信用に変換 --}}
            document.querySelector("#pickup_picture").toBlob(function (canvasBlob) {
                const formData = new FormData(document.getElementById('pickup-form'))
                formData.append("image", canvasBlob)

                $.post({
                    url: "{{ route('worker.picking.store') }}",
                    data: formData,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    contentType: false,
                    processData: false
                }).done(function (data) {
                    location.reload();
                }).fail(function () {
                    //
                })
            }, 'image/png')
        }
    })
</script>
<style>
    .print-off {
        display: none !important;
    }
</style>
