
<section class="remodal modal_withdrawal" data-remodal-id="modal_withdrawal" data-remodal-options="hashTracking:false">
  <div class="p-modal">
    <form action="">
      <button data-remodal-action="close" class="remodal-close"></button>
      <div class="p-modal__head">
        <div class="c-icon__w56 c-icon--question__white c-icon__circle bg-main"></div>
        <p class="c-text__lv3 c-text__weight--900 c-text__main c-text--center">本当に退会しますか？</p>
      </div>
      <div class="p-modal__body">
        <p class="c-text__lv4 c-text--center">退会してしまうと、あなたの入力したさまざまな情報はすべて削除され、復元できなくなってしまいます。<br />
        本当に退会しますか？</p>
      </div>
      <div class="p-modal__foot">
        <div class="c-buttonArea__center">
          <a href="{{route('withdrawal')}}" class="c-button__gray c-button__sm">退会する</a>
          <div class="c-button__sm" data-remodal-action="close">キャンセル</button>
        </div>
      </div>
    </form>
  </div>
</section>
