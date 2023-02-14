-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 12:23 AM
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
-- Database: `pengaduan-bpbdv2`
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
(1, 'Karung Plastik', 'MATERIAL', 'Lembar\n', 200),
(2, 'Triplek', 'MATERIAL', 'Lembar\n', 200),
(3, 'Seng', 'MATERIAL', 'Lembar', 200),
(4, 'Paku Payung', 'MATERIAL', 'Ons', 200),
(5, 'Paku Usuk', 'MATERIAL', 'Ons', 200),
(6, 'Paku Reng', 'MATERIAL', 'Ons', 200),
(7, 'Tanah Urug', 'MATERIAL', 'm³', 200),
(8, 'Kawat Bronjong', 'MATERIAL', 'Biji', 200),
(9, 'Batu Belah', 'MATERIAL', 'm³', 200),
(10, 'Seng Bergelombang', 'MATERIAL', 'Lembar', 200),
(11, 'Plastik Mika Penutup Longsor', 'MATERIAL', 'Roll', 200),
(12, 'Genteng', 'MATERIAL', 'Buah', 200),
(13, 'Kerpus', 'MATERIAL', 'Buah', 200),
(14, 'Semen', 'MATERIAL', 'Sak', 200),
(15, 'Batu Bata', 'MATERIAL', 'Buah', 200),
(16, 'Pasir', 'MATERIAL', 'm³', 200),
(17, 'Selimut', 'SANDANG', 'Lembar', 200),
(18, 'Selimut Lurik', 'SANDANG', 'Lembar', 200),
(19, 'Jarik', 'SANDANG', 'Lembar', 200),
(20, 'Sarung', 'SANDANG', 'Lembar', 199),
(21, 'Kelambu', 'SANDANG', 'Lembar', 200),
(22, 'Baju anak', 'SANDANG', 'Pcs', 200),
(23, 'Kaos dalam laki - laki ', 'SANDANG', 'Pcs', 200),
(24, 'Celana dalam wanita', 'SANDANG', 'Pcs', 200),
(25, 'Daster', 'SANDANG', 'Pcs', 200),
(26, 'Kaos untuk relawan', 'SANDANG', 'Buah', 200),
(27, 'Seragam Relawan', 'SANDANG', 'Buah', 200),
(28, 'Paket Sandang', 'SANDANG', 'Paket', 200),
(29, 'Kid Ware', 'SANDANG', 'Paket', 200),
(30, 'Kids Ware', 'SANDANG', 'Paket', 200),
(31, 'Family Kit', 'SANDANG', 'Paket', 200),
(32, 'Peralatan Dapur / Food ware', 'SANDANG', 'Paket', 200),
(33, 'Peralatan Kesehatan Rumah Tangga', 'SANDANG', 'Paket', 200),
(34, 'Peralatan Kesehatan/Kebersihan', 'SANDANG', 'Paket', 200),
(35, 'Perlengkapan Sekolah', 'SANDANG', 'Paket', 200),
(36, 'Perlengkapan Makan', 'SANDANG', 'Paket', 199),
(37, 'Kantong Mayat', 'SANDANG', 'Buah', 200),
(38, 'Kantong Jenazah', 'SANDANG', 'Buah', 200),
(39, 'Paket Rekreasional', 'SANDANG', 'Paket', 200),
(40, 'Medical kit', 'SANDANG', 'Paket', 200),
(41, 'Matras ', 'SANDANG', 'Lembar', 200),
(42, 'Tikar ', 'SANDANG', 'Lembar', 200),
(43, 'Tenda Gulung', 'SANDANG', 'Lembar', 200),
(44, 'Paket Seragam PA', 'SANDANG', 'Buah', 200),
(45, 'Paket Seragam PI', 'SANDANG', 'Buah', 200),
(46, 'Tas Sekolah', 'SANDANG', 'Pcs', 200),
(47, 'Pakaian Seragam SD PA', 'SANDANG', 'Buah', 200),
(48, 'Pakaian Seragam SD PI', 'SANDANG', 'Buah', 200),
(49, 'Handuk', 'SANDANG', 'Buah', 200),
(50, 'Wajan ', 'SANDANG', 'Buah', 200),
(51, 'Panci ', 'SANDANG', 'Buah', 200),
(52, 'Brosur Kebencanaan', 'SANDANG', 'Lembar', 200),
(53, 'Sepatu Boot', 'SANDANG', 'Buah', 200),
(54, 'Jas Hujan', 'SANDANG', 'Buah', 200),
(55, 'Webbing', 'SANDANG', 'Roll', 200),
(56, 'Buku Cerita', 'SANDANG', 'Buah', 200),
(57, 'Buku Saku Kebencanaan', 'SANDANG', 'Buah', 200),
(58, 'Tas Tahan Air', 'SANDANG', 'Buah', 200),
(59, 'Tas Penyimpan Dokumen Penting', 'SANDANG', 'Buah', 200),
(60, 'Pembalut Charm', 'SANDANG', 'Pack', 200),
(61, 'Pembalut Laurier', 'SANDANG', 'Pack', 200),
(62, 'Pembalut', 'SANDANG', 'Pack', 200),
(63, 'Pempers', 'SANDANG', 'Buah', 200),
(64, 'Pampers M', 'SANDANG', 'Buah', 200),
(65, 'Pempers L', 'SANDANG', 'Buah', 200),
(66, 'Pampers S', 'SANDANG', 'Buah', 200),
(67, 'Pampers', 'SANDANG', 'Buah', 200),
(68, 'Linggis', 'SANDANG', 'Buah', 200),
(69, 'Cangkul', 'SANDANG', 'Buah', 200),
(70, 'Skop', 'SANDANG', 'Buah', 200),
(71, 'Garpu', 'SANDANG', 'Buah', 200),
(72, 'Parang', 'SANDANG', 'Buah', 200),
(73, 'Helmet Font Brim Ventedorange', 'SANDANG', 'Buah', 200),
(74, 'Helmet Front Brim Orange', 'SANDANG', 'Buah', 200),
(75, 'Sarung Tangan Latex Yellow', 'SANDANG', 'Buah', 200),
(76, 'Sarung Tangan Glove Blue Leather', 'SANDANG', 'Buah', 200),
(77, 'Sarung Tangan Kain', 'SANDANG', 'dos', 200),
(78, 'Masker', 'SANDANG', 'dos', 200),
(79, 'Troly', 'SANDANG', 'Buah', 200),
(80, 'Hygiene Kit', 'SANDANG', 'Paket', 200),
(81, 'Sarung ', 'SANDANG', 'Buah', 200),
(82, 'Tikar', 'SANDANG', 'Pcs', 200),
(83, 'Air Mineral', 'MAKANAN DAN MINUMAN', 'Dus', 200),
(84, 'Air Mineral Botol', 'MAKANAN DAN MINUMAN', 'Dus', 200),
(85, 'Air Mineral Gelas', 'MAKANAN DAN MINUMAN', 'Dus', 200),
(86, 'Beras', 'MAKANAN DAN MINUMAN', 'Kg', 200),
(87, 'Gula Pasir', 'MAKANAN DAN MINUMAN', 'Kg', 200),
(88, 'Lauk Pauk', 'MAKANAN DAN MINUMAN', 'Paket', 200),
(89, 'Minyak Goreng', 'MAKANAN DAN MINUMAN', 'Liter', 200),
(90, 'Mie Instan', 'MAKANAN DAN MINUMAN', 'Dus', 200),
(91, 'Bubur Sun @24', 'MAKANAN DAN MINUMAN', 'Buah', 200),
(92, 'Bubur Sun @24 (Makanan Balita)', 'MAKANAN DAN MINUMAN', 'Buah', 200),
(93, 'Makanan Balita', 'MAKANAN DAN MINUMAN', 'Buah', 200),
(94, 'Susu Anak/Balita', 'MAKANAN DAN MINUMAN', 'Buah', 200),
(95, 'Susu Kaleng', 'MAKANAN DAN MINUMAN', 'Kaleng', 200),
(96, 'Kecap', 'MAKANAN DAN MINUMAN', 'Botol', 200),
(97, 'Tambahan Gizi', 'MAKANAN DAN MINUMAN', 'Paket', 200),
(98, 'Saos', 'MAKANAN DAN MINUMAN', 'Botol', 200),
(99, 'Teh Serbuk', 'MAKANAN DAN MINUMAN', 'Buah', 200),
(100, 'Teh Celup', 'MAKANAN DAN MINUMAN', 'Dus', 200),
(101, 'Kopi Susu', 'MAKANAN DAN MINUMAN', 'Sachet', 200),
(102, 'Kopi Instan', 'MAKANAN DAN MINUMAN', 'Sachet', 200),
(103, 'Sarden', 'MAKANAN DAN MINUMAN', 'Kaleng', 200),
(104, 'Siap Saji', 'MAKANAN DAN MINUMAN', 'Paket', 200),
(105, 'Yogurt', 'MAKANAN DAN MINUMAN', 'Buah', 200),
(106, 'Daging Kaleng', 'MAKANAN DAN MINUMAN', 'Buah', 200);

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
(1, 1, 84, 20, 20, 20),
(2, 1, 88, 10, 10, 10),
(13, 3, 90, 90, 2, 2),
(14, 3, 103, 100, 3, 3),
(15, 3, 83, 80, 4, 4),
(18, 3, 88, 4, 4, 4),
(19, 1, 20, 1, 1, 1),
(20, 1, 36, 1, 1, 1);

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
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN') DEFAULT NULL,
  `id_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `tanggal_daftar`, `nama_lengkap`, `alamat`, `no_telp`, `jenis_kelamin`, `id_wilayah`) VALUES
(1, '2023-02-08', 'Ayuk Diyah Setyowati', 'rt 1 rw 2 margerejo dawe kudus', '89988876754', 'PEREMPUAN', 22);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id_distribusi` int(11) NOT NULL,
  `id_peninjauan` int(11) DEFAULT NULL,
  `tanggal_distribusi` date NOT NULL,
  `keterangan_distribusi` text NOT NULL,
  `status_distribusi` varchar(30) DEFAULT NULL,
  `bukti_distribusi` text DEFAULT NULL,
  `id_petugas_logistik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `id_peninjauan`, `tanggal_distribusi`, `keterangan_distribusi`, `status_distribusi`, `bukti_distribusi`, `id_petugas_logistik`) VALUES
(1, 1, '2023-02-08', 'Bantuan berupa makanan akan di kirim sekarang ', 'Selesai', '1675872986distribusibantuan1.jpg', 1),
(3, 1, '2023-02-12', 'Korban butuh bantuan', NULL, NULL, NULL),
(4, 1, '2023-02-14', 'makanan dan sandang ', 'Sedang di proses', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kepala_bpbd`
--

