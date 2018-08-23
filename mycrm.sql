-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 08:57 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `crmlogin`
--

CREATE TABLE `crmlogin` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crmlogin`
--

INSERT INTO `crmlogin` (`userid`, `username`, `password`, `Name`, `DOB`, `email`) VALUES
(1, 'dharmeshsingh', 'dharmesh', 'Dharmesh Singh', '1997-01-01', 'dharmeshsinghpaliwal@gmail.com'),
(2, 'diwakarmishra', 'diwakar', 'Diwakar Mishra', '1997-01-01', 'diwakarmishra@gmail.com'),
(3, 'gauravdixit', 'ishaan', 'Gaurav Dixit', '1997-07-05', 'dixitgaurav97@gmail.com'),
(4, 'nanditapandey', 'pandey', 'Nandita Pandey', '1996-01-01', 'nanditapandey@gmail.com'),
(5, 'shwetanknaveen', 'shwetank', 'Shwetank Singh', '1996-01-01', 'shwetanknaveen@gmail.com'),
(8, 'mintuvishwa', 'mintu', 'Mintu Vishwakarma', '1997-01-01', 'mintu@gmail.com'),
(13, 'mayankpshahi', 'mayank', 'Mayank Pratap Shahi', '1996-01-01', 'mayankpshahi239@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE `opportunity` (
  `userid` int(11) NOT NULL,
  `opportunityid` varchar(10) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`userid`, `opportunityid`, `firstname`, `lastname`, `dob`, `address`) VALUES
(1, '1-1234', 'Kirti', 'Rathore', '1996-01-23', 'Farukhhabad,UP'),
(1, '1-123456', 'Payal', 'Singh', '1996-12-25', 'Lucknow,UP'),
(3, '1-1235', 'Sarwar', 'Ansari', '1996-01-01', 'Deoria,UP'),
(5, '2-456', 'Manas', 'Yadav', '1996-06-12', 'Varanasi, UP'),
(4, '3-456', 'Shikha', 'Gupta', '1996-06-25', 'Varanasi,UP');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `PolId` varchar(20) NOT NULL,
  `UserId` int(20) NOT NULL,
  `OppId` varchar(20) NOT NULL,
  `AccName` text NOT NULL,
  `PolType` text NOT NULL,
  `StDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `CovAmt` int(20) NOT NULL,
  `Segment` varchar(20) NOT NULL,
  `AgCode` varchar(20) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`PolId`, `UserId`, `OppId`, `AccName`, `PolType`, `StDate`, `EndDate`, `CovAmt`, `Segment`, `AgCode`, `Fname`, `Lname`, `DOB`, `Status`) VALUES
('P1234', 3, '2-456', 'TCS India Ltd', 'Worker''s Comp', '2018-06-04', '2018-06-28', 20000, 'Half', 'ASD12', 'Gaurav', 'Dixit', '2018-06-07', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `userid` int(11) NOT NULL,
  `quoteid` varchar(15) NOT NULL,
  `quotenumber` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `approver` varchar(35) NOT NULL,
  `comments` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`userid`, `quoteid`, `quotenumber`, `amount`, `approver`, `comments`) VALUES
(1, '1-ER2345', 12345, '1000', 'Ram Charan', 'Approved'),
(3, '1-ER2346', 2345, '10000', 'Suresh Singh', 'Approved'),
(3, '1-ER2347', 5859, '15000', 'Suresh Singh', 'Approved'),
(1, '1-ER8976', 11111, '2500', 'Gaurav Dixit', 'Not Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crmlogin`
--
ALTER TABLE `crmlogin`
  ADD PRIMARY KEY (`userid`) USING BTREE;

--
-- Indexes for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD PRIMARY KEY (`opportunityid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`PolId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `OppId` (`OppId`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quoteid`),
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crmlogin`
--
ALTER TABLE `crmlogin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD CONSTRAINT `opportunity_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `crmlogin` (`userid`);

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `policy_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `crmlogin` (`userid`),
  ADD CONSTRAINT `policy_ibfk_2` FOREIGN KEY (`OppId`) REFERENCES `opportunity` (`opportunityid`);

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `crmlogin` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
