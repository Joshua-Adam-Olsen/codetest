<?php
// Show the appropriate content for the Link post format.
if ( has_block( 'core/paragraph', get_the_content() ) ) {
	// Print the 1st instance of a paragraph block.
	code_test_print_first_instance_of_block( 'core/paragraph', get_the_content() );
} else {
	// If none is found, print the content.
	the_content();
}
