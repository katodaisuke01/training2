<script>
  var i = 1 ;
function addForm() {
  var input_data = document.createElement('li');
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.id = 'form_' + i;
  input_data.placeholder = '追加する内容を入力してください';
  var parent = document.getElementById('p-addition');
  parent.appendChild(input_data);

  var button_data = document.createElement('button');
  button_data.id = i;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = '登録解除';
  var input_area = document.getElementById(input_data.id);
  parent.appendChild(button_data);
  i++ ;
}

function deleteBtn(target) {
  var target_id = target.id;
  var parent = document.getElementById('p-addition');
  var ipt_id = document.getElementById('form_' + target_id);
  var tgt_id = document.getElementById(target_id);
  parent.removeChild(ipt_id);
  parent.removeChild(tgt_id);	
}
</script>