<?php
session_start(); 
require 'dbcon.php';

if ($_SESSION['campusleague_admin_key'] == "admin_pannel" || $_SESSION['campusleague_admin_key'] == "verify_payment" || $_SESSION['campusleague_admin_key'] == "mass_admin") {


    if(isset($_POST['dep']))
    {
  
        $filter_dep = $_POST['dep'];


    ?>

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <title>Registerd Student</title>
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
.tot{
    margin-top: 40px;
   
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
    
    }
</style>
     
    </style>
    <body>
    
    
    
    
    
    <div class="container mt-4">
           
                   
                  <div id="myTable">

                  
                      
                      <?php
                                
                                $query = "SELECT * FROM register_stu";
                                $query_run = mysqli_query($con, $query);
                                $tot = mysqli_num_rows($query_run);

                                ?>
<center>
    <div class="header display">

        <div class="total_txt display">
            <p>Total :</p>
            <input id="total" value="0">
        </div>

        <div style="width: 63%; display: flex; justify-content: end; align-items: center;">

            <div class="food_count display">
                <div class="mention_box" style="background-color: #f36e6e;"></div>
                <p style="margin-left: 6px;">Non-Veg :</p>
                <input class="_eg" id="nonveg" value="0">
            </div>

        <div class="food_count display">
            <div class="mention_box" style="background-color: #98f36e;"></div>
            <p  style="margin-left: 6px;">Veg :</p>
            <input class="_eg" id="veg" value="0" >
        </div>

        </div>
      </div>  
   </center>
                                <?php
    
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $online)
                                    {

                                        if($online['dep'] == $filter_dep){

                                        



                                        if($online['food'] == "nonveg"){

                                    
                                        ?>

<center>
<input id="nonveg_no" type="hidden" value="1"/>

    <div class="stu_box_nv" >
        <div style="display:flex; align-items: start; justify-content: start; margin-left: 20px;">
           
            <div style="width: 200px;">
                <h4 type="button"  class="stuname" ><?= $online['name']; ?></h4>
                <p class="regno"><?= $online['reg_no']; ?></p>
                <p class="sec"><?= $online['dep']; ?> ( <?= $online['year']; ?> Year )</p>
                <p class="sec">( <?= $online['pay_mode']; ?> mode )</p>
            </div>
                                            
              <h2 class="tot"><?= $online['prt_no']; ?></h2>
              
            
        </div>
        
    </div>
    </center>

                                               <script>
                                                    var nonveg_no = document.getElementById("nonveg_no").value;
                                                    var nonveg_old = document.getElementById("nonveg").value;

                                                    var nonveg_new = Number(nonveg_old) + Number(nonveg_no);

                                                    document.getElementById("nonveg").value = nonveg_new;
                                                </script>

  
    
                                 
                                        <?php

                                        }else{

                                            ?>

                                            <center>
                                            <input id="veg_no" type="hidden" value="1"/>
                                                <div class="stu_box_v" >
                                                    <div style="display:flex; align-items: start; justify-content: start; margin-left: 20px;">
                                                       
                                                        <div style="width: 200px;">
                                                            <h4 type="button"  class="stuname" ><?= $online['name']; ?></h4>
                                                            <p class="regno"><?= $online['reg_no']; ?></p>
                                                            <p class="sec"><?= $online['dep']; ?> ( <?= $online['year']; ?> Year )</p>
                                                            <p class="sec">( <?= $online['pay_mode']; ?> mode )</p>
                                                        </div>
                                            
                                                        <h2 class="tot"><?= $online['prt_no']; ?></h2>
                                                          
                                                        
                                                    </div>
                                                    
                                                </div>
                                                </center>

                                                <script>
                                                    var veg_no = document.getElementById("veg_no").value;
                                                    var veg_old = document.getElementById("veg").value;

                                                    var veg_new = Number(veg_old) + Number(veg_no);

                                                    document.getElementById("veg").value = veg_new;

                                                </script>

                                            
                                                
                                                                             
                                                                                    <?php

                                        }

                                        ?>

                                        <script>


                                        var tot = document.getElementById("veg").value;
                                        var tal = document.getElementById("nonveg").value;

                                        var total = Number(tot) + Number(tal);

                                        document.getElementById("total").value = total;

                                        </script>


                                        <?php
                                    }


                                        ?>



                                                


<?php
                                    }
                                }else{

                                    echo "<center><h4>No Student Registerd</h4></center>";
                                }
                                ?>
                                
                           
    
                  
                  </div>
      
    </div>
    
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
        <script>

    
        </script>
    
    
    
    </body>
    </html>
    
    <?php


}
else{

    header("Location: /");

}



}
else{

    header("Location: /");

}