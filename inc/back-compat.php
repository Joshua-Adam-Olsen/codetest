<?php
/**
 * Backwards Compatibility
 */
function code_test_switch_theme() {
	add_action( 'admin_notices', 'code_test_upgrade_notice' );
}
add_action( 'after_switch_theme', 'code_test_switch_theme' );

function code_test_upgrade_notice() {
	echo '<div class="error"><p>';
	printf(
		esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'codetest' ),
		esc_html( $GLOBALS['wp_version'] )
	);
	echo '</p></div>';
}

function code_test_customize() {
	wp_die(
		sprintf(
			esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'codetest' ),
			esc_html( $GLOBALS['wp_version'] )
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'code_test_customize' );

function code_test_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'codetest' ),
				esc_html( $GLOBALS['wp_version'] )
			)
		);
	}
}
add_action( 'template_redirect', 'code_test_preview' );
