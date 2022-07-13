@extends('layouts.layout_admin')
@section('content')
   @php
   use \App\Models\StaffWork;
   use \App\Models\Wusers;
   @endphp

<div class="l-container">
   <div class="l">
      <div class="l-auto">
         <section class="p-index" style="width:100%">
            <div class="p-index__head">

               <span class="c-icon c-icon__item"></span>
               <h2 class="c-text__lv3 c-text__weight--900">ダッシュボード</h2>
               <div class="c-buttonArea__end">
                  <!-- <a href="{{ route('warehouse.home') }}" class="c-button__line c-button__min">納品書の発行・印刷</a> -->
                  <!-- <a data-remodal-target="modal_box" class="c-button c-button__min">梱包の箱を設定する</a> -->
               </div>

            </div>
            <div class="p-index__body">

               <div class="l">
                  <div class="l-auto">
                     <div class="c-box shadow">
                        <div class="p-index__body">
                        @if(!$deliverd_orders->first()->count == 0)
                           @include('warehouse.element._barChartStaffWork')
                        @else
                           @include('market.element._noContent')
                        @endif
                     </div>
                  </div>
                  </div>
               </div>
               <div class="l">
                  <div class="l-half">

                     <div class="c-box shadow">
                        <section class="p-index">
                           <div class="p-index__head">
                              <h4 class="c-text c-text__lv4 c-text__weight--700">実績推移</h4>
                              <p class="c-text c-text__lv6 in">入荷数</p>
                              <p class="c-text c-text__lv6 out">出荷数</p>
                              <div class="c-right">
                                 <form action="{{ route('warehouse.home') }}" method="GET" id="search_work_date"> 
                                    <div class="c-input__100 c-input--select">
                                       <select id="js-select-term" name="select_term">
                                          <option value="monthly" @if($select_term == 'monthly') selected @endif>月別</option>
                                          <option value="weekly" @if($select_term == 'weekly') selected @endif>週別</option>
                                          <option value="daily" @if($select_term == 'daily') selected @endif>日別</option>
                                       </select>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </section>
                        <section class="p-index">
                           <div class="p-index__head f-a_end">
                              <h4 class="c-text c-text__lv4 c-text__weight--700">生産性実績</h4>
                           </div>
                           <div class="p-index__body">
                              <div class="p-tab">
                                 <input id="TAB-home01" type="radio" name="TAB" checked="checked" />
                                 <label class="p-tab__label" for="TAB-home01">荷受け業務</label>
                                 <div class="p-tab__content">
                                    <div class="p-scroll__yaxis400">
                                       <div class="p-scroll__inner">
                                          @include('data.laborData')
                                          <table class="p-table">
                                             <thead>
                                                <th><p class="label">スタッフ名</p></th>
                                                <th><p class="label">総処理件数</p></th>
                                                <th><p class="label">処理件数/日</p></th>
                                             </thead>
                                             <tbody>
                                                @foreach($workInfo as $info)
                                                {{-- 荷受け --}}
                                                @if($info['task_id'] == StaffWork::TASK_RECEIPT)
                                                <tr>
                                                   <td>
                                                      <div class="f-a_center">
                                                         <div class="c-image__circle thumbnail" style="background-image:url({{ data_get($info, 'wuser_image') }})"></div>
                                                         <p class="c-text__lv6">{{ $info['last_name_kana'] }}{{ $info['first_name_kana'] }}</p>
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $info['count'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = $info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_RECEIPT) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_RECEIPT) );
                                                            }elseif($select_term == 'weekly'){
                                                              $calc_ave = $info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_RECEIPT) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_RECEIPT) );
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = $info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_RECEIPT) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_RECEIPT) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave > 0 && is_numeric($calc_ave))
                                                             <span class="c-increase">{{ $calc_ave }}</span>
                                                         @elseif($calc_ave < 0 && is_numeric($calc_ave))
                                                            {{-- cssでマイナスの数には自動で「-」が付与されるので2文字目から表示 --}}
                                                            <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @elseif(is_string($calc_ave))
                                                            <span class="c-decrease">{{ $calc_ave }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         @if($select_term == 'monthly')
                                                           {{ $info['count']/$weekdays }}
                                                         @elseif($select_term == 'weekly')
                                                           {{ $info['count']/$day_of_week }}
                                                         @elseif($select_term == 'daily')
                                                           {{ $info['count'] }}
                                                         @endif
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = ($info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_RECEIPT) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_RECEIPT) ) )/$weekdays;
                                                            }elseif($select_term == 'weekly'){
                                                               $calc_ave = ($info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_RECEIPT) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_RECEIPT) ) )/$day_of_week;
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = ($info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_RECEIPT) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_RECEIPT) ) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave >= 0)
                                                         <span class="c-increase">{{ $calc_ave }}</span>
                                                         @else
                                                         <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>

                                 <input id="TAB-home02" type="radio" name="TAB" />
                                 <label class="p-tab__label" for="TAB-home02">荷捌き業務</label>
                                 <div class="p-tab__content">
                                    <div class="p-scroll__yaxis400">
                                       <div class="p-scroll__inner">
                                          <table class="p-table">
                                             <thead>
                                                <th><p class="label">スタッフ名</p></th>
                                                <th><p class="label">総処理件数</p></th>
                                                <th><p class="label">処理件数/日</p></th>
                                             </thead>
                                             <tbody>
                                                @foreach($workInfo as $info)
                                                {{-- 荷捌き --}}
                                                @if($info['task_id'] == StaffWork::TASK_HANDLING)
                                                <tr>
                                                   <td>
                                                      <div class="f-a_center">
                                                         <div class="c-image__circle thumbnail" style="background-image:url({{ $info->wuser_image }})"></div>
                                                         <p class="c-text__lv6">{{ $info['last_name_kana'] }}{{ $info['first_name_kana'] }}</p>
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $info['count'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = $info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_HANDLING) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_HANDLING) );
                                                            }elseif($select_term == 'weekly'){
                                                              $calc_ave = $info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_HANDLING) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_HANDLING) );
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = $info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_HANDLING) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_HANDLING) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave > 0 && is_numeric($calc_ave))
                                                             <span class="c-increase">{{ $calc_ave }}</span>
                                                         @elseif($calc_ave < 0 && is_numeric($calc_ave))
                                                            {{-- cssでマイナスの数には自動で「-」が付与されるので2文字目から表示 --}}
                                                            <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @elseif(is_string($calc_ave))
                                                            <span class="c-decrease">{{ $calc_ave }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         @if($select_term == 'monthly')
                                                           {{ $info['count']/$weekdays }}
                                                         @elseif($select_term == 'weekly')
                                                           {{ $info['count']/$day_of_week }}
                                                         @elseif($select_term == 'daily')
                                                           {{ $info['count'] }}
                                                         @endif
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = ($info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_HANDLING) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_HANDLING) ) )/$weekdays;
                                                            }elseif($select_term == 'weekly'){
                                                               $calc_ave = ($info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_HANDLING) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_HANDLING) ) )/$day_of_week;
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = ($info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_HANDLING) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_HANDLING) ) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave >= 0)
                                                         <span class="c-increase">{{ $calc_ave }}</span>
                                                         @else
                                                         <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>

                                <input id="TAB-home03" type="radio" name="TAB" />
                                 <label class="p-tab__label" for="TAB-home03">仕分け業務</label>
                                 <div class="p-tab__content">
                                    <div class="p-scroll__yaxis400">
                                       <div class="p-scroll__inner">
                                          <table class="p-table">
                                             <thead>
                                                <th><p class="label">スタッフ名</p></th>
                                                <th><p class="label">総処理件数</p></th>
                                                <th><p class="label">処理件数/日</p></th>
                                             </thead>
                                             <tbody>
                                                @foreach($workInfo as $info)
                                                {{-- 仕分け --}}
                                                @if($info['task_id'] == StaffWork::TASK_SORTING)
                                                <tr>
                                                   <td>
                                                      <div class="f-a_center">
                                                         <div class="c-image__circle thumbnail" style="background-image:url({{ $info->wuser_image }})"></div>
                                                         <p class="c-text__lv6">{{ $info['last_name_kana'] }}{{ $info['first_name_kana'] }}</p>
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $info['count'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = $info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_SORTING) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_SORTING) );
                                                            }elseif($select_term == 'weekly'){
                                                              $calc_ave = $info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_SORTING) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_SORTING) );
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = $info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_SORTING) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_SORTING) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave > 0 && is_numeric($calc_ave))
                                                             <span class="c-increase">{{ $calc_ave }}</span>
                                                         @elseif($calc_ave < 0 && is_numeric($calc_ave))
                                                            {{-- cssでマイナスの数には自動で「-」が付与されるので2文字目から表示 --}}
                                                            <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @elseif(is_string($calc_ave))
                                                            <span class="c-decrease">{{ $calc_ave }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         @if($select_term == 'monthly')
                                                           {{ $info['count']/$weekdays }}
                                                         @elseif($select_term == 'weekly')
                                                           {{ $info['count']/$day_of_week }}
                                                         @elseif($select_term == 'daily')
                                                           {{ $info['count'] }}
                                                         @endif
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = ($info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_SORTING) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_SORTING) ) )/$weekdays;
                                                            }elseif($select_term == 'weekly'){
                                                               $calc_ave = ($info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_SORTING) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_SORTING) ) )/$day_of_week;
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = ($info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_SORTING) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_SORTING) ) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave >= 0)
                                                         <span class="c-increase">{{ $calc_ave }}</span>
                                                         @else
                                                         <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>

                                 <input id="TAB-home04" type="radio" name="TAB" />
                                 <label class="p-tab__label" for="TAB-home04">摘取り業務</label>
                                 <div class="p-tab__content">
                                    <div class="p-scroll__yaxis400">
                                       <div class="p-scroll__inner">
                                          <table class="p-table">
                                             <thead>
                                                <th><p class="label">スタッフ名</p></th>
                                                <th><p class="label">総処理件数</p></th>
                                                <th><p class="label">処理件数/日</p></th>
                                             </thead>
                                             <tbody>
                                                @foreach($workInfo as $info)
                                                {{-- 摘取り --}}
                                                @if($info['task_id'] == StaffWork::TASK_PICKING)
                                                <tr>
                                                   <td>
                                                      <div class="f-a_center">
                                                         <div class="c-image__circle thumbnail" style="background-image:url({{ $info->wuser_image }})"></div>
                                                         <p class="c-text__lv6">{{ $info['last_name_kana'] }}{{ $info['first_name_kana'] }}</p>
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $info['count'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = $info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_PICKING) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_PICKING) );
                                                            }elseif($select_term == 'weekly'){
                                                              $calc_ave = $info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_PICKING) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_PICKING) );
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = $info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_PICKING) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_PICKING) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave > 0 && is_numeric($calc_ave))
                                                             <span class="c-increase">{{ $calc_ave }}</span>
                                                         @elseif($calc_ave < 0 && is_numeric($calc_ave))
                                                            {{-- cssでマイナスの数には自動で「-」が付与されるので2文字目から表示 --}}
                                                            <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @elseif(is_string($calc_ave))
                                                            <span class="c-decrease">{{ $calc_ave }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         @if($select_term == 'monthly')
                                                           {{ $info['count']/$weekdays }}
                                                         @elseif($select_term == 'weekly')
                                                           {{ $info['count']/$day_of_week }}
                                                         @elseif($select_term == 'daily')
                                                           {{ $info['count'] }}
                                                         @endif
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = ($info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_PICKING) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_PICKING) ) )/$weekdays;
                                                            }elseif($select_term == 'weekly'){
                                                               $calc_ave = ($info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_PICKING) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_PICKING) ) )/$day_of_week;
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = ($info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_PICKING) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_PICKING) ) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave >= 0)
                                                         <span class="c-increase">{{ $calc_ave }}</span>
                                                         @else
                                                         <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>

                                 <input id="TAB-home05" type="radio" name="TAB" />
                                 <label class="p-tab__label" for="TAB-home05">出荷チェック業務</label>
                                 <div class="p-tab__content">
                                    <div class="p-scroll__yaxis400">
                                       <div class="p-scroll__inner">
                                          <table class="p-table">
                                             <thead>
                                                <th><p class="label">スタッフ名</p></th>
                                                <th><p class="label">総処理件数</p></th>
                                                <th><p class="label">処理件数/日</p></th>
                                             </thead>
                                             <tbody>
                                                @foreach($workInfo as $info)
                                                {{-- 摘取り --}}
                                                @if($info['task_id'] == StaffWork::TASK_SHIPPING_CONFIRMATION)
                                                <tr>
                                                   <td>
                                                      <div class="f-a_center">
                                                         <div class="c-image__circle thumbnail" style="background-image:url({{ $info->wuser_image }})"></div>
                                                         <p class="c-text__lv6">{{ $info['last_name_kana'] }}{{ $info['first_name_kana'] }}</p>
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $info['count'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = $info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) );
                                                            }elseif($select_term == 'weekly'){
                                                              $calc_ave = $info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) );
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = $info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave > 0 && is_numeric($calc_ave))
                                                             <span class="c-increase">{{ $calc_ave }}</span>
                                                         @elseif($calc_ave < 0 && is_numeric($calc_ave))
                                                            {{-- cssでマイナスの数には自動で「-」が付与されるので2文字目から表示 --}}
                                                            <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @elseif(is_string($calc_ave))
                                                            <span class="c-decrease">{{ $calc_ave }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         @if($select_term == 'monthly')
                                                           {{ $info['count']/$weekdays }}
                                                         @elseif($select_term == 'weekly')
                                                           {{ $info['count']/$day_of_week }}
                                                         @elseif($select_term == 'daily')
                                                           {{ $info['count'] }}
                                                         @endif
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         @php
                                                            if($select_term == 'monthly'){
                                                              $calc_ave = ($info['count'] - ( $info->getMonthlyTaskCompletedAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) / $info->getMonthlyStaffAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) ) )/$weekdays;
                                                            }elseif($select_term == 'weekly'){
                                                               $calc_ave = ($info['count'] - ( $info->getWeeklyTaskCompletedAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) / $info->getWeeklyStaffAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) ) )/$day_of_week;
                                                            }elseif($select_term == 'daily'){
                                                               $calc_ave = ($info['count'] - ( $info->getDailyTaskCompletedAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) / $info->getDailyStaffAmountAttribute(StaffWork::TASK_SHIPPING_CONFIRMATION) ) );
                                                            }
                                                         @endphp
                                                         @if($calc_ave >= 0)
                                                         <span class="c-increase">{{ $calc_ave }}</span>
                                                         @else
                                                         <span class="c-decrease">{{ substr($calc_ave,1) }}</span>
                                                         @endif
                                                      </p>
                                                   </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </section>
                        <section class="p-index">
                           <div class="p-index__head">
                              <h4 class="c-text c-text__lv4 c-text__weight--700">業務処理実績</h4>
                              <p class="c-text c-text__lv6">過去1ヶ月</p>
                           </div>
                           <div class="p-index__body">
                              @include('market.element._noContent')
                           </div>
                        </section>
                     </div>
                  </div>
                  <div class="l-half">
                     <div class="c-box shadow">
                        <section class="p-index">
                           <div class="p-index__head">
                              <h4 class="c-text c-text__lv4 c-text__weight--700">予測推移</h4>
                              <p class="c-text c-text__lv6 in">入荷数</p>
                              <p class="c-text c-text__lv6 out">出荷数</p>
                              <div class="c-right">
                                 <form>
                                    <div class="c-input__100 c-input--select">
                                       <select>
                                          <option>月別</option>
                                          <option>週別</option>
                                          <option>日別</option>
                                       </select>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           {{-- 
                           <div class="p-index__body">
                              @include('market.element._noContent')
                           </div>
                            --}}
                        </section>
                        <section class="p-index">
                           <div class="p-index__head f-a_end">
                              <h4 class="c-text c-text__lv4 c-text__weight--700">最適リソース数予測</h4>
                           </div>
                           <div class="p-index__body">
                              <div class="p-tab">

                                 <input id="TAB-home04" type="radio" name="TAB_02" checked="checked" />
                                 <label class="p-tab__label" for="TAB-home04">入荷・ピッキング処理業務</label>
                                 <div class="p-tab__content">
                                    <div class="p-scroll__yaxis400">
                                       <div class="p-scroll__inner">
                                          <table class="p-table">
                                             <thead>
                                                <th><p class="label">スタッフ名</p></th>
                                                <th><p class="label">総実働時間</p></th>
                                                <th><p class="label">総処理件数</p></th>
                                                <th><p class="label">処理件数/日</p></th>
                                                <th><p class="label">処理件数/時間</p></th>
                                             </thead>
                                             <tbody>
                                                @php($laborList = laborList())
                                                @foreach($laborList as $value)
                                                <tr>
                                                   <td>
                                                      <div class="f-a_center">
                                                         <div class="c-image__circle thumbnail" style="background-image:url({{ $value['image'] }})"></div>
                                                         <p class="c-text__lv6">{{ $value['name_sei'] }}{{ $value['name_mei'] }}</p>
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $value['doneTime'] }}
                                                         <span class="c-text__unit">時間</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         <span class="c-increase">{{ $value['average'] }}</span>
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $value['doneAll'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         <span class="c-decrease">{{ $value['average'] }}</span>
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $value['doneByDay'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         <span class="c-increase">{{ $value['average'] }}</span>
                                                      </p>
                                                   </td>
                                                   <td>
                                                      <p class="c-text__lv5">
                                                         {{ $value['doneByTime'] }}
                                                         <span class="c-text__unit">件</span>
                                                      </p>
                                                      <p class="c-text__lv5">
                                                         <span class="c-text__unit">平均比</span>
                                                         <span class="c-decrease">{{ $value['average'] }}</span>
                                                      </p>
                                                   </td>
                                                </tr>
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </section>
                        <section class="p-index">
                           <div class="p-index__head">
                              <h4 class="c-text c-text__lv4 c-text__weight--700">カテゴリー別 処理数予測</h4>
                              <p class="c-text c-text__lv6">過去1ヶ月</p>
                           </div>
                           <div class="p-index__body">
                              @include('market.element._noContent')
                           </div>
                        </section>
                     </div>

                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>

   
</div>
@include('warehouse.element._searchTerm') 
@endsection