<?php
// Template part for displaying page content in page.php
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_front_page() ) : ?>
		<header class="entry-header">
			<?php get_template_part( 'template-parts/header/entry-header' ); ?>
			<?php code_test_post_thumbnail(); ?>
		</header>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<header class="entry-header">
			<?php code_test_post_thumbnail(); ?>
		</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'codetest' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Page %', 'codetest' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					esc_html__( 'Edit %s', 'codetest' ),
					'<span class="sr-only">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
