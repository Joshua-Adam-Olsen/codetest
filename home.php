<?php
get_header();
?>

<div id='home-posts-header'>Recent Posts</div>

<div class="row">

<?php
if ( have_posts() ) {
?>

	<div class="column col-sm-12">

		<div class="card-deck">

		<?php
		// Load posts loop.
		while ( have_posts() ) {

				// Load the post and content-excerpt template
				the_post();
				get_template_part( 'template-parts/content/content-excerpt' );

		} ?>

		</div>

	</div>

	<div class="column col-12">

			<?php
			// Previous/next page navigation.
			code_test_the_posts_navigation();
			?>

	</div>

<?php
} else { ?>

	<div class="column col-12">

		<?php
		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content-none' );
		?>

	</div>

<?php
}
?>

</div>

<?php
get_footer();
