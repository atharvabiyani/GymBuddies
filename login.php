<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection details
    $servername = "localhost"; // Update as needed
    $username = "root";        // Your phpMyAdmin username
    $password = "";            // Your phpMyAdmin password
    $dbname = "gym_buddies";   // Database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email and password are provided
    if (!isset($_POST['Email']) || !isset($_POST['Password'])) {
        echo json_encode(['success' => false, 'error' => 'Missing email or password']);
        exit();
    }

    $email = $_POST['Email'];
    $pass = $_POST['Password'];

    // Prepare and execute SQL statement
    $sql = "SELECT UserId, FName, Password FROM user WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if the provided password matches
        if ($row['Password'] === $pass) {
            $userId = $row['UserId'];
            $firstName = $row['FName'];

            // Send the userId and FName back in the response
            echo json_encode(['success' => true, 'userId' => $userId, 'firstName' => $firstName]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid password']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No user found with this email']);
    }

    $stmt->close();
    $conn->close();
}
?>
