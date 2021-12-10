

<?php include('./view/header.php'); ?>

<?php include('./dashboard-nav.php'); ?>

        <div class="container px-md-5 py-3">
          <div class="row g-2 text-center">
              <div class="col-md-3 col-sm-12">
                    <div class="p-3 py-4 light-bg border radius">
                        <button class='btn text-primary shadow-none' id="addProduct">
                            <i class="fa fa-plus w-100" style="font-size: 36px"></i> Add New Product
                        </button>
                    </div>
              </div>
              <div class="col-md-9 col-sm-12">
                  <div class="form-group p-4 light-bg border radius d-flex justify-content-around">
                        <!-- Company ID -->
                        <input type="text" style="display: none" value="<?php if ($_SESSION['waaheen_user_id'] != 0) { echo $_SESSION['waaheen_user_id']; } ?>" name="dashboard_com_id" id="dashboard_com_id">

                      <select name="categories" id="categories" class="form-select shadow-none py-3 radius">    
                      </select>

                      <button id="filterProducts" class="btn btn-primary btn-sm p-3 px-4 custom-color ms-2 shadow-none radius"> <i class="fa fa-filter"></i> Filter</button>

                  </div>
              </div>
          </div>
        </div>



      <div class="container px-md-5 mb-5">
          <div class="row">
            <div id="categorysProducts" class=" py-3 row g-2 overflow-hidden justify-content-evenly text-center m-auto">
                <h1 class="mt-5">No Filter Result</h1>
                <p>Filter Your Products By There Categories</p>
            </div>
          </div>
      </div>






      <!-- All Models -->
      <!-- Add Category -->
    <div class="modal fade" id="productForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                    <button type="button" class="btn text-danger fw-bold border radius shodow-none" id="closeProduct" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form id="addProductForm">
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Name:</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control p-2" name="p_name" id="p_name">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Description:</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control p-2" name="p_desc" id="p_desc">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Price '$':</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control p-2" name="p_price" id="p_price">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Image:</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="file" class="form-control p-2" name="p_img" id="p_img">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Category:</label>
						</div>
						<div class="col-md-12 mb-3">
                            <select name="category" id="category" class="form-select p2">
                                <option value="">Choose a Category</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Food">Food</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Services">Services</option>
                                <option value="others">others</option>
                            </select>
						</div>
					</div>

                    <!-- message -->
                    <span class="py-5 my-5" id="add_p_msg"></span>
                    <!-- Company ID -->
                    <input type="text" style="display: none" value="<?php if ($_SESSION['waaheen_user_id'] != 0) { echo $_SESSION['waaheen_user_id']; } ?>" name="com_id" id="com_id">

                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" id="insertProduct" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>

<!-- Edit -->
<!-- Edit Prodocut model -->
    <div class="modal fade" id="editProducts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Product</h4>
                    <button type="button" class="btn text-danger fw-bold border radius shodow-none" id="closeEditProducts" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form id="editProductForm">
                    
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Name:</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control p-2" name="e_p_name" id="e_p_name">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Description:</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control p-2" name="e_p_desc" id="e_p_desc">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Price '$':</label>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" class="form-control p-2" name="e_p_price" id="e_p_price">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label py-2">Product Category:</label>
						</div>
						<div class="col-md-12 mb-3">
                            <select name="e_category" id="e_category" class="form-select p2">
                                <option value="">Choose a Category</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Food">Food</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Services">Services</option>
                                <option value="others">others</option>
                            </select>
						</div>
					</div>

                    <!-- message -->
                    <span class="py-5 my-5" id="update_p_msg"></span>
                    <!-- Company ID -->
                    <input type="text" style="display: none" value="<?php if ($_SESSION['waaheen_user_id'] != 0) { echo $_SESSION['waaheen_user_id']; } ?>" name="com_id" id="com_id">

                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" id="editProdcutBtn" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Update</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>

<!-- Delete -->
    <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center w-100" id="myModalLabel">Delete Product?</h4>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <h4 class="w-100 text-center" id="d_p_name"></h4>
                </div> 
				</div>
                <div class="modal-footer text-center justify-content-center">
                    <button type="button" id="closeDeleteProducts" class="btn btn-default px-4 border rounded" data-dismiss="modal"> Cancel</button>
                    <button type="button" id="deleteProduct" class="btn btn-danger px-4"> Delete</button>
                </div>
				
            </div>
        </div>
    </div>





<?php include('./view/footer.php'); ?>