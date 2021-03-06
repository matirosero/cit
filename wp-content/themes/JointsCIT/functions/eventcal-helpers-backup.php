<?php



/*
 * Add RSVP to events, depending on user capabilities,
 * or on Mailchimp URL parameters.
 */
function mro_cit_rsvp_form() {

    if ( !tribe_is_past_event() && get_post_meta( get_the_ID(), 'mro_cit_event_include_rsvp', true ) == 'on' ) :


    	$match_mailchimp_url = false;


		if ( isset( $_GET['user'] ) && isset( $_GET['email'] ) && isset( $_GET['guestname'] ) ) {

			// echo '0. yes, all 3 values exist:<br />';


			// Sanitize values
			$email = sanitize_email( $_GET['email'] );
			$username = sanitize_user( $_GET['user'] );
			$name = sanitize_text_field( $_GET['guestname'] );

			// echo '0.1 email: '.$email.'<br />
			// 	0.2 username: '.$username.'<br />
			// 	0.3 name: "'.$name.'"<br /><br />';


			if ( username_exists( $username ) && is_email( $email ) ) {

				// echo '1. yes, sanitized email is email and sanitized username exists<br />';


				// Get user ID
				$user_id = username_exists( $username );
				// echo '2. user id: '.$user_id.'</br>';

				//Get user
				$user = get_userdata( $user_id );


				$compare_name = trim( esc_html( $user->user_firstname ).' '.esc_html( $user->user_lastname ) );
				$compare_email = esc_html( $user->user_email );

				// echo '2.1 compare name to: "'.$compare_name.'"<br />';
				// echo '2.2 compare email to: '.$compare_email.'<br /><br />';


				// Compare to main contact
				if ( $email == $compare_email && $name == $compare_name ) {

					// echo '3. YES IT MATCHES, WE ARE DONE<br />';

					// Change match to true
					$match_mailchimp_url = true;

				} elseif ( get_user_meta( $user_id, 'mro_cit_user_additional_contacts' ) ) {

					// Additional contacts exist
					// echo '3. No match but there are additional contacts, go on to additional contacts<br /><br />';


					// Get additional contacts
					$additional_contacts = get_user_meta( $user_id, 'mro_cit_user_additional_contacts', true );

					// echo '4. Additional contacts: <pre>';
					// var_dump($additional_contacts);
					// echo '</pre><br />';

					// echo '4.1. Compare '.$email.' to...<br />';


					// Check that email is in array, return key
					if ( in_array( $email, array_column( $additional_contacts, 'email' ) ) ) {

						// echo '5. email is in array of contacts:<br />';

						// Get key for contact that matches email
						$key = array_search( $email, array_column( $additional_contacts, 'email' ) );

						// echo '5.1 key is '.$key.'<br />';

						// echo '5.2. Additional contacts: <pre>';
						// var_dump($additional_contacts[$key]);
						// echo '</pre><br />';


						// Get values to compare to
						$compare_name = trim( esc_html( $additional_contacts[$key]['name'] ).' '.esc_html( $additional_contacts[$key]['lastname'] ) );

						// echo '5.3. Compare "'.$name.'" to: "'.$compare_name.'"<br /><br />';


						if ( $name == $compare_name ) {

							// echo '6. YES IT MATCHES, WE ARE DONE<br />';

							// Change match to true
							$match_mailchimp_url = true;
						}
					} else {
						// echo 'NOT IN ARAY';
					}
				} else {
					// echo '3. no additional contacts';
				}
			} elseif ( $username == md5( 'cortesia' ) ) {

				// echo '1. Courtesy/temporary invitation!';
				// Change match to true
				$match_mailchimp_url = true;
			}
		}


	    if ( current_user_can( 'rsvp_event' ) || current_user_can( 'buy_event_tickets' ) || $match_mailchimp_url ) :
	    	echo '<h3>Confirme su asistencia</h3>';
	    endif;


	    if ( current_user_can( 'rsvp_event' ) || $match_mailchimp_url ) :
		    echo '<p>Llene este formulario, o comuníquese con Leda Mora, teléfono 2223-5923, fax 2223-1997, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a></p>';

		    if ( members_current_user_has_role( 'afiliado_empresarial' ) || members_current_user_has_role( 'afiliado_institucional' ) ) :

		    	echo do_shortcode( '[caldera_form id="CF5a1708a8ae022"]' );

			elseif ( $match_mailchimp_url ) :

				// THIS WILL NEED TO BE UPDATED!!!!!

				echo do_shortcode( '[caldera_form id="CF5bb303fed777a"]' );

		    else:

		    	echo do_shortcode( '[caldera_form id="CF5a7b293be0d36"]' );

		    endif;

		elseif ( current_user_can( 'buy_event_tickets' ) ) :
			echo '<p class="callout primary small">Los Afiliados Personales tienen la posibilidad de adquirir entradas a los eventos del Club. Llene este formulario y nos comunicaremos con más detalles.</p>
				<p class="callout primary small">Su información se llena automáticamente en el formulario. <strong>Si su nombre no aparece, debe completar sus datos antes de enviar el formulario.</strong></p>'
				.do_shortcode( '[caldera_form id="CF5a222f8dca7c7"]' );
		elseif ( members_current_user_has_role( 'afiliado_empresarial_pendiente' ) || members_current_user_has_role( 'afiliado_institucional_pendiente' ) ) :
			echo '<h3>Adquiera entradas al evento</h3>';
			echo '<p class="callout warning small">Aún está pendiente finalizar su afiliación. Comuníquese con Leda Mora, teléfono 2223-5923, fax 2223-1997, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a> si desea asistir al evento.</p>';
		else:
			echo '<p class="callout primary small">Si es afiliado, ingrese a su cuenta para confirmar su asistencia.</p>'
				.do_shortcode( '[login_form] ' );
		endif;
	endif;
}
// remain same
add_action('tribe_events_single_event_after_the_content','mro_cit_rsvp_form');


