<?php

if(isset($_POST['uniqid']) && isset($_POST['message'])){
    
    include_once("../../Process/Config.php");
    include_once("../../Process/Function.php");
    
    $uniqid = E($_POST['uniqid']);
    $message = E($_POST['message']);
    
    $stmt = $conn->prepare("INSERT INTO `messages` (ID,Uniqid,MessageBody) VALUES ('',?,?)");
    $stmt->execute([$uniqid,$message]);
    
}

?>