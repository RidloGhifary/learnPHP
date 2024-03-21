<?php
  include("database.php");

  $username = 'test';
  $password = 'test';

  $hash_password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (user, password) VALUES ('$username', '$hash_password')";

  try{
    mysqli_query($conn, $sql);
    echo "register successful";
  } catch(mysqli_sql_exception){
    echo "cannot register user";
  }

  mysqli_close($conn);
?>