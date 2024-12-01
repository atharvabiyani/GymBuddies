-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2024 at 12:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_buddies`
--

-- --------------------------------------------------------

--
-- Table structure for table `Connections`
--

CREATE TABLE `Connections` (
  `UserID1` int(11) NOT NULL,
  `UserID2` int(11) NOT NULL,
  `ConnectionStatus` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Connections`
--

INSERT INTO `Connections` (`UserID1`, `UserID2`, `ConnectionStatus`) VALUES
(1, 2, 'Accepted'),
(1, 3, 'Pending'),
(2, 3, 'Rejected'),
(3, 4, 'Pending'),
(6, 28, 'Rejected'),
(6, 40, 'Accepted'),
(6, 46, 'Accepted'),
(7, 38, 'Accepted'),
(8, 16, 'Accepted'),
(8, 18, 'Accepted'),
(9, 6, 'Rejected'),
(9, 32, 'Accepted'),
(10, 19, 'Accepted'),
(11, 14, 'Accepted'),
(11, 17, 'Accepted'),
(12, 49, 'Accepted'),
(13, 10, 'Accepted'),
(13, 36, 'Accepted'),
(13, 50, 'Accepted'),
(14, 8, 'Rejected'),
(14, 18, 'Accepted'),
(14, 20, 'Accepted'),
(14, 44, 'Accepted'),
(15, 49, 'Accepted'),
(15, 50, 'Accepted'),
(16, 19, 'Rejected'),
(16, 24, 'Accepted'),
(16, 28, 'Rejected'),
(16, 47, 'Accepted'),
(17, 11, 'Accepted'),
(17, 31, 'Accepted'),
(18, 28, 'Rejected'),
(18, 43, 'Accepted'),
(19, 41, 'Accepted'),
(19, 48, 'Rejected'),
(20, 24, 'Accepted'),
(20, 42, 'Accepted'),
(20, 43, 'Accepted'),
(21, 13, 'Accepted'),
(21, 27, 'Accepted'),
(21, 28, 'Accepted'),
(21, 42, 'Accepted'),
(21, 46, 'Accepted'),
(22, 10, 'Accepted'),
(22, 50, 'Accepted'),
(23, 29, 'Rejected'),
(23, 36, 'Accepted'),
(23, 46, 'Accepted'),
(24, 13, 'Accepted'),
(24, 15, 'Accepted'),
(24, 23, 'Accepted'),
(24, 28, 'Accepted'),
(25, 8, 'Accepted'),
(25, 11, 'Accepted'),
(25, 35, 'Rejected'),
(25, 39, 'Accepted'),
(26, 41, 'Accepted'),
(27, 37, 'Accepted'),
(28, 39, 'Accepted'),
(28, 41, 'Accepted'),
(29, 27, 'Accepted'),
(29, 46, 'Pending'),
(29, 50, 'Accepted'),
(31, 20, 'Rejected'),
(31, 29, 'Accepted'),
(31, 48, 'Rejected'),
(33, 26, 'Accepted'),
(35, 19, 'Rejected'),
(35, 33, 'Accepted'),
(36, 7, 'Accepted'),
(36, 19, 'Accepted'),
(36, 24, 'Accepted'),
(36, 35, 'Rejected'),
(36, 39, 'Accepted'),
(38, 30, 'Accepted'),
(39, 6, 'Accepted'),
(39, 31, 'Accepted'),
(40, 10, 'Accepted'),
(41, 6, 'Rejected'),
(41, 30, 'Accepted'),
(41, 42, 'Accepted'),
(42, 9, 'Rejected'),
(42, 20, 'Accepted'),
(42, 23, 'Rejected'),
(43, 22, 'Accepted'),
(43, 37, 'Accepted'),
(43, 41, 'Accepted'),
(44, 30, 'Accepted'),
(44, 47, 'Rejected'),
(44, 49, 'Accepted'),
(46, 6, 'Accepted'),
(46, 18, 'Accepted'),
(48, 40, 'Pending'),
(49, 7, 'Rejected'),
(50, 23, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `Preferences`
--

CREATE TABLE `Preferences` (
  `UserID` int(11) NOT NULL,
  `GenderPreference` varchar(10) DEFAULT NULL,
  `FitnessPreference` varchar(20) DEFAULT NULL,
  `MinAgePreference` int(11) DEFAULT NULL,
  `MaxAgePreference` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Preferences`
--

INSERT INTO `Preferences` (`UserID`, `GenderPreference`, `FitnessPreference`, `MinAgePreference`, `MaxAgePreference`) VALUES
(1, 'Male', 'Intermediate', 20, 30),
(2, 'Female', 'Beginner', 18, 25),
(3, 'Female', 'Advanced', 25, 35),
(4, 'Male', 'Intermediate', 20, 28),
(5, 'Female', 'Beginner', 28, 31),
(6, 'Female', 'Beginner', 19, 36),
(7, 'Other', 'Beginner', 28, 44),
(8, 'Female', 'Intermediate', 30, 49),
(9, 'Male', 'Beginner', 30, 40),
(10, 'Male', 'Intermediate', 20, 34),
(11, 'Other', 'Advanced', 26, 46),
(12, 'Female', 'Intermediate', 20, 42),
(13, 'Female', 'Advanced', 19, 47),
(14, 'Male', 'Beginner', 29, 50),
(15, 'Other', 'Advanced', 27, 47),
(16, 'Other', 'Beginner', 22, 42),
(17, 'Other', 'Beginner', 27, 32),
(18, 'Female', 'Advanced', 29, 46),
(19, 'Female', 'Advanced', 21, 35),
(20, 'Other', 'Advanced', 26, 38),
(21, 'Female', 'Beginner', 24, 41),
(22, 'Other', 'Intermediate', 25, 49),
(23, 'Male', 'Beginner', 22, 37),
(24, 'Female', 'Intermediate', 28, 34),
(25, 'Male', 'Advanced', 20, 40),
(26, 'Male', 'Beginner', 26, 44),
(27, 'Other', 'Intermediate', 25, 32),
(28, 'Other', 'Intermediate', 23, 39),
(29, 'Male', 'Beginner', 27, 39),
(30, 'Other', 'Advanced', 28, 35),
(31, 'Other', 'Advanced', 22, 31),
(32, 'Female', 'Intermediate', 23, 50),
(33, 'Male', 'Advanced', 23, 38),
(35, 'Female', 'Advanced', 23, 46),
(36, 'Other', 'Advanced', 29, 35),
(37, 'Female', 'Intermediate', 23, 39),
(38, 'Other', 'Advanced', 21, 43),
(39, 'Male', 'Beginner', 27, 40),
(40, 'Female', 'Advanced', 20, 46),
(41, 'Other', 'Beginner', 19, 49),
(42, 'Female', 'Advanced', 30, 40),
(43, 'Male', 'Advanced', 22, 45),
(44, 'Other', 'Advanced', 27, 40),
(45, 'Female', 'Advanced', 29, 39),
(46, 'Male', 'Intermediate', 23, 45),
(47, 'Other', 'Advanced', 19, 43),
(48, 'Other', 'Intermediate', 30, 37),
(49, 'Other', 'Beginner', 27, 31),
(50, 'Other', 'Beginner', 26, 37);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `MInt` char(1) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Age` int(2) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Height` int(3) NOT NULL,
  `Weight` int(3) NOT NULL,
  `Campus` varchar(255) NOT NULL,
  `FitnessLevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `FName`, `MInt`, `LName`, `Email`, `Password`, `Age`, `Gender`, `Height`, `Weight`, `Campus`, `FitnessLevel`) VALUES
(1, 'Alice', 'M', 'Smith', 'alice.smith@example.com', 'password123', 25, 'Female', 160, 55, 'UTD', 'Intermediate'),
(2, 'Bob', 'J', 'Johnson', 'bob.johnson@example.com', 'password123', 27, 'Male', 175, 75, 'UTD', 'Advanced'),
(3, 'Charlie', 'K', 'Brown', 'charlie.brown@example.com', 'password123', 30, 'Male', 180, 80, 'UTD', 'Beginner'),
(4, 'Zara', 'Q', 'Yale', 'zara.yale@example.com', 'password123', 22, 'Female', 165, 60, 'UTD', 'Intermediate'),
(5, 'Fiona', 'Y', 'Adams', 'fiona.adams5@example.com', 'pass51243', 32, 'Other', 196, 93, 'UTD', 'Advanced'),
(6, 'Tina', 'L', 'Walker', 'tina.walker6@example.com', 'pass62688', 19, 'Male', 159, 72, 'SMU', 'Intermediate'),
(7, 'Mona', 'L', 'Wright', 'mona.wright7@example.com', 'pass73776', 39, 'Male', 194, 100, 'UTD', 'Beginner'),
(8, 'Jack', 'O', 'Allen', 'jack.allen8@example.com', 'pass89747', 46, 'Other', 188, 80, 'UT Austin', 'Intermediate'),
(9, 'Rose', 'E', 'Jackson', 'rose.jackson9@example.com', 'pass98294', 34, 'Other', 153, 73, 'SMU', 'Beginner'),
(10, 'Grace', 'U', 'Adams', 'grace.adams10@example.com', 'pass106558', 20, 'Female', 159, 55, 'Baylor', 'Beginner'),
(11, 'Leo', 'O', 'Martin', 'leo.martin11@example.com', 'pass111892', 35, 'Male', 161, 60, 'Baylor', 'Intermediate'),
(12, 'Victor', 'F', 'Allen', 'victor.allen12@example.com', 'pass128402', 39, 'Male', 175, 52, 'Baylor', 'Beginner'),
(13, 'Henry', 'H', 'Adams', 'henry.adams13@example.com', 'pass132755', 33, 'Male', 160, 51, 'UTD', 'Intermediate'),
(14, 'Eve', 'Z', 'Young', 'eve.young14@example.com', 'pass145754', 29, 'Other', 152, 64, 'UTD', 'Intermediate'),
(15, 'Uma', 'L', 'King', 'uma.king15@example.com', 'pass159140', 26, 'Male', 191, 68, 'UTD', 'Intermediate'),
(16, 'Victor', 'A', 'Johnson', 'victor.johnson16@example.com', 'pass162242', 34, 'Female', 159, 79, 'UTD', 'Intermediate'),
(17, 'Grace', 'H', 'Lee', 'grace.lee17@example.com', 'pass174469', 45, 'Female', 174, 51, 'UT Austin', 'Beginner'),
(18, 'Paul', 'L', 'Taylor', 'paul.taylor18@example.com', 'pass182872', 50, 'Male', 166, 81, 'SMU', 'Beginner'),
(19, 'Quinn', 'G', 'Young', 'quinn.young19@example.com', 'pass193223', 23, 'Other', 168, 99, 'UT Austin', 'Advanced'),
(20, 'Henry', 'P', 'Johnson', 'henry.johnson20@example.com', 'pass201628', 37, 'Female', 181, 53, 'UT Austin', 'Beginner'),
(21, 'Leo', 'H', 'Young', 'leo.young21@example.com', 'pass216276', 40, 'Other', 160, 100, 'Baylor', 'Beginner'),
(22, 'Grace', 'K', 'Wright', 'grace.wright22@example.com', 'pass221357', 45, 'Female', 192, 86, 'Baylor', 'Beginner'),
(23, 'Zane', 'I', 'Jackson', 'zane.jackson23@example.com', 'pass233724', 43, 'Male', 170, 67, 'UT Austin', 'Advanced'),
(24, 'Bob', 'D', 'Lee', 'bob.lee24@example.com', 'pass242066', 24, 'Male', 159, 88, 'UTD', 'Intermediate'),
(25, 'Steve', 'I', 'White', 'steve.white25@example.com', 'pass253608', 32, 'Female', 190, 91, 'SMU', 'Advanced'),
(26, 'Alice', 'L', 'Baker', 'alice.baker26@example.com', 'pass263339', 21, 'Male', 152, 59, 'Baylor', 'Beginner'),
(27, 'Uma', 'I', 'Adams', 'uma.adams27@example.com', 'pass274117', 20, 'Male', 197, 79, 'SMU', 'Beginner'),
(28, 'Fiona', 'Q', 'Brown', 'fiona.brown28@example.com', 'pass288299', 30, 'Female', 170, 90, 'SMU', 'Advanced'),
(29, 'Tina', 'T', 'Allen', 'tina.allen29@example.com', 'pass292735', 40, 'Other', 173, 55, 'SMU', 'Beginner'),
(30, 'David', 'V', 'Scott', 'david.scott30@example.com', 'pass301751', 39, 'Male', 180, 57, 'UTD', 'Beginner'),
(31, 'Henry', 'Q', 'Lee', 'henry.lee31@example.com', 'pass313195', 48, 'Other', 191, 91, 'UT Austin', 'Intermediate'),
(32, 'Victor', 'U', 'Adams', 'victor.adams32@example.com', 'pass326706', 36, 'Male', 169, 96, 'UT Austin', 'Intermediate'),
(33, 'Nate', 'Z', 'Adams', 'nate.adams33@example.com', 'pass335845', 28, 'Female', 153, 50, 'UT Austin', 'Intermediate'),
(35, 'Jack', 'M', 'Scott', 'jack.scott35@example.com', 'pass359675', 43, 'Other', 187, 58, 'SMU', 'Advanced'),
(36, 'Ivy', 'Z', 'Harris', 'ivy.harris36@example.com', 'pass361846', 31, 'Other', 158, 64, 'Baylor', 'Beginner'),
(37, 'Fiona', 'P', 'Wright', 'fiona.wright37@example.com', 'pass377443', 40, 'Male', 194, 97, 'UTD', 'Advanced'),
(38, 'Victor', 'W', 'Johnson', 'victor.johnson38@example.com', 'pass385606', 34, 'Other', 196, 58, 'SMU', 'Intermediate'),
(39, 'Eve', 'N', 'Adams', 'eve.adams39@example.com', 'pass397849', 34, 'Other', 172, 72, 'UT Austin', 'Intermediate'),
(40, 'Tina', 'K', 'Anderson', 'tina.anderson40@example.com', 'pass401184', 40, 'Other', 190, 67, 'SMU', 'Advanced'),
(41, 'Fiona', 'W', 'Taylor', 'fiona.taylor41@example.com', 'pass416745', 24, 'Female', 161, 98, 'UTD', 'Intermediate'),
(42, 'Victor', 'X', 'Walker', 'victor.walker42@example.com', 'pass425121', 42, 'Female', 181, 99, 'SMU', 'Intermediate'),
(43, 'Bob', 'Z', 'Harris', 'bob.harris43@example.com', 'pass434445', 21, 'Other', 165, 63, 'SMU', 'Intermediate'),
(44, 'Wendy', 'W', 'Anderson', 'wendy.anderson44@example.com', 'pass447150', 28, 'Other', 173, 100, 'SMU', 'Intermediate'),
(45, 'Olivia', 'B', 'Green', 'olivia.green45@example.com', 'pass451055', 43, 'Male', 179, 89, 'UT Austin', 'Intermediate'),
(46, 'Leo', 'G', 'Adams', 'leo.adams46@example.com', 'pass468010', 24, 'Female', 151, 62, 'UTD', 'Advanced'),
(47, 'Wendy', 'F', 'Scott', 'wendy.scott47@example.com', 'pass478500', 26, 'Female', 195, 54, 'UT Austin', 'Beginner'),
(48, 'Bob', 'T', 'Allen', 'bob.allen48@example.com', 'pass487025', 22, 'Female', 183, 81, 'UTD', 'Intermediate'),
(49, 'Jack', 'P', 'Thomas', 'jack.thomas49@example.com', 'pass494953', 30, 'Female', 190, 84, 'Baylor', 'Intermediate'),
(50, 'Fiona', 'H', 'Smith', 'fiona.smith50@example.com', 'pass508476', 38, 'Female', 168, 77, 'Baylor', 'Intermediate');

-- --------------------------------------------------------

--
-- Table structure for table `Workouts`
--

CREATE TABLE `Workouts` (
  `WorkoutID` int(11) NOT NULL,
  `WorkoutName` varchar(255) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Intensity` varchar(20) NOT NULL,
  `TargetMuscle` varchar(255) NOT NULL,
  `EquipmentNeeded` varchar(255) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Workouts`
--

INSERT INTO `Workouts` (`WorkoutID`, `WorkoutName`, `Duration`, `Intensity`, `TargetMuscle`, `EquipmentNeeded`, `UID`) VALUES
(1, 'Push-ups', 30, 'Moderate', 'Chest', 'None', 1),
(2, 'Pull-ups', 20, 'High', 'Back', 'Pull-up Bar', 2),
(3, 'Squats', 45, 'Low', 'Legs', 'None', 3),
(4, 'Deadlifts', 50, 'High', 'Full Body', 'Barbell', NULL),
(5, 'Push-ups', 30, 'Moderate', 'Chest', 'None', 5),
(6, 'Pull-ups', 20, 'High', 'Back', 'Pull-up Bar', 6),
(7, 'Squats', 45, 'Low', 'Legs', 'None', 7),
(8, 'Bench Press', 40, 'High', 'Chest', 'Barbell', 8),
(9, 'Deadlifts', 50, 'High', 'Full Body', 'Barbell', 9),
(10, 'Bicep Curls', 25, 'Moderate', 'Arms', 'Dumbbells', 10),
(11, 'Tricep Dips', 20, 'Moderate', 'Arms', 'None', 11),
(12, 'Lunges', 30, 'Low', 'Legs', 'None', 12),
(13, 'Plank', 5, 'Low', 'Core', 'None', 13),
(14, 'Shoulder Press', 35, 'Moderate', 'Shoulders', 'Dumbbells', 14),
(15, 'Rowing', 40, 'High', 'Back', 'Rowing Machine', 15),
(16, 'Cycling', 60, 'Moderate', 'Legs', 'Stationary Bike', 16),
(17, 'Jumping Jacks', 15, 'Low', 'Full Body', 'None', 17),
(18, 'Mountain Climbers', 20, 'High', 'Core', 'None', 18),
(19, 'Treadmill Running', 30, 'Moderate', 'Legs', 'Treadmill', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Connections`
--
ALTER TABLE `Connections`
  ADD PRIMARY KEY (`UserID1`,`UserID2`),
  ADD KEY `UserID2` (`UserID2`);

--
-- Indexes for table `Preferences`
--
ALTER TABLE `Preferences`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Workouts`
--
ALTER TABLE `Workouts`
  ADD PRIMARY KEY (`WorkoutID`),
  ADD KEY `UID` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Workouts`
--
ALTER TABLE `Workouts`
  MODIFY `WorkoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Connections`
--
ALTER TABLE `Connections`
  ADD CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`UserID1`) REFERENCES `user` (`UserId`) ON DELETE CASCADE,
  ADD CONSTRAINT `connections_ibfk_2` FOREIGN KEY (`UserID2`) REFERENCES `user` (`UserId`) ON DELETE CASCADE;

--
-- Constraints for table `Preferences`
--
ALTER TABLE `Preferences`
  ADD CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserId`) ON DELETE CASCADE;

--
-- Constraints for table `Workouts`
--
ALTER TABLE `Workouts`
  ADD CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UserId`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
