<?php
header('Content-Type: application/json');

$conn = new mysqli('localhost', 'root', '', 'escapeofnature');

if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

$sql = "SELECT * FROM concerns ORDER BY created_at DESC";
$result = $conn->query($sql);

$concerns = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $concerns[] = $row;
    }
}

$conn->close();
echo json_encode($concerns);
?>
