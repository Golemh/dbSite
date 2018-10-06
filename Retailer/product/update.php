<?php include 'connection.php';?>

<?php

$brand = $_POST['brand'];
$type = $_POST['type'];
$shade = $_POST['shade'];
$size = $_POST['size'];
$price = $_POST['price'];



$CreateSql = "INSERT INTO `product_13100` (`brand`, `type`, `shade`, `size`, `price`) VALUES ('$brand', '$type', '$shade', '$size', '$price')";

$res = mysqli_query($mysqli, $CreateSql) or die(mysqli_error($mysqli));



 



?>