<?php include_once("Config.php");


 $stmt = $conn->prepare("SELECT * FROM `products` WHERE ProductCategory = 'Kids' AND ProductNo > 0");
            $stmt->execute([]);
            
        if($stmt->rowCount() == 0){
            echo "<p style='padding:20px;text-align:center;'>No Products Found!</p>";
        }else{
            $json = array();
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                
                $json[] = $res;
                
               
                
            }
         echo json_encode($json);
        }
?>