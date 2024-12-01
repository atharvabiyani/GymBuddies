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

// Retrieve userId from the URL
$userId = isset($_GET['userId']) ? (int)$_GET['userId'] : null;
if (!$userId) {
    die("User ID is required!");
}

// Fetch preferences for the logged-in user
$preferencesQuery = "SELECT * FROM Preferences WHERE UserID = ?";
$stmt = $conn->prepare($preferencesQuery);
if (!$stmt) {
    die("SQL error: " . $conn->error);
}
$stmt->bind_param("i", $userId);
$stmt->execute();
$preferencesResult = $stmt->get_result();

if ($preferencesResult->num_rows === 0) {
    die("No preferences found for the user.");
}

$preferences = $preferencesResult->fetch_assoc();

// Extract preferences
$genderPref = $preferences['GenderPreference'];
$fitnessPref = $preferences['FitnessPreference'];
$minAge = $preferences['MinAgePreference'];
$maxAge = $preferences['MaxAgePreference'];

// Fetch possible buddy matches from the User table, with age between MinAgePreference and MaxAgePreference
$matchesQuery = "
    SELECT UserID, FName, LName, Email, Age, Gender, FitnessLevel
    FROM User 
    WHERE UserID != ? 
      AND Gender = ? 
      AND FitnessLevel = ? 
      AND Age BETWEEN ? AND ?";
$stmt = $conn->prepare($matchesQuery);
if (!$stmt) {
    die("SQL error: " . $conn->error);
}
$stmt->bind_param("issii", $userId, $genderPref, $fitnessPref, $minAge, $maxAge);
$stmt->execute();
$matchesResult = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Buddies</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="home.html"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="workouts.php?userId=<?php echo urlencode($userId); ?>"><i class="fas fa-dumbbell"></i> My Workouts</a></li>
        <li><a href="my-buddies.php?userId=<?php echo urlencode($userId); ?>"><i class="fas fa-users"></i> My Buddies</a></li>
        <li><a href="edit-profile.html"><i class="fas fa-user"></i> Update Profile</a></li>
    </ul>
</nav>

<h2>Possible Buddy Matches</h2>

<div class="buddy-container">
    <?php if ($matchesResult->num_rows > 0): ?>
        <?php while ($row = $matchesResult->fetch_assoc()): ?>
            <div class="buddy-card">
                <h3><?php echo htmlspecialchars($row['FName'] . " " . $row['LName']); ?></h3>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($row['Email']); ?></p>
                <p><strong>Age:</strong> <?php echo htmlspecialchars($row['Age']); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['Gender']); ?></p>
                <p><strong>Fitness Level:</strong> <?php echo htmlspecialchars($row['FitnessLevel']); ?></p>

                <?php
                // Check if a connection already exists
                $connectionQuery = "
                    SELECT ConnectionStatus 
                    FROM Connections 
                    WHERE (UserID1 = ? AND UserID2 = ?) OR (UserID1 = ? AND UserID2 = ?) 
                    LIMIT 1";
                $connStmt = $conn->prepare($connectionQuery);
                $connStmt->bind_param("iiii", $userId, $row['UserID'], $row['UserID'], $userId);
                $connStmt->execute();
                $connectionResult = $connStmt->get_result();

                if ($connectionResult->num_rows > 0) {
                    $connection = $connectionResult->fetch_assoc();
                    if ($connection['ConnectionStatus'] == 'Connected') {
                        echo '<button disabled>Connected</button>';
                    } else {
                        echo '<button><a href="connect-buddy.php?userId1=' . urlencode($userId) . '&userId2=' . urlencode($row['UserID']) . '">Connect</a></button>';
                    }
                } else {
                    echo '<button><a href="connect-buddy.php?userId1=' . urlencode($userId) . '&userId2=' . urlencode($row['UserID']) . '">Connect</a></button>';
                }
                ?>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No matches found based on your preferences.</p>
    <?php endif; ?>
</div>

<?php
$stmt->close();
$conn->close();
?>

</body>
</html>
