@extends('layouts.layout_marketManagement_nonAside')
@section('page_class', 'l-page')
@section('content')
    <div class="l-container l-page__scan">
        <section class="p-index">
            <div class="p-index__head">
                <a class="c-icon__back" href="javascript:history.back()"></a>
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    計量済み商品一覧　
                </h2>
                <form action="{{ route('industry.market.dacs.index') }}" id="datepick">
                    <div class="c-input__center">
                        <div class="c-input c-input--date">
                            <input value="{{ $request['start_date'] ?? \Carbon::today()->format('Y/m/d') }}"
                                   name="start_date" type="text"
                                   id="start_date"
                                   class="datepicker" placeholder="2020/01/01">
                        </div>
                        <span class="c-wave">〜</span>
                        <div class="c-input c-input--date">
                            <input value="{{ $request['end_date'] ?? \Carbon::today()->format('Y/m/d') }}"
                                   name="end_date" type="text"
                                   id="end_date"
                                   class="datepicker" placeholder="2020/01/01">
                        </div>
                    </div>
                </form>
                <div class="c-buttonArea__end">
                    <button id="dacs_stop" class="c-button__line">計量停止</button>
                    <button id="dacs_start" class="c-button">計量開始</button>
                </div>
            </div>
            <div class="p-index__body c-box">
                <div class="p-scroll__yaxis600">
                    <div class="p-scroll__inner--500">
                        <table class="p-table data-table-dacs" id="data-table">
                            <thead>
                            {{-- <th class="w_100">
                                <label class="c-text__label">画像</label>
                             </th> --}}
                            <th class="w_190">
                                <label class="c-text__label">計量日時</label>
                            </th>
                            <th class="w_190">
                                <label class="c-text__label">ステータス</label>
                            </th>
                            <th class="unsort">
                                <label class="c-text__label">計量値</label>
                            </th>
                            {{--
                             <th class="w_80">
                                <label class="c-text__label">データ削除</label>
                             </th>
                             --}}
                            </thead>
                            <tbody class="measured_products_table">
                            {{-- js側でデータを挿入 --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- @include('market.element._pagination') -->
                @include('market.element.home._dacs_script')
            </div>
        </section>
    </div>
@endsection
