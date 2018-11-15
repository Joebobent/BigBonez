<?php
/*
 * Header Settings
 */
function bnz_header( $post ) {
	// Variables
	$values = get_post_custom( $post->ID );
	$alignSelected = isset( $values[ '_bnz_title_align' ] ) ? esc_attr( $values['_bnz_title_align'][0] ) : '';
	$hideChecked = isset( $values['_bnz_hide_title'] ) ? esc_attr( $values['_bnz_hide_title'][0] ) : '';

	// Header nonce
	wp_nonce_field( basename( __FILE__ ), 'bnz_header_nonce' );

	// Media Uploader
	global $content_width, $_wp_additional_image_sizes;
	$image_id = get_post_meta( $post->ID, '_header_background_id', true );
	$old_content_width = $content_width;
	$content_width = 254;
	if ( $image_id && get_post( $image_id ) ) {
		if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
			$thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
		} else {
			$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
		}
		if ( ! empty( $thumbnail_html ) ) {
			$content = $thumbnail_html;
			$content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_header_background_button" >' . esc_html__( 'Remove header background image', 'text-domain' ) . '</a></p>';
			$content .= '<input type="hidden" id="upload_header_background" name="_haederbg_cover_img" value="' . esc_attr( $image_id ) . '" />';
		}
		$content_width = $old_content_width;
	} else {
		$content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
		$content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set header background image', 'text-domain' ) . '" href="javascript:;" id="upload_header_background_button" id="set-header-background" data-uploader_title="' . esc_attr__( 'Choose an image', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Set header background image', 'text-domain' ) . '">' . esc_html__( 'Set header background image', 'text-domain' ) . '</a></p>';
		$content .= '<input type="hidden" id="upload_header_background" name="_haederbg_cover_img" value="" />';
	}
	echo $content;

	// Text Align
	?>
 	<p>
		<label for="_bnz_title_align"><?php _e( "Title Alignment:", 'example' ); ?></label>
		<select name="_bnz_title_align" id="_bnz_title_align">
			<option value="" <?php selected( $alignSelected, '' ) ?>>Default</option>
			<option value="left" <?php selected( $alignSelected, 'left' ) ?>>Left</option>
			<option value="center" <?php selected( $alignSelected, 'center' ) ?>>Center</option>
			<option value="right" <?php selected( $alignSelected, 'right' ) ?>>Right</option>
		</select>
	</p>
	<p>
		<label for="_bnz_hide_title">Hide Title?</label>
		<input type="checkbox" name="_bnz_hide_title" id="_bnz_hide_title" <?php checked( $hideChecked, 'on' ); ?>>
	</p>
	<?php
}

function bnz_media_uploader($hook) {
	if( $hook != 'post.php' && $hook != 'post-new.php' ) {	return;	}
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/media-uploader.js' );
}
add_action('admin_enqueue_scripts', 'bnz_media_uploader');





function bnz_save_meta_header( $post_id, $post ) {
	/*
	 * Header Options
	 * Verify the nonce before proceeding.
	 */
	if ( !isset( $_POST['bnz_header_nonce'] ) || !wp_verify_nonce( $_POST['bnz_header_nonce'], basename( __FILE__ ) ) ) return $post_id;
	/* Save Media Image */
	if( isset( $_POST['_haederbg_cover_img'] ) ) {
		$image_id = (int) $_POST['_haederbg_cover_img'];
		update_post_meta( $post_id, '_header_background_id', $image_id );
	}
	/* Save Title Alignment
	 * Make sure data is set before trying to save it */
	if ( isset( $_POST['_bnz_title_align'] ) )
		update_post_meta( $post_id, '_bnz_title_align', esc_attr( $_POST['_bnz_title_align'] ) );
	/* Save Title Hide */
	$titleHide = isset( $_POST['_bnz_hide_title'] ) ? 'on' : '';
	   update_post_meta( $post_id, '_bnz_hide_title', $titleHide );
}
