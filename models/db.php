<?php
/*
bantuan	CREATE TABLE `bantuan` (
 `id_bantuan` int(11) NOT NULL AUTO_INCREMENT,
 `nama_bantuan` varchar(50) DEFAULT NULL,
 `kategori` varchar(20) DEFAULT NULL,
 `satuan` varchar(20) DEFAULT NULL,
 `batch` varchar(20) DEFAULT NULL,
 PRIMARY KEY (`id_bantuan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4
bencana	CREATE TABLE `bencana` (
 `id_bencana` int(11) NOT NULL AUTO_INCREMENT,
 `nama_bencana` varchar(20) DEFAULT NULL,
 `kategori_bencana` varchar(20) DEFAULT NULL,
 `level` varchar(20) DEFAULT NULL,
 `wilayah` varchar(30) DEFAULT NULL,
 PRIMARY KEY (`id_bencana`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4
distribusi	CREATE TABLE `distribusi` (
 `id_distribusi` int(11) NOT NULL AUTO_INCREMENT,
 `id_peninjauan` int(11) DEFAULT NULL,
 `tanggal_distribusi` int(11) DEFAULT NULL,
 `status_distribusi` varchar(20) DEFAULT NULL,
 PRIMARY KEY (`id_distribusi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
pelaporan	CREATE TABLE `pelaporan` (
 `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT,
 `id_user` int(11) DEFAULT NULL,
 `id_bencana` int(11) DEFAULT NULL,
 `tanggal_pelaporan` date DEFAULT NULL,
 `id_wilayah` int(11) DEFAULT NULL,
 `pelaporan` text DEFAULT NULL,
 `link_maps` text DEFAULT NULL,
 `status_pelaporan` varchar(20) DEFAULT NULL,
 PRIMARY KEY (`id_pelaporan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4
peninjauan	CREATE TABLE `peninjauan` (
 `id_peninjauan` int(11) NOT NULL AUTO_INCREMENT,
 `id_pelaporan` int(11) NOT NULL,
 `id_user` int(11) NOT NULL,
 `id_wilayah` int(11) NOT NULL,
 `id_bencana` int(11) DEFAULT NULL,
 `tanggal_peninjauan` date NOT NULL,
 `jumlah_korban` int(11) NOT NULL,
 `keterangan_peninjauan` text NOT NULL,
 `status_peninjauan` varchar(30) NOT NULL,
 `bukti_peninjauan` text NOT NULL,
 PRIMARY KEY (`id_peninjauan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4
stok_bantuan	CREATE TABLE `stok_bantuan` (
 `id_stok_bantuan` int(11) NOT NULL AUTO_INCREMENT,
 `id_bantuan` int(11) DEFAULT NULL,
 `batch` int(11) DEFAULT NULL,
 `tanggal_masuk` date DEFAULT NULL,
 `tanggal_kadaluarsa` date DEFAULT NULL,
 `stok` int(11) DEFAULT NULL,
 PRIMARY KEY (`id_stok_bantuan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4
user	CREATE TABLE `user` (
 `id_user` int(11) NOT NULL AUTO_INCREMENT,
 `nama_user` varchar(20) NOT NULL,
 `alamat_user` text NOT NULL,
 `no_telp_user` varchar(13) NOT NULL,
 `username` varchar(20) NOT NULL,
 `password` varchar(20) NOT NULL,
 `level` varchar(20) NOT NULL,
 PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4
wilayah	CREATE TABLE `wilayah` (
 `id_wilayah` int(11) NOT NULL AUTO_INCREMENT,
 `kecamatan` varchar(30) DEFAULT NULL,
 `desa` varchar(30) DEFAULT NULL,
 `no_telp` varchar(30) DEFAULT NULL,
 `status_wilayah` varchar(20) DEFAULT NULL,
 `penanggung_jawab` varchar(30) DEFAULT NULL,
 PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4

*/