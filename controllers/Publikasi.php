<?php 
 
    class Publikasi {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request, $file){
            $gambar = "";
            if($file['gambar']['name'] !== ""){
                $gambar = (strtotime("now") . $file['gambar']['name']);
                $lokasi = $file['gambar']['tmp_name'];    
                move_uploaded_file($lokasi, "./gambar/publikasi/".$gambar);
            } 

            $sql_publikasi = "INSERT INTO `publikasi` ( `id_distribusi`, `judul`, `kutipan`,`kategori`, `isi`,`tanggal_publikasi`,  `gambar`, `created_at`, `updated_at`)
                VALUES 
                ( 
                    ".$request['id_distribusi'].",
                    '".$request['judul']."',
                    '".$request['kutipan']."',
                    '".$request['kategori']."', 
                    '".$request['isi']."',
                    '".$request['tanggal_publikasi']."',
                    '".$gambar."', 
                    '".date("Y-m-d H:i:s")."', 
                    '".date("Y-m-d H:i:s")."'
                )";
            $this->Model()->Execute($sql_publikasi);
            Redirect("http://localhost/pengaduan-bpbd/?publikasi=publikasi", "Data Berhasil Di Tambah");
        }

        public function Update($request, $file){
            $publikasi_lama = Querysatudata("SELECT * FROM publikasi WHERE id_publikasi = ".$request['id_publikasi']."");
            $gambar = $publikasi_lama["gambar"];
            if($file['gambar']['name'] !== ""){
                $gambar = (strtotime("now") . $file['gambar']['name']);
                $lokasi = $file['gambar']['tmp_name'];    
                move_uploaded_file($lokasi, "./gambar/publikasi/".$gambar);
            }
            $sql_publikasi = "UPDATE publikasi SET
                judul = '".$request['judul']."',
                 kutipan ='".$request['kutipan']."',
                 kategori = '".$request['kategori']."', 
                 isi = '".$request['isi']."',
                 tanggal_publikasi = '".$request['tanggal_publikasi']."',
                 gambar = '".$gambar."', 
                 updated_at = '".date("Y-m-d H:i:s")."'
                 WHERE id_publikasi = ".$request['id_publikasi']."
                ";
            $this->Model()->Execute($sql_publikasi);
            Redirect("http://localhost/pengaduan-bpbd/?publikasi=publikasi", "Data Berhasil Di Update");

        }
        
    }