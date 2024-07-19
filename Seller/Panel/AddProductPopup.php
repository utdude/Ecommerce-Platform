   <div class="popup">
        <center>
            <div class="popupbox">
                <div class="popuphead">
                    <h2><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Product</h2><button class="options" id="closepopup"><i class="fa fa-times"></i></button>
                </div>
                <div class="popupcontent">

                    <div class="popupdivider">

                        <img id="blah" src="Img/preview.png" alt="your image" />
                    </div>
                    <div class="popupdivider">
                        <div class="popupform" style="width:100%; height:65vh; overflow-y:scroll;">
                            <form action="" id="addproduct" type="post" enctype="multipart/form-data" autocomplete="off">



                                <input type="text" class="panelinput" name="name" id="name" placeholder="Product Name">
                                <label class="custom-file-upload">
                                    <input type="file" name="image" id="imgInp">
                                    <i class="fa fa-upload"></i>&nbsp;&nbsp;Upload Product Image
                                </label>
                                <br>
                                <section class="custom-select" style="width:84%; margin-top:10px;">
                                    <select>
                                        <option value="0">Category</option>
                                        <option value="1">Cloth</option>
                                        <option value="2">Grocery</option>
                                        <option value="3">Kids</option>
                                        <option value="4">Other</option>

                                    </select>
                                </section><br>
                                <p style="font-size:12px; font-weight:700; color:#ff1100;">Please sellect the category fo your product (*important)</p><br>

                                <input type="text" class="panelinput" id="price" name="price" placeholder="Price ( ₹ )">
                                <br><br><br>
                                <label for="" class="radio">Warrenty - </label>
                                <label class="radio">Yes</label><input type="radio" name="warenty" value="0">
                                <label class="radio">No</label><input type="radio" name="warenty" value="1"><br>
                                <input type="text" class="panelinput" id="warenty" value="No Warenty" name="warentyinput" placeholder="Warenty Period (Eg. 2 years , 1 Month etc.)" disabled>
                                <input type="text" name="nopro" class="panelinput" id="noproduct" placeholder="How Many Number Of This Product You Have?">
                                <br>
                                 <input type="text" name="tags" class="panelinput" id="tags" maxlength="30" placeholder="Add Tags Eg-(tshirt,cloths,men etc)">
                                 <p style="font-size:12px; font-weight:700;">Seprate Each Tag By Comma ( , )</p><br>
                                
                                <textarea name="desc" class="panelinput" id="des" style="height:100px;" placeholder="Description (Product Features,usage etc.) -- Optional"></textarea>
<br><br>
                                <button class="panelbtn" type="submit">Add &nbsp;<i class="fa fa-plus"></i></button>
                                <div id="errorbox">
                                <br>
               <center><b><p></p></b></center>
             </div><br><br><br>
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
                    if (value == "1") {
                        $('#warenty').attr('disabled', true);
                        $('#warenty').val("No Warenty");
                    } else if (value == "0") {
                        $('#warenty').attr('disabled', false);
                        $('#warenty').val("");
                       
                    }
                });
            });

        </script>

    </div>