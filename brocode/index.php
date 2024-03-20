<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    username :<br/>
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" value="submit">
  </form>
</body>
</html>

<?php 

  if($_SERVER['REQUEST_METHOD'] === "POST") {

    $pass = "pizza123";
    $pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if(password_verify($pass, $pass_hash)) {
      echo "username : ".$_POST['username']."<br/>";
      echo "password : ".$pass_hash."<br/>";
    } else {
      echo "password is incorrect";
    }
  }

?>