<?php
/**
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 * Outputs the content of the sidebar position
 */
function academic_pro_header_image_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'academic_pro_nonce' );
    $stored_header_image_option = get_post_meta( $post->ID, 'academic-pro-header-image', true );

    $header_image_options       = academic_pro_header_image();
    ?>

    <p>
     <label for="academic-pro-header-image" class="academic-pro-row-title"><?php esc_html_e( 'Header Image', 'academic-pro' )?></label>
     <select name="academic-pro-header-image" id="academic-pro-header-image">

        <?php foreach ( $header_image_options as $header_image_option => $value ) { ?>
         <option value="<?php echo esc_attr( $header_image_option );?>" <?php if ( isset ( $stored_header_image_option ) ) selected( $stored_header_image_option, $header_image_option ); ?>><?php echo esc_html( $value ); ?></option>
        <?php } ?>
     </select>
    </p>
    <?php
}


/**
 * Saves the sidebar position input
 */
function academic_pro_sidebar_header_image_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'academic_pro_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'academic_pro_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'academic-pro-header-image' ] ) ) {
        update_post_meta( $post_id, 'academic-pro-header-image', sanitize_text_field( $_POST[ 'academic-pro-header-image' ] ) );
    }

}
add_action( 'save_post', 'academic_pro_sidebar_header_image_save' );