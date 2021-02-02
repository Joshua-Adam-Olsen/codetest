<?php
// Show the appropriate content for the Chat post format.
if ( has_block( 'core/paragraph', get_the_content() ) ) {
	// If there are paragraph blocks, print up to two.
	code_test_print_first_instance_of_block( 'core/paragraph', get_the_content(), 2 );
} else {
	// Otherwise this is legacy content, so print the excerpt.
	the_excerpt();
}
