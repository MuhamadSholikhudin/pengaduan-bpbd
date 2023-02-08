<?php 
 
    class User {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){

            //Check User 
            $countuser = NumRows("SELECT * FROM user WHERE username = '".$request['username']."' ");

            if($countuser > 0){
                Redirect("http://localhost/pengaduan-bpbd/?user=user", "Data tidak dapat di tambah karena username sudah ada");
            }else{

                // Query INSERT data user
                $sql_user = "INSERT INTO `user` (`username`, `password`, `level`) 
                        VALUES 
                        ( 
                            '".$request['username']."', 
                            '".$request['password']."', 
                            '".$request['level']."'
                        )";
                // Execute query INSERT
                $this->Model()->Execute($sql_user);

                // Menampilkan data user 
                $user = Querysatudata("SELECT * FROM user WHERE 
                        username = '".$request['username']."' AND
                        password = '".$request['password']."' AND
                        level =    '".$request['level']."' ");

                // Query INSERT data bpbd
                $sql_bpbd = "INSERT INTO `".$request['level']."` ( `id_user`,`nama`, `alamat`, `no_telp`) 
                    VALUES 
                    ( 
                        ".$user['id_user'].",
                        '".$request['nama']."', 
                        '".$request['alamat']."', 
                        '".$request['no_telp']."'
                    )";

                // Execute query INSERT tabel bpbd
                $this->Model()->Execute($sql_bpbd);
                Redirect("http://localhost/pengaduan-bpbd/?user=user", "Data Berhasil Di Tambah");
            }

        }


        public function PostDaftar($request){
            $sql_user = "INSERT INTO `user` ( `username`, `password`, `level`)  VALUES 
                        ( '".$request['username']."', '".$request['password']."', '".$request['level']."' )";
            $this->Model()->Execute($sql_user);

            $sql_daftar = "INSERT INTO `daftar`(`tanggal_daftar`, `nama_lengkap`, `alamat`, `no_telp`, `jenis_kelamin`, `id_wilayah`) VALUES 
                            ('".$request['tanggal_daftar']."','".$request['nama_lengkap']."','".$request['alamat']."','".$request['no_telp']."','".$request['jenis_kelamin']."',".$request['id_wilayah']."";
            $this->Model()->Execute($sql_daftar);

            $tampil_user = Querysatudata("SELECT * FROM user WHERE username = '".$request['username']."' AND  password = '".$request['password']."' ");
            $tampil_daftar = Querysatudata("SELECT * FROM daftar WHERE tanggal_daftar = '".$request['tanggal_daftar']."' AND  nama_lengkap = '".$request['nama_lengkap']."' ");
            
            $sql_pelapor = "INSERT INTO `pelapor`(`id_user`, `id_daftar`, `nama_pelapor`, `alamat_pelapor`, `no_telp_pelapor`) VALUES 
                            (".$tampil_user['id_user'].", ".$tampil_daftar['id_daftar'].", `nama_pelapor`, `alamat_pelapor`, `no_telp_pelapor`)";
            
            $this->Model()->Execute($sql_pelapor);

            Redirect("http://localhost/pengaduan-bpbd/?pages=login", "Pendaftaran berhasil silahkan login dengan akun yang anda buat");
        }

        public function Update($request){

            $sql_user = "UPDATE  `user` 
                SET `username` = '".$request['username']."', 
                    `password` = '".$request['password']."'
                    WHERE id_user = ".$request['id_user']."
            ";
            $this->Model()->Execute($sql_user);

            if($request['level'] == "pelapor"){

                // Query Update tabel pelapor
                $sql_bpbd = "UPDATE ".$request['level']." SET 
                    nama_pelapor='".$request['nama']."',
                    alamat_pelapor='".$request['alamat']."',
                    no_telp_pelapor='".$request['no_telp']."' 
                    WHERE id_user=".$request['id_user']."";
            }else{
                // Query Update BPBD
                $sql_bpbd = "UPDATE ".$request['level']." SET 
                    nama='".$request['nama']."',
                    alamat='".$request['alamat']."',
                    no_telp='".$request['no_telp']."' 
                    WHERE id_user=".$request['id_user']."";
            }
            
            $this->Model()->Execute($sql_bpbd);
            Redirect("http://localhost/pengaduan-bpbd/?user=user", "Data Berhasil Di Ubah");
        }
    }