<?php

/**
 * Add javascript to admin.
 */
function advos_admin_enqueue_scripts() {
	wp_enqueue_script(
		'advos-field-post',
		ADVOS_URL . 'assets/js/fields/post.js',
		array( 'jquery-ui-autocomplete', 'jquery-ui-sortable' ),
		'1.0.0',
		true
	);

	wp_enqueue_script(
		'advos-field-media',
		ADVOS_URL . 'assets/js/fields/media.js',
		array(),
		'1.0.0',
		true
	);

	wp_enqueue_script(
		'advos',
		ADVOS_URL . 'assets/js/advos.js',
		array( 'advos-field-media', 'advos-field-post' ),
		'1.0.0',
		true
	);

	wp_localize_script(
		'advos',
		'advos',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'advos_admin_enqueue_scripts' );
