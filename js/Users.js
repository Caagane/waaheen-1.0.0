// near Companies in local areal
function localCompanies(){
    $city = $('#city').val();
    $country = $('#country').val();
    $userid = $('#userid').val();
    $.ajax({
        type: 'POST',
        url: 'functions/users.php',
        data: {
            city: $city,
            country: $country,
            userid: $userid,
            localCompanies: 1
        },
        success:function(data){
            $('#localCompanies').html(data);
        }
    });
}

// Trending Companies in local areal
function trendingCompanies(){
    $city = $('#city').val();
    $country = $('#country').val();
    $userid = $('#userid').val();
    $.ajax({
        type: 'POST',
        url: 'functions/users.php',
        data: {
            city: $city,
            country: $country,
            userid: $userid,
            trendingCompanies: 1
        },
        success:function(data){
            $('#trendingCompanies').html(data);
        }
    });
}

// Company info in profile
function comProfile(){
    $profile_id = $('#profile_id').val();
    if ($profile_id != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                profile_id: $profile_id,
                comProfile: 1
            },
            success:function(data){
                $('#comProfile').html(data);
            }
        });
    }
}


// user's carts
function carts(){
    $userid = $('#userid').val();
    if ($userid != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                userid: $userid,
                fetchcarts: 1
            },
            success:function(data){
                $('#carts').html(data);
            }
        });
    }
}



function chaters(){
    $userid = $('#userid').val();
    if ($userid != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                userid: $userid,
                chaters: 1
            },
            success:function(data){
                $('.senders-bg').html(data);
            }
        });
    }
}

function chating(){
    $userid = $('#userid').val();
    $chaterid = $('#chaterid').val();
    if ($userid != "" && $chaterid != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                userid: $userid,
                chaterid: $chaterid,
                chating: 1
            },
            success:function(data){
                $('.messages').html(data);
            }
        });
    }
}
function scrollDown(){
    var objDiv = document.getElementById("allMessagesBg");
    objDiv.scrollTop = objDiv.scrollHeight;
}

// display if orderd already or not
function clientResult(){
    $userid = $('#userid').val();
    $profile_id = $('#profile_id').val();
    if ($profile_id != "" && $userid != "0") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                userid: $userid,
                profile_id: $profile_id,
                clientResult: 1
            },
            success:function(res){
                if (res === 'false') {
                    document.getElementById('client').style.display = 'block';
                    document.getElementById('unClient').style.display = 'none';
                } else {
                    document.getElementById('client').style.display = 'none';
                    document.getElementById('unClient').style.display = 'block';
                }
            }
        });
    }
}

// Preparing notifications!!!
function notifications(){
    $userid = $('#userid').val();
    if ($userid != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                userid: $userid,
                notifications: 1
            },
            success:function(data){
                if (data != "false") {
                    if (data > 99) {
                        data = '99+';
                        $('#countNoti').html(data);
                    } else {
                        $('#countNoti').html(data);
                    }
                    document.getElementById('countNoti').style.display='block';
                } 
            }
        });
    }
}
// View all Notifications
function viewNotifications(){
    $userid = $('#userid').val();
    if ($userid != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                userid: $userid,
                viewNotifications: 1
            },
            success:function(){
                
                if (document.getElementById('countNoti').style.display='block') {
                    document.getElementById('countNoti').style.display='none';
                }
            }
        });
    }
}

// fetch notifications
function fetchNotifications(){
    $userid = $('#userid').val();
    if ($userid != "") {
        $.ajax({
            type: 'POST',
            url: 'functions/users.php',
            data: {
                userid: $userid,
                fetchNotifications: 1
            },
            success:function(data){
                $('#notifications').html(data);
            }
        });
    }
}

function facebook(){
    $.ajax({
        type: 'POST',
        url: 'social_login/facebook.php',
        data: {
            facebook: 1
        },
        success:function(data){
            $('.facebook').html(data);
        }
    });
}
function google(){
    $.ajax({
        type: 'POST',
        url: 'social_login/google.php',
        data: {
            google: 1
        },
        success:function(data){
            $('.google').html(data);
        }
    });
}

