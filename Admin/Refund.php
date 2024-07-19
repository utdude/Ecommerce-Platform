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

            <div><a href="index">Home</a></div>
            <div><a href="#" id="Active">Refunds</a></div>
            <div><a href="Message">Message</a></div>
            <div><a href="Profit">Profit</a></div>
            <div><a href="Query">Queries</a></div>
            <div><a href="Complain">Complains</a></div><div><a href="Tax">Tax</a></div>

        </div>
        <div>
 <div class="ProductHolder">
            <?php
                                                           
      include_once("../Process/Config.php"); 
         
         
            $stmt = $conn->prepare("SELECT * FROM `refund` ORDER BY ID DESC");
            $stmt->execute();
                                                           
             while($result = $stmt->fetch(PDO::FETCH_OBJ)){
             
                 $stm = $conn->prepare("SELECT * FROM `orders` WHERE OrderID = ?");
            $stm->execute([$result->OrderID]);
                 
                  while($resl = $stm->fetch(PDO::FETCH_OBJ)){
                      
                       $st = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
            $st->execute([$resl->Product_ID]);
                      
                      while($res = $st->fetch(PDO::FETCH_OBJ)){
                 
        ?>
        
                   <div class="productCard" style="background:#fff;">
            <a  class="productLink" style="width:20%;">
                <center>
                    <div class="imageholder">
                        <img src="../Seller/Panel/Products/<?php echo strtolower($res->ProductImage); ?>" alt="">
                    </div>

                    <div class="contentholder">
                        <p style="fontweight:600; font-size:30px;"><sup style="font-size:13px;">&#8377;</sup>&nbsp;<?php echo $res->ProductPrice*$resl->quantity; ?></p><br>
                        <h3><?php echo $res->ProductName; ?></h3>
                        <b><h3>Paytm Number: &nbsp;&nbsp;<?php echo $result->PaytmName; ?></h3></b>
                        <b><h3>Paytm Name: &nbsp;&nbsp;<?php echo $result->PaytmNo; ?></h3></b>
                        <b><h3>Bank Name: &nbsp;&nbsp;<?php echo $result->BankName; ?></h3></b>
                        <b><h3>Bank Account Number: &nbsp;&nbsp;<?php echo $result->BankAccNo; ?></h3></b>
                        <b><h3>Bank IFSC Code: &nbsp;&nbsp;<?php echo $result->IFSCCode; ?></h3></b>
                        <div class="feturebtns" value="<?php echo $result->OrderID; ?>">
                        <?php
                        
                    
                        if($result->status != "Refunded"){
                        ?>
                        <center><button class="Featurebtn" id="Refunded" style="padding:20px;" value="<?php echo $result->OrderID; ?>">Refunded</button></center>
                        <?php    
                        }else{?>
                        <center><h3>Refunded!</h3></center>
                       <?php }?>
                        

</div>
                    </div>
                </center>
            </a>
            <center>

                <!-- <button id="cardcartbtn" class="cardbtn cart" value="<?php #echo $res->ProductID; ?>"><i class="fa fa-heart"></i></button> -->
            </center>
        </div>          
                
                
        <?php
                 
                 
             }}}
                                                           
                                                           
         
          ?>
            </div>

        </div>
<script>
        $(document).ready(function() {
           $('body').on('click','#Refunded',function(e){
             e.preventDefault(); 
               var orderid = $(this).val();
               $.ajax({
                   type:"POST",
                   url:"Process/Refund.php",
                   data:{orderid:orderid},
                   success:function(data){
                       if(jQuery.trim(data) == ""){
                          
                           $('button[value="'+productid+'"]').remove();
                          $('div[value="'+productid+'"]').append(' <center><h3>Refunded!</h3></center>');
                           
                          }else{
                          
                          }
                   }
               });
           });
        });
    
    
    
 
    </script>

    </center>
    <style>
        .productCard{
            width:95% !important;
        }
    </style>
</body>

</html>
<?php }else{} ?>
