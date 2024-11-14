<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escapeofnature";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['selected_rooms']) && isset($_POST['selected_hotel'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $selected_hotel = $_POST['selected_hotel'];
        $selected_rooms = explode(',', $_POST['selected_rooms']);

        if (count($selected_rooms) > 0) {
            $stmt = $conn->prepare("INSERT INTO bookings (name, email, check_in, check_out, adults, children, rooms, hotel) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $rooms_list = implode(', ', $selected_rooms);
            $stmt->bind_param("ssssssis", $name, $email, $check_in, $check_out, $adults, $children, $rooms_list, $selected_hotel);
            
            if ($stmt->execute()) {
                echo "Booking created successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "No rooms selected.";
        }
    } else {
        echo "Incomplete booking information.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
