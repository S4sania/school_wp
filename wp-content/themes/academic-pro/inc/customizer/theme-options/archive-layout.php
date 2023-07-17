<?php
/**
* Archive options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

$wp_customize->add_section( 'academic_pro_archive', array(
	'title'             => esc_html__( 'Archive Custom Layout','academic-pro' ),
	'description'       => esc_html__( '<b>Note</b>: The layout works only for the below selected categories.', 'academic-pro' ),
	'panel'             => 'academic_pro_theme_options_panel'
) );

// Add category options for grid and list layout
$wp_customize->add_setting(  'academic_pro_theme_options[archive_grid_category]', array(
	'sanitize_callback' => 'academic_pro_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Academic_Pro_Dropdown_Category_Control ( $wp_customize,'academic_pro_theme_options[archive_grid_category]', array(
	'label'             => esc_html__( 'Select Categories ', 'academic-pro' ),
	'description'       => esc_html__( 'Select Categories to be viewed in custom layout.', 'academic-pro' ),
	'section'           => 'academic_pro_archive',
	'type'              => 'dropdown-categories',
) ) );

// Default layout for archive grid.
$wp_customize->add_setting( 'academic_pro_theme_options[archive_grid_layout]', array(
	'sanitize_callback'   => 'academic_pro_sanitize_select',
	'default'             => $options['archive_grid_layout']
) );

$wp_customize->add_control( 'academic_pro_theme_options[archive_grid_layout]', array(
	'label'               => esc_html__( 'Archive Layout', 'academic-pro' ),
	'section'             => 'academic_pro_archive',
	'type'                => 'select',
	'choices'			  => academic_pro_archive_gird_layout(),
) );