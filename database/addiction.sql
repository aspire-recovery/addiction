-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 08:12 AM
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
(1, 'Alok Rathava', 'alokrathava@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Dhruvit Salat', 'allinoneguruji3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_schedule_id` int(11) NOT NULL,
  `appointment_number` int(11) NOT NULL,
  `reason_for_appointment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `patient_come_into_hospital` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL,
  `doctor_comment` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`appointment_id`, `doctor_id`, `patient_id`, `doctor_schedule_id`, `appointment_number`, `reason_for_appointment`, `appointment_time`, `status`, `patient_come_into_hospital`, `doctor_comment`) VALUES
(3, 4, 1, 2, 1000, 'Pain in Stomach', '09:00:00', 'Cancel', 'No', ''),
(4, 4, 2, 2, 1001, 'Paint in stomach', '09:00:00', 'Booked', 'No', ''),
(5, 1, 1, 2, 1002, 'For Delivery', '09:30:00', 'Completed', 'Yes', 'She gave birth to boy baby.'),
(6, 5, 1, 7, 1003, 'Fever and cold.', '18:00:00', 'In Process', 'Yes', ''),
(7, 6, 0, 13, 1004, 'Pain in Stomach.', '15:30:00', 'Completed', 'Yes', 'Acidity Problem. '),
(8, 4, 2, 15, 1005, 'my marji\r\n', '12:55:00', 'Cancel', 'No', ''),
(9, 4, 2, 16, 1006, 'mm', '05:30:00', 'Cancel', 'No', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule_table`
--

CREATE TABLE `doctor_schedule_table` (
  `doctor_schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_schedule_date` date NOT NULL,
  `doctor_schedule_day` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') COLLATE utf8_unicode_ci NOT NULL,
  `doctor_schedule_start_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_schedule_end_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `average_consulting_time` int(5) NOT NULL,
  `doctor_schedule_status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_schedule_table`
--

INSERT INTO `doctor_schedule_table` (`doctor_schedule_id`, `doctor_id`, `doctor_schedule_date`, `doctor_schedule_day`, `doctor_schedule_start_time`, `doctor_schedule_end_time`, `average_consulting_time`, `doctor_schedule_status`) VALUES
(2, 1, '2021-02-19', 'Friday', '09:00', '14:00', 15, 'Active'),
(3, 2, '2021-02-19', 'Friday', '09:00', '12:00', 15, 'Active'),
(4, 5, '2021-02-19', 'Friday', '10:00', '14:00', 10, 'Active'),
(5, 3, '2021-02-19', 'Friday', '13:00', '17:00', 20, 'Active'),
(6, 4, '2021-02-19', 'Friday', '15:00', '18:00', 5, 'Active'),
(7, 5, '2021-02-22', 'Monday', '18:00', '20:00', 10, 'Active'),
(8, 2, '2021-02-24', 'Wednesday', '09:30', '12:30', 10, 'Active'),
(9, 5, '2021-02-24', 'Wednesday', '11:00', '15:00', 10, 'Active'),
(10, 1, '2021-02-24', 'Wednesday', '12:00', '15:00', 10, 'Active'),
(11, 3, '2021-02-24', 'Wednesday', '14:00', '17:00', 15, 'Active'),
(12, 4, '2021-02-24', 'Wednesday', '16:00', '20:00', 10, 'Active'),
(13, 6, '2021-02-24', 'Wednesday', '15:30', '18:30', 10, 'Active'),
(14, 6, '2021-02-25', 'Thursday', '10:00', '13:30', 10, 'Active'),
(15, 4, '2021-04-15', 'Thursday', '12:55', '13:00', 60, 'Active'),
(16, 4, '2021-04-15', 'Thursday', '1:00am', '1:30am', 30, 'Active');

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

--
-- Dumping data for table `forum_reply`
--

INSERT INTO `forum_reply` (`reply_id`, `fu_id`, `u_id`, `message`, `created_at`) VALUES
(1, 1, 2, '<p>;xbkdxm;k</p>', '2021-04-06 20:10:50'),
(2, 17, 2, '<p>hdfh</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2021-04-06 20:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `total` int(7) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `u_id`, `total`, `order_time`, `address`, `email`, `phone`, `state`, `city`, `zip`, `status`) VALUES
(2, 2, 799, '2021-04-28 19:35:52', '542 W. street', 'allinoneguruji3@gmail.com', 2147483647, 'NY', 'New York', 10001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `psy_bio` text NOT NULL,
  `psy_gender` tinyint(1) NOT NULL,
  `psy_password` varchar(100) NOT NULL,
  `psy_profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physcho`
--

INSERT INTO `physcho` (`psy_id`, `psy_name`, `psy_contact`, `psy_email`, `psy_qualification`, `psy_bio`, `psy_gender`, `psy_password`, `psy_profile`) VALUES
(1, 'Dhruvit', '999999', 'salat', 'Mental psychiatry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', 0, '\r\nk', ''),
(2, 'Umang Kalavadia', '999999', 'salat', 'Drug psychiatry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', 1, '\r\nk', ''),
(3, 'Ajay Rathod', 'salatd0852', 'salatd0852@gmail.com', 'Alchohol psychiatry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', 0, '81dc9bdb52d04dc20036dbd8313ed055', ''),
(4, 'Unknown Insaan', '6869', 'admin@tecdiary.com', 'sex psychiatry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', 0, '25d55ad283aa400af464c76d713c07ad', 'Uploads/Profile/606f23b46a2801.98521320.jpg'),
(5, 'Mr. India', '', '', 'bachelor degree', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', 0, 'd41d8cd98f00b204e9800998ecf8427e', '');

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

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`pdt_id`, `pdt_name`, `pdt_description`) VALUES
(1, 'bullshit', 'shitbull\r\n');

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

--
-- Dumping data for table `pwd_reset`
--

INSERT INTO `pwd_reset` (`reset_id`, `reset_link_token`, `exp_date`, `reset_email`) VALUES
(15, '678f856adc9bc4bedf889959492133518856', '2021-04-29 14:24:05', 'allinoneguruji3@gmail.com');

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
  `u_img` varchar(200) NOT NULL,
  `u_contact` int(10) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_status` int(2) DEFAULT NULL,
  `u_gender` varchar(10) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp(),
  `u_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `addiction_id`, `u_name`, `u_img`, `u_contact`, `u_email`, `u_status`, `u_gender`, `r_date`, `u_password`) VALUES
(1, 0, 'Alok Rathava', '', 2147483647, 'alokrathava@gmail.com', 0, 'male', '2021-03-06 21:42:21', '21232f297a57a5a743894a0e4a801fc3'),
(2, 1, 'Dhruvi', 'upload/profile/608a4c56028f76.32471793.jpg', 1234567, 'allinoneguruji3@gmail.com', 0, 'male', '2021-03-07 22:26:42', '81dc9bdb52d04dc20036dbd8313ed055');

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
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctor_schedule_table`
--
ALTER TABLE `doctor_schedule_table`
  ADD PRIMARY KEY (`doctor_schedule_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment_table`
--
ALTER TABLE `appointment_table`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor_schedule_table`
--
ALTER TABLE `doctor_schedule_table`
  MODIFY `doctor_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `cat_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_reply`
--
ALTER TABLE `forum_reply`
  MODIFY `reply_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physcho`
--
ALTER TABLE `physcho`
  MODIFY `psy_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `pdt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  MODIFY `reset_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);

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
