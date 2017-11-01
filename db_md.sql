-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 06:59 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_md`
--

-- --------------------------------------------------------

--
-- Table structure for table `md_admin`
--

CREATE TABLE `md_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_mail` varchar(40) NOT NULL,
  `admin_pass` varchar(40) NOT NULL,
  `admin_cell` varchar(20) NOT NULL,
  `admin_address` varchar(20) NOT NULL,
  `admin_post` varchar(20) NOT NULL,
  `admin_image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `md_admin`
--

INSERT INTO `md_admin` (`admin_id`, `admin_name`, `admin_mail`, `admin_pass`, `admin_cell`, `admin_address`, `admin_post`, `admin_image`) VALUES
(6, 'Mehedi Hassan Sunny', 'sunny@gmail.com', '533c5ba8368075db8f6ef201546bd71a', '01677777777', 'Dhaka', 'sub-admin', 'uploads/customer_login.png'),
(12, 'Mehedi Hassan', 'sub@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '016777777777', 'dhaka', 'super-admin', 'fsf'),
(7, 'Zarin Tasnim', 'mou@gmail.com', '533c5ba8368075db8f6ef201546bd71a', '01777777777', 'Dhaka', 'site-man', 'd'),
(9, 'fuad', 'fuad@gmail.com', '533c5ba8368075db8f6ef201546bd71a', '01666666666', 'Dhaka', 'site-man', 'd'),
(13, 'sunny', 'sun@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01666666666', 'Dhaka', 'sub-admin', 'uploads/customer_login.png');

-- --------------------------------------------------------

--
-- Table structure for table `md_advertise`
--

CREATE TABLE `md_advertise` (
  `id` int(10) NOT NULL,
  `company` varchar(40) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `md_advertise`
--

INSERT INTO `md_advertise` (`id`, `company`, `url`, `status`, `image`) VALUES
(18, 'mak', 'http://www.ggugu.com', 'Visible', 'uploads/18253829_693699187468923_1507722001_n.png'),
(17, 'Sun', 'http://www.ggugu.com', 'Visible', 'uploads/18217526_693699464135562_2016198801_n.png'),
(16, 'mak holdings', 'http://www.ggugu.com', 'Visible', 'e'),
(19, 'ygyy', 'http://www.ggugu.com', 'Hide', 'uploads/images.jpg'),
(14, 'mak holdings', 'http://www.ggugu.com', 'Visible', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `md_category`
--

CREATE TABLE `md_category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(40) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `md_category`
--

INSERT INTO `md_category` (`cat_id`, `cat_name`, `user_id`) VALUES
(1, 'Samsung', 3),
(2, 'Asus 123', 8);

-- --------------------------------------------------------

--
-- Table structure for table `md_msg`
--

CREATE TABLE `md_msg` (
  `id` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `md_msg`
--

INSERT INTO `md_msg` (`id`, `name`, `email`, `subject`, `message`) VALUES
(21, 'sunny', 'sun@gmail.com', 'gjg', 'xgdtf'),
(19, '', '', '', ''),
(18, '', '', '', ''),
(17, 'jftf', 'vv', 'vdj', 'kdvh');

-- --------------------------------------------------------

--
-- Table structure for table `md_product`
--

CREATE TABLE `md_product` (
  `p_id` int(10) NOT NULL,
  `p_model` varchar(40) NOT NULL,
  `p_cat` varchar(40) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_warranty` varchar(20) NOT NULL,
  `p_area` varchar(100) NOT NULL,
  `p_quantity` int(10) NOT NULL,
  `p_desc` text NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `md_product`
--

INSERT INTO `md_product` (`p_id`, `p_model`, `p_cat`, `p_price`, `p_warranty`, `p_area`, `p_quantity`, `p_desc`, `p_image`, `user_id`) VALUES
(1, 'eefe41', 'Samsung', 4500, '4years ', 'Dhaka', 85, '', 'gg', 0),
(2, 'eefe41', '', 4500, '4years ', 'Dhaka', 85, 'dduguwuw', 'gg', 0),
(3, 'eefe41', '', 4500, '4years ', 'Dhaka', 85, 'dduguwuw', 'gg', 0),
(4, 'Asus102', 'Samsung', 4500, '4 years 8 days', 'Dhaka', 5, 'Mobile Phone', 'gg', 3),
(5, 'Samsung j7', '', 4500, '4years', 'Dhaka', 5, 'sefegrgr', 'gg', 3),
(7, 'Nokia 104', '', 4500, '4years', 'Dhaka', 5, 'vyfyfy', 'uploads/18217526_693699464135562_2016198801_n.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `md_user`
--

CREATE TABLE `md_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_mail` varchar(40) NOT NULL,
  `user_pass` varchar(40) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `md_user`
--

INSERT INTO `md_user` (`user_id`, `user_name`, `user_mail`, `user_pass`, `user_phone`, `user_address`, `user_type`, `user_image`) VALUES
(3, 'Mehedi', 'mehedi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01677777777', 'Dhaka', 'dealer', 'uploads/18217526_693699464135562_2016198801_n.png'),
(7, 'Sunny', 'oldcell@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01677777777', 'Rangpur', 'old-cell-seller', 'uploads/18217526_693699464135562_2016198801_n.png'),
(6, 'Sunny', 'newcell@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01677777777', 'Rangpur', 'new-cell-seller', 'uploads/images.jpg'),
(8, 'Sunny', 'sun@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01677777777', 'Dhaka', 'dealer', 'dee'),
(9, 'sunny', 'someone@gmail.com', '533c5ba8368075db8f6ef201546bd71a', '01666666666', 'ctg', 'old-cell-seller', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `md_user_product`
--

CREATE TABLE `md_user_product` (
  `p_id` int(10) NOT NULL,
  `p_model` varchar(40) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_user_price` int(10) NOT NULL,
  `used` varchar(40) NOT NULL,
  `p_warranty` varchar(40) NOT NULL,
  `p_area` varchar(40) NOT NULL,
  `p_desc` text NOT NULL,
  `type` varchar(40) NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `md_user_product`
--

INSERT INTO `md_user_product` (`p_id`, `p_model`, `p_price`, `p_user_price`, `used`, `p_warranty`, `p_area`, `p_desc`, `type`, `p_image`, `user_id`) VALUES
(7, 'Xiomi 147', 4500, 4000, '4months', '4years', 'Dhaka', 'deee', 'old', 'uploads/18253829_693699187468923_1507722001_n.png', 7),
(2, 'Xiomi 141', 4500, 4000, '4months', '4years', 'bar', 'hvhvuj', 'old', 'uploads/16807355_1183291261788450_4906318787602779900_n.jpg', 6),
(3, 'dfdg', 4500, 40001, 'none', '4years', 'bar', 'vuu', 'new', 'uploads/16807355_1183291261788450_4906318787602779900_n.jpg', 7),
(4, 'Samsung j7', 25000, 20000, '4months', '4years', 'bar', 'dtyuu', 'old', 'uploads/images.jpg', 7),
(5, 'Asus102', 25000, 20000, 'none', '4 years 8 days', 'bar', 'Some description', 'new', 'uploads/images.jpg', 6),
(6, 'Samsung j7', 25000, 20000, 'none', '4years', 'bar', 'fghj', 'new', 'uploads/16807355_1183291261788450_4906318787602779900_n.jpg', 6),
(8, 'Nokia 104', 45000, 20000, 'none', '4years', 'khl', 'phone', 'new', 'uploads/images.jpg', 6),
(9, 'Nokia 104', 4500, 4000, 'none', '4years', 'khl', 'vgfc', 'new', 'uploads/18217526_693699464135562_2016198801_n.png', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `md_admin`
--
ALTER TABLE `md_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `md_advertise`
--
ALTER TABLE `md_advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_category`
--
ALTER TABLE `md_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `md_msg`
--
ALTER TABLE `md_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_product`
--
ALTER TABLE `md_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `md_user`
--
ALTER TABLE `md_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `md_user_product`
--
ALTER TABLE `md_user_product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `md_admin`
--
ALTER TABLE `md_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `md_advertise`
--
ALTER TABLE `md_advertise`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `md_category`
--
ALTER TABLE `md_category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `md_msg`
--
ALTER TABLE `md_msg`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `md_product`
--
ALTER TABLE `md_product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `md_user`
--
ALTER TABLE `md_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `md_user_product`
--
ALTER TABLE `md_user_product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
