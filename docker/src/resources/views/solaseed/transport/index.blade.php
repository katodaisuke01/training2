@extends('layouts.layout_solaseed')
@section('page_class', 'l-solaseed l-page')
@section('title', '貨物情報登録')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__item"></span>
                        貨物情報登録
                    </p>
                    <!-- <button class="c-button__min c-button__neon">CSV出力</button> -->
                    <div class="c-right">
                        <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                            <span class="c-text__lv5 c-text__main">本日の処理済み件数</span>
                            {{ $done_count ?? 0 }}/{{ $packages->count() ?? 0 }}<span
                                class="c-text__lv5 c-text__accent">件</span>
                        </p>
                    </div>
                </div>
                {!! Form::open(['method' => 'get', 'id' => 'transportForm']) !!}
                {!! Form::hidden('start_date', $request->input('start_date'), ['id' => 'insert_start_date']) !!}
                {!! Form::hidden('end_date', $request->input('end_date'), ['id' => 'insert_end_date']) !!}
                {!! Form::close() !!}
                <form action="{{ route('solaseed.transport.store') }}" method="post">
                    @csrf
                    <div class="p-index__body">
                        <div class="c-box">
                            <div class="bg-gray">
                                <ul class="p-list__wrap" style="flex-wrap:wrap">
                                    <li class="c-input--center">
                                        <div class="c-input__80 c-input--select">
                                            <select name="register_type">
                                                <option value="all">すべて</option>
                                                <option value="select">選択済</option>
                                            </select>
                                        </div>
                                        <span>の</span>
                                    </li>
                                    <li>
                                        <div class="c-input">
                                            <input name="shipping_number" type="text" placeholder="輸送機番号">
                                        </div>
                                        <p class="c-text__error" style="display:none;">輸送機番号は半角英数字で正しく入力してください</p>
                                    </li>
                                    <li>
                                        <div class="c-input__120 c-input c-input--time">
                                            <input type="text" name="schedule_time" placeholder="配送予定時刻"
                                                   class="timepicker"><!-- class="timepicker"-->
                                        </div>
                                        <style>
                                            .wickedpicker__title {
                                                display: none;
                                            }
                                        </style>
                                        <p class="c-text__error" style="display:none;">配送予定時刻は半角英数字で正しく入力してください</p>
                                    </li>
                                    <li class="c-input">
                                        <div class="c-buttonArea">
                                            <input type="submit" value="一括入力する" class="c-button__min c-button__sub"
                                                   id="oneTimeClickBtn">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <table class="p-sort" border="0" cellspacing="5" cellpadding="5">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="c-input c-input--date"><input
                                                value="{{$request->input('start_date')}}" type="text"
                                                class="js_start_date" id="min" name="min" placeholder="2020/01/01">
                                        </div>
                                    </td>
                                    <td>
                                        <span class="c-wave">〜</span>
                                    </td>
                                    <td>
                                        <div class="c-input c-input--date"><input
                                                value="{{$request->input('end_date')}}" type="text" class="js_end_date"
                                                id="max" name="max" placeholder="2020/01/01"></div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="p-table__1300 data-table" id="data-table">
                                <thead>
                                <th class="unsort">
                                    <p class="c-text__label">選択</p>
                                </th>
                                <th class="w_80">
                                    <p class="c-text__label">ステータス</p>
                                </th>
                                <th class="w_50">
                                    <p class="c-text__label">箱ID</p>
                                </th>
                                <th class="w_100">
                                    <p class="c-text__label">日付</p>
                                </th>
                                {{--<th class="unsort">
                                   <p class="c-text__label">品名</p>
                                </th>--}}
                                <th class="unsort w_100">
                                    <p class="c-text__label">輸送機番号</p>
                                </th>
                                <th class="unsort w_100">
                                    <p class="c-text__label">配送予定時刻</p>
                                </th>
                                <th class="w_100">
                                    <p class="c-text__label">合計重量（kg）</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">合計（個）</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">保冷BOX利用</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">常温</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">発注業者・集荷先</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">備考<small>（ソラシドエアに対する伝達事項）</small></p>
                                </th>
                                <th class="unsort">
                                </th>
                                </thead>
                                <tbody>
                                @foreach($packages as $package)
                                    <tr data-href="{{ route('solaseed.transport.detail', [$package]) }}"
                                        class="transport_table" id="transport_table_{{ data_get($package, 'id') }}"
                                        data-checked="0">
                                        <td>
                                            <div class="c-checkbox">
                                                <input type="checkbox" id="select_{{ data_get($package, 'id') }}"
                                                       name="package[{{$package->id}}][select]">
                                                <label for="select_{{ data_get($package, 'id') }}"
                                                       class="change_select_status_{{ data_get($package, 'id') }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="c-icon__w24 @if($package->transport_done_package) c-icon__check @endif"></div>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">{{ data_get($package, 'id') }}</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">{{ date('Y-m-d') }}</p>
                                        </td>
                                        {{--<td>
                                           <p class="c-text__lv5">品名{{ data_get($package, 'product.name') }}</p>
                                        </td>--}}
                                        <td>
                                            <div class="c-input">
                                                <input name="package[{{$package->id}}][shipping_number]"
                                                       id="js-insert_shipping_number" type="text" placeholder="NH00000"
                                                       value="{{ data_get($package, 'shipping_number') }}">
                                            </div>
                                            <p class="c-text__error" style="display:none;">輸送機番号は半角英数字で正しく入力してください</p>
                                        </td>
                                        <td>
                                            <div class="c-input">
                                                <input name="package[{{$package->id}}][shipping_schedule_time]"
                                                       id="js-insert_schedule_time" type="text" class=""
                                                       placeholder="7:00"
                                                       value="{{ data_get($package, 'shipping_schedule_time') ? date('H:i', strtotime(data_get($package, 'shipping_schedule_time'))) : '' }}">
                                            </div>
                                            <p class="c-text__error" style="display:none;">配送予定時刻は半角英数字で正しく入力してください</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">{{ number_format(data_get($package, 'loading_weight')) }}
                                                <span class="c-text__unit">
                                             kg
                                          </span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">
                                                @php echo $package->orders()->count(); @endphp
                                                <span class="c-text__unit">
                                            個
                                          </span>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="c-icon__w24 c-icon__check"></div>
                                            {{-- つまり冷蔵かどうかなのでとりま全部YES --}}
                                        </td>
                                        <td>
                                            {{-- つまり常温かどうかなのでとりま全部NO --}}
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">{{ data_get($package, 'm_business.name') }}</p>
                                            <p class="c-text__lv6">{{ data_get($package, 'm_business.address') }}</p>
                                        </td>
                                        <td>
                                            <p class="c-text__note">備考</p>
                                        </td>
                                        <td>
                                            <div class="c-icon__w16 c-icon__arrow"></div>
                                        </td>
                                    </tr>
                                    <script>
                                        $('.change_select_status_{{ data_get($package, 'id') }}').on('click', function (e) {
                                            if ($('#transport_table_{{ data_get($package, 'id') }}').data('checked') == '0') {
                                                $('#transport_table_{{ data_get($package, 'id') }}').data('checked', '1');
                                            } else {
                                                $('#transport_table_{{ data_get($package, 'id') }}').data('checked', '1');
                                            }
                                        })
                                    </script>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-index__foot">
                        <div class="c-buttonArea__end">
                            <button type="submit" class="c-button__wide c-button__accent">保存する</button>
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
