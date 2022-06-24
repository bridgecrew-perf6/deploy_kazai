<?php
require_once('funcs.php');
no_cache();
session_start();

loginCheck();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="G'sアカデミー課題 PHP" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/png" href="image/table_chabudai.png" />
    <title>かざい博物館</title>
  </head>
  <body>
    <div class="title_area">
      <a href="index.php"><img class="logo" src="image/table_chabudai.png" alt="ちゃぶ台アイコン" title="アイテム一覧"/></a>
      <h2>かざい博物館</h2>
      <a href="capture.php">
        <img class="icon" src="image/plus.png" alt="アイテム追加" title="アイテムを追加する"/>
      </a>
      <a href="setting.php">
        <img class="icon" src="image/setting.png" alt="設定" title="メンバーや部屋を登録する"/>
      </a>
      <a href="help.php"><img class="icon" src="image/question.png" alt="ヘルプ" title="ヘルプ"></a>
    </div>

    <div class="container">
      <div class="image_capture">
          <video id="video" width="1024" height="768" playsinline muted autoplay style="transform: scaleX(-1)"></video>
          <button id="capture">撮影（再撮影）</button>
      </div>

      <form method="post" class="image_post" action="entry.php" id="captured_photo">
        <canvas id="canvas"></canvas>
        <input type="submit" value="この写真を使う">
      </form>

      <form method="post" action="entry.php" enctype="multipart/form-data" id="photo_select">
        <input type="file" name="file" id="upload" accept="image/*" required>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/capture.js"></script>
</body>

</html>
