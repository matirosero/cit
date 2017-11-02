<?php
// List all posts with custom field Color, sorted by the value of custom field Display_Order
// does not exclude any 'post_type'
// assumes each post has just one custom field for Color, and one for Display_Order


//align=left
// $ids = $wpdb->get_col( "
// 	SELECT ID
// 	FROM $wpdb->posts
// 	WHERE post_content LIKE '%align=\"left\"%'
// " );


//broken images src usuarios
$ids = $wpdb->get_col( "
	SELECT p.ID
	FROM cit_posts p
	LEFT JOIN cit_term_relationships rel ON p.ID = rel.object_id 
	WHERE rel.term_taxonomy_id LIKE 31
AND p.post_content LIKE '%legacy_assets/images%'
" );

echo '<ol>';

foreach ( $ids as $id ) { 
	$post = get_post( intval( $id ) );
	setup_postdata( $post );
	?>
	<li>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
			<?php the_title(); ?>
		</a> - 
	</li>
	<?php
}

echo '<ol>';

?>