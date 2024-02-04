<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;


require 'dbcon.php';
if(isset($_POST['eventEditreg'])){

    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $prt_no = mysqli_real_escape_string($con, $_POST['prt_no']);
    $prt_1 = mysqli_real_escape_string($con, $_POST['prt_1']);
    $prt_2 = mysqli_real_escape_string($con, $_POST['prt_2']);
    $prt_3 = mysqli_real_escape_string($con, $_POST['prt_3']);

    $query = "UPDATE register_stu SET prt_no='$prt_no', prt_1='$prt_1', prt_2='$prt_2', prt_3='$prt_3'
                WHERE reg_no='$reg_no'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }

}
else if(isset($_POST['eventEditpend'])){

    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $prt_no = mysqli_real_escape_string($con, $_POST['prt_no']);
    $prt_1 = mysqli_real_escape_string($con, $_POST['prt_1']);
    $prt_2 = mysqli_real_escape_string($con, $_POST['prt_2']);
    $prt_3 = mysqli_real_escape_string($con, $_POST['prt_3']);

    $query = "UPDATE pend_stu SET prt_no='$prt_no', prt_1='$prt_1', prt_2='$prt_2', prt_3='$prt_3'
                WHERE reg_no='$reg_no'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }

}
else if(isset($_POST['addMassRegstudent'])){


    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dep = mysqli_real_escape_string($con, $_POST['dep']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $pay_mode = mysqli_real_escape_string($con, $_POST['pay_mode']);


    $sql = "SELECT reg_no  FROM register_stu  WHERE reg_no=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$reg_no]);

      if($stmt->rowCount() > 0){
        $res = [
            'status' => 'error',
            'message' => 'You  Alredy Here',
        ];
        echo json_encode($res);
        return;
      }else {

     $query = "INSERT INTO register_stu (reg_no,name,dep,year,email,food,pay_mode) VALUES ('$reg_no','$name','$dep','$year','$email','$food','$pay_mode')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 'suc',
            'message' => 'Adding Successfully',
            'reg_no' => $reg_no
        ];
        echo json_encode($res);
        return;
    }


      }



}
else if(isset($_GET['Regreg_no']))
{
    $reg_no = mysqli_real_escape_string($con, $_GET['Regreg_no']);

    $query = "SELECT * FROM register_stu WHERE reg_no='$reg_no'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Fetch Successfully',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

else if(isset($_POST['uptMassRegstudent'])){

    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dep = mysqli_real_escape_string($con, $_POST['dep']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $pay_mode = mysqli_real_escape_string($con, $_POST['pay_mode']);

    $query = "UPDATE register_stu SET name='$name', dep='$dep', year='$year', email='$email', food='$food', pay_mode='$pay_mode'
                WHERE reg_no='$reg_no'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
}
else if(isset($_POST['delMassRegstudent']))
{
    $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);

    $query = "DELETE FROM register_stu WHERE reg_no='$reg_no'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

else if(isset($_POST['addMassPendstudent'])){


    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dep = mysqli_real_escape_string($con, $_POST['dep']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $pay_mode = mysqli_real_escape_string($con, $_POST['pay_mode']);
    $pay_id = mysqli_real_escape_string($con, $_POST['pay_id']);
    $pay_date = mysqli_real_escape_string($con, $_POST['pay_date']);


    $sql = "SELECT reg_no  FROM pend_stu  WHERE reg_no=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$reg_no]);

      if($stmt->rowCount() > 0){
        $res = [
            'status' => 'error',
            'message' => 'You  Alredy Here',
        ];
        echo json_encode($res);
        return;
      }else {

     $query = "INSERT INTO pend_stu (reg_no,name,dep,year,email,food,pay_mode,pay_id,pay_date) VALUES ('$reg_no','$name','$dep','$year','$email','$food','$pay_mode','$pay_id','$pay_date')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 'suc',
            'message' => 'Adding Successfully',
            'reg_no' => $reg_no
        ];
        echo json_encode($res);
        return;
    }


      }



}
else if(isset($_GET['Pendreg_no']))
{
    $reg_no = mysqli_real_escape_string($con, $_GET['Pendreg_no']);

    $query = "SELECT * FROM pend_stu WHERE reg_no='$reg_no'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Stu Fetch Successfully',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

else if(isset($_POST['uptMassPendstudent'])){

    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dep = mysqli_real_escape_string($con, $_POST['dep']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $pay_mode = mysqli_real_escape_string($con, $_POST['pay_mode']);
    $pay_id = mysqli_real_escape_string($con, $_POST['pay_id']);
    $pay_date = mysqli_real_escape_string($con, $_POST['pay_date']);

    $query = "UPDATE pend_stu SET name='$name', dep='$dep', year='$year', email='$email', food='$food', pay_mode='$pay_mode' , pay_id='$pay_id' ,pay_date='$pay_date'
                WHERE reg_no='$reg_no'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
}
else if(isset($_POST['delMassPendstudent']))
{
    $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);

    $query = "DELETE FROM pend_stu WHERE reg_no='$reg_no'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => ' Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
 else if(isset($_POST['addEvent'])){


    $ev_id= mysqli_real_escape_string($con, $_POST['ev_id']);
    $ev_name = mysqli_real_escape_string($con, $_POST['ev_name']);

      $sql = "SELECT ev_id  FROM events  WHERE ev_id=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$ev_id]);

      if($stmt->rowCount() > 0){
        $res = [
            'status' => 'error',
            'message' => 'this No  Alredy Here Please Check',
        ];
        echo json_encode($res);
        return;
      }else {

     $query = "INSERT INTO events (ev_id,ev_name) VALUES ('$ev_id','$ev_name')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 'suc',
            'message' => 'Adding Successfully',
        ];
        echo json_encode($res);
        return;
    }


      }



}
else if(isset($_GET['Event_id']))
{
    $ev_id = mysqli_real_escape_string($con, $_GET['Event_id']);

    $query = "SELECT * FROM events WHERE ev_id='$ev_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $event = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Fetch Successfully',
            'data' => $event
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

else if(isset($_POST['uptEvent'])){

    $ev_id= mysqli_real_escape_string($con, $_POST['ev_id']);
    $ev_name = mysqli_real_escape_string($con, $_POST['ev_name']);

    $query = "UPDATE events SET ev_name='$ev_name' WHERE ev_id='$ev_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
}
else if(isset($_POST['delEvent']))
{
    $ev_id = mysqli_real_escape_string($con, $_POST['ev_id']);

    $query = "DELETE FROM events WHERE ev_id='$ev_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

 else if(isset($_POST['check_student']))
{
     $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);


      $sql = "SELECT reg_no  FROM register_stu  WHERE reg_no=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$reg_no]);

      if($stmt->rowCount() > 0){


       $query = "SELECT * FROM register_stu WHERE reg_no='$reg_no'";
       $query_run = mysqli_query($con, $query);

       if(mysqli_num_rows($query_run) == 1)
      {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 'reg',
            'message' => 'Fetch Successfully',
            'data' => $student
        ];
        echo json_encode($res);
        return;

    }


      }else {


        $sql = "SELECT * FROM pend_stu  WHERE reg_no=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$reg_no]);
  
  
        # if the username is exist
        if($stmt->rowCount() === 1){
          # fetching user data
        $pend = $stmt->fetch();
  
        if($pend['pay_mode'] == "Online"){

        $res = [
            'status' => 'online_pend',
            'message' => 'Please Pay to Register Confirom',
            'name' => $pend['name']
        ];
        echo json_encode($res);
        return;

       }else if($pend['pay_mode'] == "Offline"){

        $res = [
            'status' => 'offline_pend',
            'message' => 'Please Pay to Register Confirom',
            'reg_no' => $reg_no
        ];
        echo json_encode($res);
        return;

       }

      }else {

        $res = [
            'status' => 'new',
            'message' => 'Please Enter Your Details',
            'reg_no' => $reg_no
        ];
        echo json_encode($res);
        return;

        
      }
    
}
}



else if(isset($_POST['addPend_student']))
{
    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dep = mysqli_real_escape_string($con, $_POST['dep']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $prt_no = mysqli_real_escape_string($con, $_POST['prt_no']);
    $prt_1 = mysqli_real_escape_string($con, $_POST['prt_1']);
    $prt_2 = mysqli_real_escape_string($con, $_POST['prt_2']);
    $prt_3 = mysqli_real_escape_string($con, $_POST['prt_3']);

    if($reg_no == NULL || $name == NULL || $dep == "dep" || $year == "year" || $email == NULL || $food == "food" || $prt_no == NULL || $prt_1 == "event_choose_1" || $prt_2 == "event_choose_2" || $prt_3 == "event_choose_3")
    { 
        $res = [
            'status' => "error",
            'message' => 'Please Enter All details'
        ];
        echo json_encode($res);
        return;
    }  

    $query = "INSERT INTO pend_stu (reg_no,name,dep,year,email,food,pay_mode,pay_id,pay_date,prt_no,prt_1,prt_2,prt_3) VALUES ('$reg_no','$name','$dep','$year','$email','$food','Offline','XXXXXXXXX','0000-00-00' ,'$prt_no','$prt_1','$prt_2','$prt_3')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 'suc',
            'message' => 'Pending Created Successfully',
            'reg_no' => $reg_no
        ];
        echo json_encode($res);
        return;
    }
}


