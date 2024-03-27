<?php

session_start();
include("./database.php");

if (!empty($_SESSION["username"])) {
  echo "user with name " . $_SESSION["username"] . " is already login.";
  header('Location: profile.php');
  exit();
} else {
  echo "user hasn`t login yet.";
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
  <h1>Register Page</h1>

  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <label for="username">username : </label><br />
    <input type="text" name="username" /><br />
    <label for="password">password : </label><br />
    <input type="password" name="password" /><br />
    <input type="submit" name="register" value="Register"><br />
    already have an account? <a href="./login.php">login!</a>
  </form>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($username)) {
    echo "please insert a username";
  } elseif (empty($password)) {
    echo "please insert a password";
  } else {
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ss", $username, $pass_hash);

      if (mysqli_stmt_execute($stmt)) {
        header("Location: ./login.php");
        exit();
      } else {
        echo "Error: " . mysqli_error($connection);
      }
    } else {
      echo "Failed to prepare the statement";
    }
    // Close statement
    mysqli_stmt_close($stmt);
  }
}

mysqli_close($connection);
?>