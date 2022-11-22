-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 10, 2018 at 09:25 AM
-- Server version: 5.5.50-38.0-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinesl_cljackpots`
--

-- --------------------------------------------------------

--
-- Table structure for table `jackpots`
--

CREATE TABLE IF NOT EXISTS `jackpots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `jackpot_code_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `jackpot_code_id` (`jackpot_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `jackpots`
--

INSERT INTO `jackpots` (`id`, `name`, `jackpot_code_id`, `image`) VALUES
(1, 'Cash Splash', 1, 'cashsplash'),
(2, 'Lotsa Loot', 2, 'lotsaloot'),
(3, 'Wow Pot', 3, 'wowpot'),
(4, 'SupaJax', 4, 'superjax'),
(5, 'Fruit Fiesta', 5, 'fruitfiesta'),
(6, 'Treasure Nile', 6, 'treasurenile'),
(7, 'Cyber Stud', 7, 'cyberstud'),
(8, 'Jackpot Deuces', 8, 'jackpotdeuces'),
(9, 'Triple Sevens', 9, 'triplesevens'),
(10, 'Major Millions', 10, 'majormillions'),
(11, 'Roulette Royale', 11, 'rouletteroyale'),
(12, 'King Cashalot', 12, 'kingcashalot'),
(13, 'Tunzamunni', 13, 'tunzamunni'),
(14, 'Poker Ride', 14, 'pokerride'),
(15, 'Mega Moolah', 15, 'megamoolahmega'),
(16, 'Totals', 16, 'totals'),
(17, 'Gladiator Jackpot', 17, 'glrjj-1'),
(18, 'Beach Life', 18, 'bl'),
(19, 'Spamalot', 19, 'spmj-2'),
(20, 'Jackpot Darts', 20, 'drts4'),
(21, 'Magic Slots', 21, 'ms3'),
(22, 'Everybody''s Jackpot', 22, 'evjj-1'),
(23, 'Megaball', 23, 'bls'),
(24, 'Cinerama', 24, 'cifr'),
(25, 'Marvel Super Power', 25, 'mrj-3'),
(26, 'Marvel Jackpot Power', 26, 'mrj-1'),
(27, 'Wall Street Fever', 27, 'wsffr'),
(28, 'Diamond Valley', 28, 'gs2'),
(29, '10 line jacks', 29, 'jb10p'),
(30, 'Dollar Ball', 30, 'ls'),
(31, 'Queen of the Pyramids', 31, 'qop2'),
(32, 'Chests of Plenty', 32, 'ashcpl-1'),
(33, 'Life of Brian', 33, 'ashlob-1'),
(34, 'The Winnings of Oz', 34, 'ashwnoz-1'),
(35, 'Who Wants To Be A Millionaire', 35, 'ashwwm-1'),
(36, 'Caribbean Stud Poker', 36, 'car'),
(37, 'Sweet Party', 37, 'cnpr4'),
(38, 'Cat in Vegas', 38, 'ctivj-1'),
(39, 'Mega Ball', 39, 'drts1'),
(40, 'Esmerelda', 40, 'esm4'),
(41, 'Frankie Dettoris Magic Seven', 41, 'fdtjp-2'),
(42, 'Fei Cui Gong Zhu', 42, 'fei'),
(43, 'Funky Fruits', 43, 'fnfrj4'),
(44, 'Jackpot Giant', 44, 'jpgt1-1'),
(45, 'Blackjack Pro', 45, 'pbj'),
(46, 'Purple Hot', 46, 'phot4'),
(47, 'Pyramid of Ramesses', 47, 'pyrr10'),
(48, 'Streaks of Luck', 48, 'sol6'),
(49, 'Spiderman', 49, 'mrj-4'),
(50, 'Thai Temple', 50, 'tht11'),
(51, 'Mega Gems', 51, 'megagems'),
(52, 'Cosmic Fortune', 52, 'cosmicfortune'),
(53, 'Greedy Goblins', 53, 'greedygoblins'),
(54, 'At The Copa', 54, 'atthecopa'),
(55, 'It Came From Venus', 55, 'itcamefromvenus'),
(56, 'Good Girl, Bad Girl', 56, 'goodgirlbadgirl'),
(57, 'Mega Fortune Touch', 57, 'megafortunetouch'),
(58, 'Mega Fortune', 58, 'megafortune'),
(59, 'A night in Paris JP', 59, 'anightinparisjp'),
(60, 'Tycoons', 60, 'tycoons'),
(61, 'Slots Angels', 61, 'slotsangels'),
(62, 'The Dark Knight', 15, 'thedarkknight'),
(63, 'Mega Moolah Isis', 15, 'megamoolahisis'),
(64, 'The Ghouls', 64, 'theghouls'),
(65, 'Pharaoh King', 65, 'pharaohking'),
(66, 'Jackpot Jamba', 66, 'jackpotjamba'),
(67, 'Chase the Cheese', 67, 'chasethecheese'),
(68, 'Mr. Vegas', 68, 'mrvegas'),
(69, 'Aztec Treasures', 69, 'aztectreasures'),
(70, 'Glam Life', 70, 'glamlife'),
(71, 'Arabian Nights', 71, 'arabiannights'),
(72, 'Super Lucky Frog', 72, 'superluckyfrog'),
(73, 'Mega Joker', 73, 'megajoker'),
(74, 'Geisha Wonders', 74, 'geishawonders'),
(75, 'Icy Wonders', 75, 'icywonders'),
(76, 'Bonus Keno', 76, 'bonuskeno'),
(77, 'Tiki Wonders', 77, 'tikiwonders'),
(78, 'Blade', 49, 'blade'),
(79, 'Captain America', 49, 'captainamerica'),
(80, 'Elektra', 49, 'elektra'),
(81, 'Fantastic Four', 49, 'fantasticfour'),
(82, 'Ghost Rider', 49, 'ghostrider'),
(83, 'incrediblehulk', 49, 'incrediblehulk'),
(84, 'Iron Man Two', 49, 'ironmantwo'),
(85, 'Iron Man Three', 49, 'ironmanthree'),
(86, 'Marvel Roulette', 49, 'marvelroulette'),
(87, 'Spiderman', 49, 'spiderman'),
(88, 'The Avengers', 49, 'theavengers'),
(89, 'Thor', 49, 'thor'),
(90, 'Wolverine', 49, 'wolverine'),
(91, 'Nian Nian You You', 42, 'nian'),
(92, 'Jacks or Better', 78, 'jacksorbetterprogressive'),
(93, 'Round The Clock', 79, 'roundtheclock'),
(94, 'Tiki', 80, 'tiki'),
(95, 'Speed Bingo', 81, 'jpjspeedbingo'),
(96, 'Super Snap', 82, 'supersnap1pound'),
(97, 'Progressive Alice', 83, 'progressivealice'),
(98, 'Emerald', 84, 'emerald'),
(99, 'Deal or No Deal', 85, 'dealornodeal'),
(100, 'Tycoon Progressive', 86, 'tycoonprogressive'),
(101, 'Snap', 87, 'snap'),
(102, 'Bullion', 88, 'bullion'),
(103, 'Caribbean Stud Poker', 89, 'caribbeanstudpoker'),
(104, 'Lounge', 90, 'lounge'),
(105, 'Retro Jacks or Better', 91, 'retrojacksorbetterprog'),
(106, 'Bingo 20', 92, 'bingo20'),
(107, 'Sapphire', 93, 'sapphire'),
(108, 'Mini Tiki Temple', 94, 'minitikitemple'),
(109, 'Tiki Temple', 95, 'tikitemple'),
(110, 'Game Show Bingo', 96, 'gameshowbingo'),
(111, 'Bingo Bejeweled', 97, 'bingobejeweled'),
(112, 'Diamond Bonanza', 98, 'diamondbonanza'),
(113, 'Jackpot Piniatas', 99, 'jackpotpiniatas'),
(114, 'Medal Tally', 100, 'medaltally'),
(115, 'Happy Golden Ox of Happiness', 101, 'happygoldenoxofhappiness'),
(116, 'Jackpot Cleopatra''s Gold', 102, 'jackpotcleopatrasgold'),
(117, 'The Three Stooges', 103, 'thethreestooges'),
(118, 'Year Of Fortune', 104, 'yearoffortune'),
(119, 'Aztec Millions', 105, 'aztecmillions'),
(120, 'Shopping Spree II', 106, 'shoppingspreeii'),
(121, 'Spirit of the Inca', 107, 'spiritoftheinca'),
(122, 'Megasaur', 108, 'megasaur'),
(123, 'Mega Fortune Dreams', 58, 'megafortunedreams');

