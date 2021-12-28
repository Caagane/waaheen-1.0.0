<?php include('./view/header.php'); ?>



<div class="container py-5 mt-4">
    <div class="row py-2 justify-content-center">
        <div class="col-md-10 col-sm-12 p-1 justify-content-center d-md-flex">

        <div class="col-md-4 col-sm-12 p-1 px-3  mt-4">
                <div class="light-bg p-4 pt-4 border radius text-center">
                    <h3 class="mb-3 overflow-hedden"> Basic <i class="fa fa-star text-danger"></i> </h3>
                    <ol class="list-group radius" style="font-size:14px;">
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> You Can Upload Unlimited Products</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> Your Products Apears in Search,Prodcuts Page & Home</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> Chating System</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-times text-danger"></i> You Can Not Get Clients</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-times text-danger"></i> Email Notification</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-times text-danger"></i> System Analizing</li>
                    </ol>
                    <h5 class="my-3"> <spand class="text-success">$</spand>5/Month </h5>
                    <button class="btn btn-primary custom-color w-100 radius" id="openBasicSubModel">Subscripe</button>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 p-1 px-3">
                <div class="light-bg p-4 py-5 border radius text-center">
                    <h3 class="mb-3 overflow-hedden"> Pro <i class="fa fa-star text-success"></i> </h3>
                    <ol class="list-group radius" style="font-size:14px;">
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> You Can Upload Unlimited Products</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> Your Products Apears in Search,Prodcuts Page & Home</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> Chating System</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> You Can Not Get Clients</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> Email Notification</li>
                        <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> System Analizing</li>
                    </ol>
                    <h5 class="my-3"> <spand class="text-success">$</spand>10/Month </h5>
                    <button class="btn btn-primary custom-color w-100 radius" id="openProSubModel">Subscripe</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="proSubModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="mb-3 overflow-hedden text-center"> Pro Plan <i class="fa fa-star text-success"></i> </h3>
                    <button type="button" class="btn text-danger fw-bold border radius shodow-none" id="closeProSubModel" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form id="ProPlanData">
                    
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Select Subscription Period:</label>
						</div>
						<div class="col-md-12 mb-3">
                            <select name="pro_period_time" id="pro_period_time" class="form-select radius p-3">
                                <option value="">Select Your Period</option>
                                <option value="1 Month">1 Month</option>
                                <option value="3 Month">3 Month</option>
                                <option value="6 Month">6 Month</option>
                            </select>
						</div>
					</div>	

					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Send <span class="pro_total text-success"></span> To one of these numbers </label>
						</div>
						<div class="col-md-12 mb-3">
                            <select name="pro_send_to" id="pro_send_to" class="form-select radius p-3">
                                <option value="">Select number</option>
                                <option value="0633822957">0633822957 Telesom</option>
                                <option value="0659256927">0659256927 Somtel</option>
                            </select>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Send From "Your Number" </label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control radius p-3" name="pro_send_from" id="pro_send_from"placeholder="Address">
						</div>
					</div>	

                    <h6 class="py-2 pro_info"></h6>

                    <!-- message -->
                    <span class="py-5 my-5" id="proMSG"></span>
                    <input type="text" name="user_id" id="user_id" value="<?php  echo $_SESSION['waaheen_user_id']; ?>" style="display:none;">
                    <input type="text" name="pro_plan" id="pro_plan" value="Pro Plan" style="display:none;">

                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" id="proPlan" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>


    <div class="modal fade" id="basicSubModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="mb-3 overflow-hedden text-center"> Basic Plan <i class="fa fa-star text-danger"></i> </h3>
                    <button type="button" class="btn text-danger fw-bold border radius shodow-none" id="closeBasicSubModel" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form id="BasicPlanData">
                    
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Select Subscription Period:</label>
						</div>
						<div class="col-md-12 mb-3">
                            <select name="basic_period_time" id="basic_period_time" class="form-select radius p-3">
                                <option value="">Select Your Period</option>
                                <option value="1 Month">1 Month</option>
                                <option value="3 Month">3 Month</option>
                                <option value="6 Month">6 Month</option>
                            </select>
						</div>
					</div>	

					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Send <span class="basic_total text-success"></span> To one of these numbers </label>
						</div>
						<div class="col-md-12 mb-3">
                            <select name="basic_send_to" id="basic_send_to" class="form-select radius p-3">
                                <option value="">Select number</option>
                                <option value="0633822957">0633822957 Telesom</option>
                                <option value="0659256927">0659256927 Somtel</option>
                            </select>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Send From "Your Number" </label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control radius p-3" name="basic_send_from" id="basic_send_from"placeholder="the number you sent from">
						</div>
					</div>	

                    <h6 class="py-2 basic_info"></h6>

                    <!-- message -->
                    <span class="py-5 my-5" id="basicMSG"></span>
                    <input type="text" name="user_id" id="user_id1" value="<?php  echo $_SESSION['waaheen_user_id']; ?>" style="display:none;">
                    <input type="text" name="basic_plan" id="basic_plan" value="Basic Plan" style="display:none;">

                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" id="basicPlan" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>


<?php include('./view/footer.php'); ?>

<script>
  $(document).ready(function () {
      
	setInterval(function() {
		$pro_period_time = $('#pro_period_time').val();
		$pro_send_from = $('#pro_send_from').val();
		$pro_send_to = $('#pro_send_to').val();
        if ($pro_period_time != "" && $pro_send_from != "" && $pro_send_to != "") {
            if ($pro_period_time == "1 Month") {
                var money = "$10";
                $('.pro_total').text(money);
                $('.pro_info').text('Send '+money+' To: '+$pro_send_to+' Your Number is: '+$pro_send_from);
            }
            if ($pro_period_time == "3 Month") {
                var money = "$30";
                $('.pro_total').text(money);
                $('.pro_info').text('Send '+money+' To: '+$pro_send_to+' Your Number is: '+$pro_send_from);
            }
            if ($pro_period_time == "6 Month") {
                var money = "$60";
                $('.pro_total').text(money);
                $('.pro_info').text('Send '+money+' To: '+$pro_send_to+' Your Number is: '+$pro_send_from);
            }
        }


		$basic_period_time = $('#basic_period_time').val();
		$basic_send_from = $('#basic_send_from').val();
		$basic_send_to = $('#basic_send_to').val();
        if ($basic_period_time != "" && $basic_send_from != "" && $basic_send_to != "") {
            if ($basic_period_time == "1 Month") {
                var money = "$5";
                $('.basic_total').text(money);
                $('.basic_info').text('Send '+money+' To: '+$basic_send_to+' Your Number is: '+$basic_send_from);
            }
            if ($basic_period_time == "3 Month") {
                var money = "$15";
                $('.basic_total').text(money);
                $('.basic_info').text('Send '+money+' To: '+$basic_send_to+' Your Number is: '+$basic_send_from);
            }
            if ($basic_period_time == "6 Month") {
                var money = "$30";
                $('.basic_total').text(money);
                $('.basic_info').text('Send '+money+' To: '+$basic_send_to+' Your Number is: '+$basic_send_from);
            }
        }


	}, 1000);

  });
</script>