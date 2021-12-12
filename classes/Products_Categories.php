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
        $query = "SELECT * FROM products where category = '$categories' and com_id = '$com_id' ORDER BY `products`.`id` desc";
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
    public function localProducts()
    {
        // $com_id = $this->con->real_escape_string($com_id);
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
        FROM products, users WHERE products.com_id=users.id ORDER BY `products`.`id` DESC limit 8";
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
    public function search_products($search,$dist)
    {
        $search = $this->con->real_escape_string($search);
        $query = "SELECT * FROM `products` left join users on products.com_id=users.id WHERE f_name LIKE '%".$search."%' OR l_name LIKE '%".$search."%' OR p_name LIKE '%".$search."%' OR p_desc LIKE '%".$search."%'  OR category LIKE '%".$search."%' ORDER BY `products`.`id` desc";
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
    // add order
    public function addTheOrder($userid,$product_id,$quantity)
    {
        $userid = $this->con->real_escape_string($userid);
        $product_id = $this->con->real_escape_string($product_id);
        $quantity = $this->con->real_escape_string($quantity);
        $query = "INSERT INTO `carts` (p_id, client_id, quantity) VALUES ('$product_id','$userid','$quantity')";
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



}