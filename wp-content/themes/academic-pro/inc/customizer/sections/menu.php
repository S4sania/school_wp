<?php
/**
 * Menu Customizer options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */


// Add additonal menu section
$wp_customize->add_section( 'academic_pro_additional_menu_options', array(
	'title'             => esc_html__( 'Additional Options','academic-pro' ),
	'description'       => esc_html__( 'Additional menu options.', 'academic-pro' ),
	'panel'             => 'nav_menus',
	'priority'          => 5
) );

// Enable search option.
$wp_customize->add_setting( 'academic_pro_theme_options[append_search]', array(
	'default'           => $options['append_search'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[append_search]', array(
	'label'             => esc_html__( 'Append search bar', 'academic-pro' ),
	'section'           => 'academic_pro_additional_menu_options',
	'type'				=> 'checkbox'
) );

// Make menu sticky option.
$wp_customize->add_setting( 'academic_pro_theme_options[make_menu_sticky]', array(
	'default'           => $options['make_menu_sticky'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[make_menu_sticky]', array(
	'label'             => esc_html__( 'Make menu sticky', 'academic-pro' ),
	'section'           => 'academic_pro_additional_menu_options',
	'type'				=> 'checkbox'
) );