<?php
/**
* pagination options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add sidebar section
$wp_customize->add_section( 'academic_pro_pagination', array(
	'title'               => esc_html__( 'Pagination','academic-pro' ),
	'description'         => esc_html__( 'Pagination section options.', 'academic-pro' ),
	'panel'               => 'academic_pro_theme_options_panel'
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[pagination_enable]', array(
	'sanitize_callback'   => 'academic_pro_sanitize_checkbox',
	'default'             => $options['pagination_enable']
) );

$wp_customize->add_control( 'academic_pro_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'academic-pro' ),
	'section'             => 'academic_pro_pagination',
	'type'                => 'checkbox',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'academic_pro_sanitize_select',
	'default'             => $options['pagination_type']
) );

$wp_customize->add_control( 'academic_pro_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'academic-pro' ),
	'section'             => 'academic_pro_pagination',
	'type'                => 'select',
	'choices'			  => academic_pro_pagination_options(),
	'active_callback'	  => 'academic_pro_is_pagination_enable'
) );
