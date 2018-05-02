<?php

/**
 * AJAX search post for admin.
 */
function advos_ajax_search_post() {
	$results = new WP_Query( array(
		'post_type' => array( 'post' ),
		'post_status' => 'publish',
		'nopaging' => true,
		'posts_per_page'=> 100,
		's' => stripslashes( $_POST['search'] ),
	) );
	$items = array();
	if ( !empty( $results->posts ) ) {
		foreach ( $results->posts as $result ) {
			$items[] = array(
				'id' => $result->ID,
				'label' => $result->post_title .' (id:'. $result->ID .')',
			);
		}
	}
	wp_send_json_success( $items );
}
add_action( 'wp_ajax_advos_search_post', 'advos_ajax_search_post' );
