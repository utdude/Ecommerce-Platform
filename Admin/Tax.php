<?php session_start(); if(isset($_SESSION['ADMIN_LOGIN'])){ ?>
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
            <div><a href="Profit">Profit</a></div>
            <div><a href="Query">Queries</a></div>
            <div><a href="Complain">Complains</a></div>
            <div><a href="#" id="Active">Tax</a></div>
       
    </div>
    
    
    <form action="Tax" method = "post">
        <br><br>
        <input type="text" placeholder="TOTAL TAX" name="TT" required style="width:80%; border:none; padding:15px;"><br><br>
        
        <input type="submit" value="Change" name="STT" style="padding:10px; background:#438af4; color:#fff; border:none;">
        </form>
        <br><br>
        <form method="post" action="Tax">
        <input type="text" placeholder="DELIVERY CHARGE" name="DC" required style="width:80%; border:none; padding:15px;"><br><br>
        <input type="submit" value="Change" name="SDC" style="padding:10px; background:#438af4; color:#fff; border:none;">
        
        
    </form>
    
    
    <?php
        if(isset($_POST['STT'])){
            
            include_once("../Process/Config.php");
            
            $tt = $_POST['TT'];
            
            $stmt = $conn->prepare("UPDATE `Tax` SET Tax = ?");
            $stmt->execute([$tt]);
            
        }
                                                           
         if(isset($_POST['SDC'])){
            
            include_once("../Process/Config.php");
            
            $tt = $_POST['DC'];
            
            $stmt = $conn->prepare("UPDATE `Tax` SET DeliveryCharge = ?");
            $stmt->execute([$tt]);
            
        }
                                                           
                                                           
        ?>
    
    </center>
    
</body>
</html>
<?php }else{ echo '<script>window.location = "Login";</script>'; } ?>