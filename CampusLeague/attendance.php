<?php
session_start(); 
require 'dbcon.php';

if ($_SESSION['campusleague_admin_key'] == "attendance") {

    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Attendance</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="./node_modules/html5-qrcode/html5-qrcode.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
    <script src="removeBanner.js"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
  *{
    margin: 0;
    padding: 0;
    outline: none;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
      .result{
        background-color: green;
        color:#fff;
        padding:20px;
      }
      .row{
        display:flex;
      }
  
  select{
  background-color: #fff;
  padding: 10px;
  width: 90%;
  border-bottom: 2px solid silver;
  border-top: none;
  border-left: none;
  border-right: none;
  color: gray;
  font-size: 15px;}
      .reader{
        border-radius: 30px;
        background-image: url('https://blogger.googleusercontent.com/img/a/AVvXsEjbqStzToVAanQ9hM8ZSgQm50pRrmR3CYP2iz_M8rB0yoF2XNx1mqZxmgzeGE-DHUAr3acX8kaDHR-WTNlsQ7TDTOPQh6Ldg3-vC7m9yVKBtvhjZkaw-4tY8uEV9-vF9jbizSoJWt4GZjLBuEHdwWFDo5MlVjh_UbiNzRk5XBgSBXgciZWqJV_7dNE0CA=s320');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 205px;
        box-shadow: inset 5px 5px 12px rgb(160, 159, 159),
                        5px 5px 12px rgba(0,0,0,.16);
      }
      .colid{
        border-radius: 30px
    
      }
      span{ 
        background-color: #fff;
        background: #fff;
        color: #000000;
      }
      .container{
      height: 92vh;
      display: flex;
      width: auto;
      justify-content: center;
      background-color:#fff;
      align-items: center;
  }
  .qrcalci{
       height: 500px;
       width: 310px;
       margin-top:20px;
      background-color: #fff;
      padding: 15px;
      border-radius: 30px;
      box-shadow: inset 5px 5px 12px #FFF,
                        5px 5px 12px rgba(0,0,0,.36);
  }
  button{
          padding: 5px;
          background-color: #2eaa22;
          color: white;
          border-radius: 30px;   
          font-size: 14px;
          font-weight: 600;   
                        
  }

</style>
<body>

<!-- Edit stu Modal -->
<div class="modal fade" id="atEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >X</button>
            
            <center>

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Your Name" type="name" id="name" name="name" required class="fm-ip" />
                </div>

            </center>
        </div>
    </div>
</div>

        
  
<div class="container">
        <center>
                       <!----QR page Start  ---->
                    <div id="qrcalciid" class="qrcalci"  >
  
                          <center>
           
             
                          <div style="display:none" id="suc">

                             <div style=" margin-top:80px"> </div>
                            <h2 id="name">Srinivasa Vignesh</h2>
                            <br>
  
                            <img src="cl/suc.png"  width="150px">
                            <br>
                            <br>
                            <button onclick="ok()" style="background-color: #13a313; color: white; width:100px; border-radius: 20px; border: none; padding: 5px; margin-top: 20px;" > OK</button>

                          </div>

                          <div style="display:none" id="alredy">

                             <div style=" margin-top:80px"> </div>

                            <h3>Alredy Attendanced<h3>
                          
                            <img src="cl/error.png"  width="150px">
                          
                          </div>
  
  
                            
                          <div id="colid" class="colid" >
                            <div  class="col">
                              <div class="reader" style="width:95%; height: 320px;" id="reader"></div>
                            </div>
                          </div>
                             
                          <br>
                          </center>
                     </div>    
        </center>
    </div>

     <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


    <script >

function ok(){
        window.location.replace("/");
      }
  
  
 
  function onScanSuccess(qrCodeMessage) {

  
    

    $.ajax({
                    type: "POST",
                    url: "at_code.php",
                    data: {
                        'at_check': true,
                        'reg_no': qrCodeMessage
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 'put') {


                        document.getElementById('suc').style.display = "block";
                        
                        $('#name').val(res.name);
                        
                            
                        }
                        else if(res.status == 'alredy') {


                        
                        document.getElementById('alredy').style.display = "block";
                        $('#name').val(res.name);
                        
                            
                        }else{
                        
                            alert(res.message);
                            location.reload();
                            
                        }
                    }
                });

                document.getElementById('colid').style.display = "none";

                html5QrcodeScanner.clear();

      
   }

function onScanError(errorMessage) {
}
var html5QrcodeScanner = new Html5QrcodeScanner(
"reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);
        



    </script>



</body>
</html>
    
    <?php





}
else{

    header("Location: /");

}