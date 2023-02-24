<?php

class Posko
{

    public function Model()
    {
        $model = new Model();
        return $model;
    }

    public function Post($request, $file)
    {

        $gambar_posko = "";
        if ($file['gambar_posko']['name'] !== "") {
            $gambar_posko = str_replace(" ", "", (strtotime("now") . $file['gambar_posko']['name']));
            $lokasi = $file['gambar_posko']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/posko/" . $gambar_posko);
        }

        $sql = "INSERT INTO `posko`( `id_peninjauan`, `nama_posko`, `jumlah_jiwa`, `balita`, `remaja`, `dewasa`, `lanjut_usia`, `status_posko`, `tanggal_posko`, `tanggal_selesai`, `keterangan`, `gambar_posko`, `created_at`, `updated_at`) 
                    VALUES 
                        ( 
                            " . $request['id_peninjauan'] . ", 
                            '" . $request['nama_posko'] . "',
                            " . $request['jumlah_jiwa'] . ",
                            " . $request['balita'] . ", 
                            " . $request['remaja'] . ", 
                            " . $request['dewasa'] . ", 
                            " . $request['lanjut_usia'] . ", 
                            '" . $request['status_posko'] . "', 
                            '" . $request['tanggal_posko'] . "', 
                            '" . $request['tanggal_selesai'] . "', 
                            '" . $request['keterangan'] . "', 
                            '" . $gambar_posko . "', 
                            '" . date("Y-m-d H:i:s") . "', 
                            '" . date("Y-m-d H:i:s") . "'
                        ) 
                    ";

        $this->Model()->Execute($sql);

        // Menampilkan data posko yang terakhir di tambahkan
        $tampil_posko = Querysatudata("SELECT * FROM posko ORDER BY id_posko DESC ");
        
        $imp_ket = "Nama Posko=>" . $request['nama_posko'] . ";Status posko=>" . $request['status_posko'] . ";jumlah jiwa=>" . $request['jumlah_jiwa'] . ";balita=>" . $request['balita'] . ";remaja=>" . $request['remaja'] . ";dewasa=>" . $request['dewasa'] . ";lanjut usia=>" . $request['lanjut_usia'] . "";

        //Query insert data history
        $insert_history = "INSERT INTO `history`
            ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
                VALUES
            ( 'update posko', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'posko', " . $tampil_posko['id_posko'] . ", '', '".$imp_ket."', " . $_SESSION['id_user'] . ") 
        ";
        // Exec data query
        $this->Model()->Execute($insert_history);


// POSKO

$peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = ".$request['id_peninjauan']."");

$pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = ".$peninjauan['id_pelaporan']."");
$pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_pelapor = ".$pelaporan['id_pelapor']."");
$wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$pelaporan['id_wilayah']."");
$bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$pelaporan['id_bencana']."");
$petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_petugas_kajian = ". $peninjauan['id_petugas_kajian']."");

$pesan = "
BPBD KABUPATEN KUDUS 
Menginformasikan adanya posko dari petugas kajian bencana sebagai berikut :
Peninjauan : ". $petugas_kajian['nama'] . "
Pelapor:". $pelapor['nama_pelapor'] . "
Bencana:". $bencana['nama_bencana'] . "
Wilayah:". $wilayah['desa'] . " / ". $wilayah['kecamatan'] . "
Kategori bencana : ". $peninjauan['kategori_bencana'] . "
Level bencana : ". $peninjauan['level_bencana'] . "
Nama Posko : ". $request['nama_posko'] . "

Jumlah jiwa : ". $request['jumlah_jiwa'] . "
balita : ". $request['balita'] . "
remaja : ". $request['remaja'] . "
dewasa : ". $request['dewasa'] . "
Lanjut usia : ". $request['lanjut_usia'] . "

Status posko : ". $request['status_posko'] . "
Tanggal posko : ". TanggalIndonesia($request['tanggal_posko']) . "
keterangan : ". $request['keterangan'] . "
di buat : ". TanggalIndonesiaTime($request['created_at']) . "

Untuk pihak yang berkaitan dengan penanganan bencan untuk dapat menjalankan kewajibannya sesuai dengan aturan yang berlaku
Terima kasih
";


$petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd ORDER BY id_petugas_bpbd  DESC ");
$petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian ORDER BY id_petugas_kajian  DESC ");
$kepala_bpbd = Querysatudata("SELECT * FROM kepala_bpbd ORDER BY id_kepala_bpbd  DESC ");
$petugas_logistik = Querysatudata("SELECT * FROM petugas_logistik ORDER BY id_petugas_logistik  DESC ");

$nomer_pelapor = $pelapor['no_telp_pelapor'];
SendWA($nomer_pelapor, $pesan);

$nomer_petugas_bpbd = $petugas_bpbd['no_telp'];
SendWA($nomer_petugas_bpbd, $pesan);

