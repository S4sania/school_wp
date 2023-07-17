<?php
/**
 * Academic Pro Theme Customizer Color Options
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

// Add reset enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[color_layout]', array(
	'default'           => $options['color_layout'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_pro_theme_options[color_layout]', array(
	'label'             => esc_html__( 'Color Layout', 'academic-pro' ),
	'section'           => 'colors',
) ) );