

console.log("cusot,");


jQuery(document).ready(function($) {

	$('#show_more').on('click', function(){

		$(this).fadeOut('fast');
		$('.read-more-box').css('height', '100%');
		$('.read-more').fadeOut('fast');

	});


});