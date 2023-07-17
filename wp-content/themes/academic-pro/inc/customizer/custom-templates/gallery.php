<?php
/**
* Gallery Page options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add about enable section
$wp_customize->add_section( 'academic_pro_gallery_page', array(
	'title'             => esc_html__( 'Gallery Page','academic-pro' ),
	'description'       => esc_html__( 'Gallery Page options.', 'academic-pro' ),
	'panel'             => 'academic_pro_custom_template_option_panel'
) );

// Add gallery category setting and control
$wp_customize->add_setting(  'academic_pro_theme_options[gallery_multiple_category]', array(
	'sanitize_callback' => 'academic_pro_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Academic_Pro_Dropdown_Category_Control ( $wp_customize,'academic_pro_theme_options[gallery_multiple_category]', array(
	'label'             => esc_html__( 'Select Categories', 'academic-pro' ),
	'description'       => esc_html__( 'Displays post\'s featured images of selected categories.', 'academic-pro' ),
	'section'           => 'academic_pro_gallery_page',
	'type'              => 'dropdown-categories',
) ) );