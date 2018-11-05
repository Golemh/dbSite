<?php include '../connection.php';?>

<?php


//$cid = $_POST['cid'];
$sname = $_POST['sname'];
$cname = $_POST['cname'];
$address = $_POST['address'];
$area = $_POST['area'];
$cno = $_POST['cno'];
$gc = $_POST['gc'];
$sid = $_POST['sid'];



$CreateSql = "INSERT INTO `customers_13100` ( `SNAME`, `CNAME`, `CNO`, `ADDRESS`, `AREA`, `GC`, `sid`) VALUES ('$sname', '$cname', '$cno', '$address', '$area', '$gc','$sid')";
 

$res = mysqli_query($mysqli, $CreateSql) or die(mysqli_error($mysqli));



?>