<?php
session_start(); 
require 'dbcon.php';

if ($_SESSION['campusleague_admin_key'] == "verify_payment") {


    ?>

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <title>Verify Online Payment</title>
        <link rel="stylesheet" href="style-orginal9.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="removeBanner.js"></script>
    </head>
    <style>
<style>
   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
  *{
    font-family: 'Poppins', sans-serif;
  }
  body{
       background-color: #eaedf1;
    }

    .pay_method_box{
    width: 200px;
    height: 130px;
    background-color: white;
    margin-top: 30px;
    border-radius: 30px;
    box-shadow: inset 1px 1px 2px #eeeeee,2px 3px 25px #747474;
    
  }
  .serv1{
    width: 80%;
    height: auto;
    margin-top: 30px;
    display: flex;
    justify-content: center;
    align-items: center;

}
.serv2{
  width: 80%;
  height: auto;
  display: flex;
  justify-content: center;
  align-items: center;

}
.serv_box{
  margin: 20px;
  width: 120px;
  height: 110px;
  padding-left: 10px;
  padding-right: 10px;
  border-radius: 10px;
  background-color: #eaedf1;
  box-shadow: 3px 3px 10px #747474;
  text-decoration: none;
  color: #000;
}
.serv_ic{
  width: 40px;
  margin-top: 15px;
}
.serv_ic_txt{
  margin-top: 10px;
  font-size: 12px;
}
</style>
     
    </style>
    <body>
    
    
    
    
    <div id="bg">
<center>

  <h1 style="font-weight: 700; font-size: 22px; margin-top: 40px;" >Verify Payment</h1>

  <div onclick="online_payment_verify()" class="pay_method_box" style="margin-top: 70px;">
    <img src="cl/online_pay.png" width="90px" style="margin-top: 10px;" />
    <p style="margin-top: -10px;">Online Payment Verify</p>
  </div>

  <div onclick="offline_payment_verify()" class="pay_method_box" style="margin-top: 70px;">
    <img src="cl/offline_pay.png" width="90px" style="margin-top: 10px;" />
    <p style="margin-top: -10px;">Offline Payment Verify</p>
  </div>


  <div class="serv1">
            <a class="serv_box" href="register_stu_all">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/4883/4883294.png"/>
                <h5 class="serv_ic_txt">Registerd Student</h5>
            </a>

            <a class="serv_box" href="pend_stu">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/6811/6811049.png"/>
                <h5 class="serv_ic_txt">Pending Student</h5>
            </a>
      </div>

  <button onclick="logout()" style="border:none; background-color:green; color:white; padding:5px; width:100px; margin-top:40px; border-radius:30px ">Logout</button>

</center>

</div>
    </body>
    <script>
        function online_payment_verify(){
          window.location.href = "online_payment";
        }
        function offline_payment_verify(){
          window.location.href = "offline_payment";
        }
        function logout(){
            window.location.replace("logout");
        }
    </script>
    </html>
    
    <?php

}
else{

    header("Location: /");

}