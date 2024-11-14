<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escapeofnature";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

    if ($pass === $confirmPass) {
    
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user, $hashedPassword);

        if ($stmt->execute()) {
       
            $_SESSION['username'] = $user;

            header("Location: ../HTML/index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }
}

$conn->close();
?>
