<?php 
 
    class Publikasi {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request, $file){

            var_dump($request, $file);
            $gambar = "";
            if($file['gambar']['name'] !== ""){
                $gambar = (strtotime("now") . $file['gambar']['name']);
                $lokasi = $file['gambar']['tmp_name'];    
                move_uploaded_file($lokasi, "./gambar/publikasi/".$gambar);
            } 

            $sql_publikasi = "INSERT INTO `publikasi` (  `judul`, `kutipan`,`kategori`, `isi`,`tanggal_publikasi`,  `gambar`, `created_at`, `updated_at`)
            VALUES 
            ( 
                '".$request['judul']."',
                 '".$request['kutipan']."',
                 '".$request['kategori']."', 
                 '".$request['isi']."',
                 '".$request['tanggal_publikasi']."',
                 '".$request['gambar']."', 
                 '".date("Y-m-d H:i:s")."', 
                 '".date("Y-m-d H:i:s")."'

                )";
            $this->Model()->Execute($sql_publikasi);
            Redirect("http://localhost/pengaduan-bpbd/?publikasi=publikasi", "Data Berhasil Di Tambah");
        }
    }