/*
 * Past events list in reverse chronological order
 */
// Changes past event views to reverse chronological order
// function mro_cit_past_reverse_chronological ($post_object) {

// 	$past_ajax = (defined( 'DOING_AJAX' ) && DOING_AJAX && $_REQUEST['tribe_event_display'] === 'past' ) ? true : false;

// 	if(tribe_is_past() || $past_ajax || !empty( $_REQUEST['tribe-bar-year-field'] ) ) {
// 		$post_object = array_reverse($post_object);
// 	}

// 	return $post_object;
// }
// add_filter('the_posts', 'mro_cit_past_reverse_chronological', 100);


/*
 * Remove filters from tribe events bar
 */
add_filter( 'tribe-events-bar-filters',  'mro_cit_remove_geo_from_bar', 1000, 1 );
function mro_cit_remove_geo_from_bar( $filters ) {
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
    $filters = array_reverse($filters);
    $filters['tribe-bar-year-field'] = array(
        'name' => 'tribe-bar-year-field',
        'caption' => __( 'Events by year', 'jointswp' ),
        'html' => '<input type="text" name="tribe-bar-year-field" id="tribe-bar-year-field" placeholder="'.date('Y').'">'
    );

    return $filters;
}


/*
 * Handle Year filter
 */
add_filter( 'tribe_events_pre_get_posts', 'mro_cit_setup_year_field_in_query', 10, 1 );
function mro_cit_setup_year_field_in_query( $query ){
    if ( !empty( $_REQUEST['tribe-bar-year-field'] ) ) {

		$year = $_REQUEST['tribe-bar-year-field'];
		$year = (int)$year;

	    //Check that input is a year
	    if ( $year>1000 && $year<2100 ) {
	      	// write_log($year.' is a year!');

	      	$first_date = $_REQUEST['tribe-bar-year-field'].'-01-01 00:00:00';
	      	$second_date = $_REQUEST['tribe-bar-year-field'].'-12-31 23:59:59';
	      	// write_log($date);

	        //https://theeventscalendar.com/knowledgebase/set-calendar-to-show-specific-month/ Look here

		    // Change this to whatever date you prefer
		    $default_date = $first_date;
		    // Use the preferred default date
		    $query->set( 'eventDate', $default_date );
		    $query->set( 'start_date', $default_date );
		    $query->set( 'end_date', $second_date );
		    $_REQUEST['tribe-bar-date'] = $default_date;
		    // $query->set( 'eventDate', $_REQUEST['tribe-bar-date'] );
		    // $query->set( 'eventDisplay', $query->get( 'eventDisplay', Tribe__Events__Main::instance()->displaying ) );

		    // $query->set( 'order', 'ASC' );

		    // $query->set( 'posts_per_page', (int) tribe_get_option( 'postsPerPage', -1 ) );

		    $query->set( 'posts_per_page', -1 );


	    }
    }

    return $query;
}


