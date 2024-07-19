<?php

 if(isset($_POST['recoveryID']) && isset($_POST['password'])){
     
     include_once("Config.php");
     include_once("Function.php");
                
                $newpass = E($_POST['password']);
                $uniqid = E($_POST['recoveryID']);
     
     try{
         
          $options = [
   				 'cost' => 12,
			];
				$newpass =  password_hash($newpass, PASSWORD_BCRYPT, $options);
         
          $stm = $conn->prepare("UPDATE `user-login-information` SET Password = ? WHERE Uniqid = ?");
                if($stm->execute([$newpass,$uniqid])){
                    
                    $st = $conn->prepare("UPDATE `user-login-information` SET Recovery = '' WHERE Uniqid = ?");
            $st->execute([$uniqid]);
                }
         
         
     }catch(PDOExeception $e){
         echo $e;
     }
                    
                
                }else{
                    
                    echo 'null';
                    
                }
                
              
                
            
    

?>
