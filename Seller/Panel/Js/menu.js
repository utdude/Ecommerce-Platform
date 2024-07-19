$(document).ready(function() {
  $('.tooglenav').click(function() {
    $('.tooglenav div').toggleClass('transform');
      $('.tooglenav div').toggleClass('transform:after');
    $('.tooglenav').toggleClass('edit');
    $('.sidemenu').toggleClass('onn');
    $('.sidemenu ul li').css('width' , '200px');
  });
});
