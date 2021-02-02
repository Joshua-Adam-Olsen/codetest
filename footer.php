			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" aria-label="secondary navigation" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'depth'          => 1,
						'menu_class'		 => 'nav',
						'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
  					'walker'         => new WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			<div class="site-name">
				<?php if ( get_bloginfo( 'name' ) ) : ?>
					<?php if ( is_front_page() && ! is_paged() ) : ?>
						<small>&copy;<?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></small>
					<?php else : ?>
						<small>&copy;<?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></small>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
