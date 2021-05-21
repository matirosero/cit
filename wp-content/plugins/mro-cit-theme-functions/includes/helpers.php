<?php
/**
 * Helpers.
 *
 * @since 0.1.0
 */


/**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function cmb2_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}


// Change sender name and email

// Function to change email address
 
function mro_cit_sender_email( $original_email_address ) {
    return 'info@clubdeinvestigacion.com';
}
 
// Function to change sender name
function mro_cit_sender_name( $original_email_from ) {
    return 'Club de Investigación Tecnológica';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'mro_cit_sender_email' );
add_filter( 'wp_mail_from_name', 'mro_cit_sender_name' );



/*
 * Include CPT in certain archives
 */
function custom_post_type_cat_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    //Include categories Programa Estándares Tics (9), Costa Rica Digital (16) y Ensayos Técnicos (7)
    if ($query->is_category( array( 9, 16, 7 ) ) ) {
      $query->set( 'post_type', array( 'post', 'cit_archive' ) );
    }
  }
}

add_action('pre_get_posts','custom_post_type_cat_filter');

/*
 * Exclude categories from frontpage
 */
function mro_cit_exclude_category( $query ) {
    // If it's home, or if it's cat archive Publicaciones (13) o Noticias (15)
    if ( ( $query->is_home() && $query->is_main_query() ) || ( $query->is_category( array( 15, 13 ) ) && $query->is_main_query() ) ) {
        // exclude categories Uncategorized(1) or No date (115)
        $query->set( 'cat', '-1, -115' );

        //Exclude tax
        $query->set( 'tax_query', array(
        	array(
	            'taxonomy' => 'mro_cit_problem',
	            'field' => 'id',
	            'terms' => array (
	            	'115',
	            	'114',
	            ),
	            'operator' => 'NOT IN'
        	)
        ) );
    }
}
add_action( 'pre_get_posts', 'mro_cit_exclude_category' );


/*
 * Exclude posts not from db src content from past event archive
 */
function mro_cit_events_archive_exclude( $query ) {

	if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'cit_past_event' ) ) {

		//Don't show events that come from content DB
		$taxquery = array(
	        array(
				'taxonomy' => 'mro_cit_db_src',
				'field'    => 'slug',
				'terms'    => 'src-content',
				'operator' => 'NOT IN'
	        )
	    );
	    $query->set( 'tax_query', $taxquery );

	}

}
add_action( 'pre_get_posts', 'mro_cit_events_archive_exclude' );


/*
 * Reports: show all reports on one page
 */
function mro_cit_report_archive_pre_get_posts( $query ) {

	if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'cit_report' ) ) {

	    $query->set( 'order', 'ASC' );
	    $query->set( 'posts_per_page', -1 );

	}

}
add_action( 'pre_get_posts', 'mro_cit_report_archive_pre_get_posts' );


/*
 * Reverse past events order
 */
// function mro_cit_events_archive_reverse( $query ) {

// 	if( $query->is_main_query() && !is_admin() && ( is_post_type_archive( 'cit_past_event' ) || is_post_type_archive( 'cit_report' ) ) ) {

// 		$query->set( 'order', 'ASC' );
// 		$query->set( 'orderby', 'title' );
// 	}
// }
// add_action( 'pre_get_posts', 'mro_cit_events_archive_reverse' );


/*
 * Show other post types in author archives
 */
function mro_cit_custom_post_author_archive($query) {
    if ($query->is_author)
        $query->set( 'post_type', array('cit_report', 'post') );
    remove_action( 'pre_get_posts', 'custom_post_author_archive' );
}
add_action('pre_get_posts', 'mro_cit_custom_post_author_archive');



function countries_plain() {
	$array = array();
	$countries = country_list();
	foreach ($countries as $country) {
		$array[] = $country;
	}
	return $array;
}

