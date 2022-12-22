<?php 
 
    class Distribusi {

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
        
            $sql = "INSERT INTO `pelaporan` ( `id_user`, `tanggal_pelaporan`, `id_wilayah`, `id_bencana`, `pelaporan`, `link_maps`, `status_pelaporan`)
                    VALUES 
                    ( 
                        ".$request['id_user'].", 
                        '".$request['tanggal_pelaporan']."', 
                        ".$request['id_wilayah'].",
                        ".$request['id_bencana'].",
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
                      id_bencana = ".$request['id_bencana'].",
                      pelaporan =  '".$request['pelaporan']."',
                      link_maps =  '".$request['link_maps']."',
                      status_pelaporan =  '".$request['status_pelaporan']."'
                    WHERE id_pelaporan = ".$request['id_pelaporan']."
            ";
            $this->Model()->Execute($sql);
            Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Ubah");
        }
     
        public function AjaxSearch($request){

            /*
            $sql = "SELECT * FROM bantuan WHERE LIKE nama_bantuan  '%".$request['request']."%' ";
            $countbantuan = NumRows($sql);

            if($countbantuan < 1){
                $bantuan_loop = '<tr>Tidak Ditemukan</tr>';
            }else{
                $bantuan_loop = '';
                $bantuan_loop .= '<tr><th>Nama bantuan</th><th>Jumlah</th><th>Add</th></tr>';

                $bantuans = Querybanyak($sql);
                foreach ($bantuans as $bant) {

                    $bantuan_loop .= '                        
                            <tr>                            
                                <td>'.$bant['nama_bantuan'].'</td>
                                <td>'. $bant['satuan'].'</td>
                                <td>'. $bant['batch'].'</td>                                   
                            </tr>
                    ';
                }

            }
            */
            $bantuan_loop = $request['search'];
            return json_encode($bantuan_loop);

        }

    }