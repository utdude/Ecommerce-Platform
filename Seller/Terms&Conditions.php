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
<div class="confirm">
  <div class="confirm-box">
    <div class="confirm-head">
    <div style="width:100%; overflow: auto;"> <button id="closeconfirm">&times;</button></div> 
    </div>
    <center>
      
        <h3><p align="left">You cannot Register To Binokio Seller ,</p><br> <p align="left">If you dont Agree with the <b>BINOKIO TERMS & CONDITIONS</b></p>. <br>
          <br>please close this popup from top right corner and check the checkbox top of the button.</h3><br>
          <img src="Img/sample.png" alt=""><br>
        <h3>Else IF you want to cancel the registration Click on CONFIRM button Below..</h3>

        <button class="special" id="confirmcancel">Confirm</button>

        <style>
          
            @media(max-width: 900px){
              .confirm-box{
                width:100% !important;

              }
            }

        </style>
    </center>
  </div>
</div>
    <div class="container sub header" id="user">
        <img src="../Img/HeadSeller.png" alt="">

      

                <button class="simple" id="openloginmodal">Login</button>
      
    </div>

  <div class="registrationform">
    <div style="width:30%;
    padding:1px;">  <img src="../Img/HeadSeller.png" class="headlogo" alt=""></div>
    <center><form action="" method="post" id="fifthform">
      <div style="display:flex; justify-content:space-around; padding:20px;">

        <h4 class="steplabel">Step 5</h4>

  <h3 class="pagetoplabel">Terms & Conditions</h3>

  </div>
        <div class="custom-select" style="width:73%; margin-top:20px; ">

</div>


          <div class="termsandconditionsbox">
              <div><img src="../Img/HeadSeller.png" alt="" style="width:80%; height:auto;"><br> <h3><b>Terms & Conditions </b></h3></div><br>
              <p>
                  BINOKIO is a platform which helps people to reach good products from the best seller and on the best price ..
                  But BINOKIO also have some <u>Terms & Conditions</u> which the seller need to <b>Agree</b> with.
              </p>
              <br>
              <hr>
              <br>
              <ul>
                  <li> Seller will only upload real images of the product.</li><br>
                  <li> Seller will not sell wrong products. (like - alcohol,tobacco,<b>DRUGS</b> Etc.)</li><br>
                  <li> Seller will return the product if cutomer returns (ONLY IF THE PRODUCT IS FINE.)</li><br>
                  <li> Seller will return the product within 5 days and refund if funded.</li><br>
              </ul>
              <hr>
          </div><br><br>

           <center><div style="display: flex; justify-content: center; padding:20px;"> <input type="checkbox" id="termcheckbox"><label id="label" for="" style="padding-left: 10px;">Agree With The BINOKIO <u>Terms & Conditions</u></label>
           </div> </center><button class="special" type="submit">Complete Registration &nbsp;&nbsp;>></button>
             <h2 style="color:#383838; font-size:20px;">Never Worrey Because BINOKIO Is With You 24 x 7</h2><br>
             <center><img src="../Img/logo.png" alt="" style="margin:0px auto; float:none; padding:0px;width:15%; "></center><br><br>

    </form></center>
  </div>

    <script>
      
        $(document).ready(function() {


          $('#closeconfirm').click(function() {
            $('.confirm').css('display' , 'none');
          });


          $('#fifthform').submit(function(e) {
           $('label').click(function() {
             $('#termcheckbox').prop('checked', true)
          });
        var uniqid =  sessionStorage.getItem("uniqID");
            e.preventDefault();

              if($('input[type="checkbox"]').prop("checked") == true){
             /* 
   $.ajax({
                    url: "Process/Mail.php",
                    type: "POST",
                    data: {data:"mail"},
                    cache:false,
                       success:function(){
                    
                }
                });
*/
                window.location = "Welcome.html";


            }else{


                $('.confirm').css('display' , 'block');
                
                $('#confirmcancel').click(function(){
                    $.ajax({
                        url: "Process/Cancelreg.php",
                        type: "POST",
                        data:{uniqid:"delete"},
                        cache:false,
                        
                        beforeSend:function(){
                            $('.overlay-loader').css('display' , 'flex'); 
                        },
                        success:function(data){
                            if(jQuery.trim(data) == '1'){
                            window.location = "../index.html";
                            }else{
                                 $('.overlay-loader').css('display' , 'none');
                                alert("Something Went Wrong!");
                            }
                        }
                    }) ;
                });
      

            }

          });

      });

    </script>

  <style>
      @media(max-width: 900px)
      {
        .termsandconditionsbox
        {
          border:1px solid #fff;
          width:90%;
          height:60vh;
        }

        li,p,label
        {
          color:#fff;
        }
      }
  </style>
</body>
</html>
