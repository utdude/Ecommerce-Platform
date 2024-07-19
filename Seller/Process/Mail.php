<?php
if(isset($_SESSION['registering'])){
    include_once("Config.php");
    $uniqid = $_SESSION['registering'];
    
    $stmt = $conn->prepare("SELECT * FROM `seller-details` WHERE Uniqid = ?");
    $stmt->execute([$uniqid]);
    
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    
    

$from = 'no-reply@binokio.xyz'; 
$fromName = 'Binokio Seller'; 
 
$subject = "Binokio Seller Varification"; 
 
$htmlContent = ' 
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail From Binokio Seller</title>
</head>
<body style="font-family: arial; background:;">
   <center><div style="width:90%; border:1px solid #999; padding-bottom:20px;">
    <div class="header" style="background:#ec5d36; width:100%; padding-top:5px; padding-bottom:5px;">
        <center><img src="Img/HeadSeller.png" alt="" style="height:70px;"></center>
    </div>
    <div class="content">
        <p style="padding: 20px; padding-bottom:10px; font-size:20px; color:#1a1a1a;">Thankyou For Registering To Binokio Seller!</p>
        <p style="padding: 20px; padding-top:10px; font-size:20px; color:#1a1a1a;">You Can Now Upload Your Products By Logging In To Binokio Seller..</p>
        <h2 style="padding: 20px; padding-bottom:10px; font-size:20px; color:#1a1a1a;">Please Varify Your Email By Clicking On This Link Below -</h2>
        <br>
        <center><a href=""><Button style="padding:20px; color:#fff; background: #ec5d36; width:60%; font-size:20px; border:none;">Click Here!!</Button></a><br><br><br><img src="Img/logo.png" alt="" style="height:100px;"></center>
        
    </div></div></center>
</body>
</html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$result->Email.'>' . "\r\n"; 
$headers .= 'Cc: welcome@example.com' . "\r\n"; 
$headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){ 
    echo 'Email has sent successfully.'; 
}else{ 
   echo 'Email sending failed.'; 
}
    
    
    
}else{}
?>