-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2021 at 05:04 PM
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
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `userid`, `category`) VALUES
(31, '10', 'family'),
(33, '10', 'friends');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `insta` varchar(255) DEFAULT NULL,
  `linkd` varchar(255) DEFAULT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `img`, `name`, `phone`, `email`, `gender`, `dob`, `address`, `company`, `fb`, `insta`, `linkd`, `extra`, `category`) VALUES
(1, '../images/Person.jpg', 'talha ', '03331234567', 'talha@gmail.com', 'male', '', 'talha house lahore', 'software company abc lahore', 'https://web.facebook.com/talha', 'https://www.instagram.com/talha', 'https://www.linkedin.com/in/talha', 'xyz', 'friends'),
(2, '../images/Person.jpg', 'Ahmed', '03331234567', 'Ahmed@gmail.com', 'male', '9/7/2007', 'Ahmed house karachi', 'TT bank private LTD', 'https://web.facebook.com/Ahmad', 'https://www.instagram.com/ahmad', 'https://www.linkedin.com/in/ahmad', '', 'friends'),
(3, '../images/Person.jpg', 'Muhammad', '03331234567', 'Muhammad@gmail.com', 'male', '7/8/2000', 'Muhammad house islamabad', 'khan food companty', 'https://web.facebook.com/muhammad', 'https://www.instagram.com/muhammad', 'https://www.linkedin.com/in/muhammad', '', 'friends'),
(4, 'Smith.jpg', 'Hamza', '03331234567', 'Hamza@gmail.com', 'male', '1/9/1998', 'Hamza house islamabad', 'now paints LTD', 'https://web.facebook.com/hamza', 'https://www.instagram.com/hamza', 'https://www.linkedin.com/in/hamza', '', 'friends'),
(5, '../images/Person.jpg', 'Waqas', '03331234567', 'Waqas@gmail.com', 'male', '2/10/1995', 'Waqas house karachi', 'business man', 'https://web.facebook.com/waqas', 'https://www.instagram.com/waqas', 'https://www.linkedin.com/in/waqas', '', 'friends'),
(6, '../images/Person.jpg', 'usman', '03331234567', 'usman@gmail.com', 'male', '8/11/1993', 'usman house lahore', 'farmar', 'https://web.facebook.com/usman', 'https://www.instagram.com/usman', 'https://www.linkedin.com/in/usman', '', 'friends'),
(7, '../images/Person.jpg', 'Hassan', '03331234567', 'Hassan@gmail.com', 'male', '5/12/2000', 'Hassan house karachi', 'cool fans LTD', 'https://web.facebook.com/hasan', 'https://www.instagram.com/hasan', 'https://www.linkedin.com/in/hasan', '', 'friends'),
(8, '../images/Person.jpg', 'umair', '03331234567', 'umair@gmail.com', 'male', '3/13/2001', 'umair house lahore', 'rahbar kings LTD', 'https://web.facebook.com/umar', 'https://www.instagram.com/umar', 'https://www.linkedin.com/in/umar', '', 'friends'),
(9, '../images/Person.jpg', 'Bilal', '03331234567', 'Bilal@gmail.com', 'male', '7/14/2003', 'Bilal house karachi', 'software company abc lahore', 'https://web.facebook.com/bilal', 'https://www.instagram.com/bilal', 'https://www.linkedin.com/in/bilal', '', 'friends'),
(10, '../images/Person.jpg', 'Ayan', '03331234567', 'Ayan@gmail.com', 'male', '9/15/2000', 'Ayan house karachi', 'oil com karachi', 'https://web.facebook.com/ayan', 'https://www.instagram.com/ayan', 'https://www.linkedin.com/in/ayan', '', 'friends'),
(11, '../images/Person.jpg', 'Rashid', '03331234567', 'Rashid@gmail.com', 'male', '4/16/1990', 'Rashid house karachi', 'TT bank private LTD', 'https://web.facebook.com/rashid', 'https://www.instagram.com/rashid', 'https://www.linkedin.com/in/rashid', '', 'friends'),
(12, '../images/Person.jpg', 'Salman', '03331234567', 'Salman@gmail.com', 'male', '6/17/2000', 'Salman house karachi', 'khan food companty', 'https://web.facebook.com/salman', 'https://www.instagram.com/salman', 'https://www.linkedin.com/in/salman', '', 'friends'),
(13, '../images/Person.jpg', 'zeeshan', '03331234567', 'zeeshan@gmail.com', 'male', '12/18/2003', 'zeeshan house lahore', 'now paints LTD', 'https://web.facebook.com/zeeshan', 'https://www.instagram.com/zeeshan', 'https://www.linkedin.com/in/zeeshan', '', 'friends'),
(14, '../images/Person.jpg', 'saad', '03331234567', 'saad@gmail.com', 'male', '1/19/2004', 'saad house lahore', 'business man', 'https://web.facebook.com/saad', 'https://www.instagram.com/saad', 'https://www.linkedin.com/in/saad', '', 'friends'),
(15, '../images/Person.jpg', 'Ibrahim', '03331234567', 'Ibrahim@gmail.com', 'male', '10/20/1994', 'Ibrahim house karachi', 'farmar', 'https://web.facebook.com/ibrahim', 'https://www.instagram.com/ibrahim', 'https://www.linkedin.com/in/ibrahim', '', 'friends'),
(16, '../images/Person.jpg', 'Zahid', '03331234567', 'Zahid@gmail.com', 'male', '6/21/1991', 'Zahid house karachi', 'cool fans LTD', 'https://web.facebook.com/zahid', 'https://www.instagram.com/zahid', 'https://www.linkedin.com/in/zahid', '', 'friends'),
(17, '../images/Person.jpg', 'ismail', '03331234567', 'ismail@gmail.com', 'male', '2/22/2005', 'ismail house lahore', 'rahbar kings LTD', 'https://web.facebook.com/ismail', 'https://www.instagram.com/ismail', 'https://www.linkedin.com/in/ismail', '', 'friends'),
(18, '../images/Person.jpg', 'Hammad', '03331234567', 'Hammad@gmail.com', 'male', '11/23/2007', 'Hammad house karachi', 'software company abc lahore', 'https://web.facebook.com/hammad', 'https://www.instagram.com/hammad', 'https://www.linkedin.com/in/hammad', '', 'friends'),
(19, '../images/Person.jpg', 'Faraz', '03331234567', 'Faraz@gmail.com', 'male', '12/24/2008', 'Faraz house karachi', 'oil com karachi', 'https://web.facebook.com/faraz', 'https://www.instagram.com/faraz', 'https://www.linkedin.com/in/faraz', '', 'friends');

-- --------------------------------------------------------

--
-- Table structure for table `lnk`
--

DROP TABLE IF EXISTS `lnk`;
CREATE TABLE IF NOT EXISTS `lnk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnk`
--

INSERT INTO `lnk` (`id`, `userid`, `tablename`) VALUES
(20, 10, 'friends');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Free Account',
  `list` int(11) NOT NULL DEFAULT '0',
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `type`, `list`, `category`) VALUES
(10, 'yasir', 'a@gmail.com', '123', 'Free Account', 1, 2),
(11, 'arfat', 'b@gmail.com', '1234', 'Free Account', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
