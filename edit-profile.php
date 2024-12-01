<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym_buddies";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Check if the request is for deleting the account
    if (!empty($_POST['delete_account'])) {
        // Validate the required email field
        if (empty($_POST['Email'])) {
            die("Email is required to identify the user.");
        }

        // Escape and sanitize email
        $email = $conn->real_escape_string($_POST['Email']);

        // Delete the user record
        $deleteQuery = "DELETE FROM user WHERE Email='$email'";

        if ($conn->query($deleteQuery) === TRUE) {
            // Redirect to index.html after successful deletion
            header("Location: index.html");
            exit(); // Ensure no further code is executed
        } else {
            die("Error deleting account: " . $conn->error);
        }
    } else {
        // Validate the required email field
        if (empty($_POST['Email'])) {
            die("Email is required to identify the user.");
        }

        // Escape and sanitize email
        $email = $conn->real_escape_string($_POST['Email']);

        // Initialize an array to store the fields to update
        $fields = [];

        // Dynamically add fields if they are not empty
        if (!empty($_POST['FName'])) $fields[] = "FName='" . $conn->real_escape_string($_POST['FName']) . "'";
        if (!empty($_POST['MInt'])) $fields[] = "MInt='" . $conn->real_escape_string($_POST['MInt']) . "'";
        if (!empty($_POST['LName'])) $fields[] = "LName='" . $conn->real_escape_string($_POST['LName']) . "'";
        if (!empty($_POST['Password'])) $fields[] = "Password='" . $conn->real_escape_string($_POST['Password']) . "'";
        if (!empty($_POST['Age'])) $fields[] = "Age=" . (int)$_POST['Age'];
        if (!empty($_POST['Gender'])) $fields[] = "Gender='" . $conn->real_escape_string($_POST['Gender']) . "'";
        if (!empty($_POST['Height'])) $fields[] = "Height=" . (int)$_POST['Height'];
        if (!empty($_POST['Weight'])) $fields[] = "Weight=" . (int)$_POST['Weight'];
        if (!empty($_POST['Campus'])) $fields[] = "Campus='" . $conn->real_escape_string($_POST['Campus']) . "'";
        if (!empty($_POST['FitnessLevel'])) $fields[] = "FitnessLevel='" . $conn->real_escape_string($_POST['FitnessLevel']) . "'";

        // Ensure there are fields to update
        if (!empty($fields)) {
            // Construct the SQL query
            $updateQuery = "UPDATE user SET " . implode(", ", $fields) . " WHERE Email='$email'";

            // Execute the query and check for success
            if ($conn->query($updateQuery) === TRUE) {
                // Redirect to home.html after successful update
                header("Location: home.html");
                exit(); // Ensure no further code is executed
            } else {
                die("Error updating profile: " . $conn->error);
            }
        } else {
            echo "No fields to update.";
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
