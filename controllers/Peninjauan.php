<?php

class Peninjauan
{

    public function Model()
    {
        $model = new Model();
        return $model;
    }

    public function Post($request, $file)
    {
        $sql_pelaporan = "UPDATE  `pelaporan` 
                SET   id_bencana = " . $request['id_bencana'] . ",
                      id_wilayah =  " . $request['id_wilayah'] . "
                WHERE id_pelaporan = " . $request['id_pelaporan'] . "
            ";
        $this->Model()->Execute($sql_pelaporan);

        $bukti_peninjauan = "";
        if ($file['bukti_peninjauan']['name'] !== "") {
            $bukti_peninjauan = str_replace(" ", "", (strtotime("now") . $file['bukti_peninjauan']['name']));
            $lokasi = $file['bukti_peninjauan']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/bukti_peninjauan/" . $bukti_peninjauan);
        }
        $sql_peninjauan = "INSERT INTO `peninjauan` ( `id_pelaporan`, `id_petugas_kajian`, `id_wilayah`,`id_bencana`, `tanggal_peninjauan`, `jumlah_korban`, `kategori_bencana`, `level_bencana`, `keterangan_peninjauan`, `status_peninjauan`, `bukti_peninjauan`, dusun, rt, rw, jumlah_kk, jumlah_rumah, sebab, akibat, upaya_penanganan, lain_lain)
            VALUES 
            ( 
                " . $request['id_pelaporan'] . ", 
                '" . $request['id_petugas_kajian'] . "', 
                " . $request['id_wilayah'] . ",
                " . $request['id_bencana'] . ",
                '" . $request['tanggal_peninjauan'] . "',
                " . $request['jumlah_korban'] . ",
                '" . $request['kategori_bencana'] . "',
                " . $request['level_bencana'] . ",
                '" . $request['keterangan_peninjauan'] . "',
                'dalam proses',
                '" . $bukti_peninjauan . "',
                '" . $request['dusun'] . "',
                '" . $request['rt'] . "',
                '" . $request['rw'] . "',
                " . $request['jumlah_kk'] . ",
                " . $request['jumlah_rumah'] . ",
                '" . $request['sebab'] . "',
                '" . $request['akibat'] . "',
                '" . $request['upaya_penanganan'] . "',
                '" . $request['lain_lain'] . "'
            )";

        $this->Model()->Execute($sql_peninjauan);

        // Menampilkan data peninjauan yang terakhir di tambahkan
        $tampil_peninjauan = Querysatudata("SELECT * FROM peninjauan ORDER BY id_peninjauan DESC ");

        //Query insert data history
        $insert_history = "INSERT INTO `history`
        ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
        VALUES
        ( 'add', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'peninjauan', " . $tampil_peninjauan['id_peninjauan'] . ", '', 'menambahkan data peninjauan', " . $_SESSION['id_user'] . ") 
        ";



        $pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = ".$request['id_pelaporan']."");
        $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_pelapor = ".$pelaporan['id_pelapor']."");
        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$pelaporan['id_wilayah']."");
        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$pelaporan['id_bencana']."");
        $petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_petugas_kajian = ". $request['id_petugas_kajian']."");

$pesan = "
BPBD KABUPATEN KUDUS 
Menginformasikan adanya peninjauan dari petugas kajian bencana sebagai berikut:

Petugas kajian : ". $petugas_kajian['nama'] . "
Pelapor :". $pelapor['nama_pelapor'] . "
Bencana :". $bencana['nama_bencana'] . "
Wilayah :". $wilayah['desa'] . " / ". $wilayah['kecamatan'] . "
Kategori bencana : ". $request['kategori_bencana'] . "
Level bencana : ". $request['level_bencana'] . "
Tanggal peninjauan : ". $request['tanggal_peninjauan'] . "
Jumlah korban : ". $request['jumlah_korban'] . "
Keterangan peninjauan : ". $request['keterangan_peninjauan'] . "
Status peninjauan : *dalam proses*
Dusun : ". $request['dusun'] . "
Rt : ". $request['rt'] . "
Rw : ". $request['rw'] . "
Jumlah KK terdampak : ". $request['jumlah_kk'] . "
Jumlah rumah terdampak : ". $request['jumlah_rumah'] . "
Sebab : ". $request['sebab'] . "
Akibat : ". $request['akibat'] . "
Upaya penanganan : ". $request['upaya_penanganan'] . "
Lain lain : ". $request['lain_lain'] . "

