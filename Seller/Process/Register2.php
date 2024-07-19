<?php 

    session_start();
    if(isset($_SESSION['registering'])){
        
        $uniqID = $_SESSION['registering'];
        
   
    include_once("Config.php");
        include_once("Function.php");

    if(isset($_POST['category'])){
       
       
       $category = E($_POST['category']);
       $perannum = E($_POST['perannum']);
       $adharno = E($_POST['adharno']);
       $adharname = E($_POST['adharname']);


       $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
       $stmt = $conn->prepare('INSERT INTO `selling-details` (ID,Uniqid,Category,Earning,AadharNo,AadharName) VALUES ("",?,?,?,?,?)');
      /* $stmt->bindParam(':uniqid', $uniqID);
       $stmt->bindParam(':category', $category);
       $stmt->bindParam(':perannum', $perannum);
       $stmt->bindParam(':adharno', $adharno);
       $stmt->bindParam(':adharname', $adharname);*/
		if($stmt->execute([
			$uniqID,$category,$perannum,$adharno,$adharname
		])){
			echo '1';
		}else{
			echo '0';
		}



    }else{
    	echo 'something went wrong!';
    }
 }else{}
 ?>