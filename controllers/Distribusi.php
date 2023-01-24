<?php

class Distribusi
{

    public function Model()
    {
        $model = new Model();
        return $model;
    }

    public function Post($request)
    {

        $sql = "INSERT INTO `pelaporan` ( `id_user`, `tanggal_pelaporan`, `id_wilayah`, `id_bencana`, `pelaporan`, `link_maps`, `status_pelaporan`)
                    VALUES 
                    ( 
                        " . $request['id_user'] . ", 
                        '" . $request['tanggal_pelaporan'] . "', 
                        " . $request['id_wilayah'] . ",
                        " . $request['id_bencana'] . ",
                        '" . $request['pelaporan'] . "',
                        '" . $request['link_maps'] . "',
                        '" . $request['status_pelaporan'] . "'
                    )";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Tambah");
    }

    public function Update($request)
    {
        $sql = "UPDATE  `pelaporan` 
                SET   id_user =  " . $request['id_user'] . ", 
                      tanggal_pelaporan =  '" . $request['tanggal_pelaporan'] . "', 
                      id_wilayah = " . $request['id_wilayah'] . ",
                      id_bencana = " . $request['id_bencana'] . ",
                      pelaporan =  '" . $request['pelaporan'] . "',
                      link_maps =  '" . $request['link_maps'] . "',
                      status_pelaporan =  '" . $request['status_pelaporan'] . "'
                    WHERE id_pelaporan = " . $request['id_pelaporan'] . "
            ";
        $this->Model()->Execute($sql);
        Redirect("http://localhost/pengaduan-bpbd/?pelaporan=pelaporan", "Data Berhasil Di Ubah");
    }

    public function AjaxSearch($request)
    {
        $bantuan_loop = '';
        if ($request['search'] !== "" and $request['search'] !== " " and $request['search'] !== NULL) {
            $num_sql = "SELECT COUNT(*) as id FROM bantuan WHERE nama_bantuan LIKE '%" . $request['search'] . "%' ";
            $num_bantuan = Querysatudata($num_sql);
            if ($num_bantuan['id'] > 0) {
                $sql = "SELECT * FROM bantuan WHERE nama_bantuan LIKE '%" . $request['search'] . "%' OR kategori LIKE '%" . $request['search'] . "%' LIMIT 10";
                $bantuans = Querybanyak($sql);
                $bantuan_loop .= '<table class="table table-stripped" id="tablesearch">';
                $bantuan_loop .= '<tr><th>Nama bantuan</th><th>Jumlah</th><th>Add</th></tr>';
                $bantuans = Querybanyak($sql);
                foreach ($bantuans as $bant) {
                    $bantuan_loop .= '                        
                                            <tr>                            
                                                <td>' . $bant['nama_bantuan'] . ' / ' . $bant['kategori'] . ' </td>
                                                <td>' . $bant['stok'] . '</td>
                                                <td>
                                                    <button id="addbantuan" data-id_bantuan="' . $bant['id_bantuan'] . '" class="addbantuan btn btn-sm btn-primary">
                                                        <i class="ti-plus"></i>    
                                                        Add
                                                    </button>
                                                </td>                                   
                                            </tr>';
                }
                $bantuan_loop .= '</table>';
            }
        }
        echo json_encode($bantuan_loop);
    }

    public function AjaxAddBant($request)
    {
        $num_sql = "SELECT * FROM bantuan WHERE id_bantuan = " . $request['id_bantuan'] . " ";
        $bantuan = Querysatudata($num_sql);
        $table_ul = '<li>
                            <span style="width:300px;">' . $bantuan['nama_bantuan'] . '</span>
                            &nbsp;&nbsp;&nbsp;
                            <span>
                                <input type="number" class="cls_bantuan" name="bantuan_id[]" value="' . $bantuan['id_bantuan'] . '" style="display:none;">
                                <input type="number" class="form-control" min="1" name="jumlah_bantuan[]" value="1" id="' . $bantuan['id_bantuan'] . '" style="width: 100px;">
                            </span>&nbsp;&nbsp;&nbsp;
                            <span style="width: 100px;">
                                <a href="#" id="trash_bantuan">
                                <i id="removebant" class="ti-trash" ></i>
                                </a>
                            </span>
                        </li>';
        echo json_encode($table_ul);
    }

    public function AjaxInsert($request)
    {
        $sql_distribusi = "INSERT INTO `distribusi` (  `id_peninjauan`, `id_user`, `tanggal_distribusi`, `keterangan_distribusi`,`status_distribusi`)
        VALUES 
        ( 
            " . $request['id_peninjauan'] . ",
            " . $request['id_user'] . ",
            '" . $request['tanggal_distribusi'] . "',
            '" . $request['keterangan_distribusi'] . "',
            'Sedang di proses'
        )";

        $this->Model()->Execute($sql_distribusi);
        $this->Model()->Execute("UPDATE peninjauan SET status_peninjauan = 'selesai' WHERE id_peninjauan = " . $request['id_peninjauan'] . "");

        $distribusi = Querysatudata("SELECT * FROM distribusi WHERE id_peninjauan = " . $request['id_peninjauan'] . " AND id_user = " . $request['id_user'] . "");
        foreach ($request['data'] as $key => $val) {
            $sql_distribusi_bantuan = "INSERT INTO `bantuan_distribusi` (  `id_distribusi`, `id_bantuan`, `jumlah`, `satuan`,`batch`)
            VALUES
            (
                " . $distribusi['id_distribusi'] . ", 
                " . $key . ",
                " . $val . ",
                " . $val . ",
                " . $val . "
            )";
            $this->Model()->Execute($sql_distribusi_bantuan);
        }
        echo json_encode("Data Distribusi berhasil di tambahkan");
    }

    // ====================== UPDATE =========================
    public function AjaxSearchEdit($request)
    {
        $bantuan_loop = '';
        if ($request['search'] !== "" and $request['search'] !== " " and $request['search'] !== NULL) {
            $except = "";
            if ($request['length'] > 0) {
                foreach ($request['array_bantuan'] as $id_bant) {
                    $except .= " id_bantuan != " . $id_bant . " AND ";
                }
            }
            $num_sql = "SELECT COUNT(*) as id FROM bantuan WHERE " . $except . " nama_bantuan LIKE '%" . $request['search'] . "%' OR kategori LIKE '%" . $request['search'] . "%' ";
            $num_bantuan = Querysatudata($num_sql);
            if ($num_bantuan['id'] > 0) {
                $sql = "SELECT * FROM bantuan WHERE " . $except . " nama_bantuan LIKE '%" . $request['search'] . "%' OR kategori LIKE '%" . $request['search'] . "%' LIMIT 10";
                $bantuans = Querybanyak($sql);
                $bantuan_loop .= '<table class="table table-stripped" id="tablesearch">';
                $bantuan_loop .= '<tr><th>Nama bantuan</th><th>Jumlah</th><th>Add</th></tr>';
                $bantuans = Querybanyak($sql);
                foreach ($bantuans as $bant) {
                    $bantuan_loop .= '                        
                                            <tr>                            
                                                <td>' . $bant['nama_bantuan'] . ' / ' . $bant['kategori'] . ' </td>
                                                <td>' . $bant['stok'] . '</td>
                                                <td>
                                                    <button id="addeditbantuan" data-id_bantuan="' . $bant['id_bantuan'] . '" class="addbantuan btn btn-sm btn-primary">
                                                        <i class="ti-plus"></i>    
                                                        Add
                                                    </button>
                                                </td>                                   
                                            </tr>';
                }
                $bantuan_loop .= '</table>';
            }
        }
        echo json_encode($bantuan_loop);
    }

    public function AjaxAddEditBant($request)
    {
        $num_sql = "SELECT * FROM bantuan WHERE id_bantuan = " . $request['id_bantuan'] . " ";
        $bantuan = Querysatudata($num_sql);
        $table_ul = '<tr>
                        <td>' . (intval($request['no']) + 1) . '</td>
                        <td>' . $bantuan['nama_bantuan'] . '</td>
                        <td>
                            <input class="form-control" type="hidden" name="bantuan_id[]" min="0" value="' . $bantuan['id_bantuan'] . '">                         
                            <input class="form-control" type="number" name="jumlah_bantuan[]" min="0" value="1">                         
                        </td>
                        <td>
                          ' . $bantuan['satuan'] . '
                        </td>
                        <td>
                        <a href="#" class="text-decoration-none text-danger" id="trash_bantuan_edit">
                                <i id="removebant" class="ti-trash" ></i>
                                Delete
                            </a> 
                        </td>
                    </tr>';
        echo json_encode($table_ul);
    }



    public function AjaxUpdateDistribusi($request)
    {
        $sql_update_distribusi = "UPDATE distribusi 
        SET keterangan_distribusi = '" . $request['keterangan_distribusi'] . "',
            tanggal_distribusi = '" . $request['tanggal_distribusi'] . "'
         WHERE id_distribusi = " . $request['id_distribusi'] . "";
        $this->Model()->Execute($sql_update_distribusi);


        $data_update = $request['data'];
        // //data bantuan array dari yang lama 
        $data_bantuan_distribusi_lamas = Querybanyak("SELECT * FROM bantuan_distribusi WHERE id_distribusi = " . intval($request['id_distribusi']) . " ");
        foreach ($data_bantuan_distribusi_lamas as $data_bantuan_distribusi_lama) {
            if (array_key_exists($data_bantuan_distribusi_lama['id_bantuan'], $data_update)) {
                $sql_execute_old = "UPDATE bantuan_distribusi SET jumlah = " . $request['data'][$data_bantuan_distribusi_lama['id_bantuan']] . " WHERE id_bantuan_distribusi = " . $data_bantuan_distribusi_lama['id_bantuan_distribusi'] . " ";
                $this->Model()->Execute($sql_execute_old);
            } else {
                $sql_execute_old = "DELETE FROM bantuan_distribusi WHERE id_bantuan_distribusi = " . $data_bantuan_distribusi_lama['id_bantuan_distribusi'] . "  ";
                $this->Model()->Execute($sql_execute_old);
            }
        }

        // // data bantuan array dari html         
        foreach ($request['data'] as $key => $val) {
            $check_dari_bantuan_distribusi = Querysatudata("SELECT COUNT(*) as count FROM bantuan_distribusi WHERE id_distribusi = " . intval($request['id_distribusi']) . " AND id_bantuan = " . $key . " ");
            if ($check_dari_bantuan_distribusi['count'] < 1) { // Jika sudah ada maka 
                $sql_distribusi_bantuan = "INSERT INTO `bantuan_distribusi` (  `id_distribusi`, `id_bantuan`, `jumlah`, `satuan`,`batch`)
                VALUES
                (
                    " . $request['id_distribusi'] . ", 
                    " . $key . ",
                    " . $val . ",
                    " . $val . ",
                    " . date("Y-m-d") . "
                )";
                $this->Model()->Execute($sql_distribusi_bantuan);
            }
        }
        echo json_encode("Data Bantuan distribusi berhasil di update");
    }


    public function Ajax_klik_peninjauan($request)
    {
        $peninjauan = Querysatudata("SELECT * FROM peninjauan WHERE id_peninjauan = " . intval($request['id_peninjauan']) . " ");
        
        $bencana = Querysatudata("SELECT * FROM bencana WHERE id_bencana = " . $peninjauan['id_bencana'] . " ");
        $wilayah = Querysatudata("SELECT * FROM wilayah WHERE id_wilayah = " . $peninjauan['id_wilayah'] . " ");
        $bencan_level_kategoti = $bencana['nama_bencana'] . " Wilayah " . $wilayah['kecamatan'] . " " . $wilayah['desa'] . " level " . $peninjauan['level_bencana'] . " " . $peninjauan['kategori_bencana'];
        echo json_encode([$bencan_level_kategoti, $peninjauan['keterangan_peninjauan']]);
        
        // echo json_encode([1, intval($request['id_peninjauan'])]);
    }

    public function AjaxSearchDistribusiBantuan($request)
    {
        $stok_bantuan_loop = '';
        if ($request['search'] !== "" and $request['search'] !== " " and $request['search'] !== NULL) {
            $except = "";
            if ($request['length'] > 0) {
                foreach ($request['array_bantuan'] as $id_bant) {
                    $except .= " stok_bantuan.id_stok_bantuan != " . $id_bant . " AND ";
                }
            }
            $num_sql = "SELECT COUNT(*) as id 
            FROM stok_bantuan LEFT JOIN bantuan ON stok_bantuan.id_bantuan = bantuan.id_bantuan 
            WHERE " . $except . " bantuan.nama_bantuan LIKE '%" . $request['search'] . "%' OR bantuan.kategori LIKE '%" . $request['search'] . "%' AND tanggal_kadaluarsa > " . date('Y-m-d') . "";
            $num_bantuan = Querysatudata($num_sql);
            if ($num_bantuan['id'] > 0) {
                $sql = "SELECT bantuan.nama_bantuan as nama_bantuan, bantuan.kategori as kategori, stok_bantuan.stok_tersedia as stok, stok_bantuan.id_stok_bantuan as id_stok_bantuan 
                FROM stok_bantuan LEFT JOIN bantuan ON stok_bantuan.id_bantuan = bantuan.id_bantuan 
                WHERE " . $except . " bantuan.nama_bantuan LIKE '%" . $request['search'] . "%' OR bantuan.kategori LIKE '%" . $request['search'] . "%'  AND tanggal_kadaluarsa > " . date('Y-m-d') . " LIMIT 10";
                $bantuans = Querybanyak($sql);
                $stok_bantuan_loop .= '<tbody>';
                $stok_bantuan_loop .= '<tr><th>Nama bantuan</th><th>Jumlah</th><th>Add</th></tr>';
                $bantuans = Querybanyak($sql);
                foreach ($bantuans as $bant) {
                    $stok_bantuan_loop .= '                        
                                            <tr>                            
                                                <td>' . $bant['nama_bantuan'] . ' / ' . $bant['kategori'] . ' </td>
                                                <td>' . $bant['stok'] . '</td>
                                                <td>
                                                    <button id="addstokbantuan" data-id_stok_bantuan="' . $bant['id_stok_bantuan'] . '" class="addbantuan btn btn-sm btn-primary">
                                                        <i class="ti-plus"></i>    
                                                        Add
                                                    </button>
                                                </td>                                   
                                            </tr>';
                }
                $stok_bantuan_loop .= '</tbody>';
            }
        }
        echo json_encode($stok_bantuan_loop);
    }

    public function AjaxAddStokBant($request)
    {
        $num_sql = "SELECT bantuan.nama_bantuan as nama_bantuan, bantuan.satuan as satuan, stok_bantuan.id_stok_bantuan as id_stok_bantuan, stok_bantuan.stok_tersedia as stok_tersedia FROM stok_bantuan RIGHT JOIN bantuan ON stok_bantuan.id_bantuan = bantuan.id_bantuan WHERE stok_bantuan.id_stok_bantuan = " . $request['id_stok_bantuan'] . " ";
        $bantuan = Querysatudata($num_sql);

        $table_ul = '<tr>
                        <td>' . (intval($request['no']) + 1) . '</td>
                        <td>' . $bantuan['nama_bantuan'] . '</td>
                        <td>
                            <input class="form-control" type="hidden" name="stok_bantuan_id[]" min="0" value="' . $bantuan['id_stok_bantuan'] . '">                         
                            <input class="form-control" type="number" name="jumlah_bantuan[]" min="0" value="1" max="' . $bantuan['stok_tersedia'] . '" style="width:50px;">                         
                        </td>
                        <td>' . $bantuan['satuan'] . '</td>
                        <td>
                        <a href="#" class="text-decoration-none text-danger" id="trash_stok_bantuan_edit">
                                <i id="removebant" class="ti-trash" ></i>
                                Delete
                            </a> 
                        </td>
                    </tr>';
        echo json_encode($table_ul);
    }

    public function AjaxInsertDistribusiStok($request)
    {
        $sql_distribusi = "INSERT INTO `distribusi` (  `id_peninjauan`, `id_user`, `tanggal_distribusi`, `keterangan_distribusi`,`status_distribusi`)
        VALUES 
        ( 
            " . $request['id_peninjauan'] . ",
            " . $request['id_user'] . ",
            '" . $request['tanggal_distribusi'] . "',
            '" . $request['keterangan_distribusi'] . "',
            'Sedang di proses'
        )";
        // Insert data distribusi
        $this->Model()->Execute($sql_distribusi);

        // Update data peninjauan
        $this->Model()->Execute("UPDATE peninjauan SET status_peninjauan = 'selesai' WHERE id_peninjauan = " . $request['id_peninjauan'] . "");

        // Tampilkan data dstribusi yang terkahir
        $distribusi = Querysatudata("SELECT * FROM distribusi WHERE id_peninjauan = " . $request['id_peninjauan'] . " AND id_user = " . $request['id_user'] . "");

        foreach ($request['data'] as $key => $val) {

            // Tampilkan data stok_bantuan berdasarkan id_stok_bantuan
            $stok_bantuan = Querysatudata("SELECT * FROM stok_bantuan WHERE id_stok_bantuan = " . $key . " ");

            // Tampilkan data bantuan berdasarkan id_bantuan
            $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = " . $stok_bantuan['id_bantuan'] . "");

            // Update stok pada bantuan
            $this->Model()->Execute("UPDATE bantuan SET stok =  " . ($bantuan['stok'] - intval($val)) . " WHERE id_bantuan = " . $bantuan['id_bantuan'] . "");

            // Update stok_tersedai pada stok_bantuan
            $this->Model()->Execute("UPDATE stok_bantuan SET stok_tersedia = " . ($stok_bantuan['stok_tersedia'] - intval($val)) . " WHERE id_stok_bantuan = " . $key . "");

            // Insert bantuan_distribusi
            $sql_distribusi_bantuan = "INSERT INTO `bantuan_distribusi` (  `id_distribusi`, `id_stok_bantuan`, `jumlah`, `satuan`,`batch`)
            VALUES
            (
                " . $distribusi['id_distribusi'] . ", 
                " . $key . ",
                " . $val . ",
                " . $val . ",
                " . $val . "
            )";
            $this->Model()->Execute($sql_distribusi_bantuan);
        }
        echo json_encode("Data Distribusi Bantuan berhasil di tambahkan");
    }


    public function AjaxSearchEditDistribusiBantuan($request)
    {
        $stok_bantuan_loop = '';
        if ($request['search'] !== "" and $request['search'] !== " " and $request['search'] !== NULL) {
            $except = "";
            if ($request['length'] > 0) {
                foreach ($request['array_bantuan'] as $id_bant) {
                    $except .= " stok_bantuan.id_stok_bantuan != " . $id_bant . " AND ";
                }
            }
            $num_sql = "SELECT COUNT(*) as id 
            FROM stok_bantuan LEFT JOIN bantuan ON stok_bantuan.id_bantuan = bantuan.id_bantuan 
            WHERE " . $except . " bantuan.nama_bantuan LIKE '%" . $request['search'] . "%' OR bantuan.kategori LIKE '%" . $request['search'] . "%' AND stok_bantuan.stok_tersedia > 0 AND stok_bantuan.tanggal_kadaluarsa > " . date('Y-m-d') . "";
            $num_bantuan = Querysatudata($num_sql);
            if ($num_bantuan['id'] > 0) {
                $sql = "SELECT bantuan.nama_bantuan as nama_bantuan, bantuan.kategori as kategori, stok_bantuan.stok_tersedia as stok, stok_bantuan.id_stok_bantuan as id_stok_bantuan 
                FROM stok_bantuan LEFT JOIN bantuan ON stok_bantuan.id_bantuan = bantuan.id_bantuan 
                WHERE " . $except . " bantuan.nama_bantuan LIKE '%" . $request['search'] . "%' OR bantuan.kategori LIKE '%" . $request['search'] . "%'  AND stok_bantuan.stok_tersedia > 0 AND stok_bantuan.tanggal_kadaluarsa > " . date('Y-m-d') . " LIMIT 10";
                $bantuans = Querybanyak($sql);
                $stok_bantuan_loop .= '<tbody>';
                $stok_bantuan_loop .= '<tr><th>Nama bantuan</th><th>Jumlah</th><th>Add</th></tr>';
                $bantuans = Querybanyak($sql);
                foreach ($bantuans as $bant) {
                    $stok_bantuan_loop .= '                        
                                            <tr>                            
                                                <td>' . $bant['nama_bantuan'] . ' / ' . $bant['kategori'] . '</td>
                                                <td>' . $bant['stok'] . '</td>
                                                <td>
                                                    <button id="editstokbantuan" data-id_stok_bantuan="' . $bant['id_stok_bantuan'] . '" class="addbantuan btn btn-sm btn-primary">
                                                        <i class="ti-plus"></i>    
                                                        Add
                                                    </button>
                                                </td>                                   
                                            </tr>';
                }
                $stok_bantuan_loop .= '</tbody>';
            }
        }

        echo json_encode($stok_bantuan_loop);
    }

    public function AjaxEditStokBant($request)
    {
        $num_sql = "SELECT bantuan.nama_bantuan as nama_bantuan, bantuan.satuan as satuan, stok_bantuan.id_stok_bantuan as id_stok_bantuan, stok_bantuan.stok_tersedia as stok_tersedia FROM stok_bantuan RIGHT JOIN bantuan ON stok_bantuan.id_bantuan = bantuan.id_bantuan WHERE stok_bantuan.id_stok_bantuan = " . $request['id_stok_bantuan'] . " ";
        $bantuan = Querysatudata($num_sql);

        $table_ul = '<tr>
                        <td>' . (intval($request['no']) + 1) . '</td>
                        <td>' . $bantuan['nama_bantuan'] . '</td>
                        <td>
                            <input class="form-control" type="hidden" name="stok_bantuan_id[]" min="0" value="' . $bantuan['id_stok_bantuan'] . '">                         
                            <input class="form-control" type="number" name="jumlah_bantuan[]" min="1"  max="' . $bantuan['stok_tersedia'] . '" value="1" style="width:100px;">                         
                        </td>
                        <td>' . $bantuan['satuan'] . '</td>
                        <td>
                        <a href="#" class="text-decoration-none text-danger" id="trash_stok_bantuan_edit">
                                <i id="removebant" class="ti-trash" ></i>
                                Delete
                            </a> 
                        </td>
                    </tr>';
        echo json_encode($table_ul);
    }

    // Update data distribusi dan bantuan distribusi
    public function AjaxUpdateDistribusiStok($request)
    {        
        // Update distribusi
        $sql_update_distribusi = "UPDATE distribusi 
            SET keterangan_distribusi = '" . $request['keterangan_distribusi'] . "',
                tanggal_distribusi = '" . $request['tanggal_distribusi'] . "'
                WHERE id_distribusi = " . $request['id_distribusi'] . "";
        $this->Model()->Execute($sql_update_distribusi);

        // Tampung data array bantuan distribusi dari html
        $data_update = $request['data'];

        //data bantuan array dari yang lama 
        $data_bantuan_distribusi_lamas = Querybanyak("SELECT * FROM bantuan_distribusi WHERE id_distribusi = " . intval($request['id_distribusi']) . " ");
        foreach ($data_bantuan_distribusi_lamas as $data_bantuan_distribusi_lama) {
            $stok_bantuan = Querysatudata("SELECT id_bantuan, stok_tersedia FROM stok_bantuan WHERE id_stok_bantuan = " . $data_bantuan_distribusi_lama['id_stok_bantuan'] . " ");
            $bantuan = Querysatudata("SELECT stok FROM bantuan WHERE id_bantuan = " . $stok_bantuan['id_bantuan'] . " ");

            // Check Jika sudah ada namtuan distribusi tinggal di update
            if (array_key_exists($data_bantuan_distribusi_lama['id_stok_bantuan'], $data_update)) {

                $jumlah_lama = $data_bantuan_distribusi_lama['jumlah'];
                $juumlah_baru = $request['data'][$data_bantuan_distribusi_lama['id_stok_bantuan']];

                $stok_tersedia_lama = $stok_bantuan['stok_tersedia'];
                $stok_bantuan_lama = $bantuan['stok'];

                $stok_tersedia_baru = ($stok_tersedia_lama + ($jumlah_lama - $juumlah_baru));
                $stok_bantuan_baru = ($stok_bantuan_lama + ($jumlah_lama - $juumlah_baru));

                //update data bantuan distribusi
                $sql_execute_old = "UPDATE bantuan_distribusi SET jumlah = " . $request['data'][$data_bantuan_distribusi_lama['id_stok_bantuan']] . " WHERE id_bantuan_distribusi = " . $data_bantuan_distribusi_lama['id_bantuan_distribusi'] . " ";
            } else {
                $jumlah_lama = $data_bantuan_distribusi_lama['jumlah'];

                $stok_tersedia_lama = $stok_bantuan['stok_tersedia'];
                $stok_bantuan_lama = $bantuan['stok'];

                $stok_tersedia_baru = ($stok_tersedia_lama + $jumlah_lama);
                $stok_bantuan_baru = ($stok_bantuan_lama + $jumlah_lama);

                // DELETE stok_bantuan dari bantuan distribusi
                $sql_execute_old = "DELETE FROM bantuan_distribusi WHERE id_bantuan_distribusi = " . $data_bantuan_distribusi_lama['id_bantuan_distribusi'] . "  ";
            }
            // update data stok_tersedia pada stok_bantuan
            $this->Model()->Execute("UPDATE stok_bantuan SET stok_tersedia = " . $stok_tersedia_baru . " WHERE id_stok_bantuan = " . $data_bantuan_distribusi_lama['id_stok_bantuan'] . " ");

            // update data stok bantuan pada bantuan
            $this->Model()->Execute("UPDATE bantuan SET stok = " . $stok_bantuan_baru . " WHERE id_bantuan = " . $stok_bantuan['id_bantuan'] . " ");

            // Execute  data bantuan_dsitribusi
            $this->Model()->Execute($sql_execute_old);
        }

        
        // // data bantuan array dari html         
        foreach ($request['data'] as $key => $val) {
            $check_dari_bantuan_distribusi = Querysatudata("SELECT COUNT(*) as count FROM bantuan_distribusi WHERE id_distribusi = " . intval($request['id_distribusi']) . " AND id_stok_bantuan = " . $key . " ");
            if ($check_dari_bantuan_distribusi['count'] < 1) { // Jika tida ada maka 

                // Tampilkan data stok_bantuan berdasarkan id_stok_bantuan
                $stok_bantuan = Querysatudata("SELECT * FROM stok_bantuan WHERE id_stok_bantuan = " . $key . " ");

                // Tampilkan data bantuan berdasarkan id_bantuan
                $bantuan = Querysatudata("SELECT * FROM bantuan WHERE id_bantuan = " . $stok_bantuan['id_bantuan'] . "");

                // Update stok pada bantuan
                $this->Model()->Execute("UPDATE bantuan SET stok =  " . ($bantuan['stok'] - intval($val)) . " WHERE id_bantuan = " . $bantuan['id_bantuan'] . "");

                // Update stok_tersedai pada stok_bantuan
                $this->Model()->Execute("UPDATE stok_bantuan SET stok_tersedia = " . ($stok_bantuan['stok_tersedia'] - intval($val)) . " WHERE id_stok_bantuan = " . intval($key) . "");

                // Insert bantuan_distribusi
                $sql_distribusi_bantuan = "INSERT INTO `bantuan_distribusi` (  `id_distribusi`, `id_stok_bantuan`, `jumlah`, `satuan`,`batch`)
                        VALUES
                        (
                            " . $request['id_distribusi'] . ", 
                            " . $key . ",
                            " . $val . ",
                            " . $val . ",
                            " . $val . "
                        )";
                $this->Model()->Execute($sql_distribusi_bantuan);
            }
        }
        echo json_encode("Data Bantuan distribusi berhasil di update");
    }

    public function Update_status($request, $file){        
        $distribusi_lama = Querysatudata("SELECT * FROM distribusi WHERE id_distribusi = ".$request['id_distribusi']."");
        $bukti_distribusi = $distribusi_lama["bukti_distribusi"];
        if($file['bukti_distribusi']['name'] !== ""){
            $bukti_distribusi = (strtotime("now") . $file['bukti_distribusi']['name']);
            $lokasi = $file['bukti_distribusi']['tmp_name'];    
            move_uploaded_file($lokasi, "./gambar/bukti_distribusi/".$bukti_distribusi);
        }

        $sql_update_status = "UPDATE distribusi 
            SET status_distribusi = '". $request["status_distribusi"]."' ,
                bukti_distribusi = '". $bukti_distribusi."' 
            WHERE id_distribusi = ".$request["id_distribusi"]." ";

            $this->Model()->Execute($sql_update_status);
            
        Redirect("http://localhost/pengaduan-bpbd/?distribusi=distribusi", "Data Status Distribusi Berhasil Di Ubah");
    }
}
