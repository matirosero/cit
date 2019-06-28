<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    /*
     * TEMP SCRIPTS
     */
    // wp_enqueue_script( 'load-tab-content-js', get_template_directory_uri() . '/assets/js/mro-load-tab-content.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'reload-eq', get_template_directory_uri() . '/assets/js/mro-reload-eq.js', array( 'jquery' ), '', true );

    wp_enqueue_script( 'toggle-fields', get_template_directory_uri() . '/assets/js/mro-toggle-fields.js', array( 'jquery' ), '', true );

    /*
     * Google Fonts
     *
     * font-family: 'Roboto Slab', serif; 400 700
     * font-family: 'Libre Franklin', sans-serif; 900
     * font-family: 'Open Sans', sans-serif; 400 700
     */
    // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Franklin:900|Open+Sans:400,700|Roboto+Slab:400,700', false );
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);