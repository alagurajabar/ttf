<?php
// db.php content
$host = "localhost";
$username = "root";
$password = "";
$database = "ttf";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Get form data
$full_name = $_POST['full_name'];
$Blood_Group = $_POST['Blood_Group'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$age = $_POST['age'];

// Insert
$sql = "INSERT INTO users (full_name, Blood_Group, phone1, phone2, age) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $full_name, $Blood_Group, $phone1, $phone2, $age);

if ($stmt->execute()) {
    echo "✅ Test data inserted successfully!";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
