<?php
include_once('DB_conn.php');
 
class Products_Categories extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    // Add Category
    public function insert_product($p_name, $p_desc,$p_price,$imageFullName,$category,$com_id){
        $p_name = $this->con->real_escape_string($p_name);
        $p_desc = $this->con->real_escape_string($p_desc);
        $p_price = $this->con->real_escape_string($p_price);
        $imageFullName = $this->con->real_escape_string($imageFullName);
        $com_id = $this->con->real_escape_string($com_id);

        $query = "SELECT * FROM products WHERE p_name = '$p_name' AND  com_id = '$com_id'";
        $sql = $this->con->query($query);

        if($sql->num_rows > 0){
            return false;
        }
        else{
            $query="INSERT INTO products(com_id,p_name,p_desc,p_price,p_img,category) VALUES('$com_id','$p_name','$p_desc','$p_price','$imageFullName','$category')";
            $sql = $this->con->query($query);
            return true;
        }
    }


    // Updating Products
    public function updateProduct($product_id, $e_p_name, $e_p_desc,$e_p_price,$e_category)
    {
        $product_id = $this->con->real_escape_string($product_id);
        $e_p_name = $this->con->real_escape_string($e_p_name);
        $e_p_desc = $this->con->real_escape_string($e_p_desc);
        $e_p_price = $this->con->real_escape_string($e_p_price);
        $e_category = $this->con->real_escape_string($e_category);
        $query = "UPDATE products SET p_name='$e_p_name', p_desc='$e_p_desc',p_price='$e_p_price', category='$e_category' WHERE id='$product_id'";
        $sql = $this->con->query($query);
         
    }


    // Delete Product
    public function deleteProduct($product_id)
    {
        $product_id = $this->con->real_escape_string($product_id);
        $query = "DELETE FROM products WHERE id='$product_id'";
        $sql = $this->con->query($query);
    }

    // Fetch Categories
    public function display_categories($com_id)
    {
        $com_id = $this->con->real_escape_string($com_id);
        $query = "SELECT DISTINCT (category) FROM products  where com_id = '$com_id' ORDER BY `products`.`category` ASC";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            echo "There is No Category!";
        }
    }

	// Fetch evry Category's Product in Dashboad
    public function display_categories_products($categories,$com_id)
    {
        $categories = $this->con->real_escape_string($categories);
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
        FROM products, users WHERE category = '$categories' and com_id = '$com_id' and products.com_id=users.id ORDER BY `products`.`id` desc limit 25";
        // $query = "SELECT * FROM products, users where category = '$categories' and com_id = '$com_id' and products.com_id=users.id ORDER BY `products`.`id` desc";
        $result = $this->con->query($query);
        if ($result->num_rows >= 1) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else if($result->num_rows == 0){
            echo "There is No Product!, Add one!";
        }
    }

    // Fetch last 8 products in Dashboard
    public function lastProducts($com_id)
    {
        $com_id = $this->con->real_escape_string($com_id);
        $query = "SELECT * FROM products where com_id = '$com_id' ORDER BY `products`.`id` desc limit 8";
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

    // All Peoducts in Local Area
    public function localProducts($city,$country)
    {
        $city = $this->con->real_escape_string($city);
        $country = $this->con->real_escape_string($country);

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
        users.city,
        users.country
        FROM products, users WHERE products.com_id=users.id AND (city='$city') ORDER BY `products`.`id` DESC limit 12";
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

    // related products in product details page
    public function relatedProducts($com_id,$productCategory,$product_id)
    {
        $com_id = $this->con->real_escape_string($com_id);
        $productCategory = $this->con->real_escape_string($productCategory);
        $product_id = $this->con->real_escape_string($product_id);
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
        FROM products, users WHERE products.id!='$product_id' and category='$productCategory' and com_id='$com_id' and products.com_id=users.id ORDER BY `products`.`id` DESC limit 4";
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

    // Search Products 
    public function search_products($search,$city,$country)
    {
        $search = $this->con->real_escape_string($search);
        $councitytry = $this->con->real_escape_string($city);
        $country = $this->con->real_escape_string($country);
        
        $query = "SELECT * FROM `users` left join products on products.com_id=users.id WHERE p_name LIKE '%$search%' OR p_desc LIKE '%$search%' OR category LIKE '%$search%' ORDER BY `products`.`id` desc LIMIT 16";
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

    
    // display if orded product or not
    public function displayOrderResult($userid,$product_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $query = "SELECT * FROM `carts` where p_id='$product_id' and client_id='$userid'";
        $result = $this->con->query($query);
        if ($result->num_rows == 1) {
            return true;
        }else if($result->num_rows == 0){
            return false;
        }
    }
    // product visitors counter
    public function visitCounter($userid,$product_id,$com_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $com_id = $this->con->real_escape_string($com_id);
        $query = "INSERT INTO `visitors` (p_id, client_id, com_id) VALUES ('$product_id','$userid','$com_id')";
        $sql = $this->con->query($query);
    }
    // add order
    public function addTheOrder($userid,$product_id,$quantity)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $quantity = $this->con->real_escape_string($quantity);
        $query = "INSERT INTO `carts` (p_id, client_id, quantity,is_complete) VALUES ('$product_id','$userid','$quantity','no')";
        $sql = $this->con->query($query);
    }
    // delete order
    public function deleteTheOrder($userid,$product_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $query = "DELETE FROM carts WHERE p_id='$product_id' AND client_id='$userid'";
        $sql = $this->con->query($query);

    }
    

    // display Likes result
    public function displayLikesResult($userid,$product_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $query = "SELECT * FROM `products_likes` where p_id='$product_id' and `user_id`='$userid'";
        $result = $this->con->query($query);
        if ($result->num_rows == 1) {
            echo true;
        }else if($result->num_rows == 0){
            return false;
        }
    }
    // Product like counter
    public function ProductLikesCounter($product_id)
    {
        $product_id = $this->con->real_escape_string($product_id);
        $query = "SELECT * FROM `products_likes` where p_id='$product_id'";
        $result = $this->con->query($query);
        echo $result->num_rows;
    }
    // products visitors counter
    public function ProductVisitorsCounter($product_id)
    {
        $product_id = $this->con->real_escape_string($product_id);
        $query = "SELECT * FROM `visitors` where p_id='$product_id'";
        $result = $this->con->query($query);
        echo $result->num_rows;
    }
    // add product like
    public function addProductLike($userid,$product_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $query = "INSERT INTO `products_likes` (p_id, `user_id`) VALUES ('$product_id','$userid')";
        $sql = $this->con->query($query);
    }
    // delete product like
    public function deleteProductLike($userid,$product_id)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $query = "DELETE FROM products_likes WHERE p_id='$product_id' AND `user_id`='$userid'";
        $sql = $this->con->query($query);

    }

    // categories counter in dashboard
    public function categoryCounter($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT DISTINCT (category) FROM products  where com_id = '$userid' ORDER BY `products`.`category` ASC";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // Products Counter in dashboard
    public function productCounter($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM products  where com_id = '$userid' ORDER BY `products`.`category` ASC";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // Posts Counter in dashboard
    public function postsCounter($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM posts  where `user_id` = '$userid' ORDER BY `posts`.`user_id` ASC";
        $result = $this->con->query($query);
        return $result->num_rows;
    }

    // total visitors 
    public function totalVisitors($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT * FROM visitors  where `com_id` = '$userid' ORDER BY `visitors`.`id` ASC";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // male Visitors
    public function maleVisitors($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT visitors.com_id, 
        visitors.p_id, 
        visitors.client_id,
        users.id, 
        users.gender
        FROM visitors, users  where visitors.`com_id`='$userid' AND visitors.client_id=users.id AND gender='male'";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // female visitors
    public function femaleVisitors($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT visitors.com_id, 
        visitors.p_id, 
        visitors.client_id,
        users.id, 
        users.gender
        FROM visitors, users  where `com_id` = '$userid' AND visitors.client_id=users.id AND gender = 'female'";
        $result = $this->con->query($query);
        return $result->num_rows;
    }

    // total order conteter
    public function totalOrder($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT carts.p_id, 
        carts.is_complete, 
        products.id,
        products.com_id
        FROM carts, products  where `com_id` = '$userid' AND products.id=carts.p_id";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // completed orders
    public function completed($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT carts.p_id, 
        carts.is_complete, 
        products.id,
        products.com_id
        FROM carts, products  where `com_id` = '$userid' AND products.id=carts.p_id AND is_complete='yes'";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // not completed orders
    public function notCompleted($userid)
    {
        $userid = $this->con->real_escape_string($userid);
        $query = "SELECT carts.p_id, 
        carts.is_complete, 
        products.id,
        products.com_id
        FROM carts, products  where `com_id` = '$userid' AND products.id=carts.p_id AND is_complete!='yes'";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // filter Orders 
    public function filterTotalOrder($userid,$orderFrom,$orderTo)
    {
        $userid = $this->con->real_escape_string($userid);
        $orderFrom = $this->con->real_escape_string($orderFrom);
        $orderTo = $this->con->real_escape_string($orderTo);

        $date1 = date('Y-m-d', strtotime($orderFrom));
        $date2 = date('Y-m-d', strtotime($orderTo));



        $query = "SELECT carts.p_id, 
        carts.is_complete, 
        products.id,
        products.com_id,
        carts.create_at
        FROM carts, products  where `com_id`='$userid' AND (carts.create_at BETWEEN '$date1' AND '$date2') AND products.id=carts.p_id";
        $result = $this->con->query($query);
        return $result->num_rows;

        // if ($result->num_rows > 0) {
        //     return $orderFrom;
        // } else {
        //     return $orderFrom;
        // }
    }
    // completed orders
    public function filterCompleted($userid,$orderFrom,$orderTo)
    {
        $userid = $this->con->real_escape_string($userid);
        $orderFrom = $this->con->real_escape_string($orderFrom);
        $orderTo = $this->con->real_escape_string($orderTo);

        $date1 = date('Y-m-d', strtotime($orderFrom));
        $date2 = date('Y-m-d', strtotime($orderTo));
        
        $query = "SELECT carts.p_id, 
        carts.is_complete, 
        products.id,
        products.com_id,
        carts.create_at
        FROM carts, products  where `com_id` = '$userid' AND (carts.create_at BETWEEN '$date1' AND '$date2') AND products.id=carts.p_id AND is_complete='yes'";
        $result = $this->con->query($query);
        return $result->num_rows;
    }
    // not completed orders
    public function filterNotCompleted($userid,$orderFrom,$orderTo)
    {
        $userid = $this->con->real_escape_string($userid);
        $orderFrom = $this->con->real_escape_string($orderFrom);
        $orderTo = $this->con->real_escape_string($orderTo);
        
        $date1 = date('Y-m-d', strtotime($orderFrom));
        $date2 = date('Y-m-d', strtotime($orderTo));
        
        $query = "SELECT carts.p_id, 
        carts.is_complete, 
        products.id,
        products.com_id,
        carts.create_at
        FROM carts, products  where `com_id` = '$userid' AND (carts.create_at BETWEEN '$date1' AND '$date2') AND products.id=carts.p_id AND is_complete!='yes'";
        $result = $this->con->query($query);
        return $result->num_rows;
    }

        // Filter total visitors 
        public function filterTotalVisitors($userid,$filterVisitorsFrom,$filterVisitorsTo)
        {
            $userid = $this->con->real_escape_string($userid);
            
            $filterVisitorsFrom = $this->con->real_escape_string($filterVisitorsFrom);
            $filterVisitorsTo = $this->con->real_escape_string($filterVisitorsTo);

            $date1 = date('Y-m-d', strtotime($filterVisitorsFrom));
            $date2 = date('Y-m-d', strtotime($filterVisitorsTo));

            $query = "SELECT * FROM visitors  where `com_id` = '$userid' AND (visitors.create_at BETWEEN '$date1' AND '$date2') ORDER BY `visitors`.`id` ASC";
            $result = $this->con->query($query);
            return $result->num_rows;
        }
        // Filter male Visitors
        public function filterMaleVisitors($userid,$filterVisitorsFrom,$filterVisitorsTo)
        {
            $userid = $this->con->real_escape_string($userid);

            $filterVisitorsFrom = $this->con->real_escape_string($filterVisitorsFrom);
            $filterVisitorsTo = $this->con->real_escape_string($filterVisitorsTo);

            $date1 = date('Y-m-d', strtotime($filterVisitorsFrom));
            $date2 = date('Y-m-d', strtotime($filterVisitorsTo));

            $query = "SELECT visitors.com_id, 
            visitors.p_id, 
            visitors.client_id,
            users.id, 
            users.gender
            FROM visitors, users  where visitors.`com_id`='$userid' AND (visitors.create_at BETWEEN '$date1' AND '$date2') AND visitors.client_id=users.id AND gender='male'";
            $result = $this->con->query($query);
            return $result->num_rows;
        }
        // Filter female visitors
        public function filterFemaleVisitors($userid,$filterVisitorsFrom,$filterVisitorsTo)
        {
            $userid = $this->con->real_escape_string($userid);
            
            $filterVisitorsFrom = $this->con->real_escape_string($filterVisitorsFrom);
            $filterVisitorsTo = $this->con->real_escape_string($filterVisitorsTo);

            $date1 = date('Y-m-d', strtotime($filterVisitorsFrom));
            $date2 = date('Y-m-d', strtotime($filterVisitorsTo));
            
            $query = "SELECT visitors.com_id, 
            visitors.p_id, 
            visitors.client_id,
            users.id, 
            users.gender
            FROM visitors, users  where `com_id` = '$userid' AND (visitors.create_at BETWEEN '$date1' AND '$date2') AND visitors.client_id=users.id AND gender = 'female'";
            $result = $this->con->query($query);
            return $result->num_rows;
        }

}