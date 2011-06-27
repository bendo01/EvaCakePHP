-- phpMyAdmin SQL Dump
-- version 3.4.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2011 at 03:21 PM
-- Server version: 5.1.57
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evacakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `eva_applications`
--

CREATE TABLE IF NOT EXISTS `eva_applications` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_applications`
--

INSERT INTO `eva_applications` (`id`, `name`, `title`, `description`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc4785-c988-44b6-a992-2d377445297b', 'Blog', 'Test Blog Applications', 'xxx', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:36:53', '2011-06-18 15:36:53'),
('4dfdd69e-c63c-462e-be65-3d6bc0a80102', 'StudentApp', 'test', 'xxx', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 19:59:42', '2011-06-19 19:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `eva_basic_rules`
--

CREATE TABLE IF NOT EXISTS `eva_basic_rules` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `deleted` tinyint(1) NOT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_basic_rules`
--

INSERT INTO `eva_basic_rules` (`id`, `name`, `description`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4df898ae-8564-4002-b238-04ec7445297b', 'alphaNumeric', 'The data for the field must only contain letters and numbers.', 0, '0000-00-00 00:00:00', '1', '1', '2011-06-15 11:34:06', '2011-06-15 11:34:06'),
('4df898ca-aad8-49d5-8648-04d17445297b', 'numeric', 'Checks if the data passed is a valid number.', 0, '0000-00-00 00:00:00', '1', '1', '2011-06-15 11:34:34', '2011-06-15 11:34:34'),
('4df898e1-27b4-4026-8476-02977445297b', 'isUnique', 'The data for the field must be unique, it cannot be used by any other rows.', 0, '0000-00-00 00:00:00', '1', '1', '2011-06-15 11:34:57', '2011-06-15 11:34:57'),
('4df898f1-3990-4bf9-917d-04e97445297b', 'notEmpty', 'The basic rule to ensure that a field is not empty.', 0, '0000-00-00 00:00:00', '1', '1', '2011-06-15 11:35:13', '2011-06-15 11:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `eva_belong_to_associations`
--

CREATE TABLE IF NOT EXISTS `eva_belong_to_associations` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eva_model_id` varchar(36) NOT NULL,
  `associated_model_id` varchar(36) NOT NULL,
  `description` text,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_belong_to_associations`
--

INSERT INTO `eva_belong_to_associations` (`id`, `name`, `eva_model_id`, `associated_model_id`, `description`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc50de-f2bc-46e6-bee5-2e207445297b', 'Comments BelongTo Posts', '4dfc47e9-ae38-410b-a083-2d427445297b', '4dfc47df-5c98-4dac-94a0-2d427445297b', 'xxxx', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:16:46', '2011-06-18 16:16:46'),
('4dfc97c0-6510-4022-9686-347b7445297b', 'Userprofiles belongs to users', '4dfc945b-bb9c-4ee3-817d-31797445297b', '4dfc9350-2744-4efa-8ee0-32907445297b', 'Userprofiles belongs to users', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:19:12', '2011-06-18 21:19:12'),
('4dfccd1a-02b0-4fa3-9c1b-38287445297b', 'post_tags Belongs to tags', '4dfccc5a-4bdc-4313-bae4-35407445297b', '4dfc9476-7130-42de-a4ab-30c77445297b', '', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:06:50', '2011-06-19 01:06:50'),
('4dfcf1e7-1604-40b0-aeea-3bc77445297b', 'post_tags Belongs to posts', '4dfccc5a-4bdc-4313-bae4-35407445297b', '4dfc47df-5c98-4dac-94a0-2d427445297b', '', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 03:43:51', '2011-06-19 03:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `eva_belong_to_association_details`
--

CREATE TABLE IF NOT EXISTS `eva_belong_to_association_details` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `className` varchar(255) NOT NULL,
  `foreignKey` varchar(255) NOT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `eva_belong_to_association_id` varchar(36) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `fields` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `counterCache` varchar(255) DEFAULT NULL,
  `counterScope` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_belong_to_association_details`
--

INSERT INTO `eva_belong_to_association_details` (`id`, `name`, `className`, `foreignKey`, `conditions`, `eva_belong_to_association_id`, `type`, `fields`, `order`, `counterCache`, `counterScope`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc50de-40f4-400e-a911-2e207445297b', 'posts', 'Post', 'post_id', '', '4dfc50de-f2bc-46e6-bee5-2e207445297b', NULL, '', '', NULL, NULL, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:16:46', '2011-06-18 16:16:46'),
('4dfc97c0-a2e0-4d64-ae5c-347b7445297b', 'users', 'User', 'user_id', '', '4dfc97c0-6510-4022-9686-347b7445297b', NULL, '', '', NULL, NULL, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:19:12', '2011-06-18 21:19:12'),
('4dfccd1a-3d60-45e0-a6a3-38287445297b', 'tags', 'Tag', 'tag_id', '', '4dfccd1a-02b0-4fa3-9c1b-38287445297b', NULL, '', '', NULL, NULL, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:06:50', '2011-06-19 01:06:50'),
('4dfcf1e7-2c68-4097-91b0-3bc77445297b', 'posts', 'Post', 'post_id', '', '4dfcf1e7-1604-40b0-aeea-3bc77445297b', NULL, '', '', NULL, NULL, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 03:43:51', '2011-06-19 03:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `eva_column_rules`
--

CREATE TABLE IF NOT EXISTS `eva_column_rules` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eva_model_column_id` varchar(36) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_column_rules`
--

INSERT INTO `eva_column_rules` (`id`, `name`, `eva_model_column_id`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc516b-94ac-482c-be04-2dd07445297b', 'PostNameNotNull', '4dfc482c-4c20-448f-93fc-2d1e7445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:19:07', '2011-06-18 16:19:07'),
('4dfc51cf-96e8-4be2-a4fd-2e077445297b', 'PostBodyNotNull', '4dfc4837-07dc-4eec-b65a-2d377445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:20:47', '2011-06-18 16:20:47'),
('4dfc51ec-4d30-4c82-b649-2e0e7445297b', 'CommentsNameNotNull', '4dfc48b0-b21c-41d8-a916-2d337445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:21:16', '2011-06-18 16:21:16'),
('4dfc5206-fb70-43fe-872f-2e207445297b', 'CommentsBodyNotNull', '4dfc48c4-7f74-4da6-a7f2-2d2a7445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:21:42', '2011-06-18 16:21:42'),
('4dfcd00d-8bb8-4837-be5d-38417445297b', 'UserNameNotNull', '4dfc93a1-8a5c-4e93-8d30-30c77445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:19:25', '2011-06-19 01:19:25'),
('4dfcd024-7274-454e-8bf6-38957445297b', 'UserEmailNotNull', '4dfc93c6-82b8-4dee-8cda-32a97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:19:48', '2011-06-19 01:19:48'),
('4dfcd05f-3558-4516-a88d-37767445297b', 'UserPasswordNotNull', '4dfc93e0-1420-4cf9-8638-32407445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:20:47', '2011-06-19 01:20:47'),
('4dfcd0ac-3cc8-4278-98fa-374a7445297b', 'UserProfileNameNotNull', '4dfc94af-21c8-4b5f-bfc7-32d07445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:22:04', '2011-06-19 01:22:04'),
('4dfcd0c0-95f4-48ba-84be-373d7445297b', 'TagNameNotNull', '4dfc9a75-a228-4983-9b1a-347b7445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:22:24', '2011-06-19 01:22:24'),
('4dfcd100-2378-4fc7-a921-38287445297b', 'PostTag_PostIdNotNull', '4dfccca8-87d4-4fd1-81d6-38417445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:23:28', '2011-06-19 01:23:28'),
('4dfcd116-822c-4947-a543-38737445297b', 'PostTag_TagIdNotNull', '4dfcccc4-65b4-499e-b3b2-382c7445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:23:50', '2011-06-19 01:23:50'),
('4dfcd158-ae3c-40c5-b2b7-38417445297b', 'Comment_PostIdNotNull', '4dfc48d5-b190-465d-b058-2d1e7445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:24:56', '2011-06-19 01:24:56'),
('4dfcd175-cd40-40ca-8bd7-382c7445297b', 'UserProfile_UserIdNameNotNull', '4dfc94db-ecec-45a2-a7fe-30c77445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:25:25', '2011-06-19 01:25:25'),
('4dfdd92e-0d28-4365-8a65-4e86c0a80102', 'StudentNameNotNull', '4dfdd84c-22fc-4432-b2ea-00b5c0a80102', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:10:38', '2011-06-19 20:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `eva_db_connections`
--

CREATE TABLE IF NOT EXISTS `eva_db_connections` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `database` varchar(255) NOT NULL,
  `schema` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `persistent` tinyint(1) NOT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `eva_application_id` varchar(36) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_db_connections`
--

INSERT INTO `eva_db_connections` (`id`, `name`, `driver`, `host`, `login`, `password`, `database`, `schema`, `port`, `persistent`, `prefix`, `eva_application_id`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc47a9-8e38-4fbd-8eba-2d157445297b', 'BlogConnection', 'mysql', 'localhost', 'bendo01', 'talaso', 'blog', '', '', 0, NULL, '4dfc4785-c988-44b6-a992-2d377445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:37:29', '2011-06-18 15:37:29'),
('4dfdd73b-3c40-4dfb-a2e2-3d6cc0a80102', 'studentconnection', 'mysql', 'localhost', 'bendo01', 'talaso', 'mystudent', '', '', 0, NULL, '4dfdd69e-c63c-462e-be65-3d6bc0a80102', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:02:19', '2011-06-19 20:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `eva_has_and_belong_to_many_associations`
--

CREATE TABLE IF NOT EXISTS `eva_has_and_belong_to_many_associations` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eva_model_id` varchar(36) NOT NULL,
  `associated_model_id` varchar(36) NOT NULL,
  `description` text,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_has_and_belong_to_many_associations`
--

INSERT INTO `eva_has_and_belong_to_many_associations` (`id`, `name`, `eva_model_id`, `associated_model_id`, `description`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfd0f96-44ec-4a37-b8ae-3bbc7445297b', 'tags Has And Belongs To Many posts', '4dfc9476-7130-42de-a4ab-30c77445297b', '4dfc47df-5c98-4dac-94a0-2d427445297b', 'tags Has And Belongs To Many posts', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 05:50:30', '2011-06-19 05:50:30'),
('4dfd0f96-ea38-4202-84cd-3bbc7445297b', 'Post Has And Belongs To Many Tags', '4dfc47df-5c98-4dac-94a0-2d427445297b', '4dfc9476-7130-42de-a4ab-30c77445297b', '', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 05:50:30', '2011-06-19 05:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `eva_has_and_belong_to_many_association_details`
--

CREATE TABLE IF NOT EXISTS `eva_has_and_belong_to_many_association_details` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eva_has_and_belong_to_many_association_id` varchar(36) NOT NULL,
  `className` varchar(255) NOT NULL,
  `joinTable` varchar(255) NOT NULL,
  `with` varchar(255) DEFAULT NULL,
  `foreignKey` varchar(255) NOT NULL,
  `associationForeignKey` varchar(255) NOT NULL,
  `unique` tinyint(1) NOT NULL,
  `conditions` text,
  `fields` text,
  `order` varchar(255) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `offset` text,
  `finderQuery` text,
  `deleteQuery` text,
  `insertQuery` text,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_has_and_belong_to_many_association_details`
--

INSERT INTO `eva_has_and_belong_to_many_association_details` (`id`, `name`, `eva_has_and_belong_to_many_association_id`, `className`, `joinTable`, `with`, `foreignKey`, `associationForeignKey`, `unique`, `conditions`, `fields`, `order`, `limit`, `offset`, `finderQuery`, `deleteQuery`, `insertQuery`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfd0f96-2530-4450-81b1-3bbc7445297b', 'Tag', '4dfd0f96-ea38-4202-84cd-3bbc7445297b', 'Tag', 'posts_tags', NULL, 'post_id', 'tag_id', 1, '', '', '', NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 05:50:30', '2011-06-19 05:50:30'),
('4dfd0f96-fc08-4042-9573-3bbc7445297b', 'Post', '4dfd0f96-44ec-4a37-b8ae-3bbc7445297b', 'Post', 'posts_tags', NULL, 'tag_id', 'post_id', 1, '', '', '', NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 05:50:30', '2011-06-19 05:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `eva_has_many_associations`
--

CREATE TABLE IF NOT EXISTS `eva_has_many_associations` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `eva_model_id` varchar(36) NOT NULL,
  `associated_model_id` varchar(36) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_has_many_associations`
--

INSERT INTO `eva_has_many_associations` (`id`, `name`, `description`, `eva_model_id`, `associated_model_id`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc50c6-e14c-4313-b151-2e0e7445297b', 'Post HasMany Comments', 'xxxx', '4dfc47df-5c98-4dac-94a0-2d427445297b', '4dfc47e9-ae38-410b-a083-2d427445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:16:22', '2011-06-18 16:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `eva_has_many_association_details`
--

CREATE TABLE IF NOT EXISTS `eva_has_many_association_details` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `className` varchar(255) NOT NULL,
  `foreignKey` varchar(255) NOT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `fields` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `eva_has_many_association_id` varchar(36) NOT NULL,
  `offset` int(11) DEFAULT NULL,
  `exclusive` tinyint(1) DEFAULT NULL,
  `finderQuery` text,
  `limit` int(11) DEFAULT NULL,
  `dependent` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_has_many_association_details`
--

INSERT INTO `eva_has_many_association_details` (`id`, `name`, `className`, `foreignKey`, `conditions`, `fields`, `order`, `eva_has_many_association_id`, `offset`, `exclusive`, `finderQuery`, `limit`, `dependent`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc50c6-3fd0-46a3-b3ef-2e0e7445297b', 'comments', 'Comment', 'post_id', '', '', '', '4dfc50c6-e14c-4313-b151-2e0e7445297b', NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:16:22', '2011-06-18 16:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `eva_has_one_associations`
--

CREATE TABLE IF NOT EXISTS `eva_has_one_associations` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `eva_model_id` varchar(36) NOT NULL,
  `associated_model_id` varchar(36) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_has_one_associations`
--

INSERT INTO `eva_has_one_associations` (`id`, `name`, `description`, `eva_model_id`, `associated_model_id`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfd15bd-bc64-44fb-95b1-3e497445297b', 'User has one userprofile', '', '4dfc9350-2744-4efa-8ee0-32907445297b', '4dfc945b-bb9c-4ee3-817d-31797445297b', NULL, NULL, '', '', '2011-06-19 06:16:45', '2011-06-19 06:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `eva_has_one_association_details`
--

CREATE TABLE IF NOT EXISTS `eva_has_one_association_details` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `className` varchar(255) NOT NULL,
  `foreignKey` varchar(255) NOT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `fields` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `eva_has_one_association_id` varchar(36) NOT NULL,
  `dependent` tinyint(1) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_has_one_association_details`
--

INSERT INTO `eva_has_one_association_details` (`id`, `name`, `className`, `foreignKey`, `conditions`, `fields`, `order`, `eva_has_one_association_id`, `dependent`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfd15bd-42d4-4628-bc41-3e497445297b', 'Userprofile', 'Userprofile', 'user_id', '', '', '', '4dfd15bd-bc64-44fb-95b1-3e497445297b', 0, 0, NULL, '', '', '2011-06-19 06:16:45', '2011-06-19 06:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `eva_menus`
--

CREATE TABLE IF NOT EXISTS `eva_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `enable` tinyint(1) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `eva_menus`
--

INSERT INTO `eva_menus` (`id`, `parent_id`, `name`, `url`, `title`, `enable`, `lft`, `rght`, `created_by`, `modified_by`, `created`, `modified`) VALUES
(1, NULL, 'Eva Plugin Menu', '#', 'List Of Menu Of EvaCakePHP Plugin', 1, 1, 26, '', '', '2011-06-18 16:31:45', '2011-06-21 12:35:56'),
(2, 1, 'Eva Applications', '/evacakephp/eva_applications/', 'List Of Created Eva Applications', 1, 2, 3, '', '', '2011-06-18 16:34:48', '2011-06-21 12:35:56'),
(3, 1, 'Eva Db Connections', '/evacakephp/eva_db_connections/', 'List Of Created Connections', 1, 4, 5, '', '', '2011-06-18 16:35:12', '2011-06-21 12:35:56'),
(4, 1, 'Eva Model Menu', '#', 'List Of Model Operations', 1, 6, 25, '', '', '2011-06-18 16:36:33', '2011-06-21 12:35:56'),
(5, 4, 'Eva Models', '/evacakephp/eva_models/', 'List Of Created Models', 1, 7, 8, '', '', '2011-06-18 16:39:52', '2011-06-21 12:35:56'),
(6, 4, 'Eva Model Relations', '#', 'List Of Models Relations', 1, 9, 18, '', '', '2011-06-18 16:40:28', '2011-06-21 12:35:56'),
(7, 4, 'Eva Model Rules', '#', 'List Of Model Rules', 1, 19, 24, '', '', '2011-06-18 16:41:47', '2011-06-21 12:35:56'),
(8, 6, 'Eva Belongs To Association', '/evacakephp/eva_belong_to_associations/', 'List Of Model belong To Association', 1, 10, 11, '', '', '2011-06-18 16:42:26', '2011-06-21 12:35:56'),
(9, 6, 'Eva Has One Association', '/evacakephp/eva_has_one_associations/', 'List Of Model Has One Association', 1, 12, 13, '', '', '2011-06-18 16:43:21', '2011-06-21 12:35:56'),
(10, 6, 'Eva Has Many Association', '/evacakephp/eva_has_many_associations/', 'List Of Model Has Many Association', 1, 14, 15, '', '', '2011-06-18 16:43:57', '2011-06-21 12:35:56'),
(11, 6, 'Eva HABTM Association', '/evacakephp/eva_has_and_belong_to_many_associations/', 'List Of Model Has And Belongs To Many Association', 1, 16, 17, '', '', '2011-06-18 16:44:40', '2011-06-21 12:35:56'),
(12, 7, 'Eva Basic Rules', '/evacakephp/eva_basic_rules/', 'List Of Models Basic Rules', 1, 20, 21, '', '', '2011-06-18 16:45:48', '2011-06-21 12:35:56'),
(13, 7, 'Eva Column Rules', '/evacakephp/eva_column_rules/', 'List Of Model Column Rules', 1, 22, 23, '', '', '2011-06-18 16:46:16', '2011-06-21 12:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `eva_models`
--

CREATE TABLE IF NOT EXISTS `eva_models` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `admin_section` tinyint(1) NOT NULL,
  `cacheQueries` tinyint(1) DEFAULT NULL,
  `cacheSources` tinyint(1) DEFAULT NULL,
  `displayField` varchar(255) DEFAULT NULL,
  `findQueryType` varchar(255) DEFAULT NULL,
  `logTransactions` tinyint(1) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `primaryKey` varchar(255) DEFAULT NULL,
  `recursive` int(11) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `tablePrefix` varchar(255) DEFAULT NULL,
  `useDbConfig` varchar(255) DEFAULT NULL,
  `useTable` varchar(255) DEFAULT NULL,
  `eva_db_connection_id` varchar(36) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_models`
--

INSERT INTO `eva_models` (`id`, `name`, `alias`, `admin_section`, `cacheQueries`, `cacheSources`, `displayField`, `findQueryType`, `logTransactions`, `order`, `primaryKey`, `recursive`, `table`, `tablePrefix`, `useDbConfig`, `useTable`, `eva_db_connection_id`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc47df-5c98-4dac-94a0-2d427445297b', 'posts', 'post', 1, 0, 0, '', '', 0, '', '', NULL, '', '', '', '', '4dfc47a9-8e38-4fbd-8eba-2d157445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:38:23', '2011-06-26 15:18:57'),
('4dfc47e9-ae38-410b-a083-2d427445297b', 'comments', 'comment', 1, 0, 0, '', '', 0, '', '', NULL, '', '', '', '', '4dfc47a9-8e38-4fbd-8eba-2d157445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:38:33', '2011-06-26 15:19:07'),
('4dfc9350-2744-4efa-8ee0-32907445297b', 'users', 'user', 0, 0, 0, '', '', 0, '', '', NULL, '', '', '', '', '4dfc47a9-8e38-4fbd-8eba-2d157445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:00:16', '2011-06-18 21:00:16'),
('4dfc945b-bb9c-4ee3-817d-31797445297b', 'userprofiles', 'userprofile', 0, 0, 0, '', '', 0, '', '', NULL, '', '', '', '', '4dfc47a9-8e38-4fbd-8eba-2d157445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:04:43', '2011-06-18 21:04:43'),
('4dfc9476-7130-42de-a4ab-30c77445297b', 'tags', 'tag', 0, 0, 0, '', '', 0, '', '', NULL, '', '', '', '', '4dfc47a9-8e38-4fbd-8eba-2d157445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:05:10', '2011-06-18 21:05:10'),
('4dfccc5a-4bdc-4313-bae4-35407445297b', 'posts_tags', 'posts_tag', 0, 0, 0, '', '', 0, '', '', NULL, '', '', '', '', '4dfc47a9-8e38-4fbd-8eba-2d157445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:03:38', '2011-06-19 01:03:38'),
('4dfdd79b-de50-4d34-b649-3d75c0a80102', 'students', 'student', 0, 0, 0, '', '', 0, '', '', NULL, '', '', '', '', '4dfdd73b-3c40-4dfb-a2e2-3d6cc0a80102', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:03:55', '2011-06-19 20:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `eva_model_columns`
--

CREATE TABLE IF NOT EXISTS `eva_model_columns` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `length` varchar(255) DEFAULT NULL,
  `eva_model_id` varchar(36) NOT NULL,
  `allowNull` tinyint(1) DEFAULT NULL,
  `primarykey` tinyint(1) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_model_columns`
--

INSERT INTO `eva_model_columns` (`id`, `name`, `alias`, `type`, `length`, `eva_model_id`, `allowNull`, `primarykey`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc4816-7d9c-4fff-b48f-2d2d7445297b', 'id', '', 'integer', '11', '4dfc47df-5c98-4dac-94a0-2d427445297b', 0, 1, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:39:18', '2011-06-18 15:39:18'),
('4dfc482c-4c20-448f-93fc-2d1e7445297b', 'name', '', 'string', '255', '4dfc47df-5c98-4dac-94a0-2d427445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:39:40', '2011-06-18 15:39:40'),
('4dfc4837-07dc-4eec-b65a-2d377445297b', 'body', '', 'text', '', '4dfc47df-5c98-4dac-94a0-2d427445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:39:51', '2011-06-18 15:39:51'),
('4dfc486e-a1f0-4f6c-a971-2d107445297b', 'created', '', 'datetime', '', '4dfc47df-5c98-4dac-94a0-2d427445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:40:46', '2011-06-18 16:08:54'),
('4dfc4879-9b84-49b3-9807-2d187445297b', 'modified', '', 'datetime', '', '4dfc47df-5c98-4dac-94a0-2d427445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:40:57', '2011-06-18 15:40:57'),
('4dfc48a1-5040-46f5-879a-2d247445297b', 'id', '', 'integer', '11', '4dfc47e9-ae38-410b-a083-2d427445297b', 0, 1, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:41:37', '2011-06-18 15:41:37'),
('4dfc48b0-b21c-41d8-a916-2d337445297b', 'name', '', 'string', '255', '4dfc47e9-ae38-410b-a083-2d427445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:41:52', '2011-06-18 15:41:52'),
('4dfc48c4-7f74-4da6-a7f2-2d2a7445297b', 'body', '', 'text', '', '4dfc47e9-ae38-410b-a083-2d427445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:42:12', '2011-06-18 15:42:12'),
('4dfc48d5-b190-465d-b058-2d1e7445297b', 'post_id', '', 'integer', '11', '4dfc47e9-ae38-410b-a083-2d427445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:42:29', '2011-06-18 15:42:29'),
('4dfc48ea-b6b8-4784-a9d5-2d157445297b', 'created', '', 'datetime', '', '4dfc47e9-ae38-410b-a083-2d427445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:42:50', '2011-06-18 15:42:50'),
('4dfc48ff-be70-4073-ad1c-2d187445297b', 'modified', '', 'datetime', '', '4dfc47e9-ae38-410b-a083-2d427445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 15:43:11', '2011-06-18 15:43:11'),
('4dfc9380-e4bc-4605-84c6-329a7445297b', 'id', '', 'integer', '11', '4dfc9350-2744-4efa-8ee0-32907445297b', 0, 1, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:01:04', '2011-06-18 21:01:04'),
('4dfc93a1-8a5c-4e93-8d30-30c77445297b', 'username', '', 'string', '255', '4dfc9350-2744-4efa-8ee0-32907445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:01:37', '2011-06-18 21:01:47'),
('4dfc93c6-82b8-4dee-8cda-32a97445297b', 'email', '', 'string', '255', '4dfc9350-2744-4efa-8ee0-32907445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:02:14', '2011-06-19 03:24:13'),
('4dfc93e0-1420-4cf9-8638-32407445297b', 'password', '', 'string', '255', '4dfc9350-2744-4efa-8ee0-32907445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:02:40', '2011-06-18 21:02:40'),
('4dfc93f6-fc28-443e-8849-32907445297b', 'created', '', 'datetime', '', '4dfc9350-2744-4efa-8ee0-32907445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:03:02', '2011-06-18 21:03:02'),
('4dfc9405-65f4-4a1a-b129-32d07445297b', 'modified', '', 'datetime', '', '4dfc9350-2744-4efa-8ee0-32907445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:03:17', '2011-06-19 03:24:58'),
('4dfc949b-5d90-4c67-8add-32c97445297b', 'id', '', 'integer', '11', '4dfc945b-bb9c-4ee3-817d-31797445297b', 0, 1, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:05:47', '2011-06-18 21:05:47'),
('4dfc94af-21c8-4b5f-bfc7-32d07445297b', 'name', '', 'string', '255', '4dfc945b-bb9c-4ee3-817d-31797445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:06:07', '2011-06-18 21:06:07'),
('4dfc94ca-fe48-4c1f-a04b-329a7445297b', 'body', '', 'text', '', '4dfc945b-bb9c-4ee3-817d-31797445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:06:34', '2011-06-18 21:06:34'),
('4dfc94db-ecec-45a2-a7fe-30c77445297b', 'user_id', '', 'integer', '11', '4dfc945b-bb9c-4ee3-817d-31797445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:06:51', '2011-06-18 21:06:51'),
('4dfc9510-6ca4-4682-bb3d-32c97445297b', 'created', '', 'datetime', '', '4dfc945b-bb9c-4ee3-817d-31797445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:07:44', '2011-06-18 21:07:44'),
('4dfc9521-73c0-4ac3-bca4-32907445297b', 'modified', '', 'datetime', '', '4dfc945b-bb9c-4ee3-817d-31797445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:08:01', '2011-06-18 21:08:01'),
('4dfc9a61-6b4c-477e-8308-346d7445297b', 'id', '', 'integer', '11', '4dfc9476-7130-42de-a4ab-30c77445297b', 0, 1, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:30:25', '2011-06-18 21:30:25'),
('4dfc9a75-a228-4983-9b1a-347b7445297b', 'name', '', 'string', '255', '4dfc9476-7130-42de-a4ab-30c77445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:30:45', '2011-06-18 21:30:45'),
('4dfc9a8a-a7b4-414c-915b-34687445297b', 'body', '', 'text', '', '4dfc9476-7130-42de-a4ab-30c77445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:31:06', '2011-06-18 21:31:06'),
('4dfc9aab-b6b0-4393-94b0-34797445297b', 'created', '', 'datetime', '', '4dfc9476-7130-42de-a4ab-30c77445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:31:39', '2011-06-18 21:31:39'),
('4dfc9abc-5998-4146-b0ca-34807445297b', 'modified', '', 'datetime', '', '4dfc9476-7130-42de-a4ab-30c77445297b', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-18 21:31:56', '2011-06-18 21:31:56'),
('4dfccc8e-aa30-4bfe-910f-38737445297b', 'id', '', 'integer', '11', '4dfccc5a-4bdc-4313-bae4-35407445297b', 0, 1, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:04:30', '2011-06-19 01:04:30'),
('4dfccca8-87d4-4fd1-81d6-38417445297b', 'post_id', '', 'integer', '11', '4dfccc5a-4bdc-4313-bae4-35407445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:04:56', '2011-06-19 01:04:56'),
('4dfcccc4-65b4-499e-b3b2-382c7445297b', 'tag_id', '', 'integer', '11', '4dfccc5a-4bdc-4313-bae4-35407445297b', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:05:24', '2011-06-19 01:05:24'),
('4dfdd813-b274-4782-bc2b-3d6cc0a80102', 'id', '', 'integer', '11', '4dfdd79b-de50-4d34-b649-3d75c0a80102', 0, 1, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:05:55', '2011-06-19 20:05:55'),
('4dfdd84c-22fc-4432-b2ea-00b5c0a80102', 'name', '', 'string', '255', '4dfdd79b-de50-4d34-b649-3d75c0a80102', 0, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:06:52', '2011-06-19 20:06:52'),
('4dfdd884-3874-49ad-989a-3d75c0a80102', 'body', '', 'text', '', '4dfdd79b-de50-4d34-b649-3d75c0a80102', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:07:48', '2011-06-19 20:07:48'),
('4dfdd8c9-f6dc-464b-b664-3d7dc0a80102', 'created', '', 'datetime', '', '4dfdd79b-de50-4d34-b649-3d75c0a80102', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:08:57', '2011-06-19 20:08:57'),
('4dfdd8fa-d810-4dbe-ac7d-4e9dc0a80102', 'modified', '', 'datetime', '', '4dfdd79b-de50-4d34-b649-3d75c0a80102', 1, 0, 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:09:46', '2011-06-19 20:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `eva_model_column_rule_details`
--

CREATE TABLE IF NOT EXISTS `eva_model_column_rule_details` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `allowEmpty` tinyint(1) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  `last` tinyint(1) DEFAULT NULL,
  `on` varchar(255) DEFAULT NULL,
  `eva_column_rule_id` varchar(36) NOT NULL,
  `eva_basic_rule_id` varchar(36) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eva_model_column_rule_details`
--

INSERT INTO `eva_model_column_rule_details` (`id`, `name`, `message`, `allowEmpty`, `required`, `last`, `on`, `eva_column_rule_id`, `eva_basic_rule_id`, `deleted`, `deleted_date`, `created_by`, `modified_by`, `created`, `modified`) VALUES
('4dfc5291-99e8-4652-b2c2-2d247445297b', 'PostNameNotNull', 'Please Fill your name', 0, 0, 0, '', '4dfc516b-94ac-482c-be04-2dd07445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:24:01', '2011-06-18 16:24:01'),
('4dfc52b4-99d4-4a2c-ac7c-2e077445297b', 'PostBodyNotNull', 'plase fill your text', 0, 0, 0, '', '4dfc51cf-96e8-4be2-a4fd-2e077445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:24:36', '2011-06-18 16:24:36'),
('4dfc52e7-a6ec-4e7c-b87d-2e0e7445297b', 'CommentNameNotNull', 'Please Fill your name', 0, 0, 0, '', '4dfc51ec-4d30-4c82-b649-2e0e7445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:25:27', '2011-06-18 16:25:27'),
('4dfc530c-3234-4f91-b857-2e207445297b', 'CommentTextNotNull', 'plase fill your text', 0, 0, 0, '', '4dfc5206-fb70-43fe-872f-2e207445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-18 16:26:04', '2011-06-18 16:26:04'),
('4dfcd2a4-36d8-4307-ae4b-38287445297b', 'Comment_PostIdNotNull', 'Please Fill Your Post Id', 0, 0, 0, '', '4dfcd158-ae3c-40c5-b2b7-38417445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:30:28', '2011-06-19 01:30:28'),
('4dfcd2f7-d490-48e4-b3bb-38417445297b', 'UserNameNotNull', 'Please Fill Your Username', 0, 0, 0, '', '4dfcd00d-8bb8-4837-be5d-38417445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:31:51', '2011-06-19 01:31:51'),
('4dfcd315-1d08-4403-b32b-38957445297b', 'UserEmailNotNull', 'Please Fill Your Email', 0, 0, 0, '', '4dfcd024-7274-454e-8bf6-38957445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:32:21', '2011-06-19 01:32:21'),
('4dfcd394-2b84-4a27-9198-37767445297b', 'UserPasswordNotNull', 'Please Fill Your Password', 0, 0, 0, '', '4dfcd05f-3558-4516-a88d-37767445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:34:28', '2011-06-19 01:34:28'),
('4dfcd3ca-b140-4fab-95a9-35407445297b', 'UserProfileNotNull', 'Please Fill Your Name', 0, 0, 0, '', '4dfcd0ac-3cc8-4278-98fa-374a7445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:35:22', '2011-06-19 01:35:22'),
('4dfcd3e9-0d24-493f-ae67-374a7445297b', 'TagNameNotNull', 'Please Fill Your Tag Name', 0, 0, 0, '', '4dfcd0c0-95f4-48ba-84be-373d7445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:35:53', '2011-06-19 01:35:53'),
('4dfcd42d-1384-4636-8bdf-373d7445297b', 'PostTag_PostIdNotNull', 'Please Select Your Post Id', 0, 0, 0, '', '4dfcd100-2378-4fc7-a921-38287445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:37:01', '2011-06-19 01:37:01'),
('4dfcd461-3a68-4fc4-a91c-38737445297b', 'PostTag_TagIdNotNull', 'Please Select Your Tag Id', 0, 0, 0, '', '4dfcd116-822c-4947-a543-38737445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:37:53', '2011-06-19 01:37:53'),
('4dfcd4ef-d4cc-44cb-aa20-37767445297b', 'UserProfile_UserIdNameNotNull', 'Please Select Your User Id', 0, 0, 0, '', '4dfcd175-cd40-40ca-8bd7-382c7445297b', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 01:40:15', '2011-06-19 01:40:15'),
('4dfdd96a-d484-4801-80fb-3d6bc0a80102', 'StudentNameNotNull', 'Isi ki nama ta nach', 0, 0, 0, '', '4dfdd92e-0d28-4365-8a65-4e86c0a80102', '4df898f1-3990-4bf9-917d-04e97445297b', 0, '0000-00-00 00:00:00', '', '', '2011-06-19 20:11:38', '2011-06-19 20:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `wwwsqldesigners`
--

CREATE TABLE IF NOT EXISTS `wwwsqldesigners` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `xmldata` text,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `sqldata` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
