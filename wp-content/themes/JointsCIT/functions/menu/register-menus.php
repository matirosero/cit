<?php
// Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'jointswp' ),   // Main nav in header
        'main-tablet-nav' => __( 'The Main Menu for Tablets', 'jointswp' ),   // Main nav in header
        'sidebar-nav' => __( 'The Sidebar Menu', 'jointswp' ),   // Main nav in header
        'mobile-nav' => __( 'The Mobile/Offcanvas Menu', 'jointswp' ),   // Main nav in header
		'footer-links' => __( 'Footer Links', 'jointswp' ) // Secondary nav in footer
	)
);