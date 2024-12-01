<?php
    $userId = isset($_GET['userId']) ? $_GET['userId'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Buddy</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<form action="add_buddy_action.php" method="POST">
    <label for="gender">Gender:</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>
    
    <label for="fitnessLevel">Fitness Level:</label>
    <select name="fitnessLevel" id="fitnessLevel">
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option>
    </select>
    
    <label for="minAge">Minimum Age:</label>
    <input type="number" name="minAge" id="minAge" required>

    <label for="maxAge">Maximum Age:</label>
    <input type="number" name="maxAge" id="maxAge" required>

    <input type="hidden" name="userId" value="<?php echo htmlspecialchars($userId); ?>">
    
    <button type="submit">Submit Preferences</button>
</form>
</body>
</html>
