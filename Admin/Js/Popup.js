$(document).ready(function() {
   $('body').on('click' , '.productCard' , function() {
     
       var productid = $(this).attr('id');
       $('#MessageHidden').val(productid);
       $('.overlayMessage').css('display' , 'block');
       
       
   });
    
    $('.closeMessagebox').click(function() {
       
        $('.overlayMessage').css('display' , 'none');
        
    });
});