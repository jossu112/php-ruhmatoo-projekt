var voted = false;

$('.check').click(function(){
  if(voted)reset();
});

$('.up').click(function(){
  $(this).addClass('scaleDown');
  $('.down').addClass('scaleDown');
  $('.check').addClass('ok');
  voted = true;
});

$('.down').click(function(){
  $(this).addClass('scaleDown');
  $('.up').addClass('scaleDown');
  $('.check').addClass('ok');
  voted = true;
});

function reset(){
    $('.scaleDown').removeClass('scaleDown');
    $('.check').removeClass('ok');
    voted = false;
   
}
