<?php
/*
 * Past events list in reverse chronological order
 */
// Changes past event views to reverse chronological order
function mro_cit_past_reverse_chronological ($post_object) {

	$past_ajax = (defined( 'DOING_AJAX' ) && DOING_AJAX && $_REQUEST['tribe_event_display'] === 'past') ? true : false;

	if(tribe_is_past() || $past_ajax) {
		$post_object = array_reverse($post_object);
	}

	return $post_object;
}
add_filter('the_posts', 'mro_cit_past_reverse_chronological', 100);


/*
 * Remove filters from tribe events bar
 */
add_filter( 'tribe-events-bar-filters',  'mro_cit_remove_search_from_bar', 1000, 1 );
function mro_cit_remove_search_from_bar( $filters ) {
  	if ( isset( $filters['tribe-bar-geoloc'] ) ) {
        unset( $filters['tribe-bar-geoloc'] );
    }

    return $filters;
}


/*
 * Set up year filter in bar
 */
add_filter( 'tribe-events-bar-filters',  'mro_cit_setup_year_field_in_bar', 1, 1 );
function mro_cit_setup_year_field_in_bar( $filters ) {
    $filters['tribe-bar-year-field'] = array(
        'name' => 'tribe-bar-year-field',
        'caption' => 'Year',
        'html' => '<input type="text" name="tribe-bar-year-field" id="tribe-bar-year-field">'
    );

    return $filters;
}


add_filter( 'tribe_events_pre_get_posts', 'setup_tribe_field_in_query', 10, 1 );
 
function setup_tribe_field_in_query( $query ){
    if ( !empty( $_REQUEST['tribe-bar-year-field'] ) ) {

		$year = $_REQUEST['tribe-bar-year-field'];
		$year = (int)$year;

	    //Check that input is a year
	    if ( $year>1000 && $year<2100 ) {
	      	write_log($year.' is a year!');
	    } else {
	    	write_log($year.' is NOT a year!');
	    }
        // do stuff
    }
 
    return $query;
}


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
			.do_shortcode( '[login_form] ' );
	endif;
}
// remain same
add_action('tribe_events_single_event_after_the_content','mro_cit_rsvp_form');