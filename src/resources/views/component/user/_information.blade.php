<div class="p-scroll__height--400">
  <table class="p-table">
    <thead>
      <th><p>受信日時</p></th>
      <th><p>発信元</p></th>
      <th><p>お知らせ内容</p></th>
      <th></th>
    </thead>
    <tbody>
    <?php
      function informationList(){
        return [
          ['date' => '2022/07/30 14:06','company' => 'ミキワメ転職','title' => 'ミキワメ転職からのお知らせ（サイトアップデートについて）'],
          ['date' => '2022/07/29 14:06','company' => 'ミキワメ転職','title' => 'ミキワメ転職からのお知らせ（表示アルゴリズム調整について）'],
          ['date' => '2022/07/28 14:06','company' => 'ミキワメ転職','title' => 'ミキワメ転職からのお知らせ（微修正について）'],
          ['date' => '2022/07/27 14:06','company' => '株式会社ING.Co','title' => '株式会社ING.Coからメッセージが届いています'],
          ['date' => '2022/07/26 14:06','company' => '株式会社GBA','title' => '株式会社GBAからメッセージが届いています'],
          ['date' => '2022/07/25 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/24 14:06','company' => 'ミキワメ転職','title' => 'ミキワメ転職からのお知らせ（サイトアップデートについて）'],
          ['date' => '2022/07/23 14:06','company' => 'ミキワメ転職','title' => 'ミキワメ転職からのお知らせ（表示アルゴリズム調整について）'],
          ['date' => '2022/07/22 14:06','company' => 'ミキワメ転職','title' => 'ミキワメ転職からのお知らせ（微修正について）'],
          ['date' => '2022/07/21 14:06','company' => '株式会社ING.Co','title' => '株式会社ING.Coからメッセージが届いています'],
          ['date' => '2022/07/20 14:06','company' => '株式会社GBA','title' => '株式会社GBAからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社ING.Co','title' => '株式会社ING.Coからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社GBA','title' => '株式会社GBAからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社ING.Co','title' => '株式会社ING.Coからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社GBA','title' => '株式会社GBAからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社ING.Co','title' => '株式会社ING.Coからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社GBA','title' => '株式会社GBAからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社ING.Co','title' => '株式会社ING.Coからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社GBA','title' => '株式会社GBAからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
          ['date' => '2022/07/19 14:06','company' => '株式会社クロスマーケティング','title' => '株式会社クロスマーケティングからメッセージが届いています'],
        ];
      }
    ?>
    @php($informationList = informationList())
    @foreach($informationList as $information)
      <tr data-href="{{route('informationDetail')}}" target="_blank">
        <td><p class="c-text__note">{{ $information['date'] }}</p></td>
        <td><p class="c-text__lv6">{{ $information['company'] }}</p></td>
        <td>
          <p class="c-text__lv5">
            <span class="c-text__lv7 c-text__alert">未読</span>
            {{ $information['title'] }}
          </p>
        </td>
        <td><div class="c-icon__w16 c-icon--arrow"></div></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>