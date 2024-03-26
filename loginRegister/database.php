<?php

  $db_server = "localhost";
  $db_host = "root";
  $db_password = "";
  $db_name = "learnphplogin";
  $connection = "";

  try{
    $connection = mysqli_connect($db_server, $db_host, $db_password, $db_name);
  } catch(mysqli_sql_exception){
    echo "connection error";
  }

  if(!$connection) echo "connection error";
?>