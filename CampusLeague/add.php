<?php
function isMobileDevice() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
, $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobileDevice()){

  ?>
	
  <!doctype html>
<html lang="en">
  <head>

    <title>Campus League</title>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#d8f7d7" />
    <meta name="description" content="Campus League (Symposium) Presents by ECE GOE"/>
    <meta property='og:description' content="Campus League (Symposium) Presents by ECE GOE"/>
    <meta property='og:url' content="https://www.campusleague.online" />
    <meta property="og:image:secure_url" content="logo.png" />
    <meta property='og:image' itemprop='image' content="logo.png" />
    <meta property='og:image:width' content="500" />
    <meta property='og:image:height' content="500" />
    

    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="shortcut icon" type="image/jpg" href="logo.png"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="removeBanner.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="style.css" >
</head>
<style>

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


<div id="loaded" style="display:none">




<div class="bottom w3-animate-bottom" >
  <button class="rg_btn" data-bs-toggle="modal" data-bs-target="#registerModal"> REGISTER NOW </button>
</div>


</div>


<!-- Add student -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" >X</button>
            
            <center>


            <form id="checkstudent" >
                <img style="margin-top:-30px" width="200px" src="cl/logo.png" />
                <div class="mb-3">
                     <input placeholder="Register No" maxlength="12" type="number" name="reg_no" required
                      oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="fm-ip" />
                </div>
                <button type="submit" style="border:none; background-color:#ffffff00"><img id="next_logo" src="https://cdn-icons-png.flaticon.com/128/5611/5611871.png" width="34px" /></button>
            </form>

            <form id="regstudent" style="display:none">
                
                <img src="cl/suc_emj.png" style=" margin-top:-10px;" width="84px"/>
                <h3 style="font-family: Arial; font-size: 18px; font-weight:800; color:green;">You Alredy Registered</h3>
                <br>
                <br>

                <p  id="v_prt_1"></p>
                <p  id="v_prt_2"></p>
                <p  id="v_prt_3"></p>
    
            </form>


              <div id="online_pend" style="display:none">
                  <img style="margin-top: 20px;"  src="cl/money_process.png" width="180px" />
                   <h4 id="procces_name" style="font-weight: 700; width: 80%;"> </h4>
                   <h6 style="font-weight: 700; width: 80%;"> Your request for registration is still in process, please check after 5 hours </h6>
                  </div>



            <form id="newPendstudent" style="display:none">
                <div style="margin-top:5px"><div>

                <div style="display:flex; justify-content:center; align-items:center;">
                <h2 id="show_reg_no" style="font-family: Arial; font-size: 15px; font-weight:700; color:green;"><h2>
                <h2  style="font-family: Arial; font-size: 15px;">, Fill Your Info<h2>
                </div>

                
                <input id="newPendreg_no" type="hidden"  name="reg_no" required class="fm-ip" />
                

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Your Name" type="name" name="name" required class="fm-ip" />
                </div>

                <div style="display:flex; justify-content:center; align-items:center;">
                <div class="mb-3" style="margin-right:4%; ">
                    <select style="appearance: none; width:110%;" class="fm-ip" name="dep">
                        <option value="dep"> Department</option>
                        <option value="ECE"> ECE</option>
                        <option value="CSE"> CSE</option>
                        <option value="EEE"> EEE</option>
                        <option value="MECH"> MECH</option>
                        <option value="BTECH"> B.TECH</option>
                        <option value="CIVIL"> CIVIL</option>
                    </select>
                </div>
                <div class="mb-3" style="margin-left:5%;">
                    <select style="appearance: none; width:110%;" class="fm-ip" name="year">
                        <option value="year"> Year</option>
                        <option value="I"> I</option>
                        <option value="II"> II</option>
                        <option value="III"> III</option>
                        <option value="IV"> IV</option>
                    </select>
                </div>
                </div>
                <div class="mb-3">
                     <input placeholder="Your Email" type="email" name="email" required class="fm-ip" />
                </div>
                <div class="mb-3">
                   <select  type="name" name="food" required class="fm-ip" >
                   <option value="food"> Food Type</option>
                   <option value="nonveg"> Non Veg</option>
                   <option value="veg"> Veg </option>
                   
                    </select>
                </div>
                <p id="how_txt" style=" color:green; font-weight:600; margin-top:10px; font-size:13px; width:200px;text-align:center;">How many competitions you are going to participate? (max : 3)</p>
                <div class="mb-3">
                   <select id="prt_no" onchange="prtno(this);"  required class="fm-ip" >
                   <option> How many</option>
                   <option  value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                    </select>
                </div>
                <input id="bp_prt_no" type="hidden" style="display:none;"  name="prt_no"  required class="fm-ip" />
                <div style="display:none;" id="prt_1" class="mb-3">
                   <select id="sl_prt_1" onchange="prt1(this);" required class="fm-ip prt_1" >
                   <option value="event_choose_1"> Choose Event</option>
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
                <input id="bp_prt_1" type="hidden" name="prt_1" required class="fm-ip" />
                <div style="display:none;" id="prt_2" class="mb-3">
                   <select id="sl_prt_2" onchange="prt2(this);" required class="fm-ip prt_2" >
                   <option value="event_choose_2"> Choose Event</option>
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
                <input id="bp_prt_2" type="hidden" name="prt_2"  required class="fm-ip" />
                <div style="display:none;" id="prt_3" class="mb-3">
                   <select id="sl_prt_3" onchange="prt3(this);" required class="fm-ip prt_3" >
                   <option value="event_choose_3"> Choose Event</option>
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
                <input id="bp_prt_3"  type="hidden" name="prt_3" required class="fm-ip" />
                
                <button id="r_next_logo" class="reg_bt"  type="submit" >Register</button>

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

    <script >

window.onload = function() 
{
    //let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    //bannerNode.parentNode.removeChild(bannerNode);
    $('.loader').fadeOut();
    $('#loaded').fadeIn();
}

    function prtno(tot){
      document.getElementById("r_next_logo").style.display = "block";
      document.getElementById("how_txt").style.display = "none";
      document.getElementById("prt_no").style.display = "none";
      
      document.getElementById("bp_prt_no").style.display = "block";

      document.getElementById("bp_prt_no").value = tot.value;

      document.getElementById("bp_prt_1").value = document.getElementById("sl_prt_1").value;
      document.getElementById("bp_prt_2").value = document.getElementById("sl_prt_2").value;
      document.getElementById("bp_prt_3").value = document.getElementById("sl_prt_3").value;


    if(tot.value == 1){
      document.getElementById("prt_1").style.display = "block";



      document.getElementById("bp_prt_2").value = "none";
      document.getElementById("bp_prt_3").value = "none";



    }else if(tot.value == 2){
      document.getElementById("prt_1").style.display = "block";
      document.getElementById("prt_2").style.display = "block";
      document.getElementById("bp_prt_3").value = "none";


    }else if(tot.value == 3){
      document.getElementById("prt_1").style.display = "block";
      document.getElementById("prt_2").style.display = "block";
      document.getElementById("prt_3").style.display = "block";



    }
}
function prt1(prt1){document.getElementById("bp_prt_1").value = prt1.value;}
function prt2(prt2){document.getElementById("bp_prt_2").value = prt2.value;}
function prt3(prt3){document.getElementById("bp_prt_3").value = prt3.value;}


function instagram(){  window.location.assign("https://www.instagram.com/campusleague2k23"); }
function eventRule(){
    location.href = "eventRules.html";
}
function eventDetail(){
    location.href = "eventDetails.html";
}
function Register(){
    alert('Coming Soon !');
}



$(document).on('submit', '#checkstudent', function (e) {
    e.preventDefault();
    

    $('#next_logo').attr('src','cl/loading.gif');

    var formData = new FormData(this);
    formData.append("check_student", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 'new') {
                
                $('#checkstudent').hide();
                $('#newPendstudent').show();
                $('#newPendreg_no').val(res.reg_no);
                $('#show_reg_no').text(res.reg_no);

            }else if(res.status == 'online_pend'){
                
               $('#checkstudent').hide();
                $('#online_pend').show();
                $('#procces_name').text(res.name);

  
            }
            else if(res.status == 'offline_pend'){
                
                var form = $('<form action="confirm.srini" method="post">' + '<input type="text" name="pay" value="' + res.reg_no + '" />' +'</form>');
                  $('body').append(form);
                  form.submit();

    
              }
            else if(res.status == 'reg'){

                $('#checkstudent').hide();
                $('#regstudent').show();
                

                
            }


        }
    });

});

