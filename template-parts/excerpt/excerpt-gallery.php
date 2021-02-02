<?php
// Show the appropriate content for the Gallery post format.
if ( has_block( 'core/gallery', get_the_content() ) ) {
	// Print the 1st gallery found.
	code_test_print_first_instance_of_block( 'core/gallery', get_the_content() );
}

the_excerpt();
