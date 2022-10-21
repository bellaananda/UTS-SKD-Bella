-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 21 Okt 2022 pada 00.16
-- Versi server: 8.0.27
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_nominee`
--

DROP TABLE IF EXISTS `student_nominee`;
CREATE TABLE IF NOT EXISTS `student_nominee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nisn` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `school` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
