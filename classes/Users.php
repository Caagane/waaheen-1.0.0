<?php
include_once('DB_conn.php');
 
class Users extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    // Companies in Local Area
    public function localCompanies()
    {
        // $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `users` WHERE type='company' ORDER BY `users`.`id` desc limit 6";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            echo "No Result Founded!";
            return false;
        }
    }


}