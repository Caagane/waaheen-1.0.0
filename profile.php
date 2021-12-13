<?php include('./view/header.php'); ?>

    <div class="container-fluid profile-panner pt-5">
        <div class="row text-center py-5">
            <div class="col-md-6 col-sm-12">
                <div class="user-profile-img" style="background-image: url('./img/profiles/com.png')"></div>
            </div>
            <div class="name col-md-6 col-sm-12">
                <h3>Abdirahman</h3>
                <h3>Agane</h3>
                <div class="d-flex py-2">
                    <button class="btn btn-light radius px-2 mx-1"> <i class="fa fa-plus"></i> Follow </button>
                    <button class="btn btn-light radius px-2 mx-1"> <i class="fa fa-comment"></i> Message </button>
                </div>
            </div>
        </div>

  </div>

  <div class="custom-shape-divider-top-1637515292">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill" />
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill" />
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill" />
        </svg>
    </div>


 <div class="container my-5">
        <div class="col-md-9 col-sm-12 m-auto text-center d-flex">
            <a href="#comProfile" class="radius custom-shadow mx-1 px-2 py-3 w-100 border light-bg"> <i class="fa fa-building"></i> Information</a>
            <a href="#profileProducts" class="radius custom-shadow mx-1 px-2 py-3 w-100 border light-bg"> <i class="fa fa-gift"></i> Products / Services</a>
            <a href="#profileProducts" class="radius custom-shadow mx-1 px-2 py-3 w-100 border light-bg"> <i class="fa fa-pen"></i> Posts</a>
        </div>
    </div>


            <input style="display:none" type="text" value="<?php echo $_GET['profile_id']; ?>" name="profile_id" id="profile_id">

            <input style="display:none" type="text" value="<?php echo $_GET['profile_id']; ?>" name="dashboard_com_id" id="dashboard_com_id">

            

            <div class="container" id="comProfile">
            </div>



        <div class="container px-md-5 mb-5" id="profileProducts">
          <div class="row justify-content-center">
                <h3 class="col-md-10 col-sm-12 text-start mb-3 mt-5 fw-bold"> <i class="fa fa-gifts"></i> Products /  Services</h3>
                <div class="col-md-10 col-sm-12 px-md-4 my-3">
                <p class="col-md-10 col-sm-12 text-start mb-2 fw-bold"> <i class="fa fa-gift"></i> Search Products By Category</p>
                    <div class="form-group p-4 light-bg border radius d-flex justify-content-around">
                            <!-- Company ID -->
                            <input type="text" style="display: none" value="<?php if ($_SESSION['waaheen_user_id'] != 0) { echo $_SESSION['waaheen_user_id']; } ?>" name="dashboard_com_id" id="dashboard_com_id">

                        <select name="categories" id="categories" class="form-select shadow-none py-3 radius">    
                        </select>

                        <button id="filterProducts" class="btn btn-primary btn-sm p-3 px-4 custom-color ms-2 shadow-none radius"> <i class="fa fa-filter"></i> Filter</button>

                    </div>
                </div>
                
                <div id="categorysProducts" class=" py-3 row g-2 overflow-hidden justify-content-evenly text-center m-auto">
                    <h1 class="mt-5">No Filter Result</h1>
                    <p>Filter Your Products By There Categories</p>
                </div>
          </div>
      </div>


<?php include('./view/footer.php'); ?>


<script>
  $(document).ready(function () {

    // Full Info on prodile page
    comProfile();

    // load all categories
    allCategories();
  });
</script>