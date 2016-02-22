-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2016 at 01:58 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` char(36) NOT NULL,
  `class` varchar(8) NOT NULL,
  `school` char(36) NOT NULL,
  `section` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `school`, `section`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('74fdd30e-c798-11e5-b399-3c07717072c4', '1', 'baff96fe-c797-11e5-b399-3c07717072c4', 'f0d55bf3-d0fb-11e5-be3f-3c07717072c4', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4');

-- --------------------------------------------------------

--
-- Table structure for table `extra_fee`
--

CREATE TABLE `extra_fee` (
  `id` char(36) NOT NULL,
  `transaction` char(36) NOT NULL,
  `fee_name` varchar(128) NOT NULL,
  `amount` varchar(16) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE `fee_structure` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `class` char(36) NOT NULL,
  `fee_name` varchar(128) NOT NULL,
  `tution_fee` varchar(16) NOT NULL DEFAULT '0.00',
  `transport_fee` varchar(16) NOT NULL DEFAULT '0.00',
  `admission_fee` varchar(16) NOT NULL DEFAULT '0.00',
  `extra_curricular_fee` varchar(16) NOT NULL DEFAULT '0.00',
  `library_fee` varchar(16) NOT NULL DEFAULT '0.00',
  `sports_fee` varchar(16) NOT NULL DEFAULT '0.00',
  `period` enum('m','q','h','y') NOT NULL DEFAULT 'm',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` char(36) NOT NULL,
  `role` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('9e4ba62e-c798-11e5-b399-3c07717072c4', 'Principal', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4'),
('9e4c1694-c798-11e5-b399-3c07717072c4', 'Account Manager', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4'),
('bd73fdf5-c798-11e5-b399-3c07717072c4', 'Class Teacher', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4'),
('ca48c0f2-ce8f-11e5-9093-3c07717072c4', 'Super Admin', 1, 0, '2016-02-08 00:00:00', '2016-02-08 00:00:00', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` char(36) NOT NULL,
  `name` varchar(512) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `state` char(36) NOT NULL,
  `pin` char(6) NOT NULL,
  `contact` varchar(16) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address_line_1`, `address_line_2`, `city`, `state`, `pin`, `contact`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('baff96fe-c797-11e5-b399-3c07717072c4', 'School 1', 'Salt Lake', NULL, 'Kolkata', 'f5649603-c797-11e5-b399-3c07717072c4', '700091', '8443868777', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4');

-- --------------------------------------------------------

--
-- Table structure for table `school_charges`
--

CREATE TABLE `school_charges` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `amount` varchar(16) NOT NULL,
  `type` enum('processing','transaction') NOT NULL DEFAULT 'processing',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_charges`
--

INSERT INTO `school_charges` (`id`, `school`, `amount`, `type`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('3fb3c9a6-c798-11e5-b399-3c07717072c4', 'baff96fe-c797-11e5-b399-3c07717072c4', '50', 'processing', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4'),
('3fb433c1-c798-11e5-b399-3c07717072c4', 'baff96fe-c797-11e5-b399-3c07717072c4', '20', 'transaction', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` char(36) NOT NULL,
  `section` varchar(16) NOT NULL,
  `school` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `school`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('f0d55bf3-d0fb-11e5-be3f-3c07717072c4', 'A', 'baff96fe-c797-11e5-b399-3c07717072c4', 1, 0, '2016-02-12 00:00:00', '2016-02-12 00:00:00', '1', '1'),
('g1d55bf3-d0fb-11e5-be3f-3c07717092d5', 'B', 'baff96fe-c797-11e5-b399-3c07717072c4', 1, 0, '2016-02-12 00:00:00', '2016-02-12 00:00:00', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` char(36) NOT NULL,
  `state` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('f56448ee-c797-11e5-b399-3c07717072c4', 'Delhi', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4'),
('f5649603-c797-11e5-b399-3c07717072c4', 'West Bengal', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `roll_number` int(3) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `middlename` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) NOT NULL,
  `class` char(36) NOT NULL,
  `section` char(36) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `state` char(36) NOT NULL,
  `pin` char(6) NOT NULL,
  `emg_contact` varchar(16) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_parent`
--

CREATE TABLE `student_parent` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `child` char(36) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `type` enum('student','parent') NOT NULL DEFAULT 'student',
  `parent_type` enum('father','mother','guardian') DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` char(36) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` enum('email','sms') NOT NULL,
  `template` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `student` char(36) NOT NULL,
  `class` char(36) NOT NULL,
  `section` char(36) NOT NULL,
  `receipt` varchar(36) NOT NULL,
  `transaction_id` varchar(128) DEFAULT NULL,
  `transaction_type` enum('CREDIT','DEBIT') NOT NULL,
  `amount` varchar(16) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `payment_status` enum('pending','complete','cancelled','reversed') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` char(36) NOT NULL,
  `school_id` char(36) DEFAULT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `school_id`, `firstname`, `lastname`, `email`, `mobile`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('86d07f68-c797-11e5-b399-3c07717072c4', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'ca48c0f2-ce8f-11e5-9093-3c07717072c4', NULL, 'Neeraj', 'Kumar', 'neeraj24a@gmail.com', '8443868777', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '1', '1'),
('fb90b76a-ce8f-11e5-9093-3c07717072c4', 'neeraj', 'e10adc3949ba59abbe56e057f20f883e', '9e4ba62e-c798-11e5-b399-3c07717072c4', 'baff96fe-c797-11e5-b399-3c07717072c4', 'Neeraj', 'Kumar', 'neeraj24a@gmail.com', '8443868777', 1, 0, '2016-02-08 00:00:00', '2016-02-08 00:00:00', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_fee`
--
ALTER TABLE `extra_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_charges`
--
ALTER TABLE `school_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_parent`
--
ALTER TABLE `student_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
