<?php
// Displays the site navigation.
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light bg-light" role="navigation" aria-label="primary navigation">
		<a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
		<button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'navbar-nav mr-auto',
				'container_id' 		=> 'navbar',
				'container_class' => 'collapse navbar-collapse',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
    		'walker'          => new WP_Bootstrap_Navwalker(),
			)
		);
		?>
	</nav><!-- #site-navigation -->
<?php endif; ?>
