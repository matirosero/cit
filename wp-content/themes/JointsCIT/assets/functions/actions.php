<?php

// passing variable by reference
function mro_cit_rsvp_form() {
    echo '<h3>Confirme su asistencia</h3>';

    if ( current_user_can( 'rsvp_event' ) ) :
	    echo '<p>Llene este formulario, o comuníquese con Leda Mora, teléfono 2223-5923, fax 2223-1997, correo leda@clubdeinvestigacion.com</p>'
	    	.do_shortcode( '[caldera_form id="CF5a1708a8ae022"]' );
	else:
		echo '<p class="callout alert">Debe ser afiliado e ingresar a su cuenta para descargar el informe.</p>'
			.do_shortcode( '[members_login_form] ' );
	endif;
}
// remain same
add_action('tribe_events_single_event_after_the_content','mro_cit_rsvp_form');