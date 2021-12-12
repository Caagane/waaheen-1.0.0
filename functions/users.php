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
                    <button class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</button>
                </div>
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
                    <button class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</button>
                </div>
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
                    <button class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</button>
                </div>
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
                    <button class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</button>
                </div>
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
                    <button class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</button>
                </div>
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
                    <button class="btn btn-sm btn-primary custom-color w-100 text-center">See Profile</button>
                </div>
				<?php
			}
		}
	}


?>