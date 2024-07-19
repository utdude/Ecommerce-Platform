<?php  

session_start();

if(isset($_SESSION['USERS_LOGIN'])){
    
    $uniqid = $_SESSION['USERS_LOGIN'];
    
    include_once("Config.php");
    include_once("Function.php");
  
    if(isset($_POST['uniqid']) && isset($_POST['subject']) && isset($_POST['query'])){
        
        $uniqid = E($_POST['uniqid']);
        $subject = E($_POST['subject']);
        $query = E($_POST['query']);
        
        $stmt = $conn->prepare("INSERT INTO `complain` (ID,Uniqid,Subject,ComplainBody) VALUES ('',?,?,?)");
        $stmt->execute([$uniqid,$subject,$query]);
        
    }else{
        echo 'SOMETHING WENT WRONG';
    }
    
    
}else{echo 'SOMETHING WENT WRONG';}
?>