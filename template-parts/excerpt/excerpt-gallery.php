<?php
/**
 * Show the appropriate content for the Gallery post format.
 */

// Print the 1st gallery found.
if ( has_block( 'core/gallery', get_the_content() ) ) {

	code_test_print_first_instance_of_block( 'core/gallery', get_the_content() );
}

the_excerpt();
