-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 11:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan-bpbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `nama_bantuan` varchar(50) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `stok` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id_bantuan`, `nama_bantuan`, `kategori`, `satuan`, `stok`) VALUES
(1, 'Karung Plastik', 'MATERIAL', 'Lembar\n', 0),
(2, 'Triplek', 'MATERIAL', 'Lembar\n', 100),
(3, 'Seng', 'MATERIAL', 'Lembar', 100),
(4, 'Paku Payung', 'MATERIAL', 'Ons', 100),
(5, 'Paku Usuk', 'MATERIAL', 'Ons', 100),
(6, 'Paku Reng', 'MATERIAL', 'Ons', 100),
(7, 'Tanah Urug', 'MATERIAL', 'm³', 100),
(8, 'Kawat Bronjong', 'MATERIAL', 'Biji', 100),
(9, 'Batu Belah', 'MATERIAL', 'm³', 100),
(10, 'Seng Bergelombang', 'MATERIAL', 'Lembar', 100),
(11, 'Plastik Mika Penutup Longsor', 'MATERIAL', 'Roll', 100),
(12, 'Genteng', 'MATERIAL', 'Buah', 100),
(13, 'Kerpus', 'MATERIAL', 'Buah', 100),
(14, 'Semen', 'MATERIAL', 'Sak', 100),
(15, 'Batu Bata', 'MATERIAL', 'Buah', 100),
(16, 'Pasir', 'MATERIAL', 'm³', 100),
(17, 'Selimut', 'SANDANG', 'Lembar', 100),
(18, 'Selimut Lurik', 'SANDANG', 'Lembar', 100),
(19, 'Jarik', 'SANDANG', 'Lembar', 100),
(20, 'Sarung', 'SANDANG', 'Lembar', 100),
(21, 'Kelambu', 'SANDANG', 'Lembar', 100),
(22, 'Baju anak', 'SANDANG', 'Pcs', 100),
(23, 'Kaos dalam laki - laki ', 'SANDANG', 'Pcs', 100),
(24, 'Celana dalam wanita', 'SANDANG', 'Pcs', 100),
(25, 'Daster', 'SANDANG', 'Pcs', 100),
(26, 'Kaos untuk relawan', 'SANDANG', 'Buah', 100),
(27, 'Seragam Relawan', 'SANDANG', 'Buah', 100),
(28, 'Paket Sandang', 'SANDANG', 'Paket', 100),
(29, 'Kid Ware', 'SANDANG', 'Paket', 100),
(30, 'Kids Ware', 'SANDANG', 'Paket', 100),
(31, 'Family Kit', 'SANDANG', 'Paket', 100),
(32, 'Peralatan Dapur / Food ware', 'SANDANG', 'Paket', 100),
(33, 'Peralatan Kesehatan Rumah Tangga', 'SANDANG', 'Paket', 100),
(34, 'Peralatan Kesehatan/Kebersihan', 'SANDANG', 'Paket', 100),
(35, 'Perlengkapan Sekolah', 'SANDANG', 'Paket', 100),
(36, 'Perlengkapan Makan', 'SANDANG', 'Paket', 100),
(37, 'Kantong Mayat', 'SANDANG', 'Buah', 100),
(38, 'Kantong Jenazah', 'SANDANG', 'Buah', 100),
(39, 'Paket Rekreasional', 'SANDANG', 'Paket', 100),
(40, 'Medical kit', 'SANDANG', 'Paket', 100),
(41, 'Matras ', 'SANDANG', 'Lembar', 100),
(42, 'Tikar ', 'SANDANG', 'Lembar', 100),
(43, 'Tenda Gulung', 'SANDANG', 'Lembar', 100),
(44, 'Paket Seragam PA', 'SANDANG', 'Buah', 100),
(45, 'Paket Seragam PI', 'SANDANG', 'Buah', 100),
(46, 'Tas Sekolah', 'SANDANG', 'Pcs', 100),
(47, 'Pakaian Seragam SD PA', 'SANDANG', 'Buah', 100),
(48, 'Pakaian Seragam SD PI', 'SANDANG', 'Buah', 100),
(49, 'Handuk', 'SANDANG', 'Buah', 100),
(50, 'Wajan ', 'SANDANG', 'Buah', 100),
(51, 'Panci ', 'SANDANG', 'Buah', 100),
(52, 'Brosur Kebencanaan', 'SANDANG', 'Lembar', 100),
(53, 'Sepatu Boot', 'SANDANG', 'Buah', 100),
(54, 'Jas Hujan', 'SANDANG', 'Buah', 100),
(55, 'Webbing', 'SANDANG', 'Roll', 100),
(56, 'Buku Cerita', 'SANDANG', 'Buah', 100),
(57, 'Buku Saku Kebencanaan', 'SANDANG', 'Buah', 100),
(58, 'Tas Tahan Air', 'SANDANG', 'Buah', 100),
(59, 'Tas Penyimpan Dokumen Penting', 'SANDANG', 'Buah', 100),
(60, 'Pembalut Charm', 'SANDANG', 'Pack', 100),
(61, 'Pembalut Laurier', 'SANDANG', 'Pack', 100),
(62, 'Pembalut', 'SANDANG', 'Pack', 100),
(63, 'Pempers', 'SANDANG', 'Buah', 100),
(64, 'Pampers M', 'SANDANG', 'Buah', 100),
(65, 'Pempers L', 'SANDANG', 'Buah', 100),
(66, 'Pampers S', 'SANDANG', 'Buah', 100),
(67, 'Pampers', 'SANDANG', 'Buah', 100),
(68, 'Linggis', 'SANDANG', 'Buah', 100),
(69, 'Cangkul', 'SANDANG', 'Buah', 100),
(70, 'Skop', 'SANDANG', 'Buah', 100),
(71, 'Garpu', 'SANDANG', 'Buah', 100),
(72, 'Parang', 'SANDANG', 'Buah', 100),
(73, 'Helmet Font Brim Ventedorange', 'SANDANG', 'Buah', 100),
(74, 'Helmet Front Brim Orange', 'SANDANG', 'Buah', 100),
(75, 'Sarung Tangan Latex Yellow', 'SANDANG', 'Buah', 100),
(76, 'Sarung Tangan Glove Blue Leather', 'SANDANG', 'Buah', 100),
(77, 'Sarung Tangan Kain', 'SANDANG', 'dos', 100),
(78, 'Masker', 'SANDANG', 'dos', 100),
(79, 'Troly', 'SANDANG', 'Buah', 100),
(80, 'Hygiene Kit', 'SANDANG', 'Paket', 100),
(81, 'Sarung ', 'SANDANG', 'Buah', 100),
(82, 'Tikar', 'SANDANG', 'Pcs', 100),
(83, 'Air Mineral', 'MAKANAN DAN MINUMAN', 'Dus', 200),
(84, 'Air Mineral Botol', 'MAKANAN DAN MINUMAN', 'Dus', 100),
(85, 'Air Mineral Gelas', 'MAKANAN DAN MINUMAN', 'Dus', 100),
(86, 'Beras', 'MAKANAN DAN MINUMAN', 'Kg', 100),
(87, 'Gula Pasir', 'MAKANAN DAN MINUMAN', 'Kg', 100),
(88, 'Lauk Pauk', 'MAKANAN DAN MINUMAN', 'Paket', 100),
(89, 'Minyak Goreng', 'MAKANAN DAN MINUMAN', 'Liter', 100),
(90, 'Mie Instan', 'MAKANAN DAN MINUMAN', 'Dus', 100),
(91, 'Bubur Sun @24', 'MAKANAN DAN MINUMAN', 'Buah', 100),
(92, 'Bubur Sun @24 (Makanan Balita)', 'MAKANAN DAN MINUMAN', 'Buah', 100),
(93, 'Makanan Balita', 'MAKANAN DAN MINUMAN', 'Buah', 100),
(94, 'Susu Anak/Balita', 'MAKANAN DAN MINUMAN', 'Buah', 100),
(95, 'Susu Kaleng', 'MAKANAN DAN MINUMAN', 'Kaleng', 100),
(96, 'Kecap', 'MAKANAN DAN MINUMAN', 'Botol', 100),
(97, 'Tambahan Gizi', 'MAKANAN DAN MINUMAN', 'Paket', 100),
(98, 'Saos', 'MAKANAN DAN MINUMAN', 'Botol', 100),
(99, 'Teh Serbuk', 'MAKANAN DAN MINUMAN', 'Buah', 100),
(100, 'Teh Celup', 'MAKANAN DAN MINUMAN', 'Dus', 100),
(101, 'Kopi Susu', 'MAKANAN DAN MINUMAN', 'Sachet', 100),
(102, 'Kopi Instan', 'MAKANAN DAN MINUMAN', 'Sachet', 100),
(103, 'Sarden', 'MAKANAN DAN MINUMAN', 'Kaleng', 100),
(104, 'Siap Saji', 'MAKANAN DAN MINUMAN', 'Paket', 100),
(105, 'Yogurt', 'MAKANAN DAN MINUMAN', 'Buah', 100),
(106, 'Daging Kaleng', 'MAKANAN DAN MINUMAN', 'Buah', 100);

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_distribusi`
--

