<?php 
class Model {
    public function db(){
        $servername = "localhost";
        $username = "";
        $password = "root";
        $dbname = "pengaduan_bpbd";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    
    public function Execute($sql){
        // $sql = `INSERT INTO MyGuests (firstname, lastname, email)
        // VALUES ('John', 'Doe', 'john@example.com')`;

        $this->db->query($sql);
        if ($this->db->query($sql) !== TRUE) {
            echo "New record created successfully";
        }
        $this->db->close();
    }
}