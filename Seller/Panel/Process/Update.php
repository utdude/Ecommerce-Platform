<?php
session_start();
if(isset($_SESSION['SELLER_LOGIN'])){
   
    $uniqid = $_SESSION['SELLER_LOGIN'];
    
  
        
        include_once("Config.php");
        include_once("Function.php");
        
         $email = E($_POST['email']);
        $password = E($_POST['password']);
     $paytmname = E($_POST['paytmname']);
     $paytmno = E($_POST['paytmno']);
     $phone = E($_POST['phone']);
    
        
        if($password == ""){
            
        
             $stm = $conn->prepare("UPDATE `seller-details` SET Email = ? WHERE Uniqid = ?");
        $stm->execute([$email,$uniqid]);
             $stm = $conn->prepare("UPDATE `seller-details` SET Phone = ? WHERE Uniqid = ?");
        $stm->execute([$phone,$uniqid]);
    
    $st = $conn->prepare("UPDATE `payment-information` SET PaytmName = ? WHERE Uniqid = ?");
        $st->execute([$paytmname,$uniqid]);
            
             $st = $conn->prepare("UPDATE `payment-information` SET PaytmNo = ? WHERE Uniqid = ?");
        $st->execute([$paytmno,$uniqid]);
            
            
        }else{
            
              $options = [
   				 'cost' => 12,
			];
				$password =  password_hash($password, PASSWORD_BCRYPT, $options);
    
    
        $stmt = $conn->prepare("UPDATE `login-information` SET Password = ? WHERE Uniqid = ?");
        $stmt->execute([$password,$uniqid]);
            
        
            
              $stm = $conn->prepare("UPDATE `seller-details` SET Email = ? WHERE Uniqid = ?");
        $stm->execute([$email,$uniqid]);
             $stm = $conn->prepare("UPDATE `seller-details` SET Phone = ? WHERE Uniqid = ?");
        $stm->execute([$phone,$uniqid]);
   $st = $conn->prepare("UPDATE `payment-information` SET PaytmName = ? WHERE Uniqid = ?");
        $st->execute([$paytmname,$uniqid]);
            
             $st = $conn->prepare("UPDATE `payment-information` SET PaytmNo = ? WHERE Uniqid = ?");
        $st->execute([$paytmno,$uniqid]);
            
        }
            
        
        
    
    
}else{
    
    echo '';
    
}

?>
