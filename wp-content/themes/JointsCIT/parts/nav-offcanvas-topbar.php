<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar" id="top-bar-menu">
	<div id="topbar-site-logo" class="title-area top-bar-left float-left">
		<ul class="menu">
			<li><a class="site-logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_cit@2x.png" alt="<?php bloginfo('name'); ?>" /></a></li>
		</ul>
	</div>

	<!-- Main menu: large left -->
	<div id="main-menu" class="top-bar-left float-left show-for-large">
		<?php joints_top_nav(); ?>
	</div>

	<!-- Search bar: large right -->
	<div class="top-bar-right top-bar-search show-for-large">

		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<ul class="menu">
				<li><label>
					<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'jointswp' ) ?></span>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'input placeholder', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
				</label></li>
				<li>
					<button type="submit" class="search-submit button"><i class="demo-icon icon-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'label', 'jointswp' ) ?></span></button>
				</li>
			</ul>
		</form>

    </div>

    <!-- Menu icon: small-medium right -->
	<div id="menu-toggle" class="top-bar-right float-right hide-for-large">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><i class="icon-menu"></i><?php _e( 'Más', 'jointswp' ); ?></a></li>
		</ul>
	</div>

	<!-- Main tablet menu: medium right -->
	<div id="main-tablet-menu" class="top-bar-right float-right show-for-medium-only">
		<?php joints_top_tablet_nav(); ?>
	</div>

</div>