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
                        <td>1</td>
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

        //data bantuan array dari yang lama 
        $data_bantuan_distribusi_lamas = Querybanyak("SELECT * FROM bantuan_distribusi WHERE id_distribusi = " . intval($request['id_distribusi']) . " ");
        foreach ($data_bantuan_distribusi_lamas as $data_bantuan_distribusi_lama) {
            $data_update = $request['data'];
            if (array_key_exists($data_bantuan_distribusi_lama['id_bantuan'], $data_update)) {
                $sql_execute_old = "UPDATE bantuan_dstribusi SET jumlah = " . $data_update[$data_bantuan_distribusi_lama['id_bantuan']] . " WHERE id_bantuan_distribusi = " . $data_bantuan_distribusi_lama['id_bantuan_distribusi'] . " ";
            } else {
                $sql_execute_old = "DELETE FROM bantuan_distribusi WHERE id_bantuan_distribusi = " . $data_bantuan_distribusi_lama['id_bantuan_distribusi'] . "  ";
            }
            $this->Model()->Execute($sql_execute_old);
        }

        // data bantuan array dari html         
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
        echo json_encode("Data bantuan distribusi berhasil di update");
    }
}
