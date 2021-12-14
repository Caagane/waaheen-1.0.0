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

});