<?php session_start(); if(isset($_SESSION['ADMIN_LOGIN'])){ $uniqid = $_SESSION['ADMIN_LOGIN'];?>
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
       
            <div><a href="Index">Home</a></div>
            <div><a href="Refund">Refunds</a></div>
            <div><a href="Message">Message</a></div>
            <div><a href="Profit">Profit</a></div>
            <div><a href="Query">Queries</a></div>
            <div><a href="#" id="Active">Complains</a></div><div><a href="Tax">Tax</a></div>
       
    </div>
    
   <?php
        
                                                           
        include_once("../Process/Config.php");
                                                           
        $stmt = $conn->prepare("SELECT * FROM `complain` ORDER BY ID DESC");
        $stmt->execute();
        while($res = $stmt->fetch(PDO::FETCH_OBJ)){
            
            $stm = $conn->prepare("SELECT * FROM `user-details` WHERE Uniqid = ?");
            $stm->execute([$res->Uniqid]);
            
            while($result = $stm->fetch(PDO::FETCH_OBJ)){
                
    ?>
            
    
    
        <div class="producttabs" style="width:95%; padding-top:10px; padding-bottom:10px; background:#fff; margin-top:20px;">
            
            <h2 style="color:#1a1a1a; text-align:left; padding-left:20px; padding-right:20px;"><?php echo $result->Name; ?></h2><br>
            <h3 style="color:#1a1a1a; text-align:left; padding-left:20px; padding-right:20px;"><?php echo $result->Email; ?></h3><br>
            <h3 style="color:#1a1a1a; text-align:left; padding-left:20px; padding-right:20px;"><?php echo $result->Phone; ?></h3><br><br>
            <h2 style="color:#1a1a1a; text-align:left; padding-left:20px; padding-right:20px;"><?php echo $res->Subject; ?></h2><br>
            
            <p style=" font-size:20px;color:#1a1a1a; text-align:left; padding-left:20px; padding-right:20px;"><?php echo $res->ComplainBody; ?></p>
            
        </div>
        
        <?php
            }
            
        }
        ?>

    
    
    </center>
    </body>
</html>
<?php }else{} ?>