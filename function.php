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
    $cek = mysqli_num_rows($cari);
    return $cek;
}

function Redirect($link, $notif) {
    echo $output = "<script>alert('".$notif."')</script><meta http-equiv='refresh' content='0; url=".$link. "'>";
    return $output;
}

function Dompdf(){
    require_once 'assets/dompdf/autoload.inc.php';
}

function BulanIndonesia($date_month_hire = string){
     //Bulan Indonesia
     if($date_month_hire == '01'){
        $month_indo_hire = 'Januari';
    }elseif($date_month_hire == '02'){
        $month_indo_hire = 'Februari';            
    }elseif($date_month_hire == '03'){
        $month_indo_hire = 'Maret';            
    }elseif($date_month_hire == '04'){
        $month_indo_hire = 'April';            
    }elseif($date_month_hire == '05'){
        $month_indo_hire = 'Mei';            
    }elseif($date_month_hire == '06'){
        $month_indo_hire = 'Juni';            
    }elseif($date_month_hire == '07'){
        $month_indo_hire = 'Juli';            
    }elseif($date_month_hire == '08'){
        $month_indo_hire = 'Agustus';            
    }elseif($date_month_hire == '09'){
        $month_indo_hire = 'September';            
    }elseif($date_month_hire == '10'){
        $month_indo_hire = 'Oktober';            
    }elseif($date_month_hire == '11'){
        $month_indo_hire = 'November';            
    }elseif($date_month_hire == '12'){
        $month_indo_hire = 'Desember';            
    }

    return  $month_indo_hire;
}

function TanggalIndonesia($tanggal = string){
    $date_hire = new \DateTime($tanggal .' 00:00:00');
    $date_year_hire = date_format($date_hire, "Y"); //for Display Year
    $date_month_hire =  date_format($date_hire, "m"); //for Display Month
    $date_day_hire = date_format($date_hire, "d"); //for Display Date

    $day_hire = gmdate("l", mktime(0,0,0, $date_day_hire,$date_month_hire,$date_year_hire));

    // Hari Indonesia
    if($day_hire == 'Monday'){
        $day_indo_hire = 'Senin';
    }elseif($day_hire == 'Tuesday'){
        $day_indo_hire = 'Selasa';            
    }elseif($day_hire == 'Wednesday'){
        $day_indo_hire = 'Rabu';            
    }elseif($day_hire == 'Thursday'){
        $day_indo_hire = 'Kamis';            
    }elseif($day_hire == 'Friday'){
        $day_indo_hire = 'Jumat';            
    }elseif($day_hire == 'Saturday'){
        $day_indo_hire = 'Sabtu';            
    }elseif($day_hire == 'Sunday'){
        $day_indo_hire = 'Minggu';            
    }

    //Bulan Indonesia
    if($date_month_hire == '01'){
        $month_indo_hire = 'Januari';
    }elseif($date_month_hire == '02'){
        $month_indo_hire = 'Februari';            
    }elseif($date_month_hire == '03'){
        $month_indo_hire = 'Maret';            
    }elseif($date_month_hire == '04'){
        $month_indo_hire = 'April';            
    }elseif($date_month_hire == '05'){
        $month_indo_hire = 'Mei';            
    }elseif($date_month_hire == '06'){
        $month_indo_hire = 'Juni';            
    }elseif($date_month_hire == '07'){
        $month_indo_hire = 'Juli';            
    }elseif($date_month_hire == '08'){
        $month_indo_hire = 'Agustus';            
    }elseif($date_month_hire == '09'){
        $month_indo_hire = 'September';            
    }elseif($date_month_hire == '10'){
        $month_indo_hire = 'Oktober';            
    }elseif($date_month_hire == '11'){
        $month_indo_hire = 'November';            
    }elseif($date_month_hire == '12'){
        $month_indo_hire = 'Desember';            
    }
    return  $date_day_hire. " ". $month_indo_hire . " ". $date_year_hire;
}