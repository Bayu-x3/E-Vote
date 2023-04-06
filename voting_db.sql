-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 12:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `pict` varchar(1000) NOT NULL,
  `description` varchar(255) NOT NULL,
  `vote_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `class`, `number`, `pict`, `description`, `vote_count`) VALUES
(1, 'Anos Voldigoad', 'XI RPL 2', 1, 'https://i.pinimg.com/originals/fd/ad/83/fdad83821e23d5e3b0b369c6cf58a453.jpg', 'Calon Kandidat Ketua OSIS Nomor 1 Periode 2030 / 2031', 10),
(2, 'Nakano Miku', 'XI RPL 1', 2, 'https://i.pinimg.com/736x/c0/26/2e/c0262eb3af1e95eece5b540471ac5a7b.jpg', 'Calon Kandidat Ketua OSIS Nomor 2 Periode 2030 / 2031', 100),
(3, 'Shiina Mahiru', 'XI RPL 3', 3, 'https://imagecache.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/b9f8cfb5-7eda-4f86-503b-a5907065d700/width=400/01309-3085518873-1girl,%20Mahiru%20Shiina,%20japanese%20clothing,%20roses,%20roses%20pattern,%20spoken%20heart,%20red%20ribbon,%20dress,%20%20facing%20viewer,%20valentines,%20love.png', 'Calon Kandidat Ketua OSIS Nomor 3 Periode 2030 / 2031', 33);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `nisn` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ready` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `name`, `class`, `nisn`, `password`, `ready`) VALUES
(1, 'Bayu Candra Yudistira', 'X PPLG 2', 51507, '051507', 1),
(3, 'Candra Liao', 'X TJKT 1', 211528, '211528', 1),
(4, 'Nazwa Putri Tania', 'X PPLG 2', 12345, '12345', 1),
(5, 'Nasyah Pratiwi', 'X PPLG 2', 1234, '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
