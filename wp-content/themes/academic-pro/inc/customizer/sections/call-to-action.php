<?php
/**
* Call To Action options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add call to action enable section
$wp_customize->add_section( 'academic_pro_call_to_action', array(
	'title'             => esc_html__( 'Call To Action','academic-pro' ),
	'description'       => esc_html__( 'Call To Action options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add call to action enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_enable]', array(
	'default'           => $options['call_to_action_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_call_to_action',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Add call to action type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_type]', array(
	'default'           => $options['call_to_action_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_type]', array(
	'label'             => esc_html__( 'Content Type', 'academic-pro' ),
	'section'           => 'academic_pro_call_to_action',
	'type'              => 'select',
	'choices'           => academic_pro_content_type(),
	'active_callback'	=> 'academic_pro_call_to_action_active'
) );

// Add call to action title.
$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_title]', array(
	'default'           => $options['call_to_action_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_title]', array(
	'label'             => esc_html__( 'Title', 'academic-pro' ),
	'section'           => 'academic_pro_call_to_action',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_call_to_action_custom_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[call_to_action_title]', array(
		'selector'            => '#background-image-section .container .color-white.text-capitalize',
		'render_callback'     => 'academic_pro_partial_call_to_action_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add call to action title.
$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_sub_title]', array(
	'default'           => $options['call_to_action_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_call_to_action',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_call_to_action_custom_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[call_to_action_sub_title]', array(
		'selector'            => '#background-image-section .container .color-yellow',
		'render_callback'     => 'academic_pro_partial_call_to_action_sub_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

for ( $i = 1; $i <= 2; $i++ ){
	// Display button option.
	$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_btn_enable_'. $i .']', array(
		'default'           => $options['call_to_action_btn_enable_'. $i],
		'sanitize_callback' => 'academic_pro_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_btn_enable_'. $i .']', array(
		'label'             => esc_html__( 'Display Button', 'academic-pro' ) . $i,
		'section'           => 'academic_pro_call_to_action',
		'type'              => 'checkbox',
		'active_callback'	=> 'academic_pro_call_to_action_custom_active'
	) );

	// Add button label.
	$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_btn_label_'. $i .']', array(
		'default'           => $options['call_to_action_btn_label_'. $i],
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_btn_label_'. $i .']', array(
		'label'             => esc_html__( 'Button label ', 'academic-pro' ) . $i,
		'section'           => 'academic_pro_call_to_action',
		'type'              => 'text',
		'active_callback'	=> 'academic_pro_call_to_action_btn_'. $i
	) );

	// Add button url.
	$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_btn_link_'. $i .']', array(
		'default'           => $options['call_to_action_btn_link_'. $i],
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_btn_link_'. $i .']', array(
		'label'             => esc_html__( 'Button link ', 'academic-pro' ) . $i,
		'section'           => 'academic_pro_call_to_action',
		'type'              => 'url',
		'active_callback'	=> 'academic_pro_call_to_action_btn_'. $i
	) );

	// Add button target.
	$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_btn_target_'. $i .']', array(
		'default'           => $options['call_to_action_btn_target_'. $i],
		'sanitize_callback' => 'academic_pro_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[call_to_action_btn_target_'. $i .']', array(
		'label'             => esc_html__( 'Open in new tab ', 'academic-pro' ) . $i,
		'section'           => 'academic_pro_call_to_action',
		'type'              => 'checkbox',
		'active_callback'	=> 'academic_pro_call_to_action_btn_'. $i
	) );

	// hr setting and control for call to action
	$wp_customize->add_setting( 'academic_pro_theme_options[call_to_action_btn_hr'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[call_to_action_btn_hr'. $i .']',
		array(
			'section'         => 'academic_pro_call_to_action',
			'type'			  => 'hr',
			'active_callback' => 'academic_pro_call_to_action_btn_'. $i
	) ) );
}