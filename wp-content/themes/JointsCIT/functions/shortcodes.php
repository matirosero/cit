<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function cit_register_shortcodes() {
    add_shortcode('email-to-download', 'cit_email_to_download_shortcode');
}
add_action( 'init', 'cit_register_shortcodes' );

function cit_email_to_download_shortcode($atts, $content = null) {

    // Attributes
	$atts = shortcode_atts(
		array(
			'download' => '',
		),
		$atts
	);

    ob_start();

    echo '<div class="cit-email-to-download">';

    ?>

        <div class="download-form">
            <?php gravity_form(1, $display_title=false, $display_description=false, $display_inactive=false, $field_values=array('download_url' => 3026, true), $ajax=false); ?>
        </div>

    <?php

    echo '</div>';

    $output = ob_get_clean();

    return $output;

}