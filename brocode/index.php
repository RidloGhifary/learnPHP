<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php" method="post">
   <input type="radio" name="credit-card" value="Visa">Visa<br/>
   <input type="radio" name="credit-card" value="Mastercard">Mastercard<br/>
   <input type="radio" name="credit-card" value="American Express">American Express<br/>
   <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>

<?php 
  if(isset($_POST['submit'])){
    $credit_card = null;

    if(isset($_POST['credit-card'])){
      $credit_card = $_POST['credit-card'];
    }

    switch($credit_card){
      case "Visa":
        echo "You selected Visa";
        break;
      case "Mastercard":
        echo "You selected Mastercard";
        break;
      case "American Express":
        echo "You selected American Express";
        break;
      default:
      echo "Please make a selection";
    }
  }
?>