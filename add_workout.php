<?php
    $userId = isset($_GET['userId']) ? $_GET['userId'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Workout</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <form action="add_workout_action.php" method="POST">
        <input type="hidden" name="userId" value="<?php echo htmlspecialchars($userId); ?>">
        
        <label for="WorkoutName">Workout Name:</label>
        <input type="text" id="WorkoutName" name="WorkoutName" required>
        
        <label for="Duration">Duration (minutes):</label>
        <input type="number" id="Duration" name="Duration" min="1" required>

        <label for="Intensity">Intensity:</label>
        <select id="Intensity" name="Intensity" required>
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
            <option value="expert">Expert</option>
        </select>

        <label for="TargetMuscle">Target Muscle:</label>
        <input type="text" id="TargetMuscle" name="TargetMuscle">

        <label for="EquipmentNeeded">Equipment Needed:</label>
        <input type="text" id="EquipmentNeeded" name="EquipmentNeeded">

        <button type="submit">Submit Workout</button>
    </form>
</body>
</html>
