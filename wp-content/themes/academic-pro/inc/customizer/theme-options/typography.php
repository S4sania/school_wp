<?php
/**
 * Typography options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */
// Typography
$wp_customize->add_section( 'academic_pro_section_typography',
	array(
		'title'      		=> esc_html__( 'Typography', 'academic-pro' ),
		'priority'   		=> 600,
		'panel'      		=> 'academic_pro_theme_options_panel',
	)
);

$wp_customize->add_setting( 'academic_pro_theme_options[theme_typography]',
	array(
		'default'    		=> $options['theme_typography'],
		'sanitize_callback'	=> 'academic_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'academic_pro_theme_options[theme_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Typography', 'academic-pro' ),
		'section'     		=> 'academic_pro_section_typography',
		'settings'    		=> 'academic_pro_theme_options[theme_typography]',
		'type'		  		=> 'select',
		'choices'			=> academic_pro_typography_options(),
    )
);