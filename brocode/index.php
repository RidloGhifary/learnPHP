<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php" method="post">
   username<input type="text" name="username"><br/>
   age<input type="text" name="age"><br/>
   email<input type="text" name="email"><br/>
   <input type="submit" name="login" value="login">
  </form>
  <?php 
    if(isset($_POST['login'])){
      $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
      $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
      $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
      echo "<p>{$username}</p>" . "\n";
      if(empty($age)){
        echo "invalid number";
      } else{
        echo "<p>{$age}</p>" . "\n";
      }
      echo "<p>{$email}</p>" . "\n";
    }
  ?>
</body>
</html>
