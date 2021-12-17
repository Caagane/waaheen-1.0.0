
<?php include('./view/header.php'); ?>


    <div class="container my-5 py-5">
        <div class="row px-lg-5 mx-lg-5 m-auto justify-content-evenly">

            <div class="col-lg-3 col-sm-12 p-3 light-bg border radius senders-bg custom-scroll">
            </div>


            <input style="display:none" type="text" value="" name="chaterid" id="chaterid">


            <div class="col-lg-8 col-sm-12 p-0 m-0 light-bg border radius message-bg">
                
              	<div class="radius text-dark p-1 header">
					<div class="d-flex text-start" id="chaterInfo">

						<div class="px-2">
                            <div class="img img-fluid" id="chaterImage"></div>
						</div>

						<div class="chaterName">
						</div>

					</div>
				</div>

                <div class="messages p-3 custom-scroll">
                    <div class="w-100 d-flex flex-column justify-content-center justify-items-center text-center" style="height:100%;">
                        <i class="fab fa-facebook-messenger" style="font-size:72px; color:#666;"></i>
                        <h6>No Message Yes</h6>
                    </div>
                </div>

                <div class="form-group d-flex">
                    <input type="text" class="form-control shadow-none" name="message" id="message" placeholder="Write a message...">
                    <button class="btn btn-primary shadow-none custom-color">Send</button>
                </div>

            </div>


        </div>
    </div>


<?php include('./view/footer.php'); ?>


<script>
  $(document).ready(function () {
	// all chates
	chaters();
    
    chating();
	setInterval(function() {
		chating();
	}, 5000);

  });
</script>