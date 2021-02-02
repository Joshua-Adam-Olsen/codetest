<?php
// Displays header site branding
$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description' );
?>

<div id="site-branding">

	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( $blog_info ) : ?>
		<?php if ( is_front_page() || is_home() ) : ?>
			<h1 class="site-title"><?php echo esc_html( $blog_info ); ?></h1>
		<?php else : ?>
			<p class="site-title"><?php echo esc_html( $blog_info ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $description ) : ?>
		<p class="site-description">
			<?php echo esc_html( $description ); ?>
		</p>
	<?php endif; ?>

	<div class="scroll-indicator">
		<div class="dots"></div>
	</div>
</div><!-- #site-branding -->
