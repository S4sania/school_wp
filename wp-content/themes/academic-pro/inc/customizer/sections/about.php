<?php
/**
* About options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add about enable section
$wp_customize->add_section( 'academic_pro_about_section', array(
	'title'             => esc_html__( 'About','academic-pro' ),
	'description'       => esc_html__( 'About section options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add about enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_section_enable]', array(
	'default'           => $options['about_section_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Add about content enable
$wp_customize->add_setting( 'academic_pro_theme_options[about_content_enable]', array(
	'default'           => $options['about_content_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_content_enable]', array(
	'label'             => esc_html__( 'Display About Content', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_pro_is_about_active'
) );

// Add about content type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_content_type]', array(
	'default'           => $options['about_content_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'select',
	'choices'           => academic_pro_about_content_options(),
	'active_callback'	=> 'academic_pro_is_about_active'
) );

// Add about title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_content_title]', array(
	'default'           => $options['about_content_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_content_title]', array(
	'label'             => esc_html__( 'Title', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_is_about_content_custom'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[about_content_title]', array(
		'selector'            => '#welcome-section .column-wrapper .entry-header .entry-title',
		'render_callback'     => 'academic_pro_partial_about_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add about sub title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_content_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_content_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_is_about_content_custom'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[about_content_sub_title]', array(
		'selector'            => '#welcome-section .container .column-wrapper .entry-header .entry-subtitle',
		'render_callback'     => 'academic_pro_partial_about_sub_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add about content setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_content]', array(
	'sanitize_callback' => 'academic_pro_santize_line_break'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_content]', array(
	'label'             => esc_html__( 'Description', 'academic-pro' ),
	'description'       => esc_html__( '<br> and <p> tag is allowed for line break.', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'textarea',
	'active_callback'	=> 'academic_pro_is_about_content_custom'
) );

// Add about link label setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_btn_label]', array(
	'label'             => esc_html__( 'Button Link Label', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_is_about_content_custom'
) );

// Add about link label setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_btn_link]', array(
	'sanitize_callback' => 'esc_url'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_btn_link]', array(
	'label'             => esc_html__( 'Button Link Url', 'academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'url',
	'active_callback'	=> 'academic_pro_is_about_content_custom'
) );

// Add enable target blank
$wp_customize->add_setting( 'academic_pro_theme_options[about_link_target]', array(
	'default'           => $options['about_link_target'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_link_target]', array(
	'label'           	=> esc_html__( 'Open in New Tab', 'academic-pro' ),
	'section'         	=> 'academic_pro_about_section',
	'type'            	=> 'checkbox',
	'active_callback' 	=> 'academic_pro_is_about_content_custom',
) );

// about content custom hr setting and control for call to action
$wp_customize->add_setting( 'academic_pro_theme_options[about_custom_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[about_custom_hr]',
	array(
		'section'         => 'academic_pro_about_section',
		'active_callback' => 'academic_pro_is_about_content_custom',
		'type'			  => 'hr'
) ) );

// Add enable page select setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[about_content_page]', array(
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_content_page]', array(
	'label'           	=> esc_html__( 'Select Page', 'academic-pro' ),
	'section'         	=> 'academic_pro_about_section',
	'type'            	=> 'dropdown-pages',
	'active_callback' 	=> 'academic_pro_is_about_content_page',
) );

// about content custom hr setting and control for call to action
$wp_customize->add_setting( 'academic_pro_theme_options[about_page_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[about_page_hr]',
	array(
		'section'         => 'academic_pro_about_section',
		'active_callback' => 'academic_pro_is_about_content_page',
		'type'			  => 'hr'
) ) );
// Add statistics enable
$wp_customize->add_setting( 'academic_pro_theme_options[about_right_content_type]', array(
	'default'           => $options['about_right_content_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_right_content_type]', array(
	'label'             => esc_html__( 'Select Right Content Type', 'academic-pro' ),
	'description'		=> esc_html__( 'This option allows you to show whether the image or statistics details.','academic-pro' ),
	'section'           => 'academic_pro_about_section',
	'type'              => 'select',
	'active_callback'	=> 'academic_pro_is_about_demo_active',
	'choices'			=> array(

		'display-image'			=> esc_html__( 'Display Image','academic-pro' ),
		'statistics-details'	=> esc_html__( 'Display Statistics Details','academic-pro' ),
		),
) );

$wp_customize->add_setting( 'academic_pro_theme_options[about_custom_image]',
	  array(
	    'sanitize_callback' 	=> 'academic_pro_sanitize_image',
	  )
	);
	$wp_customize->add_control(
	  new WP_Customize_Image_Control( $wp_customize, 'academic_pro_theme_options[about_custom_image]',
	    array(
	    	'label'           	=> esc_html__( 'Select Image', 'academic-pro' ),
			'section'     		=> 'academic_pro_about_section',
			'active_callback'	=> 'academic_pro_is_about_content_custom_display_image',
	    )
	  )
	);

/******Statistics Details****/

