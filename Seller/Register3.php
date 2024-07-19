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
 <div class="overlay-loader" style="z-index:10000;">
    <img src="../Img/Loader.gif" alt="">
  </div>

    <div class="container sub header" id="user">
        <img src="../Img/HeadSeller.png" alt="">



                <button class="simple" id="openloginmodal">Login</button>

    </div>

  <div class="registrationform">
    <div style="width:30%;
    padding:1px;">  <img src="../Img/HeadSeller.png" class="headlogo" alt=""></div>
    <center>

      <form action="" method="post" id="thirdform">
      <div style="display:flex; justify-content:space-around; padding:20px;">

        <h4 class="steplabel">Step 3</h4>

  <h3 class="pagetoplabel">Payment Information</h3>

  </div>
        <div class="custom-select" style="width:73%; margin-top:20px; ">

</div>


            <h5>- fill Both The Section <b>(Recomended)</b></h5><br>
            <h5>- fill One Section You would Like To Get The Payment From</h5><br>
             <h5>- Please Check The Given information Once again</h5>
           <br> <br>
         <h4>Paytm Payment Information -</h4><br>

           <input type="text" class="forminput" id="paytmphone" Placeholder="Paytm Phone Number (Should Be Correct)">

            <input type="text" class="forminput" id="paytmname" Placeholder="Paytm Name"><br><br>

             <h4>bank Account Payment Information -</h4><br>

             <input type="text" class="forminput" id="bankname" Placeholder="Bank Name">

             <input type="text" class="forminput" id="accno" Placeholder="Bank Account Number">

             <input type="text" class="forminput" id="ifsccode" Placeholder="Bank IFSC Code">


             <button class="special" type="submit">Next &nbsp;&nbsp;>></button>
             <h2 style="color:#383838; font-size:20px;">Never Worrey Because BINOKIO Is With You 24 x 7</h2><br>
             <center><img src="../Img/logo.png" alt="" style="margin:0px auto; float:none; padding:0px;width:15%; "></center><br><br>

    </form></center>
  </div>
  <script>

      $('#thirdform').submit(function(e){
          e.preventDefault();

          var paytmno = $('#paytmphone').val();
          var paytmname = $("#paytmname").val();
          var bankname = $("#bankname").val();
          var accno = $("#accno").val();
          var ifsccode = $("#ifsccode").val();

          

           $.ajax({
           url: "Process/Register3.php",
            type: "POST",
             data:{


                  paytmphone:paytmno,
                  paytmname:paytmname,
                  bankname:bankname,
                  accno:accno,
                  ifsccode:ifsccode

             },

           cache: false,

        beforeSend : function()
        {
          $('.overlay-loader').css('display' , 'flex');
          },
            success: function(data)
                                    {

          if(jQuery.trim(data) == "1"){
              window.location = "Register4.php";
          }else{
             $('.overlay-loader').css('display' , 'none');
          }
      }

  });
      });

  </script>
<style>
  @media (max-width: 900px)
  {
    h4,h5{
      color:#fff;
    }
  }
</style>
</body>
</html>
