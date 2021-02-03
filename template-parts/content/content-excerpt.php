<?php
// Template part for displaying post archives and search results
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> style="min-width: 18rem;">

	<?php $post_custom_ACF_image = get_field('card_image', get_the_ID()); ?>

	<?php if ( !empty($post_custom_ACF_image) ) { ?>
		<img class="card-img-top" src="<?php echo $post_custom_ACF_image; ?>" alt="Card image cap">
	<?php } elseif ( has_post_thumbnail() ) { ?>
		<img class="card-img-top" src="<?php the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="Card image cap">
	<?php } else { ?>
		<img class="card-img-top" src="<?php echo get_template_directory_uri() . '/assets/img/card-placeholder.svg'; ?>" alt="Card image cap">
	<?php } ?>

	<div class="card-body">

		<?php get_template_part( 'template-parts/header/excerpt-header' ); ?>

		<div class="entry-content card-text">
			<?php get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
		</div><!-- .entry-content -->

	</div>

	<footer class="entry-footer card-footer">
		<?php code_test_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->
