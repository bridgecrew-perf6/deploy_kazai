<?php
require_once('funcs.php');
no_cache();
session_start();

//POST値
$email = $_POST['email'];
$house_name = $_POST['house_name'];
$password = $_POST['password'];

// DB接続します
$pdo = db_conn();

// house_name の存在確認
$stmt = $pdo->prepare('SELECT * FROM household_house WHERE house_name = :house_name');
$stmt->bindValue(':house_name', $house_name, PDO::PARAM_STR);
$status = $stmt->execute();

// SQL実行時にエラーがある場合STOP
if ($status == false) {
    sql_error($stmt);
}

// 抽出データ数を取得
$val = $stmt->fetch();

if ($val) { // 取得できたら、既に house_name が使われている
    header('Location: login.php?error='.$house_name.'&success=&email='.$email); 
} else {
    // house_name を登録
    $stmt = $pdo->prepare('INSERT INTO household_house(email, house_name, password, in_date)
        VALUES(:email, :house_name, :password, sysdate())');
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':house_name', $house_name, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $status = $stmt->execute();

    // SQL実行時にエラーがある場合STOP
    if ($status == false) {
        sql_error($stmt);
    }
    header('Location: login.php?success='.$house_name.'&error=&email='); 
}

?>
