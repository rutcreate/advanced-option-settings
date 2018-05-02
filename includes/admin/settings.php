<?php

/**
 *
 */
function advos_register_settings($sections) {
	foreach ( $sections as $section_key => $section ) {
		add_settings_section( $section_key, $section['title'], '', $section['slug'] );
		foreach ( $section['fields'] as $name => $field ) {
			$args = array( 'name' => $name );
			if ( isset( $field['args'] ) && is_array( $field['args'] ) ) {
				$args = array_merge( $args, $field['args'] );
			}
			add_settings_field(
				$name,
				$field['label'],
				'adfov_option_field_'. $field['type'],
				$section['slug'],
				$section_key,
				$args
			);
			register_setting( $section['register_key'] ?: $section_key, $name );
		}
	}
}