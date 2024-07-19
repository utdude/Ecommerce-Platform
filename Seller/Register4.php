<?php
session_start();
    if(isset($_SESSION['registering'])){
        $uniqid = $_SESSION['registering'];
    }else{
        echo '<script>alert("SOMETHING WENT WRONG!"); window.location = "../index.html";</script>';  
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome To Binokio Seller</title>
  <link rel="stylesheet" href="../Css/Style.css">

    <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="../Css/slider.css">

  <link rel="stylesheet" href="../Css/supporters.css">

  <link rel="stylesheet" href="../Css/ui.css">

  <link rel="stylesheet" href="../Css/Modals.css">

  <link rel="stylesheet" href="../Css/Media.css">

<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

  <link rel="shortcut icon" href="../Img/logo.png" type="image/png">
    <script src="../Js/Jquery.js"></script>
  <link rel="stylesheet" href="../assets/awesome/css/font-awesome.min.css">
</head>
<body>


<div class="overlay-loader">
  <img src="../Img/Loader.gif" alt="">
</div>
    <div class="container sub header" id="user">
        <img src="../Img/HeadSeller.png" alt="">

      

                <button class="simple" id="openloginmodal">Login</button>
       
    </div>

  <div class="registrationform">
    <div style="width:30%;
    padding:1px;">  <img src="../Img/HeadSeller.png" class="headlogo" alt=""></div>
    <center><form action="" method="post" id="fourthform">
      <div style="display:flex; justify-content:space-around; padding:20px;">

        <h4 class="steplabel">Step 4</h4>

  <h3 class="pagetoplabel">Login Information</h3>

</div>
        <div class="custom-select" style="width:73%; margin-top:20px; ">

</div>


         <h4>Login Information will be asked when seller will login -</h4><br><br><br>
<style>
  
    h4{
      color:#1a1a1a;
      padding:20px;
    }
    @media(max-width: 900px){
      h4{
        color:#fff;
        font-size:17px;
      }
    }

</style>
           <input type="text" class="forminput" id="username" Placeholder="Username (Asked When Login)" ><br><br>

             <input type="password" class="forminput" id="password" Placeholder="Passsword (Should Be 8 Characters)" ><br><br>


             <button class="special" type="submit">Next &nbsp;&nbsp;>></button><br>
<br>
             <div id="errorbox">
               <center><b><p></p></b></center>
             </div><br><br>
             <h2 style="color:#383838; font-size:20px;">Never Worrey Because BINOKIO Is With You 24 x 7</h2><br>
             <center><img src="../Img/logo.png" alt="" style="margin:0px auto; float:none; padding:0px;width:15%; "></center><br><br>

    </form></center>
  </div>

    

    <script>
    
      $('#fourthform').submit(function(e){
          e.preventDefault();
         
          var username = $('#username').val();
          var password = $("#password").val();


          if(jQuery.trim(username) != '' && jQuery.trim(password) != ''){


               $.ajax({
           url: "Process/Register4",
            type: "POST",
             data:{

                  
                  username:username,
                  password:password
             },
          
           cache: false,
        
        beforeSend : function()
        {

              $('.overlay-loader').css('display' , 'flex');

          },
            success: function(data)
                                    {

          if(jQuery.trim(data) == "1"){

              window.location = "./Terms&Conditions";
             


          }else{
             $('.overlay-loader').css('display' , 'none');
             $('#errorbox ').css('display' , 'block');
             $('#errorbox p').html(data);
          }
      }
        
  });


          }else{
            $('#errorbox ').css('display' , 'block');
            $('#errorbox p').html('Fields Cannot Be Empty!');

          }
                   

          
      });

  </script>



</body>
</html>
