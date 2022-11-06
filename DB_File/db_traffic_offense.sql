-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2022-09-21 10:56:01
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for db_traffic_offense
DROP DATABASE IF EXISTS `db_traffic_offense`;
CREATE DATABASE IF NOT EXISTS `db_traffic_offense` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_traffic_offense`;


-- Dumping structure for table db_traffic_offense.tb_area
DROP TABLE IF EXISTS `tb_area`;
CREATE TABLE IF NOT EXISTS `tb_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) DEFAULT NULL,
  `area_gmap_link` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_traffic_offense.tb_area: ~3 rows (approximately)
DELETE FROM `tb_area`;
/*!40000 ALTER TABLE `tb_area` DISABLE KEYS */;
INSERT INTO `tb_area` (`area_id`, `area_name`, `area_gmap_link`, `added_by`, `entry_time`) VALUES
	(1, 'Khulshi', 'link', 'Admin', '2022-04-09 08:57:04'),
	(2, 'Panchlaish', 'link', 'Admin', '2022-04-09 08:58:28'),
	(3, 'Chawkbazar', 'link', 'Admin', '2022-04-09 08:59:05');
/*!40000 ALTER TABLE `tb_area` ENABLE KEYS */;


-- Dumping structure for table db_traffic_offense.tb_offense
DROP TABLE IF EXISTS `tb_offense`;
CREATE TABLE IF NOT EXISTS `tb_offense` (
  `offense_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `offense_code` int(11) DEFAULT NULL,
  `offense_name` varchar(255) DEFAULT NULL,
  `offense_description` varchar(255) DEFAULT NULL,
  `offense_fine` double DEFAULT NULL,
  `offense_added_on` varchar(255) DEFAULT NULL,
  `offense_added_time` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`offense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_traffic_offense.tb_offense: ~2 rows (approximately)
DELETE FROM `tb_offense`;
/*!40000 ALTER TABLE `tb_offense` DISABLE KEYS */;
INSERT INTO `tb_offense` (`offense_id`, `offense_code`, `offense_name`, `offense_description`, `offense_fine`, `offense_added_on`, `offense_added_time`, `added_by`, `entry_time`) VALUES
	(1, 262737, 'Driving without Liscense', 'This is a traffic offense for driving without liscense.', 2000, '04/14/2022', '11:00 AM', 'Admin', '2022-04-14 06:53:21'),
	(2, 762403, 'Driving Over Speed Limit', 'This is a traffic offence for driving over speed limit.', 1000, '04/14/2022', '11:15 AM', 'Admin', '2022-04-14 06:55:08');
/*!40000 ALTER TABLE `tb_offense` ENABLE KEYS */;


-- Dumping structure for table db_traffic_offense.tb_offense_record
DROP TABLE IF EXISTS `tb_offense_record`;
CREATE TABLE IF NOT EXISTS `tb_offense_record` (
  `offense_record_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `offense_record_code` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `parmanent_address` varchar(255) DEFAULT NULL,
  `driver_user_name` varchar(255) DEFAULT NULL,
  `license_no` varchar(255) DEFAULT NULL,
  `license_type` varchar(255) DEFAULT NULL,
  `ticket_no` varchar(255) DEFAULT NULL,
  `offense_name` varchar(255) DEFAULT NULL,
  `total_fine` double DEFAULT NULL,
  `offense_record_status` varchar(255) DEFAULT NULL,
  `officer_id` int(11) DEFAULT NULL,
  `officer_name` varchar(255) DEFAULT NULL,
  `officer_contact` varchar(255) DEFAULT NULL,
  `thana_name` varchar(255) DEFAULT NULL,
  `offense_record_added_date` varchar(255) DEFAULT NULL,
  `offense_record_added_time` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `offense_recorded_by` varchar(255) DEFAULT NULL,
  `record_verify_status` int(11) DEFAULT 0,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`offense_record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_traffic_offense.tb_offense_record: ~0 rows (approximately)
DELETE FROM `tb_offense_record`;
/*!40000 ALTER TABLE `tb_offense_record` DISABLE KEYS */;
INSERT INTO `tb_offense_record` (`offense_record_id`, `offense_record_code`, `first_name`, `last_name`, `contact_number`, `civil_status`, `nationality`, `date_of_birth`, `present_address`, `parmanent_address`, `driver_user_name`, `license_no`, `license_type`, `ticket_no`, `offense_name`, `total_fine`, `offense_record_status`, `officer_id`, `officer_name`, `officer_contact`, `thana_name`, `offense_record_added_date`, `offense_record_added_time`, `remarks`, `offense_recorded_by`, `record_verify_status`, `entry_time`) VALUES
	(1, 283601, 'Md Abdul', 'Jalil', '01854-754822', 'Married', 'Bangladeshi', '11/28/1996', '2 No. Gate, East Nasirabad', '2 No. Gate, East Nasirabad', 'Jalil', 'LN-6021542155', 'Professional', 'TN-60215425', 'Driving Over Speed Limit', 1000, 'Paid', 2, 'Muhammad Jakaria', '01854-715477', 'Khulshi Thana', '04/14/2022', '3:30 PM', 'He was driving over speed limit.', 'Jakaria', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_offense_record` ENABLE KEYS */;


-- Dumping structure for table db_traffic_offense.tb_thana
DROP TABLE IF EXISTS `tb_thana`;
CREATE TABLE IF NOT EXISTS `tb_thana` (
  `thana_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `thana_code` int(11) DEFAULT NULL,
  `thana_area` varchar(255) DEFAULT NULL,
  `thana_name` varchar(255) DEFAULT NULL,
  `thana_contact` varchar(255) DEFAULT NULL,
  `thana_address_details` varchar(255) DEFAULT NULL,
  `area_gmap_link` varchar(255) DEFAULT NULL,
  `thana_added_on` varchar(255) DEFAULT NULL,
  `thana_added_time` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`thana_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_traffic_offense.tb_thana: ~2 rows (approximately)
DELETE FROM `tb_thana`;
/*!40000 ALTER TABLE `tb_thana` DISABLE KEYS */;
INSERT INTO `tb_thana` (`thana_id`, `thana_code`, `thana_area`, `thana_name`, `thana_contact`, `thana_address_details`, `area_gmap_link`, `thana_added_on`, `thana_added_time`, `added_by`, `entry_time`) VALUES
	(1, 306726, 'Khulshi', 'Khulshi Model Thana', '01856-215477', 'Khulshi, Chattogram', 'Google Map Link Here...', '04/12/2022', '3:30 PM', 'Admin', '2022-04-12 11:27:21'),
	(2, 598265, 'Chawkbazar', 'Chawkbazar Thana', '01854-754855', 'Chawkbazar Chattogram', 'Google Map Link Here...', '04/13/2022', '4:30 PM', 'Admin', '2022-04-12 11:28:13');
/*!40000 ALTER TABLE `tb_thana` ENABLE KEYS */;


-- Dumping structure for table db_traffic_offense.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `thana` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `account_verify_status` int(11) DEFAULT 0,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_traffic_offense.tb_user: ~4 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `email`, `phone`, `nid`, `address`, `thana`, `user_name`, `password`, `user_type`, `account_verify_status`, `entry_time`) VALUES
	(1, 'Tazni', 'tazni@gmail.com', '01918839101', '6021542549', '2 No. Gate, East Nasirabad', '', 'Admin', '12345', 'Admin', 1, '2022-09-21 10:50:15'),
	(2, 'Muhammad Jakaria', 'jakaria459@gmail.com', '01854715477', '6021546654', 'Muradpur, Chattogram', 'Khulshi Thana', 'Jakaria', '12345', 'Police Officer', 1, '2022-04-09 08:26:17'),
	(4, 'Md Abdul Jalil', '', '01854754822', '6021554412', '2 No. Gate, East Nasirabad', '', 'Jalil', '12345', 'Driver', 1, '2022-04-14 15:07:52'),
	(6, 'Md Sayedur Rahma', 'sayed12.ctg@gmail.com', '01854215466', '6021542215', '2 No. Gate, East Nasirabad', 'Panchlaish Thana', 'Sayed', '123456', 'Police Officer', 0, '2022-09-21 05:40:28');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
