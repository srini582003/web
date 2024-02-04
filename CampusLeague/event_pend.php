<?php
session_start(); 
require 'dbcon.php';

if ($_SESSION['campusleague_admin_key'] == "admin_pannel" ) {

    if(isset($_POST['pend_game_id']))
    {
  
        $game_id = $_POST['pend_game_id'];


    ?>

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <title>Events Game</title>
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
        font-size: 20px;
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

                <?php

$sql = "SELECT * FROM events  WHERE ev_id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$game_id]);


# if the username is exist
if($stmt->rowCount() === 1){
  # fetching user data
$event = $stmt->fetch();




?>
           
                 

                  <div id="myTable">

                  
                      
                      <?php
                                

                                $query = "SELECT * FROM pend_stu";
                                $query_run = mysqli_query($con, $query);
                                $tot = mysqli_num_rows($query_run);

                
                                if(mysqli_num_rows($query_run) > 0)
                                {

                                    ?>
                                    <h3 style="margin-left:20px"><?= $event['ev_name']; ?></h3>
                                    <h4 style="margin-left:20px">Total : <input class="_eg" id="tot" value="0"> </h4>
                                <?php
                                    foreach($query_run as $online)
                                    {



                                        if($online['prt_1'] == $game_id || $online['prt_2'] == $game_id || $online['prt_3'] == $game_id){

                                    
                                        ?>

<center>
<input id="tt" type="hidden" value="1"/>

    <div class="stu_box_nv" >
        <div style="display:flex; align-items: start; justify-content: start; margin-left: 20px;">
           
            <div style="width: 200px;"
                <h4 type="button"  class="stuname" > <?= $online['name']; ?> </h4>
                <p class="regno"><?= $online['reg_no']; ?></p>
                <p class="sec"><?= $online['dep']; ?> ( <?= $online['year']; ?> Year )</p>
              </div>
              
        </div>
        
    </div>
    </center>

                                               <script>
                                                    var tot = document.getElementById("tot").value;
                                                    var tt = document.getElementById("tt").value;

                                                    var tot_new = Number(tot) + Number(tt);

                                                    document.getElementById("tot").value = tot_new;
                                                </script>
  
    
                                 
                                        <?php

                                        }


                                        ?>



                                                


<?php
                                    }
                                }else{

                                    echo "<center><h4>No Stundent Pending</h4></center>";
                                }

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