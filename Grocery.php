<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Category</title>

    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Css/slider.css">

    <link rel="stylesheet" href="Css/supporters.css">

    <link rel="stylesheet" href="Css/ui.css">

    <link rel="stylesheet" href="Css/Modals.css">

    <link rel="stylesheet" href="Css/Media.css">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

    <link rel="shortcut icon" href="Img/logo.png" type="image/png">

    <link rel="stylesheet" href="Assets/awesome/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">


    <script src="Js/Jquery.js"></script>


</head>

<body>
    <div class="sidemenu">
       <button class="simple" id="closeSidemenu" style="font-size:40px; margin:10px; width:60px; height:60px; color:#1a1a1a;">&times;</button>
        <ul>
            <li><a href="#">Login</a></li>
            <li><a href="#">Customer Care</a></li>
            <li><a href="#">Trending Products</a></li>
            <li><a href="#">Become Seller</a></li>
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
            <li><a href="Featured">Featured </a></li>
        </div>

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

 
      <img src="Img/GroceryTopSM.jpg" style="width:100%;" >
     
    

        <!-- Next and previous buttons 
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>-->
    


    <!-- PRODUCTS ARE FETCHING HERE -->


    <div class="ProductHolder" style="flex-wrap:wrap;">


      <?php
            
            
            include_once('Seller/Process/Config.php');
            
            include_once('Seller/Process/Function.php');
            
           
            
            
                
            
        
            $stmt = $conn->prepare("SELECT * FROM `products` WHERE ProductCategory = ? AND ProductNo > 0");
            $stmt->execute(['Grocery']);
            
        if($stmt->rowCount() == 0){
            echo "<p style='padding:20px;text-align:center;'>No Products Found!</p>";
        }else{
            while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                
            
            $taxpre = $conn->prepare("SELECT * FROM `tax`");
                                   $taxpre->execute();
                                  $taxes = $taxpre->fetch(PDO::FETCH_OBJ);
                                $tax = $taxes->Tax;
                                  
                                  $percentgain = ceil((2*$res->ProductPrice)/100);
        
        ?>

        <div class="productCard">
            <a href="Product?ID=<?php echo $res->ProductID; ?>" class="productLink" style="width:20%;">
                <center>
                    <div class="imageholder">
                        <img src="Seller/Panel/Products/<?php echo strtolower($res->ProductImage); ?>" alt="">
                    </div>

                    <div class="contentholder">
                        <p><sup style="font-size:13px;">&#8377;</sup>&nbsp;<?php echo $res->ProductPrice+$tax+$percentgain; ?></p>
                        <h3><?php echo $res->ProductName; ?></h3>


                    </div>
                </center>
            </a>
            <center>

                <!-- <button id="cardcartbtn" class="cardbtn cart" value="<?php #echo $res->ProductID; ?>"><i class="fa fa-heart"></i></button> -->
            </center>
        </div>
<?php 
            }}
            ?>

       
    </div>

   
        

    <section class="sub-footer">

        <div>
            <h2>Knows Us</h2>
            <ul>
                <li><a href="About/About">About Us</a></li>
                <li><a href="About/Founder">About Founder</a></li>
                <li><a href="About/Aim">Our Aim</a></li>
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
                <li><a href="Seller/Seller">Become A Seller</a></li>
                <!--<li><a href="#">Advertise Your Product</a></li>
                  <li><a href="#">Advertise yourself</a></li>-->

            </ul>
        </div>
        <div style="display: flex; flex-wrap: wrap; padding-bottom:5px;">

            <input type="text" id="newsletter" placeholder="Email Address" style="margin:0px; height:40px;border-radius:0; border:1px solid #fff;" class="forminput" required>
            <button class="simple" style="margin:0px; width:50px;"><i class="fa fa-paper-plane"></i></button>
            <h3 style="padding-top:20px; color:#fff; font-weight: 300;">Provide Email For News Letter.</h3><br>

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
    <script src="Js/Design.js"></script>
    <script src="Js/Cart.js"></script>
    <script src="Js/ImageLoad.js"></script>
</body>

</html>
