<?php

function advos_field_media( $args = array() ) {
	extract( $args );
	$attachment_id = get_option( $name );
	?>
	<div>
		<input type="button" data-name="<?php echo $name; ?>" class="button advos-upload-button" value="<?php _e( 'Upload image' ); ?>" />
		<input type="hidden" name="<?php echo $name; ?>" class="image-attachment-id" value="<?php echo $attachment_id; ?>" />
		<div class="image-preview-wrapper">
			<img class="image-preview" src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" width="200">
		</div>
	</div>
	<?php
}
