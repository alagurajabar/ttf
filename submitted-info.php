<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Submitted Emergency Info</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f8f9fa;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      font-size: 14px;
    }
    th, td {
      padding: 8px;
      text-align: center;
      border: 1px solid #ccc;
    }
    th {
      background-color: #343a40;
      color: #fff;
    }
    img {
      width: 60px;
      height: auto;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<h1>All Submitted Emergency Information</h1>

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ttf";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id='infoTable'><thead><tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Blood Group</th>
        <th>Phone 1</th>
        <th>Phone 2</th>
        <th>Age</th>
        <th>Allergies</th>
        <th>Medical Conditions</th>
        <th>Organ Donor</th>
        <th>WhatsApp</th>
        <th>Email</th>
        <th>Instagram</th>
        <th>LinkedIn</th>
        <th>Address</th>
        <th>Donation Willing</th>
        <th>ICE Instructions</th>
        <th>Emergency Note</th>
        <th>Gender</th>
        <th>Message</th>
        <th>Profile Photo</th>
        <th>Submitted At</th>
    </tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['full_name']."</td>";
        echo "<td>".$row['Blood_Group']."</td>";
        echo "<td>".$row['phone1']."</td>";
        echo "<td>".$row['phone2']."</td>";
        echo "<td>".$row['age']."</td>";
        echo "<td>".$row['Allergies']."</td>";
        echo "<td>".$row['medical']."</td>";
        echo "<td>".$row['donor']."</td>";
        echo "<td>".$row['Whatsapp']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['Instagram']."</td>";
        echo "<td>".$row['LinkedIn']."</td>";
        echo "<td>".$row['Address']."</td>";
        echo "<td>".$row['Donation']."</td>";
        echo "<td>".$row['ICE']."</td>";
        echo "<td>".$row['first']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['message']."</td>";
        echo "<td><img src='".$row['profile_picture']."' alt='Profile'></td>";
        echo "<td>".$row['created_at']."</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No records found.</p>";
}

$conn->close();
?>

<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#infoTable').DataTable({
      scrollX: true,
      responsive: true,
      order: [[0, 'desc']]
    });
  });
</script>

</body>
</html>
