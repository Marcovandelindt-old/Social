// Form error remove
$(document).ready(function() {

	var closeBtn = $('.error-close-btn');

	$(closeBtn).click(function() {
		$('.register-error').fadeOut('slow');
	});

});