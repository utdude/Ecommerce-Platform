$(document).ready(function(){
    $(document).on('click','#cardcartbtn',function() {
        $('#cardcartbtn').html('<i class="fa fa-check"></i>'); 
    });
    
    
    $('#nconfirm').click(function(e){
        e.preventDefault();
        $('.confirmationbox').css('display' , 'none');
    });
    
    $('#confirm').click(function(e){
        e.preventDefault();
        var orderid = $(this).val();
        $('.confirmationbox').css('display' , 'none');
            
        $.ajax({
           url:"Process/cancelOrder.php",
            type:"post",
            data:{orderid:orderid},
            success:function(data){
                if(jQuery.trim(data) == ""){
                    
                    $('#'+orderid+'').html("Your Order Has Been Canceled!");
                    $('#cancelOrder').remove();
                    $('#'+orderid+'').css('color' , '#ff1100');
                    
                }else{
                    
                }
            }
        });
    });
    
});

