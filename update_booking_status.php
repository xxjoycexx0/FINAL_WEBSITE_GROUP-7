<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escapeofnature";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bookingId = $_POST['bookingId'];
$status = $_POST['status'];

if ($status === 'accepted') {
    $stmt = $conn->prepare("UPDATE bookings SET status = 'accepted' WHERE id = ?");
    $stmt->bind_param("i", $bookingId);
    $success = $stmt->execute();
    $stmt->close();
} elseif ($status === 'rejected') {
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $bookingId);
    $success = $stmt->execute();
    $stmt->close();
}

header('Content-Type: application/json');
echo json_encode(['success' => $success]);

$conn->close();
?>
