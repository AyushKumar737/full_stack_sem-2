-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 07:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_package`
--

CREATE TABLE `add_package` (
  `Id` int(11) NOT NULL,
  `dname` varchar(111) NOT NULL,
  `dimage` varchar(111) DEFAULT NULL,
  `pname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `place` varchar(300) NOT NULL,
  `days` varchar(255) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `description1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  `description2` varchar(255) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `name3` varchar(255) NOT NULL,
  `description3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `name4` varchar(255) NOT NULL,
  `description4` varchar(255) NOT NULL,
  `image5` varchar(300) NOT NULL,
  `name5` varchar(300) NOT NULL,
  `description5` varchar(300) NOT NULL,
  `image6` varchar(300) NOT NULL,
  `name6` varchar(300) NOT NULL,
  `description6` varchar(300) NOT NULL,
  `day1` varchar(30) DEFAULT NULL,
  `day2` varchar(30) DEFAULT NULL,
  `day3` varchar(30) DEFAULT NULL,
  `day4` varchar(30) DEFAULT NULL,
  `day5` varchar(30) DEFAULT NULL,
  `day6` varchar(30) DEFAULT NULL,
  `day7` varchar(30) DEFAULT NULL,
  `name7` varchar(200) DEFAULT NULL,
  `image7` varchar(100) DEFAULT NULL,
  `description7` text DEFAULT NULL,
  `day8` varchar(30) DEFAULT NULL,
  `name8` varchar(200) DEFAULT NULL,
  `image8` varchar(100) DEFAULT NULL,
  `description8` text DEFAULT NULL,
  `day9` varchar(30) DEFAULT NULL,
  `name9` varchar(200) DEFAULT NULL,
  `image9` varchar(100) DEFAULT NULL,
  `description9` text DEFAULT NULL,
  `day10` varchar(30) DEFAULT NULL,
  `name10` varchar(200) DEFAULT NULL,
  `image10` varchar(100) DEFAULT NULL,
  `description10` text DEFAULT NULL,
  `day11` varchar(30) DEFAULT NULL,
  `name11` varchar(200) DEFAULT NULL,
  `image11` varchar(100) DEFAULT NULL,
  `description11` text DEFAULT NULL,
  `day12` varchar(30) DEFAULT NULL,
  `name12` varchar(200) DEFAULT NULL,
  `image12` varchar(100) DEFAULT NULL,
  `description12` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_package`
--

INSERT INTO `add_package` (`Id`, `dname`, `dimage`, `pname`, `price`, `image`, `place`, `days`, `image1`, `name1`, `description1`, `image2`, `name2`, `description2`, `image3`, `name3`, `description3`, `image4`, `name4`, `description4`, `image5`, `name5`, `description5`, `image6`, `name6`, `description6`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `name7`, `image7`, `description7`, `day8`, `name8`, `image8`, `description8`, `day9`, `name9`, `image9`, `description9`, `day10`, `name10`, `image10`, `description10`, `day11`, `name11`, `image11`, `description11`, `day12`, `name12`, `image12`, `description12`) VALUES
(54, '33', NULL, 'Discover amazing places of the Varansi with us', '10000', 'assi-ghat.jpg', 'Varanasi', '6 days', 'assi-ghat.jpg', 'ASSI GHAT', 'Assi Ghat is the southernmost ghat in Varanasi. It is one of the biggest ghats of Varanasi and most popular one', 'manali.jpg', 'DASHASHWAMEDH GHAT', 'Dashashwamedh Ghat is a main ghat in Varanasi located on the Ganges River in Uttar Pradesh. It is located close to Vishwanath Temple.', 'Ghats-1-1024x584.jpg', 'MANIKARNIKA GHAT', 'The Manikarnika Ghat is one of the oldest ghats in Varanasi. It is mentioned in a Gupta inscription of 5th century.', 'panchganga-ghat-varanasi.jpg', 'PANCHGANGA GHAT', 'Panchganga ghat is believed to be the meeting point of five rivers Ganga, Yamuna, Saraswati, Kiran, and Dhutapapa.', 'SARNATH.webp', 'SARNATH', 'Located only about 70 metres (230 feet) to the southwest of the Dhamek Stupa, this temple is dedicated to Shreyansanatha.', 'ramnagar-fort.jpg', 'RAMNAGAR-FORT', 'The Ramnagar Fort is a fortification in Ramnagar. It is located near the Ganges on its eastern bank, opposite to the Tulsi Ghat.', 'Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `admin_role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`, `admin_role`) VALUES
(1, 'ayush', '737', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` int(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `image` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `name`, `image`) VALUES
(31, 'Hill Station', 'carousel-3.jpg'),
(32, 'Beach Destination', 'beach destination.jpg'),
(33, 'Pilgrimage Places', 'pexels-rajesh-s-balouria-15017640.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL,
  `show_feedback` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_booking`
--

CREATE TABLE `package_booking` (
  `p_id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `select_package` varchar(50) NOT NULL,
  `adults` int(30) NOT NULL,
  `child` int(30) NOT NULL,
  `room` varchar(300) NOT NULL,
  `service` varchar(111) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `approve_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `querry`
--

CREATE TABLE `querry` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address` varchar(111) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `mobile`, `address`, `password`) VALUES
(1, 'manav', 'manavchauhanmaths@gmail.com', '0', '', '$2y$10$Ug4rmy1mdpZuBPFhs217h.iqKhy9//7RiFVD.1IZDp8'),
(2, 'manav2', 'manavchauhanbio@gmail.com', '0', '', '$2y$10$Te104Ey3E35OeYh8wp7PMOUcaER5KA/IacoBLwz96l/'),
(3, 'manav', 'manavchauhan@gmail.com', '0', '', '$2y$10$XD4liqE0PVbibRaGG03hKupyMKfUJ.YDWr/PmX05u0p'),
(4, 'realmanav', 'manavchauhantry@gmail.com', '0', '', '$2y$10$shxmhReynhJrM0CBFIIiyuelqeH6Y.6bNksuZDQ5TxE'),
(5, 'name', 'huj@g.c', '0', '', '$2y$10$DuY7FDzyimpdI4BK4hAsJOnQsDLwBkj3Q9TpZFr5e7g'),
(6, 'final', 'final@gmail.com', '9887377373', '454516', '$2y$10$5NTBqVBvrL6nAnAYyJ0IGelQQpc9YbJ2GGC9jIqt5YIotBEy7IfMi'),
(7, 'ishu', 'milindgaba1714@gmail.com', '0', '', '$2y$10$IHolQ51FRyDTMPPzE15JOuiw1qV67mKhroLQAFWXdZ7WCvLWAukdS'),
(8, 'manav', 'a@g.c', '0', '', '$2y$10$MleH0UNYBathNtV16r5kae6Trg2nJ0rbwIygBcML.U/lD0oac5N7e'),
(9, 'manav', 'ay2111200@gmail.com', '0', '', '$2y$10$EJUIA7T9Uf8LFEmfLssU/uCL4vv4Qmy7uaNbzzI.ogoQq3xvDiAsq'),
(10, 'manav', 'ay211120@gmail.com', '0', '', '$2y$10$Hqbv9p3KhcZgLdnIStYLTuOczbYBAfaCAl2Chf.reQim5prcE3JIa'),
(11, 'kuldeep', 'ay211123@gmail.com', '0', '', '$2y$10$nJHSXO5cEdLRPReZuECrqu9RO3JiWWc.cCF4.NZFH0vjOHe0ng6Wa'),
(12, 'manav', 'ay211120031@gmail.com', '0', '', '$2y$10$4kTO6lrJSzkev3slc3hAnO.oaRkrNN5pQpluggBssPHQKcJnPwz1K'),
(13, 'kuldeep', 'ay21112003y@gmail.com', '0', '', '$2y$10$ygmoLcOlqpUVaIogjg65HOz/iVX6MgTWYlwcG8nng6WV.tyVnM16W'),
(14, 'ds', 'sds@gmail.com', '0', '', '$2y$10$vXq7p5ckQD5hg.b4WKYA5.j3LW/ZrHx19uC1Yaj3Xt69Rf3DUjLyW'),
(15, 'Ayush Yadav', 'ay21112003@gmail.com', '07376468331', 'Hari Om Nagar Colony', '$2y$10$5tvm4N/qWRS6hzfmUnCw7OU9g6PwDBpQZTs9.iiXOIf.890gybOZm');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(111) NOT NULL,
  `image` varchar(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `bed` varchar(111) NOT NULL,
  `bathroom` varchar(111) NOT NULL,
  `description` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_package`
--
ALTER TABLE `add_package`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `package_booking`
--
ALTER TABLE `package_booking`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `querry`
--
ALTER TABLE `querry`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_package`
--
ALTER TABLE `add_package`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `package_booking`
--
ALTER TABLE `package_booking`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `querry`
--
ALTER TABLE `querry`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
