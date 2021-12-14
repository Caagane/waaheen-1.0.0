// Fetch all categories
// Feting all products's categories 
function allCategories(){
    $dashboard_com_id = $('#dashboard_com_id').val();
    if ($dashboard_com_id !="") {
        $.ajax({
            type: 'POST',
            url: 'functions/products_categories.php',
            data: {
                com_id: $dashboard_com_id,
                fetchCategories: 1
            },
            success:function(data){
                $('#categories').html(data);
            }
        });
    }
}

// Fetch latest 8 product
function lastProducts(){
    $dashboard_com_id = $('#dashboard_com_id').val();
    // alert($categories);
    if ($dashboard_com_id != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/products_categories.php',
            data: {
                com_id: $dashboard_com_id,
                lastProducts: 1
            },
            success:function(data){
                $('#categorysProducts').html(data);
            }
        });
    }
}

// Related Products in Product Details page
function relatedProducts(){
    $com_id = $('#com_id').val();
    $product_id = $('#product_id').val();
    $productCategory = $('#productCategory').val();
    if ($com_id != "" && $productCategory != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/products_categories.php',
            data: {
                com_id: $com_id,
                product_id: $product_id,
                productCategory: $productCategory,
                relatedProducts: 1
            },
            success:function(data){
                $('#relatedProducts').html(data);
            }
        });
    }
}

// display if orderd already or not
function orderResult(){
    $userid = $('#userid').val();
    $product_id = $('#product_id').val();
    if ($product_id != "" && $userid != "0") {
        $.ajax({
            type: 'POST',
            url: 'functions/products_categories.php',
            data: {
                userid: $userid,
                product_id: $product_id,
                orderResult: 1
            },
            success:function(response){
                if (response === 'false') {
                    document.getElementById('addOrder').style.display = 'block';
                    document.getElementById('deleteOrder').style.display = 'none';
                } else {
                    document.getElementById('addOrder').style.display = 'none';
                    document.getElementById('deleteOrder').style.display = 'block';
                }
            }
        });
    }
}

// product likes 
function ProductlikesResult(){
    $userid = $('#userid').val();
    $product_id = $('#product_id').val();
    if ($product_id != "" && $userid != "0") {
        $.ajax({
            type: 'POST',
            url: 'functions/products_categories.php',
            data: {
                userid: $userid,
                product_id: $product_id,
                likesResult: 1
            },
            success:function(response){
                ProductLikesCounter()
                if (response === 'false') {
                    document.getElementById('addProductLike').style.display = 'block';
                    document.getElementById('deleteProductLike').style.display = 'none';
                } else {
                    document.getElementById('addProductLike').style.display = 'none';
                    document.getElementById('deleteProductLike').style.display = 'block';
                }
            }
        });
    }
}

// product like counter
function ProductLikesCounter(){
    $product_id = $('#product_id').val();
    if ($product_id != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/products_categories.php',
            data: {
                product_id: $product_id,
                ProductLikesCounter: 1
            },
            success:function(response){
                $('#allProductLikes1').html(response);
                $('#allProductLikes2').html(response);
            }
        });
    }
}

// Products in User's Local Area
function localProducts(){
    // $com_id = $('#dashboard_com_id').val();
    // alert($categories);
    $.ajax({
        type: 'POST',
        url: 'functions/products_categories.php',
        data: {
            // com_id: $com_id,
            localProducts: 1
        },
        success:function(data){
            $('#localProducts').html(data);
        }
    });
}

// Products info in dashboard
function Analizing(){
    $userid = $('#userid').val();
    if ($userid != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/products_categories.php',
            data: {
                userid: $userid,
                Analizing: 1
            },
            success:function(data){
                $('#Analizing').html(data);
            }
        });
    }
}



