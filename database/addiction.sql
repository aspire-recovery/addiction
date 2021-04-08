-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 03:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

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
  `message` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `pwd_reset`
--

CREATE TABLE `pwd_reset` (
  `reset_id` int(7) NOT NULL,
  `reset_link_token` text NOT NULL,
  `exp_date` datetime NOT NULL,
  `reset_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(5) NOT NULL,
  `thread_desc` text CHARACTER SET utf8 NOT NULL,
  `thread_title` varchar(200) NOT NULL,
  `user_id` int(5) NOT NULL,
  `c_id` int(7) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_desc`, `thread_title`, `user_id`, `c_id`, `created_at`) VALUES
(1, 'Welcome to Prey. A lot of this game is going to feel familiar ? you?ll see bits and pieces from a dozen well-loved games in its DNA. But that doesn?t mean you?re going to immediately understand how everything works. That?s what we?re here for. Let?s talk about some of the habits you?re going to have to pick up, concepts you?ll have to learn and choices you?re going to be making as you play.\r\n\r\n', 'Which movie have you watched most recently?\r\n', 2, 1, '2021-03-10 23:53:07'),
(17, '<p>I,M her fan</p>', 'Taneshow fanart!', 2, 2, '2021-03-10 23:53:07'),
(18, '<p>Enter Your Thread Here.</p>', 'jjjj', 2, 1, '2021-03-10 23:53:07'),
(19, '<p>saueor</p>', 'Your world, your enemies (and ways to kill them) and yourself.', 2, 1, '2021-03-10 23:53:07'),
(20, '<p>Enter Your Thread Here.</p>', 'Taneshow fanart!', 2, 1, '2021-03-10 23:53:07'),
(21, '<p>Enter Your Thread Here.</p>', 'Taneshow fanart!', 2, 1, '2021-03-10 23:53:07'),
(22, '<p>Enter Your Thread Here.#</p>', 'jjjj', 2, 1, '2021-03-10 23:53:07'),
(23, '<p>Enter Your Thread Here.</p>', 'ghcjgh', 2, 2, '2021-04-03 18:47:31');

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
(2, 1, 'Dhruvit', '9825183134', 'allinoneguruji3@gmail.com', 0, 'male', '2021-03-07 22:26:42', '81dc9bdb52d04dc20036dbd8313ed055');

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
-- Indexes for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `psy_id` (`user_id`);

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
  MODIFY `reply_id` int(5) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  MODIFY `reset_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum_reply`
--
ALTER TABLE `forum_reply`
  ADD CONSTRAINT `forum_reply_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `forum_categories` (`cat_id`),
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
