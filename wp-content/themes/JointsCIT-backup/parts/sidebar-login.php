<div class="login">
	<h3 class="widgettitle">Afiliados</h3>
	<?php
	if ( is_user_logged_in() ) : 
		$current_user = wp_get_current_user();
		$name = $current_user->display_name;
		?>
		<p>¡Bienvenido, <?php echo $name; ?>!<br />
			<a href="<?php echo get_edit_user_link(); ?>">Editar perfil</a> | <a href="<?php echo wp_logout_url(); ?>">Cerrar sesión</a>
		</p>
	<?php
	else :
		echo do_shortcode( '[login_form]' );
	endif;
	?>
</div>