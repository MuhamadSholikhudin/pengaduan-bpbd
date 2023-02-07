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
            $gambar_bencana = (strtotime("now") . $file['gambar_bencana']['name']);
            $lokasi = $file['gambar_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_bencana);
        }
        $gambar_lokasi_bencana = null;
        if ($file['gambar_lokasi_bencana']['name'] !== "") {
            $gambar_lokasi_bencana = (strtotime("now") . $file['gambar_lokasi_bencana']['name']);
            $lokasi = $file['gambar_lokasi_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_lokasi_bencana);
        }
        $gambar_pelapor = null;
        if ($file['gambar_pelapor']['name'] !== "") {
            $gambar_pelapor = (strtotime("now") . $file['gambar_pelapor']['name']);
            $lokasi = $file['gambar_pelapor']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_pelapor);
        }

         

        $sql = "INSERT INTO `pelaporan` 
            ( `id_pelapor`, `tanggal_pelaporan`, `id_bencana`, `id_wilayah`, `pelaporan`, `link_maps`, `status_pelaporan`, `gambar_bencana`, `gambar_lokasi_bencana`, `gambar_pelapor`)
            VALUES 
            ( 
                ".$request['id_pelapor'].", 
                '".$request['tanggal_pelaporan']."', 
                ".$request['id_bencana'].",
                ".$request['id_wilayah'].",
                '".$request['pelaporan']."',
                '".$request['link_maps']."',
                '".$request['status_pelaporan']."',
                '".$gambar_bencana."',
                '".$gambar_lokasi_bencana."',
                '".$gambar_pelapor."'
            )";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Pelaporan Berhasil Di Tambah");
    }

    public function Update($request, $file)
    {
        $pelaporan = Querysatudata("SELECT * FROM pelaporan WHERE id_pelaporan = " . $request['id_pelaporan'] . "");
        $gambar_bencana = $pelaporan['gambar_bencana'];
        if ($file['gambar_bencana']['name'] !== "") {
            unlink("./gambar/pelaporan/" . $gambar_bencana);
            $gambar_bencana = (strtotime("now") . $file['gambar_bencana']['name']);
            $lokasi = $file['gambar_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_bencana);            
        }
        $gambar_lokasi_bencana = $pelaporan['gambar_lokasi_bencana'];
        if ($file['gambar_lokasi_bencana']['name'] !== "") {
            unlink("./gambar/pelaporan/" . $gambar_lokasi_bencana);
            $gambar_lokasi_bencana = (strtotime("now") . $file['gambar_lokasi_bencana']['name']);
            $lokasi = $file['gambar_lokasi_bencana']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_lokasi_bencana);
        }
        $gambar_pelapor = $pelaporan['gambar_pelapor'];
        if ($file['gambar_pelapor']['name'] !== "") {
            unlink("./gambar/pelaporan/" . $gambar_pelapor);
            $gambar_pelapor = (strtotime("now") . $file['gambar_pelapor']['name']);
            $lokasi = $file['gambar_pelapor']['tmp_name'];
            move_uploaded_file($lokasi, "./gambar/pelaporan/" . $gambar_pelapor);
        }

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
                      gambar_pelapor = '" . $gambar_pelapor . "'
                    WHERE id_pelaporan = " . $request['id_pelaporan'] . "
            ";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Ubah");
    }

    public function Kirim($request)
    {
        $sql = "UPDATE `pelaporan` 
                SET status_pelaporan =  'terkirim'
                WHERE id_pelaporan = " . $request['id'] . "
            ";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Kirim");
    }
    public function Batal_kirim($request)
    {
        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  'batal kirim'
                WHERE id_pelaporan = " . $request['id'] . "
            ";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Kirim");
    }
    public function Validasi($request)
    {
        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  'tervalidasi'
                WHERE id_pelaporan = " . $request['id'] . "
            ";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Validasi");
    }
    public function Tidak_Valid($request)
    {
        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  'tidak valid'
                WHERE id_pelaporan = " . $request['id'] . "
            ";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Tidak divalidasi");
    }

    public function CheckValidasi($request)
    {
        $sql = "UPDATE  `pelaporan` 
                SET status_pelaporan =  '".$request["status_pelaporan"]."',
                review_pelaporan =  '".$request["review_pelaporan"]."'
                WHERE id_pelaporan = " . $request['id_pelaporan'] . "
            ";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil ".$request["status_pelaporan"]."");
    }
}
