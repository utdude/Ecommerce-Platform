<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="../Css/ui.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../Css/Media.css">


    <script src="../Js/Jquery.js"></script>
</head>

<body style="background-image:url('Admin1.jpg'); background-size:1200px;">

<div class="container cover" style="position:fixed;">

         <form action="" id="DeliveryLogin" style="background:url('Admin2.jpg'); background-size:500px;">
           
             <center>
              
                 <div style="width:100%; padding:10px;"><br><br><br><br>
                     <img src="Admin3.jpg" alt="" style="height:100px; border-radius:20px; float:left; margin:55px; margin-top:0px !important; margin-bottom:5px !important;"><h2 style="color:#fff; font-weight:300; padding:30px;">UTDUDE</h2><br><br>
                     <input type="text" id="username" placeholder="Username" required><br>
                     <input type="password" id="password" placeholder="Password.." required><br>
                 </div>
                 <button class="simple light" type="submit">Login</button><br><br>
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
                                 url: "Process/Alogin.php",
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
                                         
                                         window.location = "index";
                                         
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
<style>
    .light{
        border:1px solid #fff !important;
        color:#fff !important;
    }
    </style>
</body>

</html>
