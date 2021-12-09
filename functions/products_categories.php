<?php
session_start();
	// Include database file
	include '../classes/Products_Categories.php';
	
	$Products_Categories_obj = new Products_Categories();
	
    // Add Category
	if(isset($_POST['p_name'])){

		function check_input($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		
		$p_name = check_input($_POST['p_name']);
		$p_desc = check_input($_POST['p_desc']);
		$p_price = check_input($_POST['p_price']);
		$category = check_input($_POST['category']);
		$com_id = check_input($_POST['com_id']);
	
		
		$file = $_FILES['p_img'];

		$fileName = $file["name"];
		$fileType = $file["type"];
		$fileTempName = $file["tmp_name"];
		$fileError = $file["error"];
		$fileSize = $file["size"];

		$fileExt = explode(".", $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array("jpg", "png", "jpeg", "gif");

		if (in_array($fileActualExt, $allowed)) {

			if ($fileError === 0) {
				if ($fileSize < 10000000) {

					$newFileName = "tumpnail";
					$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
					$fileDestination = "../img/products/" . $imageFullName;

					// object
					$p_checking = $Products_Categories_obj->insert_product($p_name, $p_desc,$p_price,$imageFullName,$category,$com_id);

					if(!$p_checking){
						echo 'This Product <span class="fw-bold p-1" style="text-decoration: underline;">'.$p_name.'</span> Already Exist';
					}
					else{
						move_uploaded_file($fileTempName, $fileDestination);
						echo 'Product Added Successfully';
					}
			
				}
				else {
				echo "Your Image Size is Too Big!";
				}
			}
			
			else {
				echo "You had an error!";
				exit();
			}
		}
    
	}


	// Updating Products
	if(isset($_POST['e_p_name'])) {
		$e_p_name=$_POST['e_p_name'];
		$e_p_desc=$_POST['e_p_desc'];
		$e_p_price=$_POST['e_p_price'];
		$e_category=$_POST['e_category'];
		$product_id=$_POST['product_id'];
		$updatPro = $Products_Categories_obj->updateProduct($product_id, $e_p_name, $e_p_desc,$e_p_price,$e_category);
	}


	// Delete Product
	if(isset($_POST['delete_product'])) {
		$product_id=$_POST['product_id'];
		$Products_Categories_obj->deleteProduct($product_id);
	}

	// Fetch All Categories into Select dropdown
	if(isset($_POST['fetchCategories'])){
		$com_id = $_POST['com_id'];
		$categories = $Products_Categories_obj->display_categories($com_id); 
		foreach ($categories as $category) {
			?>
			
			<option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?> </option>
			<?php
		}

	}

	// Fetch evry Category's Product in Dashboad
	if(isset($_POST['fetchCategorysProducts'])){
		$categories = $_POST['categories'];
		$com_id = $_POST['com_id'];
		$categorysProducts = $Products_Categories_obj->display_categories_products($categories,$com_id); 
		foreach ($categorysProducts as $categorysProduct) {
			?>
				<div class="col-md-3 col-sm-12 px-1">
                    <div class="border radius light-bg  text-dark p-4 product">
                        <div class="product-img" style="background-image: url('./img/asset/products.png')"></div>
                        <h5 class="mt-2"><?php echo $categorysProduct['p_name']; ?></h5>
                        <h6><?php echo $categorysProduct['p_price']; ?></h6>
						<div class="my-2">
							<button class="btn btn-warninng w-100 text-center">Order Noe</button>
						</div>
                    </div>
                </div>
			<?php
		}

	}

	// Last 8 products in Dashboard
	if(isset($_POST['lastProducts'])){
		$com_id = $_POST['com_id'];
		$categorysProducts = $Products_Categories_obj->lastProducts($com_id); 
		foreach ($categorysProducts as $categorysProduct) {
			?>
				<div class="col-md-3 col-sm-12 px-1">
                    <div class="border radius light-bg  text-dark p-4 product">
                        <div class="product-img" style="background-image: url('./img/asset/products.png')"></div>
                        <h5 class="mt-2" id="p_name<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['p_name']; ?></h5>
                        <h5 style="display:none" class="mt-2" id="p_desc<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['p_desc']; ?></h5>
                        <h5 style="display:none" class="mt-2" id="p_category<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['category']; ?></h5>
                        <h6 id="p_price<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['p_price']; ?></h6>
						<div class="my-2 d-flex">
							<button class="btn btn-warning w-100 text-center me-1 edit" data-id="<?php echo $categorysProduct['id']; ?>"> <i class="fa fa-sync"></i> Edit</button>
							<button class="btn btn-danger w-100 text-center ms-1 delete" data-id="<?php echo $categorysProduct['id']; ?>"> <i class="fa fa-trash"></i> Delete</button>
						</div>
                    </div>
                </div>
			<?php
		}

	}


	// Trending Products in Local Area
	if(isset($_POST['localProducts'])){
		$categories = $_POST['categories'];
		$categorysProducts = $Products_Categories_obj->localProducts($categories); 
		foreach ($categorysProducts as $categorysProduct) {
			?>
				<div class="col-md-3 col-sm-12 px-1">
                    <div class="border radius light-bg  text-dark p-4 product">
                        <div class="d-flex text-start">
                            <div class="img img-fluid" style="background-image: url('./img/profiles/<?php echo $categorysProduct['p_img']; ?>')"></div>
                            <div class="px-2 ">
                                <h6><?php echo $categorysProduct['p_name']; ?></h6>
                                <p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
                            </div>
                        </div>
                        <div class="product-img" style="background-image: url('./img/asset/products.png')"></div>
                        <h5 class="mt-2"><?php echo $categorysProduct['p_name']; ?></h5>
                        <h6><?php echo $categorysProduct['p_price']; ?></h6>
                        <button class="btn btn-primary custom-color w-100 text-center">Order Noe</button>
                    </div>
                </div>
			<?php
		}

	}
	

?>