CREATE TABLE `kepala_bpbd` (
  `id_kepala_bpbd` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_bpbd`
--

INSERT INTO `kepala_bpbd` (`id_kepala_bpbd`, `id_user`, `nama`, `alamat`, `no_telp`) VALUES
(1, 2, 'Bambang SH', 'Bae Kudus', '89098767543');

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `id_pelapor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  `nama_pelapor` varchar(100) DEFAULT NULL,
  `alamat_pelapor` text DEFAULT NULL,
  `no_telp_pelapor` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`id_pelapor`, `id_user`, `id_daftar`, `nama_pelapor`, `alamat_pelapor`, `no_telp_pelapor`) VALUES
(1, 5, 1, 'Ayuk Diyah Setyowati', 'rt 1 rw 2 margerejo dawe kudus', '89988876754');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id_pelaporan` int(11) NOT NULL,
  `id_pelapor` int(11) DEFAULT NULL,
  `id_petugas_bpbd` int(11) DEFAULT NULL,
  `id_bencana` int(11) DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `tanggal_pelaporan` date DEFAULT NULL,
  `pelaporan` text DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `gambar_bencana` text DEFAULT NULL,
  `gambar_lokasi_bencana` text DEFAULT NULL,
  `gambar_pelapor` text DEFAULT NULL,
  `status_pelaporan` varchar(30) NOT NULL,
  `review_pelaporan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`id_pelaporan`, `id_pelapor`, `id_petugas_bpbd`, `id_bencana`, `id_wilayah`, `tanggal_pelaporan`, `pelaporan`, `link_maps`, `gambar_bencana`, `gambar_lokasi_bencana`, `gambar_pelapor`, `status_pelaporan`, `review_pelaporan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, 22, '2023-02-08', 'Terjadi kebakaran pada saat ini di margorejo dawe rt 1 rw 2 kecamatan dawe sekarang kebakaran membakar 2 rumah warga', '', '1675872205kebakaran.jpg', '1675872205lokasi kebakaran.jpg', '1675872205selfi kebakaran.jpg', 'tervalidasi', 'Pelaporan tervalidasi sekarang akan saya kirimkan tim pemadam kebakaran dan beserta petugas yang berkompeten terhadap bencana', '2023-02-14 21:13:35', '2023-02-14 21:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `peninjauan`
--

CREATE TABLE `peninjauan` (
  `id_peninjauan` int(11) NOT NULL,
  `id_pelaporan` int(11) DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `id_bencana` int(11) DEFAULT NULL,
  `id_petugas_kajian` int(11) DEFAULT NULL,
  `kategori_bencana` varchar(20) DEFAULT NULL,
  `level_bencana` int(11) DEFAULT NULL,
  `tanggal_peninjauan` date DEFAULT NULL,
  `jumlah_korban` int(11) DEFAULT NULL,
  `keterangan_peninjauan` text DEFAULT NULL,
  `status_peninjauan` varchar(30) DEFAULT NULL,
  `bukti_peninjauan` text DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `rt` char(3) DEFAULT NULL,
  `rw` char(3) DEFAULT NULL,
  `jumlah_kk` int(11) DEFAULT NULL,
  `jumlah_rumah` int(11) DEFAULT NULL,
  `sebab` text DEFAULT NULL,
  `akibat` text DEFAULT NULL,
  `upaya_penanganan` text DEFAULT NULL,
  `lain_lain` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peninjauan`
