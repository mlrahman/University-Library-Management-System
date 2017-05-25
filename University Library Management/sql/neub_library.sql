-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2016 at 08:45 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `neub_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `sys_lib_admin`
--

CREATE TABLE IF NOT EXISTS `sys_lib_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `neub_id_no` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sys_lib_admin`
--

INSERT INTO `sys_lib_admin` (`admin_id`, `username`, `password`, `name`, `email`, `neub_id_no`, `picture`, `status`, `contact`) VALUES
(1, 'mir', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Mir Lutfur Rahman', 'mirlutfur.rahman@gmail.com', '140203020002', 'ni.jpg', 'active', '01739213886'),
(2, 'neub', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'North East University', 'neub.edu.bd', '123456789', 'ni.jpg', 'active', '01234567891');

-- --------------------------------------------------------

--
-- Table structure for table `sys_lib_book`
--

CREATE TABLE IF NOT EXISTS `sys_lib_book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sys_lib_book`
--

INSERT INTO `sys_lib_book` (`book_id`, `book_name`, `writer`, `dept_id`, `status`) VALUES
(1, 'Fundamentals of Computer', 'Peter Norton', 1, 'active'),
(2, 'Programming with C', 'Byron S. Gottfried', 1, 'active'),
(3, 'Principles of Economics', 'Alfred Marshall', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sys_lib_books_taken`
--

CREATE TABLE IF NOT EXISTS `sys_lib_books_taken` (
  `take_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `book_det_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `taken_time` varchar(255) NOT NULL,
  `taken_date` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`take_id`),
  KEY `admin_id` (`admin_id`),
  KEY `book_det_id` (`book_det_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sys_lib_books_taken`
--

INSERT INTO `sys_lib_books_taken` (`take_id`, `admin_id`, `book_det_id`, `user_id`, `taken_time`, `taken_date`, `status`, `time`) VALUES
(5, 1, 1, 2, '', '13/08/2016', 'active', '0 months, 0 days.'),
(6, 1, 2, 3, '', '13/08/2016', 'active', '0 months, 0 days.'),
(7, 1, 3, 2, '', '13/08/2016', 'active', '0 months, 0 days.'),
(8, 1, 4, 5, '', '13/08/2016', 'active', '0 months, 0 days.'),
(9, 1, 3, 4, '', '13/08/2016', 'inactive', '');

-- --------------------------------------------------------

--
-- Table structure for table `sys_lib_book_det`
--

CREATE TABLE IF NOT EXISTS `sys_lib_book_det` (
  `book_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_code` varchar(255) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive','destroy') NOT NULL,
  PRIMARY KEY (`book_det_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_lib_book_det`
--

INSERT INTO `sys_lib_book_det` (`book_det_id`, `book_code`, `book_id`, `status`) VALUES
(1, '5501', 1, 'active'),
(2, '5502', 1, 'active'),
(3, '6601', 2, 'inactive'),
(4, '6602', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sys_lib_comment`
--

CREATE TABLE IF NOT EXISTS `sys_lib_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `neub_id_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_lib_comment`
--

INSERT INTO `sys_lib_comment` (`comment_id`, `name`, `neub_id_no`, `email`, `comment`, `status`, `time`, `date`) VALUES
(4, 'Mir', '140203020002', 'mir@gmail.com', 'Post Your Comment...sbaadg', 'active', '02:21 am', '13 Aug 2016');

-- --------------------------------------------------------

--
-- Table structure for table `sys_lib_department`
--

CREATE TABLE IF NOT EXISTS `sys_lib_department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_title` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sys_lib_department`
--

INSERT INTO `sys_lib_department` (`dept_id`, `dept_title`, `status`) VALUES
(1, 'Computer Science & Engineering', 'active'),
(2, 'Business Administration', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sys_lib_user`
--

CREATE TABLE IF NOT EXISTS `sys_lib_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `category` enum('Under Graduate Student','Graduate Student','Full Time Faculty','Part Time Faculty','BOT Member','Officer','Others') NOT NULL,
  `designation` varchar(255) NOT NULL,
  `neub_id_no` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `present_address` varchar(1000) NOT NULL,
  `permanent_address` varchar(1000) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `join_time` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sys_lib_user`
--

INSERT INTO `sys_lib_user` (`user_id`, `dept_id`, `name`, `f_name`, `m_name`, `category`, `designation`, `neub_id_no`, `picture`, `present_address`, `permanent_address`, `contact`, `email`, `join_date`, `join_time`, `status`) VALUES
(1, 1, 'Topu Dash Roy', 'Anil Dash Roy', 'Roma Dash Roy', 'Under Graduate Student', 'BSc (Engg.) in CSE', '140203020005', 'ni.jpg', 'Biswanath', 'Biswanath', '01752692526', 'topu.cse05@gmail.com', '11 Apr 2016', '2:38 pm', 'active'),
(2, 1, 'Mir Lutfur Rahman', 'Mir Abdul Latif', 'Beauty Begum', 'Under Graduate Student', 'BSc (Engg.) in CSE.', '140203020002', 'ni.jpg', 'Sylhet', 'Sylhet', '01739213886', 'mirlutfur.rahman@gmail.com', '11 Apr 2016', '3:19 pm', 'active'),
(3, 1, 'Pranta Sarker', 'F_Pranta', 'M_Pranta', 'Under Graduate Student', 'BSc (Engg.) in CSE.', '140203020004', 'ni.jpg', 'Sylhet', 'Sylhet', '01234567890', 'psarker@gmail.com', '11 Apr 2016', '3:30 pm', 'active'),
(4, 1, 'Rubina Begum', 'F_Rubina', 'M_Rubina', 'Under Graduate Student', 'BSc (Engg.) in CSE.', '140203020010', 'ni.jpg', 'Sylhet', 'Sylhet', '01234567890', 'rubina@gmail.com', '11 Apr 2016', '3:32 pm', 'active'),
(5, 1, 'Rocksar Sultana Smriti', 'F_Rocksar', 'M_Rocksar', 'Under Graduate Student', 'BSc (Engg.) in CSE.', '140203020003', 'ni.jpg', 'Sylhet', 'Sylhet', '01234567890', 'rocksar@gmail.com', '11 Apr 2016', '3:37 pm', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sys_lib_book`
--
ALTER TABLE `sys_lib_book`
  ADD CONSTRAINT `sys_lib_book_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `sys_lib_department` (`dept_id`);

--
-- Constraints for table `sys_lib_books_taken`
--
ALTER TABLE `sys_lib_books_taken`
  ADD CONSTRAINT `sys_lib_books_taken_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `sys_lib_admin` (`admin_id`),
  ADD CONSTRAINT `sys_lib_books_taken_ibfk_2` FOREIGN KEY (`book_det_id`) REFERENCES `sys_lib_book_det` (`book_det_id`),
  ADD CONSTRAINT `sys_lib_books_taken_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `sys_lib_user` (`user_id`);

--
-- Constraints for table `sys_lib_book_det`
--
ALTER TABLE `sys_lib_book_det`
  ADD CONSTRAINT `sys_lib_book_det_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `sys_lib_book` (`book_id`);

--
-- Constraints for table `sys_lib_user`
--
ALTER TABLE `sys_lib_user`
  ADD CONSTRAINT `sys_lib_user_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `sys_lib_department` (`dept_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
