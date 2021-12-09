<?php include('./view/header.php'); ?>

<?php include('./dashboard-nav.php'); ?>


    <div class="container px-md-5 py-3 text-center">
        <div class="row g-3 border radius light-bg p-3">
            <h4 class='text-start fw-bold'>Product</h4>

            <div class="col-md-12 col-sm-12 d-flex flex-column flex-md-row my-5">
                <div class="col-md-6 col-sm-6">
                    <i class="fa fa-gifts" style="font-size: 4rem; color: #0000ff"></i>
                    <h3>Categories: 50</h3>
                </div>

                <div class="col-md-6 col-sm-6">
                    <i class="fa fa-gift" style="font-size: 4rem; color: #0000ff"></i>
                    <h3>Products: 50</h3>
                </div>
            </div>
        </div>
    </div>



    <div class="container px-md-5 py-3 text-center">
        <div class="row g-3 border radius light-bg p-3">
        <h4 class='text-start fw-bold'>Profile: Visitors</h4>

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
                <h3>Total: 50</h3>
            </div>
            <div class="col-md-4 col-sm-6">
                <h4 class='fw-bold'><i class="fa fa-male" style="font-size: 4rem; color: #0000ff"> </i> Male: 50</h4>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
                <h6 class='p-2'>50%</h6>
            </div>
            <div class="col-md-4 col-sm-6">
                <h4 class='fw-bold'><i class="fa fa-female" style="font-size: 4rem; color: #0000ff"> </i> Female: 50</h4>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
                <h6 class='p-2'>50%</h6>
            </div>
        </div>
    </div>


     
    <div class="container px-md-5 py-5 pb-5 text-center">
        <div class="row g-3 border radius light-bg p-3">
        <h4 class='text-start fw-bold'>Ordered Products</h4>

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
                <h3>Total: 50</h3>
            </div>
            <div class="col-md-4 col-sm-6">
                <h5 class='fw-bold'><i class="fa fa-shopping-cart px-2" style="font-size: 3rem; color: #0000ff"> + </i> Completed: 500</h5>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
                <h6 class='p-2'>50%</h6>
            </div>
            <div class="col-md-4 col-sm-6">
                <h5 class='fw-bold'><i class="fa fa-shopping-cart px-2" style="font-size: 3rem; color: #0000ff"> - </i> Not Completed: 500</h5>
                <div class="p-1 w-100 custom-color radius d-flex justify-content-start justify-items-center">
                    <div class="bg-light p-2 radius" style="width: 50%"></div>
                </div>
                <h6 class='p-2'>50%</h6>
            </div>
        </div>
    </div>

    <?php include('./view/footer.php'); ?>

