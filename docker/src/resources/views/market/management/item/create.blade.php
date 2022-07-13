@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__fish"></span>
                    商品管理<small>新規登録
                        <icon
                        /small>
                </h2>
            </div>
            <form action="{{ route('admin.item.store') }}" method="POST" name="store" enctype="multipart/form-data">
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
                                            <label class="p-listForm__label">画像登録</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file">
                                                <input type="file" id="image" name='image'>
                                                <label for="image"></label>
                                            </div>
                                            <p class="c-text__unit">画像サイズ：最大5MB以内</p>
                                            <!-- <p class="c-text__error">画像アップロードサイズは5MB以内としてください</p> -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">複数商品をまとめて処理</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input__end">
                                                <div class="c-radio switch">
                                                    <input type="radio" name="dealing_type" id="operation_yes"
                                                           value="1">
                                                    <label for="operation_yes">する</label>
                                                    <input type="radio" name="dealing_type" id="operation_no" checked=""
                                                           value="0">
                                                    <label for="operation_no">しない</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <div class="js_toggle_content" style="display: none; margin-top:10px;">
                                        <li>
                                            <div class="head">
                                                <label class="p-listForm__label required">1箱あたりに入る最大容量</label>
                                            </div>
                                            <div class="data">
                                                <div class="c-input c-input__end">
                                                    <div class="c-input c-input_100">
                                                        <input type="number" name="max_quantity" placeholder="0"
                                                               value="{{old('max_quantity')}}">
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
                                    </div>
                                </ul>
                            </div>
                            <div class="l-auto">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">カテゴリー</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="category_id" id="m-categories-select">
                                                    <option value="">カテゴリーを選択</option>
                                                    @foreach($categoryList as $value)
                                                        <option value="{{ ($value['id']) }}"
                                                                @if(old('category_id') == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('category_id'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('category_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <script>
                                        // バリデーションエラーでリダイレクトしたときに発火
                                        window.onload = function () {
                                            const category = document.store.category_id;
                                            const selectedIndex = category.selectedIndex;
                                            const id = category.options[selectedIndex].value;
                                            makeOptions(id);
                                        }

                                        // セレクトボックスを変更したとき
                                        $("#m-categories-select").change(function () {
                                            let id = $(this).val();
                                            makeOptions(id);
                                        })

                                        // セレクトボックスのoptionを作る
                                        function makeOptions(id) {
                                            let data = @json($FishCategoryList);
                                            $('#m-fish-categories-select').empty();
                                            if (id == '') {
                                                $('#m-fish-categories-select').append('<option value>魚種を選択</option>');
                                            } else {
                                                $('#m-fish-categories-select').append('<option value>選択してください</option>');
                                                $.each(data, function (index, value) {
                                                    if (value['m_category_id'] == id) {
                                                        html = `<option value="${value.id}">${value.name}</option>`;
                                                        $('#m-fish-categories-select').append(html);
                                                    }
                                                })
                                            }
                                        }
                                    </script>
                                    <li style="margin: 12px 0 0">
                                        <div class="head">
                                            <label class="p-listForm__label required">魚種</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="fish_category" id="m-fish-categories-select">
                                                    <option>魚種を選択</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('fish_category'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('fish_category')) }}
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
                                                       value="{{ old('title') }}">
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
                                                            <input type="number" name="price" value="{{ old('price') }}"
                                                                   placeholder="0">
                                                        </div>
                                                        <p class="c-text__lv4">円(税込)</p>
                                                    </div>
                                                    @if ($errors->has('price'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('price')) }}
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
                                                <select name="natural_type">
                                                    <option disabled>天然・養殖を選択</option>
                                                    <option value="{{ \App\Models\OrderProduct::TYPE_NATURAL }}"
                                                            @if(old('natural_type') == \App\Models\OrderProduct::TYPE_NATURAL) selected @endif>
                                                        天然
                                                    </option>
                                                    <option value="{{ \App\Models\OrderProduct::TYPE_AQUACULTURE }}"
                                                            @if(old('natural_type') == \App\Models\OrderProduct::TYPE_AQUACULTURE) selected @endif>
                                                        養殖
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
                                                <select name="process_id">
                                                    <option disabled>加工・締めを選択</option>
                                                    @foreach($ProcessCategoryList as $value)
                                                        <option value="{{ $value['id'] }}"
                                                                @if(old('process_id') == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('process'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('process')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">単位</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select name="unit_id">
                                                    <option disabled>単位を選択</option>
                                                    @foreach($unitCategoryList as $value)
                                                        <option value="{{ $value['id'] }}"
                                                                @if(old('unit_id') == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('unit_id'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('unit_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <article class="f-wrap">
                                            <div class="p-listForm__item">
                                                <div class="head">
                                                    <label class="p-listForm__label required">基準重量</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input_100">
                                                            <input type="text" name="base_weight" placeholder="0"
                                                                   value="{{old('base_weight')}}">
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
                                                    <label class="p-listForm__label required">計量許容値</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <p class="c-text__lv2 c-text__main">±</p>
                                                        <div class="c-input c-input_100">
                                                            <input type="number" name="tolerance" placeholder="0"
                                                                   value="{{ old('tolerance') }}">
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
                                                    <label class="p-listForm__label">水揚日</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input_100">
                                                            <input type="number" name="landing_configuration"
                                                                   placeholder="0"
                                                                   value="{{ old('landing_configuration') }}">
                                                        </div>
                                                        <p class="c-text__lv4">日前</p>
                                                    </div>
                                                    @if ($errors->has('landing_configuration'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('landing_configuration')) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-listForm__item">
                                                <div class="head">
                                                    <label class="p-listForm__label">浄化日</label>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input c-input__end">
                                                        <div class="c-input c-input_100">
                                                            <input type="number" name="purification_configuration"
                                                                   placeholder="0"
                                                                   value="{{ old('purification_configuration') }}">
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
                                                <select name="color" id="color-select" onChange="applyColor(this);" style="background-color: #{{ old('color') }}">
                                                    <option value="">イメージカラーを選択</option>
                                                    @foreach($colorList as $color)
                                                        <option style="background-color: #{{ $color }}" value="{{ $color }}" @if($color == old('color')) selected @endif></option>
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
                                                          style="height:200px" value="{{ old('article') }}"></textarea>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-index__foot">
                    <div class="c-buttonArea__bottom c-buttonArea__end">
                        <a href="javascript:history.back()" class="c-button__round c-button__min c-button__gray">戻る</a>
                        <button type="submit" class="c-button__round c-button__wide ">保存する</button>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
