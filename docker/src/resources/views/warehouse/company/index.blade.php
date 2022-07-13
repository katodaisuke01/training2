@extends('layouts.layout_admin')
@section('content')
    <div class="l-container l-page">
        <section class="p-index__600">
            <div class="p-index__head">
                <span class="c-icon__w24 c-icon__company"></span>
                <h2 class="c-text__lv3 c-text__weight--900">
                    事業者情報設定
                </h2>
            </div>
            <div class="p-index__body">
                <div class="shadow c-box__600">
                    <div class="c-box__body">
                        <ul class="p-list">
                            <li>
                                <div class="head">
                                    <p class="c-text__label">事業者名</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv4">{{ $m_business->name }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">住所</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $m_business->address_with_zip_code }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">配送場所</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $m_business->delivery_address_with_zip_code }}</p>
                                </div>
                            </li>
                            <li class="f-a_start">
                                <div class="head">
                                    <p class="c-text__label">配送先画像</p>
                                </div>
                                <div class="c-image"
                                     style="background-image:url({{ $m_business->image }});max-width:350px"></div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">担当者名</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv4">星野 健一郎</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">E-Mail</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $m_business->email }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">電話番号</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $m_business->tel }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">FAX番号</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $m_business->fax }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="c-box__foot">
                        <div class="c-buttonArea__end">
                            <a href="{{ route('warehouse.company.edit') }}" class="c-button__wide">編集する</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
