$(document).ready(function(){
    $(document).on('click', '#openloginmodal', function(){
    $('.login-overlay').css('display' , 'block'); 
    });
    
    $('#closeloginmodal').click(function(){
    $('.login-overlay').css('display' , 'none'); 
    });
    $('#openForgetPassword').click(function() {
       $('.overlayForgetpassword').css('display' , 'block'); 
    });
    $('#closeForgetpassword').click(function() {
       $('.overlayForgetpassword').css('display' , 'none'); 
    });
});