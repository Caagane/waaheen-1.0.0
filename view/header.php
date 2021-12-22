<?php
session_start();

if(!isset($_SESSION['waaheen_user_id'])){
  $_SESSION['waaheen_user_id'] = 0;
}

$city = "Muqdisho"; 
$country = "Somalia"; 

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    
    <!-- FontAwsamoe -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Waaheen.com</title>

    <style>
    
    .area{
        background: transparent;  
        width: 100%;
        height:100vh;
        position: fixed;
        z-index: -1;
        top: 0%;
        overflow: hidden;
        animation: animate111 25s linear infinite;
    }
    
    .circles{
        width: 100%;
        height: 100%;
        float: left;
    }
    
    .circles li{
        position: absolute;
        display: block;
        list-style: none;
        width: 100%;
        height: 25px;
        animation: animate 25s linear infinite;
        left: -10%;
        rotate: -100deg;
    }
    .circles li i{
        color: #ccc;
        font-size: 1.5rem;
    }
    
    .circles li:nth-child(1){
        top: 45%;
        width: 20px;
        height: 20px;
        animation-delay: 20s;
        animation-duration: 60s;
    }
    
    
    .circles li:nth-child(2){
        top: 90%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 60s;
    }
    
    .circles li:nth-child(3){
        top: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 20s;
        animation-duration: 60s;
    }
    
    .circles li:nth-child(4){
        top: 40%;
        width: 20px;
        height: 20px;
        animation-delay: 20s;
        animation-duration: 50s;
        font-size: 2rem;
    }
    
    .circles li:nth-child(5){
        top: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
        animation-duration: 60s;
    }
    
    .circles li:nth-child(6){
        top: 75%;
        width: 20px;
        height: 20px;
        animation-delay: 3s;
        animation-duration: 50s;
    }
    
    .circles li:nth-child(7){
        top: 35%;
        width: 20px;
        height: 20px;
        animation-delay: 7s;
        animation-duration: 60s;
    }
    
    .circles li:nth-child(8){
        top: 50%;
        width: 20px;
        height: 20px;
        animation-delay: 15s;
        animation-duration: 60s;
    }
    
    .circles li:nth-child(9){
        top: 28%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 60s;
    }
    
    .circles li:nth-child(10){
        top: 85%;
        width: 20px;
        height: 20px;
        animation-delay: 6s;
        animation-duration: 50s;
    }
    
    .circles li:nth-child(11){
        top: 52%;
        width: 20px;
        height: 20px;
        animation-delay: 20s;
        animation-duration: 50s;
    }
    
    .circles li:nth-child(12){
        top: 55%;
        width: 20px;
        height: 20px;
        animation-delay: 20s;
        animation-duration: 50s;
    }
    
    .circles li:nth-child(13){
        top: 53%;
        width: 20px;
        height: 20px;
        animation-delay: 20s;
        animation-duration: 50s;
    }
    
    .circles li:nth-child(14){
        top: 54%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
        animation-duration: 50s;
    }
    
    .circles li:nth-child(15){
        top: 50%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 50s;
    }
    
    @keyframes animate {
    
      0%{
        transform: translateX(0) rotate(0deg);
        opacity: 1;
        border-radius: 100%;
    }
    
    90%{
        opacity: 1;
    }
    
    100%{
        transform: translateX(120vw) rotate(0deg);
        opacity: 1;
        border-radius: 100%;
    }
    
    }
      </style>
