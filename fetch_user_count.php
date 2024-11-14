<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escapeofnature";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS user_count FROM users";
$result = $conn->query($sql);
$user_count = 0;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_count = $row['user_count'];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode(['user_count' => $user_count]);
?>
