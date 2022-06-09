-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 12:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `addclass`
--

CREATE TABLE `addclass` (
  `classID` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_date` varchar(100) NOT NULL,
  `time1` varchar(255) DEFAULT NULL,
  `time2` varchar(255) DEFAULT NULL,
  `time3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addclass`
--

INSERT INTO `addclass` (`classID`, `course_id`, `class_date`, `time1`, `time2`, `time3`) VALUES
(1, 1, '2022-04-25', '10 am to 12 pm', '8 am to 10 am', ''),
(2, 2, '2022-04-22', '1 pm to 5 pm', '10 am to 12 pm', ''),
(3, 3, '2022-04-20', '5 am to 7 am', '8 am to 10 am', '12 pm to 2 pm'),
(5, 5, '2022-04-28', '10 am to 12 pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` longtext NOT NULL,
  `course_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `course_img`) VALUES
(1, 'Java Lab 2', 'Java Programming Language', '1.jpg'),
(2, 'Cloud Computing', 'This is cloud computing', '2.jpg'),
(3, 'Networking Model', 'This is networking', '3.jpg'),
(5, 'PHP', 'This is php', 'PHP-logo.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(8, 'Java Coding class', '2022-04-06', '2022-04-05 10:15:01', '2022-04-05 10:15:01', '1'),
(9, 'Flutter program', '2022-04-13', '2022-04-07 12:49:47', '2022-04-07 12:49:47', '1');

-- --------------------------------------------------------

--
-- Table structure for table `joined_course`
--

CREATE TABLE `joined_course` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `joined_date` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joined_course`
--

INSERT INTO `joined_course` (`student_id`, `course_id`, `joined_date`, `date`) VALUES
(1, 1, '2022-04-06', '2022-04-25'),
(1, 2, '22-04-07 09:02:37am', '2022-04-06'),
(1, 3, '22-04-07 10:08:06am', '2022-04-20'),
(2, 1, '22-04-09 12:13:39pm', '2022-04-22'),
(2, 2, '22-04-07 12:10:22pm', '2022-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `student_event`
--

CREATE TABLE `student_event` (
  `student_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `joined_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_event`
--

INSERT INTO `student_event` (`student_id`, `event_id`, `joined_date`) VALUES
(1, 8, '22-04-07 10:09:11am');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_contact` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_contact`, `image`) VALUES
(2, 'Sanny', 123132, 'a.jpg'),
(3, 'Kane', 789798798, 'download.jpg'),
(4, 'Henry', 87987987987, 'download (1).jpg'),
(5, 'Kerry', 798798, 'a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`teacher_id`, `course_id`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `contact`, `address`, `gender`, `dob`, `email`, `password`) VALUES
(1, 'Ram', '1234567891', 'KTM', '', '', 'ram@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(2, 'Kushal', '787878787', 'HTD', '', '2022-04-03', 'kushal@gmail.com', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addclass`
--
ALTER TABLE `addclass`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joined_course`
--
ALTER TABLE `joined_course`
  ADD PRIMARY KEY (`student_id`,`course_id`);

--
-- Indexes for table `student_event`
--
ALTER TABLE `student_event`
  ADD PRIMARY KEY (`student_id`,`event_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD PRIMARY KEY (`teacher_id`,`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addclass`
--
ALTER TABLE `addclass`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
