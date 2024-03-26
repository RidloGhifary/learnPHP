<?php
  include("./database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <h2>Welcome to fakebook</h2>
    username : <br/>
    <input type="text" name="username"><br/>
    password : <br/>
    <input type="password" name="password"><br/>
    <input type="submit" name="register" value="register">
  </form>
</body>
</html>

<?php 

  if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
      echo "Please enter a username";
    } elseif (empty($password)) {
      echo "Please enter a password";
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql_query = "INSERT INTO users (user, password) VALUES (?, ?)";
      $stmt = mysqli_prepare($conn, $sql_query);
      try{
        mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
        mysqli_stmt_execute($stmt);

        if(mysqli_affected_rows($conn) > 0){
          echo "welcome to fakebook";
        } else {
          echo "Username already exists. Please choose a different username.";
        }
      } catch (mysqli_sql_exception $e){
        echo "failed to register";
      }
    }
  }

  mysqli_close($conn);
?>