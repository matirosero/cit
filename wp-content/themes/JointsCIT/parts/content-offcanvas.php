<div class="off-canvas position-right" id="off-canvas" data-off-canvas>
    <!-- Close button -->
   <!--  <button class="close-button" aria-label="Close menu" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button> -->


    <!-- Menu -->
    <ul class="vertical menu">

	    <li>
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<div class="input-group">
					<label>
						<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'jointswp' ) ?></span>
						<input type="search" class="search-field input-group-field" placeholder="<?php echo esc_attr_x( 'Search...', 'input placeholder', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
					</label>
					<div class="input-group-button">
						<button type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'jointswp' ) ?>"><i class="demo-icon icon-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'label', 'jointswp' ) ?></span></button>
					</div>
				</div>
			</form>
      	</li>

    </ul>

	<?php joints_off_canvas_nav(); ?>

    <?php
	if ( !is_user_logged_in() ) : ?>
    	<ul class="vertical menu">

      		<li>
				<?php echo do_shortcode( '[login_form]' ); ?>
			</li>

	    </ul>
	<?php endif; ?>

</div>