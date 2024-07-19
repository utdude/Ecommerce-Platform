 <?php
 session_start();
 if(isset($_SESSION['USERS_LOGIN'])){
     $uniqid = $_SESSION['USERS_LOGIN'];
 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Binokio</title>
     <link rel="stylesheet" href="Css/Style.css">
     <link rel="stylesheet" href="Style.css">



     <link rel="stylesheet" href="Css/supporters.css">

     <link rel="stylesheet" href="Css/ui.css">

     <link rel="stylesheet" href="Css/Modals.css">


     <link rel="stylesheet" href="Css/Media.css">

     <link href="https://fonts.googleapis.com/css?family=Comfortaa|Happy+Monkey|Rajdhani:300" rel="stylesheet">

     <link rel="shortcut icon" href="Img/logo.png" type="image/png">

     <link rel="stylesheet" href="Assets/awesome/css/font-awesome.min.css">
     <script src="Js/Jquery.js"></script>
 </head>

 <body>

     <div class="confirmationbox">
         <div class="box">
           <center>  <h3>Do You Really want to cancel the order?</h3><br>
             <button class="simple dark" id="nconfirm">No</button>
             <button class="simple dark" id="confirm">Yes</button>
             </center>
         </div>
     </div>

         <div class="refundbox">
         <div class="box">
          <form action="" type="POST" id="RefundForm">
               <center>
                <h3>Please Fill Up The Refund Form -</h3>
                <br>
                <textarea name="" id="problem" height="100px;" class="forminput" style="height:100px; border-radius:5px;" placeholder="Explain The Problem In  Product.."></textarea><br>

                <input type="text" id="paytmname" class="forminput" placeholder="Paytm Name">
                <input type="text" id="paytmno" class="forminput" placeholder="Paytm Number">
                <input type="hidden" id="RefundOrderID">
                <br>
                <h3>OR</h3>
                 <input type="text" id="bankname" class="forminput" placeholder="Bank Name">
                <input type="text" class="forminput" id="bankacc" placeholder="Bank Account Number">
                 <input type="text" class="forminput" id="ifsc" placeholder="IFSC Code">

                <button type="submit" class="simple dark">Send Request</button>

                <p># Binokio is not responsible for wrong payment information</p>

             </center>
          </form>

         </div>
     </div>

         <script>

             $('#RefundForm').submit(function(e){
                e.preventDefault();
                 var orderid = $('#RefundOrderID').val();
                 var uniqid = "<?php echo $uniqid; ?>";
                 var problem = $('#problem').val();
                 var paytmname = $('#paytmname').val();
                 var paytmno = $('#paytmno').val();
                 var bankname = $('#bankname').val();
                 var bankacc = $('#bankacc').val();
                 var ifsc = $('#ifsc').val();

                 $.ajax({

                     url:"Process/Refund.php",
                     type:"post",
                     data:{
                         orderid:orderid,
                         uniqid:uniqid,
                         problem:problem,
                         paytmname:paytmname,
                         paytmno:paytmno,
                         bankname:bankname,
                         bankacc:bankacc,
                         ifsc:ifsc
                     },
                     cache:false,
                     success:function(data){
                         if(jQuery.trim(data) == ""){

                             $('.refundbox').css('display','none');
                             $('#'+orderid+'').html('Product Will Be Picked Up Soon! And Refund Requested. Please Keep The Product Safe.');
                             $("button#ReturnOrder").each(function(){
           var $this = $(this);
            if ($this.val() == orderid){
               $this.remove();
            }
        });


                         }else{

                         }
                     }
                 });
             });

     </script>


     <div class="sidemenu">
        <button class="simple" id="closeSidemenu" style="font-size:40px; margin:10px; width:60px; height:60px; color:#1a1a1a;">&times;</button>
         <ul>
             <?php

                if(isset($_SESSION['USERS_LOGIN'])){
                ?>



             <li><a href="Settings">Settings</a></li>
             <li><a href="CustomerCare">Customer Care</a></li>


             <?php
                } else{
                ?>

             <li><a href="Login">Login</a></li>
             <li><a href="Signup">Sign Up</a></li>


             <?php
               }
                ?>

             <li><a href="Featured">Featured Products</a></li>
             <li><a href="Seller/Seller">Become Seller</a></li>
         </ul>
     </div>
     <div class="subheader">
         <ul>
             <li><a href="https://www.facebook.com/BinokioIndia"><i class="fa fa-facebook"></i></a></li>
             <li><a href="https://instagram.com/binokioindia/"><i class="fa fa-instagram"></i></a></li>
             <li><a href="#"><i class="fa fa-twitter"></i></a></li>

         </ul>
         <a href="#">Customer@Binokio.com</a>
     </div>
     <div class="navbar">






         <div>
             <li><a href="Featured ">Featured </a></li>
         </div>


         <li><a href="#">View Offers</a></li>
         <?php

                if(isset($_SESSION['USERS_LOGIN'])){

                ?>

         <li><a href="CustomerCare ">Customer Care</a></li>

         <li><a href="Settings">Settings</a></li>

         <?php
                }else{
                    ?>
         <li><a href="Login ">Login</a></li>
         <li><a href="Signup">Sign Up</a></li>
         <?php
                }
                    ?>



         <br><br>
     </div>
     <div class="header">
         <div>
             <img src="Img/logo.png" alt="">
             <button class="opennav"><i class="fa fa-bars"></i></button>
         </div>
         <div class="search-container">
             <form action="./Search?Search=http" method="get">
                 <input type="text" name="Search" placeholder="Search..">

             </form>
         </div>
         <div style="padding:5px;">
             <button class="cartbtn" onclick="cart()"><i class="fa fa-shopping-cart"></i></button>
         </div>
     </div>

     <div class="search-container-small">
         <form action="./Search?Search=http" method="get">
             <center><input type="text" name="Search" placeholder="Search.."></center>
         </form>
     </div>


     <!--<div class="foot-menu">
    <div>
        <a href="#"><i class="fa fa-menu"></i>Category</a>
    </div>
</div>-->

     <div class="Userheading">
         <h3>My Orders</h3>
     </div>

     <?php

    if(isset($_SESSION['USERS_LOGIN'])){


     $uniqid = $_SESSION['USERS_LOGIN'];

        include_once("Process/Config.php");
    include_once("Process/Function.php");

        $stmt = $conn->prepare("SELECT * FROM `orders` WHERE Uniqid = ? ORDER BY ID DESC");
        $stmt->execute([$uniqid]);

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
     <a href="" style="text-decoration:none; color:#1a1a1a;">
         <div class="tab Producttabs" style="font-weight:300;">
             <div class="imageholder">

                 <!--THE PRODUCT IMAGE SHOULD BE FETCHED HERE-->
                 <center><img src="Seller/Panel/Products/<?php echo strtolower($res->ProductImage);  ?>" alt=""></center>

             </div>

             <section class="productlabel">
                 <div style="padding:0px;">
                     <!--THE PRODUCT NAME SHOULD BE FETCHED HERE-->
                     <h3><?php echo $res->ProductName; ?></h3>

                     <div style="width:auto; height:auto;   margin-left:15px; padding:5px;" id="tracking">
                         <p style="color:#f7817b;">Price - &nbsp;</p>
                         <p>₹ <?php echo $res->ProductPrice*$result->quantity; ?></p><br><br>
                          <p style="color:#f7817b;">Quantity - &nbsp;</p>
                         <p><?php echo $result->quantity; ?></p>
                         <br>


                         <?php if($result->status == "Recieved" || $result->status == "Shipped"){

                ?>
                    <p style="font-size:13px; color:#0dd746; padding:5px;" class="status" id="<?php echo $result->OrderID; ?>">[<?php echo $result->status; ?>]</p>
                    <p style="font-size:13px; color:#0dd746; padding:5px;" class="status" id="<?php echo $result->OrderID; ?>">&nbsp;PAY ₹<?php echo $res->ProductPrice*$result->quantity; ?> IN CASH.</p>
                    <br><button class="simple dark" style="height:30px;" id="cancelOrder" value="<?php echo $result->OrderID; ?>">Cancel</button>
                    <?php }?>
                    <?php if($result->status == "Delivered"){

                ?>
                   <p style="font-size:13px; color:#ff1100; padding:5px;" class="" id="<?php echo $result->OrderID; ?>"></p>
                    <br><button class="simple dark" style="padding:5px; width:auto;"id="ReturnOrder" value="<?php echo $result->OrderID; ?>">Return & Refund</button>
                    <?php }?>

                     <?php if($result->status == "Canceled"){

                ?>
                    <br><p style="font-size:13px; color:#ff1100; padding:5px;" class="" id="<?php echo $result->OrderID; ?>">[<?php echo $result->status; ?>]</p>
                                        <?php }?>
                     </div>


                     <?php if($result->status == "Refund"){

                ?>
                    <br><p style="font-size:13px; color:#ff1100; padding:5px;" class="" id="<?php echo $result->OrderID; ?>">Product Will Be Picked Up Soon! And Refund Requested. Please Keep The Product Safe.</p>
                                        <?php }?>


                    <?php if($result->status == "Returned"){

                ?>
                    <br><p style="font-size:13px; color:#ff1100; padding:5px;" class="" id="<?php echo $result->OrderID; ?>">Returned To Seller.Refund Will Process Soon.</p>
                                        <?php }?>

                 <?php if($result->status == "Refunded"){

                ?>
                    <br><p style="font-size:13px; color:#16d857; padding:5px;" class="" id="<?php echo $result->OrderID; ?>">Returned & Refunded</p>
                                        <?php }?>

                     <script>
                        /*

                         if($('p[id="#status"]').html() == '[Recieved]'){


                             $('#tracking').append(' <p style="font-size:13px; color:#0dd746; padding:5px;" id="OrderCaption">Your Order has benn recieved </p>');
                             $('#tracking').append('<br><button class="simple dark" style="height:30px;" id="cancelOrder" value="<?php #echo $result->OrderID; ?>">Cancel</button>');

                         }
                         if($('p[id="#status"]').html() == '[Delivered]'){

                               $('#tracking').append('<button class="simple" id="ReturnOrder">Return & Refund</button>');


                         }
                         if($('p[id="#status"]').html() == '[Shipped]'){
                               $('#tracking').append('<button class="simple" id="cancelOrder">Cancel</button>');
                         }
                         if($('p[id="#status"]').html() == 'Canceled'){
                             $(this).css('color' , '#ff1100');
                         }


*/
                         $('body').on('click','#cancelOrder',function(e){
                            e.preventDefault();
                             var orderid = $(this).val();
                             $('.confirmationbox').css('display','block');
                             $('button#confirm').val(orderid);

                         });
                          $('body').on('click','#ReturnOrder',function(e){
                            e.preventDefault();
                             var orderid = $(this).val();
                             $('.refundbox').css('display','block');
                             $('#RefundOrderID').val(orderid);

                         });
                     </script>


                 </div>
             </section>


         </div>
     </a>
     <?php
                        }
            }

        }
    }else{

    }
    ?>


    <style>


