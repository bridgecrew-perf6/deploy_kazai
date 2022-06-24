<?php
require_once('funcs.php');
no_cache();
session_start();

// POST値
$house_name = $_POST['house_name'];
$password = $_POST['password'];

// DB接続
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM household_house WHERE house_name = :house_name AND password = :password');
$stmt->bindValue(':house_name', $house_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// SQL実行時にエラーがある場合STOP
if ($status == false) {
    sql_error($stmt);
}

// 抽出データ数を取得
$val = $stmt->fetch();

if ($val) { // Login成功時
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['house_id'] = $val['house_id'];
    $_SESSION['house_name'] = $val['house_name'];
    header('Location: index.php'); 
} else { // Login失敗時
    header('Location: login.php?ng_password='.$house_name.'&success=&error=&email='); 
}

?>
