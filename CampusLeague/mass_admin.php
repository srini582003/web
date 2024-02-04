<?php
session_start(); 
require 'dbcon.php';

if ($_SESSION['campusleague_admin_key'] == "mass_admin") {


    ?>

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <title>Admin Pannel</title>
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

    <center>

    <img src="cl/logo.png"style="width: 90px; margin-top:30px" >
    <h4 style="font-weight: 700;">Admin Pannel</h4>
           
                   
    <div class="serv1">
            <a class="serv_box" href="mass_register_stu">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/4883/4883294.png"/>
                <h5 class="serv_ic_txt">Registerd Student</h5>
            </a>

            <a class="serv_box" href="mass_pend_stu">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/6811/6811049.png"/>
                <h5 class="serv_ic_txt">Pending Student</h5>
            </a>
      </div>

      <div class="serv1">
            <a class="serv_box" href="mass_event_register">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/5326/5326164.png"/>
                <h5 class="serv_ic_txt">Event Change Registerd</h5>
            </a>

            <a class="serv_box" href="mass_event_pend">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/5326/5326164.png"/>
                <h5 class="serv_ic_txt">Event Change Pend </h5>
            </a>
            
      </div>
      <div class="serv1">
            <a class="serv_box" href="mass_event_list">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/2273/2273225.png"/>
                <h5 class="serv_ic_txt">Evend List</h5>
            </a>
            
      </div>

      
      <button onclick="logout()" style="border:none; background-color:green; color:white; padding:5px; width:100px; margin-top:40px; border-radius:30px ">Logout</button>
      
</center>

        <script>


        function logout(){
            window.location.replace("logout");
        }

    
        </script>
    
    
    
    </body>
    </html>
    
    <?php





}
else{

    header("Location: /");

}

?>