--

INSERT INTO `peninjauan` (`id_peninjauan`, `id_pelaporan`, `id_wilayah`, `id_bencana`, `id_petugas_kajian`, `kategori_bencana`, `level_bencana`, `tanggal_peninjauan`, `jumlah_korban`, `keterangan_peninjauan`, `status_peninjauan`, `bukti_peninjauan`, `dusun`, `rt`, `rw`, `jumlah_kk`, `jumlah_rumah`, `sebab`, `akibat`, `upaya_penanganan`, `lain_lain`) VALUES
(1, 1, 22, 7, 1, 'Bencana Non Alam', 2, '2023-02-08', 10, 'Peninjauan sedang berlangsung terhadap bencana yang terjadi pada lokasi', 'selesai', '1675872654fotokebakaran.jpg', 'margorejo', '1', '1', 2, 2, 'penyebab kebakaran adalah terjadinya konsleting lisrik ', 'terjadinya kebakaran yang membakar 2 rumah warga', '- Telah di padamkan oleh pemadam kebakaran\r\n- Para warga membantu jalannya evakuasi', '- Petugas BPBD\r\n- Pemadam kebakaran');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_bpbd`
--

CREATE TABLE `petugas_bpbd` (
  `id_petugas_bpbd` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas_bpbd`
--

