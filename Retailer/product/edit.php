<?php include '../connection.php';?>

<?php

//get user_id from session data or from call to db to combine session id with user_id
//this is depending on where you store this data for a currently logged in user


$pcode = $_POST['pcode'];
$brand = $_POST['brand'];
$type = $_POST['type'];
$shade = $_POST['shade'];
$size = $_POST['size'];
$price = $_POST['price'];



$CreateSql = "UPDATE product_13100 SET brand='$brand',type='$type',shade='$shade',size='$size',price='$price' WHERE pcode=$pcode";

$res = mysqli_query($mysqli, $CreateSql);



?>