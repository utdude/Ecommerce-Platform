<?php
if(isset($_POST['productid'])){
    
    include_once("../../Process/Config.php");
    include_once("../../Process/Function.php");
    
    $productid = E($_POST['productid']);
    
    $stmt = $conn->prepare("INSERT INTO `featured` (ID,ProductID) VALUES ('',?)");
    $stmt->execute([$productid]);
    
    
}

if(isset($_POST['productid_unfeature'])){
    
    include_once("../../Process/Config.php");
    include_once("../../Process/Function.php");
    
    $productid = E($_POST['productid_unfeature']);
    
    $stmt = $conn->prepare("DELETE FROM `featured` WHERE ProductID = ?");
    $stmt->execute([$productid]);
    
    
}
?>