<?php 
  session_start();

  if(isset($_POST["login"])){
    if(!empty($_POST['username'])&&!empty($_POST['password'])){
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      
      header("Location: home.php");
      exit();
    } else{
      echo "missing username/password";
    }
  } else {
    echo "<p>please login buddy</p>";
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
      <form action="index.php" method="post">
        username : <br/>
        <input type="text" name="username"/><br/>
        password : <br/>
        <input type="password" name="password"/><br/>
        <input type="submit" name="login" value="Login">
      </form>
  </body>
</html>

