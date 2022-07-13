<ul class="p-list__row">
  <li>
    <div class="c-input--full c-input__column">
      <div id="p-addition" class="p-addition">
        <input type="text" id="form_0" placeholder="企業名を入力してください">
        <button id="0" onclick="deleteBtn(this)">登録解除</button>
      </div>
    </div>
  </li>
  <li class="c-border__top">
    <div class="c-buttonArea__center c-full">
      <button type="button" value="追加" onclick="addForm()" class="c-icon--plus c-icon__w40"></button>
    </div>
  </li>
</ul>
@include('component.script._script_addForm')