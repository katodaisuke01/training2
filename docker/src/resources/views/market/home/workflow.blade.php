@extends('layouts.layout_market')

@section('content')
<div class="l-page page-workflow">
  <section class="l-workflow">
    <div class="l-workflow__head">
      <div class="l-container">
        <h4 class="c-text c-text__lv3 c-text__weight--900">計量・撮影・QRコード発行</h4>
        <div class="c-alert">
          <p class="c-text__lv5 c-text__weight--700">計量、撮影の際は商品を計量皿から動かさないでください。</p>
        </div>
      </div>
    </div>
    <div class="l-workflow__body">
      <div class="l-container">
        <div class="l">
          <div class="l-fix__200">
            <div class="c-image" style="background-image:url({{ $order[0]->order_product->image_path ? Storage::disk('s3')->temporaryUrl($order[0]->order_product->image_path, Carbon::now()->addMinute()) : '' }});">
            </div>
          </div>
          <div class="l-auto">
            <div class="c-box">
              <div class="c-text">
                <ul class="p-list__wrap">
                  <li>
                    <article>
                        <p class="label">商品名</p>
                        <p class="c-text__lv4 data">{{ $order[0]->order_product->title }}</p>
                    </article>
                  </li>
                  <li>
                    <article>
                        <p class="label">注文事業者</p>
                        <p class="c-text__lv4 data">{{ $order[0]->m_business->name }}</p>
                    </article>
                  </li>
                  <li>
                    <article>
                        <p class="label">注文個数</p>
                        <p class="c-text__lv3 c-text__weight--900 c-text__main number" data-after="個" id="order_base_quantity">{{ $order[0]->quantity }}</p>
                    </article>
                  </li>
                  @if (isset($order[0]->order_product->base_weight))
                    <li>
                        <article>
                          <p class="label">基準</p>
                          <p class="c-text__lv5 data">{{ $order[0]->order_product->base_weight }}<small class="c-text__unit">g</small></p>
                        </article>
                    </li>
                  @endif
                  <li>
                    <article>
                        <p class="label">単位</p>
                        <p class="c-text__lv5 data">{{ $order[0]->order_product->getUnitName() }}</p>
                    </article>
                  </li>
                  <li>
                    <article>
                        <p class="label">加工・締め</p>
                        <p class="c-text__lv5 data">{{ $order[0]->order_product->getProcessName() }}</p>
                    </article>
                  </li>
                  <li>
                    <article>
                        <p class="label">配送先</p>
                        <p class="c-text__lv4 data">{{ $order[0]->m_business->getAddress() }}</p>
                    </article>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="l-fix__300">
            <div class="total">

              <p class="number c-text__lv1 c-text__main" data-unit="件" style="margin-bottom: 0px;">
                <span class="c-text__unit">（処理済数/注文数）</span>
                {{ $complete_order }}/<small id="update_quantity">{{ $order[0]->total_order_count }}</small>
              </p>

              <div class="c-buttonArea__wrap">
                <button class="c-button__min c-button__line" id="product_count_reset_btn" data-group="{{ app('request')->input('businessGroup') }}" data-product="{{ app('request')->input('order') }}" data-object="{{ app('request')->input('product_id') }}">リセット</button>
                <button class="c-button__min c-icon__add" id="add_product_btn" data-group="{{ app('request')->input('businessGroup') }}" data-product="{{ app('request')->input('order') }}" data-object="{{ app('request')->input('product_id') }}">処理数の追加</button>
              </div>
            </div>
          </div>
        </div>
        <form action="{{ route('industry.market.workflow_store') }}" method="POST" enctype="multipart/form-data">
          <div class="l p-workflow" id="js_page_change" @if($order[0]->total_order_count == $complete_order) data-complete="true" @else data-complete="false" @endif>
          @csrf
            <div class="l-fix__250 weight">
              <div class>
                <div class="head">
                  <p class="c-text__lv3 c-text__weight--900 c-text__main">重量</p>
                </div>
                <div class="body">
                  <span class="c-text__lv6">この商品の許容値は±<strong>{{ $permit_tolerance }}</strong>gです</span>
                  <div class="c-input c-input__end" style="flex-wrap:nowrap">
                    <div class="c-input c-input_full">
                      <input type="number" name="determined_weight" value="{{$worked_order->weight ?? 0}}" class="c-text__weight--900" placeholder="0" id="load_weight" readonly="readonly">
                    </div>
                    <span class="c-text__lv5">g</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="l-fix__300 photo">
              <div class="c-full">
                <div class="head">
                  <p class="c-text__lv3 c-text__weight--900 c-text__main">撮影する</p>
                </div>
                <div class="body">
                  <a class="c-label">
                    @if(!empty($worked_order) && !empty($worked_order->image_path))
                      <canvas class="c-image__photo canvas_image" id="picture" data-file="on" width="280" height="210" style="background-image:url({{ Storage::disk('s3')->temporaryUrl($worked_order->image_path, Carbon::now()->addMinute()) }})"></canvas>
                    @else
                      <canvas class="c-image__photo canvas_image" id="picture" data-file="off" width="280" height="210"></canvas>
                    @endif
                  </a>
                </div>
              </div>
            </div>
            <div class="l-auto qr" id="qr_lavel_for_print">
              <div class>
                <div class="head">
                  <p class="c-text__lv3 c-text__weight--900 c-text__main">印刷する</p>
                </div>
                <div class="body">
                  <div class="c-box js_padd_off">
                    <div class="l">
                      <div class="l-fix__120">
                        <ul class="p-list__col">
                          <li>
                            <article>
                                <p class="c-text__lv5 data">徳島県<span>産</span></p>
                            </article>
                          </li>
                          <li>
                            <div class="c-input__file">
                              <!-- <input type="file" id="pic-0">
                              <label class="c-icon" for="pic-0" style="margin-top: 10px;"></label> -->
                              @if(!empty($target_order))
                                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('itemDetail', ['order' => $target_order->id]) }}&size=120x120" alt="QRコード" style="margin-top: 10px;" />
                              @else
                                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('itemDetail', ['order' => $worked_order->id]) }}&size=120x120" alt="QRコード" style="margin-top: 10px;" />
                              @endif
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="l-auto">
                        <ul class="p-list__split2">
                          <li>
                            <article>
                                <p class="c-text__lv4 data">{{ $order[0]->order_product->title }}</p>
                            </article>
                          </li>
                          <li>
                            <div class="c-buttonArea__end button_for_print">
                                <a class="c-button__min c-button__round" id="print_lavel" onclick="partialPrint();" target="_blank" disabled>ラベル印刷</a>
                            </div>
                          </li>
                          <li>
                            <article>
                                <p class="c-text__lv5 data">（{{ \App\Models\OrderProduct::NATURAL_TYPE_LIST[$order[0]->order_product->natural_type] }}）</p>
                            </article>
                          </li>
                          <li class="c-row">
                            <article>
                                <p class="c-text__lv6 label">水揚日</p>
                                <p class="c-text__lv5 c-text__weight--700 data">{{ $order[0]->getLandingDateAttribute() }}</p>
                            </article>
                          </li>
                          <li class="c-row">
                            <article>
                                <p class="c-text__lv6 label">内容量</p>
                                <p class="c-text__lv5 c-text__weight--700 data" id="order_weight">{{ $order[0]->order_product->base_weight }}g</p>
                            </article>
                          </li>
                          <li class="c-row">
                            <article>
                                <p class="c-text__lv6 label">浄化日</p>
                                <p class="c-text__lv5 c-text__weight--700 data">{{ $order[0]->getPurificationDateAttribute() }}</p>
                            </article>
                          </li>
                          <li class="c-row">
                            <article>
                                <p class="c-text__lv6 label">加工・締め</p>
                                <p class="c-text__lv5 c-text__weight--700 data">{{ $order[0]->order_product->getProcessName() }}</p>
                            </article>
                          </li>
                          <li class="c-row">
                            <article>
                                <p class="c-text__lv6 label">発送日</p>
                                <p class="c-text__lv5 c-text__weight--700 data">{{ $order[0]->shipping_date->format('Y/m/d') }}</p>
                            </article>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="l c-border__top">
                      <div class="l-fix l-fix__80">
                        <p class="c-text__lv6">加工者</p>
                      </div>
                      <div class="l-auto">
                        <p class="c-text__lv4">
                            {{data_get($order[0], 'order_product.industry_group.name')}}
                            <small>{{data_get($order[0], 'order_product.industry_group.display_address')}}{{data_get($order[0], 'order_product.industry_group.display_address2')}}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="l-workflow__foot">
      <div class="l-container">
      @if ($errors->has('order_package'))
        <p class="c-text__error" style="display:inline-block; background: aliceblue; margin-bottom: 5px;">
        {{ __($errors->first('order_package')) }}
        </p>
      @endif
      @if ($errors->has('qr_code'))
        <p class="c-text__error" style="display:inline-block; background: aliceblue; margin-bottom: 5px;">
        {{ __($errors->first('qr_code')) }}
        </p>
      @endif
      @if (!empty(app('request')->input('qr')))
        <p class="c-text__error" style="display:inline-block; background: aliceblue; margin-bottom: 5px;">
        QRコードは既に使用されています。
        </p>
      @endif
        <div class="p-scrollBox">
          <div class="p-scroll">
            <div class="p-scroll__inner">
              <ul class="p-listBox c-list__scroll">
                @forelse($pack_orders as $key => $container)
                  <li  class="js-iconBox" data-number="{{ $key }}">
                    <div class="c-icon__w32 c-icon__box tab">
                      <input type="hidden" name="package_id" value="{{ $key }}"/>
                    </div>
                  </li>
                @empty
                  <li  class="js-iconBox">
                    <div class="c-icon__w40 c-icon__box tab"></div>
                  </li>
                @endforelse
              </ul>
            </div>
          </div>
          <div class="c-icon__w40 c-icon__plus"></div>
        </div>
        <form action="{{ route('industry.market.workflow_store') }}" method="POST" id="form_work_flow" class="c-box l-bg__light">
          <input type="hidden" name="pending_task" value="off" id="pend_work_flow"/>
          <input type="hidden" name="complete_task" value="off" id="complete_work_flow"/>
          <input type="hidden" name="order_product_id" value="{{ app('request')->input('product_id') }}">
          <input type="hidden" name="order_group_id" value="{{ app('request')->input('order') }}">
          <input type="hidden" name="business_group_id" value="{{ app('request')->input('businessGroup') }}">
          <input type="hidden" name="page_id" value="{{ app('request')->input('page') }}">
        @csrf
          <div class="p-frame">
            <p class="c-text__lv4 c-text__weight--900 c-text__main">梱包内容</p>
            @forelse($pack_orders as $order_key => $order_value)
              <div class="p-listCard c-content">
                <ul class="c-listCard" data-package="{{$order_key}}">
                  @if(!empty($target_order))
                    <li class="new_content">
                      <input type="hidden" name="new_packing_target" value="{{ $target_order->id }}">
                      <article>
                        <span class="c-appearance">作業中</span>
                        <canvas class="c-image canvas_image" id="small_picture" data-file="on" width="100" height="80" style="background-image:url({{ $worked_order->image_path ? Storage::disk('s3')->temporaryUrl($worked_order->image_path, Carbon::now()->addMinute()) : '' }})"></canvas>
                        <div class="c-text">
                            <ul class="p-list">
                              <li>
                                  <div class="data">
                                    <label class="c-text__lv6">{{ $target_order->order_product->title }}</label>
                                  </div>
                              </li>
                              @if(!empty($target_order->weight))
                                <li>
                                    <div class="data">
                                      <label class="c-text__lv5 c-text__main c-text__weight--900" id="order_target_weight">{{ $target_order->weight }}<small class="c-text__unit">g</small></label>
                                    </div>
                                </li>
                              @endif
                            </ul>
                        </div>
                      </article>
                      <input type="hidden" value="" />
                    </li>
                  @else
                    <input type="hidden" name="worked_order_target" value="{{ $worked_order->id }}">
                  @endif

                  @forelse($pack_orders[$order_key] as $key => $val)
                    <li class="pack_order" data-pack="{{ $val->order_package_id }}">
                      <article>
                        <span data-remodal-target="modal_product_delete_{{ $val->page_number.'_'.$val->simultaneous_order_code }}" class="c-button__gray">削除</span>
                        <div class="c-image" style="background-image:url({{ $val->image_path ? Storage::disk('s3')->temporaryUrl($val->image_path, Carbon::now()->addMinute()) : '' }});">
                        </div>
                        <div class="c-text">
                            <ul class="p-list">
                              <li>
                                  <div class="data">
                                    <label class="c-text__lv6">{{ $val->order_product->title }}</label>
                                  </div>
                              </li>
                              @if(isset($val->weight))
                                <li>
                                    <div class="data">
                                      <label class="c-text__lv5 c-text__main c-text__weight--900">{{ $val->weight ?? '' }}<small class="c-text__unit">g</small></label>
                                    </div>
                                </li>
                              @endif
                            </ul>
                        </div>
                      </article>
                      @include('market.element.modal._modal_product_delete', [
                        'delete_order' => $val,
                      ])
                    </li>
                  @empty
                    <input type="hidden" name="order_package" value="new" id="new_order_package">
                  @endforelse
                </ul>
              </div>
            @empty
              <div class="p-listCard c-content">
                <ul class="c-listCard">
                  @if(!empty($target_order))
                    <li class="new_content">
                      <input type="hidden" name="new_packing_target" value="{{ $target_order->id }}">
                      <article>
                        <span class="c-appearance">作業中</span>
                        <canvas class="c-image canvas_image" id="small_picture" data-file="on" width="100" height="80" style="background-image:url({{ $worked_order->image_path ? Storage::disk('s3')->temporaryUrl($worked_order->image_path, Carbon::now()->addMinute()) : '' }})"></canvas>
                        <div class="c-text">
                            <ul class="p-list">
                              <li>
                                  <div class="data">
                                    <label class="c-text__lv6">{{ $target_order->order_product->title }}</label>
                                  </div>
                              </li>
                              @if(!empty($target_order->weight))
                                <li>
                                    <div class="data">
                                      <label class="c-text__lv5 c-text__main c-text__weight--900" id="order_target_weight">{{ $target_order->weight }}<small class="c-text__unit">g</small></label>
                                    </div>
                                </li>
                              @endif
                            </ul>
                        </div>
                      </article>
                      <input type="hidden" name="order_package" value="new" id="new_order_package">
                    </li>
                  @endif
                </ul>
              </div>
            @endforelse
          </div>
          <div class="p-fixBottom">
            <div class="c-buttonArea__center">
              <a class="c-button__min c-button__round c-button__line" id="pending_task">作業を一時終了</a>
              <a class="c-button__min c-button__round c-button__line" id="complete_task">作業完了</a>
              <a targrt="_blank" class="c-button__min c-button__round c-button" href="{{ route('industry.market.dacs.index') }}">DACS計量済み商品一覧へ</a>
              <!-- POC緊急時対策用 -->
                {{-- <a class="c-button__min c-button__round c-button__line" id="emergency_button">QR確認</a> --}}
                <style>
                  #emergency_button {
                    opacity: 0.3;
                  }
                  #emergency_button:hover {
                    opacity: 1;
                  }
                </style>
                <script>
                  $('#emergency_button').on('click', function(e) {
                    console.log('ok');
                    e.preventDefault();
                    $('#js-target-on').css({'opacity':'1','height':'30px','margin':'8px 0 0 0','padding':'4px 8px'});
                  })
                </script>
              <!-- ここまで -->
            </div>
            <a class="c-button__wide c-button__round" id="next_task">保存して次の作業へ</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<!-- モーダル_カメラ -->
