<?php 


function isMobileDevice() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
, $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobileDevice()){

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="removeBanner.js"></script>
    <title>404</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
    body{
        height: 300px;
    }
   *{
     
     font-family: 'Poppins', sans-serif;
   }
</style>
<body>
<center>
    <img src="cl/404_mob.png" width="200px" style="margin-top:40%"/>
    <h2>☹ Oops ~ 404 Error !</h2>
    <h6 style="margin-top:-10px">Page not found </h6>
    
</center>

</body>
</html>

<?php 
}
else {
    ?>
	
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="removeBanner.js"></script>
    <title>404</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
   *{
     
     font-family: 'Poppins', sans-serif;
   }
</style>
<body>
<center>
    <div style="margin-top: 5%;">
        <img src="cl/404_dek.png" width="20%" />
    <h1>This page is outside of the universe</h1>
    <h6 style="font-size: 15px; width:500px;">The page you are trying to access does not exist or has been moved.Try going back to our homepage</h6>
    </div>
</center>
</body>
</html>


    <?php 
}

?>
