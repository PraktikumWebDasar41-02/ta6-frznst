-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 05:32 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurnal`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_pict` int(11) NOT NULL,
  `Judul` text NOT NULL,
  `caption` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` date NOT NULL,
  `nim` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_pict`, `Judul`, `caption`, `gambar`, `tanggal`, `nim`) VALUES
(16, 'Tiny Touch', 'Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch Tiny touch ', 'img/IMG_20180524_015554.jpg', '2018-10-14', '140117432'),
(17, 'Wayang Golek', 'Wayang Golek suka begoek golek auwwww Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona ', 'img/IMG_20161115_182928.jpg', '2018-10-14', '6701174082'),
(18, 'nyaaaam', 'nyaaaamnyaaaamnyaaaamnyaaaamnyaaaamnyaaaamnyaaaamnyaaaamnyaaaamnyaaaamnyaaaam', 'img/1490089973030.jpg', '2018-10-14', '140117432'),
(22, 'Jokowi', 'Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi Jokowi ', 'img/1490371051839.jpg', '2018-10-14', '6701174082'),
(23, 'Ireonacu', 'Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona Ireona ', 'img/IMG_20180524_015554.jpg', '2018-10-14', '6701174082');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(35) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `hobi` varchar(25) NOT NULL,
  `fakultas` varchar(5) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `nim`, `kelas`, `kelamin`, `hobi`, `fakultas`, `alamat`) VALUES
('Yulia Wahyuni S', '140117432', 'MI02', 'wanita', 'baca', 'FEB', 'PGA Kartika1'),
('firza', '6701174082', 'MI02', 'pria', 'sepeda-baca', 'FIT', 'Wismalana Baru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_pict`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_pict` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `user` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
