<?= "HEllo world" ?>
<!-- THIS IS SINGLE LINE COMMENT -->
<!-- THIS
IS
MULTI
LINE 
COMMENTS  -->

<?php
  $str = "John doe";
  $age = 25;

  echo "my name is $str and iam $age years old";

  function myFunc(){
    $name = "random";
    echo "this is from inside function $name\n";
  };

  myFunc();
  // echo "this line wont be executed because of local variable $name"
?>