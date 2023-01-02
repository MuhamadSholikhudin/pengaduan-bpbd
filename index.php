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
            // USER
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
                $wilayah->Post($_POST);
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
                $conf->TemplateAdmin(
                    'views/stok_bantuan/stok_bantuan_edit.php'
                );
            } elseif ($param_val == 'post') {
                $user->Post($_POST);
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
                // $user->Post($_POST);
            } elseif ($param_val == 'ajax_search') {
                $bantuan_loop = 'OKE';
                // echo $bantuan_loop;
                // return json_encode($bantuan_loop);

                $distribusi->AjaxSearch($_POST);
            }elseif ($param_val == 'ajax_add_bant') {
                $distribusi->AjaxAddBant($_POST);
            
            }elseif ($param_val == 'ajax_insert') {
                $distribusi->AjaxInsert($_POST);
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