$(document).on('submit', '#newPendstudent', function (e) {
    e.preventDefault();
    
    if( $('.prt_1').val() == $('.prt_2').val() || $('.prt_2').val() == $('.prt_3').val() || $('.prt_3').val() == $('.prt_1').val()){
      alert('You have Selected Same Events');

    }
    else{

    $('#r_next_logo').hide();

    var formData = new FormData(this);
    formData.append("addPend_student", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 'error') {
                
                $('#r_next_logo').show();
                alert(res.message);

            }else if(res.status == 'suc'){

                $('#registerModal').modal('hide');

                var form = $('<form action="confirm.srini" method="post">' + '<input type="text" name="pay" value="' + res.reg_no + '" />' +'</form>');
                $('body').append(form);
                form.submit();

            }


        }
    });

  }

});


$(document).on('click', '.close', function (e) {
        e.preventDefault();

        $('#registerModal').modal('hide');
        window.location.replace("/");

    

});
    </script>


    
</html>

<?php
}
else {
	?>

<!doctype html>
<html lang="en">
  <head>
  <title>Campus League</title>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#d8f7d7" />
  <meta name="description" content="Campus League (Symposium) Presents by ECE GOE"/>
  <meta property='og:description' content="Campus League (Symposium) Presents by ECE GOE"/>
  <meta property='og:url' content="https://www.campusleague.online" />
  <meta property="og:image:secure_url" content="logo.png" />
  <meta property='og:image' itemprop='image' content="logo.png" />
  

  <link rel="icon" type="image/x-icon" href="logo.png">
  <link rel="shortcut icon" type="image/jpg" href="logo.png"/>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="removeBanner.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="style.css" >
</head>
<style>
  body{
    background-image: url('cl/pc_bg.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;    
  }
</style>
<body>


  <center>

     <h1 style="margin-top:20%; font-weight:600">"Thanks for visiting our site"</h1>

     <h2>This site can be accessed only through mobile devices.</h2>

  </center>




</body>



    
</html>


<?php
}
?>


