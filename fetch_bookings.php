<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escapeofnature";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bookings ORDER BY id DESC"; 
$result = $conn->query($sql);

$bookings = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($bookings);

$conn->close();
?>
