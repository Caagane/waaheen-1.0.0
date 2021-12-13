<?php include('./view/header.php'); ?>


<div class="container py-5 mt-5">
    <div class="row justify-content-center py-5" style="height: 80vh;">
        <div class="col-md-3 col-sm-12 px-1" id="openSwitch">
            <div class="border radius light-bg text-dark p-4 product">
                <h4 class="btn fs-5 text-dark w-100 text-center"> <i class="fa fa-building w-100 text-center" style="font-size:40px"></i> Switch to Business </h4>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 px-1">
            <div class="border radius light-bg text-dark p-4 product">
                <h4 class="btn fs-5 text-dark w-100 text-center"> <i class="fa fa-user w-100 text-center" style="font-size:40px"></i> Report User </h4>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 px-1">
            <div class="border radius light-bg text-dark p-4 product">
                <h4 class="btn fs-5 text-dark w-100 text-center"> <i class="fa fa-bug w-100 text-center" style="font-size:40px"></i> Report Error </h4>
            </div>
        </div>

    </div>
</div>



<div class="modal fade" id="switchModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Your Business Info</h4>
                    <button type="button" class="btn text-danger fw-bold border radius shodow-none" id="closeSwitch" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form id="switchData">

                    <div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Your Business Role:</label>
						</div>
						<div class="col-md-12 mb-3">
                            <select name="role" id="category" class="form-select radius p-3">
                                <option value="">Select Your Role</option>
                                <option value="Service">Service</option>
                                <option value="Production">Production</option>
                            </select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Role Description:</label>
						</div>
						<div class="col-md-12 mb-3">
                            <textarea class="form-control radius p-3" name="role_desc" id="role_desc" cols="30" rows="2" placeholder="Descripe Your Service Or Product"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Delivery System?</label>
						</div>
						<div class="col-md-12 mb-3">
                            <label class="p-2 px-4 radius border btn pointer">
                                <input class="control-label py-2 border rounded-lg" type="radio" name="delivery">
                                Yes
                            </label>
                            <label class="p-2 px-4 radius border btn pointer">
                                <input class="control-label py-2 border rounded-lg" type="radio" name="delivery">
                                No
                            </label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Delivery Description:</label>
						</div>
						<div class="col-md-12 mb-3">
                            <textarea class="form-control radius p-3" name="delivery_desc" id="delivery_desc" cols="30" rows="2" placeholder="Descripe Your Delivery System"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Address:</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="address" class="form-control radius p-3" name="address" id="address"placeholder="Address">
						</div>
					</div>

                    <!-- message -->
                    <span class="py-5 my-5" id="switchMsg"></span>
                    <input type="text" name="user_id" id="user_id" value="<?php  echo $_SESSION['waaheen_user_id']; ?>" style="display:none;">

                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" id="switch" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>

<?php include('./view/footer.php'); ?>