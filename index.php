<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Binokio - Delivery Within 5 Hours |Cloths|Groceries|Electronics|Toys|Many More..</title>
    <meta name="description" content="Order On Binokio And Get Your Delivery Within 5 Hours Anywhere In VARANASI. Order Cloths,Food,Groceries,Electronics,Kids Clothing Toys And Many More..">
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

            <li><a href="Featured">Featured Products</a></li>

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


    <div class="container container-headimgs" style="background:#f4614e;  height:510px; display:flex; align-items:center; justify-content:center;">
      <img src="Img/section2.jpg" style="width:80%; border-radius:20px;" >
     
    
        <style>
        
            @media (max-width: 920px) {
             
                .container-headimgs{
                    
                    height:auto !important;
                   padding-top:20px;      
                    padding-bottom:20px;
                    
                    
                }
                .container-headimgs img{
                    
                    width:90% !important;
                    border-radius:5px !important;
                    
                }
                
            }
        
        </style>

        <!-- Next and previous buttons 
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>-->
    </div>
    <br>


    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }

        function cart() {
            window.location = "Cart ";
        }

    </script>

    <div class="container" style="overflow: hidden;">
        <h3 class="container-label" style="">Shop By Category</h3><br>

        <div class="card-container">

            <a href="Category?Category=Cloth">
                <div class="card">
                    <center><img src="https://cdn.pixabay.com/photo/2016/12/06/09/30/blank-1886001_960_720.png" alt=""></center> <br>
                    <center>
                        <h4>Cloths</h4>
                    </center>
                </div>
            </a>
            <a href="Category?Category=Kids">
                <div class="card">
                    <center><img src="https://5.imimg.com/data5/UI/DJ/MY-45822456/teddy-bear-500x500.jpg" alt=""></center> <br>
                    <center>
                        <h4>Kids</h4>
                    </center>
                </div>
            </a>
            <a href="Category?Category=Grocery">
                <div class="card">
                    <center><img src="https://5.imimg.com/data5/WQ/EU/MY-5742893/ashirwad-atta-500x500.jpg" alt=""></center> <br>
                    <center>
                        <h4>Food</h4>
                    </center>
                </div>
            </a>
            <a href="Category?Category=Other">
                <div class="card">
                    <center><img src="Img/test.jpg" alt=""></center> <br>
                    <center>
                        <h4>Other</h4>
                    </center>
                </div>
            </a>
        </div>

    </div>
    <br> <br>
    <div class="container" style="overflow: hidden;">
        <h3 class="container-label" style="">Fetured Products</h3><br>

        <!--  <div class="card-container-special">
          <a href="#"><div class="card"><br>
         <img src="https://www.pngarts.com/files/4/Electronic-PNG-High-Quality-Image.png"  class="offercardimg" alt="">
            <center>  <div> <p>Featured Electronics</p></div></center>
          </div></a>
           <a href=""><div class="card"><br>
            <img src="https://www.pngkey.com/png/full/252-2521545_executive-oxford-imported-shirts-branded-shirt-png.png" alt=""> <br>
            <center>  <div> <p>Featured Clothings</p></div></center>
          </div></a>
           <a href=""><div class="card"> <br>
          <img src="http://pngimg.com/uploads/children/children_PNG18017.png" alt="">  <br>
          <center>  <div> <p>Featured Kids Products</p></div></center>
          </div></a>
          <a href=""><div class="card">
            <br>
           <img src="http://lakheni.co.za/wp-content/uploads/2016/02/Lakheni-Hamper-example.png" alt=""> <br>
           <center>  <div> <p>Featured Groceries</p></div></center>
          </div></a>
      </div>-->
        <div class="ProductHolder">
            <?php
        
          include_once("Process/Config.php");
          
        $s = $conn->prepare("SELECT * FROM `featured` LIMIT 4");
        $s->execute();
        
            if($s->rowCount() >= 6){
                
            
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
            
            

            <?php
            
        }}
        ?>
            <button class="special" onclick="featured()">View More..</button>
            <script>
            
                function featured(){
                    
                    window.location = "Featured";
                    
                }
            
            </script>
        <?php
        }else{
                
                while($fetch = $s->fetch(PDO::FETCH_OBJ)){
            
            $ss = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
            $ss->execute([$fetch->ProductID]);
            
            while($fetchit = $ss->fetch(PDO::FETCH_OBJ)){
                
            
            
    ?>
            <div class="productCard">
                <a href="Product?ID=<?php echo $fetchit->ProductID; ?>" class="productLink" style="width:20%;">
                    <center>
                        <div class="imageholder">
                            <img src="Seller/Panel/Products/<?php echo strtolower($fetchit->ProductImage); ?>" alt="">
                        </div>

                        <div class="contentholder">
                            <p><sup style="font-size:13px;">&#8377;</sup>&nbsp;<?php echo $fetchit->ProductPrice; ?></p>
                            <h3><?php echo $fetchit->ProductName; ?></h3>


                        </div>
                    </center>
                </a>
                <center>

                    <!-- <button id="cardcartbtn" class="cardbtn cart" value="<?php #echo $res->ProductID; ?>"><i class="fa fa-heart"></i></button> -->
                </center>
            </div>
            
            

            <?php
            
        }}
                
            }
        ?>
        </div>

        
        <style>
            .card-container-special img {
                width: 98%;
                border-radius: 5px;
            }
            
            @media(max-width:900px){
    .productCard{
        width:48% !important;
        margin:2px !important;
        border:none !important;
    }
    .productCard h3{
        width:98% !important;
    }
    
    .ProductHolder{
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        flex-wrap: wrap !important;
    }
}

        </style>
        <div class="card-container-special">
            <a href="Category?Category=Cloth"><img src="Img/clothing.png" alt=""></a>
            <a href="Category?Category=Other"><img src="Img/electronics.png" alt=""></a>
            <a href="Category?Category=kids"><img src="Img/kids.png" alt=""></a>
            <a href="Category?Category=Grocery"><img src="Img/grocery.png" alt=""></a>

        </div>

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
