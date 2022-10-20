-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1+bionic1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2021 at 12:17 PM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fileID` int(20) NOT NULL,
  `userID` varchar(128) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `fileID`, `userID`, `comment`) VALUES
(1, 10, 'infs3202', '123'),
(2, 10, '115.64.119.179', 'yolo'),
(3, 10, 'infs3202', 'I cam to Australia on Boat'),
(4, 10, '115.64.119.179', 'test'),
(5, 10, 'infs3202', 'anota test'),
(32, 10, '115.64.119.179', 'ngl pretty cool'),
(33, 10, 'infs3202', 'test'),
(34, 10, 'airo1011', 'hello'),
(35, 10, '10.89.159.105', 'hello'),
(36, 10, '10.89.159.105', 'show anon'),
(37, 12, '110.175.217.220', 'Skrrrrrrat'),
(38, 22, 'keti', 'yo'),
(39, 22, '119.18.33.150', 'yo'),
(40, 22, 'keti', 'what cha doing?'),
(41, 22, '119.18.33.150', 'Nothing much'),
(42, 22, 'keti', 'Cool. bYe'),
(43, 22, 'keti', 'byu~!~!!!'),
(44, 29, 'keti', 'My video'),
(45, 29, '119.18.33.150', 'nice video'),
(46, 29, 'ciro1011', 'Video Ratio is off'),
(47, 29, '115.64.119.179', 'I gotta agree');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `path` text NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `path`, `username`) VALUES
(5, 'Super_Cafe_-_Snyder_Cut.mp4', '/var/www/htdocs/INFS3202Proj/uploads/Super_Cafe_-_Snyder_Cut.mp4', 'infs3202'),
(6, 'Super_Cafe_-_The_Next_Knight_Rises.mp4', '/var/www/htdocs/INFS3202Proj/uploads/Super_Cafe_-_The_Next_Knight_Rises.mp4', 'infs3202'),
(7, 'How_Iron_Man_Should_Have_Ended.mp4', '/var/www/htdocs/INFS3202Proj/uploads/How_Iron_Man_Should_Have_Ended.mp4', 'infs3202'),
(9, 'What_the_hell_.mp4', '/var/www/htdocs/INFS3202Proj/uploads/What_the_hell_.mp4', 'infs3202'),
(10, 'when_you_bite_your_tongue.mp4', '/var/www/htdocs/INFS3202Proj/uploads/when_you_bite_your_tongue.mp4', 'infs3202'),
(11, 'THX.mp4', '/var/www/htdocs/INFS3202Proj/uploads/THX.mp4', 'infs3202'),
(12, 'The_Lyrebird_Goes_Skrrrrrat.mp4', '/var/www/htdocs/INFS3202Proj/uploads/The_Lyrebird_Goes_Skrrrrrat.mp4', 'infs3202'),
(13, 'Inside_Out.mp4', '/var/www/htdocs/INFS3202Proj/uploads/Inside_Out.mp4', 'infs3202'),
(14, 'Lid_Off.mp4', '/var/www/htdocs/INFS3202Proj/uploads/Lid_Off.mp4', 'infs3202'),
(15, 'Kent_State_University_has_gotten_very_weird.mp4', '/var/www/htdocs/INFS3202Proj/uploads/Kent_State_University_has_gotten_very_weird.mp4', 'infs3202'),
(16, '9convert_com_-_The_Loaf_Of_Wisdom_360p.mp4', '/var/www/htdocs/INFS3202Proj/uploads/9convert_com_-_The_Loaf_Of_Wisdom_360p.mp4', 'infs3202'),
(17, '2017s_Hottest_New_Horror_Flick.mp4', '/var/www/htdocs/INFS3202Proj/uploads/2017s_Hottest_New_Horror_Flick.mp4', 'infs3202'),
(18, '9convert_com_-_The_best_pirate_Ive_ever_seen.mp4', '/var/www/htdocs/INFS3202Proj/uploads/9convert_com_-_The_best_pirate_Ive_ever_seen.mp4', 'infs3202'),
(19, '9convert_com_-_The_Loaf_Of_Wisdom_360p1.mp4', '/var/www/htdocs/INFS3202Proj/uploads/9convert_com_-_The_Loaf_Of_Wisdom_360p1.mp4', 'infs3202'),
(20, '9convert_com_-_The_best_pirate_Ive_ever_seen1.mp4', '/var/www/htdocs/INFS3202Proj/uploads/9convert_com_-_The_best_pirate_Ive_ever_seen1.mp4', 'infs3202'),
(21, '2017s_Hottest_New_Horror_Flick1.mp4', '/var/www/htdocs/INFS3202Proj/uploads/2017s_Hottest_New_Horror_Flick1.mp4', 'infs3202'),
(22, 'You_Have_Already_Lost1.mp4', '/var/www/htdocs/INFS3202Proj/uploads/You_Have_Already_Lost1.mp4', 'infs3202'),
(24, 'Powerful_Enough.mp4', '/var/www/htdocs/INFS3202Proj/uploads/Powerful_Enough.mp4', 'Anon'),
(27, 'Streamer_summons_his_dog.mp4', '/var/www/htdocs/INFS3202Proj/uploads/Streamer_summons_his_dog.mp4', 'infs3202'),
(30, '9convert_com_-_Beyonce_makes_Cowboy_fan_sing_360p1.mp4', '/var/www/htdocs/INFS3202Proj/uploads/9convert_com_-_Beyonce_makes_Cowboy_fan_sing_360p1.mp4', 'Anon');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fileID` int(11) NOT NULL,
  `liked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `fileID`, `liked`) VALUES
(8, 'NoshDosh', 12, 1),
(23, 'airo1011', 22, 1),
(26, 'infs3202', 22, 1),
(27, 'airo1011', 10, 1),
(28, 'infs3202', 24, 1),
(30, 'keti', 24, 1),
(31, 'keti', 16, 1),
(32, 'keti', 29, 1),
(33, 'ciro1011', 30, 1),
(34, 'ciro1011', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `emailverificationcode` varchar(60) NOT NULL,
  `emailVerified` int(1) NOT NULL,
  `passwordChangeCode` varchar(60) NOT NULL,
  `identifyingQuestion` varchar(512) NOT NULL,
  `identifyingPhrase` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `emailaddress`, `emailverificationcode`, `emailVerified`, `passwordChangeCode`, `identifyingQuestion`, `identifyingPhrase`) VALUES
(15, 'Aditya', '$2y$10$oiUNSzSh/9C8jTqOzzFkZ.ZIzOz6VaJWh2HctggWwR2VvemdCT5/C', 'Adi', 'Modi', 'AdityaRModi@outlook.com', 'dbbee4428d4331e1db51b4345a65507c472171f5', 0, '', 'f107087c66d16a5d4e48680edc1883c94f31fec08bc973327edf01e2d59fc2bfa94df7cba1c2f6ecf9d8de462c2e01c93951c35fc3889eab536b8f0ce4e1f375FrhHKNJ4C43F9bcPCr0Eq4qIczaCWTjKO2IuBR7Rk4k=', '$2y$10$ZqOSYtE9lzkXuAyc8P4CWuNjOgNHi4oSqUbADlZNKJvpzSJQeqaPu'),
(10, 'airo1011', '$2y$10$i9Mj1BQ/VMTH6ajSaMAaAuQ6UaXqZepvCleKz956IiYBGGuW2sXFG', 'Sam', 'Boy', 'lets@try.thiscom', '13a0bd3e48e658dd2d1d8b9e8d9e21aae6bc0d77', 0, '', '', ''),
(13, 'Anon', '$2y$10$jata/Wu2Qb8PRpcJROIKAO188hIdvaScUFY7cJy.iS8XIkmf3N83a', 'Anon', 'ymous', 'not@real.com', 'ca266aaab90f031b31d73f14e30ab73c570d7998', 0, '', '21959bb0183c16b2884b38cb0217d09d732611c07e544604abce210bea984c04a159c079ad8a8e791c9ddd0a6e9ae84f55af85864cc08598403ec56e23d52f95v8d2Wvww9gGyZNlJgYzX/oHdg+PV5gSHmBXQomNmzOs=', '$2y$10$roy3cqp.nAvce7xeeE9YAO084/1MakaNl1xoR29O1JoConNd6jMai'),
(12, 'biro1011', '$2y$10$Bj4Rmbjjj1V6DsbSb.HuF.SvOlt1tJlXy24n9qELvQYLyOtTBHzH6', 'Sam', 'Boy', 'fake@gmail.com', 'cf04f804f6b9bd844c444d4bafc5c942cadf4938', 0, '', '40ba33482bf5c0d49717e0bc2978cf61aa73cae4b8ebba6c868706e1649c5d6001303a3c1e277335b0ae1b1f3ad8e81fc39913addf9dc163a0a3395d22bb0fa68WCMwEv4PHAu6lm7zQ56f48N0RJvo3r/suMRAI3vTBw=', '$2y$10$TliSBnRsUq2GQl4hag.Fd.dzc4eyftQQJfvQmZzsS7Oxt1jbbDdVq'),
(19, 'ciro1011', '$2y$10$zTlfZJptuhKSREaTKw87TeYezf5DgnmFO8paUzj9IQp8boHzKk6F.', 'Sam', 'Man', 'airo1011@gmail.com', '3b753d462115b7a654ac1537d7d0b8d8c7cb036c', 1, '', '3e0ce41a67d0e60e7247e9b825638f9da5657fe3765a88f24833ca285eff2858676d7dda2ce95ad69969ac93d6c60e1d35b7d4f0e9d36888aa6e683ab8896689wJKkOkgx0HptHIH8/XsO3gkiyQ/ihRz9iumDaNcT9LM=', '$2y$10$qSRLi2XpIPZnnd0iI0SnOuZ.Q6izSCLqK4IylYYfUTxTisSWyEIr.'),
(20, 'cob', '$2y$10$cpOEe1PZsX5Qf1adem16/ecbdkf1sHxiWGGqkp1KIF.5r8iU85h.O', 'cob', 'cob', 'cob@cob.cob', 'b05be0970f1905546f1c62a698a34e0a88808fec', 0, '', '1f85e7745936f6a8c3606c41a556e5ab3572ddaeb70c6f212e3ef020a58215844cc2f8b0fa6aed3cea9a7a172e86753170689488c8f266f09e794aac38579a68Gn8eanxN40cR58JTFfZZLtIOUIVmSyj449Jfwciswpo=', '$2y$10$PkjtFHoN0sKJ3tC/C11HdebjfKnTmWeA1DQqIb0G.2feVUzN3VWl6'),
(1, 'infs3202', '$2y$10$mdCDjlrNCh4QEOOrz9kNyO0q/YlWSH4vJ8GdTQByBnOL95GfOkYYe', 'Test', 'Run', 'notreal@gmail.com', 'f9204e4c0508ed2d3bc9fa5b6aef6a42adc88312', 0, '', '', ''),
(2, 'infs7202', '3202', '', '', 'fake@notreal.com', '', 0, '', '', ''),
(18, 'keti', '$2y$10$rEIPdzpFMqu/dh.w5Wck9OqcgxWF8wNBY30MbF7wGwNasVfH5ADPa', 'keti', 'keti', 'keti@getnada.com', 'eca5ae5910c5174691d20c7aae413e139c2a9ade', 1, '', '7ebb9bc918c3701d31b0ce8e0584cf0256a3519e15b40b48a149185df15c352a8cc2ea35011dce7e3e96296cefc4f6746dc80bbb724c48c711748e2fb1d0015d5zsHUNmiLYTyk0CfYDhtJq8tHtqxJo9RfI0HngXoKJ4=', '$2y$10$N1QdZejT9LwR4YeJNg9Ct.3OAOIjA7W3V0JQbOLZGbeWL3qYo9Tna'),
(14, 'NoshDosh', '$2y$10$HXi4zo53gq7ZBt9BezlURuzb48E.zxy7xosUs1valIVsUAlVCXZdG', 'noah', 'cotterell', 'noahcotterell@gmail.com', '73a39de84dab6e7466ee376ecf62db7754a0c35d', 1, '', '12a482f608c050ee02272699d38de163b63a5e731bd0eafab6f250325c261067afe294c642cf9b62952cd425edffc1f828d331d8d526eea234dfbaa6f5ecc09eQIg+IUOdZv3WUlaJVm4RTwN0yKvVqPGCVWIjzD6ikPEkoToKgcCYyVwDSfI0HR9I', '$2y$10$DwwHVal/KiH/su2SdWMyruV7/ux7YDJ0JIX4wKEICvKUmDrqKa/Cq'),
(16, 'Tom', '$2y$10$Y/SPWQajAjfI51N1CfC4R.U/b2MAWpwfOK5C65eo7ltzP/SMpYW4S', 'Tom', 'Tom', 'nxkggwhdnxqgjrsbtk@twzhhq.com', 'f51fded5cfedb148af8fdacbb7d155f6c2ab177b', 1, '', '0156a09ac4f52bffafa409e22d0e76b31508e5f9913389f223a01e2f6fdb9422d744e14f88342adb6a5cdf86471d43c98a8e9489de2e6beb5fb175d8896a3ede7UZqleLex+OhBuR5VTGD9BgmdensYsu9K+YS/7zx/Pc=', '$2y$10$8nJKPrCwEQpUTI9uqZ5DYuCBnipgIKOOcreXByj/E7ReNk7PHJYyW'),
(17, 'Yolo', '$2y$10$/flE6fAK3V8zhOCpiUQZx.8aWIvO84HqmGjs7MsuaxHrUeN32b42W', 'yolo', 'yolo', 'no@no.no', '636b882690ec5c99d9892f9047c1ea8fd473bcb0', 0, '', '160ffaccc1cd63666349f9a322c089f0cf4d39ff7ed15f4066f79ca7923bb8c209fcfd1174f0d691b8f5f2d0f782b48a531d205dd6b7471efeaf7db1177655a4PlKnfNelaHudDNJ5H36rLUVmHRVfyU71PBYDHDXq678=', '$2y$10$xLjpLa/01JinSictMF9nW.86q5LyczHHu1/GbheBUQZcjk/g/OqhS');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `fileid` int(11) NOT NULL,
  `added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `username`, `fileid`, `added`) VALUES
(97, 'infs3202', 5, 1),
(101, 'NoshDosh', 12, 1),
(104, 'infs3202', 24, 1),
(108, 'ciro1011', 24, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fileID` (`fileID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filename` (`filename`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`username`),
  ADD KEY `file` (`fileID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `emailaddress` (`emailaddress`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `fileid` (`fileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`fileid`) REFERENCES `files` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
