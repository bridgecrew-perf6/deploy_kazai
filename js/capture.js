const image_max = 1280;
let width;
let height;
let appended = false;

// video capture
let snap;
$("#captured_photo").hide(); // キャプチャ画像エリアは隠しておく

const video = document.getElementById("video");

navigator.mediaDevices
  .getUserMedia({
    video: true,
    audio: false,
  })
  .then((stream) => {
    video.srcObject = stream;
    video.play();
  })
  .catch((e) => {
    console.log(e);
  }); // 動画の入力と表示

$("#capture").on("click", function () {
  // snap = snapshot(video.width, video.height);
  snap = snapshot();
  $("#captured_photo").show(); // キャプチャ画像を表示

  if (appended) { $('#canvas_photo').remove(); }
  let html = `
    <input type="hidden" name="photo" value="${snap}" id="canvas_photo"/>
  `;
  let image_post = $(".image_post");
  image_post.append(html); // form に 画像送信用の hidden を追加
  appended = true;
});

// function snapshot(width, height) {
function snapshot() {
  // 最新画像をキャプチャ
  let videoElement = document.querySelector("video");
  if( isSmartPhone() ){ // スマホでカメラ動画が縦長の場合
    width = videoElement.height;
    height = videoElement.width;
  } else {
    width = videoElement.width;
    height = videoElement.height;
  }
  let canvasElement = document.querySelector("canvas");
  canvasElement.width = width;
  canvasElement.height = height;
  let context = canvasElement.getContext("2d");

  context.drawImage( videoElement, 0, 0, width, height );
  return canvasElement.toDataURL();
}

// UserAgent からのスマホ判定
function isSmartPhone() {
  if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
    return true;
  } else {
    return false;
  }
}

// <input>でファイルが選択されたときの処理
const fileInput = document.getElementById("upload");
const handleFileSelect = () => {
  const files = fileInput.files;
  previewFile(files[0]);
};
fileInput.addEventListener("change", handleFileSelect);

function previewFile(file) {
  const reader = new FileReader(); // FileReader オブジェクトを作成
  reader.readAsDataURL(file); // ファイルを読み込む
  reader.onload = function (e) { // ファイルが読み込まれたときに実行する
    let image = new Image();
    image.onload = function () {
      let width = image.width;
      let height = image.height;
      if (width > height && width > image_max) {
        height = Math.round( image_max * height / width );
        width = image_max;
      } else if (height > image_max) {
        width = Math.round( image_max * width / height );
        height = image_max;
      }

      let canvasElement = document.querySelector("canvas");
      canvasElement.width = width;
      canvasElement.height = height;
      let context = canvasElement.getContext("2d");
      context.drawImage( image, 0, 0, width, height );
      snap = canvasElement.toDataURL();

      $("#captured_photo").show(); // キャプチャ画像を表示
  
      if (appended) { $('#canvas_photo').remove(); }
      let html = `
          <input type="hidden" name="photo" value="${snap}" id="canvas_photo"/>
        `;
      let image_post = $(".image_post");
      image_post.append(html); // form に 画像送信用の hidden を追加
      appended = true;
    }
    image.src = e.target.result;
  };
}