$(document).ready(function () {


    // Category
    // $('#add').click(function (event) {
    $('#insertProduct').click(function(event){
		var p_name = $('#p_name').val();
		var p_desc = $('#p_desc').val();
		var category = $('#category').val();
		var com_id = $('#com_id').val();
		if(p_name !='' && p_desc !='' && p_price !='' && category !='' && com_id !=''){
            var addProductForm = new FormData(this.form);
			$.ajax({
				type: 'POST',
                url: 'functions/products_categories.php',
				data: addProductForm,
                contentType: false,
                cache: false,
                processData: false,
				success:function(response){
                    if (response === "Product Added Successfully") {
                        document.getElementById('add_p_msg').style.color = 'lime';
                        $('#add_p_msg').html(response);
                        allCategories();
                        lastProducts();
                    } else {
                        document.getElementById('add_p_msg').style.color = 'red';
						$('#addProductForm')[0].reset();
                        $('#add_p_msg').html(response);
                    }
				}
			});
		}
		else{
            $('#add_p_msg').text("All Fields Are Require!");
		}
	}); 

    // fitering product by their categories
    $('#filterProducts').click(function(){
		$categories = $('#categories').val();
		$com_id = $('#dashboard_com_id').val();
		$userid = $('#userid').val();
		if($categories!=''){
            // alert($categories);
            $.ajax({
                type: 'POST',
                url: 'functions/products_categories.php',
                data: {
                    categories: $categories,
                    com_id: $com_id,
                    userid: $userid,
                    fetchCategorysProducts: 1
                },
                success:function(data){
                    $('#categorysProducts').html(data);
                }
            });
		}
	});


    
	//edit
	$(document).on('click', '.edit', function(){
		var product_id = $(this).data('id');
		var p_name = $('#p_name'+product_id).text();
		var p_desc = $('#p_desc'+product_id).text();
		var p_price = $('#p_price'+product_id).text();
		var e_category = $('#p_category'+product_id).text();
		$('#editProducts').modal('show');
		$('#e_p_name').val(p_name);
		$('#e_p_desc').val(p_desc);
		$('#e_p_price').val(p_price);
		$('#e_category').val(e_category);
		$('#editProdcutBtn').val(product_id);
	});

	$('#editProdcutBtn').click(function(){
		var product_id = $(this).val();
		var editProductForm = $('#editProductForm').serialize();
		$.ajax({
			type: 'POST',
            url: 'functions/products_categories.php',
			data: editProductForm + "&product_id="+product_id,
			success:function(response){
				$('#editProducts').modal('hide');
                $('#update_p_msg').html(response);
				$('#editProductForm')[0].reset();
				lastProducts();
			}
		});
	});
	//
	//delete
	$(document).on('click', '.delete', function(){
		var product_id = $(this).data('id');
		var p_name = $('#p_name'+product_id).text();
		$('#deleteModel').modal('show');
		$('#d_p_name').text(p_name);
		$('#deleteProduct').val(product_id);
	});

	$('#deleteProduct').click(function(){
		var product_id = $(this).val();
		$.ajax({
			type: 'POST',
            url: 'functions/products_categories.php',
			data: {
				product_id: product_id,
                delete_product: 1
			},
			success:function(){
				$('#deleteModel').modal('hide');
				lastProducts();
			}
		});
	});
	

	// Serch Product in Search Page
    $('#searchBtn').click(function(){
		$search = $('#search').val();
		$dist = $('#dist').val();
		if($search !=''){
            $.ajax({
                type: 'POST',
                url: 'functions/products_categories.php',
                data: {
                    search: $search,
                    dist: $dist,
                    SearchProduct: 1
                },
                success:function(data){
                    $('#searchResult').html(data);
                }
            });
		}
	});


	// Order Btns Functionality
	$('#addOrder').click(function(){
		$userid = $('#userid').val();
		$product_id = $('#product_id').val();
		$quantity = $('#quantity').val();
        $('#addOrder').text("...");
        document.getElementById('addOrder').style.pointerEvents = 'none';
        document.getElementById('addOrder').style.opacity = '80%';
		if ($product_id != "" && $userid != "0") {
			$.ajax({
				type: 'POST',
				url: 'functions/products_categories.php',
				data: {
					userid:$userid,
					product_id: $product_id,
					quantity: $quantity,
					addOrder: 1
				},
				success:function(){
					orderResult();
                    $('#addOrder').text("Order Now");
                    $('#quantity').val(0);
                    document.getElementById('addOrder').style.pointerEvents = 'visible';
                    document.getElementById('addOrder').style.opacity = '100%';
				}
			});
		}
	});

    // cancel order
    $('#deleteOrder').click(function(){
		$userid = $('#userid').val();
		$product_id = $('#product_id').val();
        $('#deleteOrder').text("...");
        document.getElementById('deleteOrder').style.pointerEvents = 'none';
        document.getElementById('deleteOrder').style.opacity = '80%';
		if ($product_id != "" && $userid != "0") {
			$.ajax({
				type: 'POST',
				url: 'functions/products_categories.php',
				data: {
					userid:$userid,
					product_id: $product_id,
					deleteOrder: 1
				},
				success:function(){
					orderResult();
                    $('#deleteOrder').text("Cancel Order");
                    document.getElementById('deleteOrder').style.pointerEvents = 'visible';
                    document.getElementById('deleteOrder').style.opacity = '100%';
				}
			});
		}
	});
    

	// like product
	$('#addProductLike').click(function(){
		$userid = $('#userid').val();
		$product_id = $('#product_id').val();
		if ($product_id != "" && $userid != "0") {
			$.ajax({
				type: 'POST',
				url: 'functions/products_categories.php',
				data: {
					userid:$userid,
					product_id: $product_id,
					addProductLike: 1
				},
				success:function(){
					ProductlikesResult();
				}
			});
		}
	});

    // unlike product
    $('#deleteProductLike').click(function(){
		$userid = $('#userid').val();
		$product_id = $('#product_id').val();
		if ($product_id != "" && $userid != "0") {
			$.ajax({
				type: 'POST',
				url: 'functions/products_categories.php',
				data: {
					userid:$userid,
					product_id: $product_id,
					deleteProductLike: 1
				},
				success:function(){
					ProductlikesResult();
				}
			});
		}
	});

});


