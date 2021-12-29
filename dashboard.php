<?php include('./view/header.php'); ?>

<?php include('./dashboard-nav.php'); ?>


    <div class="container px-md-5 py-3 mt-5 text-center" id="userContainer" style="display:none;">
        <div class="row justify-content-center py-5 mt-5">
            <h5>Your Account is not a Business Account, Click Below Button To Get Business Account </h5>
            <a href="settings" class="col-md-4 col-sm-12 px-1">
                <div class="border radius light-bg text-dark p-4 product">
                    <h6 class="btn text-dark w-100 text-center"> <i class="fa fa-building w-100 text-center" style="font-size:40px"></i> Clik here to Switch Business Account </h6>
                </div>
            </a>

        </div>
    </div>


    <!-- this element is important !!! -->
    <div class="container" id="me">
    </div>
    <!--  -->


    <div class="container px-md-5 py-1 mb-5 text-center" id="basicPlanWrapper" style="display:none;">
        <div class="row g-3 border radius light-bg p-3 mt-3 justify-content-center" id="BasicPlanDashboard">
            <i class="fa fa-meh text-danger" style="font-size: 60px;"></i>
            <h4>Your Account is Not Pro Business!, So You can't get Analyzing System!</h4>
            <h5>Plan: <span class="plan" style="color: #5900ff;"></span>, Ends at: <span class="sub_time" style="color: #5900ff;"></span></h5>
            <div>
                <a href="subscription" class="btn btn-success w-10">Switch To Pro <i class="fa fa-star text-light"></i></a>
            </div>
            <div class="col-md-6 border radius p-4">
                <h3 class="mb-3 overflow-hedden"> Basic <i class="fa fa-star text-danger"></i> </h3>
                <ol class="list-group radius" style="font-size:14px;">
                    <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> You Can Upload Unlimited Products</li>
                    <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> Your Products Apears in Search,Prodcuts Page & Home</li>
                    <li class="list-group-item bg-light"> <i class="fa fa-check text-success"></i> Chating System</li>
                    <li class="list-group-item bg-light"> <i class="fa fa-times text-danger"></i> You Can Not Get Clients</li>
                    <li class="list-group-item bg-light"> <i class="fa fa-times text-danger"></i> Email Notification</li>
                    <li class="list-group-item bg-light"> <i class="fa fa-times text-danger"></i> System Analizing</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container px-md-5 py-3 text-center" id="proPlan" style="display:none;">
        <div class="row g-3 border radius light-bg p-3 mt-3 justify-content-center" id="BasicPlanDashboard">
            <i class="fa fa-smile-beam text-success" style="font-size: 60px;"></i>
            <h4>Your Account is Not Pro Business!, So You can't get Analyzing System!</h4>
            <h5>Plan: <span class="plan" style="color: #5900ff;"></span>, Ends at: <span class="sub_time" style="color: #5900ff;"></span></h5>
        </div>
    </div>




    <div class="container px-md-5 py-3 text-center" id="companyContainer" style="display:none;">


        <div class="row g-3 border radius light-bg p-3 mt-3" id="analyzingProducts">
        </div>
        
        <div class="row g-3 border radius light-bg p-3 mt-3" id="analyzingOrders">
        </div>
        
        <div class="row g-3 border radius light-bg p-3 mt-3" id="analyzingVisitors">
        </div>
    </div>


    <?php include('./view/footer.php'); ?>



<script>
    function me(){
        $userid = $('#userid').val();
        if ($userid != "0") {
            $.ajax({
                type: 'POST',
                url: 'functions/users.php',
                data: {
                    userid: $userid,
                    me: 1
                },
                success:function(res){
                    $('#me').html(res);
                }
            });
        }
    }

    $(document).ready(function () {
        // cureent user
        me();
        
    });
</script>
