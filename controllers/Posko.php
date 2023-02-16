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
}
