<?php
session_start(); 
require 'dbcon.php';

if ($_SESSION['campusleague_admin_key'] == "verify_payment" ) {


    ?>

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <title>Verify Offline Payment

        </title>
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

    .loader {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  background-color: #ffffffc7;
  position: fixed;

}
.stu_box{
border-radius: 10px;
margin-top: 40px; 
width:280px; 
background-color: #f3f5f8;
box-shadow: inset 2px 3px 5px white,
                 2px 3px 5px #8995a7;
}
.stuname{
  width: 200px;
color: #3b3b3b;
border: none;
text-align:start;
margin-top: 10px;
font-size: 17px;
font-weight: 700;
}
.regno{
  width: 200px;
color: #686868;
border: none;
text-align:start;
margin-top: -3px;
font-size: 12px;
font-weight: 500;
}
.sec{
  width: 200px;
color: #686868;
border: none;
text-align:start;
margin-top: -12px;
font-size: 11px;
font-weight: 500;
}
.tic{
    display:none;
    background-color: #fff;
    border-radius: 30px;
    width: 40px;
    height: 40px;
    margin-top: 22px;
}
 #ConfirmBtn{
    border: none;
    border-radius:10px;
    color:white;
    background-color: green;
    margin-left:-20px;
    margin-top:30px;
    
 }
</style>
     
    </style>
    <body>   

    <div class="loader" >
  <div style="margin-top:-50px">
    <center>
  <img src="cl/logo.png" width="130px">
  <br>
  <img  src="cl/loading.gif" width="40px">
</center>
  </div>
</div>

    <div class="container mt-4">
           
                   
                  <div id="myTable">
                      
                      <?php
                                
                                $query = "SELECT * FROM pend_stu";
                                $query_run = mysqli_query($con, $query);
    
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $online)
                                    {


                                        if($online['pay_mode'] == "Offline"){

                                    
                                        ?>

                                        <center>
    <div class="stu_box" >
        <div style="display:flex; align-items: start; justify-content: start; margin-left: 20px;">
           
            <div style="width: 200px;">
                <h4 type="button"  class="stuname" ><?= $online['name']; ?></h4>
                <p class="regno"><?= $online['reg_no']; ?></p>
                <p class="sec"><?= $online['dep']; ?> ( <?= $online['year']; ?> Year )</p>
            </div>

            <button id="ConfirmBtn" value="<?= $online['reg_no']; ?>">Receive</button>

              
            
        </div>
        
    </div>
    </center>
    
                                 
                                        <?php

                                        }
                                        
                                    }
                                }else{

                                    echo "<center><h4>No Paymnet Pending</h4></center>";
                                }
                                ?>
                                
                           
    
                  
                  </div>
      
    </div>
    
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
        <script>
window.onload = function() 
{
    //let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    //bannerNode.parentNode.removeChild(bannerNode);
    $('.loader').fadeOut();

}

     $(document).on('click', '#ConfirmBtn', function (e) {
                e.preventDefault();

                reg_no = $(this).val();
                
                if(confirm(reg_no + ' Confirm Receive?'))
                {
                    
                    $(this).hide();
                    $('.loader').fadeIn();

                    $.ajax({
                        type: "POST",
                        url: "code.srini",
                        data: {
                            'confirm_offline_pay_verify': true,
                            'reg_no': reg_no
                        },
                        success: function (response) {
    
                            var res = jQuery.parseJSON(response);
                            if(res.status == 500) {
    
                                alert(res.message);
                            }else{

                                $('.loader').fadeOut();
                                alertify.set('notifier','position', 'top-right');
                                alertify.success(res.message);
    
                                $('#myTable').load(location.href + " #myTable");
                            }
                        }
                    });
                    
                }

            });


    
        </script>
    
    
    
    </body>
    </html>
    
    <?php





}
else{

    header("Location: /");

}