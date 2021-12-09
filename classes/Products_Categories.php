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
        // $query = "SELECT * FROM products where com_id = '$com_id' ORDER BY `products`.`category` ASC";
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
        // $query = "SELECT DISTINCT (category) FROM products  where com_id = '$com_id'";
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
        // $query = "SELECT DISTINCT (category) FROM products  where com_id = '$com_id'";
        $query = "SELECT * FROM products where com_id = '$com_id' ORDER BY `products`.`id` desc limit 8";
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

    
}