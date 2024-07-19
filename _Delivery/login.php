 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Deliveryboy Login</title>
     <link rel="stylesheet" href="../Css/Style.css">
     <link rel="stylesheet" href="../Style.css">



     <link rel="stylesheet" href="../Css/supporters.css">

     <link rel="stylesheet" href="../Css/ui.css">

     <link rel="stylesheet" href="../Css/Modals.css">


     <link rel="stylesheet" href="../Css/Media.css">

     <link href="https://fonts.googleapis.com/css?family=Comfortaa|Happy+Monkey|Rajdhani:300" rel="stylesheet">

     <link rel="shortcut icon" href="../Img/logo.png" type="image/png">

     <link rel="stylesheet" href="../Assets/awesome/css/font-awesome.min.css">
     <script src="../Js/Jquery.js"></script>
 </head>

 <body style="background:url('../Img/LOGIN_BG.jpg'); background-size:cover;">

     <div class="container cover">

         <form action="" id="DeliveryLogin">
            
             <center>
                <img src="../Img/Bdelivery.png" alt="" style="width:200px;">
                 <div style="width:100%; padding:10px;">
                     <input type="text" id="username" placeholder="Username" required><br>
                     <input type="password" id="password" placeholder="Password.." required><br>
                 </div>
                 <button class="simple" type="submit">Login</button><br><br>
                 <div id="errorbox" style="padding:10px;"><b>
                         <p style="color:#ff1100;"></p>
                     </b></div>
             </center>


         </form>
         
         <script>
         
             $(document).ready(function() {
                $('#DeliveryLogin').submit(function(e) {
                    e.preventDefault();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    
                    if(jQuery.trim(username) != "" && jQuery.trim(password) != ""){
                        
                        $.ajax({
                                 url: "../Process/DLogin.php",
                                 type: "POST",
                                 data: {
                                     username: username,
                                     password: password
                                     
                                 },
                                 cache: false,
                                 beforesend: function() {

                                 },
                                 success: function(data) {
                                 
                                     if(jQuery.trim(data) == ""){
                                         
                                         window.location = "Order";
                                         
                                     }else{
                                         $('#errorbox p').html(data);
                                     }
                                     
                                 }
                        });
                        
                    }else{
                        $('#errorbox p').html("All Fields Should Be Filled!");
                    }
                });
             });
         
         </script>

     </div>


 </body>

 </html>
