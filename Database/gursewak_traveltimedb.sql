-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 11:34 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gursewak_traveltimedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `Id` int(10) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Nationality` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Comment` varchar(50) NOT NULL,
  `FavouriteDestination` varchar(100) NOT NULL,
  `FavouriteAirline` varchar(50) NOT NULL,
  `Languages` varchar(50) NOT NULL,
  `Store` varchar(50) NOT NULL,
  `Picture` varchar(50) NOT NULL,
  `Specialty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`Id`, `FirstName`, `LastName`, `Email`, `Phone`, `Nationality`, `Address`, `City`, `Province`, `Country`, `Comment`, `FavouriteDestination`, `FavouriteAirline`, `Languages`, `Store`, `Picture`, `Specialty`) VALUES
(1, 'David', 'Matthews', 'david_matthews@gmail.com', '1114321678', 'USA', '23', 'Amsterdam', 'California', 'USA', '', 'Europe', 'British Airways', 'French, English', '1530 Toronto', 'images/Findanagent/David1.jpg', 'Honeymoon Package  Disney Land'),
(2, 'Kochi', 'Joseph', 'austin_black@gmail.com', '1116218777', 'Indian', '23', 'Kochin', 'Kerala', 'India', 'test', 'Sidney', 'Air India', 'Hindi, English', '4444 Amsterdam', 'images/Findanagent/David2.jpg', 'Pilgrimage '),
(3, 'Ashley', 'Smith', 'ashleysmith@yahoo.com', '666632221', 'Canadian', '334444', 'Calgary ', 'Alberta', 'Canada, USA', 'tttttttt', 'England', 'Air Canada', 'English, French', '4332 Winster', 'images/Findanagent/Ashley.jpg', 'Disney Land'),
(4, 'Tom', 'Taylor', 'tomtaylor@hotmail.com', '6476218743', 'Canada', '55', 'Rainwood', 'Ontario', 'Canada', 'Tom from Canada', 'London', 'Air Canada', 'English, French', '3214 New Dundee', 'images/Findanagent/Tom.jpg', 'World Tour'),
(5, 'Angela', 'Hill', 'angelahilla@gmail.com', '6437772244', 'Canada', '55', 'Edmonton', 'Alberta', 'Canada, USA', '', 'Paris', 'Air Canada', 'English', '4332 Rosedale', 'images/Findanagent/Angela.jpg', 'Disney Land'),
(7, 'Manoj', 'Mathew', 'manoj_mathew@yahoo.com', '6476338747', 'Indian', '17, Radwinter Drive', 'Toronto', 'ON', 'Canada', 'Na', 'Paris', 'Indian Airlines', 'English Hindi', '23 Humber College', 'images/Findanagent/Manoj.jpg', 'World tour');

-- --------------------------------------------------------

--
-- Table structure for table `agentcontact`
--

CREATE TABLE `agentcontact` (
  `Id` int(10) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL,
  `phoneno` int(10) DEFAULT NULL,
  `SenderEmail` varchar(30) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `agentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agentcontact`
--

INSERT INTO `agentcontact` (`Id`, `fname`, `lname`, `origin`, `destination`, `phoneno`, `SenderEmail`, `StartDate`, `ReturnDate`, `subject`, `message`, `agentId`) VALUES
(1, 'Midhu', 'Martin', 'Kochin', 'Toronto', 647, 'midhu_martin@yahoo.com', '2017-04-05', '2017-04-05', 'testing 555555', 'yyyyyy', 2),
(2, 'Midhu', 'Martin', 'Toronto', 'London', 66666, 'midhu_martin@yahoo.com', '2017-04-05', '2017-04-05', 'hello testing', 'this is a test', 0),
(3, 'Midhu', 'Martin', 'Edmonton', 'Toronto', 6470000, 'midhu_martin@yahoo.com', '2017-04-05', '2017-04-05', 'hello', 'hello', 0),
(4, 'Midhu', 'Martin', 'Kochi', 'Chennai', 647, 'midhu_martin@yahoo.com', '2017-04-05', '2017-04-05', 'hello', 'hello', 0),
(5, 'Midhu', 'Martin', 'Kochin', 'Toronto', 647, 'midhu_martin@yahoo.com', '2017-04-20', '2017-04-26', 'ttt', 'tttttt', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bookacar`
--

CREATE TABLE `bookacar` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `bookacar_id` int(11) NOT NULL,
  `pickup_loc` varchar(100) NOT NULL,
  `dropoff_loc` varchar(100) NOT NULL,
  `pickup_datetime` datetime NOT NULL,
  `dropoff_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookacar`
--

INSERT INTO `bookacar` (`id`, `Name`, `Email`, `Phone`, `bookacar_id`, `pickup_loc`, `dropoff_loc`, `pickup_datetime`, `dropoff_datetime`) VALUES
(9, 'test', 'test@gmail.com', '1234567897', 45, 'Pearson Airport', 'Pearson Airport', '2017-01-01 13:00:00', '2017-01-01 01:00:00'),
(10, 'test', 'test@gmail.com', '1234567897', 45, 'Pearson Airport', 'Pearson Airport', '2017-01-01 13:00:00', '2017-01-01 01:00:00'),
(11, 'test', 'test@gmail.com', '1234567897', 45, 'Pearson Airport', 'Pearson Airport', '2017-01-01 13:00:00', '2017-01-01 01:00:00'),
(12, 'test', 'test@gmail.com', '1234567897', 45, 'Pearson Airport', 'Pearson Airport', '2017-01-01 13:00:00', '2017-01-01 01:00:00'),
(15, 'Prabhninder Sandhu', 'ninder65@gmail.com', '2892000165', 45, 'Pearson Airport', 'Pearson Airport', '2017-01-01 13:00:00', '2017-01-01 12:59:00'),
(17, 'test', 'test@gmail.com', '2892000165', 33, 'Pearson Airport', 'Pearson Airport', '2017-01-01 01:00:00', '2017-03-01 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cardeals`
--

CREATE TABLE `cardeals` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardeals`
--

INSERT INTO `cardeals` (`id`, `name`, `description`, `price`, `image`) VALUES
(33, ' Toyoto Yaris', 'Unlimited mileage, Free cancellation, Pay at the counter', 12, 'yaris_lrg.jpg'),
(36, ' Jeep Cherokee', 'Unlimited mileage, Pay at the counter, Free cancellation', 19, '2.jpg'),
(37, 'Nissan Altima ', 'Unlimited mileage, Pay at the counter, Free cancellation', 17.88, 'altima_lrg.jpg'),
(38, 'Dodge Caravan', 'Unlimited mileage, Pay at the counter, Free cancellation', 23.2, '5.jpg'),
(39, 'Sonata', 'Unlimited mileage, Partial Payment Now & Balance at the Counter', 23, '1.jpg'),
(40, 'Ford Escape', 'Unlimited mileage, Pay at the counter, Free cancellation', 37.2, '3.jpg'),
(41, 'Corolla', 'Unlimited mileage, Pay Now Special', 16, 'corolla_lrg.jpg'),
(42, '  Honda Civic', 'Unlimited mileage, Pay at the counter', 25, '4.jpg'),
(43, 'Chrysler 300', '4 people, 3 bags, 2-4 doors, Automatic, A/C', 36, '6.jpg'),
(44, 'Camry', '5 people1 bag2-4 doorsAutomaticA/C', 28.2, 'camry_lrg.jpg'),
(45, 'Impala', '5 people1 bag2-4 doorsAutomaticA/C', 34, 'impala_lrg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `chat_time` datetime NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_name`, `chat_time`, `msg`) VALUES
(1, 'Gavy', '2017-04-09 03:13:57', 'Gavy58e9df35d5688'),
(3, 'XoXo', '2017-04-09 04:32:26', 'XoXo58e9f19a95118'),
(4, 'Weeknd', '2017-04-09 04:37:20', 'Weeknd58e9f2c02a190'),
(15, 'Gavvy', '2017-04-11 12:07:14', 'Gavvy58ecff32ce786'),
(19, 'Selim', '2017-04-17 15:26:02', 'Selim58f516caea6a4');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Id` int(10) NOT NULL,
  `CName` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Id`, `CName`, `Province`, `City`) VALUES
