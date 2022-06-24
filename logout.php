<?php
require_once('funcs.php');
no_cache();
session_start();

// SESSION を初期化（空っぽにする）
$_SESSION = array();

// Cookie に保存してある SessionIDの 保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
    setcookie(session_name(), '', time()-42000, '/');
}

// サーバ側での、セッションIDの破棄
session_destroy();

//処理後、login.phpへリダイレクト
header('Location: index.php'); 

?>
