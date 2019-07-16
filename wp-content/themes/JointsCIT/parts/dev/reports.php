<?php

	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		'post_type'   => 'cit_report',
		'post_status' => 'publish',
		'order'               => 'ASC',
		'orderby'             => 'date',
		'posts_per_page'         => -1,

		'eventDisplay' => 'past',

	);

$query = new WP_Query( $args );

if( ! $query->have_posts() ) :
    return false;
else : ?>

	<table>
		<tr>
			<th></th>
			<th>ID</th>
			<th>Título</th>
			<th>SEO Título</th>
			<th>Post date</th>
		</tr>

	<?php
	$i = 1;

	while( $query->have_posts() ) : $query->the_post(); ?>

        <tr>
        	<td>
        		<?php echo $i; ?>
        	</td>
        	<td>
        		<?php echo $post->ID; ?>
        	</td>
        	<td>
        		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php edit_post_link('edit', '[', ']'); ?>
        	</td>
        	<td>
        		<?php echo get_post_meta( $post->ID, $key = '_yoast_wpseo_title', true ); ?>
        	</td>
			<td>
				<?php the_date(); ?>
			</td>



        </tr>

        <?php 
// if ( ! add_post_meta( $post->ID, '_EventStartDate', $start, true ) ) { 
//    update_post_meta( $post->ID, '_EventStartDate', $start );
// }
// if ( ! add_post_meta( $post->ID, '_EventEndDate', $end, true ) ) { 
//    update_post_meta( $post->ID, '_EventEndDate', $end );
// }
// if ( ! add_post_meta( $post->ID, '_EventStartDateUTC', $gmt, true ) ) { 
//    update_post_meta( $post->ID, '_EventStartDateUTC', $gmt );
// }
// if ( ! add_post_meta( $post->ID, '_EventEndDateUTC', $gmt_end, true ) ) { 
//    update_post_meta( $post->ID, '_EventEndDateUTC', $gmt_end );
// }
        $i++; ?>

    <?php endwhile;

    echo '</table>';

    wp_reset_postdata();

endif;
