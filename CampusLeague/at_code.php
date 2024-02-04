<?php
require 'dbcon.php';


if(isset($_POST['at_check']))
{
     $reg_no = mysqli_real_escape_string($con, $_POST['reg_no']);


      $sql1 = "SELECT reg_no  FROM register_stu  WHERE reg_no=?";
      $stmt1 = $conn->prepare($sql1);
      $stmt1->execute([$reg_no]);

      if($stmt1->rowCount() > 0){




      $sql2 = "SELECT reg_no  FROM attendance  WHERE reg_no=?";
      $stmt2 = $conn->prepare($sql2);
      $stmt2->execute([$reg_no]);

        if($stmt2->rowCount() > 0){
            $res = [
                'status' => 'alredy',
                'message' => 'Alredy Attendanced',
                'reg_no' => $reg_no
            ];
            echo json_encode($res);
            return;
        }else{


        $sql3 = "SELECT * FROM register_stu  WHERE reg_no=?";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute([$reg_no]);
  
        if($stmt3->rowCount() === 1){
    
         $at = $stmt3->fetch();

        $name = $at['name'];
        $dep = $at['dep'];
        $year = $at['year'];

        $query = "INSERT INTO attendance (reg_no,name,dep,year) VALUES ('$reg_no','$name','$dep','$year')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $res = [
                'status' => 'put',
                'message' => 'Success!',
                'name' => $name
            ];
            echo json_encode($res);
            return;
        }


        }

        }


        }else {

        $res = [
            'status' => 'no',
            'message' => 'This registration number is not registered',
            'reg_no' => $reg_no
        ];
        echo json_encode($res);
        return;
    }


}

?>