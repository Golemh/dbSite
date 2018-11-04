<?php include '../connection.php';?>

<?php

//get user_id from session data or from call to db to combine session id with user_id
//this is depending on where you store this data for a currently logged in user


$sid = $_POST['sid'];
$name = $_POST['name'];
$cno = $_POST['cno'];


$CreateSql = "UPDATE salesperson_13100 SET name='$name',cno='$cno' WHERE sid=$sid";

$res = mysqli_query($mysqli, $CreateSql);



?>