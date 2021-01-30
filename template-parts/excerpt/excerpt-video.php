<?php
/**
 * Show the appropriate content for the Video post format.
 */

$content = get_the_content();

if ( has_block( 'core/video', $content ) ) {
	code_test_print_first_instance_of_block( 'core/video', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	code_test_print_first_instance_of_block( 'core/embed', $content );
} else {
	code_test_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
the_excerpt();
