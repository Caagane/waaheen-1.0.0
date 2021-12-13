
<?php include('./view/header.php'); ?>

    <section class="pb-0 pt-5 custom-color">
        <div class="container py-5 text-center">
            <div class="row pb-5 m-auto">
                <div class="col-md-12 col-sm-12 m-auto pb-5">
                    <h1>Search What is in Your Mind!!!</h1>
                </div>
            </div>
        </div>
    </section>

  <div class="container mb-4 px-md-5" style="margin-top: -100px">
        <div class="row mt-2">
            <div class="col-md-12 col-sm-12 p-4 py-5 m-auto bg-white border radius shadow-md-sm text-dark">
                <form id="SearchProduct" class="form-group d-flex border radius overflow-hidden">
                    <input name="search" id="search" class="form-control shadow-none p-4" style="width: 100%; background: transparent; border: 0px;" type="text" placeholder="Search..." />
                    <!-- <i class="fa fa-map-marker-alt" style="font-size: 1.5rem; padding: 20px; color: #666666; border-left: 1px solid #c6c6c6"></i> -->
                    <input name="dist" id="dist" class="form-control shadow-none p-4" style="display:none;width: 30%; background: transparent; border: 0px solid #fff; margin-left: -30px" type="number" placeholder="Km" />
                    <button type="button" name="searchBtn" id="searchBtn" class="btn btn-primary custom-color"><i class="fa fa-search" style="font-size: 1.5rem; padding: 20px; border: none"></i></button>
                </form>
            </div>
        </div>
  </div>


    <div class="container px-md-5 mb-5">
        <div class="row">

            <!-- Futer Features -->
            <!-- marka xog la radinayo waa in la heli karaa profileka shirkadaha, Products-ka & Posts-ka -->
            <!-- Links-ka hoose waa Future Features !!!! -->

            <!-- <div class="light-bg d-flex justify-content-center justify-items-center border radius overflow-hidden">
                <a href="dashboard.php" class="text-center w-100 float-start py-3 w-100"> <i class="fa fa-gift"></i> Products</a>
                <a href="dashboard-products.php" class="border-start border-end text-center w-100 float-start py-3 w-100"> <i class="fa fa-building"></i> Companies</a>
                <a href="dashboard-posts.php" class="text-center w-100 float-start py-3 w-100"> <i class="fa fa-pen"></i> Posts</a>
            </div> -->
            
            <div id="searchResult" class=" py-3 row g-2 overflow-hidden justify-content-evenly text-center m-auto">
                <i class="fa fa-search" style="font-size: 60px;"></i>
                <h1>No Result yet!</h1>
                <p class="lead">Your Searching Result Will be here</p>
            </div>
        </div>
    </div>

<?php include('./view/footer.php'); ?>
