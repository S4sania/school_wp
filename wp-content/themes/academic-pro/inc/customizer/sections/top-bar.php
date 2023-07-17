<?php
/**
 * Top bar customizer options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */


// Add top bar section
$wp_customize->add_section( 'academic_pro_top_bar_options', array(
	'title'             => esc_html__( 'Top Bar','academic-pro' ),
	'description'       => esc_html__( 'Options for top bar.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel',
) );

// Show top bar setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_show]', array(
	'default'           => $options['top_bar_show'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[top_bar_show]', array(
	'label'             => esc_html__( 'Show Top Bar', 'academic-pro' ),
	'section'           => 'academic_pro_top_bar_options',
	'type'				=> 'checkbox',
) );

// Move login menu setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_move_menu_left]', array(
	'default'           => $options['top_bar_move_menu_left'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[top_bar_move_menu_left]', array(
	'active_callback'=> 'academic_pro_is_top_bar_enable',
	'label'          => esc_html__( 'Align Login menu to left.', 'academic-pro' ),
	'section'        => 'academic_pro_top_bar_options',
	'type'           => 'checkbox',
) );

// Top bar content type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_content_type]', array(
	'default'           => $options['top_bar_content_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select',
) );

$wp_customize->add_control( 'academic_pro_theme_options[top_bar_content_type]', array(
	'active_callback'=> 'academic_pro_is_top_bar_enable',
	'label'          => esc_html__( 'Content Type', 'academic-pro' ),
	'section'        => 'academic_pro_top_bar_options',
	'type'           => 'select',
	'choices'        => academic_pro_content_type()
) );

// Background color setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_bg_color]', array(
	'default'           => $options['top_bar_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( 
	$wp_customize, 'academic_pro_theme_options[top_bar_bg_color]', array(
	'active_callback'=> 'academic_pro_is_top_bar_enable',
	'label'          => esc_html__( 'Background Color', 'academic-pro' ),
	'section'        => 'academic_pro_top_bar_options',
) ) );

// Number of fields setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_field_number]', array(
	'default'           => $options['top_bar_field_number'],
	'sanitize_callback' => 'academic_pro_sanitize_number_range',
	'validate_callback' => 'academic_pro_top_bar_field_number'
) );

$wp_customize->add_control( 'academic_pro_theme_options[top_bar_field_number]', array(
	'active_callback'=> 'academic_pro_is_top_bar_demo_disable',
	'label'          => esc_html__( 'Number of fields', 'academic-pro' ),
	'description'    => sprintf( esc_html__( '%1$sNote%2$s: Refresh after changing this field value.', 'academic-pro' ), '<b>', '</b>' ),
	'section'        => 'academic_pro_top_bar_options',
	'type'           => 'number',
	'input_attrs'    => array(
		'max' => 3,
		'min' => 1,
	)
) );

for ( $i=1; $i <= intval( $options['top_bar_field_number'] ); $i++ ) { 
	// Field icon setting and control.
	$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_icon_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[top_bar_icon_'.$i.']', array(
		'active_callback'=> 'academic_pro_is_top_bar_demo_disable',
		'label'          => esc_html__( 'Icon #', 'academic-pro' ).$i,
		'description'    => sprintf( esc_html__( 'Use font awesome icon: Eg: %1$s. %2$sSee more here%3$s', 'academic-pro' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
		'section'        => 'academic_pro_top_bar_options',
		'type'           => 'text',
		'input_attrs'    => array(
			'placeholder' => 'fa-phone',
		)
	) );

	// Field value setting and control.
	$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_value_'.$i.']', array(
		'sanitize_callback' => 'esc_textarea',
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[top_bar_value_'.$i.']', array(
		'active_callback'=> 'academic_pro_is_top_bar_demo_disable',
		'label'          => esc_html__( 'Field Value #', 'academic-pro' ).$i,
		'section'        => 'academic_pro_top_bar_options',
		'type'           => 'textarea',
	) );

	// Field horizontal line setting and control.
	$wp_customize->add_setting( 'academic_pro_theme_options[top_bar_hr_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[top_bar_hr_'.$i.']', array(
		'active_callback'=> 'academic_pro_is_top_bar_demo_disable',
		'label'          => esc_html__( 'Field Value #', 'academic-pro' ).$i,
		'section'        => 'academic_pro_top_bar_options',
		'type'           => 'hr',
	) ) );
}
