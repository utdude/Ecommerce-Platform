<?php session_start(); if(isset($_SESSION['ADMIN_LOGIN'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="../Css/ui.css">
    
   
    <script src="../Js/Jquery.js"></script>
</head>
<body>
    <center>
       <div class="header">
       
            <div><a href="#" id="Active">Home</a></div>
            <div><a href="Refund">Refunds</a></div>
            <div><a href="Message">Message</a></div>
            <div><a href="Profit">Profit</a></div>
            <div><a href="Query">Queries</a></div>
            <div><a href="Complain">Complains</a></div>
            <div><a href="Tax">Tax</a></div>
       
    </div>
    <div>
        <p>Recently Added Products</p>
    </div>
    
    <?php
        
        include_once("../Process/Config.php");
        
        $stmt = $conn->prepare("SELECT * FROM `products` ORDER BY ID DESC");
        $stmt->execute();
        
        while($res = $stmt->fetch(PDO::FETCH_OBJ)){
            
        
        
        ?>
      <div class="ProductHolder">
    <div class="productCard" style="background:#fff;">
            <a  class="productLink" style="width:20%;">
                <center>
                    <div class="imageholder">
                        <img src="../Seller/Panel/Products/<?php echo strtolower($res->ProductImage); ?>" alt="">
                    </div>

                    <div class="contentholder">
                        <p><sup style="font-size:13px;">&#8377;</sup>&nbsp;<?php echo $res->ProductPrice; ?></p>
                        <h3><?php echo $res->ProductName; ?></h3>
                        <div class="feturebtns" value="<?php echo $res->ProductID; ?>">
                        <?php
                        $stm = $conn->prepare("SELECT * FROM `featured` WHERE ProductID = ?");
                        $stm->execute([$res->ProductID]);
                        
                    
                        if($stm->rowCount() == 1){
                        ?>
                        <center><button class="Featurebtn error" id="unfeatureit" value="<?php echo $res->ProductID; ?>">Unfeature</button></center>
                        <?php    
                        
                        }else{
                            ?>
                             <center><button id="featureit" class="Featurebtn" value="<?php echo $res->ProductID; ?>">Feature</button></center>
                        <?php
                        }
            ?>
                        
                       
                        

</div>
                    </div>
                </center>
            </a>
            <center>

                <!-- <button id="cardcartbtn" class="cardbtn cart" value="<?php #echo $res->ProductID; ?>"><i class="fa fa-heart"></i></button> -->
            </center>
        </div>  
        
         
        <?php
        }
        ?>
        </div>
    </center>
    
    <script>
        $(document).ready(function() {
           $('body').on('click','#featureit',function(e){
             e.preventDefault(); 
               var productid = $(this).val();
               $.ajax({
                   type:"POST",
                   url:"Process/Feature.php",
                   data:{productid:productid},
                   success:function(data){
                       if(jQuery.trim(data) == ""){
                          
                           $('button[value="'+productid+'"]').remove();
                          $('div[value="'+productid+'"]').append('<center><button id="unfeatureit" class="Featurebtn error" value="'+productid+'">Unfeature</button></center>');
                           
                          }else{
                          
                          }
                   }
               });
           });
        });
    </script>
    <script>
        $(document).ready(function() {
           $('body').on('click','#unfeatureit',function(e){
             e.preventDefault(); 
               var productid = $(this).val();
               $.ajax({
                   type:"POST",
                   url:"Process/Feature.php",
                   data:{productid_unfeature:productid},
                   success:function(data){
                       if(jQuery.trim(data) == ""){
                          
                          $('button[value="'+productid+'"]').remove();
                          $('div[value="'+productid+'"]').append('<center><button id="featureit" class="Featurebtn" value="'+productid+'">Feature</button></center>');
                           
                          }else{
                          
                          }
                   }
               });
           });
        });
    </script>
    
</body>
</html>
<?php }else{ echo '<script>window.location = "Login";</script>'; } ?>