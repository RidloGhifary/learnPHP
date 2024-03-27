<?php
session_start();

if (isset($_POST['logout'])) {
  echo "<script>if(confirm('Are you sure you want to logout?')) {window.location.href = 'logout.php';}</script>";
}

if (empty($_SESSION['username'])) {
  if ($_SESSION['prev_page']) {
    header('Location: ' . $_SESSION['prev_page']);
  } else {
    header('Location: index.php');
  }
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
  <h1>Welcome <?= $_SESSION['username']; ?></h1>

  <ul>
    <li>Username : <?= $_SESSION['username'] ?></li>
    <li>User id : <?= $_SESSION['user_id'] ?></li>
  </ul>

  <a href="./update.php">update your profile</a>
  <br />
  <br />

  <form method="post">
    <input type="submit" name="logout" value="logout">
  </form>
</body>

</html>