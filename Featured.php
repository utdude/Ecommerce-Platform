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

 <div class="sidemenu">
           <button class="simple" id="closeSidemenu" style="font-size:40px; margin:10px; width:60px; height:60px; color:#1a1a1a;">&times;</button>
            <ul>
               <?php 
                session_start();
                if(isset($_SESSION['USERS_LOGIN'])){
                ?>


            <li><a href="MyOrders">My Orders</a></li>
            <li><a href="Settings">Settings</a></li>
            <li><a href="CustomerCare">Customer Care</a></li>


            <?php    
                } else{
                ?>

            <li><a href="Login">Login</a></li>
            <li><a href="Signup">Sign Up</a></li>
            <li><a href="Seller/Seller">Become Seller</a></li>

            <?php
               }
                ?>
            </ul>
          </div>  <div class="subheader">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                 
            </ul>
                <a href="#">Customer@Binokio.com</a>
          </div>
          <div class="navbar">



           
        
       
             
            
       <?php 
                
                if(isset($_SESSION['USERS_LOGIN'])){
                ?>

        <li><a href="CustomerCare ">Customer Care</a></li>
        <li><a href="MyOrders">My Orders</a></li>
        <li><a href="Settings">Settings</a></li>

        <?php
                }else{
                    ?>
        <li><a href="Login ">Login</a></li>
        <li><a href="Signup">Sign Up</a></li>
        <?php
                }
                    ?>
        <li><a href="CustomerCare">Customer Care</a></li>

        

     
         


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

          <h2 class="container-label" style="">Featured Products</h2><br>
          <style>.container-label{color:#383838;
    padding:20px;
    background: #b3315f; background: -moz-linear-gradient(to right,  #b3315f 0%,#ffaa85 100%); background: -webkit-linear-gradient(to right,  #b3315f 0%,#ffaa85 100%); background: linear-gradient(to right,  #b3315f 0%,#ffaa85 100%);
    font-weight: 100;
    width:20%;
    color:#fff;
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    font-size:20px; margin-top:20px;}</style>





      <!--
        Small Cards For Category are Here...
    -->

        <div class="ProductHolder">
  <?php
        
          include_once("Process/Config.php");
          
        $s = $conn->prepare("SELECT * FROM `featured`");
        $s->execute();
        
           
                
            
        while($fetch = $s->fetch(PDO::FETCH_OBJ)){
            
            $ss = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
            $ss->execute([$fetch->ProductID]);
            
            while($fetchit = $ss->fetch(PDO::FETCH_OBJ)){
                
             $taxpre = $conn->prepare("SELECT * FROM `tax`");
                                   $taxpre->execute();
                                  $taxes = $taxpre->fetch(PDO::FETCH_OBJ);
                                $tax = $taxes->Tax;
                                  
                                  $percentgain = ceil((2*$fetchit->ProductPrice)/100);
            
    ?>
            <div class="productCard">
                <a href="Product?ID=<?php echo $fetchit->ProductID; ?>" class="productLink" style="width:20%;">
                    <center>
                        <div class="imageholder">
                            <img src="Seller/Panel/Products/<?php echo strtolower($fetchit->ProductImage); ?>" alt="">
                        </div>

                        <div class="contentholder">
                            <p><sup style="font-size:13px;">&#8377;</sup>&nbsp;<?php echo $fetchit->ProductPrice+$tax+$percentgain; ?></p>
                            <h3><?php echo $fetchit->ProductName; ?></h3>


                        </div>
                    </center>
                </a>
                <center>

                    <!-- <button id="cardcartbtn" class="cardbtn cart" value="<?php #echo $res->ProductID; ?>"><i class="fa fa-heart"></i></button> -->
                </center>
            </div>
            
            
<?php  }}?>
           


        <!--  <a href="Product">
            <div class="smallcatcard">

                <img align="left" src="Img/test.jpg" alt="">

              <h4>R.S Agrawal Maths Class 10</h4>
              <h5>Price -</h5><br><strike id="fake-price">&#x20B9;440</strike><p id="actual-price">&#x20B9;390</p>
            </div>
          </a>

          <a href="#">
            <div class="smallcatcard">

                <img align="left" src="https://cdn.vox-cdn.com/thumbor/bHxKs8l5CPZwSQ6DfjuemE_cQ_U=/0x0:2013x1558/1200x800/filters:focal(846x618:1168x940)/cdn.vox-cdn.com/uploads/chorus_image/image/56535997/conceptiphone.0.jpg" alt="">

              <h4>IPHONE X 6gb , 250 gb , Full Display , 20x20 Dual Camera</h4>
              <h5>Price -</h5><br><strike id="fake-price">&#x20B9;1,00,000</strike><p id="actual-price">&#x20B9;90,000</p>
            </div>
          </a>
-->



        </div>

  
     <section class="sub-footer">

        <div>
            <h2>Knows Us</h2>
            <ul>
                <li><a href="About/About ">About Us</a></li>
                <li><a href="About/Founder ">About Founder</a></li>
                <li><a href="About/Aim ">Our Aim</a></li>
            </ul>
        </div>
        <div>
            <h2>Connect With Us</h2>
            <ul>
                <li><a href="#"><i class="fa fa-instagram"></i> &nbsp;&nbsp;Instagram</a></li>
                <li><a href="#"><i class="fa fa-facebook"></i>&nbsp;&nbsp; Facebook</a></li>
                <li><a href="#"><i class="fa fa-twitter"></i> &nbsp;&nbsp;Twitter</a></li>
            </ul>
        </div>
        <div>
            <h2>Make Money</h2>
            <ul>
                <li><a href="Seller/Seller ">Become A Seller</a></li>
                <!--<li><a href="#">Advertise Your Product</a></li>
                  <li><a href="#">Advertise yourself</a></li>-->

            </ul>
        </div>
        <div style="display: flex; flex-wrap: wrap; padding-bottom:5px;">

           <form action="" id="newsletterform">
            <input type="text" id="newsletter" placeholder="Email Address" style="margin:0px; height:40px; border-radius:0px; border:1px solid #fff;" class="forminput" required>
            <button class="simple" style="margin:0px; width:50px;" type="submit"><i class="fa fa-paper-plane"></i></button>
           
            <h3 style="padding-top:20px; color:#fff; font-weight: 300;">Provide Email For News Letter.</h3><br>
             </form>

            <!--
<br><br>

            <div style="display: flex; padding-top:10px; padding-bottom:0px; padding-left:0px;">
              


              <div style="width:50px; height:50px; padding:0px;"><a href="#" style="width:100%; height:100%; display: block; line-height:50px; color:#fff; background: #ec4d37;"><i class="fa fa-facebook"></i></a></div>
             <div style="width:50px; height:50px; padding:0px;"><a href="#" style="width:100%; height:100%; display: block; line-height:50px; color:#fff; background: #ec4d37;"><i class="fa fa-instagram"></i></a></div>
              <div style="width:50px; height:50px; padding:0px;"><a href="#" style="width:100%; height:100%; display: block; line-height:50px; color:#fff; background: #ec4d37;"><i class="fa fa-twitter"></i></a></div>

            </div>
            

          </div>   

-->
        </div>

    </section>

    <section class="footer">
        <center>
            <h5>&copy; Binokio.com 2019</h5>
        </center>
    </section>
    <script src="Js/Menu.js"></script>
</body>

</html>
<!---->
