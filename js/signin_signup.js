
$(document).ready(function () {

    $('#signUp').click(function () {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var pass = $('#pass').val();
        var pass_again = $('#pass_again').val();
        var country = $('#country').val();
        var city = $('#city').val();
        var phone = $('#phone').val();
        if (first_name == '' || last_name == '' || country == '' || city == '' || email == '' || pass == '' || pass_again == '' || phone == '') {
            document.getElementById('response').style.color = 'red';
            $('#response').html('All Fields are Require');
        } else {
            if (pass_again != pass)  {
                $('#pass_again_msg').text("password confirmation doesn't match");
            }
            else {
                $('#pass_again_msg').text("");
                var formData = $('#signUpForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'functions/signin_signup.php',
                    data: formData,
                    success: function (response) {
                        
                        if (response === "Sign Up Successfully") {
                            $('#first_name').val('');
                            $('#last_name').val('');
                            $('#email').val('');
                            $('#pass').val('');
                            $('#pass_again').val('');
                            $('#country').val('');
                            $('#city').val('');
                            $('#phone').val('');
                            
                            document.getElementById('response').style.color = 'lime';
                            $('#response').html(response);
                        }
                        else {
                            document.getElementById('response').style.color = 'red';
                            $('#response').html(response);
                        }
                        
                        // $('#alert').slideDown();
                        // $('#alerttext').text('Member Added Successfully');
                    }
                });
            }
        }

    });

    // Login
    $('#login').click(function(){
		var email = $('#email').val();
		var password = $('#password').val();
		if(email!='' && password!==''){
			var loginData = $('#loginData').serialize();
			$.ajax({
				type: 'POST',
                url: 'functions/signin_signup.php',
				data: loginData,
				success:function(response){
                    if (response === "Login Successfully") {
                        document.getElementById('loginResponse').style.color = 'green';
                        $('#loginResponse').html(response);
                        location.reload();
                    } else {
                        document.getElementById('loginResponse').style.color = 'red';
                        $('#loginResponse').html(response);
                    }
				}
			});
		}
		else{
            $('#loginResponse').text("Please Enter Both Email & Password");
		}
	}); 
});