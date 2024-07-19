<?php  

session_start();

if(isset($_SESSION['USERS_LOGIN'])){
    
    $uniqid = $_SESSION['USERS_LOGIN'];
?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller's Panel</title>
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
              
              <li><a href="Trending">Trending Products</a></li>
              <li><a href="Seller/Seller">Become Seller</a></li>
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


<!--<div class="foot-menu">
    <div>
        <a href="#"><i class="fa fa-menu"></i>Category</a>
    </div>
</div>-->

<div>
  <center><h4 class="titletext">We Are 24x7 In Your Support</h4></center>
  <p style="text-align:center; padding:10px; padding-top:0px;">Your query Will Be Reviewed Withing 24h and you will get a email.</p>
</div>
<br>
<div class="tab">
          <div class="tabhead" style="overflow:auto;">
           
           
          </div><br>
          <center>
           <form action="" id="CustomerQ">
            <input type="text" id="subject" class="panelinput" placeholder="Subject Of query (Topic)" required><br>
            <textarea  class="panelinput" id="query" placeholder="Write Your query Here.." value="" required></textarea>
            <br>
            <button type="submit" class="panelbtn"><i class="fa fa-send" ></i>&nbsp; Send</button>
          </form></center>
         <br>
      </div>
      
      <script>
    
          $('#CustomerQ').submit(function(e){
             e.preventDefault();
              
              var uniqid = "<?php echo $uniqid; ?>";
              var subject = $('#subject').val();
              var query = $('#query').val();
              
              $.ajax({
                 url:"Process/CustomerCare.php",
                  type:"POST",
                  data:{uniqid:uniqid,
                       subject:subject,
                       query:query},
                  cache:false,
                  success:function(data){
                      if(jQuery.trim(data) == ""){
                          
                          window.location = "index";
                          
                      }else{
                          
                      }
                  }
              });
          });
    
    </script>
      
<script src="Js/Menu.js"></script>
</body>
</html>
<?php    
}else{
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller's Panel</title>
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

<div style="width:100%; height:100vh; background:#eee; display:flex; justify-content:center; align-items:center;">
   
   <div style="background:#fff; height:100px; width:60%; padding:20px; display:flex; justify-content:center; align-items:center;">
      <center> <button style="width:100%; padding:15px; color:#fff; border:none; background:#ec5d37;" onclick="login()">Login To access Customer Care</button></center>
   </div>
    
    <script>
    
        function login(){
            
            window.location = "Login";
            
        }
        
    </script>
    
</div>
    </body>
</html>
<?php    
}

?>
