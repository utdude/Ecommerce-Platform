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
   
   <div class="overlayMessage">
       <center><div class="Messagebox">
       <input type="hidden" id="MessageHidden" value="">
        <div style="overflow:auto; margin-bottom:20px;"><button class="closeMessagebox">&times;</button></div> 
          <form action="" id="SendMsg">
           <textarea name="" id="Message" cols="30" rows="10"></textarea><br><br><br>
           <button type="submit" id="send" class="">Send</button><br><br>
       </form>
       </div></center>
   </div>
   
    <center>
        <div class="header">

            <div><a href="index">Home</a></div>
            <div><a href="Refund">Refunds</a></div>
            <div><a href="#" id="Active">Message</a></div>
            <div><a href="Profit">Profit</a></div>
            <div><a href="Query">Queries</a></div>
            <div><a href="Complain">Complains</a></div><div><a href="Tax">Tax</a></div>

        </div>
    </center>
    <div class="ProductHolder">
    <?php 
    
    include_once("../Process/Config.php");
                                                           
    $stmt = $conn->prepare("SELECT * FROM `seller-details`");
        $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        
    
        
                                                           
    
    
    ?>
    
    
    <div class="productCard" style="background:#fff;" id="<?php echo $row->Uniqid; ?>">
            <a  class="productLink" style="width:20%;">
                <center>
                    <div class="imageholder">
                        <img src="../Seller/Panel/<?php echo strtolower($row->SellerImage); ?>" alt="">
                    </div>

                    <div class="contentholder">
                        <p><?php echo $row->Name; ?></p>
                        <p><?php echo $row->Phone; ?></p>
                        
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
    <script>
    
        $('#SendMsg').submit(function(e) {
           e.preventDefault();
          
        var uniqid = $('#MessageHidden').val();
            var message = $('#Message').val();
            
           
            if(jQuery.trim(message) != ""){
                
                $.ajax({
                   
                    type:"POST",
                    url:"Process/SendMessage.php",
                    data:{uniqid:uniqid,
                         message:message},
                    success:function(data){
                        if(jQuery.trim(data) == ""){
                            
                            $('.overlayMessage').css('display' , 'none');
                            
                        }else{
                            
                        }
                    }
                    
                });
                
            }else{}
        });
    
    </script>
    
    <script src="Js/Popup.js"></script>
    </body>
    
</html>
<?php }else{} ?>