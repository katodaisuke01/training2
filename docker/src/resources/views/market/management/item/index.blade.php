@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__fish"></span>
                    商品管理
                </h2>
                <div class="c-right f-wrap">
                    <div class="total">
                        <p class="number c-text__lv2 c-text__main" data-unit="件"><span
                                class="c-text__unit">登録件数</span>{{ $query->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="p-index__body">
                <div class="p-sort">
                    <form action="{{ route('admin.item.index') }}" method="GET" id="item-order-form">
                        <div class="f-wrap c-input__center">
                            <div class="p-formCategory">
                                <div class="c-radio">
                                    <input type="radio" id="all" checked="" name="category" value="all">
                                    <label for="all">すべて</label>
                                    @foreach($categoryList as $value)
                                        <input type="radio" id="category_{{ $value['name'] }}" name="category"
                                               value="{{ $value['id'] }}"
                                               @if (app('request')->input('category') == $value['id']) checked="true" @endif
                                        >
                                        <label for="category_{{ $value['name'] }}">{{ $value['name'] }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="f-a_start" style="margin:4px 0 4px auto">
                                <div class="c-input c-input__200">
                                    <input type="text" name="keyword" placeholder="キーワードで検索"
                                           value="{{ app('request')->input('keyword') }}">
                                </div>
                                <div class="c-input">
                                    <div class="c-buttonArea">
                                        <button type="submit" class="c-button__min item-order-button">絞り込む</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="c-right c-buttonArea">
                        <a class="c-button__min c-icon__add" href="{{ route('admin.item.create') }}">新規登録</a>
                    </div>
                </div>
                <ul class="p-list__content">
                    <li class="c-content show c-box">
                        <div class="p-scroll p-scroll__yaxis600">
                            <div class="p-scroll__inner--1000">
                                <table class="p-table">
                                    <thead>
                                    <th class="w_90">
                                        <p class="">画像</p>
                                    </th>
                                    <th class="w_100">
                                        <p class="">カテゴリー</p>
                                        <p>魚種</p>
                                    </th>
                                    <th>
                                        <p class="">商品名称</p>
                                    </th>
                                    <th class="w_80">
                                        <p>販売価格</p>
                                    </th>
                                    <th class="w_80">
                                        <p>天然／養殖</p>
                                        <p>加工・締め</p>
                                    </th>
                                    <th class="w_50">
                                        <p>単位</p>
                                    </th>
                                    <th class="w_80">
                                        <p>計量許容値</p>
                                    </th>
                                    <th class="w_90">
                                        <p>複数商品を<br>まとめて処理</p>
                                    </th>
                                    <th class="w_60">
                                        <p>基準重量</p>
                                    </th>
                                    <th class="w_60">
                                        <p>最大容量</p>
                                    </th>
                                    <th class="w_50">
                                        <p>登録日</p>
                                    </th>
                                    <!-- <th>
                                        <div class="c-buttonArea">
                                          <a data-remodal-target="modal_delete" class="c-button__min c-button__gray">選択項目<br />を削除</a>
                                        </div>
                                    </th> -->
                                    </thead>
                                    <tbody>
                                    @foreach($products as $value)
                                        <tr data-href="{{ route('admin.item.edit', ['product' => $value]) }}">
                                            <td>
                                                <div class="c-image"
                                                     style="background-image:url({{ $value['image_path'] ? Storage::disk('s3')->temporaryUrl($value['image_path'], Carbon::now()->addMinute()) : '' }})"></div>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6 data">{{ data_get($value, 'category_name') }}</p>
                                                <p class="c-text__lv6 data">{{ data_get($value, 'fish_name')  }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6 c-text__weight--700 data">{{ data_get($value, 'title')  }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6 c-text__weight--700 data">
                                                    ¥{{ number_format($value['price']) != '9' ? number_format($value['price']) : '-' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6 data">{{ $value['natural_type'] == 0 ? '天然' : '養殖' }}</p>
                                                <p class="c-text__lv6">{{ $value->getProcessName() }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">{{ data_get($value, 'unit_name')  }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6"><span
                                                        class="c-text__unit">±</span>{{ $value['tolerance'] }}%</p>
                                            </td>
                                            <td>
                                                <div style="margin:0 10px" class="c-icon__w16 c_dealing_type"
                                                     data-check="{{ $value['dealing_type'] == 1 ? 'checkTrue' : 'checkFalse' }}"></div>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">{{ data_get($value, 'cast_weight_value')  }}<span
                                                        class="c-text__unit">kg</span></p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">{{ data_get($value, 'max_quantity')  }}<span
                                                        class="c-text__unit">尾</span></p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">{{ $value->create_date }}</p>
                                            </td>
                                        <!-- <td>
                                 <form>
                                    <div class="c-checkbox">
                                       <input type="checkbox" name="delete" id="{{ $value['select_1'] }}">
                                       <label class="label-none" for="{{ $value['select_2'] }}"></label>
                                    </div>
                                 </form>
                              </td> -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($products->isEmpty())
                                    @include('market.element._noContent')
                                @endif
                            </div>
                        </div>
                    </li>

                </ul>
            </div>


        </section>
    </div>
@endsection
