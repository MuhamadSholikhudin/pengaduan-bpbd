<?php 
    include "config/config.php";
    $conf = new Config();
    $url = $conf->UrlWeb();


    include "controllers/User.php";
    $user = new User();

    $request = $_SERVER['REQUEST_URI'];

if($_GET){
    $param_key = array_keys($_GET)[0];
    $param_val = $_GET[array_keys($_GET)[0]];

    switch ($param_key) {
        case 'kepala_bpbd' :
    
            // USER
            require __DIR__ . '/routes/User.php';
    
    
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

}else{
    $conf->TemplateAdmin("views/partials/content.php");

}