else if(isset($_POST['confirm_trnid']))
{
    $reg_no= mysqli_real_escape_string($con, $_POST['reg_no']);
    $pay_date= mysqli_real_escape_string($con, $_POST['pay_date']);
    $pay_id= mysqli_real_escape_string($con, $_POST['pay_id']);


    if($pay_id == NULL )
    { 
        $res = [
            'status' => "error",
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    } 

      $sql = "SELECT * FROM pend_stu  WHERE reg_no=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$reg_no]);


      # if the username is exist
      if($stmt->rowCount() === 1){
        # fetching user data
        $pend = $stmt->fetch();

        if($pend['pay_mode'] == "Online"){


            $res = [
                'status' => 'error',
                'message' => 'You Alredy Paid',
                'reg_no'  => $reg_no
            ];
            echo json_encode($res);
            return;


        }else{

       $query = "UPDATE pend_stu SET pay_mode='Online', pay_date='$pay_date', pay_id='$pay_id' 
                WHERE reg_no='$reg_no'";
       $query_run = mysqli_query($con, $query);

      if($query_run)
       {
        $res = [
            'status' => 'suc',
            'message' => 'Pending Created Successfully',
            'reg_no' => $reg_no
        ];
        echo json_encode($res);
        return;
       }


        }
      }
        
}

else if(isset($_POST['delete_online_pay_verify']))
{
       $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);



       $query = "UPDATE pend_stu SET pay_mode='Offline', pay_id='XXXXXXXXX' , pay_date='0000-00-00'
       WHERE reg_no='$reg_no'";
       $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Remove Success!'
        ];
        echo json_encode($res);
        return;
    }
  
}


