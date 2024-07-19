<?php
session_start();

if(isset($_SESSION['USERS_LOGIN'])){
    
    
if(isset($_POST['orderid'])){
    
    include_once("Config.php");
    include_once("Function.php");
    
    $orderid = E($_POST['orderid']);
    
    $stmt = $conn->prepare("UPDATE `orders` SET status = 'Canceled' WHERE OrderID = ?");
    $stmt->execute([$orderid]);
    
}else{
    
}
}else{}

?>