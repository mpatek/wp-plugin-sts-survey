/**
 * JavaScript for STS Researcher survey.
 */
jQuery(document).ready(function($) {

	/**
	 * Constrain responses to integer values between lo and hi.
	 */
	$('input.response').on('change', function(event) {
		var value = $(this).val();
		var lo_response = Number($(this).attr('min'));
		var hi_response = Number($(this).attr('max'));
		value = Math.floor(Number(value));
		if (value < lo_response) {
			value = lo_response;
		}
		if (value > hi_response) {
			value = hi_response;
		}
		$(this).val(value);
	});

	/**
	 * No submit on enter.
	 */
	 $(window).keydown(function(event) {
	 	if (event.keyCode == 13) {
	 		event.preventDefault();
	 		return false;
	 	}
	 });

	 /**
	  * Submit survey via ajax.
	  */
	$('.survey form').on('submit', function(event) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: $(this).serialize(),
			success: function(response) {
				if (response == 'success') {
					$('#success-modal').modal('show');
				}
				else {
					$('#failure-modal').modal('show');
				}
			}
		})
	});

	/**
	 * Hide addl response inputs if no addl source.
	 */
	var $addl_source = $('textarea[name="addl-source"]');
	var toggle_addl_responses = function() {
		var v = $.trim($addl_source.val());
		if (v == '') {
			$('.addl-response').hide().val('0');
		}
		else {
			$('.addl-response').show();
		}
	}
	$addl_source.on('change', toggle_addl_responses);
	toggle_addl_responses();
});
