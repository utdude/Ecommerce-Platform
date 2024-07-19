<?php session_start(); if(isset($_SESSION['ADMIN_LOGIN'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="../Css/ui.css">
    
   
    <script src="../Js/Jquery.js"></script>
</head>
<body>
    <center>
       <div class="header">
       
            <div><a href="index">Home</a></div>
            <div><a href="Refund">Refunds</a></div>
            <div><a href="Message">Message</a></div>
            <div><a href="#" id="Active">Profit</a></div>
            <div><a href="Query">Queries</a></div>
            <div><a href="Complain">Complains</a></div><div><a href="Tax">Tax</a></div>
       
    </div>
    <br><br>
    <p style="color:#fff; font-size:17px; padding:20px;">Without Delivery Charge :</p>
    <div style="width:200px; display:flex; align-items:center; justify-content:center; height:200px; border:2px solid #fff; border-radius:100%;">
        
        <?php
        
            include_once("../Process/Config.php");
            
    $stmt = $conn->prepare("SELECT * FROM `orders` WHERE status = 'Delivered'");
    $stmt->execute();
    
    $sold = $stmt->rowCount();
    
    $stm = $conn->prepare("SELECT * FROM `Tax`");
    $stm->execute();
    
    $fetch = $stm->fetch(PDO::FETCH_OBJ);
    
    $tt = $fetch->Tax;
    
    $dc = $fetch->DeliveryCharge;
    
    $profit = $sold*$tt-$dc*$sold;
            
                                                           
        
        ?>
        
        
         <h2 style="color:#fff; font-size:25px;">&#8377; <?php echo $profit; ?></h2>
        
    </div>
    
   <p style="color:#fff; font-size:17px; padding:20px;">With  Delivery Charge :</p>
   
   <div style="width:200px; display:flex; align-items:center; justify-content:center; height:200px; border:2px solid #fff; border-radius:100%;">
    <h2 style="color:#fff; font-size:25px;">&#8377; <?php echo $profit+$dc*$sold; ?></h2>
        </div>
    
    </center>
    
</body>
</html>
<?php }else{ echo '<script>window.location = "Login";</script>'; } ?>