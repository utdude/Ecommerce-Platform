<?php 
if(isset($_SESSION['USERS_LOGIN'])){
    define(session, $_SESSION['USERS_LOGIN']);
?>
<div class="login-overlay overlay" style="">
    <input type="hidden" name="" id="UNIQID" value="<?php echo $_SESSION['USERS_LOGIN']; ?>">
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
<?php
    
    
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Product</title>

    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="Style.css">

    <link rel="stylesheet" href="Css/slider.css">

    <link rel="stylesheet" href="Css/supporters.css">

    <link rel="stylesheet" href="Css/ui.css">

    <link rel="stylesheet" href="Css/Modals.css">

    <link rel="stylesheet" href="Css/Media.css">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Happy+Monkey|Rajdhani:300" rel="stylesheet">

    <link rel="shortcut icon" href="Img/logo.png" type="image/png">



    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">

    <link rel="stylesheet" href="Assets/awesome/css/font-awesome.min.css">

    <script src="Js/Jquery.js"></script>


</head>

<body>
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

    <div class="container" style="display:flex; flex-wrap:wrap;">

        <div class="slideshow-container">


            <?php
                      
                      if(empty($_GET['ID'])){
                          
                          
                          ?>

            <script>
                window.location = "index";

            </script>

            <?php
                          
                          
                          
                          
                      }else{
                        
                          
                          include_once('Seller/Process/Config.php');
                          include_once('Seller/Process/Function.php');
                          
                          $id = E($_GET['ID']);
                          
                          $stmt = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ? AND ProductNo > 0");
                          $stmt->execute([$id]);
                          
                          if($stmt->rowCount() == 0){
                              echo '<p style="padding:20px;text-align:center;">SORRY REQUESTED PRODUCT WAS NOT FOUND!</p>';
                          }else{
                               
                   

                              
                              while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                        
                                  
                                  ?>









            <!-- Full-width images with number and caption text -->

            <div class="mySlides fade"><br>
                <center>
                    <img src="Seller/Panel/Products/<?php echo strtolower($res->ProductImage);  ?>" style="width:50%">
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
            <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>-->

            <br>

            <!-- The dots/circles -->
            <!-- <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div> -->
        </div>


        <div style="width:100%;">
            <div class="product-title-bar" style="padding-left:50px; background:rgba(255, 191, 183 , 0.2);">

                <h2><?php echo $res->ProductName;  ?></h2>

                <h3 class="tags">In <?php echo $res->ProductCategory;  ?></h3>
                
                <?php
                
                                  if($res->ProductCategory == "Other"){
                                      $msg = "(Non Returnable But Replaceble Product)";
                                  }elseif($res->ProductCategory == "Grocery"){
                                      $msg = "(Non Returnable Product)";
                                  }else{
                                      $msg = "";
                                  }
                                  
                ?>
                
                <p style="color:#1a1a1a; font-weight:600; font-size:15px;"><? echo $msg; ?></p>

                <div class="price-pane">
                    <p>- Price -</p>
                    <?php
                     $taxpre = $conn->prepare("SELECT * FROM `tax`");
                                   $taxpre->execute();
                                  $taxes = $taxpre->fetch(PDO::FETCH_OBJ);
                                  
                                  $percentgain = ceil((2*$res->ProductPrice)/100);
                                 $productnumber = $res->ProductNo;
                    ?>

                    <h2 style="padding-top:15px;"><sup style="font-size:15px; padding-right:5px;">&#x20B9;</sup><?php echo $res->ProductPrice+$taxes->Tax+$percentgain;  $price = $res->ProductPrice;?> &nbsp;&nbsp;<p style="font-size:15px; display:inline;">(Inclusive Of All Taxes)</p><p>
                    </h2>

                    <p class="stock-alert"> <?php
                                  
                                  
                                  
                                  if($res->ProductNo < 10)
                                  {
                                      echo 'Hurry! Only '.$productnumber.' left in Stocks.';
                                  } 
                        ?>
                    </p>

                    <label for="">Quantity -</label> <input type="number" class="forminput" value="1" style="width:100px;" name="" id="quantity">
                </div>
            </div>
            <br>
            <div class="product-btn-bar">
                <center>
                    <button class="special" onclick="BUY()">Buy Now</button>
                    <!--  <button class="simple add-bag" id="AddToBag"><i class="fa fa-shopping-bag"></i></button> -->
                </center>

                <script>
                    $(document).ready(function() {


                        $('#AddToBag').click(function(e) {

                            e.preventDefault();


                            var productid = "<?php echo $id; ?>";
                            var uniqid = $("#UNIQID").val();
                            var Quantity = $('#quantity').val();
                            var price = "<?php echo $price;  ?>";

                            $.ajax({
                                url: "Process/Cart.php",
                                type: "POST",
                                data: {
                                    productid: productid,
                                    uniqid: uniqid,
                                    quantity: quantity,
                                    price: price
                                },
                                cache: false,
                                success: function(data) {
                                    if (jQuery.trim(data) == "") {
                                        $('.overlaysuccess').css('display', 'block');
                                        setTimeout(function() {
                                            $('.overlaysuccess').css('display', 'none');
                                        }, 5000);

                                    } else {

                                    }
                                }
                            });

                        });
                    });

                    function BUY() {

                        var quantity = $('#quantity').val();
                        //  if(LOGGED_IN == 1){

                        window.location = "Buy?ID=<?php echo $res->ProductID; ?>&q=" + quantity + "";

                        //   }else{

                        //  $('.product-btn-bar').append("<div style=''><p>Please LOgin Or Regiter To Binokio Before Clicking To ' BUY ' .</p></div>");

                        // }

                    }

                </script>
                <script>
                </script>

            </div>
        </div>

    </div>
    <section class="product-details">
        <div class="heading">
            <h1>Description</h1>
        </div>
        <div class="content">
            <p><?php echo $res->Discription; ?></p>
        </div>
        <br>
        <div class="heading">
            <h1>Warrenty Details</h1>
        </div>
        <div class="content">
            <p><?php echo $res->ProductWarrenty; ?></p>
        </div>
    </section>


    <section class="container product-review">
        <div class="heading">
            <h1>Reviews</h1>
        </div>
        <div class="content">
            <!-- 
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
            </center> -->

            <?php
                              }
                              
                              
                          }
                                                  
                      }
                      
                      
                      ?>
        </div>
    </section>

    <script src="Js/slider.js"></script>
    <script src="Js/Supporter.js"></script>
    <script src="Js/Modal.js"></script>
    <script src="Js/Menu.js"></script>
</body>

</html>
