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
      <form name="family_login" action="login_act.php" method="post">
        <h3>家族ログイン</h3>
        <?php if (isset($_GET['success']) && $_GET['success']): ?>
          <h5>登録完了しました。ログインしてください</h5>
        <?php elseif (isset($_GET['ng_password']) && $_GET['ng_password']): ?>
          <h4>パスワードが間違っています</h4>
        <?php endif; ?>
        <div class="form_entry">
          <p>家の呼び名</p>
          <?php if (isset($_GET['success'])): ?>
            <input type="text" name="house_name" size="15" value="<?php echo $_GET['success']; ?>">
          <?php else: ?>
            <input type="text" name="house_name" size="15" placeholder="サンプル" required>
          <?php endif; ?>        </div>
        <div class="form_entry">
          <p>パスワード</p>
          <input type="password" name="password" size="15" placeholder="sample" required>
        </div>
        <div class="form_submit">
          <input type="submit" value="ログイン" />
        </div>
      </form>
      <form name="registration" action="register.php" method="post">
        <h3>新規登録</h3>
          <?php if (isset($_GET['error']) && $_GET['error']): ?>
            <h4>この「家の呼び名」は既に使われています</h4>
          <?php endif;?>
        <div class="form_entry">
          <p>eメール</p>
          <?php if (isset($_GET['error'])): ?>
            <input type="email" name="email" size="15" value="<?php echo $_GET['email']; ?>" required>
          <?php else: ?>
            <input type="email" name="email" size="15" required>
          <?php endif; ?>
        </div>        
        <div class="form_entry">
          <p>家の呼び名</p>
          <?php if (isset($_GET['error'])): ?>
            <input type="text" name="house_name" size="15" value="<?php echo $_GET['error']; ?>" placeholder="家族で共用します" required>
          <?php else: ?>
            <input type="text" name="house_name" size="15" placeholder="家族で共用します" required>
          <?php endif; ?>
        </div>
        <div class="form_entry">
          <p>パスワード</p>
          <input type="password" name="password" size="15" placeholder="家族で共用します" required>
        </div>
        <div class="form_submit">
          <input type="submit" value="登録" />
        </div>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
