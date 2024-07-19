<?php 

session_start();
if(isset($_SESSION['registering'])){
    $uniqID = $_SESSION['registering'];

	include_once("Function.php");
	include_once("Config.php");

	if(isset($_POST['username'])){

		
		$username = E($_POST['username']);
		$password = E($_POST['password']);


			$options = [
   				 'cost' => 12,
			];
				$password =  password_hash($password, PASSWORD_BCRYPT, $options);
		

	try{

		$check = $conn->prepare("SELECT * FROM `login-information` WHERE Username = :username");
		$check->execute([
			'username' => $username
			
		]);

		if($check->rowCount() == 0){


			$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$stmt = $conn->prepare("INSERT INTO `login-information` (ID	,Uniqid,Username,Password) VALUES ('',?,?,?)");
		$stmt->execute([
			$uniqID,$username,$password
		]);
			echo '1';
			
		

		
		} else{

				echo 'Please choose a new username " '.$username.' " has already been taken.';

		}

		
	}catch(PDOException $e){
		echo 'NULL';
	}
		

	}else{
		echo 'somethind went wrong!';
	}
}else{}
 ?>