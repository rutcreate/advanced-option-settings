<?php

/**
 * Output textfield.
 */
function advos_field_textarea( $args = array() ) {
	extract( $args );
	$value = get_option( $name );
	if ( $rows ) {
		$rows = 5;
	}
	echo '<textarea name="'. $name .'" class="'. $classes .'" placeholder="'. $placeholder .'" rows="'. $rows .'">'. $value .'</textarea>';
	if ( isset( $description ) ) {
		echo '<p class="description">'. $description .'</p>';
	}
}
