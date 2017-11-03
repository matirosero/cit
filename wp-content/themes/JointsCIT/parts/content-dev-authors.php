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
$coauthors = array('roberto-sasso');


//broken images src usuarios
$ids = $wpdb->get_col( "
	SELECT p.ID, meta.post_id, meta.meta_key, meta.meta_value
	FROM cit_posts p
	LEFT JOIN cit_postmeta meta ON p.ID = meta.post_id 
	WHERE meta.meta_key LIKE '_mro_manual_author'
	AND meta.meta_value LIKE '%_MISSING%'
" );

echo '<table>
	    <thead>
	    	<tr>
	    		<th>&nbsp;</th>
	    		<th>Post</th>
	    		<th>Author</th>
	    		<th>Manual author</th>
	    	</tr>
	    </thead>';

$i = 1;

foreach ( $ids as $id ) { 
	$post = get_post( intval( $id ) );
	setup_postdata( $post );
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</td>
		<td>
			<?php
			if ( function_exists( 'coauthors_posts_links' ) ) {
			    coauthors_posts_links();
			} else {
			    the_author_posts_link();
			}
			?>
		</td>
		<td>
			<?php
			$manual_author = get_post_meta( $id, '_mro_manual_author', true );
			echo $manual_author;
			?>
		</td>
		<?php
		// $CoAuthors_Plus->add_coauthors($id, $coauthors);
		?>

	</tr>
	<?php
	$i++;
}

echo '</table>';

?>