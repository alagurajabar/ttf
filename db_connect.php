<?php
$conn = mysqli_connect("localhost", "root", "", "ttf");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
