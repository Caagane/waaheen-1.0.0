// near Companies in local areal
function localCompanies(){
    $.ajax({
        type: 'POST',
        url: 'functions/users.php',
        data: {
            localCompanies: 1
        },
        success:function(data){
            $('#localCompanies').html(data);
        }
    });
}

// near Companies in local areal
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


$(document).ready(function () {
    
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

});