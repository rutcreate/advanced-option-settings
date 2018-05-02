<?php

/**
 *
 */
function advos_field_editor( $args = array() ) {
	extract( $args );
	$value = get_option( $name );
	$args['textarea_name'] = $name;
	wp_editor( $value, 'ads-'. $name, $args );
	if ( isset( $description ) ) {
		echo '<p class="description">'. $description .'</p>';
	}
}