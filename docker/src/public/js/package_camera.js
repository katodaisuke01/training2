$('#start_camera').on('click', function() {
  const video  = document.querySelector("#camera");
  const canvas = document.querySelector("#package_picture");
  const se     = document.querySelector('#se');

  /**
   * カメラを<video>と同期
   */
  navigator.mediaDevices.getUserMedia({
    video: {facingMode: "environment"},
    audio: false
  }).then( (stream) => {
    video.srcObject = stream;
    video.onloadedmetadata = (e) => {
      video.play();
    };

    document.querySelector("#shutter").addEventListener("click", () => {
      const ctx = canvas.getContext("2d");

      // 演出的な目的で一度映像を止めてSEを再生する
      video.pause();  // 映像を停止
      se.play();      // シャッター音

      // canvasに画像を貼り付ける
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      $('#package_picture').css({'display':'block'});
      $('#package_picture').attr('data-file', 'on');
      $('#dummy_place').css('display','none');

      // カメラストップ
      stream.getVideoTracks().forEach((track) => {
        track.stop();
      });
      stream.getAudioTracks().forEach((track) => {
          track.stop();
      });
      postImageDataAction();
      // $('.modal_camera').fadeOut();
    });
  })
  .catch( (err) => {
    console.log(err.name + ": " + err.message);
  });
});

function postImageDataAction() {
  // サーバーに送る際のデータ整形
  const canvas = document.querySelector("#package_picture");
  var base64 = canvas.toDataURL('image/png');
  var imageData = base64.replace(/^.*,/, '');
  var target = $('#input_package').val();

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    type: 'POST',
    url: "packing/packageImageStore",
    dataType: 'json',
    data: {
      'image_path': imageData,
      'package_id': target,
    }
  })
  .done(function() {
    console.log('ok');
  })
};