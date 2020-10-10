<?php 
    session_start();
    $conn = mysqli_connect("localhost", "root","mysql","books")
    or die("Can not connect database");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include "checkcart.php";
    ?>
    <div class="container">
    <?php
        $sql = "select * from books order by id desc";
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                echo "<div class ='pro'>";
                echo "<h3>".$row['title']."</h3>";
                echo "Tác giả: ".$row['author']." - Giá: ".number_format($row['price'], 3)."VND <br>";
                echo "<p align = 'right'><a href='add.php?item=".$row['id']."'>Mua sách</a></p> </div>";
            }
        }
    ?>
    </div>
</body>
</html>