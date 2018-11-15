<?php
/*
 * Custome Post / Page Class
 */
function bnz_post_class_meta_box( $object, $box ) {
	wp_nonce_field( basename( __FILE__ ), 'bnz_post_class_nonce' ); ?>
	<p>
		<label for="bnz-post-class"><?php _e( "Add a custom CSS class to be applied to this post.", 'example' ); ?></label>
		<br />
		<input class="widefat" type="text" name="bnz-post-class" id="bnz-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, '_bnz_post_class', true ) ); ?>" size="30" />
	</p><?php
}


function bnz_save_meta_class( $post_id, $post ) {

	/*
	 * Save Class Option
	 * Verify the nonce before proceeding.
	 */
	if ( !isset( $_POST['bnz_post_class_nonce'] ) || !wp_verify_nonce( $_POST['bnz_post_class_nonce'], basename( __FILE__ ) ) )
		return $post_id;
	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );
	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = ( isset( $_POST['bnz-post-class'] ) ? sanitize_html_class( $_POST['bnz-post-class'] ) : '' );
	/* Get the meta key. */
	$meta_key = '_bnz_post_class';
	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );
	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );

}



/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', '_bnz_post_class' );
function _bnz_post_class( $classes ) {
	/* Get the current post ID. */
	$post_id = get_the_ID();
	/* If we have a post ID, proceed. */
	if ( !empty( $post_id ) ) {
		/* Get the custom post class. */
		$post_class = get_post_meta( $post_id, '_bnz_post_class', true );
		/* If a post class was input, sanitize it and add it to the post class array. */
		if ( !empty( $post_class ) )
			$classes[] = sanitize_html_class( $post_class );
	}
	return $classes;
}
