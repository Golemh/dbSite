<?php include 'connection.php';?>

<?php

//get user_id from session data or from call to db to combine session id with user_id
//this is depending on where you store this data for a currently logged in user
// $cid = json_decode($_POST['cid']);
// $sname = json_decode($_POST['sname']);
// $cname = json_decode($_POST['cname']);
// $address = json_decode($_POST['address']);
// $area = json_decode($_POST['area']);
// $cno = json_decode($_POST['cno']);
// $gc = json_decode($_POST['gc']);
$name = $_POST['name'];
$cno = $_POST['cno'];




// $firstname = mysqli_real_escape_string($_POST['firstname']);
$CreateSql = "INSERT INTO `salesperson_13100` (`name`, `cno`) VALUES ('$name', '$cno')";

$res = mysqli_query($mysqli, $CreateSql) or die(mysqli_error($mysqli));


// $query = "UPDATE customers
// SET " . $_POST['datastring'] . "
// WHERE
// CID = '" . $cid . "'";

 



?>