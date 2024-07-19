<?php 
session_start();
if(isset($_SESSION['SELLER_LOGIN'])){
    
    
    $uniqid = $_SESSION['SELLER_LOGIN'];
    

    
    
    if(isset($_POST['productid'])){
        
        
            include_once("Config.php");
include_once("Function.php");
        
        
        $productid = $_POST['productid'];
        
        $stmt = $conn->prepare("SELECT * FROM `products` WHERE ProductID = ? AND Uniqid = ?");
        $stmt->execute([$productid,$uniqid]);
        
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        
        echo '
        
         <center>
          <div class="popupbox">
          <input type="hidden" id="EditproductID" value="'.$_POST['productid'].'">
      <div class="popuphead"><h2><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Product</h2><button class="options" id="closeedit"><i class="fa fa-times"></i></button></div>
      <div class="popupcontent">

        <div class="popupdivider">
            
            <img id="blah2" src="Products/'.strtolower($result->ProductImage).'" alt="your image">

        </div>

        <div class="popupdivider">
          <div class="popupform" style="width:100%; height:65vh; overflow-y:scroll;">
            <form action="" id="editproduct" type="post" enctype="multipart/form-data">
              <input type="text" class="panelinput" name="name" id="Ename" placeholder="Product Name" value="'.$result->ProductName.'">


              <label class="custom-file-upload">
      <input type="file" name="image" id="imgInpp">
    <i class="fa fa-upload"></i>&nbsp;&nbsp;Upload New Image
  </label>


 



<input type="text" name="price" class="panelinput" id="Eprice" placeholder="Price ( ₹ )" value="'.$result->ProductPrice.'">

<br><br>



<input type="text" name="warenty" class="panelinput" id="Ewarenty" placeholder="Warenty Period (Eg. 2 years , 1 Month etc.)" value="'.$result->ProductWarrenty.'">

<input type="text" name="nopro" class="panelinput" id="Enoproduct" placeholder="How Many Number Of This Product You Have?" value="'.$result->ProductNo.'">
 <br>
    <input type="text" name="tags" class="panelinput" id="Etags" maxlength="30" placeholder="Add Tags Eg-(tshirt,cloths,men etc)" value="'.$result->tags.'">
    <p style="font-size:12px; font-weight:700;">Seprate Each Tag By Comma ( , )</p><br>

<textarea name="des" id="Edes" class="panelinput" style="height:100px;" placeholder="Description (Product Features,usage etc.) -- Optional" value="">'.$result->Discription.'</textarea>

        <br>  <button type="submit" class="panelbtn">Update &nbsp;<i class="fa fa-check"></i></button> <br><br>
        
        <div id="errorbox"><b><p></p></b></div>

            </form>

          </div>

        </div>

      </div>
          </div>
      </center>
      <script>
           $(document).ready(function() {
            
            
            
            function readURL(input) {

if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function(e) {
$("#blah2").attr("src", e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}

$("#imgInpp").change(function() {
readURL(this);
});
             $("#editproduct").submit(function(e) {
            e.preventDefault();
                
                 
                 
                 
                 
            var name = $("#Ename").val();
            
            var price = $("#Eprice").val();
            var tags = $("#Etags").val();
            var warenty = $("#Ewarenty").val();
            var nopro = $("#Enoproduct").val();
            var des = $("#Edes").val();
            var ProductID = $("#EditproductID").val();
            var data = new FormData(this);
                 data.append("ProductID" , ProductID);
                 data.append("tags" , tags);
                
            if(jQuery.trim(name) == "" || jQuery.trim(price) == "" || jQuery.trim(warenty) == "" || jQuery.trim(nopro) == "" || jQuery.trim(des) == ""){
                $("#errorbox p").html("All Fields Should Be Filled!");
            }else
          

            {
            
           
                
                $.ajax({
                    url: "Process/EditProduct.php",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $(".overlay-loader").css("display", "flex");
                    },
                    success: function(data) {
                        if(jQuery.trim(data) != "") {
window.location = "Edit";
                                $(".overlay-loader").css("display", "none");
                                
                            
                        } else {
                            $(".overlay-loader").css("display", "none");
                            $("#errorbox p").html(data);
                        }


                    }

                });

            } 

                
        });

            
        });
       
        </script>
        
        ';
        
    }
    
    
}else{}
?>
