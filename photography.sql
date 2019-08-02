-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 10:32 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `accinfo`
--

CREATE TABLE `accinfo` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bio` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accinfo`
--

INSERT INTO `accinfo` (`id`, `username`, `password`, `email`, `reg_date`, `bio`) VALUES
(1, 'Siddharth', '12345', '', '2019-08-02 20:11:53', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `content` longtext NOT NULL,
  `username` varchar(200) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likes` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `src` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`content`, `username`, `reg_date`, `likes`, `id`, `src`, `description`, `title`) VALUES
(' jagmnc shbvxjcvbskjdbjhbvjdcbvdjfbvhdfbvdfhbvfhvbdhfvbdfhvbfhvbfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhvdfkjbvdfjbvdfjbvjhvbjhvbajfhbvjfhbvadfhv', 'ajay', '2019-07-31 09:23:47', '', 4, '', 'this is second ', 'title11'),
('asasasas', 'kiran', '2019-08-02 06:42:17', '', 7, 'ImageUploads/hover.PNG', 'sas', 'dinner'),
('asasasas', 'kiran', '2019-08-02 06:42:39', '', 8, 'ImageUploads/hover.PNG', 'sas', 'dinner'),
('sdasdasdasdasd', 'kiran', '2019-08-02 06:43:00', '', 9, 'ImageUploads/hover.PNG', 'asdasdasd', 'adasd'),
('sdasdasdasdasd', 'kiran', '2019-08-02 06:43:48', '', 10, 'ImageUploads/hover.PNG', 'asdasdasd', 'adasd'),
('asdfghjkjhgfds', 'kiran', '2019-08-02 06:44:58', '', 12, 'ImageUploads/', 'sas', 'dinner');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comments`, `file`, `type`, `reg_date`) VALUES
(1, 'Kiran', 'this is in0ok-losksosksokkssksso', '13', 'images', '2019-08-02 15:59:42'),
(2, 'Kiran', 'sisd ther', '13', 'images', '2019-08-02 19:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `src` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `upvote` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `title`, `src`, `description`, `upvote`, `username`, `reg_date`) VALUES
(1, 'first', 'FileUploads/Task 2', 'Trying to get', 'kiran,ashok,ajay', 'kiran', '2019-07-30 11:33:23'),
(2, 'second', 'FileUploads/Task3 (1)', 'second checking', 'ajay', 'ashok', '2019-07-30 11:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `src` varchar(50) NOT NULL,
  `likes` varchar(1000) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `username`, `src`, `likes`, `caption`, `reg_date`) VALUES
(2, 'ajay', 'ImageUploads/photo1.jpg', ',kiran', 'asdff', '2019-07-30 09:34:28'),
(5, 'kiran', 'ImageUploads/photo2.jpg', 'ashok', 'aassssdddd', '2019-07-31 09:21:05'),
(6, 'ashok', 'ImageUploads/photo3.jpg', 'ashok,kiran', 'aqqweqwe', '2019-08-02 19:01:52'),
(13, 'kiran', 'Imageuploads/hover.PNG', '', 'dasdasd', '2019-07-30 09:38:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accinfo`
--
ALTER TABLE `accinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accinfo`
--
ALTER TABLE `accinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
