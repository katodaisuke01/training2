@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index p-store">
            <div class="p-index__head">
                <form action="{{ route('admin.landing.index') }}" method="get" class="c-full"
                      id="select_landing_date_form">
                    <div class="c-titleUnderline">
                        <h2 class="title">
                            <span class="c-icon c-icon__item"></span>
                            水揚げ登録
                        </h2>
                        <div class="c-input__center c-right">
                            <p class="c-text__label">水揚げ日</p>
                            <div class="c-input c-input--date">
                                <input type="text" name="landing_date" placeholder="2020/01/01"
                                       value="{{ $query['landing_date'] ?? date('Y/m/d') }}" class="datepicker"
                                       id="select_landing_date">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-index__body">
                <form action="{{ route('admin.landing.update') }}" method="POST" id="landingUpdateForm" class="c-full">
                    @csrf
                    <ul class="p-list__split5 p-listTile">
                        @foreach($products as $product)
                            <li data-href data-remodal-target="modal_item">
                                <article class="c-box shadow">
                                    <div class="c-box__head">
                                        <div class="c-image"
                                             style="background-image:url({{ $product->image_path ? Storage::disk('s3')->temporaryUrl($product->image_path, Carbon::now()->addMinute()) : '' }});"></div>
                                        <p class="c-text__lv5 name">{{ data_get($product, 'title') }}</p>
                                    </div>
                                    <?php
                                    $date = date('Y-m-d', strtotime($query['landing_date'] ?? date('Y-m-d')));
                                    $stock = data_get($product, 'stocks')->where('landing_date', $date)->first();
                                    ?>
                                    <div class="c-box__body">
                                        <ul class="p-list__row">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__note">数量</p>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input__75">
                                                            <input name="landing[{{$product->id}}][quantity]"
                                                                   type="number" placeholder="0"
                                                                   value="{{data_get($stock, 'total_quantity')}}">
                                                        </div>
                                                        <span
                                                            class="c-text__unit">{{ data_get($product, 'm_unit.name') }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__note">重量</p>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input__75">
                                                            <input type="number"
                                                                   name="landing[{{$product->id}}][weight]"
                                                                   placeholder="0.0"
                                                                   value="{{data_get($stock, 'total_weight')}}">
                                                        </div>
                                                        <span class="c-text__unit">g</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                                <script>
                                    $('input[name="landing[{{$product->id}}][quantity]"]').on('change', function () {
                                        console.log($.trim($(this).val()))
                                        if ($.trim($(this).val()) == '' || $.trim($(this).val()) == 0) {
                                            $('input[name="landing[{{$product->id}}][weight]"]').prop('disabled', false);
                                        } else {
                                            $('input[name="landing[{{$product->id}}][weight]"]').prop('disabled', true);
                                            $('input[name="landing[{{$product->id}}][weight]"]').css('opacity', '0.3');
                                        }
                                    })
                                    $('input[name="landing[{{$product->id}}][weight]"]').on('change', function () {
                                        console.log($.trim($(this).val()))
                                        if ($.trim($(this).val()) == '' || $.trim($(this).val()) == 0) {
                                            $('input[name="landing[{{$product->id}}][quantity]"]').prop('disabled', false);
                                        } else {
                                            $('input[name="landing[{{$product->id}}][quantity]"]').prop('disabled', true);
                                            $('input[name="landing[{{$product->id}}][quantity]"]').css('opacity', '0.3');
                                        }
                                    })
                                </script>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="landing_date" value="{{ $query['landing_date'] ?? date('Y/m/d') }}">
                </form>
            </div>
            <div class="p-index__foot c-borderTop">
                <div class="c-buttonArea__center">
                    <a href="{{ route('admin.landing.history') }}"
                       class="c-button__wide c-button__line c-button__round">登録履歴</a>
                    <button type="submit" class="c-button__round c-button__wide" id="landingConfirmButton">登録する</button>
                </div>
            </div>
    </div>
    </div>
    <script>
        $(function () {
            $('#select_landing_date').on('change', function () {
                $('#select_landing_date_form').submit();
            })

            $('#landingConfirmButton').click(function () {
                $('#landingUpdateForm').submit();
            })

        })
    </script>
@endsection
