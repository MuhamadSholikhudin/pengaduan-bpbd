<?php 
    // include "function.php";
    // include "./config/Helper.php";
    include "./models/Model.php";

    class User {
        function __construct(){
         
            $model = new Model();
            return;
        }

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `user` ( `nama_user`, `alamat_user`, `no_telp_user`, `username`, `password`, `level`) 
            VALUES ( '".$request['nama_user']."', '".$request['alamat_user']."', '".$request['no_telp_user']."', '".$request['username']."', '".$request['password']."', '".$request['level']."')";
            $this->Model->Execute($sql);
            echo Redirect("http://localhost/pengaduan-bpbd/?user=user", "Data Berhasil Di Tambah");
        }
    }