<?php 
class Model {
    public function Db(){
        $koneksi = mysqli_connect("localhost","root","","pengaduan-bpbd");
        return $koneksi;
    }
    
    public function Execute($sql){
        mysqli_query($this->Db(), $sql);
    }
}