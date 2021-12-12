<?php
include_once('DB_conn.php');
 
class Signin_Signup extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    public function sign_up($first_name,$last_name,$email,$pass,$country,$city,$phone){
        
        $first_name = $this->con->real_escape_string($first_name);
        $last_name = $this->con->real_escape_string($last_name);
        $email = $this->con->real_escape_string($email);
        $pass = $this->con->real_escape_string($pass);
        $country = $this->con->real_escape_string($country);
        $city = $this->con->real_escape_string($city);
        $phone = $this->con->real_escape_string($phone);

        $query = "SELECT * FROM users WHERE email = '$email'";
        $sql = $this->con->query($query);

        if($sql->num_rows > 0){
            return false;
        }
        else{
            $query="INSERT INTO users(f_name,l_name,email,password,country,city,phone,login_type) VALUES('$first_name','$last_name','$email','$pass','$country','$city','$phone','email')";
            $sql = $this->con->query($query);
            return true;
        }
    }
    
    public function check_login($email, $password){

        $email = $this->con->real_escape_string($email);
        $password = $this->con->real_escape_string($password);
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $sql = $this->con->query($query);

        if($sql->num_rows > 0){
            $row = $sql->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
        
    public function details($sql){

        $sql = $this->con->query($query);
        
        $row = $sql->fetch_array();
            
        return $row;       
    }
    
    public function escape_string($value){
        
        return $this->connection->real_escape_string($value);
    }
}