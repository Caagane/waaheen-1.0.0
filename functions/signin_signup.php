<?php
session_start();
	// Include database file
	include '../classes/Users.php';
	
	$UserObj = new Users();
	
	// SignUp inserting data
	if(isset($_POST['pass'])) {
		function check_input($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		$first_name = check_input($_POST['first_name']);
		$last_name = check_input($_POST['last_name']);
		$email = check_input($_POST['email']);
		$pass = md5(check_input($_POST['pass']));
		$country = check_input($_POST['country']);
		$city = check_input($_POST['city']);
		$phone = check_input($_POST['phone']);

		$result = $UserObj->sign_up($first_name,$last_name,$email,$pass,$country,$city,$phone);
        
        if(!$result){
            echo 'Email Already Taken!';
        }
        else{
            echo 'Sign Up Successfully';
        }
	}

	// Login
	if(isset($_POST['password'])){
		function check_input($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		
		$email = check_input($_POST['email']);
		$password = md5(check_input($_POST['password']));
	
		$auth = $UserObj->check_login($email, $password);
	
		if(!$auth){
			echo 'Invalid username or password';
		}
		else{
			if ($_SESSION['waaheen_user_id'] == 0) {
				$_SESSION['waaheen_user_id'] = $auth;
				echo 'Login Successfully';
			} else {
				echo 'Already Logged-in!, <a href="signOut.php" class="fw-bold">LogOut</a> First and try again';
			}
		}
	}

?>