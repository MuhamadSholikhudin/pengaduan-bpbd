<?php 
// echo $_SERVER['SERVER_NAME'];
// echo "</br>";
// echo $_SERVER['SERVER_NAME'];
// echo "</br>";
// echo $_SERVER['QUERY_STRING'];
// echo "</br>";

include "config/config.php";
$conf = new Config();
$url = $conf->UrlWeb();

$request = $_SERVER['REQUEST_URI'];

$param_key = array_keys($_GET)[0];
$param_val = $_GET[array_keys($_GET)[0]];

switch ($param_key) {
    case 'kepala_bpbd' :
        if($param_val == "index"){
            $conf->TemplateAdmin("views/kepala_bpbd/index.php");
        }elseif($param_val == "user"){
            $conf->TemplateAdmin("views/users/user.php");
        }elseif($param_val == "user_add"){
            $conf->TemplateAdmin("views/users/user_add.php");
        }else{

        }
        break;
    case 'masyarakat' :
        require __DIR__ . '/views/index.php';
        break;




    case 'petugas_kajian' :
        require __DIR__ . '/views/about.php';
        break;



    case 'petugas_logistik' :
        require __DIR__ . '/views/about.php';
        break;


    case 'pages' :
        if($param_val == "crud"){
            $conf->TemplateAdmin("views/partials/content.php");
        }else{

        }





        break;



    default:
        // http_response_code(404);
        // require __DIR__ . '/views/404.php';
        require __DIR__ . '/views/login.php';

        break;
}
