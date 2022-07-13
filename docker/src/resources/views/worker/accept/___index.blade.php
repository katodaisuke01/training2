@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__accept')
@section('title', '荷受け・荷捌き業務')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">

            <div class="p-page">
                <div class="l">
                    <div class="l-fix l-fix__250">
                        <div class="c-full">
                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">QR読み込みの入荷箱</p>
                            </div>
                            <div class="c-box shadow">
                                <div class="c-finished" style="display:none">
                                    <p class="c-text__lv4 c-text__weight--700 ">処理済み</p>
                                </div>
                                <div class="c-box__body">
                                    <div class="c-icon c-icon__box" style="opacity:1"></div>
                                    <div class="c-text">
                                        <ul class="p-list">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">産地</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">鹿児島県漁協佐多支所</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">商品数</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv3 c-text__user c-text__weight--900">3<span
                                                            class="c-text__unit">点</span></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 注文詳細 -->
                {{-- @include('worker.element._detailOrderList') --}}
                <!-- or -->
                    <div class="l-auto">
                        <div class="c-full">
                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">梱包商品</p>
                            </div>
                            <div class="c-box shadow">
                                <div class="c-box__body">
                                    <table class="p-table">
                                        <thead>
                                        <th class="w_80">
                                            <p class="c-text__label">商品画像</p>
                                        </th>
                                        <th>
                                            <p class="c-text__label">商品名称</p>
                                        </th>
                                        <th>
                                            <p class="c-text__label">計量値</p>
                                        </th>
                                        <th>
                                            <p class="c-text__label">運送会社</p>
                                        </th>
                                        <th class="w_80">
                                            <p class="c-text__label">チェック</p>
                                        </th>
                                        <th class="w_50">
                                            <p class="c-text__label">確認</p>
                                        </th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="c-image"
                                                     style="background-image:url({{ asset('image/sample/image_sava.png') }})"></div>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">サバ（真鯖）</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">520<span class="c-text__unit">g</span></p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">ソラシドエア</p>
                                            </td>
                                            <td class="">
                                                <div class="c-buttonArea">
                                                    <div class="c-button__line--user c-button__check">確認</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="c-checkbox">
                                                    <input type="checkbox" name="select" id="select__1">
                                                    <label for="select__1"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="c-image"
                                                     style="background-image:url({{ asset('image/sample/image_aji.png') }})"></div>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">アジ（真鯵）</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">520<span class="c-text__unit">g</span></p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">ソラシドエア</p>
                                            </td>
                                            <td class="">
                                                <div class="c-buttonArea">
                                                    <div class="c-button__line--user c-button__check">確認</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="c-checkbox">
                                                    <input type="checkbox" name="select" id="select__2">
                                                    <label for="select__2"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="c-image"
                                                     style="background-image:url({{ asset('image/sample/image_hirame.png') }})"></div>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">ひらめ</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">520<span class="c-text__unit">g</span></p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">ソラシドエア</p>
                                            </td>
                                            <td class="">
                                                <div class="c-buttonArea">
                                                    <div class="c-button__line--user c-button__check">確認</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="c-checkbox">
                                                    <input type="checkbox" name="select" id="select__3">
                                                    <label for="select__3"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- 表示情報がないとき -->
                                <!-- @include('worker.element._noContent') -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- <div class="l">
               <div class="l-fix l-fix__400">
                  <div class="c-full">
                     <div class="c-title">
                        <p class="c-text__deep c-text__lv4 c-text__weight--700">本日入荷商品<small>の</small>箱一覧</p>
                        <div class="c-right f-a_center">
                          <p class="c-text__unit">本日入荷の箱数</p>
                          <p class="c-text__lv3 c-text__weight--900 c-text__deep">
                             {{ $orders->count() ?? '0' }}<span class="c-text__lv5 c-text__deep c-text__weight--700">点</span>
                          </p>
                        </div>
                     </div>
                     <input type="text" name="qr_code" value="" id="js-target-on" placeholder="QRコードを読み取る" maxlength="10" inputmode="none" autocomplete="off" style="opacity: 0; height: 0px; margin: 0; padding: 0; display: none;" />
                     <div class="p-scroll__yaxis470">
                        <ul class="p-list ">
                           @forelse($orders as $key => $value)
                <li class="js-order_accept" data-package="{{ $key }}">
                                 <input type="radio" name="accept" id="accept--{{$key}}" value="{{ $key }}" onClick="getOrderList({{ $key }})">
                                 <label class="c-box shadow" for="accept--{{$key}}">
                                    <div class="c-text">
                                       <p class="c-text__deep c-text__lv5 c-text__weight--700">
                                          {{ data_get($value[0], 'order_product.industry_group.name') }}
                    <span class="c-text__tag">生鮮</span>
                 </p>
                 <p class="c-text__lv6 c-text__weight--700">
                    <span class="c-text__lv7">{{data_get($value[0], 'pack_code')  }}</span>
                                          {{ data_get($value[0], 'delivery_partnar.name') }}<small class="c-text__unit">配送</small>
                                       </p>
                                       <p class="c-text__lv5 c-text__weight--700">
                                          {{=- <?php
                                             $topRateProduct3 = \App\Models\Order::where('package_id', $value[0]->package_id)
                                                ->get()
                                                ->groupBy('order_product_id')->values();
                                          ?> --}}

                @foreach($topRateProduct3 as $key => $product)
                    @if($key == 3) break; @endif
                        <span>
{{ data_get($product[0], 'order_product.title') }}
                        <small class="c-text__deep c-text__lv6 c-text__weight--700">
{{ data_get($product[0], 'weight') }}g</small>
                                             </span>
                                             @if($key == 2 || $product->count() >= $key + 1)
                        <small class="c-text__unit">ほか</small>
@else
                        <small class="c-text__unit">•</small>
@endif
                @endforeach
                    </p>
                 </div>
                 <div class="c-icon__check c-icon__w32"></div>
              </label>
           </li>
           <script>
           function getOrderList(package_id) {
              $('#js-insert-orderList').children('tr').remove();
              $('.order_total_count').text('');
              $.ajax({
                 type: 'get',
                 url: "/worker/accept/getOrderList",
                 dataType: 'html',
                 data: {
                 'package_id': package_id,
                 }
              }).done(function(data) {
                 // 要素を挿入
                 $('#js-insert-orderList').append(data);
                 var text = $('#accept_order_list').data('total') + '<span class="c-text__lv5 c-text__deep c-text__weight--700">点</span>';
                 $('.order_total_count').append(text);
              })
           }
           </script>
@empty
                <li>
                   <div class="c-box shadow" for="accept--1" style="padding:160px 24px">
                      <div class="c-text">
                         <p class="c-text__deep c-text__lv5 c-text__weight--700">
                            入荷商品がありません。<br>入荷した箱のQRコードを読み込んでください。
                         </p>
                      </div>
                   </div>
                </li>
@endforelse
                </ul>
             </div>
          </div>
       </div>
       //注文詳細
{{-- @include('worker.element._detailOrderList') --}}
                </div> -->

            </div>
            @include('worker.element._buttonArea_bottom')
        </main>
    </div>
@endsection
