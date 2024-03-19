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

<?php
  echo "<br/>";

  $datas = array("first", "second","third");
  for($i = 0 ; $i < count($datas); $i++) {
    echo $datas[$i]."\n";
  }

  echo "<br/>";

  $marks = array("Tony"=> 96, "Edwin"=>100);
  echo $marks["Edwin"];
?>

<?php 
 echo "<br/>";
 
 $students = array(
   array(1, "Tony", 96),
   array(2, "Edwin", 97),
   array(3, "John", 98)
 );
 
 echo $students[2][2];
 echo "<br/>";

 $cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);

echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

?>