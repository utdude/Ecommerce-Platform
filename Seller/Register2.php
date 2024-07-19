<?php
session_start();
    if(isset($_SESSION['registering'])){
        $uniqid = $_SESSION['registering'];
    }else{
        echo '<script>alert("SOMETHING WENT WRONG!"); window.location = "../index.html";</script>';
    }

?>

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

 <div class="overlay-loader" style="z-index:10000;">
    <img src="../Img/Loader.gif" alt="">
  </div>
    <div class="container sub header" id="user">
        <img src="../Img/HeadSeller.png" alt="">



                <button class="simple" id="openloginmodal">Login</button>

    </div>

  <div class="registrationform" style="height:100vh;">
    <div style="width:30%;
    padding:1px;">  <img src="../Img/HeadSeller.png" class="headlogo" alt=""></div>
    <center><form action="" method="post" id="secondform">
      <div style="display:flex; justify-content:space-around; padding:20px;">

        <h4 class="steplabel">Step 2</h4>

  <h3 class="pagetoplabel">Selling Information</h3>

</div><br><br>
        <div class="custom-select" style="width:73%; margin-top:20px; ">
  <select id="Selectcat">
    <option value="0">Select Category Of Shop</option>
    <option value="1">Clothing</option>
    <option value="2">Kids</option>
    <option value="3">Grocery (Food)</option>
    <option value="4">General Store (Soap, detergents ,etc)</option>

  </select>
</div><br>
           <input type="text" class="forminput" id="perannum" Placeholder="Earning Per annum (Approx.)">

            <input type="text" class="forminput" id="adharno" Placeholder="Aadhar Card Number">

             <input type="text" class="forminput" id="adharname" Placeholder="Aadhar Card Name">


             <button class="special" id="formSubmit" type="submit">Next &nbsp;&nbsp;>></button>
             <h2 style="color:#383838; font-size:20px;">Never Worrey Because BINOKIO Is With You 24 x 7</h2><br>
             <center><img src="../Img/logo.png" alt="" style="margin:0px auto; float:none; padding:0px;width:15%; "></center>

    </form></center>
  </div>

  <script>

      $('#secondform').submit(function(e){
          e.preventDefault();

          var category = $('#Selectcat option:selected').html();
          var perannum = $("#perannum").val();
          var adharno = $("#adharno").val();
          var adharname = $("#adharname").val();

          if(jQuery.trim(category) != "" && jQuery.trim(perannum) != "" && jQuery.trim(adharno) != "" && jQuery.trim(adharname) != "" ){

           $.ajax({
           url: "Process/Register2.php",
            type: "POST",
             data:{


                  category:category,
                  perannum:perannum,
                  adharno:adharno,
                  adharname:adharname

             },

           cache: false,

        beforeSend : function()
        {
          $('.overlay-loader').css('display' , 'flex');
          },
            success: function(data)
                                    {

          if(jQuery.trim(data) == "1"){
              window.location = "Register3.php";
          }else{
             $('.overlay-loader').css('display' , 'none');
          }
      }

  });}else{
    alert("All Fields Should BE Filled!");
  }
      });

    </script>


<script>var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);</script>
</body>
</html>
