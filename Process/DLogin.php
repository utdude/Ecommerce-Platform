<?php 
session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        
        include_once("../Process/Config.php");
        include_once("../Process/Function.php");
        
        $username = E($_POST['username']);
        $password = E($_POST['password']);
        
        $stmt = $conn->Prepare("SELECT * FROM `delivery` WHERE Username = ?");
        $stmt->execute([$username]);
        
        if($stmt->rowCount() == 1){
            
            $result = $stmt->fetch(PDO::FETCH_OBJ);
        
        $pass = $result->Password;
        
        if(password_verify($password,$pass)){
            
            $uniqid = $result->Uniqid;
            
            $_SESSION['DELIVERY_LOGIN'] = $uniqid;
            
        }else{
            
            echo 'Wrong Password!';
            
        }
            
        }else{
            
            echo "No Account Found With Username ' ".$username." ' Please Check!";
            #$uniq = md5(uniqid(rand(), true));
           # echo $uniq ,"<br>";
      #  $options = [
   			#	 'cost' => 12,
			#];
				#echo $password =  password_hash($password, PASSWORD_BCRYPT, $options);
            
        }
        
        
        
    }else{
        echo 'Something Went Wrong!';
    }

?>