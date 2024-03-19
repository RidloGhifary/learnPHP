<?php
  $tasks = file_get_contents("tasks.txt");
  $tasks = unserialize($tasks);

  foreach ($tasks as $task) {
    echo "<li>$task <a href='delete_task.php?task=$task'>delete</a></li>";
  }
?>