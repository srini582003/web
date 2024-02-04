<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="removeBanner.js"></script>
    <title>Login CL Admin</title>
</head>
<style>
 .setkey{

    width: 225px;
    height: 35px;
    border: none;
    text-align: center;
    background-color: white;
    border-radius: 50px;
    box-shadow: 3px 3px 10px #747474;
 }
.key{
    width: 100px;
    margin-top: 30px;
    border-radius: 30px;
    border: none;
    background-color: #f21483;
    padding: 6px;
    font-weight: 600;
    color: white;
    padding: 10px;
    box-shadow: 3px 3px 10px #747474;
}
.logo{
  width: 250px;
  margin-top: 30px;
}
.error{
    margin-top: 20px;
    color: red;
    font-size: 15px;

}
</style>
<body>
    
    <form id="check_login" >
      <center>
        <img class="logo" src="cl/logo.png" />
        <br>
        <input required name="id" placeholder="Enter ID" style="margin-top: -30px;" class="setkey" type="text" />
        <br>
        <input required name="pass" type="password" style="margin-top: 30px;" autocomplete="off" placeholder="Password" class="setkey" type="text" />
        <br>
        <button type="submit" class="key">Login</button>
     </center>
    </form>
    <center>
    <p class="error"><p>
    </center>
   
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#check_login', function (e) {
            e.preventDefault();

            $('.key').hide();

            var formData = new FormData(this);
            formData.append("login_admin", true);

            $.ajax({
                type: "POST",
                url: "code.srini",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 'suc') {
                        
                        
                        window.location.replace(res.link);


                    }else if(res.status == 'fail'){
                        
                       alert("Id & Passward Incorrect");
                       history.go(0);

          
                    }
                    


                }
            });

        });
        </script>
</html>