</head>
<body style="background: #fff">




  <!-- Animated Background -->
  <div class="area">
    <ul class="circles">
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish" style="font-size:72px;"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      <li><i class="fa fa-fish"></i></li>
      
    </ul>
  </div>









    <nav class="navbar navbar-expand-lg navbar-dark py-2 fixed-top custom-color">
      <div class="container">
        <a href="/home" class="navbar-brand brand-on-mobile"><span class="text-white fw-bold">Waaheen</span></a>
        <button class="navbar-toggler btn-lg shadow-none userBtn2" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
          <span class="navbar-toggler-icon" />
        </button>
        <div class="collapse navbar-collapse justify-content-around aling-items-center text-center" id="navbar">
          <a href="./" class="navbar-brand brand-on-desktop"><span class="text-white fw-bold">Waaheen</span></a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="./" class="nav-link text-light btn-sm fw-bold btn-sm"><i class="fa fa-home nav-icons"></i> Home</a>
            </li>
            <li class="nav-item">
              <a href="search" class="nav-link text-light btn-sm fw-bold btn-sm"><i class="fa fa-search nav-icons"></i> Search</a>
            </li>
            <!-- <li class="nav-item">
              <a href="/news" class="nav-link text-light btn-sm fw-bold btn-sm"><i class="fa fa-pen nav-icons"></i> News</a>
            </li> -->
            <?php
              if ($_SESSION['waaheen_user_id'] != 0) {
                ?>
              <li class="nav-item">
                <a href="notifications" class="nav-link text-light btn-sm fw-bold btn-sm"><i class="fa fa-bell nav-icons"><span class="bg-danger border rounded-circle p-1" style="width:25px;margin-top:0px;margin-left:-80px;float:right;font-size:10px;display:none" id="countNoti"> </span> </i> Notifications</a>
              </li>
              <?php
              }
              ?>
          </ul>
          <ul class="navbar-nav">
            <?php
              if ($_SESSION['waaheen_user_id'] == 0) {
                ?>
                <li class="nav-item">
                  <a id="showLoginModel" class="nav-link btn px-4 ms-2 btn-light text-dark btn-sm"><i class="fa fa-sign-in-alt"></i> Sign in</a>
                </li>
                <?php
              } 
              else {
                ?>
                <li class="nav-item">
                  <a href="messages" class="nav-link text-light btn-sm"><i class="fab fa-facebook-messenger nav-icons"></i></a>
                </li>
                <li class="nav-item">
                  <a href="carts" class="nav-link text-light btn-sm"><i class="fa fa-shopping-cart nav-icons"></i></a>
                </li>
                <li class="nav-item">
                  <button class="btn nav-link text-light btn-sm userBtn m-auto"><i class="fa fa-user nav-icons"></i></button>
                  <button class="btn nav-link text-light btn-sm userBtn1 m-auto" style="display:none;"><i class="fa fa-user nav-icons"></i></button>
                </li>
                <?php
              }
            ?>
          </ul>
        </div>
      </div>
      <div class="p-3 bg-white flex-column profile-drop-down rounded border profileLinks">
        <a href="dashboard" class="w-100">Profile</a>
        <a href="settings.php" class="w-100">Settings</a>
        <a href="SignOut" class="w-100">SignOut</a>
      </div>
    </nav>

    





    <input type="text" id="userid" value="<?php  echo $_SESSION['waaheen_user_id']; ?>" style="display:none;">
    <input type="text" id="city" value="<?php  echo $city; ?>" style="display:none;">
    <input type="text" id="country" value="<?php  echo $country; ?>" style="display:none;">






<div class="custom_model custom-scroll" id="loginModel">
<button id="hideLoginModel" class="btn border radius border btn-lg  float-end py-1 px-3 m-2 m-md-5"><i class="fa fa-times text-white"></i></button>
<br>
<section class="my-5">
      <div class="container h-custom">
        <div class="row justify-content-center align-items-center">
          <div class="light-bg1 radius p-3 border col-md-4 col-sm-12">
            <form id="loginData">
              <p class="text-center lead fw-bold mb-3 me-3">Sign in with</p>
              <div class="d-flex flex-row align-items-center justify-content-center">
                <button type="button" class="w-50 btn btn-lg p-2 btn-primary btn-floating me-1">
                  <i class="fab fa-facebook-f p-2"></i> Facebook
                </button>
                <button type="button" class="w-50 btn btn-lg p-2 btn-light border btn-floating ms-1">
                  <i class="fab fa-google p-2"></i> Google
                </button>
              </div>
              <div class="divider d-flex align-items-center mb-2 mt-4">
                <p class="text-center fw-bold mx-3 mb-0">Or</p>
              </div>

              
              <div class="my-3 text-center lead">
                <span id="loginResponse"></span>
              </div>

              
              <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="bg-light form-control form-control-lg" placeholder="Enter a valid email address" />
              </div>
              
              <div class="form-outline mb-3">
                <input type="password" name="password" id="password" class="bg-light form-control form-control-lg" placeholder="Enter password" />
              </div>
              <div class="d-flex justify-content-between align-items-center">
                
                <div class="form-check mb-0">
                  <input class="form-check-input me-1" type="checkbox" />
                  <label class="form-check-label">
                    Remember me
                  </label>
                </div>
                <a href=""class="text-body">Forgot password?</a>
              </div>
              <div class="text-center text-lg-start mt-3">
                <button type="button" name="login" id="login" class="btn p-2 btn-primary my-3 w-50 custom-color" style="padding-left: 2.5rem, padding-right: 2.5rem">Login</button>
                <p class="lead small mt-2 pt-1 mb-0">Don't have an account? <a class="fw-bold text-dark" href="signup"class="text-body text-primary">Signup With Email</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>

</div>



    
