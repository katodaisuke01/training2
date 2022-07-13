@extends('layouts.layout_market')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index">
                    <div class="p-index__head">
                        <h2 class="c-text__lv3 c-text__weight--900">作業カレンダー</h2>
                    </div>
                    <div class="p-index__body l ">
                        <form method="get" class="p-register__form" id="getTaskForm">
                            <div class="l-fix l-fix__500">
                                <div class="c-box shadow">
                                    <div class="c-box__head">
                                        <p class="c-text__main c-text__lv4 c-text__weight--700">日程の選択</p>
                                    </div>
                                    <div class="c-box__body">
                                        <div class="c-full">
                                            <div class="head">
                                                <p class="label required">日付選択</p>
                                            </div>
                                            <input type="hidden" name="task_date" value="{{ $request['task_date'] }}"
                                                   id="task_date">
                                            <div id="calendar" class="p-calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="l-auto" id="client_information">
                            <div class="c-box shadow">
                                <div class="c-box__head">
                                    <h3 class="c-text__main c-text__lv4 c-text__weight--700">日別タスクリスト</h3>
                                </div>
                                <div class="c-box__body">
                                    <div class="p-task">
                                        <div class="p-task__body">
                                            <ul class="p-list__wrap">
                                                <li>
                                                    <p class="c-text__lv5">本日の水揚数</p>
                                                    <div class="f-a_end">
                                                        <p class="c-text__lv3 c-text__weight--700 c-text__main"
                                                           data-before="計">{{ $landing_count ?? 0 }}<small
                                                                class="c-text__unit">個</small></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <p class="c-text__lv5">本日の浄化数</p>
                                                    <div class="f-a_end">
                                                        <p class="c-text__lv3 c-text__weight--700 c-text__main"
                                                           data-before="計">{{ $purification__count ?? 0 }}<small
                                                                class="c-text__unit">個</small></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <p class="c-text__lv5">本日の仕分け・梱包数</p>
                                                    <div class="f-a_end">
                                                        <p class="c-text__lv3 c-text__weight--700 c-text__main"
                                                           data-before="計">{{ $task_count ?? 0 }}<small
                                                                class="c-text__unit">個</small></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-scroll p-scroll__yaxis400">
                                        <div class="p-scroll__inner">
                                            <table class="p-table">
                                                <thead>
                                                <th>
                                                    <p class="label">商品名</p>
                                                </th>
                                                <th class="w_150">
                                                    <p class="label">注文者</p>
                                                </th>
                                                <th class="w_70">
                                                    <p class="label">注文個数</p>
                                                </th>
                                                </thead>
                                                <tbody>
                                                @forelse($task_group as $tasks)

                                                    <tr>
                                                        <td>
                                                            <p class="c-text__lv6">{{ $tasks[0]->product_title }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="c-text__lv6">{{ $tasks[0]->getClientName() }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="c-text__lv4 c-text__weight--900 c-text__main">{{ $tasks->count() }}
                                                                <span class="c-text__unit">個</span></p>
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-index__foot">
                        <div class="c-buttonArea__center">
                            <a href="javascript:history.back()"
                               class="c-button__round c-button__line c-button__wide">戻る</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
