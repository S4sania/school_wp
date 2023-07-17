<?php
/**
* Slider options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add slider enable section
$wp_customize->add_section( 'academic_pro_slider_section', array(
	'title'             => esc_html__( 'Slider','academic-pro' ),
	'description'       => esc_html__( 'Slider section options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add slider enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[slider_enable]', array(
	'default'           => $options['slider_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_slider_section',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Add slider effects setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[slider_content_effect]', array(
	'default'           => $options['slider_content_effect'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_content_effect]', array(
	'label'           => esc_html__( 'Transition Effects', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'select',
	'active_callback' => 'academic_pro_is_slider_active',
	'choices'         => academic_pro_slider_effect(),
) );

// Add enable arrow controls setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[enable_slider_controls]', array(
	'default'           => $options['enable_slider_controls'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[enable_slider_controls]', array(
	'label'           => esc_html__( 'Enable Arrow Controls', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_pro_is_slider_active',
) );

// Add enable slider pager setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[enable_slider_pager]', array(
	'default'           => $options['enable_slider_pager'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[enable_slider_pager]', array(
	'label'           => esc_html__( 'Enable Pager Controls', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_pro_is_slider_active',
) );

// Add enable slider dragable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[enable_slider_dragable]', array(
	'default'           => $options['enable_slider_dragable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[enable_slider_dragable]', array(
	'label'           => esc_html__( 'Slider Dragable', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_pro_is_slider_active',
) );

// Add enable slider pause on hover setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[slider_pause_on_hover]', array(
	'default'           => $options['slider_pause_on_hover'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_pause_on_hover]', array(
	'label'           => esc_html__( 'Pause On Hover', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_pro_is_slider_active',
) );

// Add enable slider call to action setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[slider_call_to_action]', array(
	'default'           => $options['slider_call_to_action'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_call_to_action]', array(
	'label'           => esc_html__( 'Call To Action', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_pro_is_slider_active',
) );

// Add enable slider caption setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[enable_slider_caption]', array(
	'default'           => $options['enable_slider_caption'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[enable_slider_caption]', array(
	'label'           => esc_html__( 'Enable Caption.', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_pro_is_slider_active',
) );

// Add enable slider call to action label
$wp_customize->add_setting( 'academic_pro_theme_options[slider_call_to_action_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_call_to_action_label]', array(
	'label'           => esc_html__( 'Call To Action Button Label', 'academic-pro' ),
	'description'     => esc_html__( 'Notice: Please input label and URL to display call to action button.', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'text',
	'active_callback' => 'academic_pro_slider_call_to_action',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[slider_call_to_action_label]', array(
		'selector'            => '#main-slider .slider-item .buttons .btn-yellow',
		'render_callback'     => 'academic_pro_partial_slider_calltoaction',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add enable slider call to action link
$wp_customize->add_setting( 'academic_pro_theme_options[slider_call_to_action_link]', array(
	'sanitize_callback' => 'esc_url'
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_call_to_action_link]', array(
	'label'           => esc_html__( 'Call To Action Link', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'url',
	'active_callback' => 'academic_pro_slider_call_to_action',
) );

// Add enable slider call to action new tab.
$wp_customize->add_setting( 'academic_pro_theme_options[slider_call_to_action_new_tab]', array(
	'default'           => $options['slider_call_to_action_new_tab'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_call_to_action_new_tab]', array(
	'label'           => esc_html__( 'Open in new tab', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_pro_slider_call_to_action',
) );


// Slider post hr setting and control for call to action
$wp_customize->add_setting( 'academic_pro_theme_options[slider_call_to_action_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[slider_call_to_action_hr]',
	array(
		'section'         => 'academic_pro_slider_section',
		'active_callback' => 'academic_pro_slider_call_to_action',
		'type'				=> 'hr'
) ) );

// Add slider content type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[slider_content_type]', array(
	'default'           => $options['slider_content_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[slider_content_type]', array(
	'label'           => esc_html__( 'Content Type', 'academic-pro' ),
	'description'     => esc_html__( 'Recommended slider image size is 1170x500 px', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'select',
	'active_callback' => 'academic_pro_is_slider_active',
	'choices'         => academic_pro_slider_content_type()
) );

// Add slider number setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[no_of_slider]', array(
	'default'           => $options['no_of_slider'],
	'sanitize_callback' => 'academic_pro_sanitize_number_range',
	'validate_callback' => 'academic_pro_validate_no_of_slider',
) );

$wp_customize->add_control( 'academic_pro_theme_options[no_of_slider]', array(
	'label'           => esc_html__( 'Number of slides', 'academic-pro' ),
	'description'     => esc_html__( 'Notice: Please refresh after the number of slides is set to see the effects.', 'academic-pro' ),
	'section'         => 'academic_pro_slider_section',
	'type'            => 'number',
	'active_callback' => 'academic_pro_slider_demo_active',
	'input_attrs'     => array(
		'max' => 5,
		'min' => 1,
		'style' => 'width:100px'
	)
) );

/**
 * Page Content Type
 */
for ($i=1; $i <= $options['no_of_slider']; $i++) {
	// Show page drop-down setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[slider_content_page_'.$i.']', array(
		'sanitize_callback' => 'academic_pro_sanitize_page'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[slider_content_page_'.$i.']', array(
		'label'           => sprintf( esc_html__( 'Page Slider #%s', 'academic-pro' ), $i ),
		'section'         => 'academic_pro_slider_section',
		'active_callback' => 'academic_pro_is_slider_page_content_active',
		'type'				=> 'dropdown-pages'
	) );

	// Slider page hr setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[slider_content_page_hr'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[slider_content_page_hr'.$i.']',
		array(
			'section'         => 'academic_pro_slider_section',
			'active_callback' => 'academic_pro_is_slider_page_content_active',
			'type'				=> 'hr'
	) ) );
}

/*
* Post Content Type
 */
for ($i=1; $i <= $options['no_of_slider']; $i++) {
	// Show post type setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[slider_content_post_'.$i.']', array(
		'sanitize_callback' => 'academic_pro_sanitize_number_range'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[slider_content_post_'.$i.']', array(
		'label'           => sprintf( esc_html__( 'Post Slider #%s', 'academic-pro' ), $i ),
		'description'     => esc_html__( 'Enter the Post ID here.', 'academic-pro' ),
		'section'         => 'academic_pro_slider_section',
		'active_callback' => 'academic_pro_is_slider_post_content_active',
		'type'			  => 'number',
		'input_attrs'     => array(
			'min'	=> 0
			)
	) );

	// Slider post hr setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[slider_content_post_hr'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[slider_content_post_hr'.$i.']',
		array(
			'section'         => 'academic_pro_slider_section',
			'active_callback' => 'academic_pro_is_slider_post_content_active',
			'type'				=> 'hr'
	) ) );
}

/*
* Category Content Type
*/
// Add  dropdown category setting and control.
$wp_customize->add_setting(  'academic_pro_theme_options[slider_content_category]', array(
	'sanitize_callback' => 'absint',
) ) ;


$wp_customize->add_control( new Academic_Pro_Dropdown_Taxonomies_Control( $wp_customize,'academic_pro_theme_options[slider_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'academic-pro' ),
	'section'           => 'academic_pro_slider_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'academic_pro_slider_content_category_active',
) ) );