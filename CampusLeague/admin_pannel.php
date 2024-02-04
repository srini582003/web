<?php
session_start(); 
require 'dbcon.php';

if ($_SESSION['campusleague_admin_key'] == "admin_pannel") {


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

    .modal-content{
  border-radius: 20px;
  width: 90%;
  align-items: center;
  margin-top: 25%;

  
}
.close{
    margin-top: 12px;
    left: 0;
    width: 25px;
    height: 25px;
    border-radius: 50px;
    background-color: #67b88388;
    margin-left: 85%;
    border: none;
    align-items: center;
    justify-content: center;
    color:#fff;


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
.fm-ip{
    border-radius: 20px;
    text-align: center;
    background-color: #dff0e5;
    border-width: 2px;
    border-color: green;
    font-family: Arial, Helvetica, sans-serif;
    letter-spacing: 1px;
    font-weight: 600;
    font-size: 15px;
    width: 200px;
    padding: 7px;
    border-style: solid;
    color: green;
}
.reg_bt{
  margin-top:10px; 
  width:120px; 
  border:none; 
  padding:6px; 
  background-color:#3ea814;
  color:#fff; 
  border-radius:20px; 
  font-family: Arial; 
  letter-spacing: 1px; 
  font-weight: 600; 
  font-size: 18px;
}
</style>
     
    </style>
    <body>   

    <center>

    <img src="cl/logo.png"style="width: 90px; margin-top:30px" >
    <h4 style="font-weight: 700;">Admin Pannel</h4>
           
                   
    <div class="serv1"> 
            <div class="serv_box" href="register_stu" onclick="go_all_reg_stu()" ontouchstart="mouseDown()" ontouchend="mouseUp()" onmousedown="mouseDown()" onmouseup="mouseUp()" >
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/4883/4883294.png"/>
                <h5 class="serv_ic_txt">Registerd Student</h5>
            </div>

            <a class="serv_box" href="pend_stu">
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/6811/6811049.png"/>
                <h5 class="serv_ic_txt">Pending Student</h5>
            </a>
      </div>

      <div class="serv1">
            <div class="serv_box" data-bs-toggle="modal" data-bs-target="#eventRegModal" >
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/780/780677.png"/>
                <h5 class="serv_ic_txt">Events Registerd</h5>
            </div>

            <div class="serv_box" data-bs-toggle="modal" data-bs-target="#eventPendModal" >
                <img class="serv_ic" src="https://cdn-icons-png.flaticon.com/512/2538/2538128.png"/>
                <h5 class="serv_ic_txt">Events Pending</h5>
            </div>
      </div>


      <button onclick="logout()" style="border:none; background-color:green; color:white; padding:5px; width:100px; margin-top:40px; border-radius:30px ">Logout</button>
      
</center>

<!-- Pending Events -->
<div class="modal fade" id="eventPendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <center>
      <div class="modal-content"> 
          <center>
          
          <form action="event_pend.php" method="POST">
                <div style="margin-top:58px"><div>
                   <select name="pend_game_id"  required class="fm-ip prt_3" >
                   <option value="event_admin_choose"> Choose Event</option>
                   <?php
                        require 'dbcon.php';
                        $query = "select * from events";
                        $events = $con->query($query);
                        if ($events->num_rows > 0) {
                            while ($event = mysqli_fetch_assoc($events)) {
                                ?>
                                <option value="<?php echo $event['ev_id']; ?>"><?php echo $event['ev_name']; ?></option>
                                <?php
                                }
                            }
                        ?>
                    </select>

                    <br>
                
                
                
                <button class="reg_bt"  type="submit" >See</button>

                <div style="margin-top:15px"><div>
            </form>  

          </center>
      </div>
    </center>
  </div>
</div>

<!-- Registerd Events -->
<div class="modal fade" id="eventRegModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <center>
      <div class="modal-content"> 
          <center>
          
          <form action="event_register.php" method="POST">
                <div style="margin-top:58px"><div>
                   <select name="pend_game_id"  required class="fm-ip prt_3" >
                   <option value="event_admin_choose"> Choose Event</option>
                   <?php
                        require 'dbcon.php';
                        $query = "select * from events";
                        $events = $con->query($query);
                        if ($events->num_rows > 0) {
                            while ($event = mysqli_fetch_assoc($events)) {
                                ?>
                                <option value="<?php echo $event['ev_id']; ?>"><?php echo $event['ev_name']; ?></option>
                                <?php
                                }
                            }
                        ?>
                    </select>

                    <br>
                
                
                
                <button class="reg_bt"  type="submit" >See</button>

                <div style="margin-top:15px"><div>
            </form>  

          </center>
      </div>
    </center>
  </div>
</div>


<!-- Registerd Stu Filter -->
<div class="modal fade" id="filterRegStuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <center>
      <div class="modal-content"> 
          <center>
          
          <form action="register_stu_filter" method="POST">
                <div style="margin-top:58px"><div>
                   <select name="dep"  required class="fm-ip prt_3" >
                        <option value="ECE"> ECE</option>
                        <option value="CSE"> CSE</option>
                        <option value="EEE"> EEE</option>
                        <option value="MECH"> MECH</option>
                        <option value="BTECH"> B.TECH</option>
                        <option value="CIVIL"> CIVIL</option>
                    </select>

                    <br>
                
                <button class="reg_bt"  type="submit" >See</button>

                <div style="margin-top:15px"><div>
            </form>  

          </center>
      </div>
    </center>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>

var timer;
    //Time of the long press
    const tempo = 1000; //Time 1000ms = 1s
    const mouseDown = () => {
        timer = setTimeout(function(){ 
                $("#filterRegStuModal").modal('show');
        }, tempo);
    };
    const mouseUp = () => {
        clearTimeout(timer);
    };


    function go_all_reg_stu(){

      window.location.href = "register_stu_all";

    }


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