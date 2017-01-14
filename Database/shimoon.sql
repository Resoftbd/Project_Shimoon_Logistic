-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 05:27 PM
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
(1, 'admin', 'aoyan', 'fsdffgfd@fgdf.dtgdt', '25d55ad283aa400af464c76d713c07ad', 'assets/upload/photo/166745874bc83318b5.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_details` text NOT NULL,
  `customer_photo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_details`, `customer_photo`) VALUES
(2, 'rwtt aaaa', 'wertrdfd fff', 'assets/upload/customer/322235879175f5143d.jpg'),
(3, 'dfdsaf', 'dsfdsf', 'assets/upload/customer/217745879176d02fae.png'),
(4, 'sdfd', 'dsfdsf', 'assets/upload/customer/148925879177a89717.jpg'),
(6, 'hghfgh', 'fghfghf', 'assets/upload/customer/115555879c7b66052c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `home_name` text NOT NULL,
  `home_details` text NOT NULL,
  `home_photo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inbox_id`, `inbox_name`, `inbox_email`, `inbox_message`, `inbox_date`, `inbox_seen`) VALUES
(1, 'tyhrfty', 'tyt@rtrt.dtge', 'ertet', '2017-01-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `pages_name` text NOT NULL,
  `pages_details` text NOT NULL,
  `pages_photo_1` text NOT NULL,
  `pages_photo_2` text NOT NULL,
  `pages_photo_3` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `pages_name`, `pages_details`, `pages_photo_1`, `pages_photo_2`, `pages_photo_3`) VALUES
(1, 'About Us', '<p style="text-align: left;"><br /><img style="display: block; margin-left: auto; margin-right: auto;" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT3FoO88IRmhRvU8Mahum8aE3b3K7HXJMSBAFnbnG8hEGVrFELf" alt="" width="300" height="168" /></p>\r\n<p style="text-align: center;">Dekhi ki hoy</p>', 'assets/upload/photo/114525873c7e121969.jpg', 'assets/upload/photo/10935873c7e121acf.png', 'assets/upload/photo/202815874bacb18a5d.jpg'),
(2, 'Supply Chain Solution', '<p>sdfsdf ghfghf uppppppppppppppppppppppppp</p>', 'assets/upload/photo/38215874babd0228c.jpg', 'assets/upload/photo/72185873cdecd6f0b.jpg', 'assets/upload/photo/63215873ce083ec76.jpg'),
(3, 'Freights', 'ut', 'tu', 'ui', 'ui');

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

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `slideshow_id` int(11) NOT NULL,
  `slideshow_name` text NOT NULL,
  `slideshow_photo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideshow_id`, `slideshow_name`, `slideshow_photo`) VALUES
(5, '2', 'assets/upload/slide/285665879d28d39f31.jpg'),
(4, '1', 'assets/upload/slide/242415879d27d9baee.jpg'),
(8, '5', 'assets/upload/slide/101595879d2ad474ed.jpg'),
(9, '6', 'assets/upload/slide/48055879d2bd511aa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`slideshow_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `slideshow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
