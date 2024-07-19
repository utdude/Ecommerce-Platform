<?php

session_start();
    if(isset($_SESSION['USERS_LOGIN'])){
    $uniqid = $_SESSION['USERS_LOGIN'];
    include_once('Config.php');
    include_once('Function.php');
    
    if(isset($_POST['address']) && isset($_POST['landmark']) && isset($_POST['pincode']) && isset($_POST['phone']) && isset($_POST['id']) && isset($_POST['quantity'])){
        
        $address = E($_POST['address']);
        $landmark = E($_POST['landmark']);
        $pincode = E($_POST['pincode']);
        $phone = E($_POST['phone']);
        $id = E($_POST['id']);
        $quantity = E($_POST['quantity']);
        $status = "Recieved";
        
        $stmt = $conn->prepare("SELECT * FROM `user-details` WHERE Uniqid = ?");
        $stmt->execute([$uniqid]);
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        
       $seller = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
        $seller->execute([$id]);
        $result = $seller->fetch(PDO::FETCH_OBJ);
        
        $sellerid = $result->Uniqid;
        
        $date = date("d/m/y");
        
        $order = md5(uniqid(rand(), true));
        
        if($res->Address == ""){
            
          
            $stm = $conn->prepare("UPDATE `user-details` SET Address = ? WHERE Uniqid = ?");
            $stm->execute([$address , $uniqid]);
             $stm = $conn->prepare("UPDATE `user-details` SET LandMark = ? WHERE Uniqid = ?");
            $stm->execute([$landmark , $uniqid]);
             $stm = $conn->prepare("UPDATE `user-details` SET Pincode = ? WHERE Uniqid = ?");
            $stm->execute([$pincode , $uniqid]);
             $stm = $conn->prepare("UPDATE `user-details` SET Phone = ? WHERE Uniqid = ?");
            $stm->execute([$phone , $uniqid]);
            
            $orderit = $conn->prepare("INSERT INTO `orders`(`OrderID`, `Uniqid`, `Product_ID`, `quantity`, `Seller_ID`, `Date`, `Address`, `LandMark`, `Pincode`, `PhoneNumber`,`status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $orderit->execute([$order,$uniqid,$id,$quantity,$sellerid,$date,$address,$landmark,$pincode,$phone,$status]);
            
            
        }else{
            
            $orderit = $conn->prepare("INSERT INTO `orders`(`OrderID`, `Uniqid`, `Product_ID`, `quantity`, `Seller_ID`, `Date`, `Address`, `LandMark`, `Pincode`, `PhoneNumber`,`status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $orderit->execute([$order,$uniqid,$id,$quantity,$sellerid,$date,$address,$landmark,$pincode,$phone,$status]);
            
        }
        
        
    }else{
          echo 'Something went Wrong!';
    }
    
}else{
    echo 'Something went Wrong!!';
    }
    

?>
