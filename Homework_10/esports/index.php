<?php
include_once 'includes/db_connection.php';


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
 }
 echo "Connected successfully";
 

?>
