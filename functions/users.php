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
	}


	if(isset($_POST['fetchcarts'])) {
			
		$userid = $_POST['userid']; 
		
		$allCarts = $usersOj->fetchAllCarts($userid);

		
		echo '<h4 class="col-md-12 col-sm-12 text-center mb-3 mt-5 fw-bold"> <i class="fa fa-shopping-cart" style="font-size: 30px;"></i> <i class="fa fa-gifts" style="font-size: 20px; margin-left: -8px"></i> Your Orders History </h4>';

		if (!$allCarts) {
			echo '<h6 class="col-md-12 col-sm-12 text-center mb-3 mt-5 fw-bold"> <i class="fa fa-gifts w-100" style="font-size: 50px;"></i> No Carts !!!</h6>';
		} else {
			foreach ($allCarts as $carts) {
			?>
				<div class="row m-auto justify-content-center" id="profileInfo">
					<div class="col-md-9 col-sm-12 light-bg border radius mt-2 mb-2 p-3">
							<div class="col-md-12 d-flex text-start">
								<?php
									if ($carts['image'] == "") {
										?>
											<i class="fa fa-building mt-2 ms-2 me-2" style="font-size: 30px;"></i>
										<?php
									} else {
										?>
										<div class="img img-fluid" style="background-image: url('./img/profiles/<?php echo $carts['image']; ?>')"></div>
										<?php
									}
								?>
								<div class="px-2 ">
									<h6><?php echo $carts['f_name'].' '. $carts['l_name']; ?></h6>
									<p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
								</div>
							</div>

							<div class="col-md-4 col-sm-12 float-md-start">
								<div class="product-img" style="background-image: url('./img/products/<?php echo $carts['p_img']; ?>')"></div>
							</div>

							<div class="col-md-8 col-sm-12 px-3 float-md-end">
								<h5 class="mt-2"><?php echo $carts['p_name']; ?></h5>
								<h6><?php echo $carts['p_price']; ?></h6>

								<a href="products-details.php?productid=<?php echo $carts['id']; ?>&com_id=<?php echo $carts['com_id']; ?>&com-f-name=<?php echo $carts['f_name']; ?>&com-l-name=<?php echo $carts['l_name']; ?>&product-name=<?php echo $carts['p_name']; ?>&product-price=<?php echo $carts['p_price']; ?>&product-desc=<?php echo $carts['p_desc']; ?>&product-img=<?php echo $carts['p_img']; ?>&category=<?php echo $carts['category']; ?>" class="btn btn-primary custom-color px-4 text-center">Update Order</a>
							</div>
					</div>
				</div>

			<?php
			}
		}
	}

?>