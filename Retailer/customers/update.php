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
$cid = $_POST['cid'];
$sname = $_POST['sname'];
$cname = $_POST['cname'];
$address = $_POST['address'];
$area = $_POST['area'];
$cno = $_POST['cno'];
$gc = $_POST['gc'];
$sid = $_POST['sid'];



if (isset($_POST['cid'])) {

// $firstname = mysqli_real_escape_string($_POST['firstname']);
$CreateSql = "INSERT INTO `customers_13100` VALUES ('$cid', '$sname', '$cname', '$cno', '$address', '$area', '$gc','$sid')";

$res = mysqli_query($mysqli, $CreateSql) or die(mysqli_error($mysqli));


// $query = "UPDATE customers
// SET " . $_POST['datastring'] . "
// WHERE
// CID = '" . $cid . "'";

} 
else {
echo "invalid response";
}

?>