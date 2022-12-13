<?php 

include "./models/Model.php";
$model = new Model();


class User {
    public function Model(){
        include "../models/Model.php";
        $model = new Model();
        return $model;
    }

    public function Post($request){
        var_dump($request);
        $sql = `INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')`;
        // $this->Model()->Execute($sql);
        
    }
}