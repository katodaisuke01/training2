<script>
    $(function () {
        let measuredProducts = @json($measured_products);
        let latestId = 0
        let intervalId = 0

        $('#dacs_start').on('click', () => {
            $.post({
                url: "{{ route('industry.market.dacs.start') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            }).done((data) => {
                appendFlash(data.flash_message)
                if (!data.success) return

                latestId = data.latest_id
                intervalId = setInterval(() => {
                    $.get({
                        url: "{{ route('industry.market.dacs.newData') }}",
                        data: {
                            id: latestId,
                        },
                    }).done((data) => {
                        if (!data.is_updated) return

                        for (let measuredProduct of data.measured_products) {
                            table.row.add(measuredProduct)
                        }

                        table.draw(false)

                        measuredProducts = measuredProducts.concat(data.measured_products)
                        latestId = data.latest_id
                    }).fail(() => {
                    })
                }, 3000)
            }).fail(() => {
                appendFlash('計量開始に失敗しました')
            })
        })

        $('#dacs_stop').on('click', () => {
            $.post({
                url: "{{ route('industry.market.dacs.stop') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            }).done((data) => {
                appendFlash(data.flash_message)
                if (data.success) {
                    clearInterval(intervalId)
                }
            }).fail(() => {
                appendFlash('計量停止に失敗しました')
            })
        })

        const params = (new URL(window.location.href)).searchParams
        if (!params.has('start_date') && !params.has('end_date')) {
            $('#dacs_start').click()
        }

        $(window).on('unload', () => {
            $('#dacs_stop').click()
        })

        let table = $('.data-table-dacs').DataTable({
            lengthChange: false,
            scrollX: true,
            displayLength: 10,
            scrollY: 500,
            order: [[0, 'desc']],
            columns: [
                {data: "created_at"},
                {data: "status"},
                {data: "weight"},
            ],
            data: measuredProducts,
            createdRow: (row, data, dataIndex) => {
                $(row).empty().append(`
                    {{-- <td>
                      <div class="c-image" style="background-image:url({{ data_get($measured_product, 'image_path') ? Storage::disk('s3')->temporaryUrl(data_get($measured_product, 'image_path'), Carbon::now()->addMinute()) : '' }})"></div>
                    </td> --}}
                    <td>
                        <p class="c-text__lv5 data">
                            ${data.created_at}
                        </p>
                    </td>
                    <td>
                        <p class="c-text__lv3 data">
                             ${data.status}</span>
                        </p>
                    </td>
                    <td>
                        <p class="c-text__lv3 data">
                             ${data.weight}<span class="c-text__unit">g</span>
                        </p>
                    </td>
                    {{--
                    <td>
                        <div class="c-buttonArea">
                            <a data-remodal-target="modal_delete" class="c-button__min c-button__gray">削除</a>
                        </div>
                    </td>
                --}}`)
            },
        })

        $('#start_date, #end_date').on('change', () => {
            $('#datepick').submit();
        })
    })

    function appendFlash(message) {
        $('.list_flash').append(`
            <li class="flash">
              <article class="link_float">
                <div class="data_flash">
                  <p>${message}</p>
                </div>
              </article>
            </li>
        `)
    }
</script>
