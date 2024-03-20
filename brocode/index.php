<?php 

  setcookie("fav_food","pizza",time() + (86400 * 2), "/");
  setcookie("fav_drink","coca cola",time() + (86400 * 3), "/");
  setcookie("fav_game","valorant",time() - 0, "/");

  
  foreach($_COOKIE as $key => $value){
    echo "{$key} = {$value} <br/>";
  }

  if(isset($_COOKIE['fav_game'])){
    echo "I love playing {$$_COOKIE['fav_game']}";
  } else{
    echo "I don`t like playing game";
  }
?>

