<?php
class Auth
{
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

            if ($data_cek['level'] == "masyarakat") {
                header('Location: http://localhost/pengaduan-bpbd?dashboard=dashboard');
            } elseif ($data_cek['level'] == "kepala_bpbd") {
                header('Location: http://localhost/pengaduan-bpbd?dashboard=dashboard');
            } elseif ($data_cek['level'] == "petugas_bpbd") {
                header('Location: http://localhost/pengaduan-bpbd?dashboard=dashboard');
            }elseif ($data_cek['level'] == "petugas_logistik") {
                header('Location: http://localhost/pengaduan-bpbd?dashboard=dashboard');
            } elseif ($data_cek['level'] == "petugas_kajian_bencana") {
                header('Location: http://localhost/pengaduan-bpbd?dashboard=dashboard');
            }

            var_dump($_SESSION);
        } else {
            echo "<script>alert('Gagal Login')</script>";
            header('location: http://localhost/201753028/?halaman=login');
        }
    }


    public function logout(){
        session_destroy();

        echo Redirect("http://localhost/pengaduan-bpbd/", "Untuk masuk Silahkan Login Dahulu");
    }
}
