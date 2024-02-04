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

    <title>Mass Pending</title>
    <link rel="stylesheet" href="style-orginal9.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="removeBanner.js"></script>
</head>
<style>
     @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
  *{
    font-family: 'Poppins', sans-serif;
  }
  body{
       background-color: #eaedf1;
    }

.stu_box_nv{
border-radius: 10px;
margin-top: 20px; 
width:280px; 
background-color: #f7e6ea;
box-shadow: inset 2px 3px 5px white,
                 2px 3px 5px #8995a7;
}
.stu_box_v{
border-radius: 10px;
margin-top: 20px; 
width:280px; 
background-color: #e7f7e6;
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
margin-top: -6px;
font-size: 12px;
font-weight: 500;
}
.sec{
  width: 200px;
color: #686868;
border: none;
text-align:start;
margin-top: -14px;
font-size: 11px;
font-weight: 500;
}
.trn_id{
color: #0f9221;
font-size: 16px;
font-weight: 700;
text-align: start;
margin-top: -13px;
}
.trn_date{
color: #636363;
font-size: 11px;
font-weight: 700;
text-align: start;
margin-top: -4px;
}
.mode{
    width: 200px;
color: #686868;
border: none;
text-align:start;
margin-top: -14px;
font-size: 11px;
font-weight: 500;
}
.bt{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 22px;
  height: 22px;
  border: none;
  border-radius: 50px;
  padding: 13px;
  background-color: #fff;
  margin-left: 5px;
  margin-top: -5px;
  box-shadow: inset 2px 3px 5px #fff,2px 3px 5px #8995a7;
 }
 .ConfirmBtn{
    margin-left: -20px;  
    width: 20px;
    height: 20px;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #000;
    
 }
 .display{
        display: flex;
        justify-content:center;
        align-items: center;
    }
    .header{
        height: 50px;

    }
    .total_txt{
        font-weight: 700;
        font-size: 20px;
        font-family: arial ;
        width: 37%;
        height: 40px;
    }
    .food_count{
        height: 40px;
        font-size: 12px;
        font-family: arial;
        font-weight: 600;
    }
    .mention_box{
        height: 13px;
        width: 13px;
        border-radius: 5px;
        margin-top: -16px;
    }

    #total{
        width: 35px;
        margin-left: 3px;
        font-size: 20px;
        border: none;
        background-color: #fffff000;
        font-family: arial;
        text-align: center;
        margin-top: -16px;
    }
    ._eg{
        width: 30px;
        font-size: 12px;
        border: none;
        background-color: #fffff000;
        font-family: arial;
        margin-top: -16px;
        margin-left: 2px;
    
    } @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
  *{
    font-family: 'Poppins', sans-serif;
  }
  body{
       background-color: #eaedf1;
    }

    .modal-content{
  border-radius: 20px;
  background-image: url('cl/model_bg.jpg');
  background-repeat: no-repeat;
  background-size: 100% 100%;
  height: 580px;
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
    width: 90%;
    padding: 7px;
    border-style: solid;
    color: green;
}
::-webkit-input-placeholder { /* Edge */
  color: green;
}
.stu_box_nv{
border-radius: 10px;
margin-top: 20px; 
width:280px; 
background-color: #f7e6ea;
box-shadow: inset 2px 3px 5px white,
                 2px 3px 5px #8995a7;
}
.stu_box_v{
border-radius: 10px;
margin-top: 20px; 
width:280px; 
background-color: #e7f7e6;
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
margin-top: -6px;
font-size: 12px;
font-weight: 500;
}
.sec{
  width: 200px;
color: #686868;
border: none;
text-align:start;
margin-top: -14px;
font-size: 11px;
font-weight: 500;
}
.trn_id{
color: #0f9221;
font-size: 16px;
font-weight: 700;
text-align: start;
margin-top: -13px;
}
.trn_date{
color: #636363;
font-size: 11px;
font-weight: 700;
text-align: start;
margin-top: -4px;
}
.mode{
    width: 200px;
color: #686868;
border: none;
text-align:start;
margin-top: -14px;
font-size: 11px;
font-weight: 500;
}
 .ConfirmBtn{
    margin-left: -20px;  
    width: 20px;
    height: 20px;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #000;
    
 }
 .display{
        display: flex;
        justify-content:center;
        align-items: center;
    }
    .header{
        height: 50px;

    }
    .total_txt{
        font-weight: 700;
        font-size: 20px;
        font-family: arial ;
        width: 37%;
        height: 40px;
    }
    .food_count{
        height: 40px;
        font-size: 12px;
        font-family: arial;
        font-weight: 600;
    }
    .mention_box{
        height: 13px;
        width: 13px;
        border-radius: 5px;
        margin-top: -16px;
    }

    #total{
        width: 35px;
        margin-left: 3px;
        font-size: 20px;
        border: none;
        background-color: #fffff000;
        font-family: arial;
        text-align: center;
        margin-top: -16px;
    }
    ._eg{
        width: 30px;
        font-size: 12px;
        border: none;
        background-color: #fffff000;
        font-family: arial;
        margin-top: -16px;
        margin-left: 2px;
    
    }
 .bt{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 25px;
  height: 25px;
  margin-top: 5px;
  margin-left: -10px;
  border: none;
  border-radius: 50px;
  padding: 14px;
  background-color: #fff;
  box-shadow: inset 2px 3px 5px #fff,2px 3px 5px #8995a7;
 }

