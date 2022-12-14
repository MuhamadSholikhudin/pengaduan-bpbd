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
        case "user":
            // USER
            if($param_val == "user"){
                $conf->TemplateAdmin("views/users/user.php");
            }elseif($param_val == "add"){
                $conf->TemplateAdmin("views/users/user_add.php");
            }elseif($param_val == "edit"){
                $conf->TemplateAdmin("views/users/user_edit.php");
            }elseif($param_val == "post"){
                $user->Post($_POST);
            }

        case 'bantuan' :

            if($param_val == "bantuan"){
                $conf->TemplateAdmin("views/bantuan/bantuan.php");
            }elseif($param_val == "bantuan_add"){
                $conf->TemplateAdmin("views/bantuan/bantuan_add.php");
            }elseif($param_val == "bantuan_post"){
                $user->Post($_POST);
            }
    
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
    // $conf->TemplateAdmin("views/partials/content.php");

}

