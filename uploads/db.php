<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";       // <-- default for XAMPP
$pass = "";           // <-- usually empty
$dbname = "ttf";      // <-- make sure this DB exists

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
