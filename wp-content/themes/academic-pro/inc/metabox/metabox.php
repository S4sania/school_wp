<?php
/**
 * Academic Pro metabox file.
 *
 * This is the template that includes all the other files for metaboxes of Academic Pro theme
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

// Include slider layout meta
require get_template_directory() . '/inc/metabox/sidebar-layout.php';

// Include header image meta
require get_template_directory() . '/inc/metabox/header-image.php';

// Include event meta
require get_template_directory() . '/inc/metabox/event.php';

/**
 * Adds meta box to the post editing screen
 */
function academic_pro_custom_meta() {
	// Event meta
    add_meta_box( 'academic_pro_event_meta', esc_html__( 'Event Options', 'academic-pro' ), 'academic_pro_event_meta_callback', array( 'post' ) );
	
	// Sidebar layout meta
    add_meta_box( 'academic_pro_sidebar_layout_meta', esc_html__( 'Sidebar Layout', 'academic-pro' ), 'academic_pro_sidebar_position_callback', array( 'post', 'page', 'jetpack-testimonial' ) );
	
	// Header image meta
    add_meta_box( 'academic_pro_header_image', esc_html__( 'Header Image', 'academic-pro' ), 'academic_pro_header_image_callback', array( 'post', 'page' ) );
}
add_action( 'add_meta_boxes', 'academic_pro_custom_meta' );


