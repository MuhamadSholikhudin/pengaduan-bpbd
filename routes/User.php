<?php 

if($param_val == "index"){
    $conf->TemplateAdmin("views/kepala_bpbd/index.php");
}elseif($param_val == "user"){
    $conf->TemplateAdmin("views/users/user.php");
}elseif($param_val == "user_add"){
    $conf->TemplateAdmin("views/users/user_add.php");
}elseif($param_val == "user_post"){
    $user->Post($_POST);
    // var_dump($_POST);
}