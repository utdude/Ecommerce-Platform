 <?php 
 session_start();
 if(isset($_SESSION['USERS_LOGIN'])){
     $uniqid = $_SESSION['USERS_LOGIN'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Buy Product</title>

    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="Style.css">

    <link rel="stylesheet" href="Css/slider.css">

    <link rel="stylesheet" href="Css/supporters.css">

    <link rel="stylesheet" href="Css/ui.css">

    <link rel="stylesheet" href="Css/Modals.css">

    <link rel="stylesheet" href="Css/Media.css">

  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Happy+Monkey|Rajdhani:300" rel="stylesheet">

    <link rel="shortcut icon" href="Img/logo.png" type="image/png">

    <link rel="stylesheet" href="Assets/awesome/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">


    <script src="Js/Jquery.js"></script>


</head>

        <body>
          <div class="sidemenu">
           <button class="simple" id="closeSidemenu" style="font-size:40px; margin:10px; width:60px; height:60px; color:#1a1a1a;">&times;</button>
            <ul>
              <li><a href="Login">Login</a></li>
              <li><a href="CustomerCare">Customer Care</a></li>
              <li><a href="Trending">Trending Products</a></li>
              <li><a href="Seller/Seller">Become Seller</a></li>
            </ul>
          </div>  <div class="subheader">
            <ul>
              <li><a href="https://www.facebook.com/BinokioIndia"><i class="fa fa-facebook"></i></a></li>
             <li><a href="https://instagram.com/binokioindia/"><i class="fa fa-instagram"></i></a></li>
             <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                 
            </ul>
                <a href="#">Customer@Binokio.com</a>
          </div>
          <div class="navbar">



           
        
       
          <div><li><a href="Featured">Featured </a></li></div>
              
              <li><a href="CustomerCare">Customer Care</a></li>
              <li><a href="#">View Offers</a></li>
              <li><a href="Login">Login</a></li>
     
         


<br><br>
          </div>
          <div class="header">
             <div>
                  <img src="Img/logo.png" alt="">
                  <button class="opennav"><i class="fa fa-bars"></i></button>
             </div>
             <div class="search-container">
                 <form action="">
                     <input type="text" placeholder="Search..">
                     
                 </form>
             </div>
             <div style="padding:5px;">
                 <button class="cartbtn" onclick="cart()"><i class="fa fa-shopping-cart"></i></button>
             </div>
          </div>
          
          <div class="search-container-small">
              <form action="">
                 <center><input type="text" placeholder="Search.."></center>
              </form>
          </div>

        <center>
          <div class="Userheading">
         <h3 style="text-align:left;">My Cart</h3>
     </div>

           <div class=" container products-holder">
  <div class="product-container" style="justify-content:space-between; align-items:center;">
  <p><b>Total -</b></p> <div style="width:60%; padding:1px;"> <h4 style="color:#1a1a1a;float:right;"><p>₹</p>
   <?php
     include_once("Process/Config.php");
     $sum = 0;
            $st = $conn->prepare("SELECT * FROM `Cart` WHERE Uniqid = ?");
            $st->execute([$_SESSION['USERS_LOGIN']]);
     while($re = $st->fetch(PDO::FETCH_OBJ)){
        $total =  $sum+$re->Price;
        ?>
       
    <p><?php echo $total; ?></p>
     <?php
     }
     ?>
     <br></h4></div>
    </div><div class="product-container" style="justify-content:center;">
    <center><button class="special" style="margin:0px;  float:none;">Checkout All</button></center>
    </div><br>
<center>
   <h1 style="font-weight:300; font-size:150px; color:#ec5d37;"> <i class="fa fa-smile-o"></i></h1>
   <h3 style="font-weight:300; font-size:25px; color:#ec5d37;">Cart Is Under Development..</h3>
</center>

           <?php
    
            $stmt = $conn->prepare("SELECT * FROM `Cart` WHERE Uniqid = ?");
            $stmt->execute([$_SESSION['USERS_LOGIN']]);
     
     while($result = $stmt->fetch(PDO::FETCH_OBJ)){
         
         $stm = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
         $stm->execute($result->ProductID);
         while($res = $stmt->fetch(PDO::FETCH_OBJ)){
     
     ?>
             
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
                         <p>₹<?php echo $res->ProductPrice; ?></p>
                     </div>
                 </div></section></div></a>
        <?php
     }}
     ?>
<style>
    .Producttabs{
  display: flex;
  justify-content: space-between;
  align-items: center;
overflow: hidden;
  }
  .imageholder{
    width:20%;
    
  }
   .imageholder img{
    width:50%;
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
               </style>



           </div>
            </center>        

        <script src="Js/Menu.js"></script>
          </body>
          </html>
<?php
         
 }else{
?>
<script>window.location = "Login";</script>
<?php     
 }
     ?>