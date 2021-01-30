<?php
// Add a button to top-level menu items that has sub-menus.
function code_test_add_sub_menu_toggle( $output, $item, $depth, $args ) {
	if ( 0 === $depth && in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add toggle button.
		$output .= '<button class="sub-menu-toggle" aria-expanded="false" onClick="codetestExpandSubMenu(this)">';
		$output .= '<span class="icon-plus">' . '&plus;' . '</span>';
		$output .= '<span class="icon-minus">' . '&minus;' . '</span>';
		$output .= '<span class="screen-reader-text">' . esc_html__( 'Open menu', 'codetest' ) . '</span>';
		$output .= '</button>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'code_test_add_sub_menu_toggle', 10, 4 );
