<?php
//DB接続
try {
	$pdo = new  PDO('mysql:dbname=todo_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ登録SQL
$stmt = $pdo->prepare("SELECT * FROM todo_table");
$status = $stmt->execute();

//データ表示
$view="";
if ($status==false) {
  //エラー処理
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else {
  //Selectデータの数だけ自動でループ
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>".$result["task"]."</p>";
  }
}
?>

<?=$view?>