.Producttabs{
  display: flex;
  justify-content: space-between;
    border:1px solid #ddd;
    margin:5px;
    margin-bottom:0px !important;
  align-items: center;
overflow: hidden;
  }
  .imageholder{
    width:25%;
      padding:20px;

  }
   .imageholder img{
    width:100%;
  }
  .Producttabs .productlabel{
    width:55%;
    margin:20px auto;
  }
  .Producttabs .productlabel h3{
    color:#383838;
    margin-top:0px;
    margin-left:15px;
    padding:5px;
    font-size: 20px;
  }
  .Producttabs .productlabel p{
    display: inline-block;
    font-size:17px;

  }
        .confirmationbox{
            position: fixed;
            display: none;
            width:100%;
            height:100vh;
            background:rgba(0,0,0,0.5);
        }
        .confirmationbox .box{
            width:40%;
             padding:20px;
            margin:200px auto;
            background: #fff;
        }
        .refundbox{
             position: fixed;
            display: none;
            font-weight:300;
            width:100%;
            height:100vh;
            background:rgba(0,0,0,0.5);
        }
        .refundbox .box{
            width:40%;
             padding:20px;
            margin:20px auto;
            background: #fff;
        }
        @media(max-width: 950px){
              .imageholder{
    width:35%;
      padding:20px;

  }
            h3{
                font-size: 15px !important;
            }
            .confirmationbox {
                bottom:0;
                height:150px;
            }
            .confirmationbox .box{
            width:100%;
             padding:20px;
            margin:0px;
              box-shadow: 5px 5px 25px rgba(0, 0, 0, 0.5);
                bottom:0;
            background: #fff;
        }
             .refundbox {

                height:100vh;
            }
            .refundbox .box{
            width:100%;
                height:100%;
                padding-top:50px !important;
             padding:20px;
            margin:0px;
              box-shadow: 5px 5px 25px rgba(0, 0, 0, 0.5);
                bottom:0;
            background: #fff;
        }
        }

     </style>
<script src="Js/Menu.js"></script>
<script src="Js/Design.js"></script>
 </body>

 </html>
<?php  }else{echo '<script>window.location = "index"</script>';}?>
