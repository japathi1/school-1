-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 06:20 PM
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
('47800d70-0128-29e2-f4b5-56d2c9cd4ffe', 'baff96fe-c797-11e5-b399-3c07717072c4', 'Tution Fee ', 1, 0, '2016-02-28 11:16:45', '2016-02-28 17:57:14', 'fb90b76a-ce8f-11e5-9093-3c07717072c4', 'fb90b76a-ce8f-11e5-9093-3c07717072c4'),
('948f89fd-d9b9-56d3-2d28-56d3a564a455', 'baff96fe-c797-11e5-b399-3c07717072c4', 'aa', 1, 0, '2016-02-29 02:58:42', '2016-02-29 02:58:42', 'fb90b76a-ce8f-11e5-9093-3c07717072c4', 'fb90b76a-ce8f-11e5-9093-3c07717072c4'),
('a4ae0f0a-93ac-a1bb-6f0e-56d3a5650207', 'baff96fe-c797-11e5-b399-3c07717072c4', 'bb', 1, 0, '2016-02-29 02:58:54', '2016-02-29 02:58:54', 'fb90b76a-ce8f-11e5-9093-3c07717072c4', 'fb90b76a-ce8f-11e5-9093-3c07717072c4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
