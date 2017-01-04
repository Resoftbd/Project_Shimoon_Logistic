-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 05:45 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shimoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` text NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_photo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_name`, `admin_email`, `admin_password`, `admin_photo`) VALUES
(1, 'admin', 'aoyan', 'fsdffgfd@fgdf.dtgdt', '25d55ad283aa400af464c76d713c07ad', 'assets/upload/photo/9038586d306197f2b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_name` text CHARACTER SET utf8 NOT NULL,
  `inbox_email` text NOT NULL,
  `inbox_message` text CHARACTER SET utf8 NOT NULL,
  `inbox_date` date NOT NULL,
  `inbox_seen` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `settings_copyright` text NOT NULL,
  `settings_logo` text NOT NULL,
  `settings_icon` text NOT NULL,
  `settings_title` text NOT NULL,
  `settings_phone` text NOT NULL,
  `settings_address` text NOT NULL,
  `settings_email` text NOT NULL,
  `settings_facebook` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_copyright`, `settings_logo`, `settings_icon`, `settings_title`, `settings_phone`, `settings_address`, `settings_email`, `settings_facebook`) VALUES
(1, '', 'assets/upload/photo/26926586d2987a1139.JPG', 'assets/upload/photo/31951586d2987a12d8.JPG', 'Shimoon Logistics', 'sagsg', 'sdgsrg', 'srrgsrg', 'srgwsg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
