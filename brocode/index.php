<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php" method="post">
    <label for="quantity">quantity:</label>
    <input type="number" name="quantity" id="quantity">
    <input type="submit" value="Submit">
  </form>
</body>
</html>

<?php 
  $item = "Pizza";
  $cost = 5.99;
  $quantity = $_POST['quantity'];
  $total = null;

  $total = $quantity * $cost;

  echo 'You`ve ordered '.$quantity." ".$item."<br/>"."the total is ".$total; 
?>