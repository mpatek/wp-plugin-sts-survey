/**
 * JavaScript for STS Researcher survey.
 */
jQuery(document).ready(function($) {

	/**
	 * Constrain responses to integer values between lo and hi.
	 */
	$('input.response').on('change', function(event) {
		value = $(this).val();
		if ( value == '' ) {
			return;
		}
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
	 * Show/hide addl source and response inputs
	 */
	var $addl_source = $('tr.addl-source');
	var $show_addl_source = $('#show-addl-source');
	var $hide_addl_source = $('#hide-addl-source');
	var show_addl_responses = function() {
		$addl_source.show();
		$hide_addl_source.prop('checked', false);
		$show_addl_source.prop('checked', true);
		var $table = $('table.survey-table');
		$table.scrollTop($table[0].scrollHeight);
	}
	var hide_addl_responses = function() {
		$addl_source.hide();
		$hide_addl_source.prop('checked', true);
		$show_addl_source.prop('checked', false);
	}
	$show_addl_source.on('click', show_addl_responses);
	$hide_addl_source.on('click', hide_addl_responses);
	var addl_source = $.trim($('textarea[name="addl-source"]').val());
	if (addl_source == '') {
		hide_addl_responses();
	}
	else {
		show_addl_responses();
	}

});
