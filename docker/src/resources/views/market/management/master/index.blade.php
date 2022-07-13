@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__list"></span>
                    マスタ管理
                </h2>
            </div>
            <div class="p-index__body">
                <div class="l">
                    <div class="l-fix l-fix__450">
                        <div class="c-box">
                            <div class="c-box__head">
                                <p class="c-text__lv4 c-text__main c-text__weight--900 ">マスタ一覧</p>
                            </div>
                            <div class="c-box__body">
                                <div class="l">
                                    <div class="l-fix l-fix__150">
                                        <ul class="p-list">
                                            <li class="tab switch" data-table="MCategories" id="MCategories">
                                                <p class="c-text__note">カテゴリマスタ</p>
                                            </li>
                                            <li class="tab" data-table="MFishCategories" id="MFishCategories">
                                                <p class="c-text__note">魚種マスタ</p>
                                            </li>
                                            <li class="tab" data-table="MProcesses" id="MProcesses">
                                                <p class="c-text__note">加工・締めマスタ</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-auto">
                                        <div class="c-buttonArea__end" style="margin-bottom:15px">
                                            <button class="c-button__min c-icon__add" id="js-item-push"
                                                    data-table="MCategories">新規登録
                                            </button>
                                        </div>
                                        <ul class="p-list p-list__border master_list" id="js-master-edit">
                                            @foreach($m_categories as $key => $value)
                                                <li data-item="{{ $value->name }}" data-id="{{ $value->id }}"
                                                    data-table="MCategories">
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
                    @include('market.management.master.masterEdit')
                    @include('market.element._master_script')
                </div>
            </div>
        </section>
    </div>
@endsection