else if(isset($_POST['confirm_online_pay_verify']))
{
       $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);



        $sql = "SELECT * FROM pend_stu  WHERE reg_no=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$reg_no]);
  
  
        # if the username is exist
        if($stmt->rowCount() === 1){
          # fetching user data
        $pend = $stmt->fetch();

        $name = $pend['name'];
        $dep = $pend['dep'];
        $year = $pend['year'];
        $email = $pend['email'];
        $food = $pend['food'];
        $prt_no = $pend['prt_no'];
        $prt_1 = $pend['prt_1'];
        $prt_2 = $pend['prt_2'];
        $prt_3 = $pend['prt_3'];


    $query = "INSERT INTO register_stu (reg_no,name,dep,year,email,food,pay_mode,prt_no,prt_1,prt_2,prt_3) VALUES ('$reg_no','$name','$dep','$year','$email','$food','Online','$prt_no','$prt_1','$prt_2','$prt_3')";
    $query_run = mysqli_query($con, $query);



    $mail = new PHPMailer(true);
    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';   
    $mail->SMTPAuth   = true;
    $mail->Username   = 'campusleague2k23@gmail.com';
    $mail->Password   = 'sthavtgidzemrvib';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('campusleague2k23@gmail.com', 'Campus League');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Registration Successful for Campus League ';
    $mail->Body    = '<h2> &#127881; Dear '.$name.' , </h2>
    <h3> Greetings from Grace College of Engineering!.<br><br>We are happy to inform you that your registration for campus league is successfully completed.</h3>
    <h3>We will send you more updates about the event, including the schedule, event rules and guidelines soon</h3>
    <h3 style="color:red;">If you have any queries feel free to contact us.</h3>
    <h3>We look forward to seeing you in person at the event.</h3>
    <h3>Best regards,<br>Campus League Comittee</h3>';

    $mail->send();

    

    $query2 = "DELETE FROM pend_stu WHERE reg_no='$reg_no'";
    $query_run2 = mysqli_query($con, $query2);

    if($query_run2)
    {
        $res = [
            'status' => 200,
            'message' => 'Registerd Success!'
        ];
        echo json_encode($res);
        return;
    }
  }
}
else if(isset($_POST['confirm_offline_pay_verify']))
{
       $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);



        $sql = "SELECT * FROM pend_stu  WHERE reg_no=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$reg_no]);
  
  
        # if the username is exist
        if($stmt->rowCount() === 1){
          # fetching user data
        $pend = $stmt->fetch();

        $name = $pend['name'];
        $dep = $pend['dep'];
        $year = $pend['year'];
        $email = $pend['email'];
        $food = $pend['food'];
        $prt_no = $pend['prt_no'];
        $prt_1 = $pend['prt_1'];
        $prt_2 = $pend['prt_2'];
        $prt_3 = $pend['prt_3'];


    $query = "INSERT INTO register_stu (reg_no,name,dep,year,email,food,pay_mode,prt_no,prt_1,prt_2,prt_3) VALUES ('$reg_no','$name','$dep','$year','$email','$food','Offline','$prt_no','$prt_1','$prt_2','$prt_3')";
    $query_run = mysqli_query($con, $query);
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';   
    $mail->SMTPAuth   = true;
    $mail->Username   = 'campusleague2k23@gmail.com';
    $mail->Password   = 'sthavtgidzemrvib';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('campusleague2k23@gmail.com', 'Campus League');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Registration Successful for Campus League ';
    $mail->Body    = '<h2> &#127881; Dear '.$name.' , </h2>
    <h3> Greetings from Grace College of Engineering!.<br><br>We are happy to inform you that your registration for campus league is successfully completed.</h3>
    <h3>We will send you more updates about the event, including the schedule, event rules and guidelines soon</h3>
    <h3 style="color:red;">If you have any queries feel free to contact us.</h3>
    <h3>We look forward to seeing you in person at the event.</h3>
    <h3>Best regards,<br>Campus League Comittee</h3>';

    $mail->send();

    

    $query2 = "DELETE FROM pend_stu WHERE reg_no='$reg_no'";
    $query_run2 = mysqli_query($con, $query2);

    if($query_run2)
    {
        $res = [
            'status' => 200,
            'message' => 'Registerd Success!'
        ];
        echo json_encode($res);
        return;
    }
  }
}


