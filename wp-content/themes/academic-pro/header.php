<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Academic Pro
	 * @since 1.0
	 */

	/**
	 * academic_pro_doctype hook
	 *
	 * @hooked academic_pro_doctype -  10
	 *
	 */
	do_action( 'academic_pro_doctype' );

?>
<head>
<?php
	/**
	 * academic_pro_before_wp_head hook
	 *
	 * @hooked academic_pro_head -  10
	 *
	 */
	do_action( 'academic_pro_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * academic_pro_loader_action hook
	 *
	 * @hooked academic_pro_loader -  10
	 *
	 */
	do_action( 'academic_pro_loader_action' );

	/**
	 * academic_pro_page_start hook
	 *
	 * @hooked academic_pro_page_start -  10
	 *
	 */
	do_action( 'academic_pro_page_start' );

	/**
	 * academic_pro_top_bar hook
	 *
	 * @hooked academic_pro_add_top_bar -  10
	 *
	 */
	do_action( 'academic_pro_top_bar' );

	/**
	 * academic_pro_header hook
	 *
	 * @hooked academic_pro_header_start       - 10
	 * @hooked academic_pro_site_branding_start- 20
	 * @hooked academic_pro_site_logo          - 30
	 * @hooked academic_pro_site_header        - 40
	 * @hooked academic_pro_site_branding_end  - 50
	 * @hooked academic_pro_navigation         - 60
	 * @hooked academic_pro_header_end         - 100
	 *
	 */
	do_action( 'academic_pro_header' );

	/**
	 * academic_pro_mobile_menu hook
	 *
	 * @hooked academic_pro_mobile_menu -  10
	 *
	 */
	do_action( 'academic_pro_mobile_menu' );

	/**
	 * academic_pro_content_start hook
	 *
	 * @hooked academic_pro_content_start -  10
	 *
	 */
	do_action( 'academic_pro_content_start' );

	if( is_home() || !is_front_page() ) { 
		/**
		 * academic_pro_banner_image_action hook
		 *
		 * @hooked academic_pro_custom_header -  10
		 */
		do_action( 'academic_pro_banner_image_action' );
	}
	/**
	 * academic_pro_modules hook
	 *
	 * @hooked academic_pro_content_start -  10
	 *
	 */
	do_action( 'academic_pro_modules' );

	/**
	 * academic_pro_breadcrumb_action hook
	 *
	 * @hooked academic_pro_add_breadcrumb -  10
	 *
	 */
	do_action( 'academic_pro_breadcrumb_action' );

	/**
	* academic_pro_primary_content hook
	*
	* @hooked academic_pro_add_slider_section - 10
	* @hooked academic_pro_add_about_section - 20
	* @hooked academic_pro_add_category_blog_one - 30
	* @hooked academic_pro_add_category_blog_two - 50
	* @hooked academic_pro_add_category_blog_three - 60
	* @hooked academic_pro_add_category_blog_four - 70
	* @hooked academic_pro_add_call_to_action - 80
	*
	*/
	do_action( 'academic_pro_primary_content' );