<?php 
 
    class Pelaporan {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
        
            $sql = "INSERT INTO `pelaporan` ( `id_user`, `tanggal_pelaporan`, `id_wilayah`, `pelaporan`, `link_maps`, `status_pelaporan`)
                    VALUES 
                    ( 
                        ".$request['id_user'].", 
                        '".$request['tanggal_pelaporan']."', 
                        ".$request['id_wilayah'].",
                        '".$request['pelaporan']."',
                        '".$request['link_maps']."',
                        '".$request['status_pelaporan']."'
                    )";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Tambah");
        }

        public function Update($request){
            $sql = "UPDATE  `pelaporan` 
                SET   id_user =  ".$request['id_user'].", 
                      tanggal_pelaporan =  '".$request['tanggal_pelaporan']."', 
                      id_wilayah = ".$request['id_wilayah'].",
                      pelaporan =  '".$request['pelaporan']."',
                      link_maps =  '".$request['link_maps']."',
                      status_pelaporan =  '".$request['status_pelaporan']."'
                    WHERE id_pelaporan = ".$request['id_pelaporan']."
            ";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?wilayah=wilayah", "Data Berhasil Di Ubah");
        }
    }