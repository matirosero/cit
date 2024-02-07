<?php

/*
 * Add RSVP to events, depending on user capabilities,
 * or on Mailchimp URL parameters.
 */
function mro_cit_rsvp_form() {

    if ( !tribe_is_past_event() && ( get_post_meta( get_the_ID(), 'cit_event_include_rsvp', 1 ) || get_post_meta( get_the_ID(), 'mro_cit_event_include_rsvp', true ) == 'on' ) ) :

		echo '<div id="reserve">';
        echo '<h3>Confirme su asistencia</h3>';



		// If link contains invitee info
		if ( isset( $_GET['email']) ) {

			// If in person event
			if ( get_post_meta(get_the_ID(), 'cit_event_in-person', 1 ) ) {

				$form_shortcode_remote =  get_field('cit_shortcode_credentials_remote', 'option');
				$form_shortcode_inperson =  get_field('cit_shortcode_credentials_in-person', 'option');

                //If special forms
                if ( get_field('cit_event_choose_forms') ) {
                    $form_shortcode_inperson = '[[ninja_form id=10]]';
                }

                

                echo '<p class="callout primary small">Llene este formulario para <strong>asistir al evento</strong> o comuníquese con Leda Mora, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a>.</p>';

                if ( get_post_meta( get_the_ID(), 'cit_event_no_online',1 ) == 1 || get_post_meta( get_the_ID(),'cit_event_request_remote',1 ) != 1  ) {
                    echo '<style>#nf-field-36-container, #fld_1470598_1-wrap .checkbox {display:none;}</style>';
                }

                echo do_shortcode( $form_shortcode_inperson );

			// Remote
			} else {

				if ( get_field('cit_shortcode_credentials_remote', 'option') ) {
					$form_shortcode = get_field('cit_shortcode_credentials_remote', 'option');
				} 
				
				echo '<p class="callout primary small">Llene este formulario para reservar el espacio o comuníquese con Leda Mora, correo <a href="mailto:leda@clubdeinvestigacion.com">leda@clubdeinvestigacion.com</a>.</p>';
				echo do_shortcode( $form_shortcode );

			}

        //Solo empresariales, no vienen parametros correo    
		} elseif ( get_field('cit_event_empresariales_only') ) {
			echo '<p class="callout primary small">Lo sentimos, este evento es solo para afiliados empresariales.</p>';

		// Logged in
		} elseif ( (current_user_can( 'buy_event_tickets' ) || current_user_can( 'rsvp_event') ) ) {


			if (get_post_meta(get_the_ID(), 'cit_event_no_online',1) == 1) {
				echo '<p>Lo sentimos, este evento es solo para afiliados empresariales.</p>';
			} else {
				$form_shortcode_personal = get_field('cit_shortcode_loggedin', 'option');



				if (get_post_meta(get_the_ID(), 'cit_event_request_remote_personales',1) == 1) {
					$form_shortcode_personal = get_field('cit_shortcode_loggedin_hybrid', 'option');
				}

				//If special forms
				if ( get_field('cit_event_choose_forms') ) {
					$form_shortcode_personal = '[[ninja_form id=8]]';
				}

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

        echo '</div>';



		// endif;
	endif;


}
// remain same
add_action('tribe_events_single_event_after_the_content','mro_cit_rsvp_form');


