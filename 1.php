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

<?php 
  echo "<br/>";
  function staticVar(){
    static $num = 97;
    $num++;
    echo "my number is : ".$num."\n";
  }

  staticVar();
  staticVar();
  staticVar();
?>

<?php
 echo "<br/>";

  $myNum = "ridlo";

  if($myNum >= 10 && is_numeric($myNum)){
    echo "my number is more than 10";
  } else if($muNum <= 10 && is_numeric($myNum)) {
    echo "my number is less than 10";
  }else {
    echo "is not a number";
  }

  echo "<br/>";

  switch ($myNum){
    case ($myNum >= 10 && is_numeric($myNum)):
      echo "my number is more than 10";
      break;
    case ($myNum <= 10 && is_numeric($myNum)):
      echo "my number is less than 10";
      break;
    default:
      echo "is not a number";
  }
?>

<?php
  echo "<br/>";
  
  for($i = 1; $i <= 10; $i++) {
    echo $i;
    echo "<br/>";
  };
  
  echo "<br/>";

  $i = 1;
  while($i < 7) {
    echo $i;
    echo "<br/>";
    $i++;
  }
?>