<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("header.php");?>
<div class="container">
  <sub>
  <?php include("side.php");?>
  </sub>
  <main>
    <form action="insert.php" method="post">
      <div>
        <input type="text" name="task" placeholder="タスクの作成">
        <button type="submit">+</button>
      </div>
    </form>
  </main>
</div>
  
</body>
</html>