<?php 

class Config {
    public function UrlWeb(){
        $url = "http://localhost/pengaduan-bpbd";
        return $url;
    }

    public function TemplateAdmin($page){
        $url = $this->UrlWeb();
        include "views/partials/_header.php";
        include "views/partials/_navbar.php";
        include "views/partials/_sidebar.php";
        // include "views/partials/content.php";
    
        include $page;
        include "views/partials/_footer.php";
    }
}