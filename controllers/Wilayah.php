<?php 
 
    class Wilayah {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `wilayah` ( `nama_wilayah`, `status_wilayah`, `ket_wilayah`)
                    VALUES 
                    ( 
                        '".$request['nama_wilayah']."', 
                        '".$request['status_wilayah']."', 
                        '".$request['ket_wilayah']."'
                    )";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?wilayah=wilayah", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `wilayah` 
                SET `nama_wilayah` = '".$request['nama_wilayah']."', 
                    `status_wilayah` = '".$request['status_wilayah']."', 
                    `ket_wilayah` = '".$request['ket_wilayah']."'
                    WHERE id_wilayah = ".$request['id_wilayah']."
            ";

            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?wilayah=wilayah", "Data Berhasil Di Ubah");
        }
    }