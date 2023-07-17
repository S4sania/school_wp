<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'academic_pro_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content']
) );

$wp_customize->add_control( 'academic_pro_theme_options[enable_frontpage_content]', array(
	'label'       => esc_html__( 'Enable Content', 'academic-pro' ),
	'description' => esc_html__( 'Check to enable content on static front page only.', 'academic-pro' ),
	'section'     => 'static_front_page',
	'type'        => 'checkbox'
) );