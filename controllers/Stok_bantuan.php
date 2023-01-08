<?php 
 
    class Stok_bantuan {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql_insert_stok_bantuan = "INSERT INTO `stok_bantuan`( `id_bantuan`, `tanggal_masuk`, `tanggal_kadaluarsa`, `stok_masuk`, `stok_tersedia`, `batch`)  
                    VALUES 
                    ( 
                        ".$request['id_bantuan'].", 
                        '".$request['tanggal_masuk']."', 
                        '".$request['tanggal_kadaluarsa']."', 
                        ".$request['stok_masuk'].",
                        ".$request['stok_masuk'].",
                        '".$request['batch']."'
                    )";
            $this->Model()->Execute($sql_insert_stok_bantuan);
            $tampil_bantuan_lama = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = ".$request['id_bantuan']."");
            $sql_update_bantuan = "UPDATE bantuan SET stok = ".($tampil_bantuan_lama['stok'] + $request['stok_masuk'])." WHERE id_bantuan = ".$request['id_bantuan']."";            
            $this->Model()->Execute($sql_update_bantuan);
            Redirect("http://localhost/pengaduan-bpbd/?stok_bantuan=stok_bantuan", "Data Berhasil Di Tambah");
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