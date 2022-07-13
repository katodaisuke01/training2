@extends('layouts.layout_admin')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <span class="c-icon c-icon__list"></span>
                <h2 class="c-text__lv3 c-text__weight--900">マスタ管理</h2>
            </div>
            <div class="p-index__body">
                <div class="l">
                    <div class="l-fix l-fix__450">
                        <div class="c-box">
                            <div class="c-box__head">
                                <p class="c-text__lv4 c-text__main c-text__weight--700 ">マスタ一覧</p>
                            </div>
                            <div class="c-box__body">
                                <div class="l">
                                    <div class="l-fix l-fix__150">
                                        <ul class="p-list">
                                            <li class="tab switch " data-table="Clients" id="Clients">
                                                <p class="c-text__note">顧客マスタ</p>
                                            </li>
                                            <li class="tab" data-table="Deliveries" id="Deliveries">
                                                <p class="c-text__note">運送業者マスタ</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-auto">
                                        <div class="c-buttonArea__end" style="margin-bottom:15px" id="addButtonDiv">
                                            <button class="c-button__min c-icon__add" id="js-item-push"
                                                    data-table="Clients">新規登録
                                            </button>
                                        </div>
                                        <ul class="p-list p-list__border master_list" id="js-master-edit">
                                            @foreach($clients as $key => $value)
                                                <li data-item="{{ $value->name }}" data-id="{{ $value->id }}"
                                                    data-table="Clients">
                                                    <span class="c-icon c-icon__movable"></span>
                                                    <p class="c-text__note">{{ $value->name }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('warehouse.master.clientEdit')
                    @include('warehouse.master.deliveryEdit')
                    @include('warehouse.element._master_script')

                </div>
            </div>
        </section>
    </div>
@endsection
