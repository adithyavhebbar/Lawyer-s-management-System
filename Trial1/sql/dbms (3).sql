-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2019 at 05:57 AM
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
DROP PROCEDURE IF EXISTS `noc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `noc` ()  select count(case_id)
from cases$$

DROP PROCEDURE IF EXISTS `nog`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nog` ()  select count(email_id)
from customer$$

DROP PROCEDURE IF EXISTS `nol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nol` ()  NO SQL
select count(regno)
from lawyers$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('abc', '123'),
('mno', '123'),
('pqr', '123'),
('xyz', '123'),
('ijk', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_title` varchar(50) NOT NULL,
  `cs_date` date NOT NULL,
  `cc_date` date NOT NULL,
  `c_type` varchar(20) DEFAULT NULL,
  `judgement` varchar(20) NOT NULL,
  `court_abv` varchar(2) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `court_abv` (`court_abv`),
  KEY `place_id` (`place_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `case_title`, `cs_date`, `cc_date`, `c_type`, `judgement`, `court_abv`, `place_id`) VALUES
(7, 'fh', '2019-11-12', '2019-11-13', 'legal', 'given', 'dc', 4);

-- --------------------------------------------------------

--
-- Table structure for table `clawyer`
--

DROP TABLE IF EXISTS `clawyer`;
CREATE TABLE IF NOT EXISTS `clawyer` (
  `case_id` int(11) NOT NULL,
  `lawyer1` smallint(6) DEFAULT NULL,
  `lawyer2` smallint(6) DEFAULT NULL,
  `lawyer3` smallint(6) DEFAULT NULL,
  `lawyer4` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `lawyer1` (`lawyer1`),
  KEY `lawyer2` (`lawyer2`),
  KEY `lawyer3` (`lawyer3`),
  KEY `lawyer4` (`lawyer4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clawyer`
--

INSERT INTO `clawyer` (`case_id`, `lawyer1`, `lawyer2`, `lawyer3`, `lawyer4`) VALUES
(7, 5, 6, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

DROP TABLE IF EXISTS `court`;
CREATE TABLE IF NOT EXISTS `court` (
  `court_abv` varchar(2) NOT NULL,
  `court_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`court_abv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_abv`, `court_name`) VALUES
('dc', 'District Court'),
('hc', 'High Court'),
('sc', 'Supreme Court');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `email_id` varchar(50) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email_id`, `password`) VALUES
('defaullt', '123'),
('dyuthi', '123'),
('divya', '123'),
('chandana', '123'),
('likhitha', '123');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `regno` smallint(6) NOT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `court_abv` varchar(2) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`regno`),
  KEY `court_abv` (`court_abv`),
  KEY `place_id` (`place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`regno`, `designation`, `court_abv`, `place_id`) VALUES
(26, 'advocate', 'dc', 1),
(28, 'advocate', 'dc', 1),
(29, 'advocate', 'dc', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `final_rating`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `final_rating`;
CREATE TABLE IF NOT EXISTS `final_rating` (
`regno` smallint(6)
,`rating` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lage`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `lage`;
CREATE TABLE IF NOT EXISTS `lage` (
);

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

DROP TABLE IF EXISTS `lawyers`;
CREATE TABLE IF NOT EXISTS `lawyers` (
  `regno` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `doorno` varchar(20) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `locality` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `pincode` varchar(7) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `pctype` varchar(30) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`regno`, `name`, `gender`, `dob`, `doorno`, `street`, `locality`, `city`, `state`, `pincode`, `contact_no`, `email_id`, `pctype`) VALUES
(26, 'divya', 'f', '2019-10-09', '764', '1 main road', 'kengeri', 'bangalore', 'karnataka', '560060', '9945605255', 'divya@gmail.com', 'criminal'),
(28, 'Ramya', 'female', '2000-12-21', '98', 'c street', 'frazer town', 'bangalore', 'karnataka', '560060', '9999999999', 'ramya@gmail.com', 'legal'),
(29, 'kavya', 'female', '2000-12-21', '98', 'c street', 'frazer town', 'bangalore', 'karnataka', '560060', '9999999999', 'ramya@gmail.com', 'legal');

--
-- Triggers `lawyers`
--
DROP TRIGGER IF EXISTS `rates`;
DELIMITER $$
CREATE TRIGGER `rates` AFTER INSERT ON `lawyers` FOR EACH ROW BEGIN
update rating
set rating=0
where email_id='default';
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `regno` smallint(6) NOT NULL,
  `psw` varchar(20) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`regno`, `psw`) VALUES
(28, 'aem8b2rt'),
(26, '123'),
(29, '4dh75eon');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_name`) VALUES
(1, 'Bangalore'),
(2, 'chennai'),
(3, 'Delhi'),
(4, 'kolkatta');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `regno` smallint(6) NOT NULL,
  `llb` varchar(4) NOT NULL,
  `llm` varchar(4) DEFAULT NULL,
  `mphil` varchar(4) DEFAULT NULL,
  `phd` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`regno`, `llb`, `llm`, `mphil`, `phd`) VALUES
(26, 'yes', 'yes', 'no', 'yes'),
(28, 'yes', 'yes', 'no', 'no'),
(29, 'yes', 'yes', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `email_id` varchar(50) NOT NULL,
  `regno` smallint(6) NOT NULL,
  `rating` int(11) DEFAULT '0',
  PRIMARY KEY (`email_id`,`regno`),
  KEY `regno` (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`email_id`, `regno`, `rating`) VALUES
('default', 29, 0),
('default', 28, 0),
('dyuthi', 26, 5);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `regno` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doorno` varchar(5) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `locality` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `pincode` varchar(8) DEFAULT NULL,
  `contact_no` varchar(11) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `pctype` varchar(20) DEFAULT NULL,
  `llb` varchar(4) DEFAULT NULL,
  `llm` varchar(4) DEFAULT NULL,
  `mphil` varchar(4) DEFAULT NULL,
  `phd` varchar(4) DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `court_abv` varchar(5) DEFAULT NULL,
  `place_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`regno`, `name`, `gender`, `dob`, `doorno`, `street`, `locality`, `city`, `state`, `pincode`, `contact_no`, `email_id`, `pctype`, `llb`, `llm`, `mphil`, `phd`, `designation`, `court_abv`, `place_id`) VALUES
(26, 'divya', 'f', '2019-10-09', '764', '1 main road', 'kengeri', 'bangalore', 'karnataka', '560060', '9483203425', 'divya@gmail.com', 'criminal', 'yes', 'yes', 'no', 'no', 'advocate', 'dc', 1),
(28, 'Ramya', 'female', '2000-12-21', '98', 'c street', 'frazer town', 'bangalore', 'karnataka', '560060', '8888888888', 'ramya@gmail.com', 'legal', 'yes', 'yes', 'no', 'no', 'advocate', 'dc', 1);

-- --------------------------------------------------------

--
-- Structure for view `final_rating`
--
DROP TABLE IF EXISTS `final_rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `final_rating`  AS  select `r`.`regno` AS `regno`,avg(`r`.`rating`) AS `rating` from `rating` `r` group by `r`.`regno` ;

-- --------------------------------------------------------

--
-- Structure for view `lage`
--
DROP TABLE IF EXISTS `lage`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lage`  AS  select `l`.`regno` AS `regno`,`l`.`name` AS `name`,`l`.`gender` AS `gender`,timestampdiff(YEAR,`l`.`dob`,curdate()) AS `age`,`l`.`doorno` AS `doorno`,`l`.`street` AS `street`,`l`.`locality` AS `locality`,`l`.`city` AS `city`,`l`.`state` AS `state`,`l`.`pincode` AS `pincode`,`l`.`contact_no` AS `contact_no`,`l`.`email_id` AS `email_id`,`l`.`pcttype` AS `pcttype`,`q`.`llb` AS `llb`,`q`.`llm` AS `llm`,`q`.`mphil` AS `mphil`,`q`.`phd` AS `phd`,`e`.`ayearsdc` AS `ayearsdc`,`e`.`ayearshc` AS `ayearshc`,`e`.`ayearssc` AS `ayearssc`,`e`.`jyearsdc` AS `jyearsdc`,`e`.`jyearshc` AS `jyearshc`,`e`.`jyearssc` AS `jyearssc`,`d`.`designation` AS `designation`,`d`.`court_abv` AS `court_abv`,`d`.`place_id` AS `place_id`,`d`.`since` AS `since` from (((`lawyers` `l` join `qualification` `q`) join `experience` `e`) join `designation` `d`) where ((`l`.`regno` = `q`.`regno`) and (`l`.`regno` = `e`.`regno`) and (`l`.`regno` = `d`.`regno`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
