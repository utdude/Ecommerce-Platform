<?php
session_start();
    include_once("Config.php");
    include_once("Function.php");

    if(isset($_POST['username']) && isset($_POST['password'])){
        
        
        $username = E($_POST['username']);
        $password = E($_POST['password']);
        
        $stmt = $conn->prepare("SELECT * FROM `login-information` WHERE Username = ?");
        $stmt->execute([$username]);
        
        if($stmt->rowCount() == 1){
            
             $result = $stmt->fetch(PDO::FETCH_OBJ);
            $pass =  $result->Password;
            
            if(password_verify($password , $pass)){
                
                if($result->Verification == "VERIFIED"){
                    
                     $_SESSION['SELLER_LOGIN'] = $result->Uniqid;
                echo $username;
                    
                }else{
                     echo "VERIFICATION";
                }
              
                
               
                
            }else{
                echo "Wrong Password!";                
            }
            
        }else{
            
            echo 'No Account Found With Username "'.$username.'"';
            
        }
        
        
    }else{
        echo 'Something Went Wrong!';
    }
?>