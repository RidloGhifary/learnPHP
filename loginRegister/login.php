<?php

session_start();
include("./database.php");
$_SESSION['prev_page']  = $_SERVER['REQUEST_URI'];

if (!empty($_SESSION["username"])) {
  header('Location: profile.php');
  exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  // TODO - CHECK IS USERNAME & PASSWORD IS SET
  // Check if the username and password are set
  if (isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve the submitted username and password
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    // Query the database to check if the user exists
    $query = 'SELECT * FROM users WHERE username = ?';
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 's', $user_username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
      // User exists, verify password
      $row = mysqli_fetch_assoc($result);
      $stored_password = $row['password'];
      if (password_verify($user_password, $stored_password)) {
        // Authentication successful, store username in session
        $_SESSION["username"] = $row['username'];
        $_SESSION["user_id"] = $row['id'];
        // Redirect to the profile page
        header('Location: profile.php');
        exit();
      } else {
        $error = "incorrect password";
      }
    } else {
      $error = "user doesn`t exist";
    }
  } else {
    $error = "please insert username and password correctly";
  }
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
  <h1>Login Page</h1>
  <form method="post">
    username:<br />
    <input type="text" name="username"><br />
    password:<br />
    <input type="password" name="password"><br />
    <input type="submit" name="login" value="Login"><br />
    haven`t an account? <a href="./index.php">register!</a>
  </form>

  <?php if (isset($error)) : ?>
    <p><?= $error ?></p>
  <?php endif; ?>
</body>

</html>