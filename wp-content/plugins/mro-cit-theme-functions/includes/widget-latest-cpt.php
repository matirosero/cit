<?php

class mro_cit_LatestCPT_Widget extends WP_Widget {

	// Set up the widget name and description.
	public function __construct() {
		$this->defaults = array(
			'title'         => '',
			'number'        => 5,
			'post_type' 		=> 'cit_report',
		);
	    $widget_options = array(
	      	'classname' => 'latest_cpt_widget',
	      	'description' => 'This widget shows the most recent posts for a particular custom post type',
	    );
	    parent::__construct( 'latest_cpt_widget', 'Latest Post Types Widget', $widget_options );
	}


	// Create the widget output.
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$number = $instance[ 'number' ];
		$post_type = $instance['post_type'];

		$date_format = 'F j, Y';
		if ( is_singular('cit_report') ) {
			$date_format = 'F Y';
		}

		echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

		/*
		 * The WordPress Query class.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 */
		$loop_args = array(

			// Type & Status Parameters
			'post_type'   => $post_type,
			'post_status' => 'publish',

			// Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'date',

			// Pagination Parameters
			'posts_per_page'         => $number,

			'cache_results'          => true,
			'update_post_term_cache' => true,
			'update_post_meta_cache' => true,

		);

		$query = new WP_Query( $loop_args );

		echo '<ul>';

		while ( $query->have_posts() ) : $query->the_post(); ?>

			<li>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<span class="date"><?php the_time($date_format) ?></span>
			</li>

		<?php endwhile;

		echo '</ul>';

		wp_reset_postdata();

		$obj = get_post_type_object( $post_type );
		$post_type_name = $obj->labels->name;

		?>

		<p><a class="" href="<?php echo get_post_type_archive_link( $post_type ); ?>">Ver más ...</a></p>

		<?php echo $args['after_widget'];
	}


 	// Create the admin area widget settings form.
  	public function form( $instance ) {
    	$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    	$number = ! empty( $instance['number'] ) ? $instance['number'] : '';
    	$post_type = ! empty( $instance['post_type'] ) ? $instance['post_type'] : '';
    	?>
    	<p>
      		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    	</p>
    	<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to show:</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" type="number">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>">Post type:</label>
			<select id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">
				<option value="cit_report" <?php echo ($post_type=='cit_report')?'selected':''; ?>>Reports</option>
				<option value="cit_past_event" <?php echo ($post_type=='cit_past_event')?'selected':''; ?>>Past events</option>
			</select>
		</p>
		<?php
  	}


	// Apply settings to the widget instance.
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
		$instance[ 'number' ] = sanitize_text_field( $new_instance[ 'number' ] );
		$new_post_type = sanitize_text_field( $new_instance[ 'post_type' ] );
		if ( $new_post_type == 'cit_report' || $new_post_type == 'cit_past_event' ) :
			$instance[ 'post_type' ] = $new_post_type;
		endif;
		return $instance;
	}
}

// Register the widget.
function mro_cit_register_latest_cpt_widget() {
  	register_widget( 'mro_cit_LatestCPT_Widget' );
}
add_action( 'widgets_init', 'mro_cit_register_latest_cpt_widget' );
