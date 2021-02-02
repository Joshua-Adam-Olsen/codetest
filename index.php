<?php

get_header();

if ( have_posts() ) {
	// Load posts loop.
	while ( have_posts() ) {
		// Load the post and content template
		the_post();
		get_template_part( 'template-parts/content/content' );

	}
	// Previous/next page navigation.
	code_test_the_posts_navigation();

} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

get_footer();
