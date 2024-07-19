 <?php
   session_start();
    if(isset($_SESSION['DELIVERY_LOGIN'])){
        
        
        if(isset($_POST['fetch']))
        {
            
            
        
        
     $uniqid = $_SESSION['DELIVERY_LOGIN'];
   
        include_once("Config.php");
    include_once("Function.php");
            
             $stmt = $conn->prepare("SELECT * FROM `orders` WHERE status = 'Recieved'");
        $stmt->execute();
    
        if($stmt->rowCount() == 0){
        
            echo '<p style="padding:20px;text-align:center;">Nothing Ordered Yet.</p>';
            
        }else{
            
           
            
            while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                $productid = $result->Product_ID;
                $date = $result->Date;
                 $stm = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
        $stm->execute([$productid]);
                
                while($res = $stm->fetch(PDO::FETCH_OBJ)){
                    
                    
                    
            
                
?>


    <br>
    <center>
        <a href="Delivery?ID=<?php echo $result->OrderID; ?>" style="text-decoration:none; color:#1a1a1a;">
            <div class="tab Producttabs">
                <div class="imageholder">

                    <!--THE PRODUCT IMAGE SHOULD BE FETCHED HERE-->
                    <center><img src="../Seller/Panel/Products/<?php echo strtolower($res->ProductImage);  ?>" alt=""></center>

                </div>

                <section class="productlabel">
                    <div style="padding:0px;">
                        <!--THE PRODUCT NAME SHOULD BE FETCHED HERE-->
                        <h5 style="font-size:15px;"><?php echo $res->ProductName; ?></h5>

                        <div style="width:auto; height:auto;   margin-left:15px; padding:5px;">
                            <p style="color:#f7817b;">Price - &nbsp;</p>
                            <p>₹<?php echo $res->ProductPrice*$result->quantity; ?></p>
                            <br>
                            <!--  <p style="font-size:13px; padding:5px;"><?php echo $date; ?></p>
                         <p style="font-size:13px; color:#0dd746; padding:5px;">[<?php echo $result->status; ?>]</p>-->
                        </div>

                    </div>
                    <div style="width:100%; padding:2px;">
                        <p><?php echo $result->Address; ?></p><br>
                        <p><?php echo $result->LandMark; ?></p><br>
                        <p><?php echo $result->Pincode; ?></p><br>
                        <p><b>Phone -</b> <?php echo $result->PhoneNumber; ?></p><br>
                    </div>
                </section>



            </div>

        </a>


    </center>
    <?php   
                        }
            }
        }
        
 
    
        try{
            
            
        
        
           
         $stmt = $conn->prepare("SELECT * FROM `refund` WHERE status = 'Recieved'");
        $stmt->execute();
    
        if($stmt->rowCount() == 0){
        
            echo '<p style="padding:20px;text-align:center;">Nothing Ordered Yet.</p>';
            
        }else{
            
           
            
            while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                
                
                $orderid = $result->OrderID;
                
                $st = $conn->prepare("SELECT * FROM `orders` WHERE OrderID = ?");
                $st->execute([$orderid]);
                
                while($re = $st->fetch(PDO::FETCH_OBJ)){
                    
                    $productid = $re->Product_ID;
                    
                
                
               
                
                 $stm = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
                
        $stm->execute([$productid]);
                
                while($res = $stm->fetch(PDO::FETCH_OBJ)){
                    
                    
                    
            
                
?>


    <br>
    <center>
        <a href="Return?ID=<?php echo $result->OrderID; ?>" style="text-decoration:none; color:#1a1a1a;">
            <div class="tab Producttabs">
                <div class="imageholder">

                    <!--THE PRODUCT IMAGE SHOULD BE FETCHED HERE-->
                    <center><img src="../Seller/Panel/Products/<?php echo strtolower($res->ProductImage);  ?>" alt=""></center>

                </div>

                <section class="productlabel">
                    <div style="padding:0px;">
                        <!--THE PRODUCT NAME SHOULD BE FETCHED HERE-->
                        <h5 style="font-size:15px;"><?php echo $res->ProductName; ?></h5>

                        <div style="width:auto; height:auto;   margin-left:15px; padding:5px;">
                           
                            <p>RETURN & REFUND</p>
                            <br>
                           
                        </div>

                    </div>
                    
                </section>



            </div>

        </a>


    </center>
    <?php   
                        }
            }}
        }
        
    }catch(PDOExeception $e){
            echo $e;
        }
            }else{}
    }else{
        echo '';
    }
    ?>