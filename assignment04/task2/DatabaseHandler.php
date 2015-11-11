<?php

class DatabaseHandler{
    
    var $connection;
    
    function safeUser($user, $password){
        $this->connect();
        if(!mysqli_query($this->connection, "Insert into users (user, password) values('$user','$password')")){
            print_r(mysqli_error_list($this->connection));
        }
        mysqli_commit($this->connection);
        $this->disconnect();
    }
    
    function connect(){
        $user = "lmu";
        $password = "lmu_pw";
        $database = "mmn_lmu";
        $this->connection = mysqli_connect("localhost","lmu","lmu_pw","mmn_lmu");
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    
    function disconnect(){
        mysqli_close($this->connection);
    }
    
    
    
}



?>