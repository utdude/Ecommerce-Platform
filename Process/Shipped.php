<?php 
session_start();
if(isset($_SESSION['DELIVERY_LOGIN'])){
    if(isset($_POST['orderID'])){
        
        include_once("../Process/Config.php");
        include_once("../Process/Function.php");
        
        $orderid = E($_POST['orderID']);
        
        $stmt = $conn->prepare("UPDATE `orders` SET status = 'Shipped' WHERE OrderID = ?");
        $stmt->execute([$orderid]);
        
    }else{
        
    }
    
 if(isset($_POST['pickup']) && isset($_POST['ReturnorderID'])){
        
        include_once("../Process/Config.php");
        include_once("../Process/Function.php");
        
        $orderid = E($_POST['ReturnorderID']);
        
        $stmt = $conn->prepare("UPDATE `refund` SET status = 'Picked' WHERE OrderID = ?");
        $stmt->execute([$orderid]);
        
    }else{
        
    }
}else{
    echo 'NULL';
}
    


        ?>