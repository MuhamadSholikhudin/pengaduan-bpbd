<?php

class Auth
{
    public function ModelAuth()
    {
        $model = new Model();
        return $model;
    }

    public function pendaftaran($request)
    {
        //Check User 
        $countuser = NumRows("SELECT * FROM user WHERE username = '" . $request['username'] . "' ");

        if ($countuser > 0) {
            Redirect("http://localhost/pengaduan-bpbd/?pages=pendaftaran", "Data tidak dapat di tambah karena username sudah ada");
        } else {

            $sql_user = "INSERT INTO `user` ( `username`, `password`, `level`)  VALUES 
                    ( '" . $request['username'] . "', '" . $request['password'] . "', 'pelapor' )";
            $this->ModelAuth()->Execute($sql_user);

            $sql_daftar = "INSERT INTO `daftar`(`tanggal_daftar`, `nama_lengkap`, `alamat`, `no_telp`, `jenis_kelamin`, `id_wilayah`) VALUES 
                        ('" . $request['tanggal_daftar'] . "','" . $request['nama_lengkap'] . "','" . $request['alamat'] . "','" . $request['no_telp'] . "','" . $request['jenis_kelamin'] . "'," . $request['id_wilayah'] . ")  ";
            $this->ModelAuth()->Execute($sql_daftar);

            $tampil_user = Querysatudata("SELECT * FROM user WHERE username = '" . $request['username'] . "' AND  password = '" . $request['password'] . "' ");
            $tampil_daftar = Querysatudata("SELECT * FROM daftar WHERE tanggal_daftar = '" . $request['tanggal_daftar'] . "' AND  nama_lengkap = '" . $request['nama_lengkap'] . "' ");

            $sql_pelapor = "INSERT INTO `pelapor`(`id_user`, `id_daftar`, `nama_pelapor`, `alamat_pelapor`, `no_telp_pelapor`) VALUES 
                        (" . $tampil_user['id_user'] . ", " . $tampil_daftar['id_daftar'] . ",'" . $request['nama_lengkap'] . "', '" . $request['alamat'] . "', '" . $request['no_telp'] . "')";

            $this->ModelAuth()->Execute($sql_pelapor);

            Redirect("http://localhost/pengaduan-bpbd/?pages=login", "Pendaftaran berhasil silahkan login dengan akun yang anda buat");
        }
    }

    public function login($request)
    {
 
        $username = $request['username'];
        $password = $request['password'];

        $cek = querysatudata("SELECT COUNT(*) as count FROM user WHERE username='" . $username . "' AND password='" . $password . "'");
        $data_cek = querysatudata("SELECT *  FROM user WHERE username='" . $username . "' AND password='" . $password . "'");

        if ($cek['count'] > 0) {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['status'] = 'login';
            $_SESSION['id_user'] = $data_cek['id_user'];
            $_SESSION['level'] = $data_cek['level'];
            Redirect("http://localhost/pengaduan-bpbd?dashboard=dashboard", "Berhasil Login");
        } else {
            Redirect("http://localhost/pengaduan-bpbd?pages=login", "Gagal Login");
        }
    }

    public function logout()
    {
        session_destroy();
        Redirect("http://localhost/pengaduan-bpbd/?pages=login", "Untuk Masuk Silahkan Login Dahulu");
    }
}
