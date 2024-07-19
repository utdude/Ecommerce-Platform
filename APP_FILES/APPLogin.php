<?php
session_start();
if(isset($_SESSION['USERS_LOGIN'])){
    echo '[ You Are Already Logged In! ]';
}else{

    include_once("Config.php");
    include_once("Function.php");

    if(isset($_POST['username']) && isset($_POST['password'])){
        
        
        $username = E($_POST['username']);
        $password = E($_POST['password']);
        
        $stmt = $conn->prepare("SELECT * FROM `user-login-information` WHERE Username = ? OR Email = ?");
        $stmt->execute([$username,$username]);
        
        if($stmt->rowCount() == 1){
            
             $result = $stmt->fetch(PDO::FETCH_OBJ);
            $pass =  $result->Password;
            
            if(password_verify($password , $pass)){
              
                
               $_SESSION['USERS_LOGIN'] = $result->Uniqid;
               
               echo $result->Uniqid;
                
            }else{
                echo "Wrong Password!";                
            }
              
        
        }else{
            
            echo '[ No Account Found With "'.$username.'" ]';
            
        }
        
        
    }else{
        echo '[ Something Went Wrong! ]';
    }
}
?>