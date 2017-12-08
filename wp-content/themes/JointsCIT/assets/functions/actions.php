<?php

/*
 * Add RSVP to events, depending on user capabilities.
 */
function mro_cit_rsvp_form() {
    echo '<h3>Confirme su asistencia</h3>';

    if ( current_user_can( 'rsvp_event' ) ) :
	    echo '<p>Llene este formulario, o comuníquese con Leda Mora, teléfono 2223-5923, fax 2223-1997, correo leda@clubdeinvestigacion.com</p>'
	    	.do_shortcode( '[caldera_form id="CF5a1708a8ae022"]' );
	elseif ( is_user_logged_in() ) :
		echo '<p class="callout primary small">Los Afiliados Personales tienen la posibilidad de adquirir entradas a los eventos del Club. Llene este formulario y nos comunicaremos con más detalles.</p>'
			.do_shortcode( '[caldera_form id="CF5a222f8dca7c7"]' );
	else:
		echo '<p class="callout primary">Si es Afiliado Enterprise, ingrese a su cuenta para confirmar su asistencia.</p>'
			.do_shortcode( '[members_login_form] ' );
	endif;
}
// remain same
add_action('tribe_events_single_event_after_the_content','mro_cit_rsvp_form');