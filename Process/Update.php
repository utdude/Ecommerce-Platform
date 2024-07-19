<?php
session_start();
if(isset($_SESSION['USERS_LOGIN'])){
   
    $uniqid = $_SESSION['USERS_LOGIN'];
    
    if(isset($_POST['email']) || isset($_POST['password'])){
        
        include_once("Config.php");
        include_once("Function.php");
        
         $email = E($_POST['email']);
        $password = E($_POST['password']);
        
        if($email == ''){
            
        $options = [
   				 'cost' => 12,
			];
				$password =  password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt = $conn->prepare("UPDATE `user-login-information` SET Password = ? WHERE Uniqid = ?");
        $stmt->execute([$password,$uniqid]);
            
        }elseif($password == ''){
            
             $stmt = $conn->prepare("UPDATE `user-details` SET Email = ? WHERE Uniqid = ?");
        $stmt->execute([$email,$uniqid]);
        
            
        }elseif($email != '' && $password != ''){
            
            
            $options = [
   				 'cost' => 12,
			];
				$password =  password_hash($password, PASSWORD_BCRYPT, $options);
            
             $stmt = $conn->prepare("UPDATE `user-details` SET Email = ? WHERE Uniqid = ?");
        $stmt->execute([$email,$uniqid]);
        
        $stmt = $conn->prepare("UPDATE `user-login-information` SET Password = ? WHERE Uniqid = ?");
        $stmt->execute([$password,$uniqid]);
            
        }
        
       
        
       
        
        
    }else{
        
         echo 'Something Went Wrong!';
        
    }
    
    
}else{
    
    echo '';
    
}

?>
