
<?php include('./view/header.php'); ?>


    <div class="container my-5 py-5">
        <div class="row px-lg-5 mx-lg-5 m-auto justify-content-evenly">

            <div class="col-lg-3 col-sm-12 p-3 light-bg border radius senders-bg custom-scroll">
            </div>

            

    <input style="display:none" type="text" value="" name="chaterid" id="chaterid">
    <input style="display:none" type="text" value="Waaheen Massenger" name="msg_from" id="msg_from">


            <div class="col-lg-8 col-sm-12 p-0 m-0 light-bg border radius message-bg message_bg">
                
              	<div class="radius text-dark p-1 header">
					<div class="d-flex text-start" id="chaterInfo">

						<div class="px-2">
                            <div class="img img-fluid" id="chaterImage"></div>
						</div>

						<div class="chaterName w-100">
						</div>

                        <button id="hideMsgModel" class="btn border radius border border-danger align-end py-1 px-2 m-1" style="float:right; right:0px"><i class="fa fa-times text-danger"></i></button>
					
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
    </div>

<?php include('./view/footer.php'); ?>


<script>
  $(document).ready(function () {
	// all chates
	chaters();
	setInterval(function() {
		chaters();
	}, 15000);
    
    chating();
	setInterval(function() {
		chating();
	}, 10000);
    
    

  });
</script>