$(document).ready(function(){
  $(this).on('click' , '#openpopup' ,function() {
      $('.popup').css('height' , '100vh');
  });
  $('#closepopup').click(function() {
      $('.popup').css('height' , '0px');
  });



  $(this).on('click' , '#openeditpopup' ,function() {
    $('.popupedit').css('height' , '100vh');
});
$('#closeeditpopup').click(function() {
    $('.popupedit').css('height' , '0px');
});
});
