<?php

/**
 *
 */
function advos_field_thumbnail( $args = array() ) {
	global $_wp_additional_image_sizes;

	extract( $args );

	$output = '<select name="'. $name .'">';
	$output .= '<option value="">- Select thumbnail -</option>';
	foreach (get_intermediate_image_sizes() as $size) {
		if ( in_array( $size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
			$width = get_option( "{$size}_size_w" );
			$height = get_option( "{$size}_size_h" );
		} elseif ( isset( $_wp_additional_image_sizes[ $size ] ) ) {
			$width = $_wp_additional_image_sizes[ $size ]['width'];
			$height = $_wp_additional_image_sizes[ $size ]['height'];
		}
		if ( get_option( $name, '' ) === $size ) {
			$output .= "<option value=\"{$size}\" selected=\"selected\">{$size} ({$width}x{$height})</option>";
		}
		else {
			$output .= "<option value=\"{$size}\">{$size} ({$width}x{$height})</option>";
		}
	}
	$output .= '</select>';
	echo $output;
}
