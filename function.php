<?php 
session_start();


date_default_timezone_set('Asia/Jakarta');

function Page($page){

    include "template/partials/_header.php";
    include "template/partials/_navbar.php";
    include "template/partials/_sidebar.php";

    include $page;
    include "template/partials/_footer.php";
}

$koneksi = mysqli_connect("localhost","root","","pengaduan-bpbd");
 
// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

//function query banyak
function Querybanyak($query){
    $mysqli = new mysqli("localhost","root","","pengaduan-bpbd");
    // menggunakan foreach
    return $mysqli->query($query);
}

//function query satu data
function Querysatudata($query){
    $koneksi = mysqli_connect("localhost","root","","pengaduan-bpbd");
    $query_cek = mysqli_query($koneksi, $query);
    return mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

function NumRows($query){
    $koneksi = mysqli_connect("localhost","root","","pengaduan-bpbd");
    $cari = mysqli_query($koneksi, $query);
    return mysqli_num_rows($cari);
}

function Redirect($link, $notif) {
    echo $output = "<script>alert('".$notif."')</script><meta http-equiv='refresh' content='0; url=".$link. "'>";
    return $output;
}