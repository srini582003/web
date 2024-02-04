<?php
require 'dbcon.php';

if(isset($_POST['pay']))
{

     $reg_no = $_POST['pay'];

      $sql = "SELECT * FROM pend_stu  WHERE reg_no=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$reg_no]);


      # if the username is exist
      if($stmt->rowCount() === 1){
        # fetching user data
        $pend = $stmt->fetch();
        ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="removeBanner.js"></script>
    <title><?=$pend['name']?></title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<style>
   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
  *{
    font-family: 'Poppins', sans-serif;
  }
  body{
    background-image: url('cl/confirm_bg.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  
  }

  .pay_method_box{
    width: 110px;
    height: 130px;
    background-color: white;
    margin-top: 30px;
    border-radius: 30px;
    box-shadow: inset 1px 1px 2px #eeeeee,2px 3px 25px #747474;
    
  }

  .modal-content{
  border-radius: 20px;
  height: 400px;
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
#image{
    width: 200px;
    margin-top: 150px;
    border-radius: 30px;
    box-shadow:  5px 5px 12px rgba(0,0,0,.20),
                      5px 5px 12px rgba(0,0,0,.16);
    
}
#qr_box{
     margin-top: -50px;
      height: 550px;
      width: 325px;
      background-image: url('cl/qr_template.png');
      background-repeat: no-repeat;
      background-position: center;
      background-size: 100%;
}
.openapp{
     height:30px; 
    margin-top:20px;
    border: none;
    border-radius: 30px;
    width: 100px;
    font-weight: 600;
    color: #000000;
    background-color: #fff;
    box-shadow:  1px 1px 5px rgba(0,0,0,.20),
                        1px 1px 5px rgba(0,0,0,.16);
    }
    
    .pay{
    border: none;
    border-radius: 30px;
    width: 80px;
    height:30px;
    font-weight: 600;
    margin-top: 30px;
    color: #ffffff;
    background-image: linear-gradient(#2ea510, #2cad0b);
    box-shadow:  5px 5px 12px rgba(0,0,0,.20),
                        5px 5px 12px rgba(0,0,0,.16);
    }
    .pay_id{
      font-weight: 600;
        border: none;
        width: 90px;
        height: 30px;
        text-align: center;
        border-radius: 30px;
        box-shadow:  5px 5px 12px rgba(0,0,0,.20),
                        5px 5px 12px rgba(0,0,0,.16);
    }
</style>
<body>

<div id="bg">
<center>

  <h1 style="font-weight: 700; font-size: 22px; margin-top: 40px;" >Pay to Confirm Register</h1>
  <h3 id="rupe" style="margin-top: 40px; font-weight: 600; ">Just   ₹<b>99</b> </h3>

  <div id="online" onclick="online()" class="pay_method_box" style="margin-top: 40px;">
    <img src="cl/online_pay.png" width="90px" style="margin-top: 10px;" />
    <p style="margin-top: -10px;">Online</p>
  </div>

  <div id="qr"  onclick="online()"  style="margin-top: 20px; display:none ;">

    <div  id="qr_box" >
      <img id="image" src="icon/empty.png">
      <br>
      <button  class="openapp" onclick="openapp() " >Open App </button>
      <br>
      <button data-bs-toggle="modal" data-bs-target="#PaymentIdModal" style="margin-top:110px; height: 35px;" onclick="ipay()" class="pay">I Paid </button>
  </div>

  </div>

  <div id="offline" data-bs-toggle="modal" data-bs-target="#OfflineModal" class="pay_method_box" style="margin-top: 70px;">
    <img src="cl/offline_pay.png" width="90px" style="margin-top: 10px;" />
    <p style="margin-top: -10px;">Offline</p>
  </div>


</center>

</div>
   

<!-- Offline Payment -->
<div class="modal fade" id="OfflineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <center>
      <div class="modal-content"> 
          <center>
            <img style="margin-top: 50px;"  src="cl/contact.png" width="150px" />
            <h4 style="font-weight: 500; width: 90%; margin-top: 30px;"> For offline payment please contact ECE department </h4>
            <button onclick="ok()" style="background-color: #13a313; color: white; width:100px; border-radius: 20px; border: none; padding: 5px; margin-top: 20px;" > OK</button>
          </center>
      </div>
    </center>
  </div>
</div>

<!-- PaymentId -->
<div class="modal fade" id="PaymentIdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <center>
      <div class="modal-content"> 
          <center>
              <form id="confirm_trnid" >
                <img src="cl/trn_id.png" style="margin-top:20px; width: 160px;" /> 
                <input  name="reg_no" type="hidden" value="<?=$pend['reg_no']?>">
                <input  name="pay_date" type="hidden" value="<?= date('Y-m-d') ?> " >
                <input  name="pay_id" style="margin-top:10px; width: 80%;" class="pay_id"  placeholder="Transaction ID XXX.." autocomplete="off" type="text"  required/>
                <br>
                <button type="submit" class="pay"> Submit </button>
                <h5 onclick="learn_trnId()" style="margin-top:20px; font-size: 15px;">How to get Transaction ID ?</h5>


                <p style="margin-top:50px; font-size: 12px; color: #ff0000e5;">Donn't refresh the page</p>
              </form>
              
              <div style="display:none;" id="succes_procces">

              <center>
                  <img style="margin-top: 30px;"  src="cl/suc_thumb.png" width="180px" />
                   <h4 style="font-weight: 500; width: 90%;"> Your request is successfully submitted. Once the payment is verified we will send you the Registration confirmation email </h4>
                   <button id="pay_ok" onclick="ok()" style="background-color: #13a313; color: white; width:100px; border-radius: 20px; border: none; padding: 5px; margin-top: 20px;" > OK</button>
                </center>

              </div>

          </center>
      </div>
    </center>
  </div>
</div>


</body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
      function learn_trnId(){
    
        window.open("learn_get_transaction_id");

  }
      function online(){
    
        document.getElementById("offline").style.display = "none";
        document.getElementById("online").style.display = "none";
        document.getElementById("rupe").style.display = "none";
        document.getElementById("qr").style.display = "block";

      }
      function ok(){
        window.location.replace("/");
      }

      function openapp(){
        window.open("upi://pay?pa=9843552419@ybl&pn=Campus%20League&tn=<?=$pend['reg_no']?>&am=100");
      }

      document.getElementById("image").src = "https://chart.apis.google.com/chart?cht=qr&choe=UTF-8&chs=350x350&chld=undefined&chl=upi://pay?pa=9843552419@ybl%26pn=Campus%20League%26tn=<?=$pend['reg_no']?>%26am=100";
        
    </script>
    <script>


$(document).on('submit', '#confirm_trnid', function (e) {
            e.preventDefault();


            $('.pay').hide();
            

            var formData = new FormData(this);
            formData.append("confirm_trnid", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 'error') {
                        
                        alert(res.message);
                        window.location.replace("/");

                    }else if(res.status == 'suc'){

                        $('#confirm_trnid').hide();
                        $('#succes_procces').show();

                  
                    }
                }
            });

        });

    </script>
</html>


       <?php
      }else {

        

        
      }
    
}
else{

  header("Location: /");
 
}

?>