-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 12:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addiction`
--

-- --------------------------------------------------------

--
-- Table structure for table `addiction_types`
--

CREATE TABLE `addiction_types` (
  `add_id` int(5) NOT NULL,
  `add_name` varchar(50) NOT NULL,
  `add_desp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addiction_types`
--

INSERT INTO `addiction_types` (`add_id`, `add_name`, `add_desp`) VALUES
(1, 'Chemical addiction', ' This refers to addiction that involves the use of substances.'),
(2, 'Behavioral addiction', 'This refers to addiction that involves compulsive behaviors. These are persistent, repeated behaviors that you carry out even if they don’t offer any real benefit.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(5) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Alok Rathava', 'alokrathava@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `cat_id` int(7) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`cat_id`, `cat_name`, `cat_desc`, `created_at`) VALUES
(1, 'Alcohol', 'Alcoholism affects people of any race, sex, and socioeconomic background. Read more on how to treat it.', '2021-03-08 18:25:49'),
(2, 'cocaine', 'A Directory of De-addiction helpline across India and rehab center to quit smoking ,alcohol or any such substance.\r\n', '2021-03-08 18:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `forum_reply`
--

CREATE TABLE `forum_reply` (
  `reply_id` int(5) NOT NULL,
  `fu_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_reply`
--

INSERT INTO `forum_reply` (`reply_id`, `fu_id`, `u_id`, `message`, `created_at`) VALUES
(8, 1, 3, '<p>khkjh</p>', '2021-03-17 00:06:47'),
(9, 1, 3, '<h3>vdjdncvncvfrf</h3>\r\n<blockquote>\r\n<p style=\"text-align: center;\"><em><strong>jlkgbkhbkj,h</strong></em></p>\r\n</blockquote>', '2021-03-17 15:41:03'),
(10, 1, 3, '<h3>vdjdncvncvfrf</h3>\r\n<blockquote>\r\n<p style=\"text-align: center;\"><em><strong>jlkgbkhbkj,h</strong></em></p>\r\n</blockquote>', '2021-03-17 15:42:14'),
(11, 1, 3, '<p>fh;dfbm;l</p>', '2021-03-17 16:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `total` int(7) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `cart_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physcho`
--

CREATE TABLE `physcho` (
  `psy_id` int(5) NOT NULL,
  `psy_name` varchar(30) NOT NULL,
  `psy_contact` varchar(10) NOT NULL,
  `psy_email` varchar(50) NOT NULL,
  `psy_qualification` varchar(255) NOT NULL,
  `psy_bio` varchar(255) NOT NULL,
  `psy_gender` tinyint(1) NOT NULL,
  `psy_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(5) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_price` int(10) NOT NULL,
  `pdt_category` int(5) NOT NULL,
  `p_quantity` int(5) NOT NULL,
  `p_description` varchar(200) NOT NULL,
  `p_created` datetime NOT NULL DEFAULT current_timestamp(),
  `p_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `pdt_id` int(5) NOT NULL,
  `pdt_name` varchar(100) NOT NULL,
  `pdt_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `payment_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(5) NOT NULL,
  `addiction_id` int(5) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_contact` varchar(10) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_status` int(2) DEFAULT NULL,
  `u_gender` varchar(10) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp(),
  `u_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `addiction_id`, `u_name`, `u_contact`, `u_email`, `u_status`, `u_gender`, `r_date`, `u_password`) VALUES
(1, 0, 'Alok Rathava', '9512334819', 'alokrathava@gmail.com', 0, 'male', '2021-03-06 21:42:21', '21232f297a57a5a743894a0e4a801fc3'),
(2, 1, 'Dhruvit', '9825183134', 'allinoneguruji3@gmail.com', 0, 'male', '2021-03-07 22:26:42', '5d41402abc4b2a76b9719d911017c592'),
(3, 2, 'Dhruvit', '9825183134', 'allinoneguruji3@gmail.com', 0, 'male', '2021-03-16 12:55:48', '5d41402abc4b2a76b9719d911017c592');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addiction_types`
--
ALTER TABLE `addiction_types`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `forum_reply`
--
ALTER TABLE `forum_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `fu_id` (`fu_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `physcho`
--
ALTER TABLE `physcho`
  ADD PRIMARY KEY (`psy_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`pdt_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addiction_types`
--
ALTER TABLE `addiction_types`
  MODIFY `add_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `cat_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_reply`
--
ALTER TABLE `forum_reply`
  MODIFY `reply_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physcho`
--
ALTER TABLE `physcho`
  MODIFY `psy_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `pdt_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum_reply`
--
ALTER TABLE `forum_reply`
  ADD CONSTRAINT `forum_reply_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `forum_reply_ibfk_3` FOREIGN KEY (`fu_id`) REFERENCES `threads` (`thread_id`),
  ADD CONSTRAINT `forum_reply_ibfk_4` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
