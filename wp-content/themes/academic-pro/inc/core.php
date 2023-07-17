<?php
/**
 * Academic Pro core file.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function academic_pro_theme_updater() {
  if( is_admin() ) {
    require get_template_directory() . '/inc/updater/theme-updater.php';
  }
}
add_action( 'after_setup_theme', 'academic_pro_theme_updater' );


/**
 * Load tgmpa
 */
require_once get_template_directory() . '/inc/tgmpa/tgmpa-hook.php';

/**
 * Include options function.
 */
require get_template_directory() . '/inc/options.php';


// Load customizer defaults values
require get_template_directory() . '/inc/customizer/defaults.php';


/**
 * Merge values from default options array and values from customizer
 *
 * @return array Values returned from customizer
 * @since Academic Pro 1.0
 */
function academic_pro_get_theme_options() {
  $academic_pro_default_options = academic_pro_get_default_theme_options();

  return array_merge( $academic_pro_default_options , get_theme_mod( 'academic_pro_theme_options', $academic_pro_default_options ) ) ;
}


/**
  * Write message for featured image upload
  *
  * @return array Values returned from customizer
  * @since Academic Pro 1.0
*/
function academic_pro_slider_image_instruction( $content, $post_id ) {
  $allowed = array( 'page' );
  if ( in_array( get_post_type( $post_id ), $allowed ) ) {
    return $content .= '<p><b>' . esc_html__( 'Note', 'academic-pro' ) . ':</b>' . esc_html__( ' The recommended size for image is 1170px by 500 while using it for slider', 'academic-pro' ) . '</p>';
  } elseif ( 'jetpack-testimonial' == get_post_type( $post_id ) ) {
    return $content .= '<p><b>' . esc_html__( 'Note', 'academic-pro' ) . ':</b>' . esc_html__( ' The recommended size for image is 411px by 509px while using it for testimonial', 'academic-pro' ) . '</p>';
  }
   return $content;
}
add_filter( 'admin_post_thumbnail_html', 'academic_pro_slider_image_instruction', 10, 2);

/**
 * Add breadcrumb functions.
 */
require get_template_directory() . '/inc/breadcrumb-class.php';
/**
 * Add helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Add structural hooks.
 */
require get_template_directory() . '/inc/structure.php';

/**
 * Add metabox
 */
require get_template_directory() . '/inc/metabox/metabox.php';

/**
 * modules additions.
 */
require get_template_directory() . '/inc/modules/modules.php';

/**
 * Custom widget additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
 * Load woocommerce compatibility file.
 */
require get_template_directory() . '/inc/woocommerce.php';


if ( class_exists( 'CatchThemesDemoImportPlugin' ) ) {
    /**
    * OCDI plugin demo importer compatibility.
    */
    require get_template_directory() . '/inc/demo-import.php';
}