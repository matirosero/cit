<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function mro_cit_theme_functions_register_shortcodes() {
    add_shortcode('junta', 'mro_cit_board_members');
    add_shortcode('afiliados', 'mro_cit_list_members');
    add_shortcode('tabla-afiliacion', 'mro_cit_membership_table');
}
add_action( 'init', 'mro_cit_theme_functions_register_shortcodes' );


/*
 * List board members
 * - [afiliados]
 *
 * Returns list of board members
 */
function mro_cit_list_members($atts) {
    global $wp_query,
        $post;

    /*
     * The WordPress Query class.
     *
     * @link http://codex.wordpress.org/Function_Reference/WP_Query
     */

    extract(shortcode_atts(array(
        'roles' => array(
            'afiliado_empresarial',
            'afiliado_institucional'
        ),
    ), $atts));

    $args = array(
        'role__in'  => $roles,
        'orderby'   => 'display_name',
        'order'     => 'ASC'
    );
    $users = get_users( $args );


    $return = '<ul class="members-list">';

    foreach ( $users as $user ) {
        $return .= '<li>' . esc_html( esc_html( $user->nickname ) ) . '</li>';
    }

    $return .= '</ul>';

    return $return;
}

/*
 * Show membership options
 * - [tabla-afiliacion]
 *
 * Returns membership options table
 */
function mro_cit_membership_table($atts) {

    $personal = get_permalink( get_page_by_title( 'Afiliación Personal' ) );
    $empresarial = get_permalink( get_page_by_title( 'Afiliación Empresarial' ) );
    $institucional = get_permalink( get_page_by_title( 'Afiliación Institucional' ) );

    $content = '<div class="pricing grid-x grid-padding-x small-up-1 xxlarge-up-3" data-equalizer="pricing" data-equalize-on="large">
    <div class="cell">
        <div class="pricing-option">
            <header class="pricing-header">
                <h2>Institucional</h2>

                <div class="cd-price">
                    <span>$900</span>
                    <span>año</span>
                </div>
            </header> <!-- .cd-pricing-header -->

            <div class="cd-pricing-features" data-equalizer-watch="pricing">
                <ul>
                    <li class="available">Boletín informativo</li>
                    <li class="available">Descargar informes</li>
                    <li class="available">3 asistentes de la institución a eventos del Club</li>
                    <li class="available">Acceso remoto a eventos (streaming)</li>
                </ul>
            </div> <!-- .cd-pricing-features -->

            <footer class="cd-pricing-footer">
                <a href="'.$institucional.'" class="button">Escoger</a>
            </footer> <!-- .cd-pricing-footer -->
        </div>
    </div>

    <div class="cell">
        <div class="pricing-option">
            <header class="pricing-header">
                <h2>Empresarial</h2>

                <div class="cd-price">
                    <span>$650</span>
                    <span>año</span>
                </div>
            </header> <!-- .cd-pricing-header -->

            <div class="cd-pricing-features" data-equalizer-watch="pricing">
                <ul>
                    <li class="available">Boletín informativo</li>
                    <li class="available">Descargar informes</li>
                    <li class="available">2 asistentes de la empresa a eventos del Club</li>
                    <li class="available">Acceso remoto a eventos (streaming)</li>
                </ul>
            </div> <!-- .cd-pricing-features -->

            <footer class="cd-pricing-footer">
                <a href="'.$empresarial.'" class="button">Escoger</a>
            </footer> <!-- .cd-pricing-footer -->
        </div>
    </div>

    <div class="cell">
        <div class="pricing-option">
            <header class="pricing-header">
                <h2>Personal</h2>

                <div class="cd-price">
                    <span>Gratis</span>
                </div>
            </header> <!-- .cd-pricing-header -->

            <div class="cd-pricing-features" data-equalizer-watch="pricing">
                <ul>
                    <li class="available">Boletín informativo</li>
                    <li class="available">Descargar informes</li>
                    <li class="available">Puede comprar entradas a eventos del Club</li>
                    <!-- <li class="unavailable">Acceso remoto a eventos (streaming)</li> -->
                </ul>
            </div> <!-- .cd-pricing-features -->

            <footer class="cd-pricing-footer">
                <a href="'.$personal.'" class="button">Escoger</a>
            </footer> <!-- .cd-pricing-footer -->
        </div>
    </div>

    </div>';

    return $content;
}

/*
 * List board members
 * - [junta]
 *
 * Returns list of board members
 */
function mro_cit_board_members($atts) {
    global $wp_query,
        $post;

    /*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		// Type & Status Parameters
		'post_type'   => 'cit_board_members',
		'post_status' => 'publish',

		// Order & Orderby Parameters
		'order'               => 'DESC',
		// 'orderby'             => 'name',
		'posts_per_page'         => -1,

		// Parameters relating to caching
		'cache_results'          => true,
		'update_post_term_cache' => true,
		'update_post_meta_cache' => true,

	);

    $query = new WP_Query( $args );

    if( ! $query->have_posts() ) :
        return false;
    else :
    	$content = '<div class="grid-x grid-padding-x small-up-2 medium-up-3 large-up-3">';

		while( $query->have_posts() ) : $query->the_post();

            $content .= '<div class="profile-block cell">
            	<a href="' . get_permalink() . '" class="profile-image">'.
            	get_the_post_thumbnail($post->ID,'thumbnail').'</a>
            	<h3 class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';

            if ( get_post_meta( $post->ID, 'mro_cit_board_member_position', true ) ) :
            	$content .= '<div class="profile-meta"><span class="profile-position">'.get_post_meta( $post->ID, 'mro_cit_board_member_position', true ) .'</span></div>';
            endif;

            	$content .= '</div>';

        endwhile;

        $content .= '<div>';

        wp_reset_postdata();

		return $content;
    endif;
}