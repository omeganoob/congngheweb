<?php 
    session_start();
    $id = $_REQUEST['productid'];
    if($id == "all") {
        unset($_SESSION['cart']);
    } else {
        unset($_SESSION['cart'][$id]);
    }
    header("location:cart.php");
    exit();
?>