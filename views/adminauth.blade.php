<?php
$host = 'localhost';
$db = 'adminlogin';
$user = 'root';
$pass = '';


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = 'ss';
$plainPassword = 'sss';

$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

$sql = "INSERT INTO admin (username, password) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $hashedPassword);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

