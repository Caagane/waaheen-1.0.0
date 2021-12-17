<?php
session_start();

if (!$_SESSION['waaheen_user_id']) {
  $_SESSION['waaheen_user_id'] = 0;
}
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



<input type="text" id="userid" value="<?php  echo $_SESSION['waaheen_user_id']; ?>" style="display:none;">

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









    <nav class="navbar navbar-expand-lg navbar-light py-2 fixed-top custom-color">
      <div class="container">
        <a href="/home" class="navbar-brand brand-on-mobile"><span class="text-white fw-bold">Waaheen</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
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
                <a href="notifications" class="nav-link text-light btn-sm fw-bold btn-sm"><i class="fa fa-bell nav-icons"></i> Notifications</a>
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
                  <a id="openLogin" class="nav-link btn px-4 ms-2 btn-light text-dark btn-sm"><i class="fa fa-sign-in-alt"></i> Sign in</a>
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
                  <button class="btn nav-link text-light btn-sm"><i class="fa fa-user nav-icons"></i></button>
                </li>
                <?php
              }
            ?>
          </ul>
        </div>
      </div>
      <div class="p-3 bg-white d-flex flex-column profile-drop-down rounded border">
        <a href="#" class="w-100">Profile</a>
        <a href="settings.php" class="w-100">Settings</a>
        <a href="SignOut" class="w-100">SignOut</a>
      </div>
    </nav>

    
