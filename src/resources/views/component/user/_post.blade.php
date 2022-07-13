<div class="p-scroll__height--400">
  <table class="p-table p-scroll__inner--600">
    <thead>
      <th class="w_80"><p>受信日時</p></th>
      <th class="w_70"><p>投稿内容</p></th>
      <th><p>お知らせタイトル</p></th>
      <th></th>
    </thead>
    <tbody>
    <?php
      function postnList(){
        return [
          ['date' => '2022/07/30 14:06','tag' => 'お知らせ','title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
          ['date' => '2022/07/29 14:06','tag' => 'ムービー','title' => '研修紹介の動画5'],
          ['date' => '2022/07/28 14:06','tag' => 'ムービー','title' => '研修紹介の動画4'],
          ['date' => '2022/07/27 14:06','tag' => 'お知らせ','title' => '【福利厚生】自社商品のファミリーセール！'],
          ['date' => '2022/07/26 14:06','tag' => 'お知らせ','title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
          ['date' => '2022/07/25 14:06','tag' => 'お知らせ','title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
          ['date' => '2022/07/24 14:06','tag' => 'ムービー','title' => '研修紹介の動画3'],
          ['date' => '2022/07/23 14:06','tag' => 'ムービー','title' => '研修紹介の動画2'],
          ['date' => '2022/07/22 14:06','tag' => 'ムービー','title' => '研修紹介の動画1'],
          ['date' => '2022/07/21 14:06','tag' => 'お知らせ','title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
          ['date' => '2022/07/20 14:06','tag' => 'お知らせ','title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
          ['date' => '2022/07/19 14:06','tag' => 'お知らせ','title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
          ['date' => '2022/07/19 14:06','tag' => 'お知らせ','title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
        ];
      }
    ?>
    @php($postnList = postnList())
    @foreach($postnList as $postn)
      <tr data-href="{{route('postDetail')}}" target="_blank">
        <td><p class="c-text__note">{{ date('Y/m/d H:i') }}</p></td>
        <td><p class="c-text__lv6">{{ $postn['tag'] }}</p></td>
        <td>
          <p class="c-text__lv5">
            <span class="c-text__lv7 c-text__alert">未読</span>
            {{ $postn['title'] }}
          </p>
        </td>
        <td><div class="c-icon__w16 c-icon--arrow"></div></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>