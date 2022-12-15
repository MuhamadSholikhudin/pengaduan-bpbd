<?php 
 
    class Bencana {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `bencana`( `nama_bencana`, `kategori_bencana`, `level`, `wilayah`)
                    VALUES 
                    ( 
                        '".$request['nama_bencana']."', 
                        '".$request['kategori_bencana']."', 
                        '".$request['level']."', 
                        '".$request['wilayah']."'
                    )";
            $this->Model()->Execute($sql);
            echo Redirect("http://localhost/pengaduan-bpbd/?bencana=bencana", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `bencana` 
                SET `nama_bencana` = '".$request['nama_bencana']."', 
                    `kategori_bencana` = '".$request['kategori_bencana']."', 
                    `level` = '".$request['level']."', 
                    `wilayah` = '".$request['wilayah']."'
                    WHERE id_bencana = ".$request['id_bencana']."
            ";

            $this->Model()->Execute($sql);
            echo Redirect("http://localhost/pengaduan-bpbd/?bencana=bencana", "Data Berhasil Di Ubah");
        }
    }