@include('market.element.modal._modal_camera')
<script src="{{asset('js/scriptCamera.js')}}"></script>
    <!-- 作業画面処理数追加 -->
    <script>
        $(function () {
            cameraStop()
            $('#add_product_btn').on('click', function () {
                var groupId = $(this).data('group');
                var productId = $(this).data('product');
                var objectId = $(this).data('object');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: 'POST',
                    url: "workflow/addProduct",
                    dataType: 'json',
                    data: {
                        'businessGroup': groupId,
                        'product_code': productId,
                    }
                })
                $('#update_quantity').text((Number($('#update_quantity').text()) + 1))
                if ($('#js_page_change').data('complete') == true) {
                    window.location.href = '{{ route("industry.market.workflow") }}' + '?product_id=' + objectId + '&order=' + productId + '&businessGroup=' + groupId + '&page=' + $('#update_quantity').text();
                }
            })

            // リセット
            $('#product_count_reset_btn').on('click', function () {
                var groupId = $(this).data('group');
                var productId = $(this).data('product');
                var objectId = $(this).data('object');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: 'POST',
                    url: "workflow/resetCount",
                    dataType: 'json',
                    data: {
                        'businessGroup': groupId,
                        'product_code': productId,
                    }
                })
                $('#update_quantity').text($('#order_base_quantity').text())
                window.location.href = '{{ route("industry.market.workflow") }}' + '?product_id=' + objectId + '&order=' + productId + '&businessGroup=' + groupId + '&page=1';
            })

        })

    </script>
@endsection
