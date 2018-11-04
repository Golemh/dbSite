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




// $firstname = mysqli_real_escape_string($_POST['firstname']);
// `CID`,
$CreateSql = "INSERT INTO `customers_13100` ( `SNAME`, `CNAME`, `CNO`, `ADDRESS`, `AREA`, `GC`, `sid`) VALUES ('$sname', '$cname', '$cno', '$address', '$area', '$gc','$sid')";
// '$cid', 

$res = mysqli_query($mysqli, $CreateSql) or die(mysqli_error($mysqli));


// $query = "UPDATE customers
// SET " . $_POST['datastring'] . "
// WHERE
// CID = '" . $cid . "'";


?>