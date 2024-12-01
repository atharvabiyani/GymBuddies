<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym_buddies";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data safely
$WorkoutName = $_POST['WorkoutName'];
$Duration = (int) $_POST['Duration'];
$Intensity = $_POST['Intensity'];
$TargetMuscle = $_POST['TargetMuscle'];
$EquipmentNeeded = $_POST['EquipmentNeeded'];
$UID = (int) $_POST['userId']; // Capture the UserID from the form

// Use a prepared statement for security
$sql = $conn->prepare("INSERT INTO Workouts (WorkoutName, Duration, Intensity, TargetMuscle, EquipmentNeeded, UID) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("sisssi", $WorkoutName, $Duration, $Intensity, $TargetMuscle, $EquipmentNeeded, $UID);

if ($sql->execute()) {
    header("Location: workouts.php?userId=" . $UID); // Redirect back to workouts.php with the correct userId
    exit;
} else {
    echo "Error: " . $sql->error;
}

$conn->close();
?>
