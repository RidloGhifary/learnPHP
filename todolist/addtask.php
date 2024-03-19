<?php 
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task"])){
    $task = $_POST["task"];

    $tasks = file_get_contents("tasks.txt");
    $tasks = unserialize($tasks);
    var_dump($tasks);
    $tasks[] = $task;

    file_put_contents("tasks.txt", serialize($tasks));
  };

  header("Location: index.php");
  exit();
?>