</style>
<body>

<!-- Add stu -->
<div class="modal fade" id="stuAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >X</button>
            
            <center>
        <form id="addMassPendstudent" >
                <div style="margin-top:30px"><div>
                
                <div style="margin-top:10px;" class="mb-3">
                       <input  type="number" placeholder="Register No"  name="reg_no" required class="fm-ip" />
                </div>

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Your Name" type="name" name="name" required class="fm-ip" />
                </div>

                <div style="display:flex; justify-content:center; align-items:center;">
                <div class="mb-3" style="margin-right:4%; ">
                    <select style="appearance: none; width:110%;" class="fm-ip" name="dep">
                        <option > Department</option>
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
                        <option > Year</option>
                        <option value="I"> I</option>
                        <option value="II"> II</option>
                        <option value="III"> III</option>
                        <option value="VI"> IV</option>
                    </select>
                </div>
                </div>
                <div class="mb-3">
                     <input placeholder="Your Email" type="email" name="email" required class="fm-ip" />
                </div>
                <div class="mb-3">
                   <select  type="name" name="food" required class="fm-ip" >
                   <option> Food Type</option>
                   <option value="nonveg"> Non Veg</option>
                   <option value="veg"> Veg </option>
                    </select>
                </div>
                <div class="mb-3">
                   <select type="name" name="pay_mode" required class="fm-ip" >
                   <option> Pay Mode</option>
                   <option value="Online"> Online</option>
                   <option value="Offline"> Offline </option>
                    </select>
                </div>

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Payment ID" value="XXXXXXXXXX" type="name" name="pay_id" required class="fm-ip" />
                </div>

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Payment Date" value="1000-10-10" type="date" name="pay_date" required class="fm-ip" />
                </div>

                <button id="add_next_logo" type="submit" style="margin-top:10px; width:120px; border:none; padding:6px; background-color:#3ea814;color:#fff; border-radius:20px; font-family: Arial; letter-spacing: 1px; font-weight: 600; font-size: 18px;">ADD</button>
            </form>
            </center>
        </div>
    </div>
</div>

<!-- Edit stu Modal -->
<div class="modal fade" id="stuEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >X</button>
            
            <center>
               <form id="uptMassPendstudent" >
               <div style="margin-top:40px"><div>


                <input type="hidden"  placeholder="Register No" id="reg_no"  name="reg_no" required class="fm-ip" />

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Your Name" type="name" id="name" name="name" required class="fm-ip" />
                </div>

                <div style="display:flex; justify-content:center; align-items:center;">
                <div class="mb-3" style="margin-right:4%; ">
                    <select style="appearance: none; width:110%;" class="fm-ip" id="dep" name="dep">
                        <option > Department</option>
                        <option value="ECE"> ECE</option>
                        <option value="CSE"> CSE</option>
                        <option value="EEE"> EEE</option>
                        <option value="MECH"> MECH</option>
                        <option value="BTECH"> B.TECH</option>
                        <option value="CIVIL"> CIVIL</option>
                    </select>
                </div>
                <div class="mb-3" style="margin-left:5%;">
                    <select style="appearance: none; width:110%;"  class="fm-ip" id="year" name="year">
                        <option > Year</option>
                        <option value="I"> I</option>
                        <option value="II"> II</option>
                        <option value="III"> III</option>
                        <option value="IV"> IV</option>
                    </select>
                </div>
                </div>
                <div class="mb-3">
                     <input placeholder="Your Email" type="email" id="email" name="email" required class="fm-ip" />
                </div>
                <div class="mb-3">
                   <select  type="name" id="food" name="food" required class="fm-ip" >
                   <option> Food Type</option>
                   <option value="nonveg"> Non Veg</option>
                   <option value="veg"> Veg </option>
                    </select>
                </div>
                <div class="mb-3">
                   <select type="name" id="pay_mode" name="pay_mode" required class="fm-ip" >
                   <option> Pay Mode</option>
                   <option value="Online"> Online</option>
                   <option value="Offline"> Offline </option>
                    </select>
                </div>

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Payment ID" value="XXXXXXXXXX" type="name" id="pay_id" name="pay_id" required class="fm-ip" />
                </div>

                <div style="margin-top:10px;" class="mb-3">
                     <input placeholder="Payment Date" value="1000-10-10" type="date" id="pay_date" name="pay_date" required class="fm-ip" />
                </div>

                <button id="edit_next_logo" type="submit" style="margin-top:10px; width:120px; border:none; padding:6px; background-color:#3ea814;color:#fff; border-radius:20px; font-family: Arial; letter-spacing: 1px; font-weight: 600; font-size: 18px;">Update</button>
            </form>
            </center>
        </div>
    </div>
