@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__fish"></span>
                    商品管理<small>編集</small>
                </h2>
            </div>
            <form action="{{ route('admin.item.update', [$product]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="title c-text__main c-text__weight--900">商品情報登録</p>
                        </div>
                        <div class="l">
                            <div class="l-fix l-fix__250">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">現在の画像</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file">
                                                <div class="c-image"
                                                     style="background-image:url({{ $product['image_path'] ? Storage::disk('s3')->temporaryUrl($product['image_path'], Carbon::now()->addMinute()) : '' }})"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">画像登録</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file">
                                                <input type="file" id="image" name="image">
                                                <label for="image"></label>
                                            </div>
                                            <p class="c-text__unit">画像サイズ：最大5MB以内</p>
                                            <!-- <p class="c-text__error" style="display:inline-block;">画像アップロードサイズは5MB以内としてください</p> -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">複数商品をまとめて処理</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input__end">
                                                <div class="c-radio switch">
                                                    @if($product->dealing_type == 1)
                                                        <input type="radio" name="dealing_type" id="operation_yes"
                                                               checked value="1">
                                                        <label for="operation_yes">する</label>
                                                        <input type="radio" name="dealing_type" id="operation_no"
                                                               value="0">
                                                        <label for="operation_no">しない</label>
                                                    @else
                                                        <input type="radio" name="dealing_type" id="operation_yes"
                                                               value="1">
                                                        <label for="operation_yes">する</label>
                                                        <input type="radio" name="dealing_type" id="operation_no"
                                                               checked value="0">
                                                        <label for="operation_no">しない</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @if(!empty($product->max_quantity))
                                        <li class="max_quantity_form">
                                    @else
                                        <li class="max_quantity_form" style="display:none;">
                                            @endif
                                            <div class="head">
                                                <label class="p-listForm__label">1箱あたりに入る最大容量</label>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__end">
                                                    <div class="c-input c-input_100">
                                                        <input type="number" name="max_quantity" placeholder="0"
                                                               value="{{ $product->max_quantity }}">
                                                    </div>
                                                    <p class="c-text__lv4">商品</p>
                                                </div>
                                                @if ($errors->has('max_quantity'))
                                                    <p class="c-text__error" style="display:inline-block;">
                                                        {{ __($errors->first('max_quantity')) }}
                                                    </p>
                                                @endif
                                            </div>
                                        </li>
                                </ul>
                            </div>
                            <div class="l-auto">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">カテゴリー</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="m_category_id" value="{{ $product->m_category_id }}">
                                                    <option disabled>カテゴリーを選択</option>
                                                    @foreach($categoryList as $value)
                                                        <option value="{{ $value['id'] }}"
                                                                @if($product->m_category_id == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('m_category_id'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('m_category_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">魚種</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="m_fish_category_id"
                                                        value="{{ $product->m_fish_category_id }}">
                                                    <option disabled>魚種を選択</option>
                                                    @foreach($FishCategoryList as $value)
                                                        <option value="{{ $value['id'] }}"
                                                                @if($product->m_fish_category_id == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('m_fish_category_id'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('m_fish_category_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">商品名称</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <input type="text" name="title" placeholder="商品名を入力"
                                                       value="{{ $product->title }}">
                                            </div>
                                            @if ($errors->has('title'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('title')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="data">
                                            <div class="p-listForm__item">
                                                <div class="head">
                                                    <label class="p-listForm__label required">販売価格</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input_200">
                                                            <input type="number" name="price" placeholder="0"
                                                                   value="{{ data_get($product, 'price') }}">
                                                        </div>
                                                        <p class="c-text__lv4">円</p>
                                                    </div>
                                                    @if ($errors->has('natural_type'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('natural_type')) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">天然・養殖</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="natural_type" value="{{ $product->natural_type }}">
                                                    <option disabled>天然・養殖を選択</option>
                                                    <option value="{{ \App\Models\OrderProduct::TYPE_NATURAL }}"
                                                            @if($product->natural_type == 0) selected @endif>天然
                                                    </option>
                                                    <option value="{{ \App\Models\OrderProduct::TYPE_AQUACULTURE }}"
                                                            @if($product->natural_type == 1) selected @endif>養殖
                                                    </option>
                                                </select>
                                            </div>
                                            @if ($errors->has('natural_type'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('natural_type')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">加工・締め</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="m_process_id" value="{{ $product->m_process_id }}">
                                                    <option disabled>加工・締めを選択</option>
                                                    @foreach($ProcessCategoryList as $value)
                                                        <option value="{{ $value['id'] }}"
                                                                @if($product->m_process_id == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('m_process_id'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('m_process_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">単位</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="m_unit_id" value="{{ $product->m_unit_id }}">
                                                    <option disabled>単位を選択</option>
                                                    @foreach($unitCategoryList as $value)
                                                        <option value="{{ $value['id'] }}"
                                                                @if($product->m_unit_id == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('m_unit_id'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('m_unit_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <article class="f-wrap">
                                            <div class="p-listForm__item">
                                                <div class="head">
                                                    <label class="p-listForm__label">基準重量</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input_100">
                                                            <input type="number" name="base_weight" placeholder="0"
                                                                   value="{{ $product->base_weight }}">
                                                        </div>
                                                        <p class="c-text__lv4">kg</p>
                                                    </div>
                                                    @if ($errors->has('base_weight'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('base_weight')) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-listForm__item">
                                                <div class="head">
                                                    <label class="p-listForm__label">計量許容値</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <p class="c-text__lv2 c-text__main">±</p>
                                                        <div class="c-input c-input_100">
                                                            <input type="number" name="tolerance" placeholder="0"
                                                                   value="{{ $product->tolerance }}">
                                                        </div>
                                                        <p class="c-text__lv4">%</p>
                                                    </div>
                                                    @if ($errors->has('tolerance'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('tolerance')) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <article class="f-wrap">
                                            <div class="p-listForm__item">
                                                <div class="head">
                                                    <label class="p-listForm__label ">水揚日</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input_100">
                                                            <input type="number" name="landing_configuration"
                                                                   placeholder="0"
                                                                   value="{{ $product->landing_configuration }}">
                                                        </div>
                                                        <p class="c-text__lv4">日前</p>
                                                    </div>
                                                    @if ($errors->has('landing_configuration'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            { __($errors->first('landing_configuration')) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-listForm__item">
                                                <div class="head">
                                                    <label class="p-listForm__label ">浄化日</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input_100">
                                                            <input type="number" name="purification_configuration"
                                                                   placeholder="0"
                                                                   value="{{ $product->purification_configuration }}">
                                                        </div>
                                                        <p class="c-text__lv4">日前</p>
                                                    </div>
                                                    @if ($errors->has('purification_configuration'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('purification_configuration')) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    {{-- 倉庫管理の魚種ごとのグラフで使う色 --}}
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">イメージカラー</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="color" id="color-select" onChange="applyColor(this);" style="background-color:#{{ $product->color }}">
                                                    @foreach($colorList as $color)
                                                        <option style="background-color: #{{ $color }}" value="{{ $color }}" @if($color == $product->color) selected @endif></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <script>
                                            function applyColor(obj){
                                                const targetIndex = obj.selectedIndex;
                                                const value = obj.options[targetIndex].value;
                                                const targetElement = document.getElementById("color-select");
                                                targetElement.style.backgroundColor = `#${value}`;
                                            }
                                        </script>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">商品説明</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <textarea name="article" placeholder="商品説明を記入してください" cols="30" rows="10"
                                                          style="height:200px">{{ $product->article }}</textarea>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="p-index__foot">
                    <div class="c-buttonArea__bottom c-buttonArea__end">
                        <a data-remodal-target="modal_item_delete"
                           class="c-button c-button__round c-button__min c-button__gray" id="item_delete"
                           data-id="{{ $product->id }}">削除する</a>
                        <!-- <a data-remodal-target="modal_delete" class="c-button c-button__round c-button__min c-button__gray">削除する</a> -->
                        <a href="javascript:history.back()"
                           class="c-button c-button__round c-button__min c-button__line">戻る</a>
                        <button class="c-button c-button__round c-button__wide ">保存する</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    @include('market.element.modal._modal_item_delete', [
       'product' => $product
    ])
@endsection
