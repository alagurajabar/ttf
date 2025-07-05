<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ttf";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
