<?php
session_start();
if(isset($_SESSION['USERS_LOGIN'])){
    
    echo 'You Are Already Logged In Please Logout.';
    
}else{
    
    include_once('Config.php');
    include_once('Function.php');
    
    if(isset($_POST['name'])){
        
        $name = E($_POST['name']);
        $email = E($_POST['email']);
        $phone = E($_POST['phone']);
        $username = E($_POST['username']);
        $password = E($_POST['password']);
        $uniq = md5(uniqid(rand(), true));
        $options = [
   				 'cost' => 12,
			];
				$password =  password_hash($password, PASSWORD_BCRYPT, $options);
        
        $stmt = $conn->prepare("SELECT * FROM `user-login-information` WHERE Username = ?");
        $stmt->execute([$username]);
        
        if($stmt->rowCount() == 0){
            
            $stm = $conn->prepare("INSERT INTO `user-details` (Uniqid,Name,Email,PhoneNumber,Address,LandMark,Pincode,Phone) VALUES (?,?,?,?,'','','','')");
            $stm->execute([$uniq,$name,$email,$phone]);
            
            $stm2 = $conn->prepare("INSERT INTO `user-login-information` (Uniqid, Username, Email, Password,Recovery) VALUES (?,?,?,?,'')");
            $stm2->execute([$uniq,$username,$email,$password]);
            
            $_SESSION['USERS_LOGIN'] = $uniq;
            
            $to = $email;
$subject = "Thankyou For Registering To Binokio!";

$message = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail From Binokio Seller</title>
</head>
<body style="font-family: arial; background:;">
   <center><div style="width:90%; border:1px solid #999; padding-bottom:20px;">
    <div class="header" style="background:#ec5d36; width:100%; padding-top:5px; padding-bottom:5px;">
        <center><img src="https://binokio.com/Img/HeadSeller.png" alt="" style="height:70px;"></center>
    </div>
    <div class="content">
        <p style="padding: 20px; padding-bottom:10px; font-size:20px; color:#1a1a1a;">Thankyou very much for registering to binokio.</p>
        <p style="padding: 18px; padding-top:10px; font-size:20px; color:#1a1a1a;">We are trying to grow with help of our customers by providing them best products at their door step..</p>
        
        <center><br><br><br><img src="https://binokio.com/Img/logo.png" alt="" style="height:100px;"></center>
        
    </div></div></center>
</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <no-reply@binokio.com>' . "\r\n";


mail($to,$subject,$message,$headers);
            
            
        }else{
            
            echo 'Username Already Taken! Please Choose Another.';
            
        }
        
        
    }else{
        
    }
    
}


?>