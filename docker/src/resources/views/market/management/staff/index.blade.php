@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__staff"></span>
                    スタッフ管理
                </h2>
                <div class="c-right f-wrap">
                    <div class="total">
                        <p class="number c-text__lv2 c-text__main" data-unit="件"><span
                                class="c-text__unit">登録件数</span>{{ $staffs->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="p-index__body">
                <div class="p-sort">
                    <form action="{{ route('admin.staff.index') }}" method="GET" id="user-search-form">
                        <div class="c-input c-input__center">
                            <div class="c-input c-input__200">
                                <input type="text" name="keyword" placeholder="キーワードで検索" value="">
                            </div>
                            <div class="c-input">
                                <div class="c-buttonArea">
                                    <button type="submit" class="c-button__min user-search-button">絞り込む</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="c-right">
                        <div class="c-buttonArea">
                            <a class="c-button__min c-icon__add" href="{{ route('admin.staff.create') }}">新規登録</a>
                        </div>
                    </div>
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
                                    @foreach($staffs as $staff)
                                        <tr data-href="{{ route('admin.staff.edit', [$staff]) }}">
                                            <td>
                                                <div class="c-image c-image__circle thumbnail"
                                                     style="background-image:url({{ $staff['image_path'] ? Storage::disk('s3')->temporaryUrl($staff['image_path'], Carbon::now()->addMinute()) : '' }})"></div>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5 c-text__weight--700 data">{{ $staff['last_name'] }} {{ $staff['first_name'] }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5 data">{{ $staff['last_name_kana'] }} {{ $staff['first_name_kana'] }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">{{ $staff['email'] }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">{{ $staff['type'] == 'MANAGER' ? '管理者' : '一般' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">{{ $staff['service_id'] }}</p>
                                            </td>
                                        <!-- <td>
                                 <form>
                                    <div class="c-checkbox">
                                       <input type="checkbox" name="delete" id="{{ $staff['select_1'] }}">
                                       <label class="label-none" for="{{ $staff['select_2'] }}"></label>
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
