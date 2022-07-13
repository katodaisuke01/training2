@extends('layouts.layout_admin')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <span class="c-icon c-icon__staff"></span>
                <h2 class="c-text__lv3 c-text__weight--900">従業員管理</h2>
            </div>
            <div class="p-index__body">
                <div class="c-titleUnderline">
                    <div class="c-buttonArea">
                        <a class="c-button__min c-icon__add" href="{{ route('warehouse.labor.create') }}">新規登録</a>
                    </div>
                    <div class="total">
                        <p class="number c-text__lv2 c-text__main" data-unit="件"><span
                                class="c-text__unit">登録件数</span>{{ $labors->count() }}</p>
                    </div>
                </div>
                <div class="p-sort">
                    <form action="{{ route('warehouse.labor.index') }}" method="GET" id="user-search-form">
                        <div class="c-input c-input__center">
                            <div class="c-input c-input__200">
                                <input type="text" name="keyword" placeholder="キーワードで検索" value="">
                                <div class="c-icon__glass c-icon__w24"></div>
                            </div>
                            <div class="c-input">
                                <div class="c-buttonArea">
                                    <button type="submit" class="c-button__min user-search-button">絞り込む</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <ul class="p-list__content">
                    <li class="c-content show c-box">
                        <div class="p-scroll p-scroll__yaxis450">
                            <div class="p-scroll__inner">
                                <table class="p-table">
                                    <thead>
                                    <th class="w_40">
                                        <label class="">画像</label>
                                    </th>
                                    <th>
                                        <label class="">氏名</label>
                                    </th>
                                    <th>
                                        <label class="">フリガナ</label>
                                    </th>
                                    <th>
                                        <label class="">メールアドレス</label>
                                    </th>
                                    <th>
                                        <label class="">権限</label>
                                    </th>
                                    <th>
                                        <label class="">ユーザーID</label>
                                    </th>
                                    <!-- <th>
                                       <div class="c-buttonArea">
                                          <a data-remodal-target="modal_delete" class="c-button__min c-button__gray">選択項目<br />を削除</a>
                                       </div>
                                    </th> -->
                                    </thead>
                                    <tbody>
                                    @foreach($labors as $labor)
                                        <tr data-href="{{ route('warehouse.labor.edit', ['labor' => $labor->id]) }}">
                                            <td>
                                                <div class="c-image c-image__circle thumbnail"
                                                     style="background-image:url({{ $labor['image_path'] ? Storage::disk('s3')->temporaryUrl($labor['image_path'], Carbon::now()->addMinute()) : '' }})"></div>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5 c-text__weight--700 data">{{ $labor['last_name'] }} {{ $labor['first_name'] }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5 data">{{ $labor['last_name_kana'] }} {{ $labor['first_name_kana'] }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">{{ $labor['email'] }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">{{ $labor['type'] == 'MANAGER' ? '管理者' : '一般' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">{{ $labor['service_id'] }}</p>
                                            </td>
                                        <!-- <td>
                                 <form>
                                    <div class="c-checkbox">
                                       <input type="checkbox" name="delete" id="{{ $labor['select_1'] }}">
                                       <label class="label-none" for="{{ $labor['select_2'] }}"></label>
                                    </div>
                                 </form>
                              </td> -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>


        </section>
    </div>
@endsection
