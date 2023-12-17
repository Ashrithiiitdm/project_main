<?php



$servname="localhost";

$username="root";

$password="";



$db_name="vikram";

$conn = mysqli_connect($servname, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>