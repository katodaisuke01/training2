@extends('layouts.company.default')

@section('page_class', 'l-page')
@section('title', 'お知らせ')

@section('content')
  @component('component.company.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--bell"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box bg-fff">
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <th class="sortable"><p class="c-text__label">お知らせ日時</p></th>
              <th class="sortable"><p class="c-text__label">未読</p></th>
              <th class="sortable"><p class="c-text__label">タイトル</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function messageList(){
                  return [
                    ['time' => '2022/05/27 17:04', 'message' => 'お知らせ1のタイトルです'],
                    ['time' => '2022/05/24 17:04', 'message' => 'お知らせ2のタイトルです'],
                    ['time' => '2022/05/21 17:04', 'message' => 'お知らせ3のタイトルです'],
                    ['time' => '2022/05/19 17:04', 'message' => 'お知らせ4のタイトルです'],
                    ['time' => '2022/05/17 17:04', 'message' => 'お知らせ5のタイトルです'],
                    ['time' => '2022/05/16 17:04', 'message' => 'お知らせ6のタイトルです'],
                    ['time' => '2022/05/15 17:04', 'message' => 'お知らせ7のタイトルです'],
                    ['time' => '2022/05/11 17:04', 'message' => 'お知らせ8のタイトルです'],
                    ['time' => '2022/05/07 17:04', 'message' => 'お知らせ9のタイトルです'],
                  ];
                }
              ?>
              @php($messageList = messageList())
              @foreach($messageList as $message)
                <tr data-href="{{ route('companyInformationDetail') }}">
                  <td><p class="c-text__min">{{ $message['time'] }}</p></td>
                  <td><p class="c-text__lv6 c-text__main">未読</p></td>
                  <td><p class="c-text__lv5">{{ $message['message'] }}</p></td>
                  <td><div class="c-icon__w16 c-icon--arrow"></div></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
