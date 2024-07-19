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
  <div class="popup">
    <center>
      <div class="popupbox">
        <div class="popuphead"><h2><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Product</h2><button class="options" id="closepopup"><i class="fa fa-times"></i></button></div>
        <div class="popupcontent">

          <div class="popupdivider">

              <img id="blah" src="Img/preview.png" alt="your image" />
          </div>
          <div class="popupdivider">
            <div class="popupform" style="width:100%; height:65vh; overflow-y:scroll;">
              <form action="">
                <input type="text" class="panelinput" id="" placeholder="Product Name">
                <label class="custom-file-upload">
        <input type="file" id="imgInp">
      <i class="fa fa-upload"></i>&nbsp;&nbsp;Upload Product Image
    </label>
    <section class="custom-select" style="width:84%; margin-top:10px;">
  <select>
  <option value="0">Category Of Product</option>
  <option value="1">Cloth</option>
  <option value="2">Food</option>
  <option value="3">Kids</option>
  <option value="4">Other</option>

  </select>
  </section>

  <input type="text" class="panelinput" id="price" placeholder="Price ( ₹ )">
  <br><br>
  <label for="" class="radio">Warrenty - </label>
  <label class="radio">Yes</label><input type="radio" name="warenty" value="0">
  <label class="radio">No</label><input type="radio" name="warenty" value="1"><br><br>
  <input type="text" class="panelinput" id="warenty" placeholder="Warenty Period (Eg. 2 years , 1 Month etc.)" disabled>
  <input type="text" class="panelinput" id="" placeholder="How Many Number Of This Product You Have?">
  <textarea name="features" class="panelinput" style="height:100px;" placeholder="Description (Product Features,usage etc.) -- Optional"></textarea>
          <br>  <button class="panelbtn">Add &nbsp;<i class="fa fa-plus"></i></button>
              </form>
            </div>

          </div>

        </div>
      </div>

    </center>

  <script>
    $(document).ready(function() {

    $('input[type="radio"]').click(function() {
      var value = $('input[name="warenty"]:checked').val();
      if(value == "1"){$('#warenty').attr('disabled',true);} else if (value == "0"){$('#warenty').attr('disabled',false);}
    });
    });
  </script>

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
        <li><a href="Panel" >Home</a></li>
        <li><a href="Edit">Edit Products</a></li>
        <li><a href="#" >Settings</a></li>

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
        <div><a href="Edit" ><i class="material-icons">apps</i></a></div>
        <div><a href="#"><i class="material-icons">settings</i></a></div>
    </div>

  </div>
  <div class="panelcontainer">
    <div class="sidepanel">
      <!--<div class="head">
        <div class="mask">
  <img src="./Img/utdude.jpg" alt="">
</div>​

  <h4>Utkarsh Rai</h4>
      </div>-->
      <section class="head">
        <h3>Seller Actions</h3>

      </section>
      <center>





        <div>
          <a href="MySellings" class="sellings "><i class="fa fa-shopping-cart"></i> &nbsp;&nbsp; My Sellings <!--<div><p>0</p></div>--></a>
        </div>

        <div>
          <a href="Messages" class="Messages "><i class="fa fa-envelope"></i> &nbsp;&nbsp; Messages <!--<div><p>0</p></div>--></a>
        </div>


        <div>
          <a href="Ask" class="ask "><i class="fa fa-question"></i> &nbsp;&nbsp; Ask Question</a>
        </div>

        <div>
          <a href="Complain" class="complain "><i class="fa fa-comments"></i> &nbsp;&nbsp;Complain</a>
        </div>

      </center>

    </div>


    <div class="contentpane"><br>
      <br>

      <div class="tab">
          <div class="tabhead" style="overflow:auto;">
           <h3 style="margin-top:25px;">We Are 24 x 7 In Your Support</h3>
           <p style="text-align:center;">(Your Questino Will Be Answered Withing 24h and you will get a message With Your Answer)</p>
          </div><br>
          <center>
            <input type="text" class="panelinput" placeholder="Question In Small.." required><br>
            <textarea  class="panelinput" placeholder="Explain Your Query In Brief.." value="" required></textarea>
            <br>
            <button type="submi" class="panelbtn"><i class="fa fa-send" ></i>&nbsp; Send</button>
          </center>
         <br>
      </div><br>


      <br>  <br><br><br>

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