INSERT INTO `petugas_bpbd` (`id_petugas_bpbd`, `id_user`, `nama`, `alamat`, `no_telp`) VALUES
(1, 1, 'Rahajeng Wulansari', 'Kota Kudus', '89765456765');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_kajian`
--

CREATE TABLE `petugas_kajian` (
  `id_petugas_kajian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas_kajian`
--

INSERT INTO `petugas_kajian` (`id_petugas_kajian`, `id_user`, `nama`, `alamat`, `no_telp`) VALUES
(1, 3, 'Yusuf Nur Hidayat', 'Jekulo Kudus', '89767543342');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_logistik`
--

CREATE TABLE `petugas_logistik` (
  `id_petugas_logistik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas_logistik`
--

INSERT INTO `petugas_logistik` (`id_petugas_logistik`, `id_user`, `nama`, `alamat`, `no_telp`) VALUES
(1, 4, 'Yudha Prasetyo', 'Mejobo Kudus', '89878865465');

-- --------------------------------------------------------

--
-- Table structure for table `posko`
--

CREATE TABLE `posko` (
  `id_posko` int(11) NOT NULL,
  `id_peninjauan` int(11) DEFAULT NULL,
  `nama_posko` varchar(100) DEFAULT NULL,
  `jumlah_jiwa` int(11) DEFAULT NULL,
  `balita` int(11) DEFAULT NULL,
  `remaja` int(11) DEFAULT NULL,
  `dewasa` int(11) DEFAULT NULL,
  `lanjut_usia` int(11) DEFAULT NULL,
  `status_posko` varchar(50) DEFAULT NULL,
  `tanggal_posko` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar_posko` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posko`
--

INSERT INTO `posko` (`id_posko`, `id_peninjauan`, `nama_posko`, `jumlah_jiwa`, `balita`, `remaja`, `dewasa`, `lanjut_usia`, `status_posko`, `tanggal_posko`, `tanggal_selesai`, `keterangan`, `gambar_posko`, `created_at`, `updated_at`) VALUES
(2, 1, 'Posko Bupati1', 50, 0, 0, 0, 0, 'Keadaan Darurat Bencana', '2023-02-11', '0000-00-00', 'Posko Bupati', '1676168917distribusibantuan1.jpg', '2023-02-12 01:39:28', '2023-02-12 02:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id_publikasi` int(11) NOT NULL,
  `id_distribusi` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `kutipan` varchar(255) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `tanggal_publikasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id_publikasi`, `id_distribusi`, `judul`, `kutipan`, `kategori`, `isi`, `gambar`, `created_at`, `updated_at`, `tanggal_publikasi`) VALUES
(1, 1, 'Distribusi bantuan kepada wargayang terkena kebakaran di desa margorejo dawe kudus ', 'Distribusi bantuan kepada wargayang terkena kebakaran di desa margorejo dawe kudus', 'Distribusi', 'Desa Margorejo Dawe Kudus mengalami kebakaran pada tanggal 8 Februari 2023. Kebakaran yang terjadi pada sebuah rumah warga membuat panik warga setempat. Kebakaran cepat dikendalikan oleh tim pemadam kebakaran setempat dan tidak ada korban jiwa. Penyebab kebakaran masih sedang dalam penyelidikan. Warga meminta pemerintah untuk lebih memperhatikan masalah keamanan dan pencegahan kebakaran di desanya.', '1675873377distribusi_bantuan_1_1.jpg', '2023-02-08 16:22:57', '2023-02-08 17:06:04', '2023-02-08');

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
(1, 1, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(2, 2, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(3, 3, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(4, 4, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(5, 5, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(6, 6, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(7, 7, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(8, 8, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(9, 9, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(10, 10, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(11, 11, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(12, 12, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(13, 13, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(14, 14, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(15, 15, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(16, 16, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(17, 17, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(18, 18, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(19, 19, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(20, 20, '2023-01-09', '2025-01-09', 200, 199, '2023-01-09', NULL),
(21, 21, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(22, 22, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(23, 23, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(24, 24, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(25, 25, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(26, 26, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(27, 27, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(28, 28, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(29, 29, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(30, 30, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(31, 31, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(32, 32, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(33, 33, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(34, 34, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(35, 35, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(36, 36, '2023-01-09', '2025-01-09', 200, 199, '2023-01-09', NULL),
(37, 37, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(38, 38, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(39, 39, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(40, 40, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(41, 41, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(42, 42, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(43, 43, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(44, 44, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(45, 45, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(46, 46, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(47, 47, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(48, 48, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(49, 49, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(50, 50, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(51, 51, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(52, 52, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(53, 53, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(54, 54, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(55, 55, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(56, 56, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(57, 57, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(58, 58, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(59, 59, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(60, 60, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(61, 61, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(62, 62, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(63, 63, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(64, 64, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(65, 65, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(66, 66, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(67, 67, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(68, 68, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(69, 69, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(70, 70, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(71, 71, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(72, 72, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(73, 73, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(74, 74, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(75, 75, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(76, 76, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(77, 77, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(78, 78, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(79, 79, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(80, 80, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(81, 81, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(82, 82, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(83, 83, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(84, 84, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(85, 85, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(86, 86, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(87, 87, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(88, 88, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(89, 89, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(90, 90, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(91, 91, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(92, 92, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(93, 93, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(94, 94, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(95, 95, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(96, 96, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(97, 97, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(98, 98, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(99, 99, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(100, 100, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(101, 101, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(102, 102, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(103, 103, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(104, 104, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(105, 105, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL),
(106, 106, '2023-01-09', '2025-01-09', 200, 200, '2023-01-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'petugas_bpbd'),
(2, 'kepala', 'kepala', 'kepala_bpbd'),
(3, 'kajian', 'kajian', 'petugas_kajian'),
(4, 'logistik', 'logistik', 'petugas_logistik'),
(5, 'ayuk', 'ayuk', 'pelapor');

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
  ADD PRIMARY KEY (`id_bantuan_distribusi`),
  ADD KEY `id_distribusi` (`id_distribusi`),
  ADD KEY `id_stok_bantuan` (`id_stok_bantuan`);

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bencana`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_distribusi`),
  ADD KEY `id_petugas_logistik` (`id_petugas_logistik`),
  ADD KEY `id_peninjauan` (`id_peninjauan`);

--
-- Indexes for table `kepala_bpbd`
--
ALTER TABLE `kepala_bpbd`
  ADD PRIMARY KEY (`id_kepala_bpbd`);

--
-- Indexes for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id_pelapor`),
  ADD KEY `id_daftar` (`id_daftar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `id_wilayah` (`id_wilayah`),
  ADD KEY `id_bencana` (`id_bencana`),
  ADD KEY `id_pelapor` (`id_pelapor`),
  ADD KEY `id_petugas_bpbd` (`id_petugas_bpbd`);

--
-- Indexes for table `peninjauan`
--
ALTER TABLE `peninjauan`
  ADD PRIMARY KEY (`id_peninjauan`),
  ADD KEY `id_wilayah` (`id_wilayah`),
  ADD KEY `id_bencana` (`id_bencana`),
  ADD KEY `id_petugas_kajian` (`id_petugas_kajian`),
  ADD KEY `id_pelaporan` (`id_pelaporan`);

--
-- Indexes for table `petugas_bpbd`
--
ALTER TABLE `petugas_bpbd`
  ADD PRIMARY KEY (`id_petugas_bpbd`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `petugas_kajian`
--
ALTER TABLE `petugas_kajian`
  ADD PRIMARY KEY (`id_petugas_kajian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `petugas_logistik`
--
ALTER TABLE `petugas_logistik`
  ADD PRIMARY KEY (`id_petugas_logistik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `posko`
--
ALTER TABLE `posko`
  ADD PRIMARY KEY (`id_posko`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id_publikasi`),
  ADD KEY `id_distribusi` (`id_distribusi`);

--
-- Indexes for table `stok_bantuan`
--
ALTER TABLE `stok_bantuan`
  ADD PRIMARY KEY (`id_stok_bantuan`),
  ADD KEY `id_bantuan` (`id_bantuan`);

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
  MODIFY `id_bantuan_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kepala_bpbd`
--
ALTER TABLE `kepala_bpbd`
  MODIFY `id_kepala_bpbd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peninjauan`
--
ALTER TABLE `peninjauan`
  MODIFY `id_peninjauan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas_bpbd`
--
ALTER TABLE `petugas_bpbd`
  MODIFY `id_petugas_bpbd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas_kajian`
--
ALTER TABLE `petugas_kajian`
  MODIFY `id_petugas_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas_logistik`
--
ALTER TABLE `petugas_logistik`
  MODIFY `id_petugas_logistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posko`
--
ALTER TABLE `posko`
  MODIFY `id_posko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id_publikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_bantuan`
--
ALTER TABLE `stok_bantuan`
  MODIFY `id_stok_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bantuan_distribusi`
--
ALTER TABLE `bantuan_distribusi`
  ADD CONSTRAINT `bantuan_distribusi_ibfk_1` FOREIGN KEY (`id_distribusi`) REFERENCES `distribusi` (`id_distribusi`),
  ADD CONSTRAINT `bantuan_distribusi_ibfk_2` FOREIGN KEY (`id_stok_bantuan`) REFERENCES `stok_bantuan` (`id_stok_bantuan`);

--
-- Constraints for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `distribusi_ibfk_1` FOREIGN KEY (`id_petugas_logistik`) REFERENCES `petugas_logistik` (`id_petugas_logistik`),
  ADD CONSTRAINT `distribusi_ibfk_2` FOREIGN KEY (`id_peninjauan`) REFERENCES `peninjauan` (`id_peninjauan`);

--
-- Constraints for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD CONSTRAINT `pelapor_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `daftar` (`id_daftar`),
  ADD CONSTRAINT `pelapor_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD CONSTRAINT `pelaporan_ibfk_2` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`),
  ADD CONSTRAINT `pelaporan_ibfk_3` FOREIGN KEY (`id_bencana`) REFERENCES `bencana` (`id_bencana`),
  ADD CONSTRAINT `pelaporan_ibfk_4` FOREIGN KEY (`id_pelapor`) REFERENCES `pelapor` (`id_pelapor`),
  ADD CONSTRAINT `pelaporan_ibfk_5` FOREIGN KEY (`id_petugas_bpbd`) REFERENCES `petugas_bpbd` (`id_petugas_bpbd`);

--
-- Constraints for table `peninjauan`
--
ALTER TABLE `peninjauan`
  ADD CONSTRAINT `peninjauan_ibfk_2` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`),
  ADD CONSTRAINT `peninjauan_ibfk_3` FOREIGN KEY (`id_bencana`) REFERENCES `bencana` (`id_bencana`),
  ADD CONSTRAINT `peninjauan_ibfk_4` FOREIGN KEY (`id_petugas_kajian`) REFERENCES `petugas_kajian` (`id_petugas_kajian`),
  ADD CONSTRAINT `peninjauan_ibfk_5` FOREIGN KEY (`id_pelaporan`) REFERENCES `pelaporan` (`id_pelaporan`);

--
-- Constraints for table `petugas_bpbd`
--
ALTER TABLE `petugas_bpbd`
  ADD CONSTRAINT `petugas_bpbd_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `petugas_kajian`
--
ALTER TABLE `petugas_kajian`
  ADD CONSTRAINT `petugas_kajian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `petugas_logistik`
--
ALTER TABLE `petugas_logistik`
  ADD CONSTRAINT `petugas_logistik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD CONSTRAINT `publikasi_ibfk_1` FOREIGN KEY (`id_distribusi`) REFERENCES `distribusi` (`id_distribusi`);

--
-- Constraints for table `stok_bantuan`
--
ALTER TABLE `stok_bantuan`
  ADD CONSTRAINT `stok_bantuan_ibfk_1` FOREIGN KEY (`id_bantuan`) REFERENCES `bantuan` (`id_bantuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
