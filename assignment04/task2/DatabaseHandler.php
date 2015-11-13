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
    
    function safeNewNote($userId,$text){
        $this->connect();
        if(!mysqli_query($this->connection, "Insert into notes (user_id, note) values('$userId','$text')")){
            print_r(mysqli_error_list($this->connection));
        }
        mysqli_commit($this->connection);
        $this->disconnect();
    }
    
    function getPasswordOfUser($user){
        $this->connect();
        $result;
        if($result = mysqli_query($this->connection, "select password from users where user='$user'")){
            $row=mysqli_fetch_assoc($result);
            $result = $row['password'];
        }else{
            $result="Error in getting user in database";
        }
        $this->disconnect();
        return $result;
    }
    
    function getIdOfUser($user){
        $this->connect();
        $result;
        if($result = mysqli_query($this->connection, "select id from users where user='$user'")){
            $row=mysqli_fetch_assoc($result);
            $result = $row['id'];
        }else{
            $result="Error in getting user in database";
        }
        $this->disconnect();
        return $result;
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