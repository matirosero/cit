<?php

add_filter( '404_template', 'mro_cit_redirect_old_urls' );

function mro_cit_redirect_old_urls( $template ) {
    global $wp_rewrite, $wp_query;

    if ( is_404() ) {

        $slug = get_query_var( 'name' );

        if( preg_match( '/^(.*)%c3%a1|%c3%a9|%c3%ad|%c3%b3|%c3%ba|%c3%b1|%c2%a1|%c2%bf(.*)$/ui', $slug)) {

		    //Better to use filter_input(INPUT_SERVER, 'REQUEST_URI') OR esc_url($_SERVER['REQUEST_URI']) ??

		    $url = filter_input(INPUT_SERVER, 'REQUEST_URI');

		    $matches = array();
		    preg_match('/^[\/]{1}([informes|evento]*)[\/]{1}/', $url, $matches);

		    $redirect_url = '/';

		    if ( !empty( $matches) ) {
		    	$redirect_url = $matches[0];
		    }

		    $find = array(
		    	'/\%c3%a1/u',	//á
		    	'/\%c3%a9/u',	//é
		    	'/\%c3%ad/u',	//í
		    	'/\%c3%b3/u',	//ó
		    	'/\%c3%ba/u',	//ú
		    	'/\%c3%b1/u',	//ñ
		    	'/\%c2%a1/u',	//¡
		    	'/\%c2%bf/u'	//¿
		    );

		    $replace = array(
		    	'a',
		    	'e',
		    	'i',
		    	'o',
		    	'u',
		    	'n',
		    	'',
		    	''
		    );

		    $new_slug = preg_replace($find, $replace, $slug);

		    $redirect_url .= $new_slug.'/';

		    wp_redirect( $redirect_url, 301 );
		    exit;

		}

        return $template;
    }
}