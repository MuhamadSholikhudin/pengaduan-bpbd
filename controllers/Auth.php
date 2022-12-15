<?php

class Auth
{
    public function ModelAuth(){
        $model = new Model();
        return $model;
    }
    public function pendaftaran($request)
    {
        $sql = "INSERT INTO `user` ( `nama_user`, `alamat_user`, `no_telp_user`, `username`, `password`, `level`) 
                VALUES 
                ( 
                    '".$request['nama_user']."', 
                    '".$request['alamat_user']."', 
                    '".$request['no_telp_user']."', 
                    '".$request['username']."', 
                    '".$request['password']."', 
                    'masyarakat'
                )";
        $this->ModelAuth()->Execute($sql);
        echo Redirect("http://localhost/pengaduan-bpbd/?pages=login", "Pendaftaran Berhasil Silahkan Login dengan akun yang sudah anda daftarkan");
    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $cek = querysatudata("SELECT COUNT(*) as count FROM user WHERE username='".$username."' AND password='".$password."'");
        $data_cek = querysatudata("SELECT *  FROM user WHERE username='".$username."' AND password='".$password."'");

        if ($cek['count'] > 0) {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['status'] = 'login';
            $_SESSION['id_user'] = $data_cek['id_user'];
            $_SESSION['nama_user'] = $data_cek['nama_user'];
            $_SESSION['level'] = $data_cek['level'];
            echo Redirect("http://localhost/pengaduan-bpbd?dashboard=dashboard", "Berhasil Login");
        } else {
            echo Redirect("http://localhost/pengaduan-bpbd?pages=login", "Gagal Login");
        }
    }

    public function logout(){
        session_destroy();
        echo Redirect("http://localhost/pengaduan-bpbd/?pages=login", "Untuk Masuk Silahkan Login Dahulu");
    }
}
