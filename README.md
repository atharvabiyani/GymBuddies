# GymBuddies

GymBuddies is a web application designed for college students to maintain their physical and social wellness. The app enables users to plan workouts, connect with like-minded peers, and manage their fitness journey seamlessly.

---

## Features

- **User Management:**  
  - Sign up and log in functionality.  
  - Update profiles and preferences.  
  - Secure user authentication and data storage.

- **Workout Management:**  
  - Create, view, and delete personalized workouts.  
  - Track fitness progress and goals.

- **Buddy Finder:**  
  - Match with workout partners based on preferences such as fitness goals, age, and gender.  
  - Connect and collaborate for shared fitness activities.

- **Database Integration:**  
  - Supports up to 10,000 user profiles and 50,000 workout records.  
  - Ensures data consistency and integrity with relational design.

---

## Tech Stack

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  
- **Environment:** XAMPP (includes Apache server and phpMyAdmin)  

---

## Installation Guide

Follow these steps to set up and run the GymBuddies application:

1. **Set Up the Database Schema and Test Data**  
   - Refer to the **The Database System** section of the Final Project Report for detailed instructions.  
   - Import the `gym_buddies.sql` file into your MySQL database using phpMyAdmin or another MySQL client.

2. **Prepare the Project Files**  
   - Locate the `GymBuddies.zip` file in the `/project` folder of this repository.  
   - Unzip the `GymBuddies.zip` file to extract the project files.

3. **Move the Project to the Web Server Directory**  
   - Move the unzipped `GymBuddies` folder to the `htdocs` directory of your XAMPP installation.  
     - **Mac:** `Applications/XAMPP/xamppfiles/htdocs`  
     - **Windows:** `C:/xampp/htdocs`

4. **Run the Application**  
   - Open your preferred web browser.  
   - Navigate to the following URL:  
     ```
     http://localhost/GymBuddies/frontend/pages/index.html
     ```
   - You can now use the GymBuddies application to create workouts, connect with buddies, and manage profiles.
  
---

## Usage

- **Sign Up:** Register using your email and fitness details.  
- **Dashboard:** Navigate through workouts, buddy finder, and profile settings.  
- **Profile Management:** Update your fitness goals and preferences.  
- **Workouts:** Create personalized workout routines and track them easily.  
- **Buddy Finder:** Connect with others sharing similar fitness interests.

---

## Future Enhancements

- Personalized workout recommendations based on user history.  
- Progress tracking with visual analytics.  
- Enhanced buddy-matching algorithm for deeper personalization.  
- Feedback mechanisms for continuous improvement.
  
---

## Demo

For a detailed walkthrough of the GymBuddies application, including screenshots and functionality, refer to the project demo document:

[View the Project Demo (PDF)](Project_Demo.pdf)

---

## Contributors

- Atharva Biyani  
- Sneha Elangovan  
- Suvel Sunilnath  
- Laya Vadapalli  

---
