<div class="t-wrapper">
  <div class="t-head">
    <p class="t-head__count">
      1〜20件目を表示 / 全65件
    </p>
  </div>
  <div class="t-body">
    <div class="t-table">
      <table>
        <thead>
          <tr>
            <th>
              <input type="checkbox" id="all">
              <label for="all"></label>
            </th>
            <th>
              氏名
            </th>
            <th>
              フリガナ
            </th>
            <th>
              会員種別
            </th>
            <th>
              ステータス
            </th>
            <th>
              性別
            </th>
            <th>
              電話番号
            </th>
            <th>
              メールアドレス
            </th>
            <th>
              住所
            </th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=0;$i<30;$i++) { ?>
          <tr>
            <td>
              <input type="checkbox" id="{{$i}}">
              <label for="{{$i}}"></label>
            </td>
            <td>
              <a href="" class="c-button__text">斉藤 啓介</a>
            </td>
            <td>
              サイトウ ケイスケ
            </td>
            <td>
              無料会員
            </td>
            <td>
              公開
            </td>
            <td>
              男性
            </td>
            <td>
              09012345678
            </td>
            <td>
              sample@example.com
            </td>
            <td>
              〒123-0001 東京都渋谷区渋谷123 渋谷マンション1201
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="t-foot">
    @include('admin.component._pagination')
  </div>
</div>