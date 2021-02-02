<?php
// Show the appropriate content for the Quote post format.
$content = get_the_content();
// If there is no quote or pullquote print the content.
if ( has_block( 'core/quote', $content ) ) {
	code_test_print_first_instance_of_block( 'core/quote', $content );
} elseif ( has_block( 'core/pullquote', $content ) ) {
	code_test_print_first_instance_of_block( 'core/pullquote', $content );
} else {
	the_excerpt();
}
