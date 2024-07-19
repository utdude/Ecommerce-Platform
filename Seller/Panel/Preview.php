<?php
session_start();
if(!isset($_SESSION['SELLER_LOGIN'])){

    echo '<script>window.location = "../Seller";</script>';
}
else{
    include_once("Process/Config.php");
    include_once("Process/Function.php");
if(isset($_GET['ID'])){
?>

<?php
                     
$ID = E($_GET['ID']);
                     
$stmt = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
$stmt->execute([
    $ID
]);    
                     
if($stmt->rowCount() == 1){
    
    
    $result = $stmt->fetch(PDO::FETCH_OBJ);
                     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Product Preview</title>

    <link rel="stylesheet" href="../../Css/Style.css">
    <link rel="stylesheet" href="../../Style.css">

    <link rel="stylesheet" href="../../Css/slider.css">

    <link rel="stylesheet" href="../../Css/supporters.css">

    <link rel="stylesheet" href="../../Css/ui.css">

    <link rel="stylesheet" href="../../Css/Modals.css">

    <link rel="stylesheet" href="../../Css/Media.css">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Happy+Monkey|Rajdhani:300" rel="stylesheet">

    <link rel="shortcut icon" href="../../Img/logo.png" type="image/png">



    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">

    <link rel="stylesheet" href="../../Assets/awesome/css/font-awesome.min.css">

    <script src="../../Js/Jquery.js"></script>


</head>

<body>
   <div class="previewbatch">
       <center><h1>Preview</h1></center>
   </div>
   <style>
    
       .previewbatch{
    width:100px;
    padding:10px;
    background:#ec5d37;
    z-index: 10000;
           position: fixed;
}
.previewbatch h1{
    color:#fff;
    font-size:17px;
}
    
    </style>
    <!--

         MODALS ARE HERE

         -->

    <div class="login-overlay overlay">

        <div class="login-modal modal">
            <div class="modal-header">
                <h2>Welcome Back Login..</h2>
                <button class="special small" id="closeloginmodal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-content">
                <form action="">
                    <center>
                        <input type="text" class="modal-input" id="Email" placeholder="Email ID" required>
                        <input type="password" class="modal-input" id="Password" placeholder="Password" required>
                    </center>

                </form>
            </div>
            <div class="modal-footer">
                <center>
                    <button class="special">Login</button><br>
                    <a href="Signup">New To Binokio? <p>Sign Up Now!</p></a>
                </center>
            </div>
        </div>

    </div>
    <div class="sidemenu">
        <ul>
            <li><a href="#">Login</a></li>
            <li><a href="#">Customer Care</a></li>
            <li><a href="#">Trending Products</a></li>
            <li><a href="#">Become Seller</a></li>
        </ul>
    </div>
    <div class="subheader">
        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
            <form action="">
                <input type="text" placeholder="Search..">

            </form>
        </div>
        <div style="padding:5px;">
            <button class="cartbtn"><i class="fa fa-shopping-cart"></i></button>
        </div>
    </div>

    <div class="search-container-small">
        <form action="">
            <center><input type="text" placeholder="Search.."></center>
        </form>
    </div>

    <div class="container">
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <center>
                   
                   <?php $img = strtolower($result->ProductImage);  ?>
                    <img src="Products/<?php echo $img; ?>" style="width:100%">
                    
                </center>
            </div>
            <!--
  <div class="mySlides fade">
    <center>
    <img src="https://assets.pcmag.com/media/images/519395-iphone-xs-max.jpg?width=810&height=456" style="width:100%">
    </center>
  </div>

  <div class="mySlides fade">
    <center>
    <img src="https://img.purch.com/xs-max/w/755/aHR0cDovL21lZGlhLmJlc3RvZm1pY3JvLmNvbS8xL00vODAwOTg2L29yaWdpbmFsL2Ryb3AtdGVzdC1pcGhvbmUteHMteHNtYXgtMDU0LmpwZw==" style="width:100%">
    </center>
  </div>-->

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <!-- <div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div> -->
    </div>

    <center>
        <div class="product-title-bar">

            <h2><?php echo $result->ProductName; ?></h2>

            <h3 class="tags">In <?php echo $result->ProductCategory; ?></h3>

            <div class="price-pane">
                <p>- Price -</p>
                <!-- <h2><strike>&#x20B9;440</strike><p></h2> -->
                <h2>&#x20B9;<?php echo $result->ProductPrice; ?><p>
                </h2>

                <p class="stock-alert">Hurry! Only <?php echo $result->ProductNo; ?> left in Stocks.</p>
            </div>
        </div>
        <div class="product-btn-bar">
            <center>
                <button class="special">Buy Now</button>
                <button class="simple add-bag"><i class="fa fa-shopping-bag"></i></button>
            </center>
        </div>
    </center>

    <section class="product-details">
        <div class="heading">
            <h1>Description</h1>
        </div>
        <div class="content">
            <p><?php echo $result->Discription; ?></p>
        </div>
        <br>
        <div class="heading">
            <h1>Warrenty Details</h1>
        </div>
        <div class="content">
            <p><?php echo $result->ProductWarrenty; ?></p>
        </div>
    </section>


    <section class="container product-review">
        <div class="heading">
            <h1>Reviews</h1>
        </div>


        <!-- <div class="content">

      <center>

        <div class="review">
          <img src="https://img.icons8.com/color/1600/circled-user-male-skin-type-1-2.png" class="userimage" alt="">
          <div class="triangle-left">
          </div>
          <div class="review-container">
            <h4>Utkarsh Rai - </h4>
            <p>Bekar Book Hea Dimag Kharab Karti Hea Bus</p>
          </div>
        </div>
        <div class="review">
          <img src="https://img.icons8.com/color/1600/circled-user-male-skin-type-1-2.png" class="userimage" alt="">
          <div class="triangle-left">
          </div>
          <div class="review-container">
            <h4>kunal singh - </h4>
            <p>Tatti Book Hea</p>
          </div>
        </div>
<br>
      </center>


    </div> -->


    </section>

    <section class="sub-footer">
        <center>
            <div>
                <h2>Knows Us</h2>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">About Founder</a></li>
                    <li><a href="#">Our Aim</a></li>
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
                    <li><a href="#">Become A Seller</a></li>
                    <li><a href="#">Advertise Your Product</a></li>
                    <li><a href="#">Advertise yourself</a></li>

                </ul>
            </div>
        </center>


    </section>

    <section class="footer">
        <center>
            <h5>&copy; Binokio.com 2019</h5>
        </center>
    </section>
    <script src="../../Js/slider.js"></script>
    <script src="../../Js/Supporter.js"></script>
    <script src="../../Js/Modal.js"></script>
    <script src="../../Js/Menu.js"></script>
</body>

</html>
<?php }else{
    
} ?>
<?php }else{} }?>
