<?php
//GETでidを取得
$id = $_GET["id"];

//DB接続
try {
	$pdo = new  PDO('mysql:dbname=todo_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ登録SQL
$sql = "DELETE FROM todo_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
$view="";
if ($status==false) {
  //エラー処理
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else {
  //index.phpへリダイレクト
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TODO</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="css/style.css?<?= filemtime( "{$_SERVER['DOCUMENT_ROOT']}/php_db_sql/css/style.css" ) ?>">
</head>
<body>
<?php include("header.php");?>
<div class="container">
  <sub>
  <?php include("side.php");?>
  </sub>
  <main>
    <h2>Update ...</h2>
    <form action="update.php" method="post">
      <div class="update">
        <input type="text" name="task" value="<?= $row["task"] ?>">
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
        <button type="submit">更新する</button>
      </div>
    </form>
  </main>
</div>
</body>
</html>