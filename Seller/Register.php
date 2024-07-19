<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To Binokio Seller</title>
    <link rel="stylesheet" href="../Css/Style.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="../Css/slider.css">

    <link rel="stylesheet" href="../Css/supporters.css">

    <link rel="stylesheet" href="../Css/ui.css">

    <link rel="stylesheet" href="../Css/Modals.css">

    <link rel="stylesheet" href="../Css/Media.css">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

    <link rel="shortcut icon" href="../Img/logo.png" type="image/png">
    <script src="../Js/Jquery.js"></script>
    <link rel="stylesheet" href="../assets/awesome/css/font-awesome.min.css">
</head>

<body>

    <div class="overlay-loader">
        <img src="../Img/Loader.gif" alt="">
    </div>

    <div class="container sub header" id="user">
        <img src="../Img/HeadSeller.png" alt="">


        <button class="simple" id="">Login</button>

    </div>

    <div class="registrationform">
        <div style="width:30%;
  padding:1px;"> <img src="../Img/HeadSeller.png" class="headlogo" alt=""></div>
        <div class="divoverlay">
            <center>


                <form action="" id="submitForm" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div style="display:flex; justify-content:space-around; padding:20px;">

                        <h4 class="steplabel">Step 1</h4>

                        <h3 class="pagetoplabel">General Information</h3>

                    </div>


                    <input type="text" class="forminput" name="name" id="name" Placeholder="Seller's Full Name">

                    <input type="text" class="forminput" name="shopname" id="Shopname" Placeholder="Seller's Shop / Company Name">

                    <div class="file-block">

                        <button class="btn-select-file" disabled="">Upload Seller's Photograph</button>
                        <input type="file" name="image" id="sellerfileinput">
                        <center>
                            <p>Photograph Should Be Real.</p>
                        </center>
                    </div>

                    <input type="email" name="email" class="forminput" id="email" Placeholder="Seller's Official Email">

                    <input type="phone" name="phone" class="forminput" id="phone" Placeholder="Seller's Official Phone Number">

                    <textarea name="shopaddress" id="shopaddress" class="forminput" placeholder="Shop Full Correct Address.."></textarea>
                    <textarea name="selleraddress" id="selleraddress" class="forminput" placeholder="Seller's Full Correct Address.."></textarea>

                    <button type="submit" class="special" id="submit">Next &nbsp;&nbsp;>></button><br><br>
                    <div id="errorbox"><b>
                            <p></p>
                        </b></div><br>
                    <h2 style="color:#383838; font-size:20px;">Never Worrey Because BINOKIO Is With You 24 x 7</h2><br>
                    <center><img src="../Img/logo.png" alt="" style="margin:0px auto; float:none; padding:0px;width:15%; "></center><br><br>

                </form>
            </center>
        </div>

    </div>

    <script>
        const fileBlocks = document.querySelectorAll('.file-block')
        const buttons = document.querySelectorAll('.btn-select-file')

        ;
        [...buttons].forEach(function(btn) {
            btn.onclick = function() {
                btn.parentElement.querySelector('input[type="file"]').click()
            }
        })

        ;
        [...fileBlocks].forEach(function(block) {
            block.querySelector('input[type="file"]').onchange = function() {
                const filename = this.files[0].name

                block.querySelector('.btn-select-file').textContent = 'File selected: ' + filename
            }
        })



        $(document).ready(function(e) {
            $("#submitForm").on('submit', function(e) {
                
                e.preventDefault();
                var name = $('#name').val();
                var shopname = $('#Shopname').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var selleraddress = $('#selleraddress').val();
                var shopaddress = $('#shopaddress').val();
                
                if (jQuery.trim(name) != "" && jQuery.trim(shopname) != "" && jQuery.trim(email) != "" && jQuery.trim(phone) != "" && jQuery.trim(selleraddress) != "" && jQuery.trim(shopaddress) != "") {

                

                
                $.ajax({
                    url: "Process/Reg1.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.overlay-loader').css("display", "flex");
                    },
                    success: function(data) {
                        if (jQuery.trim(data) != "") {


                            window.location = "Register2.php";
                        } else {
                            $('.overlay-loader').css("display", "none");

                        }


                    }

                });
                    } else {
                          $("#errorbox p").css('color' , '#ff1100');
                        $("#errorbox p").html("All Fields Should Be Filled");
                }
            });
        });

    </script>
</body>

</html>
