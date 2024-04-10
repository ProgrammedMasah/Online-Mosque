<?php
$localhost="localhost";
$username="root";
$password="";
$dbname="mosque";

$conn=mysqli_connect($localhost,$username, $password, $dbname);

// Check connection
if (!$conn) {
    echo die("Connection failed: " . mysqli_connect_error());
}
?>