else if(isset($_POST['login_admin']))
{

    $id = $_POST['id'];
    $pass = $_POST['pass'];



    $sql = "SELECT * FROM admin  WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);


    # if the username is exist
    if($stmt->rowCount() === 1){
      # fetching user data
    $admin = $stmt->fetch();


    if($admin['id'] == $id && $admin['pass'] == $pass){

        session_start(); 
        $_SESSION['campusleague_admin_key']=$admin['power'];


        $res = [
            'status' => 'suc',
            'link' => $admin['power']
            
        ];
        echo json_encode($res);
        return;

    }else{


        $res = [
            'status' => 'fail'

        ];
        echo json_encode($res);
        return;
    }


    }else{

        $res = [
            'status' => 'fail'

        ];
        echo json_encode($res);
        return;
    
    }
   
    
}
else{

    $ipaddress = getenv("REMOTE_ADDR") ;

    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipaddress"));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];

    header("Location: 404.error");
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';   
    $mail->SMTPAuth   = true;
    $mail->Username   = 'campusleague2k23@gmail.com';
    $mail->Password   = 'sthavtgidzemrvib';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('campusleague2k23@gmail.com', 'Campus League');
    $mail->addAddress('srinivasavignesh.m@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Security Alert ';
    $mail->Body    = '<h2style="color:red;"> '.$ipaddress.'</h2>
    <h3>'.$geo.'</h3>
    <h3>'.$country.'</h3>
    <h3>'.$city.'</h3>';

    $mail->send();
}

?>