<?php 
    include "function.php";
    // include "./config/Helper.php";
    include "./models/Model.php";

    class User {
        function __construct(){
         
            $model = new Model();
            return;
        }

        public function Model(){
            $model = new Model();
            return $model;
        }

        public function Post($request){
            $sql = `INSERT INTO MyGuests (firstname, lastname, email)
            VALUES ('John', 'Doe', 'john@example.com')`;
            $this->Model->Execute($sql);
            echo Redirect("http://localhost/pengaduan-bpbd/?user=user", "Data Berhasil Di Tambah");
        }
    }