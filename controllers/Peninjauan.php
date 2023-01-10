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
            $sql_peninjauan = "INSERT INTO `peninjauan` ( `id_pelaporan`, `id_user`, `id_wilayah`,`id_bencana`, `tanggal_peninjauan`, `jumlah_korban`, `kategori_bencana`, `level_bencana`, `keterangan_peninjauan`,  `bukti_peninjauan`)
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
                        '".$bukti_peninjauan."'
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
                SET   id_pelaporan =  ".$request['id_pelaporan'].", 
                      id_user =  ".$request['id_user'].", 
                      id_wilayah = ".$request['id_wilayah'].",
                      id_bencana = ".$request['id_bencana'].",
                      tanggal_peninjauan =  '".$request['tanggal_peninjauan']."',
                      jumlah_korban =  ".$request['jumlah_korban'].",
                      kategori_bencana =  '".$request['kategori_bencana']."',
                      level_bencana =  ".$request['level_bencana'].",
                      keterangan_peninjauan =  '".$request['keterangan_peninjauan']."',
                      bukti_peninjauan =  '".$bukti_peninjauan."'
                    WHERE id_peninjauan = ".$request['id_peninjauan']."
            ";
            var_dump($sql);
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?peninjauan=peninjauan", "Data Berhasil Di Ubah");
        }
     
        public function Kirim($request){
            $sql = "UPDATE  `pelaporan` 
                    SET status_pelaporan =  'terkirim'
                    WHERE id_pelaporan = ".$request['id']."
            ";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Kirim");
        }
        public function Batal_kirim($request){
            $sql = "UPDATE  `pelaporan` 
                    SET status_pelaporan =  'batal kirim'
                    WHERE id_pelaporan = ".$request['id']."
            ";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?pelaporan_masyarakat=pelaporan", "Data Berhasil Di Kirim");
        }
        public function Validasi($request){
            $sql = "UPDATE  `pelaporan` 
                    SET status_pelaporan =  'tervalidasi'
                    WHERE id_pelaporan = ".$request['id']."
            ";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Validasi");
        }
        public function Tidak_Valid($request){
            $sql = "UPDATE  `pelaporan` 
                    SET status_pelaporan =  'tidak valid'
                    WHERE id_pelaporan = ".$request['id']."
            ";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Tidak divalidasi");
        }
    }