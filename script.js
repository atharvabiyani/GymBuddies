// Navigation Functions
function showSignUp() {
    window.location.href = "sign-up.php";
}

function showLogin() {
    window.location.href = "login.html";
}

function showHomePage() {
    window.location.href = "home.html";
}

function showMyWorkoutsPage() {
    window.location.href = "workouts.php";
}

function showMyBuddiesPage() {
    window.location.href = "my-buddies.php";
}

function showAddWorkoutPage() {
    window.location.href = "add-workout.php";
}

function showEditProfilePage(){
    window.location.href = "edit-profile.html";
}

// Form submission functions (example logging only, replace with real functionality as needed)
function submitWorkout() {
    const workoutName = document.getElementById("workoutName").value;
    const duration = document.getElementById("duration").value;
    const intensity = document.getElementById("intensity").value;
    const targetMuscle = document.getElementById("targetMuscle").value;
    const equipment = document.getElementById("equipment").value;
    const description = document.getElementById("description").value;

    console.log(`Workout Submitted: 
        Name: ${workoutName}, 
        Duration: ${duration}, 
        Intensity: ${intensity}, 
        Target Muscle: ${targetMuscle}, 
        Equipment: ${equipment}, 
        Description: ${description}`
    );
    
    showMyWorkoutsPage(); // Redirect to My Workouts page
}

function submitPerferences() {
    const gender = document.getElementById("gender").value;
    const minAge = document.getElementById("minAge").value;
    const maxAge = document.getElementById("maxAge").value;
    const fitnessLevel = document.getElementById("fitnessLevel").value;
   
    console.log(`Preferences Submitted: 
        gender: ${gender}, 
        minAge: ${minAge}, 
        maxAge: ${maxAge}, 
        fitnessLevel: ${fitnessLevel}`
       
    );
    
    showMyBuddiesPage();
    
}


function validateLogin() {
    // Get the input values
    const Email = document.querySelector('input[name="Email"]').value.trim();
    const Password = document.querySelector('input[name="Password"]').value.trim();

    // Validate the input fields
    if (!Email) {
        alert("Email is required!");
        return; // Stop further execution
    }

    if (!Password) {
        alert("Password is required!");
        return; // Stop further execution
    }

    // Create a POST request to send the data to the PHP validation script
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `Email=${encodeURIComponent(Email)}&Password=${encodeURIComponent(Password)}`,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If login is successful, navigate to the home page with userId and firstName in the URL
                const userId = data.userId;
                const firstName = data.firstName;
                window.location.href = `home.html?userId=${userId}&firstName=${encodeURIComponent(firstName)}`;
            } else {
                // Show an error message if login fails
                alert('Invalid email or password. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error details:', error); // Log the actual error to the console
            alert('An error occurred. Please try again.');
        });
}
