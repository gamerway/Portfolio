-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	4.1.13-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bankifscold
--

--
-- Table structure for table `bankifscold`.`account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `name` varchar(50) default NULL,
  `address` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `phone` varchar(50) default NULL,
  `adharno` varchar(50) default NULL,
  `gender` varchar(50) default NULL,
  `balance` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `accno` varchar(50) default NULL,
  `pin` varchar(50) default NULL,
  `maxamount` varchar(50) default NULL,
  `status` varchar(50) default 'unlock',
  `bankname` varchar(50) default NULL,
  `ifsc` varchar(50) default NULL,
  UNIQUE KEY `accno` (`accno`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `adharno` (`adharno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankifscold`.`account`
--

/*!40000 ALTER TABLE `account` DISABLE KEYS */;

/*!40000 ALTER TABLE `account` ENABLE KEYS */;


--
-- Table structure for table `bankifscold`.`bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `address` varchar(50) default NULL,
  `ifsc` varchar(50) default NULL,
  `phone` varchar(50) default NULL,
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  UNIQUE KEY `name` (`name`),
  KEY `bank_id` (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankifscold`.`bank`
--

/*!40000 ALTER TABLE `bank` DISABLE KEYS */;

/*!40000 ALTER TABLE `bank` ENABLE KEYS */;


--
-- Table structure for table `bankifscold`.`login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankifscold`.`login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;

/*!40000 ALTER TABLE `login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
