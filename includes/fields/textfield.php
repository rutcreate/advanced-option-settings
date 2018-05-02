<?php

/**
 * Output textfield.
 */
function advos_field_textfield( $args = array() ) {
	extract( $args );
	$value = get_option( $name );
	echo '<input type="text" name="'. $name .'" value="'. $value .'" class="regular-text '. $classes .'" placeholder="'. $placeholder .'" />';
	if ( isset( $description ) ) {
		echo '<p class="description">'. $description .'</p>';
	}
}
