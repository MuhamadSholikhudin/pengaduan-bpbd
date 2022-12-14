<?php
include 'function.php';
include './models/Model.php';

include 'config/config.php';
$conf = new Config();
$url = $conf->UrlWeb();

include 'controllers/Auth.php';
$auth = new Auth();

include 'controllers/User.php';
$user = new User();

include 'controllers/Bantuan.php';
$bantuan = new Bantuan();

include 'controllers/Bencana.php';
$bencana = new Bencana();

include 'controllers/Wilayah.php';
$wilayah = new Wilayah();

include 'controllers/Pelaporan.php';
$pelaoran = new Pelaporan();

include 'controllers/Peninjauan.php';
$peninjauan = new Peninjauan();

include 'controllers/Distribusi.php';
$distribusi = new Distribusi();

include 'controllers/Stok_bantuan.php';
$stok_bantuan = new Stok_bantuan();

if ($_GET) {
    $param_key = array_keys($_GET)[0];
    $param_val = $_GET[array_keys($_GET)[0]];

    switch ($param_key) {
        case 'dashboard':
            if ($param_val == 'dashboard') {
                $conf->TemplateAdmin('views/dashboard/dashboard.php');
            }
            break;

        case 'user':
            if ($param_val == 'user') {
                $conf->TemplateAdmin('views/users/user.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/users/user_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/users/user_edit.php');
            } elseif ($param_val == 'post') {
                $user->Post($_POST);
            } elseif ($param_val == 'update') {
                $user->Update($_POST);
            }
            break;

        case 'bantuan':
            if ($param_val == 'bantuan') {
                $conf->TemplateAdmin('views/bantuan/bantuan.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/bantuan/bantuan_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/bantuan/bantuan_edit.php');
            } elseif ($param_val == 'post') {
                $bantuan->Post($_POST);
            } elseif ($param_val == 'update') {
                $bantuan->Update($_POST);
            } elseif ($param_val == 'stok') {
                $conf->TemplateAdmin('views/stok_bantuan/stok_bantuan.php');
            }
            break;

        case 'bencana':
            if ($param_val == 'bencana') {
                $conf->TemplateAdmin('views/bencana/bencana.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/bencana/bencana_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/bencana/bencana_edit.php');
            } elseif ($param_val == 'post') {
                $bencana->Post($_POST);
            } elseif ($param_val == 'update') {
                $bencana->Update($_POST);
            }
            break;

        case 'wilayah':
            if ($param_val == 'wilayah') {
                $conf->TemplateAdmin('views/wilayah/wilayah.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/wilayah/wilayah_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/wilayah/wilayah_edit.php');
            } elseif ($param_val == 'post') {
                $wilayah->Post($_POST);
            } elseif ($param_val == 'update') {
                $wilayah->Update($_POST);
            }
            break;

        case 'pelaporan':
            if ($param_val == 'pelaporan') {
                $conf->TemplateAdmin('views/pelaporan/pelaporan.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/pelaporan/pelaporan_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/pelaporan/pelaporan_edit.php');
            } elseif ($param_val == 'post') {
                $pelaoran->Post($_POST);
            } elseif ($param_val == 'update') {
                $pelaoran->Update($_POST);
            } elseif ($param_val == 'kirim') {
                $pelaoran->Update($_GET);
            } elseif ($param_val == 'validasi') {
                $pelaoran->Validasi($_GET);
            } elseif ($param_val == 'tidak_valid') {
                $pelaoran->Tidak_Valid($_GET);
            }
            break;

        case 'pelaporan_masyarakat':
            if ($param_val == 'pelaporan') {
                $conf->TemplateAdmin(
                    'views/pelaporan_masyarakat/pelaporan.php'
                );
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin(
                    'views/pelaporan_masyarakat/pelaporan_add.php'
                );
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin(
                    'views/pelaporan_masyarakat/pelaporan_edit.php'
                );
            } elseif ($param_val == 'post') {
                $pelaoran->Post($_POST);
            } elseif ($param_val == 'update') {
                $pelaoran->Update($_POST);
            } elseif ($param_val == 'kirim') {
                $pelaoran->Kirim($_GET);
            } elseif ($param_val == 'batal_kirim') {
                $pelaoran->Batal_kirim($_GET);
            }
            break;

        case 'peninjauan':
            if ($param_val == 'peninjauan') {
                $conf->TemplateAdmin('views/peninjauan/peninjauan.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/peninjauan/peninjauan_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/peninjauan/peninjauan_edit.php');
            } elseif ($param_val == 'post') {
                $peninjauan->Post($_POST, $_FILES);
            } elseif ($param_val == 'update') {
                $peninjauan->Update($_POST, $_FILES);
            }
            break;

        case 'stok_bantuan':
            if ($param_val == 'stok_bantuan') {
                $conf->TemplateAdmin('views/stok_bantuan/stok_bantuan.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/stok_bantuan/stok_bantuan_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/stok_bantuan/stok_bantuan_edit.php');
            } elseif ($param_val == 'post') {
                $stok_bantuan->Post($_POST);
            }elseif ($param_val == 'update') {
                $stok_bantuan->Update($_POST);
            }

            elseif ($param_val == 'stok_bantuan_keluar') {
                $conf->TemplateAdmin('views/stok_bantuan/stok_bantuan_keluar.php');

            }
            break;

        case 'distribusi':
            if ($param_val == 'distribusi') {
                $conf->TemplateAdmin('views/distribusi/distribusi.php');
            } elseif ($param_val == 'add') {
                $conf->TemplateAdmin('views/distribusi/distribusi_add.php');
            } elseif ($param_val == 'edit') {
                $conf->TemplateAdmin('views/distribusi/distribusi_edit.php');
            } elseif ($param_val == 'post') {
                var_dump($_POST);
            } 
            elseif ($param_val == 'update_status') {
                $distribusi->Update_status($_POST);
            }
                        
            elseif ($param_val == 'ajax_search') {
                $distribusi->AjaxSearch($_POST);
            }elseif ($param_val == 'ajax_add_bant') {
                $distribusi->AjaxAddBant($_POST);            
            }elseif ($param_val == 'ajax_insert') {
                $distribusi->AjaxInsert($_POST);
            }

            elseif ($param_val == 'ajax_search_edit') {
                $distribusi->AjaxSearchEdit($_POST);
            }elseif ($param_val == 'ajax_add_edit_bant') {
                $distribusi->AjaxAddEditBant($_POST);            
            }elseif ($param_val == 'ajax_update_distribusi') {
                $distribusi->AjaxUpdateDistribusi($_POST);
            }

            elseif ($param_val == 'ajax_click_peninjauan') {
                $distribusi->Ajax_klik_peninjauan($_POST);
            }

            elseif ($param_val == 'ajax_search_distribusi_bantuan') {
                $distribusi->AjaxSearchDistribusiBantuan($_POST);
            }elseif ($param_val == 'ajax_add_stok_bant') {
                $distribusi->AjaxAddStokBant($_POST);            
            }elseif ($param_val == 'ajax_insert_distribusi_stok') {
                $distribusi->AjaxInsertDistribusiStok($_POST);
            

            }elseif ($param_val == 'ajax_search_editdistribusi_bantuan') {
                $distribusi->AjaxSearchEditDistribusiBantuan($_POST);               
            }elseif ($param_val == 'ajax_edit_stok_bant') {
                $distribusi->AjaxEditStokBant($_POST);             
            }elseif ($param_val == 'ajax_update_distribusi_stok') {
                $distribusi->AjaxUpdateDistribusiStok($_POST);
            }

            break;
        case "laporan":

            // ================== Pelaporan =======
            if ($param_val == 'pelaporan') {
                if (  isset($_POST['tanggal_awal']) && isset($_POST['tanggal_akhir'])  ) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=pelaporan&tanggal_awal=".$_POST['tanggal_awal']."&tanggal_akhir=".$_POST['tanggal_akhir']."", "Data Berhasil di proses");
                } elseif (isset($_POST['bulan']) && isset($_POST['tahun'])) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=pelaporan&bulan=".$_POST['bulan']."&tahun=".$_POST['tahun']."", "Data Berhasil di proses");

                } elseif (isset($_POST['tahun'])) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=pelaporan&tahun=".$_POST['tahun']."", "Data Berhasil di proses");
                } else {
                    $conf->TemplateAdmin('views/laporan/pelaporan/pelaporan.php');
                }
            }elseif($param_val == 'pelaporan_cetak'){
                include "views/laporan/pelaporan/pelaporan_cetak.php";                
            }elseif($param_val == 'pelaporan_excel'){
                include "views/laporan/pelaporan/pelaporan_excel.php";                
            
            }elseif($param_val == 'pelaporan_pdf'){
                include "views/laporan/pelaporan/pelaporan_pdf.php";                
            }

            // ================== distribusi =======
            if ($param_val == 'distribusi') {
                if (  isset($_POST['tanggal_awal']) && isset($_POST['tanggal_akhir'])  ) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=distribusi&tanggal_awal=".$_POST['tanggal_awal']."&tanggal_akhir=".$_POST['tanggal_akhir']."", "Data Berhasil di proses");
                } elseif (isset($_POST['bulan']) && isset($_POST['tahun'])) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=distribusi&bulan=".$_POST['bulan']."&tahun=".$_POST['tahun']."", "Data Berhasil di proses");

                } elseif (isset($_POST['tahun'])) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=distribusi&tahun=".$_POST['tahun']."", "Data Berhasil di proses");
                } else {
                    $conf->TemplateAdmin('views/laporan/distribusi/distribusi.php');
                }
            }elseif($param_val == 'distribusi_cetak'){
                include "views/laporan/distribusi/distribusi_cetak.php";                
            }elseif($param_val == 'distribusi_excel'){
                include "views/laporan/distribusi/distribusi_excel.php";                
            
            }elseif($param_val == 'distribusi_pdf'){
                include "views/laporan/distribusi/distribusi_pdf.php";                
            }

            //=================== stok_bantuan ===================
            if ($param_val == 'stok_bantuan') {
                if (  isset($_POST['tanggal_awal']) && isset($_POST['tanggal_akhir'])  ) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=stok_bantuan&tanggal_awal=".$_POST['tanggal_awal']."&tanggal_akhir=".$_POST['tanggal_akhir']."", "Data Berhasil di proses");
                } elseif (isset($_POST['bulan']) && isset($_POST['tahun'])) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=stok_bantuan&bulan=".$_POST['bulan']."&tahun=".$_POST['tahun']."", "Data Berhasil di proses");
                } elseif (isset($_POST['tahun'])) {
                    Redirect("http://localhost/pengaduan-bpbd/?laporan=stok_bantuan&tahun=".$_POST['tahun']."", "Data Berhasil di proses");
                } else {
                    $conf->TemplateAdmin('views/laporan/stok_bantuan/stok_bantuan.php');
                }
            }elseif($param_val == 'stok_bantuan_cetak'){
                include "views/laporan/stok_bantuan/stok_bantuan_cetak.php";                
            }elseif($param_val == 'stok_bantuan_excel'){
                include "views/laporan/stok_bantuan/stok_bantuan_excel.php";                
            
            }elseif($param_val == 'stok_bantuan_pdf'){
                include "views/laporan/stok_bantuan/stok_bantuan_pdf.php";                
            }
            break;


        case 'pages':
            if ($param_val == 'crud') {
                $conf->TemplateAdmin('views/partials/content.php');
            } elseif ($param_val == 'login') {
                require __DIR__ . '/views/login.php';
            } elseif ($param_val == 'pendaftaran') {
                require __DIR__ . '/views/pendaftaran.php';
            }

            break;

        case 'auth':
            if ($param_val == 'pendaftaran') {
                $auth->pendaftaran($_POST);
            } elseif ($param_val == 'login') {
                $auth->login($_POST);
            } elseif ($param_val == 'logout') {
                $auth->logout();
            }

            break;

        default:
            // http_response_code(404);
            // require __DIR__ . '/views/404.php';
            require __DIR__ . '/views/login.php';

            break;
    }
} else {
    require __DIR__ . '/views/login.php';
}
