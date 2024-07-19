<?php


if(isset($_GET['Recovery_ID'] ) && isset($_GET['Recovery_Token'])){
    
    
   
   
    
    include_once("Process/Config.php");
    include_once("Process/Function.php");
    
    $recovery_token = E($_GET['Recovery_Token']);
    $recovery_id = E($_GET['Recovery_ID']);
    $stmt = $conn->prepare("SELECT * FROM `user-login-information` WHERE Uniqid = ? AND Recovery != ''");
    $stmt->execute([$recovery_id]);
    
    if($stmt->rowCount() != 0){ 
     
       
        
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $pass = $result->Recovery;
        
        
        
        
        if(password_verify($pass,$recovery_token)){
        
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/Media.css">
    <title>Change Password</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
     <script src="Js/Jquery.js"></script>
</head>
<body>
   <div class="body">
    <div style="width:100%; height:100vh;display:flex; justify-content:center; align-items:center;">
    <center>
        <form id="newpasswordform" type="post">
            <input type="hidden" id="recoveryID" value="<?php echo $recovery_id; ?>">
            <input type="password" id="password" placeholder="Enter New Password" required>
            <button type="button" name="submit" class="special">Set New Password</button><br>
            <h2>Please Enter Password Correctly..</h2>
            <style>
                @media(max-width: 950px) {
                    #newpasswordform {
                        width: 90% !important;
                        padding:0px;
                        border:none;
                        
                    }
                }

            </style>
        </form>

        <script>
            $(document).ready(function() {
                $('.special').click(function(e) {
                    e.preventDefault();
                    var password = $('#password').val();
                    var recovery = $('#recoveryID').val();
                    $.ajax({

                        url: "Process/NewPassword.php",
                        type: "POST",
                        data: {
                            password: password,
                            recoveryID: recovery
                        },
                        cache: false,
                        beforeSend: function() {

                        },
                        success: function(data) {
                            if (jQuery.trim(data) == "") {

                                $('.body').html("<div id='main'><div class='fof'><h1><i class='fa fa-check'></1>Password Updated Succesfully..</h1></div></div>");

                            } else {
                                $('.body').html("<h1>SOMETHING WENT WRONG!</h1>");
                            }
                        }

                    });

                });

            });

        </script>

    </center>


</div>
</div>
</body>
</html>

<?php        
    
            
        }else{
           
        }
        
    }else{
        
        echo '<div id="main">
    	<div class="fof">
        		<h1>Sorry! No Account Found With This Recovery Request..</h1>
    	</div>
</div>';
        
    }
    
    
    
}else{
    
    echo "<div id='main'>
    	<div class='fof'>
        		<h1>Sorry! You Don't Have Access To This..</h1>
    	</div>
</div>";
    
}



?>
<style>
    * {
        transition: all 0.6s;
    }

    html {
        height: 100%;
    }

    body {
        font-family: 'Lato', sans-serif;
        color: #888;
        margin: 0;
    }

    #main {
        display: table;
        width: 100%;
        height: 100vh;
        text-align: center;
    }

    .fof {
        display: table-cell;
        vertical-align: middle;
    }

    .fof h1 {
        font-size: 50px;
        display: inline-block;
        padding-right: 12px;
        animation: type .5s alternate infinite;
    }

    @keyframes type {
        from {
            box-shadow: inset -3px 0px 0px #888;
        }

        to {
            box-shadow: inset -3px 0px 0px transparent;
        }
    }

    form {
        width: 80%;
        padding: 50px;
        margin: 100px auto;
        
    }

    input {
        width: 80%;
        height: 20px;
        padding: 20px;
        font-size: 20px;
        border: 1px solid #bbb;
        outline: none;
    }



    button {
        padding: 15px;
        background: #ec5d37;
        color: #fff;
        border: none;
        margin: 20px;
    }

</style>
