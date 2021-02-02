<?php

get_header();

// Start the Loop
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'codetest' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$codetest_next = is_rtl() ? '&larr;' : '&rarr;';
	$codetest_prev = is_rtl() ? '&rarr;' : '&larr;';

	$codetest_post_type      = get_post_type_object( get_post_type() );
	$codetest_post_type_name = '';
	if (
		is_object( $codetest_post_type ) &&
		property_exists( $codetest_post_type, 'labels' ) &&
		is_object( $codetest_post_type->labels ) &&
		property_exists( $codetest_post_type->labels, 'singular_name' )
	) {
		$codetest_post_type_name = $codetest_post_type->labels->singular_name;
	}

	$codetest_next_label = sprintf( esc_html__( 'Next %s', 'codetest' ), $codetest_post_type_name );
	$codetest_previous_label = sprintf( esc_html__( 'Previous %s', 'codetest' ), $codetest_post_type_name );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $codetest_next_label . $codetest_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $codetest_prev . $codetest_previous_label . '</p><p class="post-title">%title</p>',
			'screen_reader_text' => ' ',
		)
	);
endwhile; // End of the loop.

get_footer();
