

<?php include('./view/header.php'); ?>


<div class="container mt-5 pt-5 px-md-5">
      <div class="row m-1 mb-5 light-bg px-2 py-4 p-md-5 border radius">
        <div class="col-md-12">
          <div class="d-flex text-start">
            <?php
								if (empty($_GET['com_img'])) {
									?>
										<i class="fa fa-building mt-2 ms-2 me-2" style="font-size: 30px;"></i>
									<?php
								} else {
									?>
									<div class="img img-fluid" style="background-image: url('./img/profiles/<?php echo $_GET['com_img']; ?>')"></div>
									<?php
								}
            ?>
						<div class="px-2 ">
							<h6><?php  echo $_GET['com-f-name'];?> <?php  echo $_GET['com-l-name'];?></h6>
							<p style="margin-top: -6px"> <i class="fa fa-map-marker-alt"></i> 2km Away</p>
						</div>
					</div>
        </div>
        <div class="col-md-5 col-sm-12"><?php $tusale = 'products.png'; ?>

        <div class="product-view-img radius" style="background-image: url('./img/products/<?php  echo $_GET['product-img'];?>')"></div>

          
          <!-- <div class="d-flex justify-content-around">
            <div class="product-view-imgs border p-2 rounded" style="background-image: url('./img/asset/products.png')"></div>
            <div class="product-view-imgs border p-2 rounded" style="background-image: url('./img/asset/products.png')"></div>
            <div class="product-view-imgs border p-2 rounded" style="background-image: url('./img/asset/products.png')"></div>
          </div> -->
        </div>
        <div class="col-md-7 col-sm-12 d-flex flex-column justify-content-center p-md-4">
          <h4 style="margin-bottom:-5px;"><?php  echo $_GET['product-name'];?></h4>
          <h5 style="margin-bottom:-5px;" class="my-2"><?php  echo $_GET['product-price'];?>$</h5>
          <div class="col-md-6">
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Quantity" id="quantity">
                </div>
              </div>
        <?php
        if ($_SESSION['waaheen_user_id'] == "0" || $_SESSION['waaheen_user_id'] == $_GET['com_id']) {
        ?>
          <div class="d-md-flex justify-content-center justify-content-md-start mb-3 " style="pointer-events: none; opacity:33%">
              <div class="col-md-6 col-sm-12 my-3 me-md-3" id="order">
                <button class="w-100 btn rounded px-5 btn-primary custom-color" id="addOrder" style="display:none;">Order Now</button>
                <button class="w-100 btn rounded px-5 btn-danger" id="deleteOrder" style="display:none;">Cancel Order</button>
              </div>
              
              <div class="col-md-6 col-sm-12 my-3 d-flex">
                <button class="btn rounded me-1 border light-bg" style="display:none;" id="addProductLike"> <i class="fa fa-heart"></i> <span id="allProductLikes1"></span> </button>
                <button class="btn rounded me-1 border light-bg" style="display:none;" id="deleteProductLike"> <i class="fa fa-heart text-danger"></i> <span id="allProductLikes2"></span> </button>
                
                <button class="btn rounded ms-1 border light-bg" id="showMessageModel"> <i class="fab fa-facebook-messenger"></i> Message </button>
              </div>
          </div>
          <?php
        } else {
          ?>
            <div class="d-md-flex justify-content-center justify-content-md-start mb-3 ">
                <div class="col-md-6 col-sm-12 my-3 me-md-3" id="order">
                  <button class="w-100 btn rounded px-5 btn-primary custom-color" id="addOrder" style="display:none;">Order Now</button>
                  <button class="w-100 btn rounded px-5 btn-danger" id="deleteOrder" style="display:none;">Cancel Order</button>
                </div>
                
                <div class="col-md-6 col-sm-12 my-3 d-flex">
                  <button class="btn rounded me-1 border light-bg" style="display:none;" id="addProductLike"> <i class="fa fa-heart"></i> <span id="allProductLikes1"></span> </button>
                  <button class="btn rounded me-1 border light-bg" style="display:none;" id="deleteProductLike"> <i class="fa fa-heart text-danger"></i> <span id="allProductLikes2"></span> </button>
                  
                  <button class="btn rounded ms-1 border light-bg" id="showMessageModel"> <i class="fab fa-facebook-messenger"></i> Message </button>
                </div>
            </div>
            <?php
        }
          ?>
          <p class="lead"><?php  echo $_GET['product-desc'];?></p>
        </div>
        </div>
    </div>


    <input style="display:none" type="text" id="product_id" value="<?php  echo $_GET['productid'];?>">
    <input style="display:none" type="text" id="com_id" value="<?php  echo $_GET['com_id'];?>">
    <input style="display:none" type="text" id="productCategory" value="<?php  echo $_GET['category'];?>">
    <input style="display:none" type="text" value="<?php echo $_GET['com_id']; ?>" name="chaterid" id="chaterid">
    <input style="display:none" type="text" value="<?php echo $_GET['product-name']; ?>" name="msg_from" id="msg_from">
            

    
    <div class="container px-md-5 mb-5">
          <h4 class="col-md-12 text-start fw-bold"> <i class="fa fa-building"></i> Related Products "<small style="font-size:14px">From <?php  echo $_GET['com-f-name'];?> <?php  echo $_GET['com-l-name'];?></small>" </h4>
        <div class="row">
            <div id="relatedProducts" class=" py-3 row g-2 overflow-hidden justify-content-evenly text-center m-auto">

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

                <div class="messages p-3 custom-scroll"  id="allMessagesBg">
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

      //if Product ordered or not
      orderResult();
      // products likes
      ProductlikesResult();
      // product likes COUNTER
      ProductLikesCounter();
      // Related Products in Product Details page 
      relatedProducts();
      // visit counter
      visitCounter();
      // chating
      chating();
  });
</script>



