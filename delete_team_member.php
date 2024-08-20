<?php
$servername = "localhost";
$username = "root"; // Use your MySQL username
$password = ""; // Use your MySQL password
$dbname = "SCST_members";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID from query parameter
$id = $_GET['id'];

// Prepare and bind
$sql = "DELETE FROM team_members WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header("Location: index.php?message=deleted");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
