<?php
require_once('funcs.php');
no_cache();
session_start();
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
      <a href="help.php"><img class="icon" src="image/question.png" alt="ヘルプ" title="ヘルプ"></a>
    </div>

    <div class="container">
      <h3>使い方</h3>
      <ol style="list-style: lower-latin;">
        <li>家族で使う「家の呼び名」「パスワード」を決めて登録します</li>
        <li>写真撮影、もしくはファイルアップロードで家財を登録し、引き取り手を募集します</li>
        <li>引き取り手の「家族」、家財の「置き場所」や「分類」は自由に設定できます</li>
        <li>引き取り手が決まったら状態を「行き先決定済み」に変更し、引き取り手を記録します</li>
        <li>「保管期限」は、運送びやトランクルームに預かる期限などの記録に利用します</li>
        <li>サンプルデータは、家の呼び名「サンプル」、パスワード「sample」でご確認ください</li>
      </ol>

      <h3>このアプリの目的</h3>
      空き家整理のために、家族・親族の中から <br> 家財の引き取り手を探す
      <ul style="list-style: disc;">
        <li>空き家が増え続ける要因の一つとして、子供が独立して単身世帯となっていた高齢の親世代が、持ち家を残したまま持ち家を離れ便利な駅近賃貸マンションや高齢者施設に引っ越すという現象がある。そういう高齢者が増えている上に、さらに寿命も長くなり、その分、空き家状態も長く続くことになる。</li>
        <li>親世代が死亡したら、遺品を整理して家を売却することができるが、親が生きている間は、生前整理はなかなか進まない。
          <ul style="list-style: circle;" class="ul2">
            <li class="li2">思い出の品が多い</li>
            <li class="li2">親世代は捨てるのが嫌い。置いておきたい</li>
            <li class="li2">いつか整理しようと思いつつ、結局死ぬまではそのままになってしまう</li>
          </ul> 
        <li>生前整理を加速することによって、親世代が生きている間に、空き家売却を進め、空き家を減らし、土地や建物を有効活用する。</li>
          <ul style="list-style: circle;" class="ul2">
            <li class="li2">そのためには、丁寧に家財の引き取り手を見つけて、捨てるものを減らし、親にとっても納得感のある家財整理を行う必要がある</li>
          </ul>
        <li>家財の写真を撮り、家族・親族内で引き取り手を探すという行為を効率化するアプリ。アップされた写真を見て、引き取りたいものがあれば希望を出す。</li>
        <li>将来的には、引き取り手が見つからなかったものを、買取業者に繋いでいく機能があればいいのではないか？</li>
      </ul>
      　
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
