-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 05:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `examid` text NOT NULL,
  `title` text NOT NULL,
  `total` int(11) NOT NULL,
  `etime` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `examid`, `title`, `total`, `etime`, `created`) VALUES
(14, '5eec6938aefcf', 'sample quiz', 22, 45, '2020-06-19 07:28:56'),
(15, '5eec6938aefcf', 'sample quiz', 22, 45, '2020-06-19 07:28:56'),
(16, '5eec6938aefcf', 'sample quiz', 22, 45, '2020-06-19 07:28:56'),
(17, '5eec6938aefcf', 'sample quiz', 22, 45, '2020-06-19 07:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `attemptid` text NOT NULL,
  `qid` text NOT NULL,
  `givenans` varchar(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `id` int(20) NOT NULL,
  `qid` text NOT NULL,
  `examid` text NOT NULL,
  `sn` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` char(1) NOT NULL,
  `explains` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`id`, `qid`, `examid`, `sn`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `explains`, `timestamp`) VALUES
(62, '5eec6d3eb4538', '5eec6938aefcf', 20, 'Water which is held in pores present between neighbouring soil particles is called as', 'Gravitational water ', 'Hydroscopic water ', 'combined water', 'Capillary water', 'd', '', '2020-06-19 13:16:06'),
(58, '5eec6c9076b30', '5eec6938aefcf', 16, 'Microenvironment surrounding the root', 'Hydrosphere', 'Lethosphere', 'Rhizosphere', 'Biosphere', 'c', '', '2020-06-19 13:13:12'),
(59, '5eec6cbd05eeb', '5eec6938aefcf', 17, 'Water available for plant is', 'Gravitational water', 'Hydroscopic water', 'Combined water', 'Capillary water', 'd', '', '2020-06-19 13:13:57'),
(57, '5eec6c6b3ad16', '5eec6938aefcf', 15, 'Plasma membrane is -----', 'Permeable ', 'Selectively permeable', 'Not conform', 'Impermeable', 'b', '', '2020-06-19 13:12:35'),
(56, '5eec6c42c7bad', '5eec6938aefcf', 14, 'Which is true about cell wall', 'Permeable to water', 'Made up of outer pectin and inner cellulose', 'Both A and B ', 'Impermeable to water', 'c', '', '2020-06-19 13:11:54'),
(55, '5eec6be94022e', '5eec6938aefcf', 13, 'Root hair is --------', '1 to 10 mm long', 'Tube like structure', 'Cytoplasmic extention', 'All of these', 'd', '', '2020-06-19 13:10:25'),
(54, '5eec6bc10c7d9', '5eec6938aefcf', 12, 'Absorption of water occure in ', 'Maturation zone', 'Root hair zone', 'Zone of elongation', 'Meristematic region', 'b', '', '2020-06-19 13:09:45'),
(53, '5eec6b9ce8f68', '5eec6938aefcf', 11, '--------form the root hair', 'Mesophyll cell', 'Cortical', 'Epidermal cell(Epiblema cells)', 'Guard cell', 'c', '', '2020-06-19 13:09:08'),
(52, '5eec6b7197ce9', '5eec6938aefcf', 10, 'Epiphytic roots having special tissue for water absorption from air called', 'Cortical cell', 'Velamen', 'Epidermal cell', 'Root cell', 'b', '', '2020-06-19 13:08:25'),
(51, '5eec6b3c2688d', '5eec6938aefcf', 9, 'Epiphytic plants like orchids absorb from air with the help of', 'Epiphytic roots', 'Stilt root', 'Pneumonetic root', 'Capillary water', 'a', '', '2020-06-19 13:07:32'),
(50, '5eec6b0b00a90', '5eec6938aefcf', 8, 'Capillery action of water is due to', 'Surface tension', 'Cohesive force', 'Adhesive force', 'All of these', 'd', '', '2020-06-19 13:06:43'),
(49, '5eec6aba29624', '5eec6938aefcf', 7, 'Water show following properties', 'Thermal buffer', 'Universal solvent', 'Raw material for photosynthesis', 'All of these', 'd', '', '2020-06-19 13:05:22'),
(48, '5eec6a8e0a07b', '5eec6938aefcf', 6, 'For the plant,water is ', 'Important', 'Act as solvent', 'Absorbed from soil', 'Elixir of life ', 'd', '', '2020-06-19 13:04:38'),
(47, '5eec6a624fcae', '5eec6938aefcf', 5, 'The PH of blood is?', '7.5', '4.9', '7.3 to 7.5', 'all', 'c', '', '2020-06-19 13:03:54'),
(46, '5eec6a3b44e98', '5eec6938aefcf', 4, 'The space between two lungs are called as?', 'mediastenum', 'cavity', 'gape', 'lumen', 'a', '', '2020-06-19 13:03:15'),
(45, '5eec6a0963ec1', '5eec6938aefcf', 3, 'Which of the following is the first cell of our body?', 'zygote ', 'all of above', 'none of these', 'adipose cell', 'a', '', '2020-06-19 13:02:25'),
(44, '5eec69e3539d5', '5eec6938aefcf', 2, 'heart is situated in ?', 'all', 'cell', 'mediastenum', 'none of these', 'c', '', '2020-06-19 13:01:47'),
(43, '5eec6999a009f', '5eec6938aefcf', 1, 'Roots of plant absorb the water from ', 'Soil', 'Environment', 'Rhizosphere', 'Rhizoid', 'c', '', '2020-06-19 13:00:33'),
(61, '5eec6d154afe7', '5eec6938aefcf', 19, 'Water percolates deep, due to the gravity, in the soil, is called', 'Gravitational water ', 'Hydroscopic water', 'Combined water', 'Capillary water', 'a', '', '2020-06-19 13:15:25'),
(60, '5eec6ced30ac1', '5eec6938aefcf', 18, 'Water present in the form of hydrated oxides of silicon,aluminium is', 'Gravitational water', 'Hydroscopic water', 'Combined water', 'Capillary water', 'c', '', '2020-06-19 13:14:45'),
(63, '5eec6d695ed23', '5eec6938aefcf', 21, 'Water is -----', 'Imbibition', 'Imbibate', 'Imbibant', 'None', 'b', '', '2020-06-19 13:16:49'),
(64, '5eec6d8cbac16', '5eec6938aefcf', 22, '--------- is responsible for water absorption', 'Imbibition', 'Diffusion', 'Osmosis', 'All', 'd', '', '2020-06-19 13:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `attemptid` text NOT NULL,
  `examid` text NOT NULL,
  `uid` text NOT NULL,
  `marks` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `created`) VALUES
(6, '5ef8c06e7021e', 'a', 'a@gmail.com', '12345678', '2020-06-28 16:08:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
