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

    <title>Event Change Student</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="removeBanner.js"></script>
</head>
<style>
        .modal-content{
  border-radius: 20px;
  background-image: url('cl/model_bg.jpg');
  background-repeat: no-repeat;
  background-size: 100% 100%;
  height: 400px;
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
    .dis_box{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .fm-ip{
        margin-top: 20px;
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
::-webkit-input-placeholder { /* Edge */
color: green;
}

.bt{
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
<body>

<center>
        <div class="get_box">

            <div style="margin-top:100px"><div>
            <input id="getIdinput" style="text-align: center;" class="fm-ip" placeholder="Enter Input" >
            <br>
            <button style="margin-top: 30px;"   class="editstuBtn bt">Change</button>

        </div>
    </center>



    <!-- Edit stu Modal -->
<div class="modal fade" id="eventEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >X</button>
                
                <center>
                    <form id="eventEditpend" >
                

                
                        <input id="newPendreg_no" type="hidden"  name="reg_no" required class="fm-ip" />
                    
                        <h2 id="name">Name </h2>
                        
                        <div   class="mb-3">
                           <select id="prt_1" name="prt_1" onchange="prt1(this);" required class="fm-ip prt_1" >
                           <option value="none"> Choose Event</option>
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
                        </div>
            
                        <div class="mb-3">
                           <select id="prt_2" name="prt_2" onchange="prt2(this);" required class="fm-ip prt_2" >
                           <option value="none"> Choose Event</option>
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
                        </div>
                        
                        <div class="mb-3">
                           <select id="prt_3" name="prt_3" onchange="prt3(this);" required class="fm-ip prt_3" >
                           <option value="none"> Choose Event</option>
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
                            <input id="prt_no" name="prt_no" style="border-radius: 20px; width:30px; text-align: center; height: 20px; margin-top: 20px; border: none; background-color: green; color: #ffffff; font-size: 18px;" >
                        </div>
                        
                        
                        <button id="r_next_logo" class="bt"  type="submit" >Update</button>
        
                        <div style="margin-top:15px"><div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <script>

$(document).on('click', '.editstuBtn', function () {

var reg_no = $('#getIdinput').val();

$.ajax({
    type: "GET",
    url: "code.srini?Pendreg_no=" + reg_no,
    success: function (response) {

        var res = jQuery.parseJSON(response);
        if(res.status == 404) {

            alert(res.message);

        }else if(res.status == 200){

            $('#newPendreg_no').val(res.data.reg_no);
            $('#name').text(res.data.name);
            $('#prt_1').val(res.data.prt_1);
            $('#prt_2').val(res.data.prt_2);
            $('#prt_3').val(res.data.prt_3);
            $('#prt_no').val(res.data.prt_no);
            
            $('#eventEditModal').modal('show');
        }

    }
});

});

function prt1(prt1){document.getElementById("prt_no").value = "1";}
function prt2(prt2){document.getElementById("prt_no").value = "2";}
function prt3(prt3){document.getElementById("prt_no").value = "3";}

$(document).on('submit', '#eventEditpend', function (e) {
e.preventDefault();

$('#r_next_logo').hide();

var formData = new FormData(this);
formData.append("eventEditpend", true);

$.ajax({
    type: "POST",
    url: "code.srini",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) {

            alert(res.message);

        }else if(res.status == 200){

            alertify.set('notifier','position', 'top-right');
            alertify.success(res.message);
            
            $('#eventEditModal').modal('hide');
            
        }
    }
});

});

    
        </script>
</html>
    
    <?php


}
else{

    header("Location: /");

}