/*
 * Modify events title
 */
add_filter( 'tribe_get_events_title', 'mro_cit_tribe_modify_events_title', 10, 2 );
function mro_cit_tribe_modify_events_title( $title, $depth ) {

	global $wp_query;

	$events_label_plural = tribe_get_event_label_plural();

	if ( $wp_query->get( 'featured' ) ) {
		$events_label_plural = sprintf( _x( 'Featured %s', 'featured events title', 'the-events-calendar'), $events_label_plural );
	}

	$tribe_ecp = Tribe__Events__Main::instance();

	if ( is_single() && tribe_is_event() ) {
		// For single events, the event title itself is required
		$title = get_the_title();
	} else {
		// For all other cases, start with 'upcoming events'
		$title = sprintf( esc_html__( 'Upcoming %s', 'the-events-calendar' ), $events_label_plural );
	}


	// If there's a date selected in the tribe bar, show the date range of the currently showing events

	// MRo edit for Year filter
	if ( isset( $_REQUEST['tribe-bar-year-field'] ) && $wp_query->have_posts() ) {

		$year = $_REQUEST['tribe-bar-year-field'];

		$title = sprintf( __( '%1$s for %2$s', 'jointswp' ), $events_label_plural, $year );

	// End MRo edit (originally if statemente starts here)
	} elseif ( isset( $_REQUEST['tribe-bar-date'] ) && $wp_query->have_posts() ) {
		$first_returned_date = tribe_get_start_date( $wp_query->posts[0], false, Tribe__Date_Utils::DBDATEFORMAT );
		$first_event_date    = tribe_get_start_date( $wp_query->posts[0], false );
		$last_event_date     = tribe_get_end_date( $wp_query->posts[ count( $wp_query->posts ) - 1 ], false );
		// If we are on page 1 then we may wish to use the *selected* start date in place of the
		// first returned event date
		if ( 1 == $wp_query->get( 'paged' ) && $_REQUEST['tribe-bar-date'] < $first_returned_date ) {
			$first_event_date = tribe_format_date( $_REQUEST['tribe-bar-date'], false );
		}
		$title = sprintf( __( '%1$s for %2$s - %3$s', 'the-events-calendar' ), $events_label_plural, $first_event_date, $last_event_date );
	} elseif ( tribe_is_past() ) {
		$title = sprintf( esc_html__( 'Past %s', 'the-events-calendar' ), $events_label_plural );
	}
	if ( tribe_is_month() ) {
		$title = sprintf(
			esc_html_x( '%1$s for %2$s', 'month view', 'the-events-calendar' ),
			$events_label_plural,
			date_i18n( tribe_get_date_option( 'monthAndYearFormat', 'F Y' ), strtotime( tribe_get_month_view_date() ) )
		);
	}
	// day view title
	if ( tribe_is_day() ) {
		$title = sprintf(
			esc_html_x( '%1$s for %2$s', 'day_view', 'the-events-calendar' ),
			$events_label_plural,
			date_i18n( tribe_get_date_format( true ), strtotime( $wp_query->get( 'start_date' ) ) )
		);
	}
	if ( is_tax( $tribe_ecp->get_event_taxonomy() ) && $depth ) {
		$cat = get_queried_object();
		$title = '<a href="' . esc_url( tribe_get_events_link() ) . '">' . $title . '</a>';
		$title .= ' &#8250; ' . $cat->name;
	}
	return $title;
}