Untuk pihak yang berkaitan dengan penanganan bencana untuk dapat menjalankan kewajibannya sesuai dengan aturan yang berlaku
Terima kasih.
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

        // Exec data query
        $this->Model()->Execute($insert_history);

        Redirect("http://localhost/pengaduan-bpbd/?peninjauan=peninjauan", "Data Berhasil Di Tambah");
    }

    public function Update($request, $file)
    {

        $peninjauan_lama = Querysatudata("SELECT * FROM peninjauan WHERE id_Peninjauan = " . $request['id_peninjauan'] . "");
        $bukti_peninjauan = $peninjauan_lama["bukti_peninjauan"];
        if ($file['bukti_peninjauan']['name'] !== "") {
            $bukti_peninjauan = str_replace(" ", "", (strtotime("now") . $file['bukti_peninjauan']['name']));
            $lokasi = $file['bukti_peninjauan']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/bukti_peninjauan/" . $bukti_peninjauan);
        }
        $sql = "UPDATE  `peninjauan` 
                SET id_pelaporan =  " . $request['id_pelaporan'] . ", 
                    id_petugas_kajian =  " . $request['id_petugas_kajian'] . ", 
                    id_wilayah = " . $request['id_wilayah'] . ",
                    id_bencana = " . $request['id_bencana'] . ",
                    tanggal_peninjauan =  '" . $request['tanggal_peninjauan'] . "',
                    jumlah_korban =  " . $request['jumlah_korban'] . ",
                    kategori_bencana =  '" . $request['kategori_bencana'] . "',
                    level_bencana =  " . $request['level_bencana'] . ",
                    keterangan_peninjauan =  '" . $request['keterangan_peninjauan'] . "',
                    bukti_peninjauan =  '" . $bukti_peninjauan . "',
                    dusun =  '" . $request['dusun'] . "',
                    rt =  " . $request['rt'] . ",
                    rw =  " . $request['rw'] . ",
                    jumlah_kk =  " . $request['jumlah_kk'] . ",
                    jumlah_rumah =  " . $request['jumlah_rumah'] . ",
                    sebab =  '" . $request['sebab'] . "',
                    akibat =  '" . $request['akibat'] . "',
                    upaya_penanganan =  '" . $request['upaya_penanganan'] . "',
                    lain_lain =  '" . $request['lain_lain'] . "'
                    WHERE id_peninjauan = " . $request['id_peninjauan'] . "
            ";

        $this->Model()->Execute($sql);

        //Query insert data history
        $insert_history = "INSERT INTO `history`
        ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
        VALUES
        ( 'update', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'peninjauan', " . $request['id_peninjauan'] . ", '', 'mengubah data peninjauan', " . $_SESSION['id_user'] . ") 
        ";

        // Exec data query
        $this->Model()->Execute($insert_history);

        Redirect("http://localhost/pengaduan-bpbd/?peninjauan=peninjauan", "Data Berhasil Di Ubah");
    }

    public function UpdateStatus($request)
    {
        // Updata data status peninjauan berdasarkan id_peninjauan
        $sql = "UPDATE peninjauan 
                SET status_peninjauan = '" . $request['status_peninjauan'] . "' 
                WHERE id_peninjauan  = " . $request['id_peninjauan'] . "";
        $this->Model()->Execute($sql);

        //Query insert data history
        $insert_history = "INSERT INTO `history`
                ( `action`, `tanggal_history`, `created_at`, `updated_at`, `tabel`, `id_tabel`, `status_history`, `keterangan`, `id_user`) 
                VALUES
                ( 'update status', '" . date("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "', 'peninjauan', " . $request['id_peninjauan'] . ", '', 'update data status peninjauan', " . $_SESSION['id_user'] . ") 
                ";
        // Exec data query
        $this->Model()->Execute($insert_history);

        $peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = ".$request['id_peninjauan']."");

        $pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = ".$peninjauan['id_pelaporan']."");
        $pelapor = Querysatudata("SELECT * FROM pelapor WHERE id_pelapor = ".$pelaporan['id_pelapor']."");
        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = ".$pelaporan['id_wilayah']."");
        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = ".$pelaporan['id_bencana']."");
        $petugas_kajian = Querysatudata("SELECT * FROM petugas_kajian WHERE id_petugas_kajian = ". $peninjauan['id_petugas_kajian']."");

$pesan = "
BPBD KABUPATEN KUDUS 
Menginformasikan adanya peninjauan dari petugas kajian bencana sebagai berikut:

Petugas kajian : ". $petugas_kajian['nama'] . "
Pelapor:". $pelapor['nama_pelapor'] . "
Bencana:". $bencana['nama_bencana'] . "
Wilayah:". $wilayah['desa'] . " / ". $wilayah['kecamatan'] . "
Kategori bencana : ". $peninjauan['kategori_bencana'] . "
Level bencana : ". $peninjauan['level_bencana'] . "
Tanggal peninjauan : ". $peninjauan['tanggal_peninjauan'] . "
Jumlah korban : ". $peninjauan['jumlah_korban'] . "
Keterangan peninjauan : ". $peninjauan['keterangan_peninjauan'] . "
Status peninjauan : *". $request['status_peninjauan'] . "*
Dusun : ". $peninjauan['dusun'] . "
Rt : ". $peninjauan['rt'] . "
Rw : ". $peninjauan['rw'] . "
Jumlah_kk : ". $peninjauan['jumlah_kk'] . "
Jumlah_rumah : ". $peninjauan['jumlah_rumah'] . "
Sebab : ". $peninjauan['sebab'] . "
Akibat : ". $peninjauan['akibat'] . "
Upaya_penanganan : ". $peninjauan['upaya_penanganan'] . "
Lain_lain : ". $peninjauan['lain_lain'] . "

Untuk pihak yang berkaitan dengan penanganan bencana untuk dapat menjalankan kewajibannya sesuai dengan aturan yang berlaku
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

        Redirect("http://localhost/pengaduan-bpbd/?peninjauan=peninjauan", "Data Berhasil Di Prosess");
    }
}
