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


    // Switching to Business Account
    public function SwitchReq($user_id,$role,$role_desc,$delivery,$delivery_desc,$address)
    {
        $user_id = $this->con->real_escape_string($user_id);
        $role = $this->con->real_escape_string($role);
        $role_desc = $this->con->real_escape_string($role_desc);
        $delivery = $this->con->real_escape_string($delivery);
        $delivery_desc = $this->con->real_escape_string($delivery_desc);
        $address = $this->con->real_escape_string($address);
        $query = "INSERT INTO `com_info` (com_id, role, role_desc, is_delivery, delivery_desc, address) VALUES ('$user_id','$role','$role_desc','$delivery','$delivery_desc','$address')";
        $sql = $this->con->query($query);
        $query1 = "UPDATE users SET type='company' WHERE id='$user_id'";
        $sql1 = $this->con->query($query1);
    }



    // All Company info on profile page

    // Full Info
    public function comInfo($profile_id)
    {
        $profile_id = $this->con->real_escape_string($profile_id);
        $query = "SELECT * FROM `users` left join com_info on users.id = com_info.com_id WHERE users.id='$profile_id' limit 1";
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
    // all products Categories
    public function comCategories($profile_id)
    {
        $profile_id = $this->con->real_escape_string($profile_id);
        $query = "SELECT DISTINCT (category) FROM products  where com_id = '$profile_id' ORDER BY `products`.`category` ASC";
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
    // All Products
    public function comAllProducts($profile_id)
    {
        $profile_id = $this->con->real_escape_string($profile_id);
        $query = "SELECT products.id, 
        products.com_id, 
        products.p_name, 
        products.p_desc, 
        products.p_price, 
        products.p_img, 
        products.category, 
        users.f_name, 
        users.l_name, 
        users.image 
        FROM products, users WHERE com_id='$profile_id' and products.com_id=users.id ORDER BY `products`.`id` DESC limit 25";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            return false;
        }
    }

    // fetch all carts
    public function fetchAllCarts($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT products.id, 
        products.com_id, 
        products.p_name, 
        products.p_desc, 
        products.p_price, 
        products.p_img, 
        products.category, 
        users.f_name, 
        users.l_name, 
        users.image, 
        carts.p_id, 
        carts.client_id
        FROM carts, products, users WHERE client_id='$userid' AND carts.p_id=products.id AND products.com_id=users.id ORDER BY `products`.`id` DESC limit 10";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            return false;
        }
    }


    // notifications
    public function fetchNotifications($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT products.id, 
        products.com_id, 
        products.p_name, 
        products.p_desc, 
        products.p_price, 
        products.p_img, 
        products.category, 
        users.f_name, 
        users.l_name, 
        users.image, 
        carts.p_id, 
        carts.client_id
        FROM carts, products, users WHERE products.com_id='$userid' AND products.id=carts.p_id AND carts.client_id=users.id ORDER BY `products`.`id` DESC limit 10";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            return false;
        }
    }


    // display if follow product or not
    public function displayClientResult($userid,$profile_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $profile_id = $this->con->real_escape_string($profile_id);
        $query = "SELECT * FROM `clients` where com_id='$profile_id' and client_id='$userid'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            return true;
        }else if($result->num_rows < 1){
            return false;
        }
    }
    // add follow
    public function addTheClient($userid,$profile_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $profile_id = $this->con->real_escape_string($profile_id);
        $query = "INSERT INTO `clients` (client_id, com_id) VALUES ('$userid','$profile_id')";
        $sql = $this->con->query($query);
    }
    // delete follow
    public function deleteTheClient($userid,$profile_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $profile_id = $this->con->real_escape_string($profile_id);
        $query = "DELETE FROM clients WHERE com_id='$profile_id' AND client_id='$userid'";
        $sql = $this->con->query($query);
    }


    // chaters
    public function displayChaters($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT 
        DISTINCT(messages.sender),(messages.reciever),(messages.create_at),(users.id),(users.image),(users.f_name),(users.type)
        FROM messages, users WHERE messages.sender!='$userid'AND messages.reciever='$userid' AND messages.sender=users.id ORDER BY `messages`.`create_at` DESC ";
        // $sql = $this->con->query($query);
        // $row = $sql->fetch_array();
        // $theUserId = $row['id'];
        // $query = "SELECT * FROM messages left join users on messages.reciever=users.id WHERE reciever='$userid' limit 225";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            return false;
        }
    }
    // fetch all msgs
    public function displayChating($userid,$chaterid)
    {
        $userid = $this->con->real_escape_string($userid);
        $chaterid = $this->con->real_escape_string($chaterid);
        $query = "SELECT * FROM `messages` order by create_at desc";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            return false;
        }
    }
}