CREATE TABLE `bantuan_distribusi` (
  `id_bantuan_distribusi` int(11) NOT NULL,
  `id_distribusi` int(11) DEFAULT NULL,
  `id_stok_bantuan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bantuan_distribusi`
--

INSERT INTO `bantuan_distribusi` (`id_bantuan_distribusi`, `id_distribusi`, `id_stok_bantuan`, `jumlah`, `satuan`, `batch`) VALUES
(6, 2, 1, 100, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `bencana`
--

CREATE TABLE `bencana` (
  `id_bencana` int(11) NOT NULL,
  `nama_bencana` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `nama_bencana`) VALUES
(1, 'Banjir'),
(2, 'Tanah Longsor'),
(3, 'Banjir dan Tanah lon'),
(4, 'Abrasi'),
(5, 'Puting Beliung'),
(6, 'Kekeringan'),
(7, 'Kebakaran'),
(8, 'Kebakaran Hutan dan '),
(9, 'Gempa Bumi'),
(10, 'Tsunami'),
(11, 'Gempa Bumi dan Tsuna'),
(12, 'Letusan Gunung Api'),
(13, 'Wabah Penyakit'),
(14, 'Pohon Tumbang'),
(15, 'Angin Kencang'),
(16, 'Rumah Tertimpa Pohon'),
(17, 'Pohon Tumbang'),
(18, 'Orang Tenggelam'),
(19, 'Pondokan Roboh'),
(20, 'Kebakaran Rumah'),
(21, 'Evakuasi Sarang Tawo'),
(22, 'Tebing Longsor'),
(23, 'Orang Hilang di pera'),
(24, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id_distribusi` int(11) NOT NULL,
  `id_peninjauan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_distribusi` date NOT NULL,
  `keterangan_distribusi` text NOT NULL,
  `status_distribusi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `id_peninjauan`, `id_user`, `tanggal_distribusi`, `keterangan_distribusi`, `status_distribusi`) VALUES
(2, 1, 4, '2023-01-05', 'makanan bencana', 'Sedang di proses');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id_pelaporan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_bencana` int(11) DEFAULT NULL,
  `tanggal_pelaporan` date DEFAULT NULL,
  `pelaporan` text DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `status_pelaporan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`id_pelaporan`, `id_user`, `id_bencana`, `tanggal_pelaporan`, `pelaporan`, `id_wilayah`, `link_maps`, `status_pelaporan`) VALUES
(1, 3, 1, '2023-01-02', 'Kebanjiran karena tanggul jebol', 4, '', 'tervalidasi'),
(2, 6, 1, '2023-01-08', 'banjir selutut orang dewasa, satu kelurahan', 1, '', 'tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `peninjauan`
--

CREATE TABLE `peninjauan` (
  `id_peninjauan` int(11) NOT NULL,
  `id_pelaporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_bencana` int(11) DEFAULT NULL,
  `kategori_bencana` varchar(20) DEFAULT NULL,
  `level_bencana` int(11) DEFAULT NULL,
  `tanggal_peninjauan` date NOT NULL,
  `jumlah_korban` int(11) NOT NULL,
  `keterangan_peninjauan` text NOT NULL,
  `status_peninjauan` varchar(30) NOT NULL,
  `bukti_peninjauan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peninjauan`
--

INSERT INTO `peninjauan` (`id_peninjauan`, `id_pelaporan`, `id_user`, `id_wilayah`, `id_bencana`, `kategori_bencana`, `level_bencana`, `tanggal_peninjauan`, `jumlah_korban`, `keterangan_peninjauan`, `status_peninjauan`, `bukti_peninjauan`) VALUES
(1, 1, 5, 4, 1, 'Bencana Alam', 2, '2023-01-02', 12, 'Banjir karena tanggul jebol', 'proses', '167264083682a3444a-aadc-4800-8df6-757b0c0d7c17.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bantuan`
--

CREATE TABLE `stok_bantuan` (
  `id_stok_bantuan` int(11) NOT NULL,
  `id_bantuan` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `stok_masuk` int(11) DEFAULT NULL,
  `stok_tersedia` int(11) DEFAULT NULL,
  `batch` varchar(45) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_bantuan`
--

INSERT INTO `stok_bantuan` (`id_stok_bantuan`, `id_bantuan`, `tanggal_masuk`, `tanggal_kadaluarsa`, `stok_masuk`, `stok_tersedia`, `batch`, `satuan`) VALUES
(1, 1, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(2, 2, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(3, 3, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(4, 4, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(5, 5, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(6, 6, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(7, 7, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(8, 8, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(9, 9, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(10, 10, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(11, 11, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(12, 12, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(13, 13, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(14, 14, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(15, 15, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(16, 16, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(17, 17, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(18, 18, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(19, 19, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(20, 20, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(21, 21, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(22, 22, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(23, 23, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(24, 24, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(25, 25, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(26, 26, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(27, 27, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(28, 28, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(29, 29, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(30, 30, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(31, 31, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(32, 32, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(33, 33, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(34, 34, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(35, 35, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(36, 36, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(37, 37, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(38, 38, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(39, 39, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(40, 40, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(41, 41, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(42, 42, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(43, 43, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(44, 44, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(45, 45, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(46, 46, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(47, 47, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(48, 48, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(49, 49, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(50, 50, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(51, 51, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(52, 52, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(53, 53, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(54, 54, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(55, 55, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(56, 56, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(57, 57, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(58, 58, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(59, 59, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(60, 60, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(61, 61, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(62, 62, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(63, 63, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(64, 64, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(65, 65, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(66, 66, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(67, 67, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(68, 68, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(69, 69, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(70, 70, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(71, 71, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(72, 72, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(73, 73, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(74, 74, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(75, 75, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(76, 76, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(77, 77, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(78, 78, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(79, 79, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(80, 80, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(81, 81, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(82, 82, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(83, 83, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(84, 84, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(85, 85, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(86, 86, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(87, 87, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(88, 88, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(89, 89, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(90, 90, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(91, 91, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(92, 92, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(93, 93, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(94, 94, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(95, 95, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(96, 96, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(97, 97, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(98, 98, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(99, 99, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(100, 100, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(101, 101, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(102, 102, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(103, 103, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(104, 104, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(105, 105, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL),
(106, 106, '2023-01-09', '2025-01-09', 100, 100, '2023-01-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `alamat_user` text DEFAULT NULL,
  `no_telp_user` varchar(13) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_telp_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'pati', '0893456745', 'admin', 'admin', 'petugas_bpbd'),
(2, 'kepala', 'kudus', '0893456745', 'kepala', 'kepala', 'kepala_bpbd'),
(3, 'ayuk', 'kudus', '08934566547', 'ayuk', 'ayuk', 'masyarakat'),
(4, 'logistik', 'kudus', '0893456734', 'logistik', 'logistik', 'petugas_logistik'),
(5, 'kajian', 'kudus', '08934567534', 'kajian', 'kajian', 'petugas_kajian'),
(6, 'dyah', 'kudus', '089778908000', 'dyah', '12345', 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `kecamatan`, `desa`, `no_telp`, `status`) VALUES
(1, 'BAE', 'Bacin', '89765676561', NULL),
(2, 'BAE', 'Bae', '89765676562', NULL),
(3, 'BAE', 'Dersalam', '89765676563', NULL),
(4, 'BAE', 'Gondangmanis', '89765676564', NULL),
(5, 'BAE', 'Karangbener', '89765676565', NULL),
(6, 'BAE', 'Ngembalrejo', '89765676566', NULL),
(7, 'BAE', 'Panjang', '89765676567', NULL),
(8, 'BAE', 'Pedawang', '89765676568', NULL),
(9, 'BAE', 'Peganjaran', '89765676569', NULL),
(10, 'BAE', 'Purworejo', '89765676570', NULL),
(11, 'DAWE', 'NAMA DESA DAWE', 'KODE POS', NULL),
(12, 'DAWE', 'Cendono', '87656765431', NULL),
(13, 'DAWE', 'Colo', '87656765432', NULL),
(14, 'DAWE', 'Cranggang', '87656765433', NULL),
(15, 'DAWE', 'Dukuhwaringin', '87656765434', NULL),
(16, 'DAWE', 'Glagah Kulon', '87656765435', NULL),
(17, 'DAWE', 'Japan', '87656765436', NULL),
(18, 'DAWE', 'Kajar', '87656765437', NULL),
(19, 'DAWE', 'Kandangmas', '87656765438', NULL),
(20, 'DAWE', 'Kuwukan', '87656765439', NULL),
(21, 'DAWE', 'Lau', '87656765440', NULL),
(22, 'DAWE', 'Margorejo', '87656765441', NULL),
(23, 'DAWE', 'Piji', '87656765442', NULL),
(24, 'DAWE', 'Puyoh', '87656765443', NULL),
(25, 'DAWE', 'Rejosari', '87656765444', NULL),
(26, 'DAWE', 'Samirejo', '87656765445', NULL),
(27, 'DAWE', 'Soco', '87656765446', NULL),
(28, 'DAWE', 'Tergo', '87656765447', NULL),
(29, 'DAWE', 'Ternadi', '87656765448', NULL),
(30, 'GEBOG', 'Besito', '59163', NULL),
(31, 'GEBOG', 'Getasrabi', '59163', NULL),
(32, 'GEBOG', 'Gondosari', '59163', NULL),
(33, 'GEBOG', 'Gribig', '59163', NULL),
(34, 'GEBOG', 'Jurang', '59163', NULL),
(35, 'GEBOG', 'Karangmalang', '59163', NULL),
(36, 'GEBOG', 'Kedungsari', '59163', NULL),
(37, 'GEBOG', 'Klumpit', '59163', NULL),
(38, 'GEBOG', 'Menawan', '59163', NULL),
(39, 'GEBOG', 'Padurenan', '59163', NULL),
(40, 'GEBOG', 'Rahtawu', '59163', NULL),
(41, 'JATI', 'Getaspejaten', '59153', NULL),
(42, 'JATI', 'Jati Kulon', '59153', NULL),
(43, 'JATI', 'Jati Wetan', '59153', NULL),
(44, 'JATI', 'Jepangpakis', '59153', NULL),
(45, 'JATI', 'Jetiskapuan', '59153', NULL),
(46, 'JATI', 'Loram Kulon', '59153', NULL),
(47, 'JATI', 'Loram Wetan', '59153', NULL),
(48, 'JATI', 'Megawon', '59153', NULL),
(49, 'JATI', 'Ngembal Kulon', '59153', NULL),
(50, 'JATI', 'Pasuruhan Kidul', '59153', NULL),
(51, 'JATI', 'Pasuruhan Lor', '59153', NULL),
(52, 'JATI', 'Ploso', '59153', NULL),
(53, 'JATI', 'Tanjungkarang', '59153', NULL),
(54, 'JATI', 'Tumpangkrasak', '59153', NULL),
(55, 'JEKULO', 'Bulung Kulon', '59185', NULL),
(56, 'JEKULO', 'Bulungcangkring', '59185', NULL),
(57, 'JEKULO', 'Gondoharum', '59185', NULL),
(58, 'JEKULO', 'Hadipolo', '59185', NULL),
(59, 'JEKULO', 'Honggosoco', '59185', NULL),
(60, 'JEKULO', 'Jekulo', '59185', NULL),
(61, 'JEKULO', 'Klaling', '59185', NULL),
(62, 'JEKULO', 'Pladen', '59185', NULL),
(63, 'JEKULO', 'Sadang', '59185', NULL),
(64, 'JEKULO', 'Sidomulyo', '59185', NULL),
(65, 'JEKULO', 'Tanjungrejo', '59185', NULL),
(66, 'JEKULO', 'Terban', '59185', NULL),
(67, 'KALIWUNGU', 'Bakalankrapyak', '59158', NULL),
(68, 'DUKUHSETI', 'Banget', '59158', NULL),
(69, 'DUKUHSETI', 'Blimbing Kidul', '59158', NULL),
(70, 'DUKUHSETI', 'Gamong', '59158', NULL),
(71, 'DUKUHSETI', 'Garung Kidul', '59158', NULL),
(72, 'DUKUHSETI', 'Garung Lor', '59158', NULL),
(73, 'DUKUHSETI', 'Kaliwungu', '59158', NULL),
(74, 'DUKUHSETI', 'Karangampel', '59158', NULL),
(75, 'DUKUHSETI', 'Kedungdowo', '59158', NULL),
(76, 'DUKUHSETI', 'Mijen', '59158', NULL),
(77, 'DUKUHSETI', 'Papringan', '59158', NULL),
(78, 'DUKUHSETI', 'Prambatan Kidul', '59158', NULL),
(79, 'DUKUHSETI', 'Prambatan Lor', '59158', NULL),
(80, 'DUKUHSETI', 'Setrokalangan', '59158', NULL),
(81, 'DUKUHSETI', 'Sidorekso', '59158', NULL),
(82, 'KOTA', 'Barongan', '59159', NULL),
(83, 'KOTA', 'Burikan', '59159', NULL),
(84, 'KOTA', 'Damaran', '59159', NULL),
(85, 'KOTA', 'Demaan', '59159', NULL),
(86, 'KOTA', 'Demangan', '59159', NULL),
(87, 'KOTA', 'Glantengan', '59159', NULL),
(88, 'KOTA', 'Janggalan', '59159', NULL),
(89, 'KOTA', 'Kaliputu', '59159', NULL),
(90, 'KOTA', 'Kauman', '59159', NULL),
(91, 'KOTA', 'Krandon', '59159', NULL),
(92, 'KOTA', 'Langgardalem', '59159', NULL),
(93, 'KOTA', 'Mlati Lor', '59159', NULL),
(94, 'KOTA', 'Nganguk', '59159', NULL),
(95, 'KOTA', 'Rendeng', '59159', NULL),
(96, 'KOTA', 'Singocandi', '59159', NULL),
(97, 'KOTA', 'Kramat', '59159', NULL),
(98, 'KOTA', 'Mlati Kidul', '59159', NULL),
(99, 'KOTA', 'Mlati Norowito', '59159', NULL),
(100, 'KOTA', 'Panjunan', '59159', NULL),
(101, 'KOTA', 'Purwosari', '59159', NULL),
(102, 'KOTA', 'Sunggingan', '59159', NULL),
(103, 'KOTA', 'Wergu Kulon', '59159', NULL),
(104, 'KOTA', 'Wergu Wetan', '59159', NULL),
(105, 'MEJOBO', 'Golantepus', '8080', NULL),
(106, 'MEJOBO', 'Gulang', '8080', NULL),
(107, 'MEJOBO', 'Hadiwarno', '8080', NULL),
(108, 'MEJOBO', 'Jepang', '8080', NULL),
(109, 'MEJOBO', 'Jojo', '8080', NULL),
(110, 'MEJOBO', 'Kesambi', '8080', NULL),
(111, 'MEJOBO', 'Kirig', '8080', NULL),
(112, 'MEJOBO', 'Mejobo', '8080', NULL),
(113, 'MEJOBO', 'Payaman', '8080', NULL),
(114, 'MEJOBO', 'Temulus', '8080', NULL),
(115, 'MEJOBO', 'Tenggeles', '8080', NULL),
(116, 'UNDAAN', 'Glagahwaru', '87868', NULL),
(117, 'UNDAAN', 'Kalirejo', '87868', NULL),
(118, 'UNDAAN', 'Karangrowo', '87868', NULL),
(119, 'UNDAAN', 'Kutuk', '87868', NULL),
(120, 'UNDAAN', 'Lambangan', '87868', NULL),
(121, 'UNDAAN', 'Larikrejo', '87868', NULL),
(122, 'UNDAAN', 'Medini', '87868', NULL),
(123, 'UNDAAN', 'Ngemplak', '87868', NULL),
(124, 'UNDAAN', 'Sambung', '87868', NULL),
(125, 'UNDAAN', 'Terangmas', '87868', NULL),
(126, 'UNDAAN', 'Undaan Kidul', '87868', NULL),
(127, 'UNDAAN', 'Undaan Lor', '87868', NULL),
(128, 'UNDAAN', 'Undaan Tengah', '87868', NULL),
(129, 'UNDAAN', 'Wates', '87868', NULL),
(130, 'UNDAAN', 'Wonosoco', '87868', NULL),
(131, 'UNDAAN', 'Berugenjang', '87868', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `bantuan_distribusi`
--
ALTER TABLE `bantuan_distribusi`
  ADD PRIMARY KEY (`id_bantuan_distribusi`);

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bencana`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id_pelaporan`);

--
-- Indexes for table `peninjauan`
--
ALTER TABLE `peninjauan`
  ADD PRIMARY KEY (`id_peninjauan`);

--
-- Indexes for table `stok_bantuan`
--
ALTER TABLE `stok_bantuan`
  ADD PRIMARY KEY (`id_stok_bantuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `bantuan_distribusi`
--
ALTER TABLE `bantuan_distribusi`
  MODIFY `id_bantuan_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peninjauan`
--
ALTER TABLE `peninjauan`
  MODIFY `id_peninjauan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_bantuan`
--
ALTER TABLE `stok_bantuan`
  MODIFY `id_stok_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
