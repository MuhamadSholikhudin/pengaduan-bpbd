<?php 
 
    class Wilayah {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = "INSERT INTO `wilayah` ( `kecamatan`, `desa`, `no_telp`)
                    VALUES 
                    ( 
                        '".$request['kecamatan']."', 
                        '".$request['desa']."', 
                        '".$request['no_telp']."', 
                        'aman'
                    )";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?wilayah=wilayah", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `wilayah` 
                SET `kecamatan` = '".$request['kecamatan']."', 
                    `desa` = '".$request['desa']."', 
                    `no_telp` = '".$request['no_telp']."'
                    WHERE id_wilayah = ".$request['id_wilayah']."
            ";

            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?wilayah=wilayah", "Data Berhasil Di Ubah");
        }
    }