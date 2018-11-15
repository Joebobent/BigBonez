<?php
/*
 * --- Top Content ---
 * Content to display above content & sidebar
 */
function bnz_above_content_meta_box( $object, $box ) { ?>
	<?php
	wp_nonce_field( basename( __FILE__ ), 'bnz_above_content_nonce' );
	global $post;
	$values = get_post_custom( $post->ID );
	$check = isset( $values['_bnz_top_page'] ) ? true : false;
	?>
	<div>
		<label for="_bnz_above_content"><?php _e( "Content to be used above the content & sidebar.", 'example' ); ?></label><br>
		<label for="_bnz_top_page" style="display:block;margin:5px 0;">
		<input id="_bnz_top_page" type="checkbox" name="_bnz_top_page" <?php checked( $check, true ); ?>><?php _e( "Go above site header.", 'example' ); ?></label>
		<?php
		$top_content = esc_attr( get_post_meta( $object->ID, '_bnz_above_content', true ) );
		$top_content_args = array(
			'textarea_rows' 	=> 5,
			'textarea_name' 	=> '_bnz_above_content',
			'drag_drop_upload' 	=> true,
			'quicktags'			=> false
			);
		wp_editor( $top_content, 'top-content-editor', $top_content_args );
		?>
	</div>
<?php }



function bnz_save_meta_top_content( $post_id, $post ) {
	/*
	 * Above Content
	 * Verify the nonce before proceeding.
	 */
	if ( !isset( $_POST['bnz_above_content_nonce'] ) || !wp_verify_nonce( $_POST['bnz_above_content_nonce'], basename( __FILE__ ) ) )
		return $post_id;
	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );
	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
	/*  Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = ( isset( $_POST['_bnz_above_content'] ) ? $_POST['_bnz_above_content'] : '' );
	/* Get the meta key. */
	$meta_key = '_bnz_above_content';
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
	/*
	 * Above Site Header
	 * Get the posted data and sanitize it for use as an HTML class.
	 */
	$new_meta_value = ( isset( $_POST['_bnz_top_page'] ) ? $_POST['_bnz_top_page'] : '' );
	/* Get the meta key. */
	$meta_key = '_bnz_top_page';
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
