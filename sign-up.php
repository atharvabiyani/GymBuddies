<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Buddies - Sign Up</title>
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        .error-message {
            color: red;
            font-weight: bold;
        }
        .error-field {
            border: 2px solid red;
        }
    </style>
</head>
<body>
    <section id="sign-up-page">
        <h2>Sign Up</h2>

        <form action="connect.php" method="post">
            <label>First Name:</label>
            <input type="text" id="FName" name="FName" value="<?php echo isset($_GET['FName']) ? htmlspecialchars($_GET['FName']) : ''; ?>" required>

            <label>Middle Initial:</label>
            <input type="text" id="MInt" name="MInt" value="<?php echo isset($_GET['MInt']) ? htmlspecialchars($_GET['MInt']) : ''; ?>">

            <label>Last Name:</label>
            <input type="text" id="LName" name="LName" value="<?php echo isset($_GET['LName']) ? htmlspecialchars($_GET['LName']) : ''; ?>" required>


            <!-- Display general error message if exists -->
            <?php
            $error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
            if ($error) {
                echo '<p class="error-message">' . $error . '</p>';
            }
            ?>
            
            <label>Email:</label>
            <input type="email" id="Email" name="Email" class="<?php echo $error ? 'error-field' : ''; ?>" value="<?php echo isset($_GET['Email']) ? htmlspecialchars($_GET['Email']) : ''; ?>" required>
            <?php if ($error) { echo '<p class="error-message">Please use a different email address.</p>'; } ?>

            <label>Password:</label>
            <input type="password" id="Password" name="Password" required>

            <label>Age:</label>
            <input type="number" id="Age" name="Age" value="<?php echo isset($_GET['Age']) ? htmlspecialchars($_GET['Age']) : ''; ?>" required>

            <label>Gender:</label>
            <select name="gender" id="gender">
                <option value="Male" <?php echo (isset($_GET['Gender']) && $_GET['Gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female <?php echo (isset($_GET['Gender']) && $_GET['Gender'] === 'Female') ? 'selected' : ''; ?>">Female</option>
                <option value="Other" <?php echo (isset($_GET['Gender']) && $_GET['Gender'] === 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label>Height:</label>
            <input type="number" id="Height" name="Height" value="<?php echo isset($_GET['Height']) ? htmlspecialchars($_GET['Height']) : ''; ?>" required>

            <label>Weight:</label>
            <input type="number" id="Weight" name="Weight" value="<?php echo isset($_GET['Weight']) ? htmlspecialchars($_GET['Weight']) : ''; ?>" required>

            <label>Campus:</label>
            <input type="text" id="Campus" name="Campus" value="<?php echo isset($_GET['Campus']) ? htmlspecialchars($_GET['Campus']) : ''; ?>" required>

            <label>Fitness Level:</label>
            <select id="FitnessLevel" name="FitnessLevel" required>
                <option value="beginner" <?php echo (isset($_GET['FitnessLevel']) && $_GET['FitnessLevel'] === 'beginner') ? 'selected' : ''; ?>>Beginner</option>
                <option value="intermediate" <?php echo (isset($_GET['FitnessLevel']) && $_GET['FitnessLevel'] === 'intermediate') ? 'selected' : ''; ?>>Intermediate</option>
                <option value="expert" <?php echo (isset($_GET['FitnessLevel']) && $_GET['FitnessLevel'] === 'expert') ? 'selected' : ''; ?>>Expert</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </section>
</body>
</html>
