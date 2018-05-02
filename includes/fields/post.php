<?php

/**
 *
 */
function advos_field_search_post( $args = array() ) {
	extract( $args );
	$value = get_option( $name );
	echo '<div class="search-autocomplete" data-value="'. $value .'" data-name="'. $name .'" data-max="'. $max .'">';
	$post_ids = explode( ',', get_option( $name, '' ) );
	echo '<ul class="sortable" style="margin-top:0px">';
	if ( $post_ids ) {
		$posts = get_posts( array(
			'include' => $post_ids,
			'orderby' => 'post__in',
		) );

		foreach ( $posts as $post ) {
			echo '<li class="item" data-id="'. $post->ID .'">';
			echo '<a href="#" class="button button-small remove">&#10007;</a> ';
			echo $post->post_title .' (id:'. $post->ID .')';
			echo '</li>';
		}
	}
	echo '</ul>';
	echo '</div>';
}
