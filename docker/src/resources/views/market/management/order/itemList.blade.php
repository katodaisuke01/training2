@extends('layouts.layout_marketManagement_nonAside')
@section('page_class', 'l-view__qr')
@section('content')
<div class="l-container l-page__scan">
   <section class="p-index">
      <div class="p-index__head">
         <h2 class="title">
            <span class="c-icon c-icon__checked"></span>
            梱包商品一覧
         </h2>
      </div>
      <div class="p-index__body c-box">
         
         <div class="p-scroll__yaxis600">
            <div class="p-scroll__inner--500">
               <table class="p-table">
                  <thead>
                     <th class="w_100">
                        <label class="c-text__label">画像</label>
                     </th>
                     <th>
                        <label class="c-text__label">商品名</label>
                     </th>
                     <th class="w_70">
                        <label class="c-text__label">数量</label>
                     </th>
                     <th class="w_120">
                        <label class="c-text__label">受注日</label>
                     </th>
                     <th class="w_120">
                        <label class="c-text__label">重量</label>
                     </th>
                  </thead>
                  <tbody>
                     @php
                       $sum = 0;    
                     @endphp
                     @foreach($orders as $key => $order)
                        <tr>
                           <td>
                              <div class="c-image" style="background-image:url({{ data_get($order, 'image_path') ? Storage::disk('s3')->temporaryUrl(data_get($order, 'image_path'), Carbon::now()->addMinute()) : '' }})"></div>
                           </td>
                           <td>
                              <p class="c-text__lv5 data">
                              {{ data_get($order, 'order_product.title') }}
                              </p>
                           </td>
                           <td>
                              <p class="c-text__lv5 data">
                              {{ data_get($order, 'quantity') }}<small>尾</small>
                              </p>
                           </td>
                           <td>
                              <p class="c-text__lv5 data">
                              {{ data_get($order, 'created_at')->format('Y/m/d') }}
                              </p>
                           </td>
                           <td>
                              <p class="c-text__lv5 data">
                              {{ number_format(data_get($order, 'weight')/1000,1) }}kg
                              </p>
                           </td>
                        </tr>
                        @php
                          $sum += data_get($order, 'weight')/1000;   
                        @endphp
                     @endforeach
                  </tbody>
               </table>
               <div>
                  <br>
                  <h2 class="title">合計重量</h2>
                  <br>
                  <h3 class="title">{{ number_format($sum,1) }}kg</h3>
               </div>
            </div>
         </div>
         
      </div>
   </section>
</div>
@endsection
