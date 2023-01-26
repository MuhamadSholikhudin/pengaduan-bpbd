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
        include $page;
        include "views/partials/_footer.php";
    }

    public function TemplatePages($page){
        $url = $this->UrlWeb();
        include "views/pages/templates/header.php";
        include "views/pages/templates/navbar.php";
        include "views/pages/templates/breadcrumb.php";
        include $page;
        include "views/pages/templates/footer.php";
    }
}