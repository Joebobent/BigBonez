<?php
/*
 * Sidebar Selection
 */
function bnz_post_sidebar_meta_box( $object, $box ) { ?>
	<?php wp_nonce_field( basename( __FILE__ ), 'bnz_sidebar_nonce' ); // Security ?>
	<?php // Populate Sidebars
	$sidebar_options = array();
	$sidebars = $GLOBALS['wp_registered_sidebars'];
	foreach ( $sidebars as $sidebar ){
		$sidebar_options[] = array(
			'name'  => $sidebar['name'],
			'value' => $sidebar['id']
		);
	}
	$bnz_values = get_post_custom( $post->ID );
	$bnz_sidebar_selected = isset( $bnz_values['_bnz_sidebar'] ) ? esc_attr( $bnz_values['_bnz_sidebar'][0] ) : '';
	?>

	<p>
		<label for="_bnz_sidebar"><?php _e( "Choose a Sidebar:", 'example' ); ?></label>
		<br />
		<select name="_bnz_sidebar">
			<option value="disable_sidebar" <?php selected( $bnz_sidebar_selected, $value ); ?>>Disable Sidebar</option>
			<?php foreach( $sidebar_options as $option ){ ?>
				<?php $value = $option['value']; ?>
				<option value="<?php echo $value; ?>"<?php selected( $bnz_sidebar_selected, $value ); ?>><?php echo $option['name']; ?></option>
			<?php } ?>
		</select>
		<br />
	</p><?php
}


/*
 * Save the metadata
 */
function bnz_save_meta_sidebar( $post_id, $post ) {

		/*
		 * Save Sidebar Option
		 * Bail if we're doing an auto save
		 */
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		/* Verify the nonce before proceeding. */
		if ( !isset( $_POST['bnz_sidebar_nonce'] ) || !wp_verify_nonce( $_POST['bnz_sidebar_nonce'], basename( __FILE__ ) ) )
			return $post_id;
		/* Get the post type object. */
		$post_type = get_post_type_object( $post->post_type );
		/* Check if the current user has permission to edit the post. */
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
			return $post_id;
		/* Get the posted data. */
		$new_meta_value = ( isset( $_POST['_bnz_sidebar'] ) ? $_POST['_bnz_sidebar'] : '' );
		/* Get the meta key. */
		$meta_key = '_bnz_sidebar';
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


// Add class 'sidebar' to body tag if Disable Sidebar is NOT checked
add_filter( 'body_class', 'bnz_sidebar_class' );
function bnz_sidebar_class( $classes ) {
	/* Get the current post ID. */
	$post_id = get_the_ID();
	/* If we have a post ID, proceed. */
	if ( !empty( $post_id ) ) {
		/* Aquire sidebar type and apply class if not disable sidebar */
		$sidebar = get_post_meta( $post_id, '_bnz_sidebar', true );
		if ( $sidebar != 'disable_sidebar' && !empty( $sidebar ) ) :
			$classes[] = sanitize_html_class( 'sidebar' );
		endif;
	}
	return $classes;
}
