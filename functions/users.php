<?php
	// Include database file
	include_once('../classes/DB_conn.php');
	include '../classes/Users.php';
	
	$usersOj = new Users();

	// Companies in Local Area
	if(isset($_POST['localCompanies'])){
		$city = $_POST['city'];
		$country = $_POST['country'];
		$userid = $_POST['userid'];
		$localCompanies = $usersOj->localCompanies($city,$country,$userid); 
		if (!$localCompanies) {
			?>
			<i class="fa fa-city" style="font-size:50px;"></i>
			<h5 class="p-1 px-3 py-lg-3"> There is no Company in Your Local Area !!!</h5>
			<?php
		} else{
			foreach ($localCompanies as $localCompany) {
				?>
				<div class="near-com col-md-3 col-sm-12 mx-1 p-3 light-bg border radius ">
                    <?php
						if ($localCompany['image'] == "") {
							?>
							<div class="justify-content-center text-center justify-items-center pt-2" style="font-size: 50px; height: 150px">
								<i class="fa fa-building text-center w-100 border radius rounded-circle py-5"></i>
							</div>
							<?php
						} else {
							?>
                                <div class="near-com-img" style="background-image: url('<?php echo $localCompany['image']; ?>')"></div>
							<?php
						}
					?>
                    <h6 class="my-2 text-center"><?php echo $localCompany['f_name']; ?> <?php echo $localCompany['l_name']; ?></h6>
                    <a href="profile.php?profile_id=<?php echo $localCompany['id']; ?>&f_name=<?php echo $localCompany['f_name']; ?>&img=<?php echo $localCompany['image']; ?>" class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</a>
                </div>
				<?php
			}
		}
	}

	// Trending Companies
	if(isset($_POST['trendingCompanies'])){
		$city = $_POST['city'];
		$country = $_POST['country'];
		$userid = $_POST['userid'];
		$localCompanies = $usersOj->trendingCompanies($city,$country,$userid); 
		if (!$localCompanies) {
			?>
			<i class="fa fa-city " style="font-size:50px;"></i>
			<h5 class="p-1 px-3 py-lg-3"> There is no Company in Your Local Area !!!</h5>
			<?php
		} else{
			foreach ($localCompanies as $localCompany) {
				?>
				<div class="near-com col-md-2 col-sm-5 mx-1 my-1 p-3 light-bg border radius ">
                    <?php
						if ($localCompany['image'] == "") {
							?>
							<div class="justify-content-center text-center justify-items-center pt-2" style="font-size: 50px; height: 150px">
								<i class="fa fa-building text-center w-100 border radius rounded-circle py-5"></i>
							</div>
							<?php
						} else {
							?>
                                <div class="near-com-img" style="background-image: url('<?php echo $localCompany['image']; ?>')"></div>
							<?php
						}
					?>
                    <h6 class="my-2 text-center"><?php echo $localCompany['f_name']; ?> <?php echo $localCompany['l_name']; ?></h6>
                    <a href="profile.php?profile_id=<?php echo $localCompany['id']; ?>&f_name=<?php echo $localCompany['f_name']; ?>&img=<?php echo $localCompany['image']; ?>" class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</a>
                </div>
				<?php
			}
		}
	}

	// Switch To Business Account
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

	// Basic Plan Subscription
	if(isset($_POST['basic_period_time'])) {
		
		$user_id = $_POST['user_id'];
		$basic_period_time = $_POST['basic_period_time'];
		$basic_send_to = $_POST['basic_send_to'];
		$basic_send_from = $_POST['basic_send_from'];
		$basic_plan = $_POST['basic_plan'];

		$basicPlan = $usersOj->basicPlan($user_id, $basic_period_time, $basic_send_to, $basic_send_from, $basic_plan);
        
        if(!$basicPlan){
            echo '';
        }
        else{
            echo '';
        }
	}
		
	// Pro Plan Subscription
	if(isset($_POST['pro_period_time'])) {
		
		$user_id = $_POST['user_id'];
		$pro_period_time = $_POST['pro_period_time'];
		$pro_send_to = $_POST['pro_send_to'];
		$pro_send_from = $_POST['pro_send_from'];
		$pro_plan = $_POST['pro_plan'];

		$proPlan = $usersOj->proPlan($user_id, $pro_period_time, $pro_send_to, $pro_send_from, $pro_plan);
        
        if(!$proPlan){
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
                    <div class="col-md-9 col-sm-12 light-bg border radius mt-2 mb-2 p-3 px-5">
                        <div class="p-1">
                            <h4> <i class="fa fa-gift"></i> About Our <span class="fw-bold"> <?php echo $info['role'] ?> </span></h4>
                        </div>
                        <div class="p-1">
                            <h6> <?php echo $info['role_desc'] ?> </h6>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 light-bg border radius mb-2 p-3 px-5">
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
                    <div class="col-md-9 col-sm-12 light-bg border radius mb-2 p-3 px-5">
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
			?>
			<div class="row m-auto justify-content-center px-md-5 mx-md-5" id="profileInfo">
			<?php
			foreach ($allCarts as $carts) {
			?>
					<div class="col-md-5 col-sm-12 light-bg border radius mt-2 mx-2 mb-2 p-3">
							<div class="col-md-12 d-flex text-start">
								<?php
									if ($carts['image'] == "") {
										?>
											<i class="fa fa-building mt-2 ms-2 me-2" style="font-size: 30px;"></i>
										<?php
									} else {
										?>
										<div class="img img-fluid" style="background-image: url('<?php echo $carts['image']; ?>')"></div>
										<?php
									}
								?>
								<div class="px-2 ">
									<h6><?php echo $carts['f_name'].' '. $carts['l_name']; ?></h6>
									<p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
								</div>
							</div>

							<div class="col-md-4 col-sm-12 float-md-start text-center justify-content-center justify-items-center">
								<div class="product-img border m-auto" style="background-image: url('./img/products/<?php echo $carts['p_img']; ?>');"></div>
							</div>

							<div class="col-md-8 col-sm-12 px-3 float-md-end text-center text-md-start justify-content-center justify-items-center">
								<h5 class="mt-2"><?php echo $carts['p_name']; ?></h5>
								<h6><?php echo $carts['p_price']; ?></h6>

								<a href="products-details.php?productid=<?php echo $carts['id']; ?>&com_id=<?php echo $carts['com_id']; ?>&com-f-name=<?php echo $carts['f_name']; ?>&com-l-name=<?php echo $carts['l_name']; ?>&product-name=<?php echo $carts['p_name']; ?>&product-price=<?php echo $carts['p_price']; ?>&product-desc=<?php echo $carts['p_desc']; ?>&product-img=<?php echo $carts['p_img']; ?>&category=<?php echo $carts['category']; ?>" class="btn btn-primary custom-color px-4 text-center">Update Order</a>
							</div>
					</div>

			<?php
			}
			?>
			</div>
			<?php
		}
	}

	// Display Follow Result
	if(isset($_POST['clientResult'])){
		$userid = $_POST['userid'];
		$profile_id = $_POST['profile_id'];
		$clientResult = $usersOj->displayClientResult($userid,$profile_id); 
		if (!$clientResult) {
			echo 'false';
		} else {
			echo 'true';
		}
	}
	// add client
	if(isset($_POST['client'])){
		$userid = $_POST['userid'];
		$profile_id = $_POST['profile_id'];
		$addClient = $usersOj->addTheClient($userid,$profile_id); 
	}
	// delete client
	if(isset($_POST['unClient'])){
		$userid = $_POST['userid'];
		$profile_id = $_POST['profile_id'];
		$deleteClient = $usersOj->deleteTheClient($userid,$profile_id); 
	}

	// chaters
	if(isset($_POST['chaters'])){
		$userid = $_POST['userid'];
		$chaters = $usersOj->displayChaters($userid); 
		if ($chaters) {
			foreach ($chaters as $chater) {
				?>

				<script>
					$(document).ready(function () {
						$('#theChater<?php echo $chater['id']; ?>').click(function(){
							$('#chaterid').val(<?php echo $chater['id']; ?>);
							$chaterName = '<a href="#" class="btn shadow-none text-dark" style="font-weight:bold;margin-left:-10px;"> <?php echo $chater['f_name']; ?> </a>';
							$('.chaterName').html($chaterName);
							
							<?php
								if ($chater['type'] == "" && $chater['image'] == "") {
									?>
										$('#chaterImage').html('<i class="fa fa-user rounded-circle float-start m-0" style="font-size:24px;padding-left:30px;padding-top:5px;"></i>');
										document.getElementById('chaterImage').style.backgroundImage = "";
									<?php
								} elseif ($chater['type'] == "company" && $chater['image'] == "") {
									?>
										$('#chaterImage').html('<i class="fa fa-building rounded-circle float-start m-0" style="font-size:24px;padding-left:30px;padding-top:5px;"></i>');
										document.getElementById('chaterImage').style.backgroundImage = "";
									<?php
								} else {
									?>
										$('#chaterImage').html('');
										document.getElementById('chaterImage').style.backgroundImage = " url('<?php echo $chater['image']; ?>')";
									<?php
								}
							?>

							chating();
							
							document.querySelector('.message_bg').style.display = 'block';

							setTimeout(scrollDown, 500)

						});
					});
				</script>

					<div class="radius text-dark p-1 theChater" id="theChater<?php echo $chater['id']; ?>" style="cursor:pointer">
						<div class="d-flex text-start">
							<?php 
								if ($chater['image'] == "" && $chater['type'] == "") {
									?>
										<i class="fa fa-user border rounded-circle p-3 px-3 float-start m-0"></i>
									<?php
								} elseif ($chater['image'] == "" && $chater['type'] == "company") {
									?>
										<i class="fa fa-building border rounded-circle p-3 px-3 float-start m-0"></i>
									<?php
								} else {
									?>
										<div class="img img-fluid" style="background-image: url('<?php echo $chater['image']; ?>')"></div>
									<?php
								}
							?>

							<div class="px-2 ">
								<p style="margin-top: 10px; font-weight:bold;"> <?php echo $chater['f_name']; ?> </p>
							</div>
						</div>
					</div>
				<?php
			}
		} else {
			?>
				<div class="w-100 d-flex flex-column justify-content-center justify-items-center text-center" style="height:100%;">
                    <div>
						<i class="fa fa-user" style="font-size:50px; color:#666;"></i>
						<i class="fab fa-facebook-messenger" style="font-size:30px; color:#666;"></i>
					</div>
                    <h6>No Message Yet</h6>
                </div>
			<?php
		}
	}

	
	if(isset($_POST['chating'])){
		$userid = $_POST['userid'];
		$chaterid = $_POST['chaterid'];
		$chating = $usersOj->displayChating($userid,$chaterid); 
		if (!$chating) {

		}else {
			foreach ($chating as $chat) {

				if ($chat['sender'] == $chaterid) {
					?>
					<div class="border radius p-2 custom-color received">
						<?php
							// check if current user type is company or not
							$msg_from = $usersOj->msg_from($userid); 
							// if carrent user type is company
							if ($msg_from != 'company') {
								?>
								<div style="font-size: 12px;">
									Msg From: <?php echo $chat['msg_from']; ?>
								</div>
								<?php
							}
						?>
					<?php echo $chat['message']; ?>
						<span class="received text-start w-100" style="font-size:12px;"> <i class="fa fa-clock"></i> <?php echo $chat['create_at']; ?></span>
					</div>
					
					<hr style="width:100%;float:left;margin: -50px 0px; background:transparent">
					<?php
				} elseif ($chat['sender'] == $userid) {
					?>
					<br>
					<div class="border radius p-2 bg-white sended">
						<?php echo $chat['message']; ?>
						<span class="sended text-end w-100" style="font-size:12px;"> <i class="fa fa-clock"></i> <?php echo $chat['create_at']; ?></span>
					</div>
					<hr style="width:100%;float:left;margin: -50px 0px; background:transparent">
					<?php
				}

			}
		}
	}


	if(isset($_POST['sendmsg'])) {
		$userid = $_POST['userid'];
		$chaterid = $_POST['chaterid'];
		$message = $_POST['message'];
		$msg_from = $_POST['msg_from'];
		$sendmsg = $usersOj->sendmsg($userid,$chaterid,$message,$msg_from);
	}



	
	// Check all avaliable notifications
	if(isset($_POST['notifications'])) {
		$userid = $_POST['userid'];
		// check if user is a client to get new products from their companies
		$notifications = $usersOj->am_i_clent($userid);
		if (!$notifications) {
		}
		else {
			foreach ($notifications as $notification) {
				$com_id = $notification['com_id'];
				// fetch all products
				$newProducts = $usersOj->newProduct($userid,$com_id);
				if (!empty($newProducts)) {
					foreach ($newProducts as $newProduct) {
						$noti_id = $newProduct['id'];
						$date = $newProduct['create_at'];
						$type = 'new product';
						$addNotification = $usersOj->addNotification($userid,$noti_id,$date,$type);
					}
				}

			}
		}

		// check all user's products
		$notifications1 = $usersOj->myProducts($userid);
		if (!$notifications1) {
		}
		else {
			// then send to the class to check new likes
			foreach ($notifications1 as $notification) {
				$p_id = $notification['id'];
				$newLikes = $usersOj->newLike($userid,$p_id);
				if (!empty($newLikes)) {
					// if there is a new like then insert into notification table
					foreach ($newLikes as $newLike) {
						$noti_id = $newLike['id'];
						$date = $newLike['create_at'];
						$type = 'new like';
						$addNotification = $usersOj->addNotification($userid,$noti_id,$date,$type);
					}
				}

			}
		}

		// first fetch all clients
		$newClients = $usersOj->newClient($userid);
		if (!$newClients) {
		}else {
			// and then send earch client to the classs to insert if there is a new client
			foreach ($newClients as $newClient) {
				$noti_id = $newClient['id'];
				$date = $newClient['create_at'];
				$type = 'new client';
				$addNotification = $usersOj->addNotification($userid,$noti_id,$date,$type);
			}
		}

		// Count avaliable notifications
		$userid = $_POST['userid'];
		$countNotifications = $usersOj->countNotifications($userid);
		if (!$countNotifications) {
			echo 'false';
		}
		else {
			echo $countNotifications;
		}

	}


	// count all notifications 
	if(isset($_POST['viewNotifications'])) {
		$userid = $_POST['userid'];
		$viewNotifications = $usersOj->viewNotifications($userid);
	}

	// fetch all notifications
	if(isset($_POST['fetchNotifications'])) {
		$userid = $_POST['userid'];
		$fetchNotifications = $usersOj->fetchNotifications($userid);
		if (!$fetchNotifications) {
			?>
				<div class="py-5 w-100 d-flex flex-column justify-content-center justify-items-center text-center" style="height:100%;">
                    <div>
						<i class="fa fa-bell" style="font-size:50px; color:#666;"></i>
					</div>
                    <h6>No Notifications Yet</h6>
                </div>
			<?php
		}
		else {
			foreach ($fetchNotifications as $noti) {
				$noti_id = $noti['noti_id'];
				if ($noti['noti_type'] == "new product") {
					$productNoti = $usersOj->productNoti($noti_id);
					?>
					<div class="col-md-8 px-3 py-2 border radius light-bg my-1">
						<p><?php echo $productNoti['f_name']; ?> <?php echo $productNoti['l_name']; ?> Uploads <i class="fa fa-gifts text-success"></i> New Product <span class="text-primary">"<?php echo $productNoti['p_name']; ?>"</span></p>
						<p style="paddnig:0px;margin-top:-15px;font-size:14px;"> <i class="fa fa-clock"></i> <?php echo $noti['create_at']; ?></p>
					</div>
					<?php
				}
				if ($noti['noti_type'] == "new like") {
					$likeNoti = $usersOj->likeNoti($noti_id);
					?>
					<div class="col-md-8 px-3 py-2 border radius light-bg my-1">
						<p><?php echo $likeNoti['f_name']; ?> <?php echo $likeNoti['l_name']; ?> Likes <i class="fa fa-heart text-danger"></i> Your Product <span class="text-primary">"<?php echo $likeNoti['p_name']; ?>"</span></p>
						<p style="paddnig:0px;margin-top:-15px;font-size:14px;"> <i class="fa fa-clock"></i> <?php echo $noti['create_at']; ?></p>
					</div>
					<?php
				}
				if ($noti['noti_type'] == "new client") {
					$clientNoti = $usersOj->clientNoti($noti_id);
					if ($clientNoti['client_id'] != $userid) {
					?>
					<div class="col-md-8 px-3 py-2 border radius light-bg my-1">
						<p><?php echo $clientNoti['f_name']; ?> <?php echo $clientNoti['l_name']; ?> Become Your Client <i class="fa fa-plus text-success"></i> Now</p>
						<p style="paddnig:0px;margin-top:-15px;font-size:14px;"> <i class="fa fa-clock"></i> <?php echo $noti['create_at']; ?></p>
					</div>
					<?php
					}
				}
			}
		}
	}

?>