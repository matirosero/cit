<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar" id="top-bar-menu">
	<div id="topbar-site-logo" class="title-area top-bar-left float-left">
		<ul class="menu">
			<li><a class="site-logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_cit.png" alt="<?php bloginfo('name'); ?>" /></a></li>
		</ul>
	</div>
	<div id="main-menu" class="top-bar-left float-left show-for-medium">
		<?php joints_top_nav(); ?>
	</div>
	<div class="top-bar-right show-for-medium">
      <ul class="menu">
        <li><input type="search" placeholder="Search"></li>
        <li><button type="button" class="button">Search</button></li>
      </ul>
    </div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>