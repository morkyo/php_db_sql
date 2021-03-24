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
$sql = "SELECT * FROM todo_table WHERE id = :id";
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
  //Selectデータの数だけ自動でループ
  $row = $stmt->fetch();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="update.php" method="post">
  <input type="text" name="task" value="<?= $row["task"] ?>">
  <input type="hidden" name="id" value="<?= $row["id"] ?>">
  <input type="submit" value="送信">
</form>
</body>
</html>