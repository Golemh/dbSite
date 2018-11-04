<?php include '../connection.php';?>

<?php



//$execute = $mysqli->query("DELETE FROM customers_13100 WHERE CID".$_POST["id"]);
$id = $_POST['id'];
if (isset($_POST['id'])) {

// $firstname = mysqli_real_escape_string($_POST['firstname']);
$CreateSql = "DELETE FROM `users_13100` WHERE uid = '$id'";

$res = mysqli_query($mysqli, $CreateSql) or die(mysqli_error($mysqli));


//echo mysql_error();


} 
else {
echo "invalid response";
}

?>
