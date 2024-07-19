<?php 
session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        

        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
            if($username == "Utdude" && $password == "utdudetheadmin"){
                
                $_SESSION['ADMIN_LOGIN'] = $username;
                
              #  echo "<script>window.location = 'index';</script>";
                
            }
            
        else{
            
            echo 'Wrong Credentials!';
            
        }
        
    }else{
        echo 'Something Went Wrong!';
    }

?>