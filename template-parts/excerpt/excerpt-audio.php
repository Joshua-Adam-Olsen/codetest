<?php
/**
 * Show the appropriate content for the Audio post format.
 */

$content = get_the_content();

if ( has_block( 'core/audio', $content ) ) {
	code_test_print_first_instance_of_block( 'core/audio', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	code_test_print_first_instance_of_block( 'core/embed', $content );
} else {
	code_test_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
the_excerpt();
