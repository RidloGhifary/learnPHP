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

<?php 
  $globalVar = "this is global variable";
  echo "<br/>";

  function displayGlobalVar(){
    // DECLARE VARIABLE AS A GLOBAL VARIABLE FOR USING THE VARIABLE
    global $globalVar;
    echo "This is from inside a function $globalVar\n";
  }
  
  displayGlobalVar();
  echo "This is from outside a function $globalVar";
  ?>