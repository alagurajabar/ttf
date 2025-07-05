<?php
// DEBUG MODE ON
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
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

require_once 'phpqrcode/qrlib.php'; // Make sure this file exists

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table id='infoTable'><thead><tr>
        <th>ID</th>
        <th>QR Link</th>
        <th>QR Image</th>
        <th>QR Template</th>
        <th>Full Name</th>
        <th>Blood Group</th>
        <th>Phone 1</th>
        <th>Phone 2</th>
        <th>Age</th>
        <th>Allergies</th>
        <th>Medical</th>
        <th>Organ Donor</th>
        <th>WhatsApp</th>
        <th>Email</th>
        <th>Instagram</th>
        <th>LinkedIn</th>
        <th>Address</th>
        <th>Donation</th>
        <th>ICE</th>
        <th>Note</th>
        <th>Gender</th>
        <th>Message</th>
        <th>Photo</th>
        <th>Submitted At</th>
    </tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $link = "http://localhost/ttf/qride.php?id=$id";
        $qrFile = "qr/user_$id.png";

        if (!file_exists($qrFile)) {
            if (!is_dir("qr")) {
                mkdir("qr", 0777, true);
            }
            QRcode::png($link, $qrFile, QR_ECLEVEL_L, 4);
        }

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td><a href='qride.php?id=$id' target='_blank'>Open</a></td>";
        echo "<td><img src='$qrFile' alt='QR'></td>";
     // QR Template button
echo "<td><a href='merge_qr_to_template.php?id=".$row['id']."' target='_blank'>
        <button style='padding:5px 10px;background:#28a745;color:#fff;border:none;border-radius:4px;cursor:pointer;'>Generate Card</button>
      </a></td>";


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
    echo "<p>No records found or SQL error.</p>";
}
$conn->close();
?>

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
<?php