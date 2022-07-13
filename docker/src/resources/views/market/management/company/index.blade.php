@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index__600">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__company"></span>
                    事業者情報設定
                </h2>
            </div>
            <div class="p-index__body">
                <div class="shadow c-box">
                    <div class="c-box__body">
                        <ul class="p-list__row">
                            <li>
                                <div class="head">
                                    <p class="c-text__label">事業者名</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv4">{{ $industry_group->name }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">住所</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $industry_group->address_with_zip_code }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">集荷場所</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $industry_group->pickup_address_with_zip_code }}</p>
                                </div>
                            </li>
                            <li class="f-a_start">
                                <div class="head">
                                    <p class="c-text__label">集荷場所画像</p>
                                </div>
                                <div class="c-image"
                                     style="background-image:url({{ $industry_group->image }});max-width:350px"></div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">担当者名</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $industry_group->responsible_name }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">E-Mail</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $industry_group->email }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">電話番号</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $industry_group->tel }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__label">FAX番号</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ $industry_group->fax }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-index__foot">
                <div class="c-buttonArea__end">
                    <a href="{{ route('admin.company.edit') }}" class="c-button__wide c-button__round">編集する</a>
                </div>
            </div>

        </section>
    </div>
@endsection
