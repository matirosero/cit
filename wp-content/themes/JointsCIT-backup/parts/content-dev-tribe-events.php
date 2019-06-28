<?php

	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		'post_type'   => 'tribe_events',
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
			<th>Título</th>
			<th>Start date</th>
			<th>GMT start date</th>
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
        		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php edit_post_link('edit', '[', ']'); ?>
        	</td>
        	<td>
        		<?php
        		$start = tribe_get_start_date( null, false, 'Y-m-d H:i:s' );
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
				<?php the_date(); ?>
			</td>
        </tr>

        <?php $i++; ?>

    <?php endwhile;

    echo '</table>';

    wp_reset_postdata();

endif;
