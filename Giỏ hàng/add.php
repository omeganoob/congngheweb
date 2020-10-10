<?php 

 session_start();
 $id = $_REQUEST['item'];
 if(isset($_SESSION['cart'][$id])) {
     $quantity = $_SESSION['cart'][$id] + 1;
 }
 else {
     $quantity = 1;
 }

 $_SESSION['cart'][$id] = $quantity;
 header("location: index.php");
 exit();
?>