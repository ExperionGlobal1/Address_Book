-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 10:34 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ID` int UNSIGNED NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `District` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pin_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `State` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `User_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `Name`, `Phone`, `District`, `Pin_code`, `State`, `Country`, `Avatar`, `User_id`) VALUES
(43, 'joyal', '7979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-christina-morillo-1181391.jpg', 28),
(46, 'raj', '07979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-andrea-piacquadio-874158.jpg', 28),
(54, 'raj kishore', '07979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-simon-robben-614810.jpg', 28),
(55, 'joyal', '07979841237', 'Madhubani', '682030', 'Kerala', 'India', 'pexels-christina-morillo-1181391.jpg', 28),
(56, 'joyal johnson', '07979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-christina-morillo-1181391.jpg', 26),
(57, 'raj kishore', '07979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-linkedin-sales-navigator-2182970.jpg', 26),
(58, 'nikhil', '07979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-nitin-khajotia-1516680.jpg', 26),
(60, 'raj kishore', '07979841237', 'Madhubani', '682030', 'Bihar', 'India', 'pexels-andrea-piacquadio-874158.jpg', 17),
(62, 'raj', '07979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-chloe-1043474.jpg', 17),
(63, 'joyal', '07979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-italo-melo-2379004.jpg', 17),
(64, 'Raj Kishore Yadav', '7979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-nathan-cowley-1300402.jpg', 28),
(67, 'raj kishore', '7979841237', 'Ernakulam', '682030', 'Kerala', 'India', '1675137192706.jpg', 37),
(68, 'nikhil', '7979841237', 'Ernakulam', '846750', 'Kerala', 'India', 'pexels-christina-morillo-1181391.jpg', 37),
(82, 'nikhil', '7979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-nitin-khajotia-1516680.jpg', 37),
(83, 'nikhil', '7979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-rahul-pandit-1884326.jpg', 37),
(84, 'nikhil', '7979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-linkedin-sales-navigator-2182970.jpg', 37),
(85, 'nikhil', '7979841237', 'Ernakulam', '682030', 'Kerala', 'India', 'pexels-nitin-khajotia-1516680.jpg', 37),
(87, 'joyal', '7979841237', 'madhubani', '682030', 'Kerala', 'India', 'pexels-nitin-khajotia-1516680.jpg', 37),
(88, 'joyal', '7979841237', 'Madhubani', '682030', 'Kerala', 'India', 'pexels-italo-melo-2379004.jpg', 37);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int UNSIGNED NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Email`, `Phone`, `Country`, `Password`) VALUES
(17, 'raj', 'raj1232@gmail.com', '07979841237', 'India', 'Raj@123'),
(26, 'sujeet kumar', 'sujit@gmail.com', '07979841237', 'India', 'Sujit@123'),
(28, 'raj kishore', 'admin@gmail.com', '07979841237', 'India', 'Raj@123'),
(37, 'nikhil', 'nikhil@gmail.com', '7979841237', 'India', 'Nikhil@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
