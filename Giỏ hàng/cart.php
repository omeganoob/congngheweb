<?php 
    session_start();
    include "updatecart.php";
    // echo $str;

    $conn = mysqli_connect("localhost","root","mysql","books");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container flex-col">
        <?php
            include "checkcart.php";
            $isEmpty = true;
            if(isset($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $k=>$v) {
                    if(isset($k)) {
                        $isEmpty=false;
                    }
                }
            }
            if(!$isEmpty) {
                echo "<form action ='updatecart.php' method='POST'>";
                foreach($_SESSION['cart'] as $key=>$value) {
                    $item[] = $key;
                }
                $str = implode(",",$item);
                $total = 0;
                $sql = "select * from books where id in ($str) order by id desc";
                $query = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($query)) {
                    echo "<div class='pro'>";

                    echo "<h3>".$row['title']."</h3>";
                    echo "<p>".$row['author']." - ".number_format($row['price'], 3)."VND</p>";

                    echo "<p>";
                    echo "Số lượng: <input type='number' min='0' name='qty[".$row['id']."]' value=".$_SESSION['cart'][$row['id']].">";
                    echo "</p>";

                    echo "<a class='delBtn' href='delcart.php?productid=".$row['id']."'>Bỏ sản phẩm</a>";

                    echo "<p class='totalPrice'>Thành tiền: ".number_format($_SESSION['cart'][$row['id']] * $row['price'],3)."VND</p>";

                    echo "</div>";

                    $total += $_SESSION['cart'][$row['id']] * $row['price'];
                }

                echo "<div class='pro'>Thành tiền: ".number_format($total, 3)." VND</div>";
            }
        ?>
    </div>
    <?php 
        echo "<div class='btnCont'>";
        echo "<input type = 'submit' name='submit' value='Cập nhật'>";
        // echo "<a href='updatecart.php'>Cập nhật</a>";
        echo "<a href='index.php'>Tiếp tục mua</a>";
        echo "<a href='delcart.php?productid=all'>Xóa giỏ hàng</a>";
        echo "</div>";
        echo "</form>";
    ?>
</body>
</html>