<?php
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
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and retrieve POST data
    $fname = $conn->real_escape_string($_POST['FName']);
    $mint = $conn->real_escape_string($_POST['MInt']);
    $lname = $conn->real_escape_string($_POST['LName']);
    $email = $conn->real_escape_string($_POST['Email']);
    $password = $conn->real_escape_string($_POST['Password']);
    $age = (int) $_POST['Age'];
    $gender = $conn->real_escape_string($_POST['Gender']);
    $height = (int) $_POST['Height'];
    $weight = (int) $_POST['Weight'];
    $campus = $conn->real_escape_string($_POST['Campus']);
    $fitness_level = $conn->real_escape_string($_POST['FitnessLevel']);

    // Check if the email already exists
    $email_check_sql = "SELECT * FROM user WHERE Email = '$email'";
    $email_check_result = $conn->query($email_check_sql);

    if ($email_check_result->num_rows > 0) {
        // Redirect back to the signup page with an error message and user inputs
        $query_params = http_build_query([
            'error' => 'Email already exists',
            'FName' => $fname,
            'MInt' => $mint,
            'LName' => $lname,
            'Email' => $email,
            'Password' => $password,
            'Age' => $age,
            'Gender' => $gender,
            'Height' => $height,
            'Weight' => $weight,
            'Campus' => $campus,
            'FitnessLevel' => $fitness_level,
        ]);
        header("Location: sign-up.php?$query_params");
        exit();
    } else {
        // Insert query
        $sql = "INSERT INTO user (FName, MInt, LName, Email, Password, Age, Gender, Height, Weight, Campus, FitnessLevel)
                VALUES ('$fname', '$mint', '$lname', '$email', '$password', $age, '$gender', $height, $weight, '$campus', '$fitness_level')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to another page (e.g., 'login.html')
            header("Location: login.html");
            exit();
        } else {
            header("Location: sign-up.php?error=Database error");
            exit();
        }
    }

    // Close connection
    $conn->close();
}
?>