-- --------------------------------------------------------

--
-- Table structure for table `jackpot_codes`
--

CREATE TABLE IF NOT EXISTS `jackpot_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `provider` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `code` (`code`),
  KEY `code_2` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `jackpot_codes`
--

INSERT INTO `jackpot_codes` (`id`, `code`, `amount`, `provider`, `last_update`) VALUES
(1, 'cashsplash', 85064, 1, '2016-03-17 12:00:02'),
(2, 'lotsaloot', 8309, 1, '2016-03-17 12:00:02'),
(3, 'wowpot', 2848, 1, '2016-03-17 12:00:02'),
(4, 'superjax', 45956, 1, '2016-03-17 12:00:02'),
(5, 'fruitfiesta', 17346, 1, '2016-03-17 12:00:02'),
(6, 'treasurenile', 44427, 1, '2016-03-17 12:00:02'),
(7, 'cyberstud', 120138, 1, '2016-03-17 12:00:02'),
(8, 'jackpotdeuces', 41379, 1, '2016-03-17 12:00:02'),
(9, 'triplesevens', 93421, 1, '2016-03-17 12:00:02'),
(10, 'majormillions', 634004, 1, '2016-03-17 12:00:02'),
(11, 'rouletteroyale', 108109, 1, '2016-03-17 12:00:02'),
(12, 'kingcashalot', 765361, 1, '2016-03-17 12:00:02'),
(13, 'tunzamunni', 37512, 1, '2016-03-17 12:00:02'),
(14, 'pokerride', 204777, 1, '2016-03-17 12:00:02'),
(15, 'megamoolahmega', 8529215, 1, '2016-03-17 12:00:02'),
(16, 'totals', 10737873, 1, '2016-03-17 12:00:02'),
(17, 'glrjj-1', 2072478, 3, '2016-03-17 12:00:06'),
(18, 'bl', 1283053, 3, '2016-03-17 12:00:06'),
(19, 'spmj-2', 388471, 3, '2016-03-17 12:00:06'),
(20, 'drts4', 301515, 3, '2016-03-17 12:00:06'),
(21, 'ms3', 106964, 3, '2016-03-17 12:00:06'),
(22, 'evjj-1', 453528, 3, '2016-03-17 12:00:06'),
(23, 'bls', 44864, 3, '2016-03-17 12:00:06'),
(24, 'cifr', 80893, 3, '2016-03-17 12:00:06'),
(25, 'mrj-3', 33475, 3, '2016-03-17 12:00:06'),
(26, 'mrj-1', 412, 3, '2016-03-17 12:00:06'),
(27, 'wsffr', 243658, 3, '2016-03-17 12:00:06'),
(28, 'gs2', 44181, 3, '2016-03-17 12:00:07'),
(29, 'jb10p', 1911, 3, '2016-03-17 12:00:07'),
(30, 'ls', 97229, 3, '2016-03-17 12:00:07'),
(31, 'qop2', 21002, 3, '2016-03-17 12:00:07'),
(32, 'ashcpl-1', 270749, 3, '2016-03-17 12:00:07'),
(33, 'ashlob-1', 122710, 3, '2016-03-17 12:00:07'),
(34, 'ashwnoz-1', 132299, 3, '2016-03-17 12:00:07'),
(35, 'ashwwm-1', 110481, 3, '2016-03-17 12:00:07'),
(36, 'car', 0, 3, '2016-03-17 12:00:07'),
(37, 'cnpr4', 1287121, 3, '2016-03-17 12:00:07'),
(38, 'ctivj-1', 16876, 3, '2016-03-17 12:00:07'),
(39, 'drts1', 46477, 3, '2016-03-17 12:00:07'),
(40, 'esm4', 128239, 3, '2016-03-17 12:00:07'),
(41, 'fdtjp-2', 434415, 3, '2016-03-17 12:00:07'),
(42, 'drgj-1', 22585, 3, '2016-03-17 12:00:07'),
(43, 'fnfrj4', 606844, 3, '2016-03-17 12:00:07'),
(44, 'jpgt1-1', 809102, 3, '2016-03-17 12:00:07'),
(45, 'pbj', 120908, 3, '2016-03-17 12:00:07'),
(46, 'phot4', 61636, 3, '2016-03-17 12:00:07'),
(47, 'pyrr10', 51130, 3, '2016-03-17 12:00:07'),
(48, 'sol6', 19972, 3, '2016-03-17 12:00:07'),
(49, 'mrj-4', 352810, 3, '2016-03-17 12:00:07'),
(50, 'tht11', 215722, 3, '2016-03-17 12:00:07'),
(51, 'megagems', 2866542, 5, '2016-03-17 12:00:07'),
(52, 'cosmicfortune', 61979, 2, '2016-03-17 12:00:07'),
(53, 'greedygoblins', 1790772, 5, '2016-03-17 12:00:07'),
(54, 'atthecopa', 516566, 5, '2016-03-17 12:00:07'),
(55, 'itcamefromvenus', 1432591, 5, '2016-03-03 00:00:06'),
(56, 'goodgirlbadgirl', 322824, 5, '2016-03-17 12:00:07'),
(57, 'megafortunetouch', 591563, 2, '2016-03-17 12:00:07'),
(58, 'megafortune', 591563, 2, '2016-03-17 12:00:07'),
(59, 'anightinparisjp', 687666, 5, '2016-03-17 12:00:07'),
(60, 'tycoons', 71957, 5, '2016-03-17 12:00:07'),
(61, 'slotsangels', 258516, 5, '2016-03-17 12:00:07'),
(62, 'thedarkknight', 8529221, 2, '2016-03-17 12:00:07'),
(63, 'megamoolahisis', 8529221, 2, '2016-03-17 12:00:07'),
(64, 'theghouls', 716232, 5, '2016-03-17 12:00:07'),
(65, 'pharaohking', 143692, 5, '2016-03-17 12:00:07'),
(66, 'jackpotjamba', 719060, 5, '2016-03-17 12:00:07'),
(67, 'chasethecheese', 269362, 5, '2016-03-17 12:00:07'),
(68, 'mrvegas', 286338, 5, '2016-03-17 12:00:07'),
(69, 'aztectreasures', 21497, 5, '2016-03-17 12:00:07'),
(70, 'glamlife', 718895, 5, '2016-03-17 12:00:07'),
(71, 'arabiannights', 454472, 2, '2016-03-17 12:00:07'),
(72, 'superluckyfrog', 35822, 2, '2016-03-17 12:00:07'),
(73, 'megajoker', 4280, 2, '2016-03-17 12:00:07'),
(74, 'geishawonders', 84823, 2, '2016-03-17 12:00:07'),
(75, 'icywonders', 84823, 2, '2016-03-17 12:00:07'),
(76, 'bonuskeno', 13930, 2, '2016-03-17 12:00:07'),
(77, 'tikiwonders', 84823, 2, '2016-03-17 12:00:07'),
(78, 'jacksorbetterprogressive', 3304, 4, '2016-03-17 12:00:08'),
(79, 'roundtheclock', 223, 4, '2016-03-17 12:00:08'),
(80, 'tiki', 583, 4, '2016-02-03 11:47:41'),
(81, 'jpjspeedbingo', 1554, 4, '2016-03-17 12:00:08'),
(82, 'supersnap1pound', 2299, 4, '2016-03-17 12:00:08'),
(83, 'progressivealice', 542730, 4, '2016-03-17 12:00:08'),
(84, 'emerald', 579, 4, '2016-02-03 11:47:41'),
(85, 'dealornodeal', 116373, 4, '2016-03-17 12:00:08'),
(86, 'tycoonprogressive', 1017, 4, '2016-03-17 12:00:08'),
(87, 'snap', 10000, 4, '2016-03-17 12:00:08'),
(88, 'bullion', 3266, 4, '2016-03-17 12:00:08'),
(89, 'caribbeanstudpoker', 73660, 4, '2016-03-17 12:00:08'),
(90, 'lounge', 3874, 4, '2016-03-17 12:00:08'),
(91, 'retrojacksorbetterprog', 3304, 4, '2016-03-17 12:00:08'),
(92, 'bingo20', 31, 4, '2016-03-17 12:00:08'),
(93, 'sapphire', 3947, 4, '2016-02-03 11:47:41'),
(94, 'minitikitemple', 542730, 4, '2016-03-17 12:00:08'),
(95, 'tikitemple', 542730, 4, '2016-03-17 12:00:08'),
(96, 'gameshowbingo', 1377, 4, '2016-03-17 12:00:08'),
(97, 'bingobejeweled', 83588, 4, '2016-01-07 22:33:51'),
(98, 'diamondbonanza', 15679, 4, '2016-03-17 12:00:08'),
(99, 'i43', 1758569, 6, '2016-03-17 12:00:10'),
(100, 'i44', 20750, 6, '2016-03-17 12:00:10'),
(101, 'i48', 20060, 6, '2016-03-17 12:00:10'),
(102, 'i50', 362705, 6, '2016-03-17 12:00:10'),
(103, 'i52', 24195, 6, '2016-03-17 12:00:10'),
(104, 'i54', 14757, 6, '2016-03-17 12:00:10'),
(105, 'i57', 1820418, 6, '2016-03-17 12:00:10'),
(106, 'i65', 366064, 6, '2016-03-17 12:00:10'),
(107, 'i118', 286992, 6, '2016-03-17 12:00:10'),
(108, 'i131', 972666, 6, '2016-03-17 12:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE IF NOT EXISTS `providers` (
  `provider_id` int(11) NOT NULL,
  `provider_name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`provider_id`, `provider_name`) VALUES
(1, 'Microgaming'),
(2, 'NetEnt'),
(3, 'Playtech'),
(4, 'Gamesys'),
(5, 'Betsoft'),
(6, 'Real Time Gaming');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jackpots`
--
ALTER TABLE `jackpots`
  ADD CONSTRAINT `jackpots_ibfk_1` FOREIGN KEY (`jackpot_code_id`) REFERENCES `jackpot_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
