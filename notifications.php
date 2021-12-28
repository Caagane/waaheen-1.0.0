<?php include('./view/header.php'); ?>




    <div class="container m-auto justify-content-center my-5 py-5">
      <div class="row m-auto g-2 justify-items-center justify-content-center" id="notifications">

      </div>
    </div>




<?php include('./view/footer.php'); ?>


<script>
  $(document).ready(function () {
      
    // Load all notifications
    fetchNotifications();
    setInterval(function() {
      fetchNotifications();
    }, 10000);
    setInterval(function() {
      viewNotifications();
    }, 5000);

  });
</script>