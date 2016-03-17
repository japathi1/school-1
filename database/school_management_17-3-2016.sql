-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2016 at 04:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` char(36) NOT NULL,
  `class` varchar(8) NOT NULL,
  `school` char(36) NOT NULL,
  `section` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `school`, `section`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('2df609b3-c976-5d0e-cc9c-56e589d04e8c', 'I', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', '', 1, 0, '2016-03-13 16:37:39', '2016-03-13 16:37:39', 'f2d4a845-4caf-0348-95e9-56e58834cd4c', 'f2d4a845-4caf-0348-95e9-56e58834cd4c'),
('60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'I', '1d232787-881f-b3df-4cc2-56e4ef71af25', '', 1, 0, '2016-03-13 05:47:41', '2016-03-13 05:47:41', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4');

-- --------------------------------------------------------

--
-- Table structure for table `extra_fee`
--

CREATE TABLE IF NOT EXISTS `extra_fee` (
  `id` char(36) NOT NULL,
  `school_id` char(36) NOT NULL,
  `student_id` char(36) NOT NULL,
  `label` varchar(128) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_fee`
--

INSERT INTO `extra_fee` (`id`, `school_id`, `student_id`, `label`, `amount`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('da151673-5091-1855-aae9-56e76f85ca9d', '1d232787-881f-b3df-4cc2-56e4ef71af25', '9e15c69d-8e78-4a8b-76b8-56e6f65d51ea', 'Late Fine', 100, 1, 0, '2016-02-03 03:11:17', '2016-03-15 03:11:17', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4');

-- --------------------------------------------------------

--
-- Table structure for table `fee_label`
--

CREATE TABLE IF NOT EXISTS `fee_label` (
  `id` char(36) NOT NULL,
  `school_id` char(36) NOT NULL,
  `fee_label` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_label`
--

INSERT INTO `fee_label` (`id`, `school_id`, `fee_label`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('264dc7bf-3786-972b-60f9-56e76e2b8217', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'Computer Fee', 1, 0, '2016-03-15 03:08:38', '2016-03-15 03:08:38', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('5e4a80b7-1c40-33a0-8f49-56e4f39561aa', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'Tution Fee', 1, 0, '2016-03-13 05:57:18', '2016-03-13 05:57:18', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('9e39a325-f6ba-b326-f1be-56e5898b18bf', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'Tution Fee ', 1, 0, '2016-03-13 16:38:49', '2016-03-13 16:38:49', 'f2d4a845-4caf-0348-95e9-56e58834cd4c', 'f2d4a845-4caf-0348-95e9-56e58834cd4c'),
('aa0ae193-00e4-eeac-659c-56e4f302b670', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'Library Fee', 1, 0, '2016-03-13 05:57:34', '2016-03-13 05:57:34', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE IF NOT EXISTS `fee_structure` (
  `id` char(36) NOT NULL,
  `school_id` char(36) NOT NULL,
  `class_id` char(36) NOT NULL,
  `fee_label_id` char(36) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `school_id`, `class_id`, `fee_label_id`, `amount`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('2bc807da-939d-854c-3da8-56e76e4d10c4', '1d232787-881f-b3df-4cc2-56e4ef71af25', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', '264dc7bf-3786-972b-60f9-56e76e2b8217', 100, 1, 0, '2016-03-15 03:08:55', '2016-03-15 03:08:55', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('2d28ee7c-6f7d-f9fa-a6cb-56e4f31a8747', '1d232787-881f-b3df-4cc2-56e4ef71af25', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', '5e4a80b7-1c40-33a0-8f49-56e4f39561aa', 100, 1, 0, '2016-03-13 05:57:51', '2016-03-13 05:57:51', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('2e6da593-f9cc-84b6-4d6a-56e5893b5978', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', '2df609b3-c976-5d0e-cc9c-56e589d04e8c', '9e39a325-f6ba-b326-f1be-56e5898b18bf', 200, 1, 0, '2016-03-13 16:39:00', '2016-03-13 16:39:00', 'f2d4a845-4caf-0348-95e9-56e58834cd4c', 'f2d4a845-4caf-0348-95e9-56e58834cd4c'),
('aea7aaed-aaf2-1a63-9a9d-56e4f38cdde3', '1d232787-881f-b3df-4cc2-56e4ef71af25', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'aa0ae193-00e4-eeac-659c-56e4f302b670', 50, 1, 0, '2016-03-13 05:58:03', '2016-03-13 05:58:03', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4');

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE IF NOT EXISTS `format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` char(36) NOT NULL,
  `school_slug` varchar(256) NOT NULL,
  `year` int(11) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4531181 ;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`id`, `school_id`, `school_slug`, `year`, `receipt_no`) VALUES
(4531159, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 16, 32),
(4531160, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 17, 0),
(4531161, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 18, 0),
(4531162, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 19, 0),
(4531163, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 20, 0),
(4531164, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 21, 0),
(4531165, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 22, 0),
(4531166, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 23, 0),
(4531167, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 24, 0),
(4531168, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 25, 0),
(4531169, '1d232787-881f-b3df-4cc2-56e4ef71af25', 'DPS', 26, 0),
(4531170, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 16, 7),
(4531171, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 17, 0),
(4531172, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 18, 0),
(4531173, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 19, 0),
(4531174, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 20, 0),
(4531175, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 21, 0),
(4531176, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 22, 0),
(4531177, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 23, 0),
(4531178, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 24, 0),
(4531179, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 25, 0),
(4531180, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'G', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` char(36) NOT NULL,
  `role` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
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

CREATE TABLE IF NOT EXISTS `schools` (
  `id` char(36) NOT NULL,
  `name` varchar(512) NOT NULL,
  `payment_api_key` varchar(128) DEFAULT NULL,
  `payment_secret_key` varchar(128) DEFAULT NULL,
  `school_logo` varchar(256) DEFAULT NULL,
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
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `payment_api_key`, `payment_secret_key`, `school_logo`, `address_line_1`, `address_line_2`, `city`, `state`, `pin`, `contact`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('1d232787-881f-b3df-4cc2-56e4ef71af25', 'Delhi Public School', '123456', '123456', 'Chrysanthemum.jpg', 'Sector V ', 'Kolkata', 'Kolkata', 'f5649603-c797-11e5-b399-3c07717072c4', '700112', '9903104919', 1, 0, '2016-03-13 05:42:46', '2016-03-13 05:42:46', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4'),
('a0baf6ae-ad68-431e-3bc7-56e588fad358', 'GGPS', '123456', '123456', 'Chrysanthemum.jpg', 'sdsadsad', 'asdasdasd', 'Kolkata', 'f5649603-c797-11e5-b399-3c07717072c4', '324234', '324234', 1, 0, '2016-03-13 16:35:42', '2016-03-13 16:35:42', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4');

-- --------------------------------------------------------

--
-- Table structure for table `school_charges`
--

CREATE TABLE IF NOT EXISTS `school_charges` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `amount` varchar(16) NOT NULL,
  `type` enum('processing','transaction') NOT NULL DEFAULT 'processing',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` char(36) NOT NULL,
  `section` varchar(16) NOT NULL,
  `class` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `class`, `school`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('6c092b8e-70c4-ffa0-0430-56e4f1c2bcb9', 'B', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', '1d232787-881f-b3df-4cc2-56e4ef71af25', 1, 0, '2016-03-13 05:48:09', '2016-03-13 05:48:09', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'A', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', '1d232787-881f-b3df-4cc2-56e4ef71af25', 1, 0, '2016-03-13 05:48:00', '2016-03-13 05:48:00', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('bfc1f78b-f1da-59bc-13cf-56e589bf9c1a', 'A', '2df609b3-c976-5d0e-cc9c-56e589d04e8c', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 1, 0, '2016-03-13 16:37:47', '2016-03-13 16:37:47', 'f2d4a845-4caf-0348-95e9-56e58834cd4c', 'f2d4a845-4caf-0348-95e9-56e58834cd4c');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` char(36) NOT NULL,
  `state` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
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

CREATE TABLE IF NOT EXISTS `students` (
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
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school`, `roll_number`, `firstname`, `middlename`, `lastname`, `class`, `section`, `address_line_1`, `address_line_2`, `city`, `state`, `pin`, `emg_contact`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('4fb1135f-b8ed-63b5-8f99-56e58968075f', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 1, 'Aaditya', '', 'Singh', '2df609b3-c976-5d0e-cc9c-56e589d04e8c', 'bfc1f78b-f1da-59bc-13cf-56e589bf9c1a', 'fdgfdgfd', 'dfgfg', 'gfdgfd', 'f5649603-c797-11e5-b399-3c07717072c4', '34234', '324234', 1, 0, '2016-03-13 16:38:33', '2016-03-13 16:38:33', 'f2d4a845-4caf-0348-95e9-56e58834cd4c', 'f2d4a845-4caf-0348-95e9-56e58834cd4c'),
('9e15c69d-8e78-4a8b-76b8-56e6f65d51ea', '1d232787-881f-b3df-4cc2-56e4ef71af25', 2, 'Samim', '', 'Akhtar', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'Kolkata', '', 'Kolkata', 'f5649603-c797-11e5-b399-3c07717072c4', '700112', '56546456', 1, 0, '2016-03-14 18:36:12', '2016-03-14 18:36:12', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('aac187ea-1e44-41a0-30f4-56e4f3c66e7f', '1d232787-881f-b3df-4cc2-56e4ef71af25', 2, 'Tom', '', 'Dsuza', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'Kolkata', '', 'Kolkata', 'f56448ee-c797-11e5-b399-3c07717072c4', '342324', '3243242', 1, 0, '2016-03-13 06:00:14', '2016-03-13 06:00:14', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('bf025faf-87c3-c8e0-eec9-56e4f3e8d1a3', '1d232787-881f-b3df-4cc2-56e4ef71af25', 1, 'Raj', '', 'Singh', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'Kolkata', '', 'Kolkata', 'f56448ee-c797-11e5-b399-3c07717072c4', '11111', '1111', 1, 0, '2016-03-13 05:56:53', '2016-03-13 05:56:53', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE IF NOT EXISTS `student_fee` (
  `id` char(36) NOT NULL,
  `student_id` char(36) NOT NULL,
  `fee_structure_id` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`id`, `student_id`, `fee_structure_id`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('56ab4be5-2fee-4f79-0098-56e76edfc3c2', '9e15c69d-8e78-4a8b-76b8-56e6f65d51ea', '2bc807da-939d-854c-3da8-56e76e4d10c4', 1, 0, '2016-03-15 03:09:40', '2016-03-15 03:09:40', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('5e7b6ef4-0613-c6f2-e911-56e76eed0ac1', '9e15c69d-8e78-4a8b-76b8-56e6f65d51ea', '2d28ee7c-6f7d-f9fa-a6cb-56e4f31a8747', 1, 0, '2016-03-15 03:09:40', '2016-03-15 03:09:40', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('708ca0ae-3e31-c7e0-8959-56e76e49c860', '9e15c69d-8e78-4a8b-76b8-56e6f65d51ea', 'aea7aaed-aaf2-1a63-9a9d-56e4f38cdde3', 1, 0, '2016-03-15 03:09:40', '2016-03-15 03:09:40', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('8d2e4395-8667-b352-fb1a-56e76e24e59e', 'aac187ea-1e44-41a0-30f4-56e4f3c66e7f', '2bc807da-939d-854c-3da8-56e76e4d10c4', 1, 0, '2016-03-15 03:10:03', '2016-03-15 03:10:03', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('920aca93-2146-0bb7-7c79-56e589636352', '4fb1135f-b8ed-63b5-8f99-56e58968075f', '2e6da593-f9cc-84b6-4d6a-56e5893b5978', 1, 0, '2016-03-13 16:39:12', '2016-03-13 16:39:12', 'f2d4a845-4caf-0348-95e9-56e58834cd4c', 'f2d4a845-4caf-0348-95e9-56e58834cd4c'),
('a79f0215-0caf-89d4-4564-56e76ff22033', 'bf025faf-87c3-c8e0-eec9-56e4f3e8d1a3', '2bc807da-939d-854c-3da8-56e76e4d10c4', 1, 0, '2016-03-15 03:10:15', '2016-03-15 03:10:15', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('aef21847-480c-e987-5e14-56e76f174b89', 'bf025faf-87c3-c8e0-eec9-56e4f3e8d1a3', '2d28ee7c-6f7d-f9fa-a6cb-56e4f31a8747', 1, 0, '2016-03-15 03:10:15', '2016-03-15 03:10:15', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('b67166f6-aba7-975e-f00e-56e76ed8658a', 'aac187ea-1e44-41a0-30f4-56e4f3c66e7f', '2d28ee7c-6f7d-f9fa-a6cb-56e4f31a8747', 1, 0, '2016-03-15 03:10:03', '2016-03-15 03:10:03', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('bae8c5b3-dc50-562c-2586-56e76f91e9d0', 'bf025faf-87c3-c8e0-eec9-56e4f3e8d1a3', 'aea7aaed-aaf2-1a63-9a9d-56e4f38cdde3', 1, 0, '2016-03-15 03:10:15', '2016-03-15 03:10:15', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4'),
('c3df1af4-f8a3-439c-a1c4-56e76ea3bf2d', 'aac187ea-1e44-41a0-30f4-56e4f3c66e7f', 'aea7aaed-aaf2-1a63-9a9d-56e4f38cdde3', 1, 0, '2016-03-15 03:10:03', '2016-03-15 03:10:03', '275f6ac3-6450-63b6-810a-56e4f0fff2b4', '275f6ac3-6450-63b6-810a-56e4f0fff2b4');

-- --------------------------------------------------------

--
-- Table structure for table `student_parent`
--

CREATE TABLE IF NOT EXISTS `student_parent` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `child` char(36) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `parent_type` enum('father','mother','guardian') DEFAULT 'father',
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
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
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
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` char(36) NOT NULL,
  `school` char(36) NOT NULL,
  `student` char(36) NOT NULL,
  `class` char(36) NOT NULL,
  `section` char(36) NOT NULL,
  `receipt` varchar(36) NOT NULL,
  `transaction_id` varchar(128) DEFAULT NULL,
  `transaction_type` enum('CREDIT','DEBIT') NOT NULL,
  `amount` varchar(16) NOT NULL,
  `amount_detail` text NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `payment_status` enum('pending','complete','cancelled','reversed') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` char(36) NOT NULL,
  `modified_by` char(36) NOT NULL,
  `date_entered` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `school`, `student`, `class`, `section`, `receipt`, `transaction_id`, `transaction_type`, `amount`, `amount_detail`, `month`, `year`, `payment_status`, `status`, `deleted`, `created_by`, `modified_by`, `date_entered`, `date_modified`) VALUES
('1c265685-3d62-9de8-fd93-56ea1179a8d1', '1d232787-881f-b3df-4cc2-56e4ef71af25', '9e15c69d-8e78-4a8b-76b8-56e6f65d51ea', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'DPS4531159116000030', NULL, 'CREDIT', '250', '{"Computer Fee":"100","Tution Fee":"100","Library Fee":"50"}', 3, 2016, 'pending', 1, 0, '1d232787-881f-b3df-4cc2-56e4ef71af25', '1d232787-881f-b3df-4cc2-56e4ef71af25', '2016-03-17 03:09:00', '2016-03-17 03:09:00'),
('40875029-1edd-add1-4dda-56ea11d47f03', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'aac187ea-1e44-41a0-30f4-56e4f3c66e7f', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'DPS4531159116000031', NULL, 'CREDIT', '250', '{"Computer Fee":"100","Tution Fee":"100","Library Fee":"50"}', 3, 2016, 'pending', 1, 0, '1d232787-881f-b3df-4cc2-56e4ef71af25', '1d232787-881f-b3df-4cc2-56e4ef71af25', '2016-03-17 03:09:00', '2016-03-17 03:09:00'),
('4c98c70d-6688-bf54-8481-56ea119f03ab', '1d232787-881f-b3df-4cc2-56e4ef71af25', '9e15c69d-8e78-4a8b-76b8-56e6f65d51ea', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'DPS4531159116000027', NULL, 'CREDIT', '250', '{"Computer Fee":"100","Tution Fee":"100","Library Fee":"50"}', 3, 2016, 'pending', 1, 0, '1d232787-881f-b3df-4cc2-56e4ef71af25', '1d232787-881f-b3df-4cc2-56e4ef71af25', '2016-03-17 03:08:50', '2016-03-17 03:08:50'),
('5c9b4cc1-ad5e-bbc5-386a-56ea11a08a9d', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'bf025faf-87c3-c8e0-eec9-56e4f3e8d1a3', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'DPS4531159116000032', NULL, 'CREDIT', '250', '{"Computer Fee":"100","Tution Fee":"100","Library Fee":"50"}', 3, 2016, 'pending', 1, 0, '1d232787-881f-b3df-4cc2-56e4ef71af25', '1d232787-881f-b3df-4cc2-56e4ef71af25', '2016-03-17 03:09:00', '2016-03-17 03:09:00'),
('61599314-c394-9288-59c9-56ea118231e6', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'aac187ea-1e44-41a0-30f4-56e4f3c66e7f', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'DPS4531159116000028', NULL, 'CREDIT', '250', '{"Computer Fee":"100","Tution Fee":"100","Library Fee":"50"}', 3, 2016, 'pending', 1, 0, '1d232787-881f-b3df-4cc2-56e4ef71af25', '1d232787-881f-b3df-4cc2-56e4ef71af25', '2016-03-17 03:08:50', '2016-03-17 03:08:50'),
('72949dd7-b9d7-f29d-858d-56ea118b6185', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', '4fb1135f-b8ed-63b5-8f99-56e58968075f', '2df609b3-c976-5d0e-cc9c-56e589d04e8c', 'bfc1f78b-f1da-59bc-13cf-56e589bf9c1a', 'G4531170116000007', NULL, 'CREDIT', '200', '{"Tution Fee ":"200"}', 3, 2016, 'pending', 1, 0, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', '2016-03-17 03:09:00', '2016-03-17 03:09:00'),
('7946e1a1-1091-09c6-b435-56ea11408194', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'bf025faf-87c3-c8e0-eec9-56e4f3e8d1a3', '60cf5a0d-d366-8c5a-c48e-56e4f0d79fc9', 'b6e64a19-e91f-06ed-35b7-56e4f1be777d', 'DPS4531159116000029', NULL, 'CREDIT', '250', '{"Computer Fee":"100","Tution Fee":"100","Library Fee":"50"}', 3, 2016, 'pending', 1, 0, '1d232787-881f-b3df-4cc2-56e4ef71af25', '1d232787-881f-b3df-4cc2-56e4ef71af25', '2016-03-17 03:08:50', '2016-03-17 03:08:50'),
('8b96b028-5b40-ba6d-6ef2-56ea1198d330', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', '4fb1135f-b8ed-63b5-8f99-56e58968075f', '2df609b3-c976-5d0e-cc9c-56e589d04e8c', 'bfc1f78b-f1da-59bc-13cf-56e589bf9c1a', 'G4531170116000006', NULL, 'CREDIT', '200', '{"Tution Fee ":"200"}', 3, 2016, 'pending', 1, 0, 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', '2016-03-17 03:08:50', '2016-03-17 03:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
  `modified_by` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `school_id`, `firstname`, `lastname`, `email`, `mobile`, `status`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_by`) VALUES
('275f6ac3-6450-63b6-810a-56e4f0fff2b4', 'priyranjan', 'e10adc3949ba59abbe56e057f20f883e', '9e4ba62e-c798-11e5-b399-3c07717072c4', '1d232787-881f-b3df-4cc2-56e4ef71af25', 'Priyranjan', 'Singh', 'singh.priyranjan@gmail.com', '9903104919', 1, 0, '2016-03-13 05:43:58', '2016-03-13 05:43:58', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4'),
('86d07f68-c797-11e5-b399-3c07717072c4', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'ca48c0f2-ce8f-11e5-9093-3c07717072c4', NULL, 'Neeraj', 'Kumar', 'neeraj24a@gmail.com', '8443868777', 1, 0, '2016-01-29 00:00:00', '2016-01-29 00:00:00', '1', '1'),
('f2d4a845-4caf-0348-95e9-56e58834cd4c', 'rajeev', 'e10adc3949ba59abbe56e057f20f883e', '9e4ba62e-c798-11e5-b399-3c07717072c4', 'a0baf6ae-ad68-431e-3bc7-56e588fad358', 'Rajeev', 'Ranjan', 'rajeev@gmail.com', '324324234', 1, 0, '2016-03-13 16:36:16', '2016-03-13 16:36:16', '86d07f68-c797-11e5-b399-3c07717072c4', '86d07f68-c797-11e5-b399-3c07717072c4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
