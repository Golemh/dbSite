<?php
 $username = "root";
 $password = "sualeh";
 //$password = "";
 $host = "localhost";
 $DB = "Shop";
 $mysqli = mysqli_connect($host, $username, $password, $DB);
 if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 ?>