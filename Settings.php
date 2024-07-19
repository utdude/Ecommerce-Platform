 <?php 
 session_start();
 if(isset($_SESSION['USERS_LOGIN'])){
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
      <div class="overlay-loader" style="z-index:10000;">
    <img src="Img/Loader.gif" alt="">
  </div>

     <div class="sidemenu">
        <button class="simple" id="closeSidemenu" style="font-size:40px; margin:10px; width:60px; height:60px; color:#1a1a1a;">&times;</button>
         <ul>
             <?php 
               
                if(isset($_SESSION['USERS_LOGIN'])){
                    $uniqid = $_SESSION['USERS_LOGIN'];
                ?>



             <li><a href="MyOrders">My Orders</a></li>
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


      
         <?php 
                
                if(isset($_SESSION['USERS_LOGIN'])){
                    
                ?>

         <li><a href="CustomerCare ">Customer Care</a></li>

         <li><a href="MyOrders">My Orders</a></li>

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
    <?php
     
     include_once("Process/Config.php");
     include_once("Process/Function.php");
     
     $stmt = $conn->prepare("SELECT * FROM `user-details` WHERE Uniqid = ?");
     $stmt->execute([$uniqid]);
     
     $result = $stmt->fetch(PDO::FETCH_OBJ);
     

     ?>
     <div class="Userheading">
         <h3>My Settings</h3>
     </div>
     
     <center><button onclick="Logout()" class="special" style="background:none; border:1px solid #ec5d37; border-rdius:2px; color:#ec5d37;">Logout</button></center>
     
     <script>
     
         function Logout(){
             window.location = "Process/Logout";
         }
     
     </script>
     
     <form action="" type="post" id="settingsform">
       <div class="flexform">
           
     
         <div class="inputholder" >
             <h3>Change Email</h3>
             <input type="text" class="forminput" id="email" style="width:98%;" value="<?php echo $result->Email; ?>">
        </div>
         <div class="inputholder" >
             <h3>Change password</h3>
             <input type="password" class="forminput" id="password" style="width:98%;" placeholder="New password (MINIMUM 8 CHARACTERS)">
             <input type="password" class="forminput" id="cpassword" style="width:98%;" placeholder="Confirm Password">
        </div>
         </div>
         <center>
             <button type="submit" class="special" style="">Update</button><br>
             <div id="errorbox"><b><p></p></b></div><br><br>
         </center>
     </form>
     
    <script>
      $(document).ready(function() {
         $('#settingsform').submit(function(e) {
            e.preventDefault();
            
             var email = $('#email').val();
             var password = $('#password').val();
             var cpassword = $('#cpassword').val();
             
             if(jQuery.trim(password) == jQuery.trim(cpassword)){
                 
                 $.ajax({
                
                 url: "Process/Update.php",
                 type:"POST",
                 data:{email:email,password:password},
                 beforeSend:function(){
                     $('.overlay-loader').css("display" , "flex");
                 },
                 success:function(data){
                     if(jQuery.trim(data) == ""){
                         
                         $('.overlay-loader').css("display" , "none");
                         $('#errorbox p').css('color' , '#06d614');
                         $('#errorbox p').html("Updated Successfully <i class='fa fa-check'></i>");
                         
                     }else{
                          $('.overlay-loader').css("display" , "none");
                          $('#errorbox p').css('color' , '#ff1100');
                         $('#errorbox p').html(data);
                         
                     }
                 }
                 
             });
                 
             }else{
                  $('#errorbox p').css('color' , '#ff1100');
                  $('#errorbox p').html('Confirm Password Not Correct!');
             }
             
             
         }); 
      });
     </script>
     <script src="Js/Menu.js"></script>
     </body>
</html>
<?php }else{echo '<script>window.location = "index"</script>';}?>