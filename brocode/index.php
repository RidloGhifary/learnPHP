<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php" method="post">
   <input type="checkbox" name="foods[]" value="Pizza">Pizza<br/>
   <input type="checkbox" name="foods[]" value="Taco">Taco<br/>
   <input type="checkbox" name="foods[]" value="Burger">Burger<br/>
   <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>

<?php 
  if(isset($_POST['submit'])){
   if(isset($_POST['foods']) && !empty($_POST["foods"])){
    $foods = $_POST['foods'];
    foreach($foods as $food){
      echo $food. "<br/>";
   }
  }else {
    echo "select at least one";
  }
}
?>