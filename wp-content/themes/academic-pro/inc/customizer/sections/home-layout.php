<?php 

$wp_customize->add_section( 'academic_pro_home_layout', array(
	'title'             => esc_html__( 'Home Page Layout','academic-pro' ),
	'description'       => esc_html__( 'Home Page Layout option.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel',
) );


$wp_customize->add_setting( 'academic_pro_theme_options[home_layout]', array(
		'default'           => $options['home_layout'],
		'sanitize_callback' => 'academic_pro_sanitize_select',
		'transport'			=> 'refresh'
	) );

$wp_customize->add_control( 'academic_pro_theme_options[home_layout]', array(
	'priority'			=> 50,
	'type'				=> 'radio',
	'label'             => esc_html__( 'Select Homepage layout', 'academic-pro' ),
	'section'           => 'academic_pro_home_layout',
	'choices'				 => array( 
		'default-design'     => esc_html__( 'Default Design', 'academic-pro' ),
		'second-design'      => esc_html__( 'Second Design', 'academic-pro' ),
		'third-design'       => esc_html__( 'Business Design', 'academic-pro' ),
		'fourth-design'      => esc_html__( 'Medical Design', 'academic-pro' ),
		)
) );