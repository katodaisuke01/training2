@extends('layouts.layout_marketManagement')

@section('content')
    <div class="qr_lavel_for_print" style="display: block; width:100%;">
        @foreach($codes as $key => $code)
            <div style="page-break-before: always; ">
                <div style="padding:8px; margin-top:8px; width:160mm; height:80mm; margin: 0 auto;">
                    <h2 style="font-size:28px;margin:0 0 8px;color:#0098be;text-align:center; font-weight:bold;">{{$code}}</h2>
                    <p class="img_center" style="text-align: center;">
                        <img
                            src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('itemList', ['package' => $code]) }}&size=200x200"
                            alt="QRコード"/>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="c-buttonArea__end button_for_print">
        <a class="c-button c-button__min" onclick="window.print();" style="margin-right: 100px;">印刷する</a>
    </div>
@endsection
