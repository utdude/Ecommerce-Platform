<?php
session_start();
if(isset($_SESSION['DELIVERY_LOGIN'])){

    if(isset($_GET['ID'])){
        
        include_once("../Process/Config.php");
        include_once("../Process/Function.php");
        
        $id = E($_GET['ID']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Binokio</title>
    <link rel="stylesheet" href="../Css/Style.css">
    <link rel="stylesheet" href="../Style.css">



    <link rel="stylesheet" href="../Css/supporters.css">

    <link rel="stylesheet" href="../Css/ui.css">

    <link rel="stylesheet" href="../Css/Modals.css">


    <link rel="stylesheet" href="../Css/Media.css">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Happy+Monkey|Rajdhani:300" rel="stylesheet">

    <link rel="shortcut icon" href="../Img/logo.png" type="image/png">

    <link rel="stylesheet" href="../Assets/awesome/css/font-awesome.min.css">
    <script src="../Js/Jquery.js"></script>
</head>

<body>
    <div class="container">

        <?php
        $stmt = $conn->prepare("SELECT * FROM `orders` WHERE OrderID = ?");
        $stmt->execute([$id]);
        
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $productid = $result->Product_ID;
        $seller = $result->Seller_ID;
        
         $stm = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
        $stm->execute([$productid]);
        
        $res = $stm->fetch(PDO::FETCH_OBJ);
        $image = $res->ProductImage;
        
         $st = $conn->prepare("SELECT * FROM `seller-details` WHERE Uniqid = ?");
        $st->execute([$seller]);
        
        $result2 = $st->fetch(PDO::FETCH_OBJ);
        
        
       
     ?>

        <center>
            <div class="imageholder">
                <img src="../Seller/Panel/Products/<?php echo $image; ?>" alt="">
            </div>

            <br>

            <h3 style="color:#1a1a1a; padding:15px; line-height:25px; letter-spacing:1px;"><?php echo $res->ProductName; ?></h3><br>
            <p style="color:#1a1a1a; font-size:25px;"><sup>&#x20B9;</sup>&nbsp;<?php echo $res->ProductPrice*$result->quantity; ?></p>
            <p style="color:#1a1a1a; font-size:25px; padding:10px;"><sup>Quantity</sup>&nbsp;<?php echo $result->quantity; ?></p>
            <br>
            <h3 style="color:#1a1a1a; padding:15px; line-height:25px; letter-spacing:1px;">- Shop Addresss -</h3>
            <p style="color:#1a1a1a; font-size:20px;"><?php echo $result2->ShopAddress; ?></p>
            <br>
            <h3 style="color:#1a1a1a; padding:15px; line-height:25px; letter-spacing:1px;">- Seller Phone Number -</h3>
            <p style="color:#1a1a1a; font-size:20px;"><a style="Color:#1a1a1a; text-decoration:none;" href="tel:<?php echo $result2->Phone; ?>"><?php echo $result2->Phone; ?></a></p><br>
            <hr style="margin:20px;">
            <h3 style="color:#1a1a1a; padding:15px; line-height:25px; letter-spacing:1px;">- Phone Number -</h3>
            <p style="color:#1a1a1a; font-size:20px;"><a style="Color:#1a1a1a; text-decoration:none;" href="tel:<?php echo $result->PhoneNumber; ?>"><?php echo $result->PhoneNumber; ?></a></p><br>
            <h3 style="color:#1a1a1a; padding:15px; line-height:25px; letter-spacing:1px;">- Address -</h3>
            <p style="color:#1a1a1a; font-size:20px;"><?php echo $result->Address; ?></p>

            <br>
            <h3 style="color:#1a1a1a; padding:15px; line-height:25px; letter-spacing:1px;">- Landmark -</h3>
            <p style="color:#1a1a1a; font-size:20px;"><?php echo $result->LandMark; ?></p>

            <h3 style="color:#1a1a1a; padding:15px; line-height:25px; letter-spacing:1px;">- Area Pincode -</h3>
            <p style="color:#1a1a1a; font-size:20px;"><?php echo $result->Pincode; ?></p><br>

            <button class="simple dark" type="submit" id="Shipped" style="width:150px;">Shipped</button>
            <h3 style="color:#00ff7f; padding:15px; line-height:25px; letter-spacing:1px;" id="success"></h3>
            <button class="simple dark" type="submit" id="Delivered" style="width:150px;">Delivered</button>
            <h3 style="color:#00ff7f; padding:15px; line-height:25px; letter-spacing:1px;" id="success2"></h3>
            <h3 style="border:1px solid #1a1a1a; color:#1a1a1a; width:90%;" id="Completed">Order Completed <i class="fa fa-check"></i></h3>
        </center>

    </div>
    <style>
        #Delivered{
            display: none;
        }
        #Completed{
            display: none;
            padding:20px;
        }
    </style>
    <script>
        $(document).ready(function() {
           $('#Shipped').click(function(e) {
               e.preventDefault;
             var OrderID = "<?php echo $result->OrderID; ?>";
               $.ajax({
                  url:"../Process/Shipped.php" ,
                    type:"POST",
                   data:{orderID:OrderID},
                   success:function(data){
                      if(jQuery.trim(data) == ""){
                          
                          $('#Shipped').css('display' ,'none');
                          $('#success').css('color' ,'#00ff7f');
                          $('#success').css('font-weight' ,'300');
                          $('#success').html("The Item Has Been Shipped!");
                          $('#Delivered').css('display' ,'block');
                          
                      } else{
                          
                      }
                   }
               });
               
           });
        });
        
         $('#Delivered').click(function(e) {
               e.preventDefault;
             var OrderID = "<?php echo $result->OrderID; ?>";
             var quantity = "<?php echo $result->quantity; ?>";
               $.ajax({
                  url:"../Process/Delivered.php" ,
                    type:"POST",
                   data:{orderID:OrderID,quantity:quantity},
                   success:function(data){
                      if(jQuery.trim(data) == ""){
                          
                          $
                          $('#success2').css('color' ,'#00ff7f');
                          $('#success2').css('font-weight' ,'300');
                          $('#success2').html("The Item Has Been Delivered!");
                          $('#Delivered').css('display' ,'none');
                          $('#Completed').css('display','block')
                          window.setTimeout(function() {
    window.location.href = 'Order';
}, 2000);
                      } else{
                          
                      }
                   }
               });
               
           });
        
        
    </script>
    
    
    
    
</body>

</html>


<?php    
}else{
    echo 'NULL';
}}

?>
