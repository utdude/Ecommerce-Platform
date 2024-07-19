<?php

include_once("Config.php");
include_once("Function.php");

    if(isset($_GET['Search'])){
        
        $searchF = E($_GET['Search']);
        
        $search = '%'.$searchF.'%';
            $stmt = $conn->prepare("SELECT * FROM `products` WHERE ProductName LIKE ? OR `tags` LIKE ?");
            $stmt->execute([$search , $search]);
            
            if($stmt->rowCount() == 0){
                
                echo '<p style="padding:20px;text-align:center;">No Search Results Found For " '.$searchF.' "</p>';
                
            }else{
             
                while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                
                     $json[] = $res;
                    
                }
                echo json_encode($json);
            }

        
    }else{
        echo "No Products Found!";
    }

    

?>