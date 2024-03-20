<?php 
  session_start();

  if(isset($_POST["logout"])){
      session_destroy();
      header("Location: index.php");
      exit();
  }

  if(empty($_SESSION["username"]) && empty($_SESSION["password"])){
      header("Location: index.php");
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
  This is a home page<br/>
  <a href="index.php">this goes to home page</a><br/>
  <?php 
    echo "<p>{$_SESSION['username']}</p>";
    echo "<p>{$_SESSION['password']}</p>";
  ?>
  <form action="home.php" method="post">
    <input type="submit" name="logout" value="Logout">
  </form>
</body>
</html>

