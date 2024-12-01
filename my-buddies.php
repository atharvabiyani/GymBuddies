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

if ($userId) {
    // Fetch FName, LName, and ConnectionStatus for the given UserID1
    $sql = "SELECT u.FName, u.LName, c.ConnectionStatus 
            FROM Connections c
            INNER JOIN User u ON c.UserID2 = u.UserID
            WHERE c.UserID1 = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // If userId is not provided, display an error
    echo "User ID not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Buddies</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="home.html"><i class="fas fa-home"></i> Home</a></li>
        <li><a id="workouts-link" href="workouts.php"><i class="fas fa-dumbbell"></i> My Workouts</a></li>
        <li><a id="buddies-link" href="my-buddies.php"><i class="fas fa-users"></i> My Buddies</a></li>
        <li><a href="edit-profile.html"><i class="fas fa-user"></i> Update Profile</a></li>
    </ul>
</nav>

<h2>My Buddies</h2>
<div class="buddy-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='workout-card'>
                <h3>" . htmlspecialchars($row['FName']) . " " . htmlspecialchars($row['LName']) . "</h3>
                <p><strong>Connection Status:</strong> " . htmlspecialchars($row['ConnectionStatus']) . "</p>
            </div>";
        }
    } else {
        echo "<p>You have no buddies yet. Start connecting!</p>";
    }
    ?>
</div>

<!-- Add Buddies Button -->
<a href="add_buddy.php?userId=<?php echo urlencode($userId); ?>">
    <button>Add Buddies</button>
</a>

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
</script>

</body>
</html>

<?php
$conn->close();
?>