$nomer_petugas_kajian = $petugas_kajian['no_telp'];
SendWA($nomer_petugas_kajian, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($nomer_kepala_bpbd, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($nomer_kepala_bpbd, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($petugas_logistik, $pesan);




        Redirect("http://localhost/pengaduan-bpbd/?posko=posko", "Data Berhasil Di Tambah");
    }

    public function Update($request, $file)
    {

        // Menampilkan data posko
        $posko = Querysatudata("SELECT * FROM posko WHERE " . $request['id_posko'] . " ");

        // Mendefinisikan data posko
        $gambar_posko = $posko['gambar_posko'];
        if ($file['gambar_posko']['name'] !== "") {
            unlink("./gambar/posko/" . $gambar_posko);
            $gambar_posko = str_replace(" ", "", (strtotime("now") . $file['gambar_posko']['name']));
            $lokasi = $file['gambar_posko']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/posko/" . $gambar_posko);
        }

        // Query data update
        $sql = "UPDATE `posko` 
                SET 
                `id_peninjauan`= " . $request['id_peninjauan'] . ",
                `nama_posko`='" . $request['nama_posko'] . "',
                `jumlah_jiwa`=" . $request['jumlah_jiwa'] . ",
                `balita`=" . $request['balita'] . ",
                `remaja`=" . $request['remaja'] . ",
                `dewasa`=" . $request['dewasa'] . ",
                `lanjut_usia`=" . $request['lanjut_usia'] . ",
                `status_posko`='" . $request['status_posko'] . "',
                `tanggal_posko`='" . $request['tanggal_posko'] . "',
                `tanggal_selesai`='" . $request['tanggal_selesai'] . "',
                `keterangan`='" . $request['keterangan'] . "',
                `gambar_posko`='" . $gambar_posko . "',
                `updated_at`='" . date("Y-m-d H:i:s") . "'                 
                WHERE id_posko = " . $request['id_posko'] . " 
            ";

        $this->Model()->Execute($sql);


// POSKO

$peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = ".$request['id_peninjauan']."");

$pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = ".$peninjauan['id_pelaporan']."");
$pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_pelapor = ".$pelaporan['id_pelapor']."");
$wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$pelaporan['id_wilayah']."");
$bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$pelaporan['id_bencana']."");
$petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_petugas_kajian = ". $peninjauan['id_petugas_kajian']."");

$pesan = "
BPBD KABUPATEN KUDUS 
Menginformasikan adanya posko dari petugas kajian bencana sebagai berikut :
Peninjauan : ". $petugas_kajian['nama'] . "
Pelapor:". $pelapor['nama_pelapor'] . "
Bencana:". $bencana['nama_bencana'] . "
Wilayah:". $wilayah['desa'] . " / ". $wilayah['kecamatan'] . "
Kategori bencana : ". $peninjauan['kategori_bencana'] . "
Level bencana : ". $peninjauan['level_bencana'] . "
Nama Posko : ". $request['nama_posko'] . "

Jumlah jiwa : ". $request['jumlah_jiwa'] . "
balita : ". $request['balita'] . "
remaja : ". $request['remaja'] . "
dewasa : ". $request['dewasa'] . "
Lanjut usia : ". $request['lanjut_usia'] . "

Status posko : ". $request['status_posko'] . "
Tanggal posko : ". TanggalIndonesia($request['tanggal_posko']) . "
keterangan : ". $request['keterangan'] . "
di buat : ". TanggalIndonesiaTime($request['created_at']) . "
di update : ". TanggalIndonesiaTime($request['updated_at']) . "

Untuk pihak yang berkaitan dengan penanganan bencan untuk dapat menjalankan kewajibannya sesuai dengan aturan yang berlaku
Terima kasih
";


$petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd ORDER BY id_petugas_bpbd  DESC ");
$petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian ORDER BY id_petugas_kajian  DESC ");
$kepala_bpbd = Querysatudata("SELECT * FROM kepala_bpbd ORDER BY id_kepala_bpbd  DESC ");
$petugas_logistik = Querysatudata("SELECT * FROM petugas_logistik ORDER BY id_petugas_logistik  DESC ");

$nomer_pelapor = $pelapor['no_telp_pelapor'];
SendWA($nomer_pelapor, $pesan);

$nomer_petugas_bpbd = $petugas_bpbd['no_telp'];
SendWA($nomer_petugas_bpbd, $pesan);

$nomer_petugas_kajian = $petugas_kajian['no_telp'];
SendWA($nomer_petugas_kajian, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($nomer_kepala_bpbd, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($nomer_kepala_bpbd, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($petugas_logistik, $pesan);


*/


        Redirect("http://localhost/pengaduan-bpbd/?posko=posko", "Data Berhasil Di Ubah");
    }

    public function AjaxPostPosko($request)
    {

        $key = $request["arr_key"];
        $value = $request["arr_val"];

        $arr_ket = [];
        for ($ik = 0; $ik < count($key); $ik++) {
            $arr_string = $key[$ik] . "=>" . $value[$ik];
            array_push($arr_ket, $arr_string);
        }

        $imp_ket = implode(";", $arr_ket);
        
        //Query insert data history
        $insert_history = "INSERT INTO `history`
                ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
                VALUES
                ( 'update posko', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'posko', " . $request['id'] . ", '', '".$imp_ket."', " . $request['id_user'] . ") 
                ";
        // Exec data query
        $this->Model()->Execute($insert_history);

        echo json_encode($insert_history);
    }

    public function AjaxUpdateHistoryPosko($request){

        $key = $request["arr_key"];
        $value = $request["arr_val"];

        $arr_ket = [];
        for ($ik = 0; $ik < count($key); $ik++) {
            $arr_string = $key[$ik] . "=>" . $value[$ik];
            array_push($arr_ket, $arr_string);
        }

        $imp_ket = implode(";", $arr_ket);

        //Query insert data history
        $update_history = "UPDATE `history` SET 
           `action`='".$request['action']."',
           `tanggal_history`='".$request['tanggal_history']."',
           `updated_at`='".$request['updated_at']."',
           `status_history`='".$request['status_history']."',
           `keterangan`='".$imp_ket."',
           `id_user`=".$request['id_user']."        
       WHERE `id_history`= ".$request['id']."";

       // Exec data query
       $this->Model()->Execute($update_history);

       echo json_encode($request);
    }

}
