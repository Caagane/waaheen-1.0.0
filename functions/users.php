<?php
session_start();
	// Include database file
	include '../classes/Users.php';
	
	$usersOj = new Users();

	// Companies in Local Area
	if(isset($_POST['localCompanies'])){
		// $userid = $_POST['userid'];
		$localCompanies = $usersOj->localCompanies(); 
		if (!$localCompanies) {
			?>
			<i class="fa fa-city" style="font-size:50px;"></i>
			<h3 class="p-1 px-3 py-lg-3"> There is no Company in Your Local Area !!!</h3>
			<?php
		} else{
			foreach ($localCompanies as $localCompany) {
				?>
				<div class="near-com col-md-3 col-sm-12 mx-1 p-3 light-bg border radius ">
                    <?php
						if ($localCompany['image'] == "") {
							?>
								<i class="fa fa-building mt-2 ms-2 me-2" style="font-size: 30px;"></i>
							<?php
						} else {
							?>
                                <div class="near-com-img" style="background-image: url('./img/profiles/<?php echo $localCompany['image']; ?>')"></div>
							<?php
						}
					?>
                    <h6 class="my-2"><?php echo $localCompany['f_name']; ?> <?php echo $localCompany['l_name']; ?></h6>
                    <a href="profile.php?profile_id=<?php echo $localCompany['id']; ?>" class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</a>
                </div>
				<?php
			}
		}
	}


	if(isset($_POST['role'])) {
		
		$user_id = $_POST['user_id'];
		$role = $_POST['role'];
		$role_desc = $_POST['role_desc'];
		$delivery = $_POST['delivery'];
		$delivery_desc = $_POST['delivery_desc'];
		$address = $_POST['address'];

		$switch = $usersOj->SwitchReq($user_id,$role,$role_desc,$delivery,$delivery_desc,$address);
        
        if(!$switch){
            echo '';
        }
        else{
            echo '';
        }
	}

	
	if(isset($_POST['comProfile'])) {
		
		$profile_id = $_POST['profile_id']; 
		
		$com_info = $usersOj->comInfo($profile_id);
		if (!$com_info) {
			echo '<h6 class="col-md-9 col-sm-12 text-center mb-3 mt-5 fw-bold"> <i class="fa fa-gifts w-100" style="font-size: 50px;"></i> No Information For This Company</h6>';
		} else {
			foreach ($com_info as $info) {
			?>

				<div class="row m-auto justify-content-center" id="profileInfo">
                    <div class="col-md-9 col-sm-12 light-bg border radius mt-2 mb-2 p-5">
                        <div class="p-1">
                            <h4> <i class="fa fa-gift"></i> About Our <span class="fw-bold"> <?php echo $info['role'] ?> </span></h4>
                        </div>
                        <div class="p-1">
                            <h6> <?php echo $info['role_desc'] ?> </h6>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 light-bg border radius mb-2 p-5">
                        <div class="p-1">
                            <h4> <i class="fa fa-truck"></i> 
								Delivery System: 
								<?php 
								 if ($info['is_delivery'] == "on") {
									 echo '<span class="fw-bold text-success"> Yes </span>';
								 } else {
									 echo '<span class="fw-bold text-danger"> No </span>';
								 }
								?> 
							</h4>
                        </div>
                        <div class="p-1">
                            <h6><?php echo $info['delivery_desc'] ?></h6>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 light-bg border radius mb-2 p-5">
                        <div class="p-1 d-flex">
                            <h3> <i class="fa fa-map-marker-alt"></i> Address </h3>
                            <!-- <h6 class="p-2"> 2km</h6> -->
                        </div>
                        <div class="p-1">
                            <h6> Country: <?php echo $info['country'] ?> </h6>
                            <h6> City: <?php echo $info['city'] ?> </h6>
                            <h6> Address: <?php echo $info['address'] ?> </h6>
                        </div>
                    </div>
                </div>

			<?php
			}
		}


		$com_categories = $usersOj->comCategories($profile_id);
		?>
			<div class="row g-2 overflow-hidden justify-content-evenly text-center px-md-5 py-3 mx-md-5 mb-5 m-auto" id="profileCategories">
				<h3 class="col-md-12 text-start mb-3 mt-5 fw-bold"> <i class="fa fa-tags"></i> Avaliable Categories</h3>
		<?php
		if (!$com_categories) {
			echo '<h6 class="col-md-9 col-sm-12 text-center mb-3 mt-5 fw-bold"> <i class="fa fa-gifts w-100" style="font-size: 50px;"></i> No Category For This Company</h6>';
		} else {
			foreach ($com_categories as $com_category) {
			?>
                    <div class="col-md-3 col-sm-12 px-1">
                        <div class="border radius light-bg  text-dark p-4 product">
                            <a href="" class="btn-lg text-dark"> <i class="fa fa-gift"></i> <?php echo $com_category['category'] ?></a>
                        </div>
                    </div>
			<?php
			}
			?>
				</div>
			<?php
		}

		$com_all_products = $usersOj->comAllProducts($profile_id);
		?>
		<div class="row justify-content-center p-3" id="profileProducts">
			<h3 class="col-md-9 col-sm-12 text-start mb-3 mt-5 fw-bold"> <i class="fa fa-gift"></i> Product /  Service</h3>
		<?php
		if (!$com_all_products) {
			echo '<h6 class="col-md-9 col-sm-12 text-center mb-3 mt-5 fw-bold"> <i class="fa fa-gifts w-100" style="font-size: 50px;"></i> No Products For This Company</h6>';
		} else {
			foreach ($com_all_products as $com_product) {
			?>
			<div class="col-md-3 col-sm-12 mx-1 light-bg border radius custom-shadow p-3 my-1 m-auto">
				<div class="px-2 ">
					<h6><?php echo $com_product['f_name'].' '. $com_product['l_name']; ?></h6>
					<p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
				</div>
				<div class="product-img" style="background-image: url('./img/products/<?php echo $com_product['p_img']; ?>')"></div>
				<h5 class="mt-2"><?php echo $com_product['p_name']; ?></h5>
				<h6><?php echo $com_product['p_price']; ?></h6>

				<a href="products-details.php?productid=<?php echo $com_product['id']; ?>&com_id=<?php echo $com_product['com_id']; ?>&com-f-name=<?php echo $com_product['f_name']; ?>&com-l-name=<?php echo $com_product['l_name']; ?>&product-name=<?php echo $com_product['p_name']; ?>&product-price=<?php echo $com_product['p_price']; ?>&product-desc=<?php echo $com_product['p_desc']; ?>&product-img=<?php echo $com_product['p_img']; ?>&category=<?php echo $com_product['category']; ?>" class="btn btn-primary custom-color w-100 text-center">Order Now</a>
			</div>

			<?php
			}
		}
		
	}
	?>
		</div>
	<?php

?>