<?php
if(isset($_POST['orderid'])){
    
    include_once("../../Process/Config.php");
    include_once("../../Process/Function.php");
    
    $orderid = E($_POST['orderid']);
    
    $stmt = $conn->prepare("UPDATE `refund` SET status = 'Refunded' WHERE OrderID = ?");
    $stmt->execute([$orderid]);
    
    $stmt = $conn->prepare("UPDATE `orders` SET status = 'Refunded' WHERE OrderID = ?");
    $stmt->execute([$orderid]);
    
    
}

?>