(0, '', '', ''),
(1, 'Canada', 'British Columbia', 'Prince George'),
(2, 'USA', 'California', 'Concord'),
(3, 'India', 'Kerala', 'Kochin'),
(4, 'Canada', 'British Columbia', 'Gardena'),
(5, 'Canada', 'British Columbia', 'Victoria'),
(8, 'Canada', 'Alberta', 'Edmonton'),
(9, 'Canada', 'Alberta', 'Calgary '),
(11, 'Canada', 'Ontario', 'Mississauga'),
(12, 'Canada', 'Saskatchewan', 'Regina'),
(13, 'USA', 'New York', 'Amsterdam'),
(14, 'USA', 'California', 'Dixon	'),
(15, 'Canada', 'Saskatchewan', 'Prince Albert'),
(16, 'Canada', 'Ontario', 'Brampton'),
(17, 'Canada', 'Ontario', 'Etobicoke'),
(18, 'Canada', 'Alberta', 'St. Albert'),
(19, 'Canada', 'Alberta', 'Red Deer '),
(20, 'Canada', 'British Columbia', 'Vancouver'),
(21, 'Canada', 'Quebec', 'Montreal'),
(22, 'Canada', 'Nova Scotia', 'Halifax'),
(23, 'Canada', 'New Brunswick', 'Fredericton'),
(24, 'Canada', 'Manitoba', 'Winnipeg'),
(25, 'Canada', 'Prince Edward Island	', 'Charlottetown	'),
(26, 'Canada', 'Newfoundland and Labrador', 'St. John\'s');

-- --------------------------------------------------------

--
-- Table structure for table `countryagenttravel`
--

