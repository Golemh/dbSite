<?php include '../connection.php';?>

<?php

//get user_id from session data or from call to db to combine session id with user_id
//this is depending on where you store this data for a currently logged in user

$euid = $_POST['euid'];
$uid = $_POST['uid'];
$password = $_POST['password'];
$active = $_POST['active'];
$sid = $_POST['sid'];


$CreateSql = "UPDATE users_13100 SET uid='$euid',password='$password',active='$active',sid='$sid' WHERE uid=$uid";

$res = mysqli_query($mysqli, $CreateSql);



?>