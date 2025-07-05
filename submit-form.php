<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';

// Debug print
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

$targetDir = "uploads/";
$profilePicture = '';

if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] === 0) {
    $fileName = basename($_FILES["profile_picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
        $profilePicture = $fileName;
    } else {
        die("Failed to upload photo.");
    }
}

// Get all POST data
$full_name = $_POST['full_name'] ?? '';
$Blood_Group = $_POST['Blood_Group'] ?? '';
$phone1 = $_POST['phone1'] ?? '';
$phone2 = $_POST['phone2'] ?? '';
$age = $_POST['age'] ?? 0;
$Allergies = $_POST['Allergies'] ?? '';
$medical = $_POST['medical'] ?? '';
$donor = $_POST['donor'] ?? '';
$Whatsapp = $_POST['Whatsapp'] ?? '';
$email = $_POST['email'] ?? '';
$Instagram = $_POST['Instagram'] ?? '';
$LinkedIn = $_POST['LinkedIn'] ?? '';
$Address = $_POST['Address'] ?? '';
$Donation = $_POST['Donation'] ?? '';
$ICE = $_POST['ICE'] ?? '';
$first = $_POST['first'] ?? '';
$gender = $_POST['gender'] ?? '';
$message = $_POST['message'] ?? '';

// Prepare & insert
$sql = "INSERT INTO users (
    full_name, Blood_Group, phone1, phone2, age, Allergies, medical, donor,
    Whatsapp, email, Instagram, LinkedIn, profile_picture, Address,
    Donation, ICE, first, gender, message
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Prepare Error: " . $conn->error);
}

$stmt->bind_param("ssssissssssssssssss",
    $full_name, $Blood_Group, $phone1, $phone2, $age, $Allergies, $medical, $donor,
    $Whatsapp, $email, $Instagram, $LinkedIn, $profilePicture, $Address,
    $Donation, $ICE, $first, $gender, $message
);

if ($stmt->execute()) {
    header("Location: thank-you.html");
    exit();
} else {
    echo "MySQL Error: " . $stmt->error;
}
?>
