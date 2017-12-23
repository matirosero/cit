<?php

/*
 * Add RSVP to events, depending on user capabilities.
 */
function mro_cit_rsvp_form() {
    if ( current_user_can( 'rsvp_event' ) || current_user_can( 'buy_event_tickets' )) :
    	echo '<h3>Confirme su asistencia</h3>';
    endif;

    if ( current_user_can( 'rsvp_event' ) ) :
	    echo '<p>Llene este formulario, o comuníquese con Leda Mora, teléfono 2223-5923, fax 2223-1997, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a></p>'
	    	.do_shortcode( '[caldera_form id="CF5a1708a8ae022"]' );
	elseif ( current_user_can( 'buy_event_tickets' ) ) :
		echo '<p class="callout primary small">Los Afiliados Personales tienen la posibilidad de adquirir entradas a los eventos del Club. Llene este formulario y nos comunicaremos con más detalles.</p>'
			.do_shortcode( '[caldera_form id="CF5a222f8dca7c7"]' );
	elseif ( members_current_user_has_role( 'afiliado_enterprise_pendiente' ) ) :
		echo '<h3>Adquiera entradas al evento</h3>';
		echo '<p class="callout warning small">Aún está pendiente finalizar su afiliación. Comuníquese con Leda Mora, teléfono 2223-5923, fax 2223-1997, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a> si desea asistir al evento.</p>';
	else:
		echo '<p class="callout primary small">Si es afiliado, ingrese a su cuenta para confirmar su asistencia.</p>'
			.do_shortcode( '[members_login_form] ' );
	endif;
}
// remain same
add_action('tribe_events_single_event_after_the_content','mro_cit_rsvp_form');