<?php

/**
 *
 */
function advos_field_checkbox( $args = array() ) {
	extract( $args );
	$options = get_option( $name );
	if ( !is_array( $options ) ) {
		$options = array();
	}
	echo '<input type="checkbox" name="'. $name .'[enabled]" value="1"'. checked( 1, $options['enabled'], false ) .' />';
	if ( isset( $description ) ) {
		echo '<p class="description">'. $description .'</p>';
	}
}
