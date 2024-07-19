<?php
session_start();
    if(isset($_SESSION['SELLER_LOGIN'])){
        $uniqid = $_SESSION['SELLER_LOGIN'];
    include_once("Process/Config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seller's Panel V1</title>
  <link rel="stylesheet" href="./Css/style.css">
  <link rel="stylesheet" href="./Css/Popup.css">
  <link rel="stylesheet" href="./Css/media.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="shortcut icon" href="Img/Logo.png" type="image/png">
  <link rel="stylesheet" href="../../Assets/awesome/css/font-awesome.min.css">
<script src="../../Js/Jquery.js"></script>
</head>
<body>
 <div class="overlay-loader" style="z-index:10000;">
    <img src="../../Img/Loader.gif" alt="">
  </div>
<?php include("AddProductPopup.php"); ?>

  <div class="popupedit">
     
    </div>
    
     
  <div class="mobilenav">
    <button class="tooglenav">
      <div></div>
      <div></div>
      <div></div>
    </button>

    <div class="sidemenu">
      <ul>
        <li><a href="MySellings"><i class="fa fa-shopping-cart"></i> &nbsp;&nbsp;My Sellings</a></li>
        <li><a href="Messages"><i class="fa fa-comments"></i> &nbsp;&nbsp;Messages</a></li>
        <li><a href="Complain"><i class="fa fa-question"></i> &nbsp;&nbsp;Complain</a></li>
        <li><a href="Ask"><i class="fa fa-question"></i> &nbsp;&nbsp; Ask Questions</a></li>
      </ul>
    </div>
  </div>
  <div class="header">
    <div class="head">
      <img src="./Img/Logo.png" alt="">
      <h2>Seller's Panel V1</h2>
    </div>
    <div class="links">
      <ul>
        <li><a href="Panel">Home</a></li>
        <li><a href="Edit" class="activelink" >Edit Products</a></li>
        <li><a href="Settings">Settings</a></li>

      </ul>
    </div>
    <div class="nav">
      <button class="options" id="openpopup"><i class="fa fa-plus"></i>&nbsp; Add Product</button>
       <a href="Settings">
                <div class="mask">
                   <?php 
                        
                        $stmt = $conn->prepare("SELECT * FROM `seller-details` WHERE Uniqid = ?");
                        $stmt->execute([$uniqid]);
                        
                        $result = $stmt->fetch(PDO::FETCH_OBJ);
    
                    ?>
                    <img src="../Uploads/<?php echo $result->SellerImage; ?>" alt="">
                </div>
            </a>
    </div>
  </div>
  <div class="smallmenu">
    <div class="container">
        <div><a href="Panel" ><i class="material-icons">home</i></a></div>
        <div><a href="#" class="smallnavactive"><i class="material-icons">apps</i></a></div>
        <div><a href="Settings"><i class="material-icons">settings</i></a></div>
    </div>

  </div>
  <div class="panelcontainer">
    <div class="sidepanel">
      <!--<div class="head">
        <div class="mask">
  <img src="./Img/utdude.jpg" alt="">
</div>

  <h4>Utkarsh Rai</h4>
      </div>-->
      <div class="head">
        <h3>Seller Actions</h3>

      </div>
      <center>





        <div>
          <a href="MySellings" class="sellings navbtn"><i class="fa fa-shopping-cart"></i> &nbsp;&nbsp; My Sellings <!--<div><p>0</p></div>--></a>
        </div>

        <div>
          <a href="Messages" class="Messages navbtn"><i class="fa fa-envelope"></i> &nbsp;&nbsp; Messages <!--<div><p>0</p></div>--></a>
        </div>


        <div>
          <a href="Ask" class="ask navbtn"><i class="fa fa-question"></i> &nbsp;&nbsp; Ask Question</a>
        </div>

        <div>
          <a href="Complain" class="complain navbtn"><i class="fa fa-comments"></i> &nbsp;&nbsp;Complain</a>
        </div>

      </center>

    </div>
    <div class="contentpane">
      <div class="tab tab1">
      <p>To Add Product Click Here Or On the Top Right Of the Page</p>
      <button  id="openpopup"><i class="fa fa-plus"></i> &nbsp;&nbsp; Add Product</button>
    </div><br>
      
    <style>@media(max-width:900px) {.contentpane{padding-top:120px;}}</style>












    <?php
        
        include_once("Process/Config.php");
        include_once("Process/Function.php");
        
        $stmt = $conn->prepare("SELECT * FROM `products` WHERE Uniqid = ?");
        $stmt->execute([$uniqid]);
        
        while($result = $stmt->fetch(PDO::FETCH_OBJ)){
    ?>
      



    <!--THE PRODUCT TAB STARTS HERE-->
    <div class="tab Producttabs">
      <div class="imageholder">

       <!--THE PRODUCT IMAGE SHOULD BE FETCHED HERE-->  <center><img src="Products/<?php echo strtolower($result->ProductImage); ?>" alt=""></center> 

      </div>

      <section class="productlabel">
         <div style="padding:0px;">
            <!--THE PRODUCT NAME SHOULD BE FETCHED HERE--><h3><?php echo $result->ProductName; ?></h3>

            <div style="width:auto; height:auto;   margin-left:15px; padding:5px;">
             <p style="color:#f7817b;">Price - &nbsp;</p><p>₹</p>
             <!--THE PRODUCT PRICE SHOULD BE FETCHED HERE--> <p><?php echo $result->ProductPrice; ?></p>
            </div>

         </div>
         </section>

         <section class="editcontainer">
          <center><button class="edit" id="openeditpopup" value="<?php echo $result->ProductID; ?>"><i class="material-icons">edit</i></button></center> 
         </section>
    </div>
    
     <?php        
        }
        
        ?>
        
        <script>
$("body").on('click' ,'#closeedit' ,function() {
    $('.popupedit').css('height' , '0px');
});
</script>
        <script>
        
            $(document).on('click' , '#openeditpopup' , function() {
               var ProductID = $(this).val();
                
                 $.ajax({
                        url: "Process/Edit.php",
                        type: "POST",
                        data: {
                            productid:ProductID
                        },
                        cache: false,
                        beforeSend: function() {
                         
                        },
                        success: function(data) {
                           $('.popupedit').html(data);
                        }
                    });
                
            });
        
        </script>

   <!--THE PRODUCT TAB ENDS HERE-->

   
      </div>
  </div>


<script src="Js/menu.js"></script>
<script src="Js/popup.js"></script>
<script src="Js/select.js"></script>
<script src="Js/preview.js"></script>
</body>
</html>
<?php }else{
        echo '<script>alert("SOMETHING WENT WRONG!"); window.location = "../Seller";</script>';  
    } ?>