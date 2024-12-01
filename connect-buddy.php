<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym_buddies";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user IDs from URL parameters
$userId1 = isset($_GET['userId1']) ? (int)$_GET['userId1'] : null;
$userId2 = isset($_GET['userId2']) ? (int)$_GET['userId2'] : null;

if ($userId1 && $userId2) {
    // Insert a new connection into the Connections table
    $stmt = $conn->prepare("INSERT INTO Connections (UserID1, UserID2, ConnectionStatus) VALUES (?, ?, 'Connected')");
    if ($stmt) {
        $stmt->bind_param("ii", $userId1, $userId2);
        $stmt->execute();
        $stmt->close();
    }
}

// Redirect back to all-buddies.php
header("Location: all-buddies.php?userId=" . urlencode($userId1));
exit();
?>
