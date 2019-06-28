jQuery(document).ready(function($) {

	var target;

	$('input[type=radio][name=mro_cit_user_membership]').change(function() {
	    console.log('change');

	    target = $(this).data('toggle');
	    console.log('target = '+target);

	    $('[data-showfor][aria-hidden="false"]').attr('aria-hidden', 'true');

	    $('[data-showfor="'+target+'"]').attr('aria-hidden', 'false');

	});

});