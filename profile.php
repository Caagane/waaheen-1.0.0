<?php include('./view/header.php'); ?>

    <div class="container-fluid profile-panner pt-5">
        <div class="row text-center py-5">
            <div class="col-md-6 col-sm-12">
                <div class="user-profile-img" style="background-image: url('<?php echo $_GET['img'] ?>')"></div>
            </div>
            <div class="name col-md-6 col-sm-12">
                <h3 class="p-1"><?php echo $_GET['f_name'] ?></h3>
                <div class="d-flex py-2">
                    <div id="clientWrapper">
                        <button class="btn btn-light px-4 mx-1" id="client" style="display:none;"> <i class="fa fa-plus"></i> Client </button>
                        <button class="btn btn-danger px-4 mx-1" id="unClient" style="display:none; background:red"> <i class="fa fa-times"></i> Un Client </button>
                    </div>
                    <button class="btn btn-light px-2 mx-1" id="showMessageModel"> <i class="fa fa-comment"></i> Message </button>
                </div>
            </div>
        </div>

  </div>



  <svg width="100%" height="100%" id="svg" viewBox="0 80 1440 400" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><style>
          .path-0{
            animation:pathAnim-0 4s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
          }
          @keyframes pathAnim-0{
            0%{
              d: path("M 0,400 C 0,400 0,133 0,133 C 88.1974358974359,101.15384615384616 176.3948717948718,69.3076923076923 255,86 C 333.6051282051282,102.6923076923077 402.6179487179487,167.92307692307693 473,170 C 543.3820512820513,172.07692307692307 615.1333333333334,111.00000000000001 688,88 C 760.8666666666666,64.99999999999999 834.8487179487179,80.07692307692307 916,106 C 997.1512820512821,131.92307692307693 1085.4717948717948,168.6923076923077 1174,175 C 1262.5282051282052,181.3076923076923 1351.2641025641026,157.15384615384613 1440,133 C 1440,133 1440,400 1440,400 Z");
            }
            25%{
              d: path("M 0,400 C 0,400 0,133 0,133 C 98.63846153846154,146.46666666666667 197.27692307692308,159.93333333333334 280,166 C 362.7230769230769,172.06666666666666 429.53076923076924,170.73333333333335 507,163 C 584.4692307692308,155.26666666666665 672.6,141.13333333333333 746,136 C 819.4,130.86666666666667 878.0692307692307,134.73333333333332 955,140 C 1031.9307692307693,145.26666666666668 1127.123076923077,151.93333333333334 1211,151 C 1294.876923076923,150.06666666666666 1367.4384615384615,141.53333333333333 1440,133 C 1440,133 1440,400 1440,400 Z");
            }
            50%{
              d: path("M 0,400 C 0,400 0,133 0,133 C 69.65641025641025,139.0179487179487 139.3128205128205,145.03589743589743 222,145 C 304.6871794871795,144.96410256410257 400.4051282051281,138.87435897435898 496,148 C 591.5948717948719,157.12564102564102 687.0666666666668,181.46666666666667 762,173 C 836.9333333333332,164.53333333333333 891.3282051282051,123.25897435897434 959,119 C 1026.6717948717949,114.74102564102566 1107.6205128205129,147.4974358974359 1190,156 C 1272.3794871794871,164.5025641025641 1356.1897435897436,148.75128205128203 1440,133 C 1440,133 1440,400 1440,400 Z");
            }
            75%{
              d: path("M 0,400 C 0,400 0,133 0,133 C 61.25897435897437,105.08461538461539 122.51794871794874,77.16923076923078 213,91 C 303.48205128205126,104.83076923076922 423.1871794871796,160.40769230769232 517,167 C 610.8128205128204,173.59230769230768 678.7333333333332,131.20000000000002 751,126 C 823.2666666666668,120.79999999999998 899.8794871794871,152.79230769230767 984,155 C 1068.1205128205129,157.20769230769233 1159.748717948718,129.63076923076923 1237,121 C 1314.251282051282,112.36923076923077 1377.125641025641,122.68461538461538 1440,133 C 1440,133 1440,400 1440,400 Z");
            }
            100%{
              d: path("M 0,400 C 0,400 0,133 0,133 C 88.1974358974359,101.15384615384616 176.3948717948718,69.3076923076923 255,86 C 333.6051282051282,102.6923076923077 402.6179487179487,167.92307692307693 473,170 C 543.3820512820513,172.07692307692307 615.1333333333334,111.00000000000001 688,88 C 760.8666666666666,64.99999999999999 834.8487179487179,80.07692307692307 916,106 C 997.1512820512821,131.92307692307693 1085.4717948717948,168.6923076923077 1174,175 C 1262.5282051282052,181.3076923076923 1351.2641025641026,157.15384615384613 1440,133 C 1440,133 1440,400 1440,400 Z");
            }
          }</style><path d="M 0,400 C 0,400 0,133 0,133 C 88.1974358974359,101.15384615384616 176.3948717948718,69.3076923076923 255,86 C 333.6051282051282,102.6923076923077 402.6179487179487,167.92307692307693 473,170 C 543.3820512820513,172.07692307692307 615.1333333333334,111.00000000000001 688,88 C 760.8666666666666,64.99999999999999 834.8487179487179,80.07692307692307 916,106 C 997.1512820512821,131.92307692307693 1085.4717948717948,168.6923076923077 1174,175 C 1262.5282051282052,181.3076923076923 1351.2641025641026,157.15384615384613 1440,133 C 1440,133 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="#5900ff88" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path><style>
          .path-1{
            animation:pathAnim-1 4s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
          }
          @keyframes pathAnim-1{
            0%{
              d: path("M 0,400 C 0,400 0,266 0,266 C 86.85641025641027,251.47435897435898 173.71282051282054,236.94871794871796 263,249 C 352.28717948717946,261.05128205128204 444.00512820512813,299.6794871794872 515,296 C 585.9948717948719,292.3205128205128 636.2666666666667,246.33333333333334 706,228 C 775.7333333333333,209.66666666666666 864.9282051282053,218.98717948717945 950,230 C 1035.0717948717947,241.01282051282055 1116.0205128205127,253.71794871794873 1197,260 C 1277.9794871794873,266.28205128205127 1358.9897435897437,266.14102564102564 1440,266 C 1440,266 1440,400 1440,400 Z");
            }
            25%{
              d: path("M 0,400 C 0,400 0,266 0,266 C 63.400000000000034,262.05641025641023 126.80000000000007,258.1128205128205 210,266 C 293.19999999999993,273.8871794871795 396.19999999999993,293.6051282051282 471,305 C 545.8000000000001,316.3948717948718 592.4000000000001,319.46666666666664 680,303 C 767.5999999999999,286.53333333333336 896.1999999999998,250.52820512820512 992,255 C 1087.8000000000002,259.4717948717949 1150.8000000000002,304.42051282051284 1220,313 C 1289.1999999999998,321.57948717948716 1364.6,293.7897435897436 1440,266 C 1440,266 1440,400 1440,400 Z");
            }
            50%{
              d: path("M 0,400 C 0,400 0,266 0,266 C 99.04871794871795,275.36923076923074 198.0974358974359,284.73846153846154 271,284 C 343.9025641025641,283.26153846153846 390.65897435897443,272.4153846153846 458,268 C 525.3410256410256,263.5846153846154 613.2666666666667,265.59999999999997 697,263 C 780.7333333333333,260.40000000000003 860.2743589743588,253.18461538461543 954,242 C 1047.7256410256412,230.81538461538457 1155.6358974358977,215.66153846153844 1239,219 C 1322.3641025641023,222.33846153846156 1381.1820512820511,244.16923076923078 1440,266 C 1440,266 1440,400 1440,400 Z");
            }
            75%{
              d: path("M 0,400 C 0,400 0,266 0,266 C 58.543589743589735,288.44102564102565 117.08717948717947,310.8820512820513 201,314 C 284.91282051282053,317.1179487179487 394.1948717948718,300.91282051282053 473,295 C 551.8051282051282,289.08717948717947 600.1333333333333,293.46666666666664 684,287 C 767.8666666666667,280.53333333333336 887.2717948717948,263.2205128205128 983,262 C 1078.7282051282052,260.7794871794872 1150.7794871794872,275.65128205128207 1223,279 C 1295.2205128205128,282.34871794871793 1367.6102564102564,274.17435897435894 1440,266 C 1440,266 1440,400 1440,400 Z");
            }
            100%{
              d: path("M 0,400 C 0,400 0,266 0,266 C 86.85641025641027,251.47435897435898 173.71282051282054,236.94871794871796 263,249 C 352.28717948717946,261.05128205128204 444.00512820512813,299.6794871794872 515,296 C 585.9948717948719,292.3205128205128 636.2666666666667,246.33333333333334 706,228 C 775.7333333333333,209.66666666666666 864.9282051282053,218.98717948717945 950,230 C 1035.0717948717947,241.01282051282055 1116.0205128205127,253.71794871794873 1197,260 C 1277.9794871794873,266.28205128205127 1358.9897435897437,266.14102564102564 1440,266 C 1440,266 1440,400 1440,400 Z");
            }
          }</style><path d="M 0,400 C 0,400 0,266 0,266 C 86.85641025641027,251.47435897435898 173.71282051282054,236.94871794871796 263,249 C 352.28717948717946,261.05128205128204 444.00512820512813,299.6794871794872 515,296 C 585.9948717948719,292.3205128205128 636.2666666666667,246.33333333333334 706,228 C 775.7333333333333,209.66666666666666 864.9282051282053,218.98717948717945 950,230 C 1035.0717948717947,241.01282051282055 1116.0205128205127,253.71794871794873 1197,260 C 1277.9794871794873,266.28205128205127 1358.9897435897437,266.14102564102564 1440,266 C 1440,266 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="#5900ffff" class="transition-all duration-300 ease-in-out delay-150 path-1" transform="rotate(-180 720 200)"></path></svg>




    <div class="container mb-5" style="margin-top: -30px;">
        <div class="col-md-9 col-sm-12 m-auto text-center d-flex">
            <a href="#comProfile" class="radius custom-shadow me-1 px-2 py-3 w-100 border light-bg"> <i class="fa fa-building"></i> Information</a>
            <a href="#profileProducts" class="radius custom-shadow ms-1 px-2 py-3 w-100 border light-bg"> <i class="fa fa-gift"></i> Products / Services</a>
            <!-- <a href="#profileProducts" class="radius custom-shadow mx-1 px-2 py-3 w-100 border light-bg"> <i class="fa fa-pen"></i> Posts</a> -->
        </div>
    </div>


            <input style="display:none" type="text" value="<?php echo $_GET['profile_id']; ?>" name="profile_id" id="profile_id">

            <input style="display:none" type="text" value="<?php echo $_GET['profile_id']; ?>" name="dashboard_com_id" id="dashboard_com_id">

            <input style="display:none" type="text" value="<?php echo $_GET['profile_id']; ?>" name="chaterid" id="chaterid">
    <input style="display:none" type="text" value="Profile" name="msg_from" id="msg_from">
            

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







      <div class="custom_model custom-scroll py-3 pt-md-5" id="messageModel">
            <div class="col-lg-6 col-sm-12 p-0 m-0 light-bg1 border radius message-bg">
                        
                    

                <div class="radius text-dark p-1 header border-none" style="border:none;">
                  <div class="d-flex text-start border-none justify-content-end" id="chaterInfo" style="border:none;">
                    <button id="hideMessageModel" class="btn border radius border border-danger float-end py-1 px-2 m-2"><i class="fa fa-times text-danger"></i></button>
                  </div>
                </div>

                <div class="messages p-3 custom-scroll" id="allMessagesBg">
                    <div class="w-100 d-flex flex-column justify-content-center justify-items-center text-center" style="height:100%;">
                        <i class="fab fa-facebook-messenger" style="font-size:72px; color:#666;"></i>
                        <h6>No Message Yet</h6>
                    </div>
                </div>

                <div class="form-group d-flex">
                    <input style="border-radius:0px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" type="text" class="form-control shadow-none px-3 message" name="message" placeholder="Write a message...">
                    <button style="border-radius:0px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" class="btn btn-primary shadow-none custom-color px-3" type="button" id="sendmsg">Send</button>
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

    // client state
    clientResult();

    
    chating();

  });
</script>