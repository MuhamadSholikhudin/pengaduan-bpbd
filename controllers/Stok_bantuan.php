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

            $stok_bantuan_lama = Querysatudata("SELECT * FROM stok_bantuan WHERE id_stok_bantuan = ".$request['id_stok_bantuan']."");
            
            $bantuan_lama = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = ".$stok_bantuan_lama['id_bantuan']."");
            
            $stok_masuk_lama = $stok_bantuan_lama['stok_masuk'];
            $stok_tersedia_lama =  $stok_bantuan_lama['stok_tersedia'];
            $bantuan_stok_lama =  $bantuan_lama['stok'];
            
            $selisih_stok = $stok_masuk_lama - $request['stok_masuk'];
            
            $stok_tersedia_baru =  $stok_tersedia_lama + $selisih_stok;
            $bantuan_stok_baru = $bantuan_stok_lama + $selisih_stok;
            $sql_stok_bantuan = "UPDATE  `stok_bantuan` 
                SET tanggal_masuk = '".$request['tanggal_masuk']."', 
                    tanggal_kadaluarsa =  '".$request['tanggal_kadaluarsa']."', 
                    batch = '".$request['batch']."', 
                    stok_masuk = ".$request['stok_masuk'].",
                    stok_tersedia = ".$stok_tersedia_baru."
                    WHERE id_stok_bantuan = ".$request['id_stok_bantuan']."
            ";
            $this->Model()->Execute($sql_stok_bantuan);

            $this->Model()->Execute("UPDATE bantuan SET stok = ".$bantuan_stok_baru." WHERE id_bantuan = ".$stok_bantuan_lama['id_bantuan']."");
            Redirect("http://localhost/pengaduan-bpbd/?stok_bantuan=stok_bantuan", "Data Berhasil Di Ubah");
        }
    }