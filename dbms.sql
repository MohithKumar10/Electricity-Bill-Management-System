-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2019 at 08:44 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `selemp`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selemp` ()  select * from staff$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL DEFAULT 'new',
  `password` varchar(32) DEFAULT NULL,
  `empsal` int(20) NOT NULL,
  `id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `empsal`, `id`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 25000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `cid` int(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(5) NOT NULL,
  `amount` float NOT NULL,
  `tdate` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`,`month`,`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`cid`, `month`, `year`, `amount`, `tdate`, `status`) VALUES
(1334632704, 'Feb', 2019, 200, '2019-11-19', 0),
(1334632704, 'Jan', 2019, 800, '2019-11-19', 1),
(614249206, 'Apr', 2019, 1200, '2019-11-15', 0),
(614249206, 'Mar', 2019, 675, '2019-11-15', 0),
(614249206, 'Feb', 2019, 300, '2019-11-15', 0),
(614249206, 'Jan', 2019, 60, '2019-11-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `cid` int(20) NOT NULL,
  `contype` varchar(20) NOT NULL,
  `condate` varchar(18) NOT NULL,
  `conid` varchar(20) NOT NULL,
  `units` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `conid` (`conid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`cid`, `contype`, `condate`, `conid`, `units`) VALUES
(1334632704, 'industry', '2019-09-01', 'KA201904', 110),
(161543880, ' commercial', '2019-11-01', 'KA201903', 0),
(614249206, 'domestic', '2019-09-01', 'KA201901', 600),
(1685362630, 'domestic', '2019-08-04', 'KA201902', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rc`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `rc`;
CREATE TABLE IF NOT EXISTS `rc` (
`cid` int(20)
,`conid` varchar(20)
,`fname` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `sid` int(3) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `dob` varchar(16) NOT NULL,
  `doj` varchar(16) NOT NULL,
  `salary` int(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=2066879676 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `fname`, `lname`, `email`, `contact`, `dob`, `doj`, `salary`, `password`, `gender`, `status`) VALUES
(716659053, 'Sandeep', 'Ronad', 'sandeepronad@gmail.com', '9113230589', '1999-04-30', '2019-08-01', 25000, '12345', 'Male', 1);

--
-- Triggers `staff`
--
DROP TRIGGER IF EXISTS `empsal`;
DELIMITER $$
CREATE TRIGGER `empsal` AFTER INSERT ON `staff` FOR EACH ROW BEGIN
    	UPDATE admin set empsal=(admin.empsal+new.salary);
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `empsalu`;
DELIMITER $$
CREATE TRIGGER `empsalu` AFTER UPDATE ON `staff` FOR EACH ROW BEGIN
    	UPDATE admin set empsal=(empsal-old.salary);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE IF NOT EXISTS `unit` (
  `con_type` varchar(20) NOT NULL,
  `unit_price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`con_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`con_type`, `unit_price`) VALUES
('domestic', 3),
('commercial', 5),
('industry', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `cid` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` varchar(18) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`email`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`cid`, `fname`, `lname`, `dob`, `gender`, `email`, `contact`, `address`, `password`, `status`) VALUES
(614249206, 'Sheshnath', 'Hadbe', '03-07-1998', 'Male', 'sheshnathhadbe@gmail.com', '9916363783', 'JSS STU Mysore', '12345', 1),
(1334632704, 'Naresh', 'Pawar', '1999-12-31', 'Male', 'naresh@gmail.com', '9925365487', 'JSS STU. Mysore', '12345', 0);

-- --------------------------------------------------------

--
-- Structure for view `rc`
--
DROP TABLE IF EXISTS `rc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rc`  AS  select `user`.`cid` AS `cid`,`connection`.`conid` AS `conid`,`user`.`fname` AS `fname` from (`user` join `connection` on((`user`.`cid` = `connection`.`cid`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