</div>

              <div class="container mt-4">

                    <h3 style="margin-left:20px" >Pending
                        <button style="margin-right:20px; border-radius:30px" type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#stuAddModal">
                            Add 
                        </button>
                    </h3>
                
              <div id="myTable">
                  
                  <?php
                            
                            $query = "SELECT * FROM pend_stu";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $pend)
                                {
                                    if($pend['food'] == "nonveg"){

                                    ?>

                                    
                     
                     <center>
<input id="nonveg_no" type="hidden" value="1"/>

    <div class="stu_box_nv" >
        <div style="display:flex; align-items: start; justify-content: start; margin-left: 20px;">
           
            <div style="width: 200px;">
                <h4 type="button"  class="stuname" ><?= $pend['name']; ?></h4>
                <p class="regno"><?= $pend['reg_no']; ?></p>
                <p class="sec"><?= $pend['dep']; ?> ( <?= $pend['year']; ?> Year )</p>
                <p class="mode"><?= $pend['pay_mode']; ?></p>
                <p class="mode"><?= $pend['pay_id']; ?></p>
                <p class="mode"><?= $pend['pay_date']; ?></p>
                
            </div>

               <button type="button" value="<?=$pend['reg_no'];?>" class="editstuBtn bt">
                <i style="color:green;" class="fa fa-pencil-square-o"  ></i>
              </button>
              <button style="margin-left:10px;" type="button" value="<?=$pend['reg_no'];?>" class="deletestuBtn bt">
              <i style="color:red;" class="fa fa-trash-o" ></i>
              </button>
              
            
        </div>
        
    </div>
    </center>                      
                                    <?php

                                    }else if($pend['food'] == "veg"){

                                        ?>

                                    
                     
                                        <center>
                   <input id="veg_no" type="hidden" value="1"/>
                   
                       <div class="stu_box_v" >
                           <div style="display:flex; align-items: start; justify-content: start; margin-left: 20px;">
                              
                               <div style="width: 200px;">
                                   <h4 type="button"  class="stuname" ><?= $pend['name']; ?></h4>
                                   <p class="regno"><?= $pend['reg_no']; ?></p>
                                   <p class="sec"><?= $pend['dep']; ?> ( <?= $pend['year']; ?> Year )</p>
                                   <p class="mode"><?= $pend['pay_mode']; ?></p>
                                   <p class="mode"><?= $pend['pay_id']; ?></p>
                                   <p class="mode"><?= $pend['pay_date']; ?></p>
                                   
                               </div>
                   
                                  <button type="button" value="<?=$pend['reg_no'];?>" class="editstuBtn bt">
                                   <i style="color:green;" class="fa fa-pencil-square-o"  ></i>
                                 </button>
                                 <button style="margin-left:10px;" type="button" value="<?=$pend['reg_no'];?>" class="deletestuBtn bt">
                                 <i style="color:red;" class="fa fa-trash-o" ></i>
                                 </button>
                                 
                               
                           </div>
                           
                       </div>
                       </center>                      
                                                       <?php






                                    }
                                }
                            }
                            ?>
                            
                       

              
              </div>
  
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#addMassPendstudent', function (e) {
            e.preventDefault();


            var formData = new FormData(this);
            formData.append("addMassPendstudent", true);

            $.ajax({
                type: "POST",
                url: "code.srini",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 'error') {
                        
                        alert(res.message);

                    }else if(res.status == 'suc'){

                                $('#stuAddModal').modal('hide');

                               alertify.set('notifier','position', 'top-right');
                                alertify.success(res.message);
    
                                $('#myTable').load(location.href + " #myTable");

                    }


                }
            });

        });


        $(document).on('click', '.editstuBtn', function () {



            var reg_no = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.srini?Pendreg_no=" + reg_no,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);

                    }else if(res.status == 200){

                        $('#reg_no').val(res.data.reg_no);
                        $('#name').val(res.data.name);
                        $('#dep').val(res.data.dep);
                        $('#year').val(res.data.year);
                        $('#email').val(res.data.email);
                        $('#food').val(res.data.food);
                        $('#pay_mode').val(res.data.pay_mode);
                        $('#pay_id').val(res.data.pay_id);
                        $('#pay_date').val(res.data.pay_date);
                        
                

                        $('#stuEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#uptMassPendstudent', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("uptMassPendstudent", true);

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
                        
                        $('#stuEditModal').modal('hide');

                        $('#myTable').load(location.href + " #myTable");

                    }
                }
            });

        });

        

        $(document).on('click', '.deletestuBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var reg_no = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.srini",
                    data: {
                        'delMassPendstudent': true,
                        'reg_no': reg_no
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
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