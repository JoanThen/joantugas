<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "user";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>");
}
?>
