<?php 
session_start();
if(isset($_SESSION['DELIVERY_LOGIN'])){
    if(isset($_POST['orderID'])){
        
        include_once("../Process/Config.php");
        include_once("../Process/Function.php");
        
        $orderid = E($_POST['orderID']);
        $quantity = E($_POST['quantity']);
        
        $stmt = $conn->prepare("UPDATE `orders` SET status = 'Delivered' WHERE OrderID = ?");
        $stmt->execute([$orderid]);
        
         $stm = $conn->prepare("SELECT * FROM `orders` WHERE OrderID = ?");
        $stm->execute([$orderid]);
        
        $productid = $stm->fetch(PDO::FETCH_OBJ);
        
        $pid = $productid->Product_ID;
        
         $sm = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
        $sm->execute([$pid]);
        
        $fetchsm = $sm->fetch(PDO::FETCH_OBJ);
        
        $old = $fetchsm->ProductNo;
        
        $new = ($old-$quantity);
        
        $st = $conn->prepare("UPDATE `products` SET ProductNo = ? WHERE ProductID = ?");
        $st->execute([$new,$orderid]);
        
    }else{
       
    }
    
     if(isset($_POST['DeliveredorderID'])){
        
        include_once("../Process/Config.php");
        include_once("../Process/Function.php");
        
        $orderid = E($_POST['DeliveredorderID']);
        
        $stmt = $conn->prepare("UPDATE `refund` SET status = 'Returned' WHERE OrderID = ?");
        $stmt->execute([$orderid]);
         
          $stmt = $conn->prepare("UPDATE `orders` SET status = 'Returned' WHERE OrderID = ?");
        $stmt->execute([$orderid]);
        
    }else{
       
    }
}else{
    echo 'NULL';
}
    
        ?>