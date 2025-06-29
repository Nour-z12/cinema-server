<?php

class User{
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }


    public function register_user($name, $email, $mobile, $password_hash){

        if(empty($email) && !empty($mobile)){
            $sql = "INSERT INTO users (name, email, mobile, password_hash, social_provider, social_id) VALUES ('$name', NULL, '$mobile', '$password_hash', NULL, NULL)";  
            return $this->conn->query($sql);
        }else if(!empty($email) && empty($mobile)){
            $sql = "INSERT INTO users (name, email, mobile, password_hash, social_provider, social_id) VALUES ('$name', '$email', NULL, '$password_hash', NULL, NULL)";  
            return $this->conn->query($sql);
        }else if(!empty($email) && !empty($mobile)){
            $sql = "INSERT INTO users (name, email, mobile, password_hash, social_provider, social_id) VALUES ('$name', '$email', $mobile, '$password_hash', NULL, NULL)";  
            return $this->conn->query($sql);
        }else if(empty($email) && empty($mobile)){
            return "You need an email or mobile to sign up";
        }
    }

    public function Login_user($email, $mobile){
        if(empty($email) && !empty($mobile)){
            $sql = "SELECT * FROM users WHERE mobile = '$mobile'";
            return $this->conn->query($sql);
        }else if(!empty($email) && empty($mobile)){
            $sql = "SELECT * FROM users WHERE email = '$email'";
            return $this->conn->query($sql);
        }else if(empty($email) && empty($mobile)){
            return "You need an email or phone number to sign up you cant not provide both";
        }
    }
}