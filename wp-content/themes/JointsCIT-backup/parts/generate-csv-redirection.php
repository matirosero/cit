<?php
 	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		'post_status' => 'publish',
		'post_type' => array(
			'cit_report',
		),
		'order'               => 'DESC',
		'orderby'             => 'date',
		'ignore_sticky_posts' => true,
		'posts_per_page'         => -1,

	);

$query = new WP_Query( $args );

if( ! $query->have_posts() ) :
    return false;
else : ?>

	<table>
		<tr>
			<th></th>
			<th>source URL</th>
			<th>target URL</th>
			<th>source slug</th>
			<th>target slug</th>
			<th>same slug?</th>
		</tr>

	<?php
	$i = 1;

	while( $query->have_posts() ) : $query->the_post(); ?>

        <tr>
        	<td>
        		<?php echo $i; ?>
        	</td>
        	<td>
        		<?php
        		$old_url = get_post_meta( $post->ID, '_mro_old_url', true );
        		echo $old_url;
        		?>
        	</td>
        	<td>
		        <?php
		        // $url = get_permalink();
		        $new_url = force_relative_url(get_permalink());
		        echo $new_url;
		        ?>
			</td>
			<td>
				<?php
				$old_slug = basename($old_url);
				$old_slug = str_replace('.html', '', $old_slug);
				echo $old_slug;
				?>
			</td>
			<td>
		        <?php
		        $post_slug = $post->post_name;
		        echo $post_slug;
		        ?>
			</td>
			<td>
				<?php
				if ($old_slug == $post_slug ) {
					echo 'SAME';
				} else {
					echo 'DIFFERENT';
				}
				?>
			</td>
        </tr>

        <?php $i++; ?>

    <?php endwhile;

    echo '</table>';

    wp_reset_postdata();

endif;

