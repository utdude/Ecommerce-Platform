
    <?php
   
    include_once("../Process/Config.php");

  
        Try{
       $stmt = $conn->prepare("UPDATE `login-information` SET Verification = 'VERIFIED' WHERE Username = 'itsprashantchaudhary'");
        $stmt->execute();
    }
    catch(PDOExeception $e){
    echo $e;
    }
  
?>