$(document).ready(function () {


    facebook();
    google();

    
    $('#switch').click(function(){
		$user_id = $('#user_id').val();
		$role = $('#role').val();
		$role_desc = $('#role_desc').val();
		$delivery_desc = $('#delivery_desc').val();
		$address = $('#address').val();
		if ($user_id != "0" && $role != "" && $role_desc != "" && $delivery_desc != "" && $address != "") {
			var switchData = $('#switchData').serialize();
			$.ajax({
				type: 'POST',
                url: 'functions/users.php',
				data: switchData,
				success:function(res){
                    
                    $('#switchData')[0].reset();

                    alert('Switched Successfully');
                    document.getElementById('switchMsg').style.color = 'lime';
				}
			});
		}
        else {
            // document.getElementById('switchMsg').style.color = 'red';
            // $('#switchMsg').text("");
            alert('All Fields Are Require!');
        }
	});

    // Basic Plan 
    $('#basicPlan').click(function(){
		$user_id = $('#user_id1').val();
		$basic_period_time = $('#basic_period_time').val();
		$basic_send_to = $('#basic_send_to').val();
		$basic_send_from = $('#basic_send_from').val();
		$basic_plan = $('#basic_plan').val();
        
        document.getElementById('basicPlan').style.pointerEvents = 'none';
        document.getElementById('basicPlan').style.opacity = '50%';

		if ($user_id != "0" && $basic_period_time != "" && $basic_send_to != "" && $basic_send_from != "" && $basic_plan != "") {
			var BasicPlanData = $('#BasicPlanData').serialize();
			$.ajax({
				type: 'POST',
                url: 'functions/users.php',
				data: BasicPlanData,
				success:function(res){
                    
                    $('#BasicPlanData')[0].reset();

                    document.getElementById('basicPlan').style.pointerEvents = 'visible';
                    document.getElementById('basicPlan').style.opacity = '100%';

                    alert('Thank you To buy a Subscription, Wait for one hour!!!');
                    document.getElementById('basichMsg').style.color = 'lime';
                    
                    
                    $('.basic_total').text('');
                    $('.basic_info').text('');
				}
			});
		}
        else {
            // document.getElementById('switchMsg').style.color = 'red';
            // $('#switchMsg').text("");
            alert('All Fields Are Require!');
        }
	});
        
    
    // Pro Plan 
    $('#proPlan').click(function(){
		$user_id = $('#user_id').val();
		$pro_period_time = $('#pro_period_time').val();
		$pro_send_to = $('#pro_send_to').val();
		$pro_send_from = $('#pro_send_from').val();
		$pro_plan = $('#pro_plan').val();
        
        document.getElementById('proPlan').style.pointerEvents = 'none';
        document.getElementById('proPlan').style.opacity = '50%';

		if ($user_id != "0" && $pro_period_time != "" && $pro_send_to != "" && $pro_send_from != "" && $pro_plan != "") {
			var ProPlanData = $('#ProPlanData').serialize();
			$.ajax({
				type: 'POST',
                url: 'functions/users.php',
				data: ProPlanData,
				success:function(res){
                    
                    $('#ProPlanData')[0].reset();

                    document.getElementById('proPlan').style.pointerEvents = 'visible';
                    document.getElementById('proPlan').style.opacity = '100%';

                    alert('Thank you To buy a Subscription, Wait for one hour!!!');
                    document.getElementById('prohMsg').style.color = 'lime';
                    
                    $('.pro_total').text('');
                    $('.pro_info').text('');
				}
			});
		}
        else {
            // document.getElementById('switchMsg').style.color = 'red';
            // $('#switchMsg').text("");
            alert('All Fields Are Require!');
        }
	});

    // client Btns Functionality
	$('#client').click(function(){
		$userid = $('#userid').val();
		$profile_id = $('#profile_id').val();
        $('#client').text("...");
        document.getElementById('client').style.pointerEvents = 'none';
        document.getElementById('client').style.opacity = '80%';
		if ($profile_id != "" && $userid != "0") {
			$.ajax({
				type: 'POST',
				url: 'functions/users.php',
				data: {
					userid:$userid,
					profile_id: $profile_id,
					client: 1
				},
				success:function(){
					clientResult();
                    $('#client').text("Client");
                    document.getElementById('client').style.pointerEvents = 'visible';
                    document.getElementById('client').style.opacity = '100%';
				}
			});
		}
	});

    // cancel client
    $('#unClient').click(function(){
		$userid = $('#userid').val();
		$profile_id = $('#profile_id').val();
        $('#unClient').text("...");
        document.getElementById('unClient').style.pointerEvents = 'none';
        document.getElementById('unClient').style.opacity = '80%';
		if ($profile_id != "" && $userid != "0") {
			$.ajax({
				type: 'POST',
				url: 'functions/users.php',
				data: {
					userid:$userid,
					profile_id: $profile_id,
					unClient: 1
				},
				success:function(){
					clientResult();
                    $('#unClient').text("Un Client");
                    document.getElementById('unClient').style.pointerEvents = 'visible';
                    document.getElementById('unClient').style.opacity = '100%';
				}
			});
		}
	});

    // sending a message
    $('#sendmsg').click(function(){
		$userid = $('#userid').val();
		$chaterid = $('#chaterid').val();
		$message = $('.message').val();
		$msg_from = $('#msg_from').val();
		if ($chaterid != "" && $userid != "0") {
            if ($message != "") {
                document.getElementById('sendmsg').style.pointerEvents = 'none';
                document.getElementById('sendmsg').style.opacity = '50%';
                $.ajax({
                    type: 'POST',
                    url: 'functions/users.php',
                    data: {
                        userid:$userid,
                        chaterid: $chaterid,
                        message: $message,
                        msg_from: $msg_from,
                        sendmsg: 1
                    },
                    success:function(){
                        $('.message').val('');
                        chating();
                        document.getElementById('sendmsg').style.pointerEvents = 'visible';
                        document.getElementById('sendmsg').style.opacity = '100%';

                        setTimeout(scrollDown, 1000)
                        
                    }
                });
            }
		}
	});

});