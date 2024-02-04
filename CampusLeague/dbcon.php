<?php

# server name
$sName = "localhost";
# user name
$uName = "root";
# password
$pass = "";

# database name
$db_name = "campusleague";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}


$con = mysqli_connect($sName,$uName,$pass,$db_name);

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>