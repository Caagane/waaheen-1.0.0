<?php
include_once('DB_conn.php');
 
class Users extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    // Companies in Local Area
    public function localCompanies($city,$country,$userid)
    {
        $city = $this->con->real_escape_string($city);
        $country = $this->con->real_escape_string($country);
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `users` WHERE type='company' AND city='$city' AND id!='$userid' ORDER BY `users`.`id` desc limit 6";
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
    
    // Trending Companies
    public function trendingCompanies($city,$country,$userid)
    {
        $city = $this->con->real_escape_string($city);
        $country = $this->con->real_escape_string($country);
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `users` WHERE id!='$userid' AND type='company' AND (city='$city' or country='$country') ORDER BY `users`.`id` desc limit 50";
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

    // Switching to Business Account
    public function SwitchReq($user_id,$role,$role_desc,$delivery,$delivery_desc,$address)
    {
        $user_id = $this->con->real_escape_string($user_id);
        $role = $this->con->real_escape_string($role);
        $role_desc = $this->con->real_escape_string($role_desc);
        $delivery = $this->con->real_escape_string($delivery);
        $delivery_desc = $this->con->real_escape_string($delivery_desc);
        $address = $this->con->real_escape_string($address);
        
        $start_date=date('Y-m-d'); 
        $date = strtotime($start_date);
        $date = strtotime("+7 day", $date);
        $period = date('Y/m/d', $date);
        $query = "UPDATE `users` SET subscription_period='$period' where id='$user_id'";
        $result = $this->con->query($query);

        $query = "INSERT INTO `com_info` (com_id, role, role_desc, is_delivery, delivery_desc, address) VALUES ('$user_id','$role','$role_desc','$delivery','$delivery_desc','$address')";
        $sql = $this->con->query($query);
        $query1 = "UPDATE users SET type='company' WHERE id='$user_id'";
        $sql1 = $this->con->query($query1);
    }

    // Basic Plan Subscription
    public function basicPlan($user_id, $basic_period_time, $basic_send_to, $basic_send_from, $basic_plan)
    {
        $user_id = $this->con->real_escape_string($user_id);
        $basic_period_time = $this->con->real_escape_string($basic_period_time);
        $basic_send_to = $this->con->real_escape_string($basic_send_to);
        $basic_send_from = $this->con->real_escape_string($basic_send_from);
        $basic_plan = $this->con->real_escape_string($basic_plan);

        $query = "INSERT INTO `subscription` (com_id, plan, period, send_from, send_to, is_accepted) VALUES ('$user_id','$basic_plan','$basic_period_time','$basic_send_from','$basic_send_to','no')";
        $sql = $this->con->query($query);
        $query1 = "UPDATE users SET type='company' WHERE id='$user_id'";
        $sql1 = $this->con->query($query1);
    }
    // Pro Plan Subscription
    public function proPlan($user_id, $pro_period_time, $pro_send_to, $pro_send_from, $pro_plan)
    {
        $user_id = $this->con->real_escape_string($user_id);
        $pro_period_time = $this->con->real_escape_string($pro_period_time);
        $pro_send_to = $this->con->real_escape_string($pro_send_to);
        $pro_send_from = $this->con->real_escape_string($pro_send_from);
        $pro_plan = $this->con->real_escape_string($pro_plan);

        $query = "INSERT INTO `subscription` (com_id, plan, period, send_from, send_to, is_accepted) VALUES ('$user_id','$pro_plan','$pro_period_time','$pro_send_from','$pro_send_to','no')";
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
        
        // get client notification id 
        $query0 = "SELECT * FROM `clients` where com_id='$profile_id' and client_id='$userid'";
        $result = $this->con->query($query0);
        // if user becomes unclient then delte the notification 
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $noti_id = $row['id'];
            $query1 = "DELETE FROM notifications WHERE noti_id='$noti_id'";
            $sql1 = $this->con->query($query1);
        }

        // unClient
        $query = "DELETE FROM clients WHERE com_id='$profile_id' AND client_id='$userid'";
        $sql = $this->con->query($query);
    }

    // chaters
    public function displayChaters($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT distinct(sender),(reciever) FROM messages WHERE sender!='$userid'AND reciever='$userid'";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $chatersId = $row['sender'];
                $query1 = "SELECT distinct(id),(f_name),(l_name),(image),(type) FROM users WHERE id='$chatersId'";
                $sql = $this->con->query($query1);
                $row1 = $sql->fetch_array();
                // return $row['id'];
                $data[] = $row1;
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
        $query = "SELECT * FROM `messages` WHERE sender='$userid' AND reciever='$chaterid' OR sender='$chaterid' AND reciever='$userid' order by id asc";
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
    // MSG From
    public function msg_from($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `users` WHERE id='$userid'";
        $result = $this->con->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            return $row['type'];
        }
    }

    // sending mesage
    public function sendmsg($userid,$chaterid,$message,$msg_from)
    {
        $userid = $this->con->real_escape_string($userid);
        $chaterid = $this->con->real_escape_string($chaterid);
        $message = $this->con->real_escape_string($message);
        $msg_from = $this->con->real_escape_string($msg_from);
        $query = "INSERT INTO `messages` (sender, reciever, `message`,msg_from) VALUES ('$userid','$chaterid','$message','$msg_from')";
        $sql = $this->con->query($query);
    }

    // load all notifications
    public function am_i_clent($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `clients` WHERE client_id='$userid'";
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
    // all user's products
    public function myProducts($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `products` WHERE com_id='$userid'";
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
    // new products
    public function newProduct($userid,$com_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $com_id = $this->con->real_escape_string($com_id);
        $query = "SELECT * FROM `products` WHERE products.com_id='$com_id'";
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
    // new clients
    public function newClient($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `clients` WHERE clients.com_id='$userid'";
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
    // new Likes
    public function newLike($userid,$p_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $p_id = $this->con->real_escape_string($p_id);
        $query = "SELECT * FROM `products_likes` WHERE products_likes.p_id='$p_id' and `user_id`!='$userid'";
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
    // Add new notification
    public function addNotification($userid,$noti_id,$date,$type)
    {
        $userid = $this->con->real_escape_string($userid);
        $noti_id = $this->con->real_escape_string($noti_id);
        $date = $this->con->real_escape_string($date);
        $type = $this->con->real_escape_string($type);
        $query = "SELECT * FROM `notifications` WHERE noti_id = '$noti_id' AND my_id='$userid'";
        $sql = $this->con->query($query);
        // check if notification already exist or not
        // if is not exist then insert it into notifications table
        if($sql->num_rows > 0){
            return false;
        }
        else{
            $query="INSERT INTO `notifications` (my_id, noti_id, noti_type, `view`,create_at) VALUES ('$userid','$noti_id','$type','no','$date')";
            $sql = $this->con->query($query);
            return true;
        }
    }
    // count all notifications
    public function countNotifications($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM `notifications` WHERE my_id='$userid' AND view='no'";
        $result = $this->con->query($query);
        
        if ($result->num_rows >= 1) {
            return $result->num_rows;
        }else if($result->num_rows == 0){
            return false;
        }
    }

    // change notifications state Read = 0 to read = 1
    public function viewNotifications($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $userid = $this->con->real_escape_string($userid);
        $query = "UPDATE `notifications` SET view = 'yes' WHERE my_id='$userid' AND view='no'";
        $result = $this->con->query($query);
        
        if ($result->num_rows >= 1) {
            return $result->num_rows;
        }else if($result->num_rows == 0){
            return false;
        }
    }

    
    // notifications
    public function fetchNotifications($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM notifications WHERE my_id='$userid' ORDER BY `create_at` DESC LIMIT 225";
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

    public function productNoti($noti_id)
    {
        $noti_id = $this->con->real_escape_string($noti_id);
        $query = "SELECT * FROM products,users WHERE products.id='$noti_id' and products.com_id=users.id";
        $result = $this->con->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            return $row;
        }
        else{
            return false;
        }
    }
    public function likeNoti($noti_id)
    {
        $noti_id = $this->con->real_escape_string($noti_id);
        $query = "SELECT 
        products_likes.id,
        products_likes.user_id,
        users.f_name,
        users.id,
        users.l_name,
        products.p_name
        FROM products_likes,products,users WHERE products_likes.id='$noti_id' and products_likes.user_id=users.id and products_likes.p_id=products.id";
        $result = $this->con->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            return $row;
        }
        else{
            return false;
        }
    }
    public function clientNoti($noti_id)
    {
        $noti_id = $this->con->real_escape_string($noti_id);
        $query = "SELECT * FROM clients,users WHERE clients.id='$noti_id' and clients.client_id=users.id";
        $result = $this->con->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            return $row;
        }
        else{
            return false;
        }
    }


}