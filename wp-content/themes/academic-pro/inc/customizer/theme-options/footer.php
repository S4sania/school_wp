<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/*Footer Section*/
$wp_customize->add_section( 'academic_pro_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'academic-pro' ),
		'priority'   			=> 900,
		'panel'      			=> 'academic_pro_theme_options_panel',
	)
);

// Copyright text setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[copyright_text]', array(
	'sanitize_callback'   => 'wp_kses_post',
	'default'             => $options['copyright_text']
) );

$wp_customize->add_control( 'academic_pro_theme_options[copyright_text]', array(
	'label'               => esc_html__( 'Copyright', 'academic-pro' ),
	'section'             => 'academic_pro_section_footer',
	'type'                => 'textarea',
) );

// scroll top visible
$wp_customize->add_setting( 'academic_pro_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback'		=> 'academic_pro_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'academic_pro_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'academic-pro' ),
		'section'    			=> 'academic_pro_section_footer',
		'type'		 			=> 'checkbox',
    )
);