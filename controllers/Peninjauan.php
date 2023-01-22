<?php 
 
    class Peninjauan {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request, $file){

            $sql_pelaporan = "UPDATE  `pelaporan` 
                SET   id_bencana = ".$request['id_bencana'].",
                      id_wilayah =  ".$request['id_wilayah']."
                    WHERE id_pelaporan = ".$request['id_pelaporan']."
            ";
            $this->Model()->Execute($sql_pelaporan);

            $bukti_peninjauan = "";
            if($file['bukti_peninjauan']['name'] !== ""){
                $bukti_peninjauan = (strtotime("now") . $file['bukti_peninjauan']['name']);
                $lokasi = $file['bukti_peninjauan']['tmp_name'];    
                move_uploaded_file($lokasi, "./gambar/bukti_peninjauan/".$bukti_peninjauan);
            } 
            $sql_peninjauan = "INSERT INTO `peninjauan` ( `id_pelaporan`, `id_user`, `id_wilayah`,`id_bencana`, `tanggal_peninjauan`, `jumlah_korban`, `kategori_bencana`, `level_bencana`, `keterangan_peninjauan`,  `bukti_peninjauan`, dusun, rt, rw, jumlah_kk, jumlah_rumah, sebab, akibat, upaya_penanganan, lain_lain)
                    VALUES 
                    ( 
                        ".$request['id_pelaporan'].", 
                        '".$request['id_user']."', 
                        ".$request['id_wilayah'].",
                        ".$request['id_bencana'].",
                        '".$request['tanggal_peninjauan']."',
                        ".$request['jumlah_korban'].",
                        '".$request['kategori_bencana']."',
                        ".$request['level_bencana'].",
                        '".$request['keterangan_peninjauan']."',
                        '".$bukti_peninjauan."',
                        '".$request['dusun']."',
                        ".$request['rt'].",
                        ".$request['rw'].",
                        ".$request['jumlah_kk'].",
                        ".$request['jumlah_rumah'].",
                        '".$request['sebab']."',
                        '".$request['akibat']."',
                        '".$request['upaya_penanganan']."',
                        '".$request['lain_lain']."',
                    )";
            $this->Model()->Execute($sql_peninjauan);
            Redirect("http://localhost/pengaduan-bpbd/?peninjauan=peninjauan", "Data Berhasil Di Tambah");
        }

        public function Update($request, $file){
            
            $peninjauan_lama = Querysatudata("SELECT * FROM peninjauan WHERE id_Peninjauan = ".$request['id_peninjauan']."");
            $bukti_peninjauan = $peninjauan_lama["bukti_peninjauan"];
            if($file['bukti_peninjauan']['name'] !== ""){
                $bukti_peninjauan = (strtotime("now") . $file['bukti_peninjauan']['name']);
                $lokasi = $file['bukti_peninjauan']['tmp_name'];    
                move_uploaded_file($lokasi, "./gambar/bukti_peninjauan/".$bukti_peninjauan);
            }
            $sql = "UPDATE  `peninjauan` 
                SET id_pelaporan =  ".$request['id_pelaporan'].", 
                    id_user =  ".$request['id_user'].", 
                    id_wilayah = ".$request['id_wilayah'].",
                    id_bencana = ".$request['id_bencana'].",
                    tanggal_peninjauan =  '".$request['tanggal_peninjauan']."',
                    jumlah_korban =  ".$request['jumlah_korban'].",
                    kategori_bencana =  '".$request['kategori_bencana']."',
                    level_bencana =  ".$request['level_bencana'].",
                    keterangan_peninjauan =  '".$request['keterangan_peninjauan']."',
                    bukti_peninjauan =  '".$bukti_peninjauan."',
                    dusun =  '".$request['dusun']."',
                    rt =  ".$request['rt'].",
                    rw =  ".$request['rw'].",
                    jumlah_kk =  ".$request['jumlah_kk'].",
                    jumlah_rumah =  ".$request['jumlah_rumah'].",
                    sebab =  '".$request['sebab']."',
                    akibat =  '".$request['akibat']."',
                    upaya_penanganan =  '".$request['upaya_penanganan']."',
                    lain_lain =  '".$request['lain_lain']."',
                    WHERE id_peninjauan = ".$request['id_peninjauan']."
            ";
            var_dump($sql);
            die();
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?peninjauan=peninjauan", "Data Berhasil Di Ubah");
        }     

        public function UpdateStatus($request){ 
            // Updata data status peninjauan berdasarkan id_peninjauan
            $sql = "UPDATE peninjauan 
                SET status_peninjauan = '".$request['status_peninjauan']."' 
                WHERE id_peninjauan =  id_peninjauan = ".$request['id_peninjauan']."";

            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?peninjauan=peninjauan", "Data Berhasil Di Prosess");

        }
        
    }