function country_list() {
	$countries = array(
		'Costa Rica' => 'Costa Rica',
		'Afghanistan' => 'Afghanistan',
		'Albania' => 'Albania',
		'Algeria' => 'Algeria',
		'Angola' => 'Angola',
		'Argentina' => 'Argentina',
		'Armenia' => 'Armenia',
		'Azerbaijan' => 'Azerbaijan',
		'Bahrain' => 'Bahrain',
		'Bangladesh' => 'Bangladesh',
		'Barbados' => 'Barbados',
		'Belarus' => 'Belarus',
		'Belgium' => 'Belgium',
		'Benin' => 'Benin',
		'Bhutan' => 'Bhutan',
		'Bolivia' => 'Bolivia',
		'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
		'Botswana' => 'Botswana',
		'Brazil' => 'Brazil',
		'Bulgaria' => 'Bulgaria',
		'Burkina Faso' => 'Burkina Faso',
		'Burundi' => 'Burundi',
		'Cambodia' => 'Cambodia',
		'Cameroon' => 'Cameroon',
		'Cape Verde' => 'Cape Verde',
		'Central African Republic' => 'Central African Republic',
		'Chad' => 'Chad',
		'Chile' => 'Chile',
		'China' => 'China',
		'Colombia' => 'Colombia',
		'Comoros' => 'Comoros',
		'Croatia' => 'Croatia',
		'Cuba' => 'Cuba',
		'Cyprus' => 'Cyprus',
		'Denmark' => 'Denmark',
		'Djibouti' => 'Djibouti',
		'Dominican Republic' => 'Dominican Republic',
		'Ecuador' => 'Ecuador',
		'Egypt' => 'Egypt',
		'El Salvador' => 'El Salvador',
		'Equatorial Guinea' => 'Equatorial Guinea',
		'Eritrea' => 'Eritrea',
		'Ethiopia' => 'Ethiopia',
		'Fiji' => 'Fiji',
		'Gabon' => 'Gabon',
		'Gambia' => 'Gambia',
		'Georgia' => 'Georgia',
		'Ghana' => 'Ghana',
		'Guatemala' => 'Guatemala',
		'Guinea' => 'Guinea',
		'Guinea Bissau' => 'Guinea Bissau',
		'Guyana' => 'Guyana',
		'Haiti' => 'Haiti',
		'Honduras' => 'Honduras',
		'India' => 'India',
		'Indonesia' => 'Indonesia',
		'Iran' => 'Iran',
		'Iraq' => 'Iraq',
		'Jamaica' => 'Jamaica',
		'Japan' => 'Japan',
		'Jordan' => 'Jordan',
		'Kazakhstan' => 'Kazakhstan',
		'Kenya' => 'Kenya',
		'Kuwait' => 'Kuwait',
		'Kyrgyzstan' => 'Kyrgyzstan',
		'Latvia' => 'Latvia',
		'Laos' => 'Laos',
		'Lebanon' => 'Lebanon',
		'Lesotho' => 'Lesotho',
		'Liberia' => 'Liberia',
		'Libya' => 'Libya',
		'Lithuania' => 'Lithuania',
		'Madagascar' => 'Madagascar',
		'Malawi' => 'Malawi',
		'Malaysia' => 'Malaysia',
		'Maldives' => 'Maldives',
		'Mali' => 'Mali',
		'Mauritania' => 'Mauritania',
		'Mauritius' => 'Mauritius',
		'Mexico' => 'Mexico',
		'Moldova' => 'Moldova',
		'Mongolia' => 'Mongolia',
		'Montenegro' => 'Montenegro',
		'Morocco' => 'Morocco',
		'Mozambique' => 'Mozambique',
		'Myanmar' => 'Myanmar',
		'Namibia' => 'Namibia',
		'Nepal' => 'Nepal',
		'Nicaragua' => 'Nicaragua',
		'Niger' => 'Niger',
		'Nigeria' => 'Nigeria',
		'Norway' => 'Norway',
		'Pakistan' => 'Pakistan',
		'Palestinian Programme' => 'Palestinian Programme',
		'Panama' => 'Panama',
		'Papua New Guinea' => 'Papua New Guinea',
		'Paraguay' => 'Paraguay',
		'Peru' => 'Peru',
		'Philippines' => 'Philippines',
		'Romania' => 'Romania',
		'Russian Federation' => 'Russian Federation',
		'Rwanda' => 'Rwanda',
		'Samoa' => 'Samoa',
		'Sao Tome and Principe' => 'Sao Tome and Principe',
		'Saudi Arabia' => 'Saudi Arabia',
		'Senegal' => 'Senegal',
		'Servia' => 'Serbia',
		'Seychelles' => 'Seychelles',
		'Sierra Leone' => 'Sierra Leone',
		'Slovak Republic' => 'Slovak Republic',
		'Somalia' => 'Somalia',
		'South Africa' => 'South Africa',
		'Sri Lanka' => 'Sri Lanka',
		'Sudan' => 'Sudan',
		'Swaziland' => 'Swaziland',
		'Sweden' => 'Sweden',
		'Switzerland' => 'Switzerland',
		'Syria' => 'Syria',
		'Tajikistan' => 'Tajikistan',
		'Tanzania' => 'Tanzania',
		'Thailand' => 'Thailand',
		'Timor-Leste' => 'Timor-Leste',
		'Togo' => 'Togo',
		'Trinidad and Tobago' => 'Trinidad and Tobago',
		'Tunisia' => 'Tunisia',
		'Turkey' => 'Turkey',
		'Turkmenistan' => 'Turkmenistan',
		'Uganda' => 'Uganda',
		'Ukraine' => 'Ukraine',
		'United Arab Emirates' => 'United Arab Emirates',
		'United Kingdom' => 'United Kingdom',
		'United States' => 'United States',
		'Uruguay' => 'Uruguay',
		'Uzbekistan' => 'Uzbekistan',
		'Venezuela' => 'Venezuela',
		'Viet Nam' => 'Viet Nam',
		'Yemen' => 'Yemen',
		'Zambia' => 'Zambia',
		'Zimbabwe' => 'Zimbabwe'
	);
	return $countries;
}


// Fix Yoast titles for coacuthors plus

/*Fliter to modify the author display name on author page title for co-authors plus guest authors.*/
/*Solution for issue with yoast seo and co-authors plus guest author name reading for title of author page.*/

add_filter( 'wpseo_title', 'filterAuthorTitle' );
function filterAuthorTitle( $title ) {
	//check if author page, if it's not return as it is
	if ( ! is_author() ) {
	return $title;
	}
	//its author page, so let's pull current author name
	$current_display_name = get_the_author_meta( 'display_name', get_query_var( 'author' ) );
	$authorobj = get_queried_object();
	$new_display_name = $authorobj->display_name ;
	return str_replace( $current_display_name, $new_display_name, $title );
}