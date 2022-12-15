<?php 

$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqldrop = "DROP DATABASE pengaduan_bpbd";
if ($conn->query($sqldrop) === TRUE) {
    echo "Database DROP successfully";
  } else {
    echo "Error creating database: " . $conn->error;
}

// Create database
$sql = "CREATE DATABASE pengaduan_bpbd";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

/*
Table	Create table
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
user	CREATE TABLE `user` (
 `id_user` int(11) NOT NULL AUTO_INCREMENT,
 `nama_user` varchar(20) NOT NULL,
 `alamat_user` text NOT NULL,
 `no_telp_user` varchar(13) NOT NULL,
 `username` varchar(20) NOT NULL,
 `password` varchar(20) NOT NULL,
 `level` varchar(20) NOT NULL,
 PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4
wilayah	CREATE TABLE `wilayah` (
 `id_wilayah` int(11) NOT NULL AUTO_INCREMENT,
 `nama_wilayah` varchar(20) DEFAULT NULL,
 `status_wilayah` varchar(20) DEFAULT NULL,
 `ket_wilayah` varchar(20) DEFAULT NULL,
 PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4



*/