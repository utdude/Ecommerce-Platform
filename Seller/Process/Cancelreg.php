<?php   
    
    session_start();

    if(isset($_SESSION['registering'])){

        $uniqid = $_SESSION['registering'];
    include("Config.php");
    include("Function.php");

    
    if(isset($_POST['uniqid'])){
        
        
        try{
        
           
            
             $stmt2 = $conn->prepare("DELETE FROM `selling-details` WHERE Uniqid = ?");
        $execute2 = $stmt2->execute([$uniqid]);
            
             $stmt1 = $conn->prepare("DELETE FROM `seller-details` WHERE Uniqid = ?");
        $execute1 = $stmt1->execute([$uniqid]);
            
             $stmt3 = $conn->prepare("DELETE FROM `login-information` WHERE Uniqid = ?");
        $execute3 = $stmt3->execute([$uniqid]);
            
             $stmt4 = $conn->prepare("DELETE FROM `payment-information` WHERE Uniqid = ?");
        $execute4 = $stmt4->execute([$uniqid]);
            
        
        if($execute4){
            echo '1';
        }else{
            echo 'SOMETHING WENT WRONG!';
        }
            
        }catch(PDOException $e){
           # echo 'NULL', $e;
        }
        
        
    }}else{}
?>