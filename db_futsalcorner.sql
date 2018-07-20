-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 01:02 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_futsalcorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_book`
--

CREATE TABLE `data_book` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_book`
--

INSERT INTO `data_book` (`id_booking`, `id_user`, `date`, `status`, `price`) VALUES
(1, 1, '2018-06-05', 'Verified', 180000),
(3, 1, '2018-06-05', 'Verified', 270000);

-- --------------------------------------------------------

--
-- Table structure for table `data_detail_booking`
--

CREATE TABLE `data_detail_booking` (
  `id_detail` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_jadwal` varchar(6) NOT NULL,
  `id_field` varchar(6) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_detail_booking`
--

INSERT INTO `data_detail_booking` (`id_detail`, `id_booking`, `id_jadwal`, `id_field`, `price`) VALUES
(1, 1, 'JB001', 'FF001', 90000),
(2, 1, 'JB002', 'FF001', 90000),
(3, 3, 'JB003', 'FF001', 90000),
(4, 3, 'JB004', 'FF001', 90000),
(5, 3, 'JB005', 'FF001', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(6) NOT NULL,
  `jadwal_jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `jadwal_jam`) VALUES
('JB001', '09:00-10.00'),
('JB002', '10:00-11.00'),
('JB003', '11:00-12.00'),
('JB004', '12:00-13.00'),
('JB005', '13:00-14.00'),
('JB006', '14:00-15.00'),
('JB007', '15:00-16.00'),
('JB008', '16:00-17.00'),
('JB009', '17:00-18.00'),
('JB010', '18.00-19.00'),
('JB011', '19.00-20.00'),
('JB012', '20.00-21.00');

-- --------------------------------------------------------

--
-- Table structure for table `data_lapangan`
--

CREATE TABLE `data_lapangan` (
  `id_field` varchar(6) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `member_price` int(11) NOT NULL,
  `public_price` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lapangan`
--

INSERT INTO `data_lapangan` (`id_field`, `nama`, `member_price`, `public_price`, `description`, `picture`) VALUES
('FF001', 'Court 1', 90000, 120000, 'Lapangan futsal, dengan lapangan karet biru yang aman dan tidak licin. Dekat dengan kantin dan WC. Lapangan ini terletak disebelah kanan kasir, dekat pintu masuk.', 'assets/img/1.jpg'),
('FF002', 'Court 2', 110000, 130000, 'Lapangan futsal dengan rumput sintetis yang membuat suasana seperti sedang bermain sepak bola. Posisi lapangan berada di tengah.', 'assets/img/2.png'),
('FF003', 'Court 3', 160000, 180000, 'Lapangan mini soccer dengan rumput sintetis yang menjadikan permainan futsal dilapangan ini terasa mengasikan dan suasana yang seperti bermain sepak bola.', 'assets/img/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pembayaran`
--

INSERT INTO `data_pembayaran` (`id_pembayaran`, `id_booking`, `tgl_bayar`, `price`, `bukti_transfer`) VALUES
(1, 1, '2018-06-05 00:00:00', 180000, 'bukti/IDBOOK1.jpg'),
(2, 3, '2018-06-05 00:00:00', 270000, 'bukti/IDBOOK3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(11) NOT NULL,
  `hash_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `email`, `role`, `status`, `hash_password`) VALUES
(1, 'Hamnoer', 'ilhamn33@gmail.com', 'user', 'pending', '01ab88f593b816394fd52fed02e8fadb'),
(2, 'noer', 'ilhamnur@student.upi.edu', 'admin', 'pending', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_book`
--
ALTER TABLE `data_book`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `trans_booking_user_account_id_user_fk` (`id_user`);

--
-- Indexes for table `data_detail_booking`
--
ALTER TABLE `data_detail_booking`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `data_detail_booking_data_jadwal_id_jadwal_fk` (`id_jadwal`),
  ADD KEY `data_detail_booking_data_book_id_booking_fk` (`id_booking`),
  ADD KEY `data_detail_booking_data_lapangan_id_field_fk` (`id_field`);

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `data_lapangan`
--
ALTER TABLE `data_lapangan`
  ADD PRIMARY KEY (`id_field`);

--
-- Indexes for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_book_trans_booking_id_booking_fk` (`id_booking`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `table_user_email_uindex` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_book`
--
ALTER TABLE `data_book`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_detail_booking`
--
ALTER TABLE `data_detail_booking`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_book`
--
ALTER TABLE `data_book`
  ADD CONSTRAINT `trans_booking_user_account_id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`);

--
-- Constraints for table `data_detail_booking`
--
ALTER TABLE `data_detail_booking`
  ADD CONSTRAINT `data_detail_booking_data_book_id_booking_fk` FOREIGN KEY (`id_booking`) REFERENCES `data_book` (`id_booking`),
  ADD CONSTRAINT `data_detail_booking_data_jadwal_id_jadwal_fk` FOREIGN KEY (`id_jadwal`) REFERENCES `data_jadwal` (`id_jadwal`),
  ADD CONSTRAINT `data_detail_booking_data_lapangan_id_field_fk` FOREIGN KEY (`id_field`) REFERENCES `data_lapangan` (`id_field`);

--
-- Constraints for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD CONSTRAINT `pembayaran_book_trans_booking_id_booking_fk` FOREIGN KEY (`id_booking`) REFERENCES `data_book` (`id_booking`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
