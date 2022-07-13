<form name="">
  <div class="c-input--center f-j_end">
    <div class="c-input c-input--date">
      <input placeholder="2020/01/01" value="" class="datepicker">
    </div>
    <div class="c-input">〜</div>
    <div class="c-input c-input--date">
      <input placeholder="2020/01/01" value="{{ date('Y/m/d') }}" class="datepicker">
    </div>
  </div>
</form>
<section class="p-tab__css">
	<input id="p-tab__css--01" type="radio" name="p-tab__css" checked="checked">
	<label class="c-text__lv4 c-text__weight--900" for="p-tab__css--01">ページ閲覧数推移</label>
	<div class="c-box content">
    <div class="p-chart">
      <div class="p-chart__head f-a_center">
        <p class="c-text__lv4 c-text__main">
          <span class="c-text__lv6 c-text__main">ページ閲覧数合計</span>2,345<span class="c-text__lv6 c-text__main">pv</span>
        </p>
        <div class="c-right">
          <p class="c-text__note">期間：2022/07/01〜2022/07/14</p>
        </div>
      </div>
      <div class="p-chart__body">
        @include('component.chart._c-chart__company--1')
      </div>
    </div>
	</div>
	<input id="p-tab__css--02" type="radio" name="p-tab__css">
	<label class="c-text__lv4 c-text__weight--900" for="p-tab__css--02">ページ閲覧数</label>
	<div class="c-box content">
    <div class="p-chart">
      <div class="p-chart__head f-a_center">
        <p class="c-text__lv4 c-text__main">
          <span class="c-text__lv6 c-text__main">ページ閲覧数合計</span>2,345<span class="c-text__lv6 c-text__main">pv</span>
        </p>
        <div class="c-right">
          <p class="c-text__note">期間：2022/07/01〜2022/07/14</p>
        </div>
      </div>
      <div class="p-chart__body">
        @include('component.chart._c-table__company--1')
      </div>
    </div>
  </div>
	<input id="p-tab__css--03" type="radio" name="p-tab__css">
	<label class="c-text__lv4 c-text__weight--900" for="p-tab__css--03">気になる！数推移</label>
	<div class="c-box content">
    <div class="p-chart">
      <div class="p-chart__head f-a_center">
        <p class="c-text__lv4 c-text__main">
          <span class="c-text__lv6 c-text__main">この一週間の送信数</span>45<span class="c-text__lv6 c-text__main">回</span>
          <span class="c-text__lv6 c-text__main">受信数</span>34<span class="c-text__lv6 c-text__main">回</span>
        </p>
        <div class="c-right">
          <p class="c-text__note">期間：2022/07/01〜2022/07/14</p>
        </div>
      </div>
      <div class="p-chart__body">
        @include('component.chart._c-chart__company--2')
      </div>
    </div>
	</div>
	<input id="p-tab__css--04" type="radio" name="p-tab__css">
	<label class="c-text__lv4 c-text__weight--900" for="p-tab__css--04">新着の受信気になる！</label>
  <div class="c-box content">
    <div class="p-chart">
      <div class="p-chart__head f-a_center">
        <p class="c-text__lv4 c-text__main">
          <span class="c-text__lv6 c-text__main">新着の受信気になる！</span>21<span class="c-text__lv6 c-text__main">回</span>
        </p>
        <div class="c-right">
          <p class="c-text__note">期間：2022/07/01〜2022/07/14</p>
        </div>
      </div>
      <div class="p-chart__body">
        @include('component.chart._c-table__company--2')
      </div>
    </div>
  </div>
</section>