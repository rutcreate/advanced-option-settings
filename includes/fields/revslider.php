<?php

/**
 *
 */
function advos_field_revslider_select( $args = array() ) {
	extract( $args );
	$value = get_option( $name );

	if ( class_exists( 'RevSlider' ) ) {
		$slider = new RevSlider();
		$sliders = $slider->getArrSliders();
		echo '<select name="'. $name .'">';
		echo '<option value="">- Hide Slideshow -</option>';
		foreach ( $sliders as $slider ) {
			echo '<option value="'. $slider->getAlias() .'"'. ( $value == $slider->getAlias() ? ' selected="selected"' : '') .'>'. $slider->getTitle() .'</option>';
		}
		echo '</select>';
	} else {
		echo '<p class="description">Plugin <em>revslider</em> not found.</p>';
	}
	if ( isset( $description ) ) {
		echo '<p class="description">'. $description .'</p>';
	}
}
