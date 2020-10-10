<?php 
    $isEmpty = true;
    if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $id=>$qty) {
            if(isset($id)) {
                $isEmpty = false;
            }
        }
    }

    if($isEmpty) {
        echo "<h2 class='cart-alert'>Giỏ hàng của bạn trống</h2>";
    }
    else {
        $items = $_SESSION['cart'];
        echo "<h2 class='cart-alert'>Bạn đang có <a href = 'cart.php'>" .count($items). " sản phẩm trong giỏ hàng.</a></h2>";
    }

?>