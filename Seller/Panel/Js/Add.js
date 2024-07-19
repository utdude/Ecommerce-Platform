$(document).ready(function() {
            
             $('#addproduct').submit(function(e) {
            e.preventDefault();
                
                 
                 
                 
                 
            var name = $('#name').val();
            var img = $('#imgInp').val();
            var tags = $('#tags').val();
            var cat = $('.custom-select option:selected').html();
            var price = $('#price').val();
            var warenty = $('#warenty').val();
            var nopro = $('#noproduct').val();
            var des = $('#des').val();
            var data = new FormData(this);
                 data.append('cat' , cat);
                 data.append('warentyinput' , warenty);
                 data.append('tags' , tags);
            if(jQuery.trim(name) == '' || jQuery.trim(cat) == '' || jQuery.trim(price) == '' || jQuery.trim(warenty) == '' || jQuery.trim(nopro) == '' || jQuery.trim(des) == ''){
                $('#errorbox p').html('All Fields Shold Be Filled!');
            }else
          

            {
                
                if(jQuery.trim(cat) != 'Category' ){
                    
                
                
                $.ajax({
                    url: "Process/Add.php",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.overlay-loader').css("display", "flex");
                    },
                    success: function(data) {
                        if(jQuery.trim(data) != "") {

                                $('.overlay-loader').css("display", "none");
                            $('.popup').css('height' , '0px');
                        } else {
                            $('.overlay-loader').css("display", "none");
                            $('#errorbox p').html(data);
                        }


                    }

                });
                }else{
                     $('#errorbox p').html('Please choose Category of your product.');
                }

            } 

                
        });

            
        });
       