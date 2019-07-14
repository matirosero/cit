<?php
 	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		// Category Parameters
		// 'cat'              => 1,
		'category_name'    => 'problems',
		// 'category__and'    => array( 1, 2 ),
		// 'category__in'     => array( 1, 2 ),
		// 'category__not_in' => array( 1, 2 ),

		// Type & Status Parameters
		'post_status' => 'publish',

		// Choose ^ 'any' or from below, since 'any' cannot be in an array
		'post_type' => array(
			'post',
		),

		// Order & Orderby Parameters
		'order'               => 'DESC',
		'orderby'             => 'date',
		'ignore_sticky_posts' => true,
		// 'year'                => 2012,
		// 'monthnum'            => 1,
		// 'w'                   => 1,
		// 'day'                 => 1,
		// 'hour'                => 12,
		// 'minute'              => 5,
		// 'second'              => 30,



		// Pagination Parameters
		'posts_per_page'         => -1,


		// Custom Field Parameters
		// 'meta_key'       => '_mro_manual_author',
		// 'meta_value'     => '',
		// 'meta_value_num' => 10,
		// 'meta_compare'   => '=',
		// 'meta_query'     => array(
		// 	array(
		// 		'key'     => 'color',
		// 		'value'   => 'blue',
		// 		'type'    => 'CHAR',
		// 		'compare' => '=',
		// 	),
		// 	array(
		// 		'key'     => 'price',
		// 		'value'   => array( 1,200 ),
		// 		'compare' => 'NOT LIKE',
		// 	),
		// ),

		// 'meta_query' => array(
		//     array(
		//      'key' => '_mro_manual_author',
		//      'compare' => 'NOT EXISTS' // this should work...
		//     ),
		// )

		// Taxonomy Parameters
		// 'tax_query' => array(
		// 	'relation' => 'AND',
		// 	array(
		// 		'taxonomy'         => 'color',
		// 		'field'            => 'slug',
		// 		'terms'            => array( 'red', 'blue' ),
		// 		'include_children' => true,
		// 		'operator'         => 'IN',
		// 	),
		// 	array(
		// 		'taxonomy'         => 'actor',
		// 		'field'            => 'id',
		// 		'terms'            => array( 1, 2, 3 ),
		// 		'include_children' => false,
		// 		'operator'         => 'NOT IN',
		// 	)
		// ),

	);

$query = new WP_Query( $args );

if( ! $query->have_posts() ) :
    return false;
else : ?>

	<table>
		<tr>
			<th></th>
			<th>Título</th>
			<th>Problemas</th>
			<th>Autor</th>
			<th>URL viejo</th>
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
		        $parent_id = 113;
		        $categories = get_the_terms( $post->ID, 'category' );

		        $links = array();
			    foreach( $categories as $category ):
			        if( $parent_id == $category->parent ):
			            // put link in array
			            $links[] = $category->name;
			        endif;
			    endforeach;
			    // join and output links with separator
			    $cats = join( ', ', $links );
			    $cats = str_replace('author', 'autor', $cats);
			    $cats = str_replace('date', 'fecha', $cats);
			    echo $cats;
		        ?>
			</td>
        	<td>
	        	<?php if (get_post_meta( $post->ID, '_mro_manual_author', true )) :
	        		if ( get_post_meta( $post->ID, '_mro_manual_author', true ) != '_MISSING') :
		        		echo get_post_meta( $post->ID, '_mro_manual_author', true );
		        	endif;
	        	endif; ?>
	        </td>
			<td>
	        	<?php if (get_post_meta( $post->ID, '_mro_old_url', true )) :
	        		echo 'http://www.clubdeinvestigacion.com'.get_post_meta( $post->ID, '_mro_old_url', true );
	        	endif; ?>
			</td>
        </tr>

        <?php $i++; ?>

    <?php endwhile;

    echo '</table>';

    wp_reset_postdata();

endif;

