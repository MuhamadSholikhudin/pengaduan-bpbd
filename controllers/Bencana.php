<?php 
 
    class Bencana {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `bencana`( `nama_bencana`)
                    VALUES 
                    ( 
                        '".$request['nama_bencana']."'
                    )";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?bencana=bencana", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `bencana` 
                SET `nama_bencana` = '".$request['nama_bencana']."'
                    WHERE id_bencana = ".$request['id_bencana']."
            ";

            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?bencana=bencana", "Data Berhasil Di Ubah");
        }
    }