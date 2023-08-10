<?php



/*
 * Add RSVP to events, depending on user capabilities,
 * or on Mailchimp URL parameters.
 */
function mro_cit_rsvp_form() {

    if ( !tribe_is_past_event() && ( get_post_meta( get_the_ID(), 'cit_event_include_rsvp', 1 ) || get_post_meta( get_the_ID(), 'mro_cit_event_include_rsvp', true ) == 'on' ) ) :


		echo '<h3>Confirme su asistencia</h3>';

		// If link contains invitee info
		if ( isset( $_GET['email']) ) {

			// If in person event
			if ( get_post_meta(get_the_ID(), 'cit_event_in-person', 1 ) ) {

				$form_shortcode_remote =  get_field('cit_shortcode_credentials_remote', 'option');
				$form_shortcode_inperson =  get_field('cit_shortcode_credentials_in-person', 'option');

				?>


					<?php
					echo '<p class="callout primary small">Llene este formulario para <strong>asistir al evento</strong> o comuníquese con Leda Mora, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a>.</p>';

					
	
					if ( get_post_meta( get_the_ID(), 'cit_event_no_online',1 ) == 1 || get_post_meta( get_the_ID(),'cit_event_request_remote',1 ) != 1  ) {
						echo '<style>#fld_1470598_1-wrap .checkbox {display:none;}</style>';
					}


					echo do_shortcode( $form_shortcode_inperson );
					?>

				<?php
			
			// Remote
			} else {

				if ( get_field('cit_shortcode_credentials_remote', 'option') ) {
					$form_shortcode = get_field('cit_shortcode_credentials_remote', 'option');
				} 
				
				echo '<p class="callout primary small">Llene este formulario para reservar el espacio o comuníquese con Leda Mora, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a>.</p>';
				echo do_shortcode( $form_shortcode );

			}

		// Logged in
		} elseif ( current_user_can( 'buy_event_tickets' ) || current_user_can( 'rsvp_event' ) ) {


			if (get_post_meta(get_the_ID(), 'cit_event_no_online',1) == 1) {
				echo '<p>Lo sentimos, este evento es solo para afiliados empresariales.</p>';
			} else {
				$form_shortcode_personal = get_field('cit_shortcode_loggedin', 'option');
	
				echo '<p class="callout primary small">Llene este formulario para inscribirse a la transimisión del evento.</p>';
	
				echo do_shortcode( $form_shortcode_personal );
			}


		// Logged out but public event
		} elseif ( get_field('cit_public_event') ) {

			echo '<h3>Confirme su asistencia</h3>';

			echo '<p class="callout warning small">Puede registrarse para recibir el enlace, pero para ver el evento deberá registrarse en el sitio.</p>';
	
			// echo '<p class="callout primary small">Llene este formulario para inscribirse a la transimisión del evento.</p>';
			echo do_shortcode( get_field('cit_shortcode_open', 'option') );

		//Logged out, no info
		} else {

			echo '<p class="callout warning small">Debe ingresar al sitio para inscribirse en el evento.</p>';

		}







		// endif;
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