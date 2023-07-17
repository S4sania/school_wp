<?php
/**
* Layout options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add sidebar section
$wp_customize->add_section( 'academic_pro_layout', array(
	'title'               => esc_html__( 'Layout','academic-pro' ),
	'description'         => esc_html__( 'Layout section options.', 'academic-pro' ),
	'panel'               => 'academic_pro_theme_options_panel'
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'academic_pro_sanitize_select',
	'default'             => $options['sidebar_position']
) );

$wp_customize->add_control( 'academic_pro_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Sidebar Position', 'academic-pro' ),
	'section'             => 'academic_pro_layout',
	'type'                => 'select',
	'choices'			  => academic_pro_sidebar_position(),
) );

// Site layout setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[site_layout]', array(
	'sanitize_callback'   => 'academic_pro_sanitize_select',
	'default'             => $options['site_layout']
) );

$wp_customize->add_control( 'academic_pro_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'academic-pro' ),
	'section'             => 'academic_pro_layout',
	'type'                => 'select',
	'choices'			  => academic_pro_site_layout(),
) );
