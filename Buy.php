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

 <body> <div class="login-overlay overlay">

        <div class="login-modal modal" style="width:100%;">
            <div class="modal-header"><br><br>
              <center> <img src="Img/logo.png" style="height:100px;" alt=""></center> 
                
             
            </div>
             <form action="" id="LoginForm">
            <div class="modal-content">
               
                    <center>
                        <input type="text" class="forminput" style="padding:25px;" id="Email" placeholder="Username Or Email" required>
                        <input type="password" class="forminput" style="padding:25px;" id="Password" placeholder="Password" required>
                    </center>
                 </div>
            <div class="modal-footer">
                <center>
                    <button class="special" type="submit">Login</button><br>
                     <div id="errorbox">
               <center><b><p></p></b></center>
             </div><br><br>
                    
                   
                    <a href="Signup.html">New To Hypsterland? <p>Sign Up Now!</p></a>
                </center>
            </div>
            </form>
        </div>
            <script>
     
                 $(document).ready(function() {
          $('#LoginForm').submit(function(e) {
              
                e.preventDefault();
    var username = $('#Email').val();
              var password = $('#Password').val();
              
              if(jQuery.trim(username) != "" && jQuery.trim(password) != ""){
                  
                  
                   $.ajax({
                 
                  url: "Process/Login.php",
                  type:"POST",
                  data:{username:username,password:password},
                  cache:false,
                  beforeSend:function(){
                      $('.overlay-loader').css('display' , 'flex');
                  },
                  success:function(data){
                      if(jQuery.trim(data) == ""){
                          
                          window.location = "";
                          
                      }else{
                          $('.overlay-loader').css('display' , 'none');
                          $('#errorbox p').html(data);
                      }
                  }
                  
              });
                 
                 }else{
                 $('#errorbox p').html("All Fields Are Required!");
                 }
             
              
              
          });});
     
     </script>
     </div></body></html>
  <?php 
 session_start();
 if(isset($_SESSION['USERS_LOGIN'])){
     $uniqid = $_SESSION['USERS_LOGIN'];
     if(isset($_GET['ID']) && isset($_GET['q'])){
         
         include_once("Process/Config.php");
         include_once("Process/Function.php");
         
         $id = E($_GET['ID']);
         $quantity = E($_GET['q']);
         
         $stmt = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ?");
         $stmt->execute([$id]);
         
         if($stmt->rowCount() == 1){
             
             
     
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

<input type="hidden" id="id" value="<?php echo $id; ?>">
    <input type="hidden" id="quantity" value="<?php echo $quantity; ?>">
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
 <?php
     
             $tax = $conn->prepare("SELECT * FROM `tax`");
             $tax->execute();
             
             $taxes = $tax->fetch(PDO::FETCH_OBJ);
             
             $taxx = $taxes->Tax;
             
            
             
     ?>
     <?php
     
             while($res = $stmt->fetch(PDO::FETCH_OBJ)){
                  $percentgain = ceil((2*$res->ProductPrice)/100);
    ?>


     <div class="product-titlebar">
         <h1><?php echo $res->ProductName; ?></h1>
     </div>
     <div class="productBuyDetails container">
         <section style="display:flex; justify-content:center; align-items:center;">
             <img src="Seller/Panel/Products/<?php echo $res->ProductImage; ?>" alt="" style="">
         </section>

         <section class="d-1">
            
                
                 <h3>Quantity -</h3>
                 <p> <?php echo $quantity; ?></p><br>
           
             <h3>Price -</h3>
             <p id="currency-sign">&#x20B9;&nbsp;</p>
             <p id="productprice"><?php echo $res->ProductPrice*$quantity+$taxx+$percentgain; ?></p><br>
             <!-- <h3>colour -</h3>&nbsp;&nbsp;&nbsp;<p>null</p><br> -->
             <!-- <h3>Overall Tax -</h3>
             <p id="currency-sign">&#x20B9;&nbsp;</p>
             <p id="overalltax">30</p><br> -->
             <div class="pricetag">
                 <h3>Payble Amount -</h3>
                 <p id="currency-sign">&#x20B9;&nbsp;</p>
                 <p id="paybleamt"></p>
             </div>
             
         </section>
     </div>



     <?php
             }
     
     ?>
     
    

     <script>
         $(document).ready(function() {

             var productprice = $('#productprice').html();
             
             $('#paybleamt').html(productprice);


         });

     </script>

     <div class="Confirmation container">
         <center>
             <h3>Order Payment And Confirmation</h3>
         </center><br>
         <form action="" >
             <center>
                <?php
                 
                if($res->ProductCategory == "Other"){
                    ?>
                    
                 <label for="">Pay Online (Not Working Yet)</label>
                 <input type="radio" name="paymrntopt" value="1" disabled>
                    <?php
                }else{
            ?>
             <label for="">Pay On Delivery</label>
                 <input type="radio" name="paymrntopt" value="0" checked><br><br>
                 
                 <?php } ?>
                
               
             </center>
         </form>
         <br>
         <center>
             <form action="" id="orderForm" type="post">
                 <br>
                 <?php 
             
                        $stm = $conn->prepare("SELECT * FROM `user-details` WHERE Uniqid = ?");
                        $stm->execute([$uniqid]);
                        $res = $stm->fetch(PDO::FETCH_OBJ);
             if($stm->rowCount() == 1 && $res->Address != ""){
                 
        ?>
<input type="hidden" value="1" id="AddressAv">
                 <section class="address" id="AddressBlock">
                     <input type="checkbox" name="address" id="addressinput"><label id="fulladdress"><?php echo $res->Address; ?></label>
                     <br><br><label id="landmark"><?php echo $res->LandMark; ?></label>
                     <br><br><label id="pincode"><?php echo $res->Pincode; ?></label>
                     <br><br><label id="phonenumber"><?php echo $res->Phone; ?></label>
                 </section>
                 <br><br>
                 <center>
                     <p>Or Add A New Address</p>
                 </center>

                 <?php       
                 
             }else{
                 
             }
                        
                  ?>

                 <br>
                 <div class="forminputs">
                 <input type="text" id="Iaddress" class="forminput-simple" placeholder="Full Address.."><br>
                 <input type="text" id="Ilandmark" class="forminput-simple" placeholder="Land Mark (Eg.Near Supreme Tutorials)"><br>
                 <input type="text" id="Iphonenumber" class="forminput-simple" placeholder="Phone Number"><br>
                 <input type="text" id="Ipincode" class="forminput-simple" placeholder="Area Pincode (Eg.221106).."><br>
                 <button type="submit" class="special">Place Order</button>
</div>
                 <br><br>
                 <div id="errorbox"><b>
                         <p style="color:#ff1100;"></p>
                     </b></div><br><br>
             </form>
         </center>

         <script>
             $(document).ready(function() {

                 $('input[type="radio"]').click(function() {
                     var value = $('input[name="paymrntopt"]:checked').val();
                     if (value == "1") {
                         $('.overlaypayment').css('display', 'block');
                     } else if (value == "0") {
                         $('.overlaypayment').css('display', 'none');
                     }
                 });


                 $('#orderForm').submit(function(e) {
                        var id = $('#id').val();
                     var quantity = $('#quantity').val();
                     e.preventDefault();

                     var addressblock = document.getElementById("Addressblock");

                     if ($('#AddressAv').val("1")) {
                         
                        $('#addressinput').click(function(){
                            
                            if($(this).is(':checked')){
                                $('.forminputs').css('display' , 'none');
                            }else{
                                $('.forminputs').css('display' , 'none');
                            }
                        });

                         if ($('#addressinput').is(':checked')) {

                             var address = $('#fulladdress').html();
                             var landmark = $("#landmark").html();
                             var pincode = $("#pincode").html();
                             var phone = $('#phonenumber').html();
if(jQuery.trim(address) != '' && jQuery.trim(landmark) != '' && jQuery.trim(pincode) != '' && jQuery.trim(phone) != ''){
                             $.ajax({
                                 url: "Process/Order.php",
                                 type: "POST",
                                 data: {
                                     address: address,
                                     landmark: landmark,
                                     pincode: pincode,
                                     phone: phone,
                                     id:id,
                                     quantity:quantity
                                     
                                 },
                                 cache: false,
                                 beforesend: function() {

                                 },
                                 success: function(data) {
                                     if (jQuery.trim(data) == "") {
                                         $('body').html(' <div class="successPage"> <div class="holder"> <div class="circle"><h1><i class="fa fa-check"></i></h1></div>    <div><br><center><h2>Order Place Successfully!</h2><br><h2>Product will Reach You Within 5 Hours</h2></center>  </div> </div></div>');
                                         window.setTimeout(function() {

                                             // Move to a new location or you can do something else
                                            window.location.href = "MyOrders";

                                         }, 5000);
                                     } else {

                                         $('#errorbox p').html(data);

                                     }
                                 }
                             });}else{
                                 $('#errorbox p').html("Sorry! Somethings Wrong, please enter the address manually!");
                             }

                         } else {
                             
                             
                             
                              var address = $('#Iaddress').val();
                             var landmark = $("#Ilandmark").val();
                             var pincode = $("#Ipincode").val();
                             var phone = $('#Iphonenumber').val();
if(jQuery.trim(address) != '' && jQuery.trim(landmark) != '' && jQuery.trim(pincode) != '' && jQuery.trim(phone) != ''){
                             $.ajax({
                                 url: "Process/Order.php",
                                 type: "POST",
                                 data: {
                                     address: address,
                                     landmark: landmark,
                                     pincode: pincode,
                                     phone: phone,
                                     id:id,
                                     quantity:quantity
                                 },
                                 cache: false,
                                 beforesend: function() {

                                 },
                                 success: function(data) {
                                     if (jQuery.trim(data) == "") {
                                         $('body').html(' <div class="successPage"> <div class="holder"> <div class="circle"><h1><i class="fa fa-check"></i></h1></div>    <div><br><center><h2>Order Place Successfully!</h2></center>   <center><br><h2>Product will Reach You Within 5 Hours</h2></center>  </div> </div></div>');
                                         window.setTimeout(function() {

                                             // Move to a new location or you can do something else
                                             window.location.href = "MyOrders";

                                         }, 5000);
                                     } else {

                                         $('#errorbox p').html(data);

                                     }
                                 }
                             });
                             
}else{
    $('#errorbox p').html("All Fields Should Be Filled!");
}

                         }

                     } else {
                         
                         
                         
                          var address = $('#Iaddress').val();
                             var landmark = $("#Ilandmark").val();
                             var pincode = $("#Ipincode").val();
                             var phone = $('#Iphonenumber').val();
                         
                         if(jQuery.trim(address) != '' && jQuery.trim(landmark) != '' && jQuery.trim(pincode) != '' && jQuery.trim(phone) != ''){
                             
                        

                             $.ajax({
                                 url: "Process/Order.php",
                                 type: "POST",
                                 data: {
                                     address: address,
                                     landmark: landmark,
                                     pincode: pincode,
                                     phone: phone,
                                     id:id,
                                     quantity:quantity
                                 },
                                 cache: false,
                                 beforesend: function() {

                                 },
                                 success: function(data) {
                                     if (jQuery.trim(data) == "") {
                                         $('body').html(' <div class="successPage"> <div class="holder"> <div class="circle"><h1><i class="fa fa-check"></i></h1></div>    <div><br><center><h2>Order Place Successfully!</h2></center>   <center><br><h2>Product will Reach You Within 5 Hours</h2></center>  </div> </div></div>');
                                         window.setTimeout(function() {

                                             // Move to a new location or you can do something else
                                             window.location.href = "MyOrders";

                                         }, 5000);
                                     } else {

                                         $('#errorbox p').html(data);

                                     }
                                 }
                             });

                             }else{
                             $('#errorbox p').html("All Fields Should Be Filled!");
                         }

                     }

                 });


             });

         </script>
     </div>
     <script src="Js/slider.js"></script>
     <script src="Js/Supporter.js"></script>
     <script src="Js/Modal.js"></script>
     <script src="Js/Menu.js"></script>
 </body>

 </html>
 <?php  }else{
             
             
             
         } }else{echo '<script>window.location = "index";</script>';} }else{echo '
         
         <script>
         $(document).ready(function() {
          $(".login-overlay").css("display" , "block");
         });
        
         </script>
         
         ';}?>
