<?php
/**
 * Display metabox for only certain user roles.
 * @author @Mte90
 * @link   https://github.com/CMB2/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param  bool  $display  Whether metabox should be displayed or not.
 * @param  array $meta_box Metabox config array
 * @return bool            (Modified) Whether metabox should be displayed or not.
 */
function mro_cit_cmb_show_meta_for_chosen_roles( $display, $meta_box ) {
	
	//User ID being edited
	global $user_id;

	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'role' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	// $user = wp_get_current_user();
	$user = get_userdata($user_id);
	// var_dump(wp_get_current_user());
	

	// No user found, return
	if ( empty( $user ) ) {
		return false;
	}

	$roles = (array) $meta_box['show_on']['value'];

	foreach ( $user->roles as $role ) {
		// Does user have role.. check if array
		if ( is_array( $roles ) && in_array( $role, $roles ) ) {
			return true;
		}
	}

    return false;
}
add_filter( 'cmb2_show_on', 'mro_cit_cmb_show_meta_for_chosen_roles', 10, 2 );