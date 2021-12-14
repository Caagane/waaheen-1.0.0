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
		$userid = $_POST['userid'];
		$categorysProducts = $Products_Categories_obj->display_categories_products($categories,$com_id); 
		foreach ($categorysProducts as $categorysProduct) {
			?>
			<div class="col-md-3 col-sm-12 px-1">
				<div class="border radius light-bg  text-dark p-4 product">
						<div class="product-img" style="background-image: url('./img/products/<?php echo $categorysProduct['p_img']; ?>')"></div>
                        <h5 class="mt-2" id="p_name<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['p_name']; ?></h5>
                        <h5 style="display:none" class="mt-2" id="p_desc<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['p_desc']; ?></h5>
                        <h5 style="display:none" class="mt-2" id="p_category<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['category']; ?></h5>
                        <h6 id="p_price<?php echo $categorysProduct['id']; ?>"><?php echo $categorysProduct['p_price']; ?></h6>
					<?php
						if ($userid == $com_id) {
							?>
								<div class="my-2 d-flex">
									<button class="btn btn-warning w-100 text-center me-1 edit" data-id="<?php echo $categorysProduct['id']; ?>"> <i class="fa fa-sync"></i> Edit</button>
									<button class="btn btn-danger w-100 text-center ms-1 delete" data-id="<?php echo $categorysProduct['id']; ?>"> <i class="fa fa-trash"></i> Delete</button>
								</div>
							<?php
						} else {
							?>
								<a href="products-details.php?productid=<?php echo $categorysProduct['id']; ?>&com_id=<?php echo $categorysProduct['com_id']; ?>&com-f-name=<?php echo $categorysProduct['f_name']; ?>&com-l-name=<?php echo $categorysProduct['l_name']; ?>&product-name=<?php echo $categorysProduct['p_name']; ?>&product-price=<?php echo $categorysProduct['p_price']; ?>&product-desc=<?php echo $categorysProduct['p_desc']; ?>&product-img=<?php echo $categorysProduct['p_img']; ?>&category=<?php echo $categorysProduct['category']; ?>" class="btn btn-primary custom-color w-100 text-center">Order Now</a>
							<?php
						}
					?>
				</div>
			</div>
			<?php
		}

	}

	// Last 8 products in Dashboard
	if(isset($_POST['lastProducts'])){
		$com_id = $_POST['com_id'];
		$categorysProducts = $Products_Categories_obj->lastProducts($com_id); 
		if (!$categorysProducts) {
			?>
				<i class="fa fa-gift mt-5" style="font-size: 80px;"></i>
				<h3>There is No Product!, Add one!</h3>
			<?php
		} else {
			foreach ($categorysProducts as $categorysProduct) {
				?>
					<div class="col-md-3 col-sm-12 px-1">
						<div class="border radius light-bg  text-dark p-4 product">
							<div class="product-img" style="background-image: url('./img/products/<?php echo $categorysProduct['p_img']; ?>')"></div>
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

	}

	
	// Search Products in Search Page
	if(isset($_POST['SearchProduct'])){
		$search = $_POST['search'];
		$dist = $_POST['dist'];
		$SearchProducts = $Products_Categories_obj->search_products($search,$dist); 
		if ($SearchProducts) {
			foreach ($SearchProducts as $SearchProduct) {
				?>
					<div class="col-md-3 col-sm-12 px-1">
						<div class="border radius light-bg  text-dark p-4 product">
							<div class="d-flex text-start">
								<?php
									if ($SearchProduct['image'] == "") {
										?>
											<i class="fa fa-building mt-2 ms-2 me-2" style="font-size: 30px;"></i>
										<?php
									} else {
										?>
										<div class="img img-fluid" style="background-image: url('./img/profiles/<?php echo $SearchProduct['image']; ?>')"></div>
										<?php
									}
									?>
								<div class="px-2 ">
									<h6><?php echo $SearchProduct['f_name'].' '.$SearchProduct['l_name']; ?></h6>
									<p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
								</div>
							</div>
							<div class="product-img" style="background-image: url('./img/products/<?php echo $SearchProduct['p_img']; ?>')"></div>
							<h5 class="mt-2" id="p_name<?php echo $SearchProduct['id']; ?>"><?php echo $SearchProduct['p_name']; ?></h5>
							<h5 style="display:none" class="mt-2" id="p_desc<?php echo $SearchProduct['id']; ?>"><?php echo $SearchProduct['p_desc']; ?></h5>
							<h5 style="display:none" class="mt-2" id="p_category<?php echo $SearchProduct['id']; ?>"><?php echo $SearchProduct['category']; ?></h5>
							<h6 id="p_price<?php echo $SearchProduct['id']; ?>"><?php echo $SearchProduct['p_price']; ?></h6>
							<div class="my-2">
								<button class="btn btn-primary custom-color w-100 text-center">Order Now</button>
							</div>
						</div>
					</div>
				<?php
			}
		}

	}

	// Trending Products in Local Area
	if(isset($_POST['localProducts'])){
		// $categories = $_POST['categories'];
		$allLocalProducts = $Products_Categories_obj->localProducts(); 
		if (!$allLocalProducts) {
			?>
			<i class="fa fa-gifts" style="font-size:100px;"></i>
			<h3> There is no Products in Your Local Area !!!</h3>
			<?php
		} else{
			foreach ($allLocalProducts as $theLocalProduct) {
				?>
					<div class="col-md-3 col-sm-12 px-1">
						<div class="border radius light-bg  text-dark p-4 product">
							<div class="d-flex text-start">
								<?php
									if ($theLocalProduct['image'] == "") {
										?>
											<i class="fa fa-building mt-2 ms-2 me-2" style="font-size: 30px;"></i>
										<?php
									} else {
										?>
										<div class="img img-fluid" style="background-image: url('./img/profiles/<?php echo $theLocalProduct['image']; ?>')"></div>
										<?php
									}
								?>
								<div class="px-2 ">
									<h6><?php echo $theLocalProduct['f_name'].' '. $theLocalProduct['l_name']; ?></h6>
									<p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
								</div>
							</div>
							<div class="product-img" style="background-image: url('./img/products/<?php echo $theLocalProduct['p_img']; ?>')"></div>
							<h5 class="mt-2"><?php echo $theLocalProduct['p_name']; ?></h5>
							<h6><?php echo $theLocalProduct['p_price']; ?></h6>

							<a href="products-details.php?productid=<?php echo $theLocalProduct['id']; ?>&com_id=<?php echo $theLocalProduct['com_id']; ?>&com-f-name=<?php echo $theLocalProduct['f_name']; ?>&com-l-name=<?php echo $theLocalProduct['l_name']; ?>&product-name=<?php echo $theLocalProduct['p_name']; ?>&product-price=<?php echo $theLocalProduct['p_price']; ?>&product-desc=<?php echo $theLocalProduct['p_desc']; ?>&product-img=<?php echo $theLocalProduct['p_img']; ?>&category=<?php echo $theLocalProduct['category']; ?>" class="btn btn-primary custom-color w-100 text-center">Order Now</a>
						</div>
					</div>
				<?php
			}
		}
	}

	// related Products in Product details page
	if(isset($_POST['relatedProducts'])){
		$com_id = $_POST['com_id'];
		$productCategory = $_POST['productCategory'];
		$product_id = $_POST['product_id'];
		$relatedProducts = $Products_Categories_obj->relatedProducts($com_id,$productCategory,$product_id); 
		if (!$relatedProducts) {
			?>
			<i class="fa fa-gifts" style="font-size:100px;"></i>
			<h3> There is no Related Product !!!</h3>
			<?php
		} else{
			foreach ($relatedProducts as $theLocalProduct) {
				?>
					<div class="col-md-3 col-sm-12 px-1">
						<div class="border radius light-bg  text-dark p-4 product">
							<div class="d-flex text-start">
								<?php
									if ($theLocalProduct['image'] == "") {
										?>
											<i class="fa fa-building mt-2 ms-2 me-2" style="font-size: 30px;"></i>
										<?php
									} else {
										?>
										<div class="img img-fluid" style="background-image: url('./img/profiles/<?php echo $theLocalProduct['image']; ?>')"></div>
										<?php
									}
								?>
								<div class="px-2 ">
									<h6><?php echo $theLocalProduct['f_name'].' '. $theLocalProduct['l_name']; ?></h6>
									<p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
								</div>
							</div>
							<div class="product-img" style="background-image: url('./img/products/<?php echo $theLocalProduct['p_img']; ?>')"></div>
							<h5 class="mt-2"><?php echo $theLocalProduct['p_name']; ?></h5>
							<h6><?php echo $theLocalProduct['p_price']; ?></h6>

							<a href="products-details.php?productid=<?php echo $theLocalProduct['id']; ?>&com_id=<?php echo $theLocalProduct['com_id']; ?>&com-f-name=<?php echo $theLocalProduct['f_name']; ?>&com-l-name=<?php echo $theLocalProduct['l_name']; ?>&product-name=<?php echo $theLocalProduct['p_name']; ?>&product-price=<?php echo $theLocalProduct['p_price']; ?>&product-desc=<?php echo $theLocalProduct['p_desc']; ?>&product-img=<?php echo $theLocalProduct['p_img']; ?>&category=<?php echo $theLocalProduct['category']; ?>" class="btn btn-primary custom-color w-100 text-center">Order Now</a>
						</div>
					</div>
				<?php
			}
		}
	}

	// display order result 
	if(isset($_POST['orderResult'])){
		$userid = $_POST['userid'];
		$product_id = $_POST['product_id'];
		$orderResult = $Products_Categories_obj->displayOrderResult($userid,$product_id); 
		if (!$orderResult) {
			echo 'false';
		} else {
			echo 'true';
		}

	}
	// add Order
	if(isset($_POST['addOrder'])){
		$userid = $_POST['userid'];
		$product_id = $_POST['product_id'];
		$quantity = $_POST['quantity'];
		$orderAdding = $Products_Categories_obj->addTheOrder($userid,$product_id,$quantity); 
	}
	// delete order
	if(isset($_POST['deleteOrder'])){
		$userid = $_POST['userid'];
		$product_id = $_POST['product_id'];
		$orderDeleting = $Products_Categories_obj->deleteTheOrder($userid,$product_id); 
	}

	// display likes result
	if(isset($_POST['likesResult'])){
		$userid = $_POST['userid'];
		$product_id = $_POST['product_id'];
		$likesResult = $Products_Categories_obj->displayLikesResult($userid,$product_id); 
		if (!$likesResult) {
			echo 'false';
		} else {
			echo 'true';
		}
	}
	// product like counter
	if(isset($_POST['ProductLikesCounter'])){
		$product_id = $_POST['product_id'];
		$alllikesResult = $Products_Categories_obj->ProductLikesCounter($product_id); 
		echo $alllikesResult;
	}
	// add product like
	if(isset($_POST['addProductLike'])){
		$userid = $_POST['userid'];
		$product_id = $_POST['product_id'];
		$orderAdding = $Products_Categories_obj->addProductLike($userid,$product_id); 
	}
	// delete product like
	if(isset($_POST['deleteProductLike'])){
		$userid = $_POST['userid'];
		$product_id = $_POST['product_id'];
		$orderDeleting = $Products_Categories_obj->deleteProductLike($userid,$product_id); 
	}

	// products info in dashboard
	if(isset($_POST['Analizing'])){
		$userid = $_POST['userid'];
		$categoriesInfo = $Products_Categories_obj->categoryCounter($userid); 

		$productsInfo = $Products_Categories_obj->productCounter($userid); 

		$postsInfo = $Products_Categories_obj->postsCounter($userid); 

		?>
		
        <div class="row g-3 border radius light-bg p-3 mb-2" id="productsInfo">
			<h5 class='text-center fw-bold'>You have Uploaded</h5>

			<div class="col-md-12 col-sm-12 d-flex flex-column flex-md-row my-5">
				<div class="col-md-4 col-sm-6">
					<i class="fa fa-gifts" style="font-size: 4rem; color: #0000ff"></i>
					<h3>Categories = <?php echo $categoriesInfo; ?></h3>
				</div>

				<div class="col-md-4 col-sm-6">
					<i class="fa fa-gift" style="font-size: 4rem; color: #0000ff"></i>
					<h3>Products = <?php echo $productsInfo; ?></h3>
				</div>

				<div class="col-md-4 col-sm-6">
					<i class="fa fa-pen" style="font-size: 4rem; color: #0000ff"></i>
					<h3>Posts = <?php echo $postsInfo; ?></h3>
				</div>
			</div>
		</div>
		<?php

			$totalOrder = $Products_Categories_obj->totalOrder($userid); 

			$completed = $Products_Categories_obj->completed($userid); 

			$notCompleted = $Products_Categories_obj->notCompleted($userid); 

		?>
        <div class="row g-3 border radius light-bg p-3 mt-3">
        <h5 class='text-center fw-bold'>Ordered Products</h5>

            <div class="col-md-12 col-sm-12 d-flex flex-column flex-md-row my-5">
                <div class="form-group p-2 w-100">
                    <label class='fw-bold text-start pb-3'>From</label>
                    <input class='form-control shadow-none p-2' type="date" name="" id="" />
                </div>
                <div class="form-group p-2 w-100">
                    <label class='fw-bold text-start pb-3'>To</label>
                    <input class='form-control shadow-none p-2' type="date" name="" id="" />
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <i class="fa fa-gift" style="font-size: 4rem; color: #0000ff"></i>
                <h3>Total = <?php echo $totalOrder; ?></h3>
            </div>
            <div class="col-md-4 col-sm-6">
                <h6 class='fw-bold'><i class="fa fa-shopping-cart px-2" style="font-size: 2.5rem; color: #0000ff"> + </i> Completed = <?php echo $completed; ?></h6>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
				<script>
					let completed = <?php echo $completed; ?>; 
					let totalOrder = <?php echo $totalOrder; ?>; 
					let orderPercent = completed*100/totalOrder; 
					const completePercent =  orderPercent + "%";
					document.getElementById('completePercent').innerText = completePercent;
				</script>
                <h6 class='p-2' id="completePercent">50%</h6>
            </div>
            <div class="col-md-4 col-sm-6">
                <h6 class='fw-bold'><i class="fa fa-shopping-cart px-2" style="font-size: 2.5rem; color: #0000ff"> - </i> Not Completed = <?php echo $notCompleted; ?></h6>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
				<script>
					let notCompleted = <?php echo $notCompleted; ?>; 
					let totalOrder1 = <?php echo $totalOrder; ?>; 
					let orderPercent1 = notCompleted*100/totalOrder1; 
					const notCompletePercent =  orderPercent1 + "%";
					document.getElementById('notCompletePercent').innerText = notCompletePercent;
				</script>
                <h6 class='p-2' id="notCompletePercent">50%</h6>
            </div>
        </div>
		<?php

		$totalVisitors = $Products_Categories_obj->totalVisitors($userid); 

		$maleVisitors = $Products_Categories_obj->maleVisitors($userid); 

		$femaleVisitors = $Products_Categories_obj->femaleVisitors($userid); 

		?>
		
        <div class="row g-3 border radius light-bg p-3 mt-3">
        	<h5 class='text-center fw-bold'>Profile: Visitors</h5>

            <div class="col-md-12 col-sm-12 d-flex flex-column flex-md-row my-5">
                <div class="form-group p-2 w-100">
                    <label class='fw-bold text-start pb-3'>From</label>
                    <input class='form-control shadow-none p-2' type="date" name="" id="" />
                </div>
                <div class="form-group p-2 w-100">
                    <label class='fw-bold text-start pb-3'>To</label>
                    <input class='form-control shadow-none p-2' type="date" name="" id="" />
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <i class="fa fa-users" style="font-size: 4rem; color: #0000ff"></i>
                <h3>Total = <?php echo $totalVisitors; ?> </h3>
            </div>
            <div class="col-md-4 col-sm-6">
                <h4 class='fw-bold'><i class="fa fa-male" style="font-size: 4rem; color: #0000ff"> </i> Male = <?php echo $maleVisitors; ?> </h4>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
				<script>
					let male = <?php echo $maleVisitors; ?>; 
					let total = <?php echo $totalVisitors; ?>; 
					let percent = male*100/total; 
					const maleTotalVisitor =  percent + "%";
					document.getElementById('malePercentage').innerText = maleTotalVisitor;
				</script>
                <h6 class='p-2' id="malePercentage">50%</h6>
            </div>
            <div class="col-md-4 col-sm-6">
                <h4 class='fw-bold'><i class="fa fa-female" style="font-size: 4rem; color: #0000ff"> </i> Female = <?php echo $femaleVisitors; ?> </h4>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
				<script>
					let female = <?php echo $femaleVisitors; ?>; 
					let total1 = <?php echo $totalVisitors; ?>; 
					let percent1 = female*100/total1; 
					const femaleTotalVisitor =  percent1 + "%";
					document.getElementById('femalePercentage').innerText = femaleTotalVisitor;
				</script>
                <h6 class='p-2' id="femalePercentage">50%</h6>
            </div>
        </div>
		<?php
		
	}

?>