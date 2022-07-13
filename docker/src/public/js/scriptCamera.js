
$(document).on('click', '#picture', function() {
  var quick = 'on';
  cameraStop();
});

// $(function() {
//   if($('.canvas_image').data('file') == 'off') {
//     var quick = 'off';
//     cameraLoad(quick);
//   }
// })

function cameraLoad(quick){
  const video  = document.querySelector("#camera");
  const canvas = document.querySelector("#picture");
  const se     = document.querySelector('#se');
  const smallCanvas = document.querySelector('#small_picture');

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

    /**
     * シャッターボタン
     */
    document.querySelector("#shutter").addEventListener("click", () => {
      const ctx = canvas.getContext("2d");
      const s_ctx = smallCanvas.getContext("2d");

      // 演出的な目的で一度映像を止めてSEを再生する
      video.pause();  // 映像を停止
      se.play();      // シャッター音

      // canvasに画像を貼り付ける
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      s_ctx.drawImage(video, 0, 0, smallCanvas.width, smallCanvas.height);

      // カメラストップ
      stream.getVideoTracks().forEach((track) => {
        track.stop();
      });
      stream.getAudioTracks().forEach((track) => {
          track.stop();
      });
    });

    if(quick == 'off') {
      setTimeout( () => {
          const ctx = canvas.getContext("2d");
          const s_ctx = smallCanvas.getContext("2d");
          
          // 演出的な目的で一度映像を止めてSEを再生する
          video.pause();  // 映像を停止
          se.play();      // シャッター音
    
          // canvasに画像を貼り付ける
          ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
          s_ctx.drawImage(video, 0, 0, smallCanvas.width, smallCanvas.height);
          $('#picture').attr('data-file', 'on');
          $('#small_picture').attr('data-file', 'on');

          stream.getVideoTracks().forEach((track) => {
            track.stop();
          });
          stream.getAudioTracks().forEach((track) => {
              track.stop();
          });
          getImageData();
          $('.modal_camera').fadeOut();
      }, 2000);
    } else {
      setTimeout( () => {
        const ctx = canvas.getContext("2d");
        const s_ctx = smallCanvas.getContext("2d");
        
        // 演出的な目的で一度映像を止めてSEを再生する
        video.pause();  // 映像を停止
        se.play();      // シャッター音
  
        // canvasに画像を貼り付ける
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        s_ctx.drawImage(video, 0, 0, smallCanvas.width, smallCanvas.height);
        $('#picture').attr('data-file', 'on');
        $('#small_picture').attr('data-file', 'on');

        stream.getVideoTracks().forEach((track) => {
          track.stop();
        });
        stream.getAudioTracks().forEach((track) => {
            track.stop();
        });
        getImageData();
        $('.modal_camera').fadeOut();
    }, 2000);
    }

    function getImageData() {
      // サーバーに送る際のデータ整形
      var base64 = canvas.toDataURL('image/png');
      var imageData = base64.replace(/^.*,/, '');
      var target = $('input[name="new_packing_target"]').val();
      if(target == null) {
        var target = $('input[name="worked_order_target"]').val();
      }

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST',
        url: "workflow/imageStore",
        dataType: 'json',
        data: {
          'image_path': imageData,
          'order_id': target,
        }
      })
      .done(function() {
        console.log('ok');
      })
    };


  })
  .catch( (err) => {
    console.log(err.name + ": " + err.message);
  });
};

function cameraStart() {
  const video  = document.querySelector("#camera")
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
  })
};

function cameraStop() {
  const video  = document.querySelector("#camera");
  navigator.mediaDevices.getUserMedia({
    video: {facingMode: "environment"},
    audio: false
  }).then( (stream) => {
    const canvas = document.querySelector("#picture");
    const se     = document.querySelector('#se');
    const smallCanvas = document.querySelector('#small_picture');
    const ctx = canvas.getContext("2d");
    const s_ctx = smallCanvas.getContext("2d");
    
    // 演出的な目的で一度映像を止めてSEを再生する
    video.pause();  // 映像を停止
    se.play();      // シャッター音

    // canvasに画像を貼り付ける
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    s_ctx.drawImage(video, 0, 0, smallCanvas.width, smallCanvas.height);
    $('#picture').attr('data-file', 'on');
    $('#small_picture').attr('data-file', 'on');

    stream.getVideoTracks().forEach((track) => {
      track.stop();
    });
    stream.getAudioTracks().forEach((track) => {
        track.stop();
    });

    // サーバーに送る
    getImageData()

    $('.modal_camera').fadeOut();

    cameraStart();
  })
};


function getImageData() {
  // サーバーに送る際のデータ整形
  const canvas = document.querySelector("#picture");
  var base64 = canvas.toDataURL('image/png');
  var imageData = base64.replace(/^.*,/, '');
  var target = $('input[name="new_packing_target"]').val();
  if(target == null) {
    var target = $('input[name="worked_order_target"]').val();
  }

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    type: 'POST',
    url: "workflow/imageStore",
    dataType: 'json',
    data: {
      'image_path': imageData,
      'order_id': target,
    }
  })
  .done(function() {
    console.log('ok');
  })
};
