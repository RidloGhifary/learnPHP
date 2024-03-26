<?php
session_start();

if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: index.php');
  exit();
}

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  echo "<h1>name : {$_SESSION['username']}</h1>";
  ?>

  <form method="post">
    <input type="submit" name="logout" value="logout">
  </form>
</body>

</html>