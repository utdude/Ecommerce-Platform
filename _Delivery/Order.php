<?php
session_start();
if(!isset($_SESSION['DELIVERY_LOGIN'])){
    echo '<script>window.location = "Login";</script>';
}else{
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="refresh" content="300">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveryboy Login</title>
    <link rel="stylesheet" href="../Css/Style.css">
    <link rel="stylesheet" href="../Style.css">



    <link rel="stylesheet" href="../Css/supporters.css">

    <link rel="stylesheet" href="../Css/ui.css">

    <link rel="stylesheet" href="../Css/Modals.css">


    <link rel="stylesheet" href="../Css/Media.css">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Happy+Monkey|Rajdhani:300" rel="stylesheet">

    <link rel="shortcut icon" href="../Img/logo.png" type="image/png">

    <link rel="stylesheet" href="../Assets/awesome/css/font-awesome.min.css">
    <script src="../Js/Jquery.js"></script>
    
   
</head>

<body style="background:url('../Img/LOGIN_BG.jpg'); background-size:cover;">
    <div>
        <center><form action="" method="post">
            <button class="simple" name="logout" type="submit">Logout</button>
        </form></center>
    </div><br>
<?php 
    
    if(isset($_POST['logout'])){
        
       
        session_destroy();
        echo '<script>window.location = "login";</script>';
        
    }
    
    ?>
    <div class="container fetchorder">
<?php

   
   
        include_once("../Process/Config.php");
    include_once("../Process/Function.php");
    
        
        
        $stmt = $conn->prepare("SELECT * FROM `orders` WHERE status = 'Recieved'");
        $stmt->execute();
    
        if($stmt->rowCount() == 0){
        
            echo '<p style="padding:20px;text-align:center;">Nothing Ordered Yet.</p>';
            
        }else{
            
           
            
            while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                $productid = $result->Product_ID;
                $date = $result->Date;
                 $stm = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
        $stm->execute([$productid]);
                
                while($res = $stm->fetch(PDO::FETCH_OBJ)){
                    
                    
                    
            
                
?>


    <br>
    <center>
        <a href="Delivery?ID=<?php echo $result->OrderID; ?>" style="text-decoration:none; color:#1a1a1a;">
            <div class="tab Producttabs">
                <div class="imageholder">

                    <!--THE PRODUCT IMAGE SHOULD BE FETCHED HERE-->
                    <center><img src="../Seller/Panel/Products/<?php echo strtolower($res->ProductImage);  ?>" alt=""></center>

                </div>

                <section class="productlabel">
                    <div style="padding:0px;">
                        <!--THE PRODUCT NAME SHOULD BE FETCHED HERE-->
                        <h5 style="font-size:15px;"><?php echo $res->ProductName; ?></h5>

                        <div style="width:auto; height:auto;   margin-left:15px; padding:5px;">
                            <p style="color:#f7817b;">Price - &nbsp;</p>
                            <p>₹<?php echo $res->ProductPrice*$result->quantity; ?></p>
                            <br>
                            <!--  <p style="font-size:13px; padding:5px;"><?php echo $date; ?></p>
                         <p style="font-size:13px; color:#0dd746; padding:5px;">[<?php echo $result->status; ?>]</p>-->
                        </div>

                    </div>
                    <div style="width:100%; padding:2px;">
                        <p><?php echo $result->Address; ?></p><br>
                        <p><?php echo $result->LandMark; ?></p><br>
                        <p><?php echo $result->Pincode; ?></p><br>
                        <p><b>Phone -</b> <?php echo $result->PhoneNumber; ?></p><br>
                    </div>
                </section>



            </div>

        </a>


    </center>
    <?php   
                        }
            }
        }
        
    ?>
    
    
    
    <?php
         $stmt = $conn->prepare("SELECT * FROM `refund` WHERE status = 'Recieved'");
        $stmt->execute();
    
        if($stmt->rowCount() == 0){
        
            echo '<p style="padding:20px;text-align:center;">Nothing Ordered Yet.</p>';
            
        }else{
            
           
            
            while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                
                
                $orderid = $result->OrderID;
                
                $st = $conn->prepare("SELECT * FROM `orders` WHERE OrderID = ?");
                $st->execute([$orderid]);
                
                while($re = $st->fetch(PDO::FETCH_OBJ)){
                    
                    $productid = $re->Product_ID;
                    
                
                
               
                
                 $stm = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
                
        $stm->execute([$productid]);
                
                while($res = $stm->fetch(PDO::FETCH_OBJ)){
                    
                    
                    
            
                
?>


    <br>
    <center>
        <a href="Return?ID=<?php echo $result->OrderID; ?>" style="text-decoration:none; color:#1a1a1a;">
            <div class="tab Producttabs">
                <div class="imageholder">

                    <!--THE PRODUCT IMAGE SHOULD BE FETCHED HERE-->
                    <center><img src="../Seller/Panel/Products/<?php echo strtolower($res->ProductImage);  ?>" alt=""></center>

                </div>

                <section class="productlabel">
                    <div style="padding:0px;">
                        <!--THE PRODUCT NAME SHOULD BE FETCHED HERE-->
                        <h5 style="font-size:15px;"><?php echo $res->ProductName; ?></h5>

                        <div style="width:auto; height:auto;   margin-left:15px; padding:5px;">
                           
                            <p>RETURN & REFUND</p>
                            <br>
                           
                        </div>

                    </div>
                    
                </section>



            </div>

        </a>


    </center>
    <?php   
                        }
            }}
        }
        
    ?>
       
    </div>

    <script>
        $(document).ready(function() {
            setInterval( function(){

                $.ajax({
                
                type : "POST",
                url: "../Process/FetchOrders.php",
                data: {fetch:fetch},
                success:function(data){
                    $('.fetchorder').html(data);    
            }

                });

            }, 15000);
        });

    </script>

    <style>
        .Producttabs {

            width: 20%;
            border-radius: 5px;
            padding: 10px;
            background: #fff;

        }

        .imageholder {}

        .imageholder img {}

        .Producttabs .productlabel {}

        .Producttabs .productlabel h5 {
            padding: 10px;
        }

        .Producttabs .productlabel p {

            display: inline-block;
            padding: 5px;

        }

        @media(max-width: 950px) {
            .Producttabs {
                width: 90% !important;
            }
        }

    </style>
</body>

</html>


<?php
}

?>
