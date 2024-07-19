
<?php


if(isset($_POST['email'])){

include_once("Config.php");
include_once("Function.php");

$email = E($_POST['email']);
    
    
$stmt = $conn->prepare("SELECT * FROM `user-details` WHERE Email = ?");
$stmt->execute([$email]);

if($stmt->rowCount() != 0){
    
   $result = $stmt->fetch(PDO::FETCH_OBJ);

    $uniqid = $result->Uniqid;
    
   
     
    $randpass = uniqid(rand() , true);
    $randompass =  password_hash($randpass, PASSWORD_BCRYPT);
    
     $options = [
   				 'cost' => 12,
			];
				$randpass2 =  password_hash($randompass, PASSWORD_BCRYPT, $options);

    $stm = $conn->prepare("UPDATE `user-login-information` SET Recovery = ? WHERE Uniqid = ?");
$stm->execute([$randpass,$uniqid]);



$to = $email;
$subject = "Binokio Account Recovery";

$message = '
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail From Binokio Seller</title>
</head>
<body style="font-family: arial; background:;">
   <center><div style="width:98%;  padding-bottom:20px;">
    <div class="header" style="background:#ec5d36; width:100%; padding-top:5px; padding-bottom:5px;">
        <center><img src="https://binokio.com/Img/logo.png" alt="" style="height:70px;"></center>
    </div>
    <div class="content">
        <p style="padding: 20px; padding-bottom:10px; font-size:20px; color:#1a1a1a;">Your Account Recovery Has Been Approved!</p>
       
        <h2 style="padding: 20px; padding-bottom:10px; font-size:20px; color:#1a1a1a;">To Recover Your Account Click The Link Below -</h2>
        <br>
        <center><a href="binokio.com/Recovery?Recovery_Token='.$randompass.'&Recovery_ID='.$uniqid.'"><Button style="padding:20px; color:#fff; background: #ec5d36; width:60%; font-size:20px; border:none;">Click Here!!</Button></a><br><br><br><img src="Img/logo.png" alt="" style="height:100px;"></center>
        
    </div></div></center>
</body>
</html>
';
    // Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: Binokio <no-reply@binokio.com>' . "\r\n"; 
$headers .= 'Cc: customer@binokio.com' . "\r\n"; 
$headers .= 'Bcc: customer@binokio.com' . "\r\n"; 
 
 
  

mail($to,$subject,$message,$headers);


        }else{
            
            echo '[ No Account Found With Registered Email "'.$email.'" ]';
            
        }
        
    

    }else{
        echo '[ Something Went Wrong! ]';
    }
    

?>