// Statistics Details Label
$wp_customize->add_setting( 'academic_pro_theme_options[statistics_label]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Academic_Pro_Note_Control( $wp_customize, 'academic_pro_theme_options[statistics_label]',
	array(
		'label'           => esc_html__( 'Statistics Details', 'academic-pro' ),
		'section'         => 'academic_pro_about_section',
		'active_callback' => 'academic_pro_about_demo_active',
) ) );

// Add no of statistics .
$wp_customize->add_setting( 'academic_pro_theme_options[about_statistics_no]', array(
	'default'           => $options['about_statistics_no'],
	'sanitize_callback' => 'academic_pro_sanitize_number_range',
	'validate_callback' => 'academic_pro_validate_no_of_about_statistics'
) );

$wp_customize->add_control( 'academic_pro_theme_options[about_statistics_no]', array(
	'label'           	=> esc_html__( 'No. of Statistics Details', 'academic-pro' ),
	'description'     	=> esc_html__( 'Notice: Please refresh after the number of slides is set to see the effects.', 'academic-pro' ),
	'section'         	=> 'academic_pro_about_section',
	'type'            	=> 'number',
	'input_attrs'	  	=> array(
		'max' => 6,
		'min' => 1,
		'style' => 'width:100px'
		),
	'active_callback' 	=> 'academic_pro_about_demo_active',
) );

for ( $i = 1; $i <= $options['about_statistics_no']; $i++ ) {

	// Add about statistics title
	$wp_customize->add_setting( 'academic_pro_theme_options[about_statistics_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[about_statistics_title_' . $i . ']', array(
		'label'             => esc_html__( 'Title', 'academic-pro' ),
		'section'           => 'academic_pro_about_section',
		'type'              => 'text',
		'active_callback'	=> 'academic_pro_about_demo_active'
	) );

	// Add about statistics value
	$wp_customize->add_setting( 'academic_pro_theme_options[about_statistics_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[about_statistics_value_' . $i . ']', array(
		'label'             => esc_html__( 'Value', 'academic-pro' ),
		'section'           => 'academic_pro_about_section',
		'type'              => 'text',
		'active_callback'	=> 'academic_pro_about_demo_active'
	) );

	// Add about statistics icon
	$wp_customize->add_setting( 'academic_pro_theme_options[about_statistics_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[about_statistics_icon_' . $i . ']', array(
		'label'             => esc_html__( 'Icon', 'academic-pro' ),
		'description'       => sprintf( esc_html__( 'Use font awesome icon: Eg: %1$s. %2$sSee more here%3$s', 'academic-pro' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
		'section'           => 'academic_pro_about_section',
		'type'              => 'text',
		'active_callback'	=> 'academic_pro_about_demo_active'
	) );

	// Add about statistics bg color
	$wp_customize->add_setting( 'academic_pro_theme_options[about_statistics_color_' . $i . ']',
		array(
			'default'			=> $options['statistics_color'],
			'sanitize_callback'	=> 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_pro_theme_options[about_statistics_color_' . $i . ']',
	    array(
			'label'       		=> esc_html__( 'Choose Background Color', 'academic-pro' ),
			'section'     		=> 'academic_pro_about_section',
			'active_callback' 	=> 'academic_pro_about_demo_active',
	    )
	) );

	// about content custom hr setting and control for call to action
	$wp_customize->add_setting( 'academic_pro_theme_options[statistics_hr_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[statistics_hr_' . $i . ']',
		array(
			'section'         => 'academic_pro_about_section',
			'active_callback' => 'academic_pro_about_demo_active',
			'type'			  => 'hr'
	) ) );
}
