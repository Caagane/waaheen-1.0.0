<?php include('./view/header.php'); ?>

<?php include('./dashboard-nav.php'); ?>


    <div class="container px-md-5 py-3 text-center">
        <div class="row g-3 border radius light-bg p-3 mt-3" id="analyzingProducts">
        </div>
        
        <div class="row g-3 border radius light-bg p-3 mt-3" id="analyzingOrders">
        </div>
        
        <div class="row g-3 border radius light-bg p-3 mt-3" id="analyzingVisitors">
        </div>
    </div>


    <?php include('./view/footer.php'); ?>



<script>
    $(document).ready(function () {
        
        analyzingProducts();
        analyzingOrders();
        analyzingVisitors();
        
    
    });
</script>
