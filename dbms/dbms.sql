-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2018 at 03:16 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `case_title`, `cs_date`, `cc_date`, `c_type`, `judgement`, `court_abv`, `place_id`) VALUES
(5, 'chocolate', '2018-11-02', '2018-11-24', 'criminal', 'PENDING', 'dc', 1),
(6, 'abc', '2018-11-07', '2018-11-07', 'criminal', 'GIVEN', 'dc', 2);

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
(5, 7, 8, 9, 10),
(6, 7, 8, 9, 10);

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
  `since` int(11) DEFAULT NULL,
  PRIMARY KEY (`regno`),
  KEY `court_abv` (`court_abv`),
  KEY `place_id` (`place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`regno`, `designation`, `court_abv`, `place_id`, `since`) VALUES
(24, 'Advocate', 'sc', 3, 0),
(10, 'Advocate', 'dc', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `regno` smallint(6) NOT NULL,
  `ayearsdc` int(11) DEFAULT NULL,
  `ayearshc` int(11) DEFAULT NULL,
  `ayearssc` int(11) DEFAULT NULL,
  `jyearsdc` int(11) DEFAULT NULL,
  `jyearshc` int(11) DEFAULT NULL,
  `jyearssc` int(11) DEFAULT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`regno`, `ayearsdc`, `ayearshc`, `ayearssc`, `jyearsdc`, `jyearshc`, `jyearssc`) VALUES
(24, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `judgement`
--

DROP TABLE IF EXISTS `judgement`;
CREATE TABLE IF NOT EXISTS `judgement` (
  `case_id` int(11) NOT NULL,
  `jto1` smallint(6) DEFAULT '0',
  `jto2` smallint(6) DEFAULT '0',
  `jto3` smallint(6) DEFAULT '0',
  `jto4` smallint(6) DEFAULT '0',
  PRIMARY KEY (`case_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judgement`
--

INSERT INTO `judgement` (`case_id`, `jto1`, `jto2`, `jto3`, `jto4`) VALUES
(5, 7, 8, 0, 0),
(6, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lage`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `lage`;
CREATE TABLE IF NOT EXISTS `lage` (
`regno` smallint(6)
,`name` varchar(50)
,`gender` char(1)
,`age` bigint(21)
,`doorno` varchar(20)
,`street` varchar(50)
,`locality` varchar(50)
,`city` varchar(30)
,`state` varchar(30)
,`pincode` varchar(7)
,`contact_no` varchar(10)
,`email_id` varchar(50)
,`pcttype` varchar(30)
,`llb` year(4)
,`llm` year(4)
,`mphil` year(4)
,`phd` year(4)
,`ayearsdc` int(11)
,`ayearshc` int(11)
,`ayearssc` int(11)
,`jyearsdc` int(11)
,`jyearshc` int(11)
,`jyearssc` int(11)
,`designation` varchar(30)
,`court_abv` varchar(2)
,`place_id` int(11)
,`since` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

DROP TABLE IF EXISTS `lawyers`;
CREATE TABLE IF NOT EXISTS `lawyers` (
  `regno` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `doorno` varchar(20) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `locality` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `pincode` varchar(7) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `pcttype` varchar(30) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`regno`, `name`, `gender`, `dob`, `doorno`, `street`, `locality`, `city`, `state`, `pincode`, `contact_no`, `email_id`, `pcttype`) VALUES
(24, 'harshitha', 'f', '2008-03-05', '764', '1 main road', 'kengeri', 'bangalore', 'karnataka', '560060', '9945605255', 'xyz@gmail.com', 'criminal'),
(10, 'nisha', 'f', '2018-11-02', '744', '1 main road', 'kengeri', 'bangalore', 'karnataka', '574116', '9945605255', 'xyz@gmail.com', 'criminal');

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
(24, 'd43k0glq'),
(10, 'vhmdioju');

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
  `llb` year(4) NOT NULL,
  `llm` year(4) DEFAULT NULL,
  `mphil` year(4) DEFAULT NULL,
  `phd` year(4) DEFAULT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`regno`, `llb`, `llm`, `mphil`, `phd`) VALUES
(24, 2018, 0000, 0000, 0000),
(10, 2018, 2018, 2018, 2018);

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
('chandana', 10, 5),
('dyuthi', 24, 1),
('dyuthi', 10, 3),
('divya', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `regno` smallint(6) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doorno` varchar(5) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `locality` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `pincode` varchar(8) DEFAULT NULL,
  `contact_no` varchar(11) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `pcttype` varchar(20) DEFAULT NULL,
  `llb` year(4) DEFAULT NULL,
  `llm` year(4) DEFAULT NULL,
  `mphil` year(4) DEFAULT NULL,
  `phd` year(4) DEFAULT NULL,
  `ayearsdc` tinyint(4) DEFAULT NULL,
  `ayearshc` tinyint(4) DEFAULT NULL,
  `ayearssc` tinyint(4) DEFAULT NULL,
  `jyearsdc` tinyint(4) DEFAULT NULL,
  `jyearshc` tinyint(4) DEFAULT NULL,
  `jyearssc` tinyint(4) DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `court_abv` varchar(5) DEFAULT NULL,
  `place_id` tinyint(4) DEFAULT NULL,
  `since` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
