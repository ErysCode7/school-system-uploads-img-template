-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 09, 2022 at 04:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `access` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `username`, `password`, `access`) VALUES
(1, 'Erys', '$2y$10$5Lue7QUu9KuXH3R3JAcg8uowEPR.T/uDHqax0WInESiPuUJ/0Stsm', 'Administrator'),
(2, 'Kenneth', '$2y$10$vRzTpMWsvktI.7lxzxEoIOQ7jGfBetUCkyd34GV1oT/LO.BuDMnIa', 'Creating_users');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(1, ' Make Your Life Better by Saying Thank You in These 7 Situations', 'This post explains the power of a simple phrase: thank you. It also discusses a variety of situations when we should say thank you, but usually say something else instead.', 'James Anderson', '2022-01-11 13:36:33', '2022-01-11 20:36:33'),
(2, ' The Evolution of Anxiety: Why We Worry and What to Do About It', 'This article discusses how our evolutionary instincts clash with the modern world and what this means for anxiety, stress, and worry. I\'m proud of this one because of how I was able to blend science, practical application, and fun hand-drawn images. My best articles tend to be ones that are educational, entertaining, and useful.', 'Robin Pelinka', '2022-01-11 13:38:15', '2022-01-11 20:38:15'),
(3, ' The Akrasia Effect: Why We Don’t Follow Through on What We Set Out to Do and What to Do About It', 'This article shares the story of the famous author, Victor Hugo, and the totally-strange-but-somehow-effective strategy he used to overcome his chronic procrastination. Throughout the post, I weave in some interesting scientific insights about why we procrastinate and what we can do about it.', 'Cyrus Paul', '2022-01-11 13:42:17', '2022-01-11 20:42:17'),
(4, ' The Downside of Work-Life Balance', 'A few years ago, I came across this interesting concept about work-life balance called The Four Burners Theory. In this article, I finally got around to writing about it, and I lay out three different approaches I have used for dealing with the fundamental tradeoffs of life and work.', 'Paul McArhur', '2022-01-11 13:42:17', '2022-01-11 20:42:17'),
(5, 'Motivation is Overvalued. Environment Often Matters More.', 'The power of the environment is one of my favorite themes when it comes to discussing our habits and behavior. This article examines how environment has shaped the course of humanity over the centuries and then dives into the practical application of these ideas for our modern world.', 'James Cameron', '2022-01-11 13:42:17', '2022-01-11 20:42:17'),
(6, ' The 3 Stages of Failure in Life and Work (And How to Fix Them)', 'For one of my longest and most comprehensive articles of the year, I decided to discuss the 3 stages of failure. The examples I use primarily draw from the business world, but many of the lessons hold true for life as well. In addition to describing the symptoms, I try to offer practical strategies for fixing each of the 3 stages of failure.', 'Lily Page', '2022-01-11 13:42:17', '2022-01-11 20:42:17'),
(7, ' Motivation: The Scientific Guide on How to Get and Stay Motivated', 'Throughout the second half of the year, I focused on creating a variety of comprehensive guides on various topics related to habits and human performance. One of the best ones was this guide on motivation. In fact, if you search “motivation” in Google, this article will likely come up #1 or #2.', 'Sebastian Frits', '2022-01-11 13:42:17', '2022-01-11 20:42:17'),
(8, ' The Science of Sleep: A Brief Guide on How to Sleep Better Every Night', 'Another one of my comprehensive guides dived into the science of sleep. In this 4,600-word beast, you will not only find out how much sleep you actually need and how sleep works, but also proven ideas for how to get better sleep each night.', 'Margarette Palmer', '2022-01-11 13:42:17', '2022-01-11 20:42:17'),
(9, 'Healthy Eating: The Beginner’s Guide on How to Eat Healthy and Stick to It', 'This guide takes a different stance on healthy eating. Rather than focusing on telling you what to eat or how much to eat, this guide explains why we eat the way we do and what to do about it. It focuses on behaviors like why we tend to eat so much junk food and why we overeat so frequently, and then lays out simple strategies for overcoming these unhealthy habits.', 'John Senner', '2022-01-11 13:42:17', '2022-01-11 20:42:17'),
(10, 'The Proven Path to Doing Unique and Meaningful Work', 'Finally, we have an article that shares some brilliant advice that comes from a Finnish photographer named Arno Rafael Minkkinen. In this article, I explain the philosophy Minkkinen used to make it through the difficult portions of his career and ultimately produce unique and meaningful work. No matter what profession you are in, his advice is valuable.', 'Sofia Anderson', '2022-01-11 13:42:17', '2022-01-11 20:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `department`) VALUES
(1, 'Bachelor of Science in Information Technology', 1),
(2, 'Bachelor of Science in Computer Engineering', 1),
(3, 'Bachelor of Science in Business Administration', 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(256) NOT NULL,
  `department_head` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_head`) VALUES
(1, 'College Of Engineering', 1),
(2, 'College of Business', 4);

-- --------------------------------------------------------

--
-- Table structure for table `image_profiles`
--

CREATE TABLE `image_profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_directory` varchar(255) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_profiles`
--

INSERT INTO `image_profiles` (`id`, `name`, `image_directory`, `users_id`, `status`) VALUES
(44, 'IMG20211212061133', 'uploads/IMG20211212061133.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `birth_date`, `sex`, `department`, `course`, `created_at`, `updated_at`) VALUES
(1, 'Erys', 'Mozo', 'mozoerys@gmail.com', '1999-11-30', 'Male', 1, 1, '2021-12-04 16:09:47', '2021-12-10 14:02:02'),
(15, 'Kenneth', 'Nopre', 'kennopre@gmail.com', '1999-11-11', 'Male', 1, 1, '2021-12-10 22:18:03', '2021-12-10 15:21:10'),
(16, 'Aldrin', 'Laranan', 'AldrinLaranan@gmail.com', '1999-11-11', 'Male', 1, 1, '2021-12-10 22:18:46', '2021-12-10 15:21:15'),
(17, 'Jayson', 'Vitalicio', 'JaysonVitalicio@gmail.com', '1999-12-12', 'Male', 1, 1, '2021-12-10 22:19:11', '2021-12-10 15:21:19'),
(18, 'Zedrick', 'Ramos', 'zedrick@gmail.com', '1999-11-11', 'Male', 1, 1, '2021-12-10 22:19:33', '2021-12-10 15:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teachers_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teachers_id`, `first_name`, `last_name`, `email`, `birth_date`, `sex`, `department`, `created_at`, `updated_at`) VALUES
(1, 'Javier', 'Villanueva', 'jvier@gmail.com', '1989-04-17', 'Male', 1, '2021-12-07 20:29:14', '2021-12-07 13:29:14'),
(2, 'Lea', 'Nisperos', 'leanisperos@gmail.com', '1975-12-21', 'Female', 1, '2021-12-10 16:37:34', '2021-12-10 09:38:00'),
(3, 'Rey', 'Alvez', 'reyalvez@gmail.com', '1978-07-24', 'Male', 1, '2021-12-10 16:37:34', '2021-12-10 09:38:17'),
(4, 'Marina', 'Lastimosa', 'mlastimosa@gmail.com', '1976-06-14', 'Female', 2, '2021-12-10 16:42:59', '2021-12-10 09:42:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`,`course_name`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`,`department_name`),
  ADD KEY `department_head` (`department_head`);

--
-- Indexes for table `image_profiles`
--
ALTER TABLE `image_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `department` (`department`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teachers_id`),
  ADD KEY `department` (`department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image_profiles`
--
ALTER TABLE `image_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teachers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`department_id`) ON DELETE SET NULL;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`department_head`) REFERENCES `teachers` (`teachers_id`) ON DELETE SET NULL;

--
-- Constraints for table `image_profiles`
--
ALTER TABLE `image_profiles`
  ADD CONSTRAINT `image_profiles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `students` (`student_id`) ON DELETE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`department_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`course`) REFERENCES `course` (`course_id`) ON DELETE SET NULL;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
