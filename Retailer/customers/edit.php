<?php include '../connection.php';?>

<?php

//get user_id from session data or from call to db to combine session id with user_id
//this is depending on where you store this data for a currently logged in user



$cid = $_POST['cid'];
$sname = $_POST['sname'];
$cname = $_POST['cname'];
$address = $_POST['address'];
$area = $_POST['area'];
$cno = $_POST['cno'];
$gc = $_POST['gc'];
$sid = $_POST['sid'];

//CID='$cid',
$CreateSql = "UPDATE customers_13100 SET SNAME='$sname',CNAME='$cname',CNO='$cno',ADDRESS='$address',AREA='$area',GC='$gc', sid='$sid' WHERE CID=$cid";

$res = mysqli_query($mysqli, $CreateSql);


// $query = "UPDATE customers
// SET " . $_POST['datastring'] . "
// WHERE
// CID = '" . $cid . "'";


?>