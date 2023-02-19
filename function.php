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


$koneksi = mysqli_connect("localhost","root","","pengaduan-bpbdv2");
 
// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

//function query banyak
function Querybanyak($query){
    $mysqli = new mysqli("localhost","root","","pengaduan-bpbdv2");
    // menggunakan foreach
    return $mysqli->query($query);
}

//function query satu data
function Querysatudata($query){
    $koneksi = mysqli_connect("localhost","root","","pengaduan-bpbdv2");
    $query_cek = mysqli_query($koneksi, $query);
    return mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

function NumRows($query){
    $koneksi = mysqli_connect("localhost","root","","pengaduan-bpbdv2");
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

function dd($data){
    print("<pre>".print_r($data,true)."</pre>");
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

/*
CREATE TABLE `history` (
 `id_history` int(11) NOT NULL AUTO_INCREMENT,
 `action` varchar(20) DEFAULT NULL,
 `tanggal_history` date DEFAULT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 `tabel` varchar(30) DEFAULT NULL,
 `id_tabel` int(11) DEFAULT NULL,
 `status_history` varchar(20) DEFAULT NULL,
 `keterangan` text DEFAULT NULL,
 `id_user` int(11) DEFAULT NULL,
 PRIMARY KEY (`id_history`)
)


$key = ["korban_lansia", "korban_balita", "korban_dewasa"];
$value = [1, 2, 3];

$arr_ket = [];
for($ik = 0; $ik < count($key); $ik++){
	$arr_string = $key[$ik] ."=>".$value[$ik];
	array_push($arr_ket, $arr_string);
}

print_r($arr_ket);

$imp_ket = implode(";", $arr_ket);

echo $imp_ket;

$exp_arr = explode(";", $imp_ket);

 print_r($exp_arr);
 
 $arr_key = [];
 $arr_val = [];
 for($ie = 0; $ie < count($exp_arr); $ie++){
 	$exp_ie = explode("=>", $exp_arr[$ie]);
 	
 	array_push($arr_key, $exp_ie[0]);
 	array_push($arr_val, $exp_ie[1]);
 }

print_r($arr_key);
print_r($arr_val);

*/
function SendWA($nomer_tujuan, $pesan){
    $dataSending = Array();
    $dataSending["api_key"] = "xxxx";
    $dataSending["number_key"] = "xxxx";
    $dataSending["phone_no"] = $nomer_tujuan;
    $dataSending["message"] = $pesan;
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($dataSending),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
        /*
        // Iniasiasi WA
        $pesan = "";
        
        if($_SESSION['level'] == 'pelapor'){
            // Menampilkan data pelapor
            $pelapor = Querysatudara("SELECT * FROM pelapor WHERE id_user = ".$_SESSION['id_user']."");

            // definisikan nomer pelapor
            $nomer_pelapor = $pelapor['nomer_pelapor'];

            // Fungsion kirim WA
            SendWA($nomer_pelapor, $pesan);
        }
        
        $petugas_bpbd = Querysatudara("SELECT * FROM petugas_bpbd ORDER BY id_petugas_bpbd DESC ");
        $nomer_petugas_bpbd = $petugas_bpbd['nomer'];
        SendWA($nomer_petugas_bpbd, $pesan);

        $petugas_kajian = Querysatudara("SELECT * FROM petugas_kajian ORDER BY id_petugas_kajian DESC ");
        $nomer_petugas_kajian = $petugas_kajian['nomer'];
        SendWA($nomer_petugas_kajian, $pesan);

        $petugas_logistik = Querysatudara("SELECT * FROM petugas_logistik ORDER BY id_petugas_logistik DESC ");
        $nomer_petugas_logistik = $petugas_logistik['nomer'];
        SendWA($nomer_petugas_logistik, $pesan);

        $kepala_bpbd = Querysatudara("SELECT * FROM kepala_bpbd ORDER BY id_kepala_bpbd DESC ");
        $nomer_kepala_bpbd = $kepala_bpbd['nomer'];
        SendWA($nomer_kepala_bpbd, $pesan);

        */


        /*


        */



