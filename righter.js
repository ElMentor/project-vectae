$(document).ready(function() {
  var $righty =   $('#righter .inner');
  
  
  
  $('#righter .bouton').click(function() {
    
    $righty.animate({
      right: parseInt($righty.css('right'),10) == 0 ?
        -$righty.outerWidth():
        0
          });
    
    $('#righter .bouton').animate({
      right: parseInt($('#righter .bouton').css('right'),10) == 0 ?
        -$('#righter .bouton').outerWidth()+330:
        0
          });

    if (parseInt($righty.css('right'))==0) {
  		$('#righter .inner').fadeOut(100);
  	}
  	else {
  		$('#righter .inner').show();
  	}
     
  });
  
  
  
  
});


function manip()
{
	var $righty =   $('#righter .inner');
	$righty.animate({
      right: parseInt($righty.css('right'),10) == 0 ?
        -$righty.outerWidth():
        0
          });
    
    $('#righter .bouton').animate({
      right: parseInt($('#righter .bouton').css('right'),10) == 0 ?
        -$('#righter .bouton').outerWidth()+330:
        0
          });

    if (parseInt($righty.css('right'))==0) {
  		$('#righter .inner').fadeOut(100);
  	}
  	else {
  		$('#righter .inner').show();
  	}
     
  
	
}