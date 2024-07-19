$(document).ready(function() {
  $('#opennavigation').click(function() {
      $('.small-menu').css('width' , '80%');
      $('.menu-overlay').css('width' , '100%');
  });

  $('#closenavigation').click(function() {
      $('.small-menu').css('width' , '0%');
      $('.menu-overlay').css('width' , '0%');
  });

  $('.opennav').click(function() {
      $('.sidemenu').css('width' , '70%');
      
      $('#closeSidemenu').click(function() {
      $('.sidemenu').css('width' , '0%');
      });
  });
    
  $('.closeverification').click(function() {
    
         $('.overlay-verification').css('display','none'); 
      });
});
