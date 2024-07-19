<?php 

session_start();
if(isset($_SESSION['registering'])){
    
    $uniqID = $_SESSION['registering'];

	include_once("Config.php");
    include_once("Function.php");

	if(isset($_POST['paytmphone']) || isset($_POST['bankname'])){

		
		$paytmphone = E($_POST['paytmphone']);
		$paytmname = E($_POST['paytmname']);
		$bankname = E($_POST['bankname']);
		$accno = E($_POST['accno']);
		$ifsccode = E($_POST['ifsccode']);

	try{


		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$stmt = $conn->prepare("INSERT INTO `payment-information` (ID	,Uniqid	,PaytmNo,	PaytmName,	BankName,	BankAccNo,	IFSCCode) VALUES ('',?,?,?,?,?,?)");
		if($stmt->execute([
			$uniqID,$paytmphone,$paytmname,$bankname,$accno,$ifsccode
		])){
			echo '1';
		}

		
	}catch(PDOException $e){
		echo 'NULL';
	}
		

	}else{
		echo 'somethind went wrong!';
	}
}else{}
 ?>