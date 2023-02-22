<?php

class Pelaporan
{

    public function Model()
    {
        $model = new Model();
        return $model;
    }

    public function Post($request, $file)
    {
        $gambar_bencana = null;
        if ($file['gambar_bencana']['name'] !== "") {
            $gambar_bencana = str_replace(" ", "", (strtotime("now") . $file['gambar_bencana']['name']));
            $lokasi = $file['gambar_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_bencana);
        }
        $gambar_lokasi_bencana = null;
        if ($file['gambar_lokasi_bencana']['name'] !== "") {
            $gambar_lokasi_bencana = str_replace(" ", "", (strtotime("now") . $file['gambar_lokasi_bencana']['name']));
            $lokasi = $file['gambar_lokasi_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_lokasi_bencana);
        }
        $gambar_pelapor = null;
        if ($file['gambar_pelapor']['name'] !== "") {
            $gambar_pelapor = str_replace(" ", "", (strtotime("now") . $file['gambar_pelapor']['name']));
            $lokasi = $file['gambar_pelapor']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_pelapor);
        }

        $sql = "INSERT INTO `pelaporan` 
            ( `id_pelapor`, `tanggal_pelaporan`, `id_bencana`, `id_wilayah`, `pelaporan`, `link_maps`, `status_pelaporan`, `gambar_bencana`, `gambar_lokasi_bencana`, `gambar_pelapor`, `created_at`,`updated_at`)
            VALUES 
            ( 
                " . $request['id_pelapor'] . ", 
                '" . $request['tanggal_pelaporan'] . "', 
                " . $request['id_bencana'] . ",
                " . $request['id_wilayah'] . ",
                '" . $request['pelaporan'] . "',
                '" . $request['link_maps'] . "',
                '" . $request['status_pelaporan'] . "',
                '" . $gambar_bencana . "',
                '" . $gambar_lokasi_bencana . "',
                '" . $gambar_pelapor . "',
                '" . date("Y-m-d H:i:s") . "',
                '" . date("Y-m-d H:i:s") . "'
            )";
        $this->Model()->Execute($sql);

        // Menampilkan data pelaporan yang terakhir di tambahkan
        $tampil_pelaporan = Querysatudata("SELECT * FROM pelaporan ORDER BY id_pelaporan DESC ");

        //Query insert data history
        $insert_history = "INSERT INTO `history`
        ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
        VALUES
        ( 'add', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'pelaporan', " . $tampil_pelaporan['id_pelaporan'] . ", '', 'menambahkan data pelaporan', " . $_SESSION['id_user'] . ") 
        ";

        // Exec data query
        $this->Model()->Execute($insert_history);

        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Pelaporan Berhasil Di Tambah");
    }

    public function Update($request, $file)
    {
        $pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = " . $request['id_pelaporan'] . "");
        $gambar_bencana = $pelaporan['gambar_bencana'];
        if ($file['gambar_bencana']['name'] !== "") {
            unlink("./gambar/pelaporan/" . $gambar_bencana);
            $gambar_bencana = str_replace(" ", "", (strtotime("now") . $file['gambar_bencana']['name']));
            $lokasi = $file['gambar_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_bencana);
        }
        $gambar_lokasi_bencana = $pelaporan['gambar_lokasi_bencana'];
        if ($file['gambar_lokasi_bencana']['name'] !== "") {
            unlink("./gambar/pelaporan/" . $gambar_lokasi_bencana);
            $gambar_lokasi_bencana = str_replace(" ", "", (strtotime("now") . $file['gambar_lokasi_bencana']['name']));
            $lokasi = $file['gambar_lokasi_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_lokasi_bencana);
        }
        $gambar_pelapor = $pelaporan['gambar_pelapor'];
        if ($file['gambar_pelapor']['name'] !== "") {
            unlink("./gambar/pelaporan/" . $gambar_pelapor);
            $gambar_pelapor = str_replace(" ", "", (strtotime("now") . $file['gambar_pelapor']['name']));
            $lokasi = $file['gambar_pelapor']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_pelapor);
        }

        // Query update data pelaporan
        $sql = "UPDATE  `pelaporan` 
                SET   id_pelapor =  " . $request['id_pelapor'] . ", 
                      tanggal_pelaporan =  '" . $request['tanggal_pelaporan'] . "', 
                      id_bencana = " . $request['id_bencana'] . ",
                      id_wilayah = " . $request['id_wilayah'] . ",
                      pelaporan =  '" . $request['pelaporan'] . "',
                      link_maps =  '" . $request['link_maps'] . "',
                      status_pelaporan = '" . $request['status_pelaporan'] . "',
                      gambar_bencana = '" . $gambar_bencana . "',
                      gambar_lokasi_bencana ='" . $gambar_lokasi_bencana . "',
                      gambar_pelapor = '" . $gambar_pelapor . "',
                      updated_at = '" . date("Y-m-d H:i:s") . "'
                    WHERE id_pelaporan = " . $request['id_pelaporan'] . "
            ";
        $this->Model()->Execute($sql);

        //Query insert data history
        $insert_history = "INSERT INTO `history`
        ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
        VALUES
        ( 'update', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'pelaporan', " . $request['id_pelaporan'] . ", '', 'mengubah data pelaporan', " . $_SESSION['id_user'] . ") 
        ";

        // Exec data query
        $this->Model()->Execute($insert_history);

        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Ubah");
    }

    public function Kirim($request)
    {
        // Query kirm data pelaporan dengan update status_pelaporan
        $sql = "UPDATE `pelaporan` 
                SET status_pelaporan =  'terkirim',
                updated_at = '" . date("Y-m-d H:i:s") . "'
                WHERE id_pelaporan = " . $request['id'] . "
            ";
        //Execute Query
        $this->Model()->Execute($sql);

        //Query insert data history
        $insert_history = "INSERT INTO `history`
                ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
                VALUES
                ( 'send', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'pelaporan', " . $request['id'] . ", '', 'kirim data pelaporan ke petugas bpbd', " . $_SESSION['id_user'] . ") 
                ";

        // Exec data query
        $this->Model()->Execute($insert_history);

        $pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = " . $request['id'] . " ");
        $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_pelapor = ".$pelaporan['id_pelapor']."");
        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$pelaporan['id_wilayah']."");
        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$pelaporan['id_bencana']."");

$pesan="
BPBD KABUPATEN KUDUS 
Menginformasikan adanya pelaporan dari masyarakat :\n

pelapor     : ". $pelapor['nama_pelapor'] . "\n
bencana     : ". $bencana['nama_bencana'] . "\n
wilayah     : ". $wilayah['desa'] . " /  ". $wilayah['kecamatan'] . "\n
tanggal_pelaporan : ". $pelaporan['tanggal_pelaporan'] . "\n
pelaporan   : ". $pelaporan['pelaporan'] . "\n
link_maps   : ". $pelaporan['link_maps'] . "\n
dibuat pada : ". $pelaporan['created_at'] . "\n

Untuk pihak yang berkaitan dengan penanganan bencana untuk dapat menjalankan kewajibannya sesuai dengan aturan yang berlaku\n
Terima kasih.
";

$petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd ORDER BY id_petugas_bpbd  DESC ");
$petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian ORDER BY id_petugas_kajian  DESC ");
$kepala_bpbd = Querysatudata("SELECT * FROM kepala_bpbd ORDER BY id_kepala_bpbd  DESC ");

$nomer_pelapor = $pelapor['no_telp_pelapor'];
SendWA($nomer_pelapor, $pesan);

$nomer_petugas_bpbd = $petugas_bpbd['no_telp'];
SendWA($nomer_petugas_bpbd, $pesan);

$nomer_petugas_kajian = $petugas_kajian['no_telp'];
SendWA($nomer_petugas_kajian, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($nomer_kepala_bpbd, $pesan);


        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Kirim");
    }
    public function Batal_kirim($request)
    {
        // Query batal_kirim pelaporan
        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  'batal kirim',
                updated_at = '" . date("Y-m-d H:i:s") . "'
                WHERE id_pelaporan = " . $request['id'] . "
            ";

        // Execute query
        $this->Model()->Execute($sql);

        //Query insert data history
        $insert_history = "INSERT INTO `history`
                ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
                VALUES
                ( 'cancel send', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'pelaporan', " . $request['id'] . ", '', 'batal kirim data pelaporan ke petugas bpbd', " . $_SESSION['id_user'] . ") 
                ";

        // Exec data query
        $this->Model()->Execute($insert_history);

        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Kirim");
    }
    public function Validasi($request)
    {
        $petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd WHERE id_user = " . $_SESSION['id_user'] . " ");

        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  'tervalidasi',
                id_petugas_bpbd =  " . $petugas_bpbd["id_petugas_bpbd"] . ",
                updated_at = '" . date("Y-m-d H:i:s") . "'
                WHERE id_pelaporan = " . $request['id'] . "
            ";

        //Query insert data history
        $insert_history = "INSERT INTO `history`
        ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
        VALUES
        ( 'validate', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'pelaporan', " . $request['id'] . ", '', 'validasi data pelaporan tervalidasi', " . $_SESSION['id_user'] . ") 
        ";

        // Exec data query
        $this->Model()->Execute($insert_history);

        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Validasi");
    }
    public function Tidak_Valid($request)
    {
        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  'tidak valid',
                updated_at = '" . date("Y-m-d H:i:s") . "'
                WHERE id_pelaporan = " . $request['id'] . "
            ";
        $this->Model()->Execute($sql);

        //Query insert data history
        $insert_history = "INSERT INTO `history`
                ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
                VALUES
                ( 'un-validate', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'pelaporan', " . $request['id'] . ", '', 'validasi data pelaporan tidak valid', " . $_SESSION['id_user'] . ") 
                ";

        // Exec data query
        $this->Model()->Execute($insert_history);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Tidak divalidasi");
    }

    public function CheckValidasi($request)
    {

        // Query Check validasi
        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  '" . $request["status_pelaporan"] . "',
                id_petugas_bpbd =  " . $request["id_petugas_bpbd"] . ",
                review_pelaporan =  '" . $request["review_pelaporan"] . "',
                updated_at = '" . date("Y-m-d H:i:s") . "'
                WHERE id_pelaporan = " . $request['id_pelaporan'] . "
            ";
        $this->Model()->Execute($sql);

        //Query insert data history
        $insert_history = "INSERT INTO `history`
        ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
        VALUES
        ( 'validate', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'pelaporan', " . $request['id_pelaporan'] . ", '', 'validasi data pelaporan " . $request["status_pelaporan"] . "', " . $_SESSION['id_user'] . ") 
        ";

        // Exec data query
        $this->Model()->Execute($insert_history);

        $pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = ".$request['id_pelaporan']."");
        $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_pelapor = ".$pelaporan['id_pelapor']."");
        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$pelaporan['id_wilayah']."");
        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$pelaporan['id_bencana']."");

$info = "";
if($request["status_pelaporan"] == "tervalidasi"){
    $info = "Untuk pelapor ".$pelapor['nama_pelapor']." harap tunggu, petugas bpbd akan mengirim tim peninjauan untuk dapat meninjau melihat kondisi dari bencana.";
}

$pesan="
BPBD KABUPATEN KUDUS 
Menginformasikan adanya pelaporan dari masyarakat :

Pelapor : ". $pelapor['nama_pelapor'] . "
Bencana : ". $bencana['nama_bencana'] . "
Wilayah : ". $wilayah['desa'] . " / ". $wilayah['kecamatan'] . "
Tanggal Pelaporan : ". $pelaporan['tanggal_pelaporan'] . "
Pelaporan : ". $pelaporan['pelaporan'] . "
Link maps : ". $pelaporan['link_maps'] . "            
dibuat : ". $pelaporan['created_at'] . "

Bahwa pelaporan yang di kirim dinyatakan status pelaporannya : *". $request['status_pelaporan'] . "*
Serta review dari pelaporan sebagai berkut : ". $request['review_pelaporan'] . " ".$info."

Untuk pihak yang berkaitan dengan penanganan bencana untuk dapat menjalankan kewajibannya sesuai dengan aturan yang berlaku
Terima kasih.
";

$petugas_bpbd = Querysatudata("SELECT * FROM petugas_bpbd ORDER BY id_petugas_bpbd  DESC ");
$petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian ORDER BY id_petugas_kajian  DESC ");
$kepala_bpbd = Querysatudata("SELECT * FROM kepala_bpbd ORDER BY id_kepala_bpbd  DESC ");

$nomer_pelapor = $pelapor['no_telp_pelapor'];
SendWA($nomer_pelapor, $pesan);

$nomer_petugas_bpbd = $petugas_bpbd['no_telp'];
SendWA($nomer_petugas_bpbd, $pesan);

$nomer_petugas_kajian = $petugas_kajian['no_telp'];
SendWA($nomer_petugas_kajian, $pesan);

$nomer_kepala_bpbd = $kepala_bpbd['no_telp'];
SendWA($nomer_kepala_bpbd, $pesan);

        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil " . $request["status_pelaporan"] . "");
    }
}
