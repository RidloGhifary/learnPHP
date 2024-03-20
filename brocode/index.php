<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php" method="post">
    <label for="x">x:</label>
    <input type="text" name="x" id="x">
    <label for="y">y:</label>
    <input type="text" name="y" id="y">
    <label for="z">z:</label>
    <input type="text" name="z" id="z">
    <input type="submit" value="Total">
  </form>
</body>
</html>

<?php 
  $x = $_POST["x"];
  $y = $_POST["y"];
  $z = $_POST["z"];

  // $total = abs($x);
  // $total = round($x);
  // $total = floor($x);
  // $total = ceil($x);
  // $total = pow($x, $y);
  // $total = sqrt($x);
  // $total = max($x, $y, $z);
  // $total = min($x, $y, $z);
  $total = rand();

  echo $total;
?>