CREATE TABLE `countryagenttravel` (
  `id` int(10) NOT NULL,
  `CountryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countryagenttravel`
--

INSERT INTO `countryagenttravel` (`id`, `CountryName`) VALUES
(1, 'Canada'),
(1, 'India'),
(2, 'Canada'),
(2, 'USA'),
(3, 'Canada'),
(3, 'India'),
(3, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `abbr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `abbr`) VALUES
(1, 'Indian Rupee', 'INR'),
(2, 'US Dollar', 'USD'),
(3, 'Australian Dollar', 'AUD'),
(4, 'Euro', 'EUR'),
(5, 'Egyptian Pound', 'EGP'),
(6, 'Chinese Yuan', 'CNY');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `reply` varchar(50) NOT NULL DEFAULT 'Pending',
  `replysubject` varchar(100) NOT NULL,
  `replymessage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `date`, `firstname`, `lastname`, `email`, `phone`, `title`, `message`, `reply`, `replysubject`, `replymessage`) VALUES
(51, '2017-04-18', 'P', 'Sandhu', 'ninder656666@gmail.com', '1289-200-0165', 'swdfe', 'wdefredw', 'done', 'efdg', 'dferdg'),
(52, '2017-04-19', 'Tejpal', 'Singh', 'singhtej955@gmail.com', '1289-200-0165', 'test1', 'Message1', 'done', 'title1', 'Thank you for contacting us we will process your request shortly '),
(53, '2017-04-19', 'Test', 'Test', 'ninder65@gmail.com', '1239-200-0165', 'Test', 'Test', 'Pending', '', ''),
(54, '2017-04-19', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', ''),
(55, '2017-04-12', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', ''),
(56, '2017-04-12', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', ''),
(57, '2017-04-12', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', ''),
(58, '2017-04-12', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', ''),
(59, '2017-04-12', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', ''),
(60, '2017-04-12', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', ''),
(61, '2017-04-12', 'Test', 'Test', 'ninder65@gmail.com', '1289-200-0165', 'Test', 'Test', 'Pending', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `giftcard`
--

CREATE TABLE `giftcard` (
  `Id` int(10) NOT NULL,
  `value1` int(10) NOT NULL,
  `CardDesign` varchar(30) NOT NULL,
  `Message` varchar(200) NOT NULL,
  `Deliverytype` varchar(10) DEFAULT NULL,
  `ReceiverName` varchar(30) NOT NULL,
  `ReceiverEmail` varchar(30) NOT NULL,
  `SenderName` varchar(30) NOT NULL,
  `SenderEmail` varchar(30) NOT NULL,
  `DeliveryDate` date NOT NULL,
  `Address1` varchar(30) NOT NULL,
  `Address2` varchar(30) NOT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Province` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `PostalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `giftcard`
--

INSERT INTO `giftcard` (`Id`, `value1`, `CardDesign`, `Message`, `Deliverytype`, `ReceiverName`, `ReceiverEmail`, `SenderName`, `SenderEmail`, `DeliveryDate`, `Address1`, `Address2`, `City`, `Province`, `Country`, `PostalCode`) VALUES
(2, 100, '10000', 'Fathers day', 'Post', 'Manu', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '0000-00-00', '17', 'Radwinter Drive', 'Toronto', 'ON', 'ON', 'M9V1P7'),
(4, 10, '10000', 'Fathers day', 'Post', 'Manu', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '0000-00-00', '17', 'Radwinter Drive', 'Toronto', 'ON', 'ON', 'M9V1P7'),
(5, 10, '10000', 'Fathers day', 'Post', 'Manu', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '0000-00-00', '17', 'Radwinter Drive', 'Toronto', 'ON', 'ON', 'M9V1P7'),
(6, 10, '10000', 'Fathers day', 'Post', 'Manu', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '0000-00-00', '17', 'Radwinter Drive', 'Toronto', 'ON', 'ON', 'M9V1P7'),
(7, 10, '10000', 'Fathers day', 'Post', 'Manu', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '0000-00-00', '17', 'Radwinter Drive', 'Toronto', 'ON', 'ON', 'M9V1P7'),
(8, 2000, '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', ''),
(9, 2000, 'Card4', 'ttttttttttttt', 'TEST', 'tttt', 'tttt', 'tttt', 'ttt', '0000-02-00', 'ttt', 'tttt', 'tttt', 'tttt', 'ttt', 'ttttt'),
(10, 2000, 'Card3', 'Hello', NULL, '', '', '', '', '0000-00-00', '', '', '', '', '', ''),
(11, 1000, 'Card5', 'Hello How are you?', 'TTtt', '', '', '', '', '0000-00-00', '', '', '', '', '', ''),
(12, 2000, 'Card6', 'hello', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '0000-00-00', '', '', '', '', '', ''),
(13, 2000, 'Card6', 'hi', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', '', '', '', ''),
(14, 5000, 'Card2', 'TESTING', 'POST', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-20', '17', 'Radwinter Drive', 'Toronto', 'Ontario', 'Canada', 'M9V1P7'),
(15, 2000, '', '', NULL, '', '', '', '', '2017-04-01', '', '', NULL, NULL, '', ''),
(16, 2000, 'Card3', '', NULL, '', '', '', '', '2017-04-01', '', '', NULL, NULL, '', ''),
(17, 5000, 'Card5', 'heeeeee', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', NULL, NULL, '', ''),
(18, 5000, 'Card5', 'hello', NULL, 'Manu Martin', '', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-20', '17', 'Radwinter Drive', 'Amsterdam', 'New York', 'USA', 'M9V1P7'),
(19, 1000, 'Card5', '', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', NULL, NULL, '', ''),
(20, 2000, 'Card5', '', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-20', '17', 'Radwinter Drive', 'Mississauga', 'Ontario', 'Canada', 'M9V1P7'),
(21, 5000, 'Card5', 'hellp', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', NULL, NULL, '', ''),
(22, 2000, 'Card5', 'helllo', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', NULL, NULL, '', ''),
(23, 2000, 'Card4', 'helllo', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', NULL, NULL, '', ''),
(24, 2000, 'Card5', 'helllo', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', NULL, NULL, '', ''),
(25, 5000, 'Card5', 'hello', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', NULL, 'selected', '', ''),
(26, 2000, 'Card4', 'Helllo', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '17', 'Radwinter Drive', 'Brampton', 'Ontario', 'Canada', 'M9V1P7'),
(27, 5000, 'Card5', 'Helllo', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-20', '', '', 'selected', 'selected', '', ''),
(28, 100, 'Card2', 'Testing email part', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'MIDHU', 'midhu_martin@yahoo.com', '2017-04-19', '', '', 'selected', 'selected', '', ''),
(29, 2000, 'Card6', 'mmmmmmmmmmmmmmm', NULL, 'MANU', 'manu_martin@yahoo.com', 'Midhu', 'midhu_martin@yahoo.com', '2017-04-01', '', '', '', '', '', ''),
(30, 2000, 'Card1', 'ddddddddddddddd', '', 'Manu Martin', '', 'Grace Martin', 'midhu_martin@yahoo.com', '2017-04-01', '17', 'Radwinter Drive', 'Amsterdam', 'New York', 'USA', 'M9V1P7'),
(31, 2000, 'Card2', 'xxxxxxx', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '17', 'Radwinter Drive', 'Prince Albert', 'Saskatchewan', 'Canada', 'M9V1P7'),
(32, 2000, 'Card4', 'Helllo', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', '', '', '', ''),
(33, 2000, 'Card14', 'eeeeeeeeeeeeeeeeeeeeee', NULL, 'Manu Martin', '', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-26', '18', 'Radwinter Drive', 'Amsterdam', 'New York', 'USA', '766XXX'),
(34, 2000, 'Card1', 'Testing', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', '', '', '', ''),
(35, 2000, 'Card2', 'Hello This gift is for you ', 'TTTT', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-01', '', '', '', '', '', ''),
(36, 1000, 'Card5', 'Testing', '', 'Manu Martin', 'manu_martin@yahoo.com', 'Manoj Kumar', 'midhu_martin@yahoo.com', '2017-04-21', '', '', '', '', '', ''),
(37, 2000, 'Card28', 'ggggg', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-12', '', '', '', '', '', ''),
(38, 5000, 'Card5', 'test', 'on', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(39, 500, 'Card27', 'This', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(40, 500, 'Card26', 'Hello', 'on', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(41, 1000, 'Card18', '', 'on', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(42, 1000, 'Card18', '', 'on', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(43, 1000, 'Card4', '', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(44, 500, 'Card4', '', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(45, 500, 'Card2', '', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(46, 1000, 'Card5', '', NULL, 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(48, 500, 'Card6', '', NULL, 'Manu Martin', '', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(49, 1000, 'Card27', '', '', 'Manu Martin', '', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(50, 500, 'Card5', '', 'on', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(51, 500, 'Card5', 'Christmas', '', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(52, 1000, 'Card28', 'test', '', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(53, 1000, 'Card28', '', 'on', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(54, 5000, 'Card29', '555', '', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(55, 100, 'Card29', 'SSSSSSSSSSSSSSS', 'on', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '', '', '', '', '', ''),
(56, 100, 'Card29', '33333333333333333333333', 'on', 'Manu Martin', '', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-18', '17', 'Radwinter Drive', 'Brampton', 'Ontario', 'Canada', 'M9V1P7'),
(57, 500, 'Card3', '', '', 'Manu Martin', 'manu_martin@yahoo.com', 'Midhu Martin', 'midhu_martin@yahoo.com', '2017-04-28', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gifttype`
--

CREATE TABLE `gifttype` (
  `Id` int(10) NOT NULL,
  `CName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifttype`
--

INSERT INTO `gifttype` (`Id`, `CName`) VALUES
(1, 'General'),
(2, 'Wedding'),
(3, 'Valentine\'s Day'),
(4, 'Miscellaneous'),
(5, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `city`, `name`, `description`, `price`, `link`, `image`) VALUES
(1, 'Los Angeles', 'Regal Aegis Hotel', 'This 5 Star hotel features sweeping views and a luxurious rooftop pool.', 239, 'https://www.regalaegishotel.com', 'images/hotels/hotel1.jpeg'),
(2, 'Sydney', 'Azure Resort & Spa', 'This 5 Star tranquil Resort & Spa is tucked away from the heart of the city, and will leave you feeling rejuvenated after your stay.', 349, 'https://www.azureresortandspa.au', 'images/hotels/hotel2.jpeg'),
(3, 'Lisbon', 'Paragon Resort', 'This 4 Star Resort is located right on the water and features spectacular ocean views.', 189, 'https://www.paragonresort.com', 'images/hotels/hotel3.jpg'),
(4, 'Vancouver', 'Silver Heritage Hotel', 'This 4 Star Hotel is in fabulous downtown Vancouver and you will feel right at home in our elegant rooms.', 209, 'https://www.silverheritagehotel.ca', 'images/hotels/hotel4.jpeg'),
(5, 'Toronto', 'Ivory Hotel', 'This 5 Star boutique hotel will have you feeling right at home. Cozy up beside the fireplace in the hotel bar after a long day of exploring the city.', 329, 'https://www.ivoryhotel.ca', 'images/hotels/hotel5.jpeg'),
(6, 'Las Vegas', 'Triumph Hotel', 'This 5 Star property is just off the main strip and features a luxurious pool and private deluxe suites.', 179, 'https://www.triumphhotel.com', 'images/hotels/hotel6.jpg'),
(7, 'Los Angeles', 'Sunway Resort & Spa', 'This sunny 4 Star Resort is perfect for your next family getaway, and features 3 fantastic swimming pools.', 219, 'https://www.sunwayresortandspa.com', 'images/hotels/hotel7.jpeg'),
(8, 'Madrid', 'Imperial Resort', 'Enjoy all that Spain has to offer at this gorgeous 5 Star Resort.', 319, 'https://www.imperialresort.com', 'images/hotels/hotel8.jpg'),
(9, 'Lisbon', 'Regal Ridge Hotel', 'This 4 Star Hotel features sweeping vistas and breathtaking sunsets.', 189, 'https://www.regalridge.com', 'images/hotels/hotel9.jpg'),
(10, 'Toronto', 'Rosewood Hotel', 'This 4 Star hotel boasts a fantastic location in the city and offers exceptional service to our guests.', 229, 'https://www.rosewoodhotel.ca', 'images/hotels/hotel10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `Id` int(10) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `DepartureDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `Number1` int(10) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `departcity` varchar(50) NOT NULL,
  `Name1` varchar(50) NOT NULL,
  `Age1` int(10) NOT NULL,
  `Name2` varchar(50) NOT NULL,
  `Age2` int(10) NOT NULL,
  `Relationship2` varchar(50) NOT NULL,
  `Name3` varchar(50) NOT NULL,
  `Age3` int(10) NOT NULL,
  `Relationship3` varchar(50) NOT NULL,
  `Name4` varchar(50) NOT NULL,
  `Age4` int(10) NOT NULL,
  `Relationship4` varchar(50) NOT NULL,
  `Name5` varchar(50) NOT NULL,
  `Age5` int(10) NOT NULL,
  `Relationship5` varchar(50) NOT NULL,
  `passedprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`Id`, `destination`, `DepartureDate`, `ReturnDate`, `Number1`, `Province`, `departcity`, `Name1`, `Age1`, `Name2`, `Age2`, `Relationship2`, `Name3`, `Age3`, `Relationship3`, `Name4`, `Age4`, `Relationship4`, `Name5`, `Age5`, `Relationship5`, `passedprice`) VALUES
(1, 'Toronto', '0000-00-00', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0),
(2, 'Kochi', '2017-04-16', '2017-04-16', 1, 'ON', 'Toronto', '', 0, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0),
(3, 'Kochin', '2017-04-19', '2017-04-29', 2, 'ON', 'Toronto', 'Martin', 67, 'Manu', 25, 'Son', '', 0, '', '', 0, '', '', 0, '', 3),
(4, 'London', '2017-04-26', '2017-04-30', 3, 'ON', 'Toronto', 'Martin', 67, 'Manu', 32, 'son', 'Savio', 5, 'grand son', '', 0, '', '', 0, '', 0),
(5, 'kkkk', '2017-04-16', '2017-04-16', 1, 'ON', 'Toronto', 'Martin', 44, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0),
(6, 'Edmonton', '2017-04-20', '2017-05-26', 1, 'ON', 'Toronto', 'Martin', 45, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0),
(7, 'Toronto', '2017-04-16', '2017-04-16', 1, 'ON', 'Toronto', 'Martin', 44, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0),
(8, 'mmmmmmmmmmmmmm', '2017-04-16', '2017-04-16', 1, 'Ontario', 'Mississauga', 'Martin', 3, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 743),
(9, 'Kochi', '2017-04-21', '2017-04-27', 2, 'ON', 'Toronto', 'Martin', 63, 'Manu', 32, 'Son', '', 0, '', '', 0, '', '', 0, '', 74),
(10, 'Toronto', '2017-04-18', '2017-04-18', 2, 'Ontario', 'Mississauga', 'Martin', 23, 'Manu', 32, 'Test', '', 0, '', '', 0, '', '', 0, '', 74),
(11, 'Kochin', '2017-04-18', '2017-04-18', 1, 'ON', 'Toronto', 'Midhu', 21, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 35),
(12, 'Kochi', '2017-04-18', '2017-04-18', 1, 'ON', 'Toronto', 'Martin', 34, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 74),
(13, 'Kochi', '2017-04-18', '2017-04-18', 1, 'ON', 'Toronto', 'Martin', 24, '', 0, '', '', 0, '', '', 0, '', '', 0, '', 74);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `Id` int(10) NOT NULL,
  `LanguageName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`Id`, `LanguageName`) VALUES
(1, ''),
(2, 'English'),
(3, 'French'),
(4, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `nooftraveller`
--

CREATE TABLE `nooftraveller` (
  `Id` int(11) NOT NULL,
  `Number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nooftraveller`
--

INSERT INTO `nooftraveller` (`Id`, `Number`) VALUES
(0, ''),
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `customer`, `order_date`) VALUES
(1, '2999.97', 'iamgsghuman@gmail.com', '0000-00-00 00:00:00'),
(2, '2000.00', 'asad@sds.nom', '0000-00-00 00:00:00'),
(3, '7499.99', 'asada@gmail.com', '0000-00-00 00:00:00'),
(4, '10999.96', 'iamgsghuman@gmail.com', '0000-00-00 00:00:00'),
(5, '10999.96', 'iamgsghuman@gmail.com', '0000-00-00 00:00:00'),
(6, '1999.99', 'iamgsghuman@gmail.com', '0000-00-00 00:00:00'),
(7, '6000.00', 'emailgursewak@gmail.com', '0000-00-00 00:00:00'),
(8, '4500.00', 'iamgsghuman@gmail.com', '0000-00-00 00:00:00'),
(9, '3999.96', 'ghuman@ghuman.com', '2017-04-16 03:53:11'),
(10, '999.99', 'iamgsghuman@gmail.com', '2017-04-16 03:57:10'),
(11, '999.99', 'iamgsghuman@gmail.com', '2017-04-16 03:57:32'),
(12, '26104.93', 'iamgsghuman@gmail.com', '2017-04-17 01:44:37'),
(13, '4999.97', 'iamgsghuman@gmail.com\\', '2017-04-17 13:53:14'),
(14, '2999.99', 'iamgsghuman@gmail.com', '2017-04-17 14:04:07'),
(15, '2999.99', 'iamgsghuman@gmail.com', '2017-04-19 11:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `tour_id`, `order_id`, `quantity`, `cost`) VALUES
(1, 1, 3, 1, '0.00'),
(2, 2, 3, 3, '0.00'),
(3, 3, 3, 1, '0.00'),
(4, 1, 5, 4, '3999.96'),
(5, 2, 5, 1, '2000.00'),
(6, 4, 5, 2, '5000.00'),
(7, 1, 6, 1, '999.99'),
(8, 3, 6, 2, '1000.00'),
(9, 2, 7, 3, '6000.00'),
(10, 2, 8, 1, '2000.00'),
(11, 4, 8, 1, '2500.00'),
(12, 1, 9, 4, '3999.96'),
(13, 1, 10, 1, '999.99'),
(14, 1, 11, 1, '999.99'),
(15, 2, 12, 3, '6000.00'),
(16, 1, 12, 7, '6999.93'),
(17, 17, 12, 21, '105.00'),
(18, 4, 12, 5, '12500.00'),
(19, 3, 12, 1, '500.00'),
(20, 1, 13, 3, '2999.97'),
(21, 2, 13, 1, '2000.00'),
(22, 1, 14, 1, '999.99'),
(23, 2, 14, 1, '2000.00'),
(24, 1, 15, 1, '999.99'),
(25, 2, 15, 1, '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `price_alerts`
--

CREATE TABLE `price_alerts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_alerts`
--

INSERT INTO `price_alerts` (`id`, `name`, `image`, `price`) VALUES
(1, 'Amsterdam - Netherlands', 'img/1.jpg', 2533.99),
(2, 'Sydney - Australia', 'img/2.jpg', 4811.99),
(3, 'London - United Kingdom', 'img/3.jpg', 3211.99),
(4, 'Tokyo - Japan', 'img/4.jpg', 4232.99),
(5, 'Shanghai - China', 'img/5.jpg', 1211.99),
(6, 'Melbourne - Australia', 'img/6.jpg', 4232.99),
(8, 'Beijing - China', 'img/7.jpg', 3453.99),
(9, 'Delhi - India', 'img/8.jpg', 5634.99),
(10, 'Istanbul - Turkey', 'img/9.jpg', 6543.99);

-- --------------------------------------------------------

--
-- Table structure for table `smallcardpictures`
--

CREATE TABLE `smallcardpictures` (
  `Id` int(10) NOT NULL,
  `CardName` varchar(50) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `Comment` varchar(200) NOT NULL,
  `CardType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smallcardpictures`
--

INSERT INTO `smallcardpictures` (`Id`, `CardName`, `Link`, `Comment`, `CardType`) VALUES
(1, 'Card1', 'images/GiftCards/GiftCard1Small.jpg', '', 'General'),
(3, 'Card3', 'images/GiftCards/GiftCard3Small.jpg', '', 'General'),
(4, 'Card4', 'images/GiftCards/GiftCard4Small.jpg', '', 'General'),
(5, 'Card5', 'images/GiftCards/GiftCard5Small.jpg', '', 'General'),
(6, 'Card6', 'images/GiftCards/GiftCard6Small.jpg', '', 'General'),
(7, 'Card7', 'images/GiftCards/GiftCard7Small.jpg', '', 'Wedding'),
(8, 'Card8', 'images/GiftCards/GiftCard8Small.jpg', '', 'Wedding'),
(9, 'Card9', 'images/GiftCards/GiftCard9Small.jpg', '', 'Wedding'),
(10, 'Card10', 'images/GiftCards/GiftCard10Small.jpg', '', 'Wedding'),
(11, 'Card11', 'images/GiftCards/GiftCard11Small.jpg', '', 'Wedding'),
(12, 'Card12', 'images/GiftCards/GiftCard12Small.jpg', '', 'Wedding'),
(13, 'Card13', 'images/GiftCards/GiftCard13Small.jpg', '', 'Valentines Day'),
(14, 'Card14', 'images/GiftCards/GiftCard14Small.jpg', '', 'Valentines Day'),
(15, 'Card15', 'images/GiftCards/GiftCard15Small.jpg', '', 'Valentines Day'),
(16, 'Card16', 'images/GiftCards/GiftCard16Small.jpg', '', 'Valentines Day'),
(17, 'Card17', 'images/GiftCards/GiftCard17Small.jpg', '', 'Valentines Day'),
(18, 'Card18', 'images/GiftCards/GiftCard18Small.jpg', '', 'Valentines Day'),
(19, 'Card19', 'images/GiftCards/GiftCard19Small.jpg', '', 'Miscellaneous'),
(20, 'Card20', 'images/GiftCards/GiftCard20Small.jpg', '', 'Miscellaneous'),
(21, 'Card21', 'images/GiftCards/GiftCard21Small.jpg', '', 'Miscellaneous'),
(22, 'Card22', 'images/GiftCards/GiftCard22Small.jpg', '', 'Miscellaneous'),
(23, 'Card23', 'images/GiftCards/GiftCard23Small.jpg', '', 'Miscellaneous'),
(24, 'Card24', 'images/GiftCards/GiftCard24Small.jpg', '', 'Miscellaneous'),
(25, 'Card1dis', 'images/GiftCards/GiftCard1.jpg', '', 'Large'),
(26, 'Card2dis', 'images/GiftCards/GiftCard2.jpg', '', 'Large'),
(27, 'Card3dis', 'images/GiftCards/GiftCard3.jpg', '', 'Large'),
(28, 'Card4dis', 'images/GiftCards/GiftCard4.jpg', '', 'Large'),
(29, 'Card5dis', 'images/GiftCards/GiftCard5.jpg', '', 'Large'),
(30, 'Card6dis', 'images/GiftCards/GiftCard6.jpg', '', 'Large'),
(31, 'Card7dis', 'images/GiftCards/GiftCard7.jpg', '', 'Large'),
(32, 'Card8dis', 'images/GiftCards/GiftCard8.jpg', '', 'Large'),
(33, 'Card9dis', 'images/GiftCards/GiftCard9.jpg', '', 'Large'),
(34, 'Card10dis', 'images/GiftCards/GiftCard10.jpg', '', 'Large'),
(35, 'Card11dis', 'images/GiftCards/GiftCard11.jpg', '', 'Large'),
(36, 'Card12dis', 'images/GiftCards/GiftCard12.jpg', '', 'Large'),
(37, 'Card13dis', 'images/GiftCards/GiftCard13.jpg', '', 'Large'),
(38, 'Card14dis', 'images/GiftCards/GiftCard14.jpg', '', 'Large'),
(39, 'Card15dis', 'images/GiftCards/GiftCard15.jpg', '', 'Large'),
(40, 'Card16dis', 'images/GiftCards/GiftCard16.jpg', '', 'Large'),
(41, 'Card17dis', 'images/GiftCards/GiftCard17.jpg', '', 'Large'),
(42, 'Card18dis', 'images/GiftCards/GiftCard18.jpg', '', 'Large'),
(43, 'Card19dis', 'images/GiftCards/GiftCard19.jpg', '', 'Large'),
(44, 'Card20dis', 'images/GiftCards/GiftCard20.jpg', '', 'Large'),
(45, 'Card21dis', 'images/GiftCards/GiftCard21.jpg', '', 'Large'),
(46, 'Card22dis', 'images/GiftCards/GiftCard22.jpg', '', 'Large'),
(47, 'Card23dis', 'images/GiftCards/GiftCard23.jpg', '', 'Large'),
(48, 'Card24dis', 'images/GiftCards/GiftCard24.jpg', '', 'Large'),
(56, 'Card25dis', 'images/GiftCards/GiftCard25.jpg', '', 'Large'),
(57, 'Card25', 'images/GiftCards/GiftCard25Small.jpg', '', 'General'),
(58, 'Card26dis', 'images/GiftCards/GiftCard26.jpg', '', 'Large'),
(59, 'Card26', 'images/GiftCards/GiftCard26Small.jpg', '', 'General'),
(60, 'Card27', 'images/GiftCards/GiftCard27.jpg', '', 'Large'),
(61, 'Card27', 'images/GiftCards/GiftCard27Small.jpg', '', 'General'),
(62, 'Card27dis', 'images/GiftCards/GiftCard27.jpg', '', 'Large'),
(64, 'Card2', 'images/GiftCards/GiftCard2Small.jpg', '', 'General'),
(65, 'Card28', 'images/GiftCards/GiftCard28Small.jpg', '', 'General'),
(66, 'Card28dis', 'images/GiftCards/GiftCard28.jpg', '', 'Large'),
(67, 'Card29', 'images/GiftCards/GiftCard29Small.jpg', '', 'General'),
(68, 'Card29dis', 'images/GiftCards/GiftCard29.jpg', '', 'Large'),
(69, 'Card30', 'images/GiftCards/GiftCard30Small.jpg', '', 'General'),
(70, 'Card30dis', 'images/GiftCards/GiftCard30.jpg', '', 'Large'),
(71, 'test', 'test', 'test', 'test'),
(72, 'test', 'link', 'try', 'try'),
(73, 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `smallpictable`
--

CREATE TABLE `smallpictable` (
  `Id` int(10) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `PicName` varchar(30) NOT NULL,
  `PicLink` varchar(50) NOT NULL,
  `PicId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smallpictable`
--

INSERT INTO `smallpictable` (`Id`, `Category`, `PicName`, `PicLink`, `PicId`) VALUES
(1, 'General', 'GiftCard1Small.jpg', 'images/GiftCards/GiftCard1Small.jpg', 'Card1'),
(2, 'General', 'GiftCard2Small.jpg', 'images/GiftCards/GiftCard2Small.jpg', 'Card2'),
(3, 'General', 'GiftCard3Small.jpg', 'images/GiftCards/GiftCard3Small.jpg', 'Card3'),
(4, 'General', 'GiftCard4Small.jpg', 'images/GiftCards/GiftCard4Small.jpg', 'Card4'),
(5, 'General', 'GiftCard5Small.jpg', 'images/GiftCards/GiftCard5Small.jpg', 'Card5'),
(6, 'General', 'GiftCard6Small.jpg', 'images/GiftCards/GiftCard6Small.jpg', 'Card6'),
(7, 'Wedding', 'GiftCard7Small.jpg', 'images/GiftCards/GiftCard7Small.jpg', 'Card7'),
(8, 'Wedding', 'GiftCard8Small.jpg', 'images/GiftCards/GiftCard8Small.jpg', 'Card8'),
(9, 'Wedding', 'GiftCard9Small.jpg', 'images/GiftCards/GiftCard9Small.jpg', 'Card9'),
(10, 'Wedding', 'GiftCard10Small.jpg', 'images/GiftCards/GiftCard10Small.jpg', 'Card10'),
(11, 'Wedding', 'GiftCard11Small.jpg', 'images/GiftCards/GiftCard11Small.jpg', 'Card11'),
(12, 'Wedding', 'GiftCard12Small.jpg', 'images/GiftCards/GiftCard12Small.jpg', 'Card12'),
(13, 'Valentine\'s Day', 'GiftCard13Small.jpg', 'images/GiftCards/GiftCard13Small.jpg', 'Card13'),
(14, 'Valentine\'s Day', 'GiftCard14Small.jpg', 'images/GiftCards/GiftCard14Small.jpg', 'Card14'),
(16, 'Valentine\'s Day', 'GiftCard16Small.jpg', 'images/GiftCards/GiftCard16Small.jpg', 'Card16'),
(17, 'Valentine\'s Day', 'GiftCard17Small.jpg', 'images/GiftCards/GiftCard17Small.jpg', 'Card17'),
(18, 'Valentine\'s Day', 'GiftCard18Small.jpg', 'images/GiftCards/GiftCard18Small.jpg', 'Card18');

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE `specialty` (
  ```Id` int(10) NOT NULL,
  `SpecialtyName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spec_table`
--

CREATE TABLE `spec_table` (
  `spec_id` int(20) UNSIGNED NOT NULL,
  `spec_content` text NOT NULL,
  `spec_img` varchar(200) NOT NULL,
  `spec_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spec_table`
--

INSERT INTO `spec_table` (`spec_id`, `spec_content`, `spec_img`, `spec_type`) VALUES
(1, '<h3>Brazil</h3>\r\n<h4>Rio de janeiro - Trending!</h4>\r\n\r\n<p>Rio de Janeiro is a huge seaside city in Brazil, famed for its Copacabana and Ipanema beaches, 38m Christ the Redeemer statue atop Mount Corcovado and for Sugarloaf Mountain, a granite peak with cable cars to its summit. The city is also known for its sprawling favelas (shanty towns). Its raucous Carnaval festival, featuring parade floats, flamboyant costumes and samba dancers, is considered the world’s largest.</p>\r\n\r\n', 'images/brazil.jpg', 'M'),
(2, '<h3>Cuba</h3>\r\n<h4>Havana</h4>\r\n\r\n<p>Cuba is a Caribbean island nation under communist rule. It has sugar-white beaches and is dotted with tobacco fields, which play a part in the production of the country\'s legendary cigars. The capital, Havana, is lined with pastel houses, 1950s-era cars and Spanish-colonial architecture in the 16th-century core, Old Havana. Salsa music plays in the dance clubs and cabaret shows are performed at the famed Tropicana.</p>', 'images/cuba.jpg', 'M'),
(3, '<h3>India</h3>\r\n<h4>New Delhi - Trending now!</h4>\r\n\r\n<p>India is a vast South Asian country with diverse terrain – from Himalayan peaks to Indian Ocean coastline – and history reaching back 5 millennia. In the north, Mughal Empire landmarks include Delhi’s Red Fort complex and massive Jama Masjid mosque, plus Agra’s iconic Taj Mahal mausoleum. Pilgrims bathe in the Ganges in Varanasi, and Rishikesh is a yoga centre and base for Himalayan trekking.</p>', 'images/india.jpg', 'M'),
(6, '<h3>Germany</h3>\r\n<h4>Berlin</h4>\r\n\r\n<p>Germany is a Western European country with a landscape of forests, rivers, mountain ranges and North Sea beaches. It has over 2 millennia of history. Berlin, its capital, is home to art and nightlife scenes, the Brandenburg Gate and many sites relating to WWII. Munich is known for its Oktoberfest and beer halls, including the 16th-century Hofbräuhaus. Frankfurt, with its skyscrapers, houses the European Central Bank.</p>', 'images/germany', 'B'),
(7, '<h3>South Africa</h3>\r\n<h4>Cape Town</h4>\r\n\r\n<p>South Africa is a country on the southernmost tip of the African continent, marked by several distinct ecosystems. Inland safari destination Kruger National Park is populated by big game. The Western Cape offers beaches, lush winelands around Stellenbosch and Paarl, craggy cliffs at the Cape of Good Hope, forest and lagoons along the Garden Route, and the city of Cape Town, beneath flat-topped Table Mountain.</p>', 'images/southafrica.jpg', 'B'),
(8, '<h3>Poland</h3>\r\n<h4>Warsaw</h4>\r\n\r\n<p>Poland is an eastern European country on the Baltic Sea known for its medieval architecture and Jewish heritage. Warsaw, the capital, has shopping and nightlife, plus the Warsaw Uprising Museum, honoring the city’s WWII-era resistance to German occupation. In the city of Kraków, 14th-century Wawel Castle rises above the medieval old town, home to Cloth Hall, a Renaissance trading post in Rynek Glówny (market square).</p>', 'images/poland.jpg', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonials_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `tour_id` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonials_id`, `user_name`, `date`, `description`, `tour_id`, `published`) VALUES
(1, 'Gavy Ghuman', '2017-02-06', 'I recently booked the Paris Tour and I was blown away by the amazing service that we received on this trip. Travel Time went above and beyond to make our tour very memorable and I am really looking forward to booking my next tour!', 9, 1),
(2, 'Midhu Martin', '2017-02-07', 'Last month I had a trip booked with Travel Time and when I suddenly got ill before the tour, the travel insurance was a huge relief to me. I am excited to be going on a rebooked tour next week', 94, 1),
(3, 'Ahmed Selim ', '2017-02-13', 'Travel Time never fails to impress me with the variety of tours they have! I always book through them because they have the best itineraries and the most wonderful staff.', 44, 1),
(4, 'Prabhninder', '2017-02-13', 'The India tour changed my life. I still can’t believe how much we saw and did on this trip. I would go on this tour again because I enjoyed it so much.', 874, 1),
(5, 'Lauren Piasecki', '2017-01-09', 'Travel Time is my go to website for all my travel needs. I really appreciate the live chat and the 24 hour service they offer. They are always able to offer valuable answers to my questions and have assisted me many times with booking their tour packages.', 84, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `return_date` date NOT NULL,
  `description` text NOT NULL,
  `days` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `popular` tinyint(1) NOT NULL,
  `from_place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `location`, `type`, `start_date`, `return_date`, `description`, `days`, `price`, `image`, `popular`, `from_place`) VALUES
(1, 'Paris Tour', 'Canada', 'Tourism', '2017-02-28', '2017-03-24', 'Visit the wonderful city of Paris, France on one of our most popular tours and cross this European destination off your bucket list. This city is known for its fine art, gourmet food and the Eiffel Tower. We guarantee that you will fall in love with Paris.', 7, '999.99', '58f926319645d7RN8KCXWIB.jpg', 1, 'Toronto'),
(2, 'Italy Tour', 'Italy', 'Landscapes', '2017-03-18', '2017-05-18', 'Come join our fantastic getaway to Venice, Italy! This city is a very popular tourist destination and after you visit Venice, you will see why. Book now and you will soon be enjoying the excellent Italian cuisine and gondola rides on the Venice canals.', 30, '2000.00', '58f927214a6b798NDL9PL8U.jpg', 1, 'Toronto'),
(3, 'Swim Canada', 'Canada', 'Swiming', '2017-06-15', '2017-06-23', 'Spots are always filling up on our India tour and we recommend booking now so you donâ€™t miss out on this unforgettable journey. With amazing food, beautiful beaches and the Taj Mahal, India has it all. We promise you an incredible time on our tour.', 8, '500.00', 'swim.jpg', 0, 'Vancouver'),
(4, 'India Tour', 'India', 'Touring', '2017-04-28', '2017-05-28', 'Spots are always filling up on our India tour and we recommend booking now so you donâ€™t miss out on this unforgettable journey. With amazing food, beautiful beaches and the Taj Mahal, India has it all. We promise you an incredible time on our tour', 30, '2500.00', '58f9275670c4165IZ00R6EP.jpg', 1, 'London'),
(6, 'okkkkkkkkkkkkkk2222222', 'okkkkk11111', 'oikkkkk1', '2017-04-02', '2017-04-05', 'ssdksd slmdlskdslkd', 45, '454.00', '58df644687654', 0, 'okkkkkkkkk22222'),
(7, 'okkkkkkkkkkkkkk', 'okkkkk', 'oikkkkk', '2017-04-02', '2017-04-05', 'ssdksd slmdlskdslkd', 45, '454.00', '58df654e12011', 0, 'okkkkkkkkk'),
(8, 'okkkkkkkkkkkkkk', 'okkkkk', 'oikkkkk', '2017-04-02', '2017-04-05', '             ssdksd slmdlskdslkd        ', 45, '454.00', '58df632d0cc24crown-yellow.png', 0, 'okkkkkkkkk'),
(9, 'newww', 'ok', 'new', '2017-04-07', '2017-04-12', 'dsds', 45, '54.00', '58e08f6d5193flogo.png', 0, 'new'),
(11, 'newww', 'okk', 'new', '2017-04-07', '2017-04-12', 'sddsd', 45, '54.00', '58e08f972964blogo.png', 0, 'new'),
(12, 'newww', 'dsds', 'new', '2017-04-07', '2017-04-12', 'sdsfs', 45, '54.00', '58e08ff064d05crown-yellow.png', 0, 'new'),
(13, 'newww', 'dsds', 'new', '2017-04-07', '2017-04-12', 'sdsfs', 45, '54.00', '58e09005e12adcrown-yellow.png', 0, 'new'),
(14, 'njbjjh', '', 'n', '2017-04-11', '2017-04-05', 'mnkj', 54, '5.00', '58e0910d3102blogo.png', 0, 'nkn'),
(15, 'njbjjh', 'okkkkk11111', 'n', '2017-04-11', '2017-04-05', 'mnkj', 54, '5.00', '58e0915c0edcalogo.png', 0, 'nkn'),
(16, 'njbjjh', 'okkkkk11111', 'n', '2017-04-11', '2017-04-05', 'mnkj', 54, '5.00', '58e091f30acd0logo.png', 0, 'nkn'),
(17, '454', 'okkkkk11111', 'n', '2017-04-11', '2017-04-05', 'mnkj', 54, '5.00', '58e0928ebc933logo.png', 0, 'nkn'),
(18, '454', 'okkkkk11111', 'n', '2017-04-11', '2017-04-05', 'mnkj', 54, '5.00', '58e092a77e6d9logo.png', 0, 'nkn'),
(19, '22222222222', '2222222', '22222222', '2017-04-19', '2017-05-10', 'huh', 22222, '222222.00', '58e0a28fb07c1logo.png', 0, '22222222'),
(20, '22222222222', '2222222', '22222222', '2017-04-19', '2017-05-10', '2222222', 22222, '222222.00', '58e0a2b22f816logo.png', 0, '22222222'),
(21, '22222222222', '2222222', '22222222', '2017-04-19', '2017-05-10', '2222222', 22222, '222222.00', '58e0a2fce1c2blogo.png', 0, '22222222'),
(22, '3333333', '333333', '33333333', '2017-04-06', '2017-04-13', '2222222233333333333', 3333333, '33333.00', '58e0a437bb62ecrown-yellow.png', 0, '333333333'),
(24, '555', '', '', '0000-00-00', '2017-04-05', '555555', 0, '5.00', '58e0a74028f14', 0, '555'),
(25, '555', '', '', '0000-00-00', '2017-04-05', '555555', 0, '5.00', '', 0, '555'),
(26, '66666', '666666666', '5555555', '2017-04-07', '2017-04-14', '6666666', 666666, '66666666.00', '58e0a9ecca72clogo.png', 0, '666'),
(27, '66666', '666666666', '5555555', '2017-04-07', '2017-04-14', '6666666', 666666, '66666666.00', '58e0c970c432abooks.jpg', 0, '666');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `persons` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `email`, `phone`, `persons`) VALUES
(2, 'Simon Wilson', 22, 'simonwilson@gmail.com', '', ''),
(3, 'Ahmed', 22, 'test@test.com', '', ''),
(4, 'Ahmed', 26, 'ahmad@gmail.com', '', ''),
(6, 'John Doe', 22, 'john@gmail.com', '', ''),
(7, 'Wilson', 22, 'wilson@gmail.com', '', ''),
(8, 'Midhu', 28, 'midhu@gmail.com', '656546444', '5'),
(9, 'test', 44, 'ddavid@gmail.com', '65656666', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` char(40) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'laurenp', '5f4dcc3b5aa765d61d8327deb882cf99', 'Lauren', 'Piasecki', 'lauren.piasecki@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `name`, `image`) VALUES
(1, 'Paris', 'images/wishlist/paris.jpeg'),
(2, 'London', 'images/wishlist/london.jpeg'),
(3, 'San Fransisco', 'images/wishlist/sanfran.jpg'),
(4, 'New York City', 'images/wishlist/nyc.jpg'),
(5, 'Rome', 'images/wishlist/rome.jpg'),
(6, 'Chicago', 'images/wishlist/chicago.jpeg'),
(7, 'Amsterdam', 'images/wishlist/amsterdam.jpeg'),
(8, 'Budapest', 'images/wishlist/budapest.jpeg'),
(9, 'Capetown', 'images/wishlist/capetown.jpeg'),
(10, 'Los Angeles', 'images/wishlist/la.jpeg'),
(11, 'Lisbon', 'images/wishlist/lisbon.jpg'),
(12, 'Madrid', 'images/wishlist/madrid.jpeg'),
(13, 'Montreal', 'images/wishlist/montreal.jpg'),
(14, 'Seattle', 'images/wishlist/seattle.jpg'),
(15, 'Shanghai', 'images/wishlist/shanghai.jpg'),
(16, 'Toronto', 'images/wishlist/tdot.jpg'),
(17, 'Sydney', 'images/wishlist/sydney.jpg'),
(18, 'Tokyo', 'images/wishlist/tokyo.jpg'),
(19, 'Las Vegas', 'images/wishlist/vegas.jpeg'),
(20, 'Singapore', 'images/wishlist/singapore.jpeg'),
(21, 'Vancouver', 'images/wishlist/vancouver.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `agentcontact`
--
ALTER TABLE `agentcontact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bookacar`
--
ALTER TABLE `bookacar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardeals`
--
ALTER TABLE `cardeals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `price` (`price`),
  ADD KEY `price_2` (`price`),
  ADD KEY `price_3` (`price`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id`,`CName`);

--
-- Indexes for table `countryagenttravel`
--
ALTER TABLE `countryagenttravel`
  ADD PRIMARY KEY (`id`,`CountryName`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftcard`
--
ALTER TABLE `giftcard`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `gifttype`
--
ALTER TABLE `gifttype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nooftraveller`
--
ALTER TABLE `nooftraveller`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_alerts`
--
ALTER TABLE `price_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smallcardpictures`
--
ALTER TABLE `smallcardpictures`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `smallpictable`
--
ALTER TABLE `smallpictable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `spec_table`
--
ALTER TABLE `spec_table`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonials_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `agentcontact`
--
ALTER TABLE `agentcontact`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookacar`
--
ALTER TABLE `bookacar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cardeals`
--
ALTER TABLE `cardeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `giftcard`
--
ALTER TABLE `giftcard`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `gifttype`
--
ALTER TABLE `gifttype`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nooftraveller`
--
ALTER TABLE `nooftraveller`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `price_alerts`
--
ALTER TABLE `price_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `smallcardpictures`
--
ALTER TABLE `smallcardpictures`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `smallpictable`
--
ALTER TABLE `smallpictable`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `spec_table`
--
ALTER TABLE `spec_table`
  MODIFY `spec_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `countryagenttravel`
--
ALTER TABLE `countryagenttravel`
  ADD CONSTRAINT `countryagenttravel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `agent` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
