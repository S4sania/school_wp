<?php
/**
* Custom css
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// custom css section
$wp_customize->add_section( 'academic_pro_custom_css', array(
	'title'             	=> esc_html__( 'Custom CSS','academic-pro' ),
	'panel'             	=> 'academic_pro_theme_options_panel',
	'priority'   			=> 900,
) );

// Setting custom_css.
$wp_customize->add_setting( 'academic_pro_theme_options[custom_css]',
	array(
	'sanitize_callback'    	=> 'wp_strip_all_tags',
	'sanitize_js_callback' 	=> 'wp_strip_all_tags',
	)
);
$wp_customize->add_control( 'academic_pro_theme_options[custom_css]',
	array(
	'label'    				=> esc_html__( 'Custom CSS', 'academic-pro' ),
	'section'  				=> 'academic_pro_custom_css',
	'type'     				=> 'textarea',
	)
);
