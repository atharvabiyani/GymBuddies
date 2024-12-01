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

// Check if required POST data is set
if (isset($_POST['gender'], $_POST['fitnessLevel'], $_POST['minAge'], $_POST['maxAge'], $_POST['userId'])) {
    $gender = $_POST['gender'];
    $fitnessLevel = $_POST['fitnessLevel'];
    $minAge = (int)$_POST['minAge'];
    $maxAge = (int)$_POST['maxAge'];
    $userId = (int)$_POST['userId'];

    // SQL query with placeholders
    $sql = "INSERT INTO Preferences (UserID, GenderPreference, FitnessPreference, MinAgePreference, MaxAgePreference) 
            VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE 
            GenderPreference = VALUES(GenderPreference),
            FitnessPreference = VALUES(FitnessPreference),
            MinAgePreference = VALUES(MinAgePreference),
            MaxAgePreference = VALUES(MaxAgePreference)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if prepare failed
    if (!$stmt) {
        die("SQL prepare error: " . $conn->error);
    }

    // Bind parameters
    if (!$stmt->bind_param("issii", $userId, $gender, $fitnessLevel, $minAge, $maxAge)) {
        die("Bind param error: " . $stmt->error);
    }

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to 'my-buddies.php' with the correct userId
        header("Location: all-buddies.php?userId=" . $userId);
        exit;
    } else {
        // Display the error if execution fails
        echo "Execute error: " . $stmt->error;
    }

    $stmt->close();
} else {
    die("Required form data is missing!");
}

$conn->close();
?>
