<?php
session_start();
if(!isset($_SESSION['SELLER_LOGIN'])){

    echo '<script>window.location = "../Seller";</script>';
}else{
    include_once('Process/Config.php');
    include_once('Process/Function.php');
    $uniqid = $_SESSION['SELLER_LOGIN'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Binokio Seller's</title>
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="stylesheet" href="./Css/Popup.css">
    <link rel="stylesheet" href="./Css/media.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="Img/Logo.png" type="image/png">
    <link rel="stylesheet" href="../../Assets/awesome/css/font-awesome.min.css">
    <script src="../../Js/Jquery.js"></script>
</head>

<body>
   <div class="overlay-loader" style="z-index:10000;">
    <img src="../../Img/Loader.gif" alt="">
  </div>
    <?php
 include('AddProductPopup.php');
    ?>

    <div class="mobilenav">
        <button class="tooglenav">
            <div></div>
            <div></div>
            <div></div>
        </button>

        <div class="sidemenu">
            <ul>
                <li><a href="MySellings"><i class="fa fa-shopping-cart"></i> &nbsp;&nbsp;My Sellings</a></li>
                <li><a href="Messages"><i class="fa fa-comments"></i> &nbsp;&nbsp;Messages</a></li>
                <li><a href="Complain"><i class="fa fa-question"></i> &nbsp;&nbsp;Complain</a></li>
                <li><a href="Ask"><i class="fa fa-question"></i> &nbsp;&nbsp; Ask Questions</a></li>
            </ul>
        </div>
    </div>
    <div class="header">
        <div class="head">
            <img src="./Img/Logo.png" alt="">
            <h2>Seller's Panel</h2>
        </div>
        <div class="links">
            <ul>
                <li><a href="Panel">Home</a></li>
                <li><a href="Edit">Edit Products</a></li>
                <li><a href="#" class="activelink">Settings</a></li>

            </ul>
        </div>
        <div class="nav">
            <button class="options" id="openpopup"><i class="fa fa-plus"></i>&nbsp; Add Product</button>
             <a href="Settings">
                <div class="mask">
                   <?php 
                        
                        $stmt = $conn->prepare("SELECT * FROM `seller-details` WHERE Uniqid = ?");
                        $stmt->execute([$uniqid]);
                        
                        $result = $stmt->fetch(PDO::FETCH_OBJ);
    
                    ?>
                    <img src="../Uploads/<?php echo $result->SellerImage; ?>" alt="">
                </div>
            </a>
        </div>
    </div>
    <div class="smallmenu">
        <div class="container">
            <div><a href="Panel"><i class="material-icons">home</i></a></div>
            <div><a href="Edit"><i class="material-icons">apps</i></a></div>
            <div><a href="#" class="smallnavactive"><i class="material-icons">settings</i></a></div>
        </div>

    </div>
    <div class="panelcontainer">
        <div class="sidepanel">
            <!--<div class="head">
        <div class="mask">
  <img src="./Img/utdude.jpg" alt="">
</div>​

  <h4>Utkarsh Rai</h4>
      </div>-->
            <div class="head">
                <h3>Seller Actions</h3>

            </div>
            <center>





                <div>
                    <a href="MySellings" class="sellings navbtn"><i class="fa fa-shopping-cart"></i> &nbsp;&nbsp; My Sellings
                        <!--<div><p>0</p></div>--></a>
                </div>

                <div>
                    <a href="Messages" class="Messages navbtn"><i class="fa fa-envelope"></i> &nbsp;&nbsp; Messages
                        <!--<div><p>0</p></div>--></a>
                </div>


                <div>
                    <a href="Ask" class="ask navbtn"><i class="fa fa-question"></i> &nbsp;&nbsp; Ask Question</a>
                </div>

                <div>
                    <a href="Complain" class="complain navbtn"><i class="fa fa-comments"></i> &nbsp;&nbsp;Complain</a>
                </div>

            </center>

        </div>

        <form action="" type="POST" id="SettingsForm">
            <div class="contentpane"><br>
                <div class="tab ">

                    <center><button class="panelbtn" type="button"id="Logout_Btn">Logout</button></center>
                </div><br>
                <div class="tab profileimgtab">
                    <?php 
                      
                        $stmt = $conn->prepare("SELECT * FROM `seller-details` WHERE Uniqid = ?");
                        $stmt->execute([$uniqid]);
                        
                        $result = $stmt->fetch(PDO::FETCH_OBJ);
    $stm = $conn->prepare("SELECT * FROM `login-information` WHERE Uniqid = ?");
                        $stm->execute([$uniqid]);
                        
                        $res = $stm->fetch(PDO::FETCH_OBJ);
    
     $st = $conn->prepare("SELECT * FROM `payment-information` WHERE Uniqid = ?");
                        $st->execute([$uniqid]);
                        
                        $re = $st->fetch(PDO::FETCH_OBJ);
    
                    ?>
                    <center>
                        <div class="mask bigmask"><img src="../Uploads/<?php echo $result->SellerImage; ?>" alt=""></div>
                    </center>
                    <div>
                        <label class="custom-file-upload" style="width:50px; background: none;">
                            <input type="file" id="imgInp" disabled>
                            <i class="material-icons" style="color:#393939;">edits</i>
                        </label>
                    </div>
                </div><br>

                <div class="tab loginedit">
                    <h2 style="padding:10px;">Edit Login Details</h2>
                    <div>
                        <input type="text" placeholder="Username" value="<?php echo $res->Username; ?>" class="panelinput" disabled>
                    </div>
                    <div>
                        <input type="password" placeholder="New Password (Min 8 Characters)" id="password" value="" class="panelinput">
                    </div>
                     <div>
                        <input type="password" placeholder="Confirm Password" id="cpassword" value="" class="panelinput">
                    </div>



                </div><br>

                <div class="tab loginedit">
                    <h2 style="padding:10px;">Edit Contact Details</h2>
                    <div>
                        <input type="email" placeholder="Email" id="email" value="<?php echo $result->Email; ?>" class="panelinput">
                    </div>
                    <div>
                        <input type="text" placeholder="Phone" id="phone" value="<?php echo $result->Phone; ?>" class="panelinput">
                    </div>



                </div><br>

                <div class="tab loginedit">
                    <h2 style="padding:10px;">Edit Paytm Details</h2>
                    <div>
                        <input type="text" id="paytmno" placeholder="Paytm Number" value="<?php echo $re->PaytmNo; ?>" class="panelinput">
                    </div>
                    <div>
                        <input type="text" placeholder="Paytm Name" id="paytmname" value="<?php echo $re->PaytmName; ?>" class="panelinput">
                    </div>



                </div>

                <br><br>
                <div class="tab">
                    <center><button class="panelbtn" type="submit">Update <i class="fa fa-tick"></i></button></center>

                </div><br><br><div id="errorbox"><b>
                       <center><p></p></center> 
                    </b></div> <br><br><br><br>
            </div>

        </form>

        <style>
            @media(max-width:900px) {
                .contentpane {
                    padding-top: 120px;
                }
            }

        </style>

        <script>
            $(document).ready(function() {
                $('#Logout_Btn').click(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "Process/Logout.php",
                        type: "POST",
                        data: {
                            data: 'logout'
                        },
                        cache: false,
                        beforeSend: function() {
                            $('.overlay-loader').css('display', 'flex');
                        },
                        success: function(data) {
                            window.location = "../Seller";
                        }
                    });
                });



                $('#SettingsForm').submit(function(e) {
                    e.preventDefault();

                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var password = $('#password').val();
                    var paytmno = $('#paytmno').val();
                    var paytmname = $('#paytmname').val();
                    var cpassword = $('#cpassword').val();
                    
                    if(jQuery.trim(password) == jQuery.trim(cpassword)){
                        
                         $.ajax({

                        url: "Process/Update.php",
                        type: "POST",
                        data: {
                            email: email,
                            password: password,
                            paytmno: paytmno,
                            paytmname: paytmname,
                            phone: phone
                        },
                        beforeSend: function() {
                            $('.overlay-loader').css("display", "flex");
                        },
                        success: function(data) {
                            if (jQuery.trim(data) == "") {

                                $('.overlay-loader').css("display", "none");
                                $('#errorbox p').css('color', '#06d614');
                                $('#errorbox p').html("Updated Successfully <i class='fa fa-check'></i>");

                            } else {
                                $('.overlay-loader').css("display", "none");
                                $('#errorbox p').css('color', '#ff1100');
                                $('#errorbox p').html(data);

                            }
                        }

                    });
                        
                    }else{
                        
                         $('#errorbox p').css('color', '#ff1100');
                                $('#errorbox p').html("Password Not Confirmed Correctly!");
                        
                    }




                });



            });

        </script>



    </div>


    <script src="Js/menu.js"></script>
    <script src="Js/Add.js"></script>
    <script src="Js/popup.js"></script>
    <script src="Js/select.js"></script>
    <script src="Js/preview.js"></script>
</body>

</html>
<?php } ?>
