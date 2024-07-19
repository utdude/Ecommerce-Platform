<?php
session_start();
if(isset($_SESSION['USERS_LOGIN'])){
    
    if(isset($_POST['orderid'])){
        
        include_once("Config.php");
        include_once("Function.php");
        
        $orderid = E($_POST['orderid']);
        $uniqid = E($_POST['uniqid']);
        $problem = E($_POST['problem']);
        $paytmname = E($_POST['paytmname']);
        $paytmno = E($_POST['paytmno']);
        $bankname = E($_POST['bankname']);
        $bankacc = E($_POST['bankacc']);
        $ifsc = E($_POST['ifsc']);
        
        $stmt = $conn->prepare("INSERT INTO `refund` (`OrderID`, `Uniqid`, `Problem`, `PaytmName`, `PaytmNo`, `BankName`, `BankAccNo`, `IFSCCode`,`status`) VALUES (?,?,?,?,?,?,?,?,'Recieved')");
        $stmt->execute([
            $orderid,$uniqid,$problem,$paytmname,$paytmno,$bankname,$bankacc,$ifsc
        ]);
        
        $stm = $conn->prepare("UPDATE `orders` SET status = 'Refund' WHERE OrderID = ?");
        $stm->execute([$orderid]);
        
    }else{
        
    }
    
}else{
}

?>