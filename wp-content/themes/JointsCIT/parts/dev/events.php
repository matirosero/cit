<?php

	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		'post_type'   => 'cit_past_event',
		'post_status' => 'publish',
		'order'               => 'DESC',
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
			<th>Post date</th>
			<th>Start date</th>
			<th>GMT start date</th>
			<th>End date</th>
			<th>GMT end date</th>
			<th>Start date TRIBE</th>
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
				<?php the_date(); ?>
			</td>
        	<td>
        		<?php
        		$start = get_the_date( 'Y-m-d H:i:s' );
        		echo $start;
        		?>
			</td>
        	<td>
        		<?php
        		$gmt = get_gmt_from_date( $start );

        		echo $gmt;
        		?>
	        </td>
	        <td>
        		<?php
        		$timestamp = strtotime($start);
		        $end = date("Y-m-d H:i:s", strtotime($start." +2 hours"));
				echo $end;
        		?>
	        </td>
	        <td>
        		<?php
        		$gmt_end = get_gmt_from_date( $end );

        		echo $gmt_end;
        		?>
	        </td>
	        <td>
	        	<?php $tribe_start = tribe_get_start_date( null, false, 'Y-m-d H:i:s' );
        		echo $tribe_start; ?>
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
