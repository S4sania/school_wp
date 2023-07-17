<?php
/**
* Loader options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

$wp_customize->add_section( 'academic_pro_loader', array(
	'title'               => esc_html__( 'Loader','academic-pro' ),
	'description'         => esc_html__( 'Loader section options.', 'academic-pro' ),
	'panel'               => 'academic_pro_theme_options_panel'
) );

// Loader enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[loader_enable]', array(
	'sanitize_callback'   => 'academic_pro_sanitize_checkbox',
	'default'             => $options['loader_enable']
) );

$wp_customize->add_control( 'academic_pro_theme_options[loader_enable]', array(
	'label'               => esc_html__( 'Enable loader', 'academic-pro' ),
	'section'             => 'academic_pro_loader',
	'type'                => 'checkbox',
) );

// Loader icons setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[loader_icon]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['loader_icon'],
) );

$wp_customize->add_control( 'academic_pro_theme_options[loader_icon]', array(
	'label'           => esc_html__( 'Icon', 'academic-pro' ),
	'description'       => sprintf( esc_html__( 'Example fa-refresh see more at %1$s Font awesome %2$s.', 'academic-pro' ), '<a target="_blank" href="' . esc_url( 'http://fontawesome.io/icons/' ) . '">', '</a>'),
	'section'         => 'academic_pro_loader',
	'active_callback' => 'academic_pro_is_loader_enable',
) );