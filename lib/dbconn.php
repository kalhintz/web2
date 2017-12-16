<?php
$conn = mysqli_connect("localhost", "root", "apmsetup", "ps");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');

//echo "Connected successfully";
?>
