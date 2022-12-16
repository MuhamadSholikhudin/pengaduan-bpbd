<?php 
 
    class Pelaporan {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `pelaporan` ( `id_user`, `tanggal_pelaporan`, `pelaporan`)
                    VALUES 
                    ( 
                        '".$request['id_user']."', 
                        '".$request['tanggal_pelaporan']."', 
                        '".$request['pelaporan']."'
                    )";
            $this->Model()->Execute($sql);
            echo Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `pelaporan` 
                SET `id_user` = '".$request['id_user']."', 
                    `tanggal_pelaporan` = '".$request['tanggal_pelaporan']."', 
                    `pelaporan` = '".$request['pelaporan']."'
                    WHERE id_pelaporan = ".$request['id_pelaporan']."
            ";

            $this->Model()->Execute($sql);
            echo Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Ubah");
        }
    }