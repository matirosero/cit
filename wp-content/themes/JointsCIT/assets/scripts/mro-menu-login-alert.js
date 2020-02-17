jQuery(document).ready(function($) {

	var menuLoginAlert = $('.top-bar .login .alert'),
		closeButton = '<button class="close-button" aria-label="Close alert" type="button" data-close><span aria-hidden="true">&times;</span></button>';


	menuLoginAlert.detach().attr('id', 'alert-login-failed').prepend(closeButton).prependTo('body');

});