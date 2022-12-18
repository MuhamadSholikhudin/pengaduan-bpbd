<?php 
 
    class Bantuan {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `bantuan`( `nama_bantuan`, `kategori`, `satuan`, `batch`)  
                    VALUES 
                    ( 
                        '".$request['nama_bantuan']."', 
                        '".$request['kategori']."', 
                        '".$request['satuan']."', 
                        '".$request['batch']."'
                    )";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?bantuan=bantuan", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `bantuan` 
                SET nama_bantuan = '".$request['nama_bantuan']."', 
                    kategori =  '".$request['kategori']."', 
                    satuan = '".$request['satuan']."', 
                    batch= '".$request['batch']."'
                    WHERE id_bantuan = ".$request['id_bantuan']."
            ";

            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?bantuan=bantuan", "Data Berhasil Di Ubah");
        }
    }