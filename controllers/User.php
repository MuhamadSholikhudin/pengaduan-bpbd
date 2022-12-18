<?php 
 
    class User {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `user` ( `nama_user`, `alamat_user`, `no_telp_user`, `username`, `password`, `level`) 
                    VALUES 
                    ( 
                        '".$request['nama_user']."', 
                        '".$request['alamat_user']."', 
                        '".$request['no_telp_user']."', 
                        '".$request['username']."', 
                        '".$request['password']."', 
                        '".$request['level']."'
                    )";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?user=user", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `user` 
                SET `nama_user` = '".$request['nama_user']."', 
                    `alamat_user` = '".$request['alamat_user']."', 
                    `no_telp_user` = '".$request['no_telp_user']."', 
                    `username` = '".$request['username']."', 
                    `password` = '".$request['password']."', 
                    `level` = '".$request['level']."'
                    WHERE id_user = ".$request['id_user']."
            ";

            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?user=user", "Data Berhasil Di Ubah");
        }
    }