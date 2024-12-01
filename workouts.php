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

// Retrieve userId from the URL
$userId = isset($_GET['userId']) ? $_GET['userId'] : null;

// If userId is provided, fetch workouts for that user
if ($userId) {
    // Fetch workouts for the specific user
    $sql = "SELECT * FROM Workouts WHERE UID = $userId";
} else {
    // If userId is not provided, display an error
    echo "User ID not found!!!!";
    exit();
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Workouts</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<nav>
        <ul>
            <li><a href="home.html"><i class="fas fa-home"></i> Home</a></li>
            <!-- This link will be updated dynamically -->
            <li><a id="workouts-link" href="workouts.php"><i class="fas fa-dumbbell"></i> My Workouts</a></li>
            <li><a id="buddies-link" href="my-buddies.php"><i class="fas fa-users"></i> My Buddies</a></li>
            <li><a href="edit-profile.html"><i class="fas fa-user"></i> Update Profile</a></li>
        </ul>
    </nav>
    <h2>My Workouts</h2>
    <div class="buddy-container">
        <?php
        if ($result->num_rows > 0) {
            // Display workouts for the specific user
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='workout-card'>
                    <h3>" . htmlspecialchars($row['WorkoutName']) . "</h3>
                    <p><strong>Duration:</strong> " . $row['Duration'] . " minutes</p>
                    <p><strong>Intensity:</strong> " . ucfirst($row['Intensity']) . "</p>
                    <p><strong>Target Muscle:</strong> " . htmlspecialchars($row['TargetMuscle']) . "</p>
                    <p><strong>Equipment Needed:</strong> " . htmlspecialchars($row['EquipmentNeeded']) . "</p>
                </div>";
            }
        } else {
            echo "<p>No workouts added yet. Start by adding a new workout!</p>";
        }
        ?>
    </div>
    <a href="add_workout.php?userId=<?php echo urlencode($userId); ?>"><button>Add Workout</button></a>

    <script>
        // Extract userId and firstName from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const firstName = urlParams.get('firstName');
        const userId = urlParams.get('userId');


        // Update 'My Workouts' link
        const workoutsLink = document.getElementById("workouts-link");
        if (userId) {
            workoutsLink.href = `workouts.php?userId=${userId}`;
        } else {
            console.error("User ID is missing; cannot update 'My Workouts' link.");
        }

        // Update 'My Buddies' link
        const buddiesLink = document.getElementById("buddies-link");
        if (userId) {
            buddiesLink.href = `my-buddies.php?userId=${userId}&firstName=${encodeURIComponent(firstName || "")}`;
        } else {
            buddiesLink.href = "#";
        }

        // Debugging output
        console.log("Workouts Link:", workoutsLink.href);
        console.log("Buddies Link:", buddiesLink.href);
    </script>
    
</body>
</html>

<?php
$conn->close();
?>
