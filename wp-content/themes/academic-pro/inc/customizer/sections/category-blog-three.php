<?php
/**
* Category Blog Three options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add category blog three enable section
$wp_customize->add_section( 'academic_pro_category_blog_three', array(
	'title'             => esc_html__( 'Third Category Blog','academic-pro' ),
	'description'       => esc_html__( 'Third Category Blog options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add category blog three enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_enable]', array(
	'default'           => $options['category_blog_three_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Add category blog three title.
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_title]', array(
	'default'           => $options['category_blog_three_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_title]', array(
	'label'             => esc_html__( 'Title', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_category_blog_three_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[category_blog_three_title]', array(
		'selector'            => '#popular-courses .entry-header .entry-title',
		'render_callback'     => 'academic_pro_partial_category_blog_three_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add category blog three sub title.
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_sub_title]', array(
	'default'           => $options['category_blog_three_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_category_blog_three_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[category_blog_three_sub_title]', array(
		'selector'            => '#popular-courses .entry-header .entry-subtitle',
		'render_callback'     => 'academic_pro_partial_category_blog_three_sub_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add category blog three slider dragable.
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_dragable]', array(
	'default'           => $options['category_blog_three_dragable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_dragable]', array(
	'label'             => esc_html__( 'Enable Slide Dragable', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_pro_category_blog_three_active'
) );

// Add category blog three slider auto play.
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_autoplay]', array(
	'default'           => $options['category_blog_three_autoplay'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_autoplay]', array(
	'label'             => esc_html__( 'Enable Slide Auto Slide', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_pro_category_blog_three_active'
) );

// Add category blog three layout.
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_layout]', array(
	'default'           => $options['category_blog_three_layout'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_layout]', array(
	'label'             => esc_html__( 'Layout', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'select',
	'choices'           => academic_pro_category_blog_three_layout(),
	'active_callback'	=> 'academic_pro_category_blog_three_active'
) );

// Add category blog three layout.
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_type]', array(
	'default'           => $options['category_blog_three_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_type]', array(
	'label'             => esc_html__( 'Content Type', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'select',
	'choices'           => academic_pro_category_blog_three_type(),
	'active_callback'	=> 'academic_pro_category_blog_three_active'
) );

// Add category blog three icon
$wp_customize->add_setting( 'academic_pro_theme_options[category_blog_three_icon]', array(
	'default'           => $options['category_blog_three_icon'],
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'academic_pro_theme_options[category_blog_three_icon]', array(
	'label'             => esc_html__( 'Icon', 'academic-pro' ),
	'description'           => sprintf( esc_html__( 'Use font awesome icon: Eg: %1$s. %2$sSee more here%3$s', 'academic-pro' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_category_blog_three_demo_active'
) );

// Add category blog three type category setting and control
$wp_customize->add_setting(  'academic_pro_theme_options[category_blog_three_parent_category]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Academic_Pro_Dropdown_Taxonomies_Control ( $wp_customize,'academic_pro_theme_options[category_blog_three_parent_category]', array(
	'label'             => esc_html__( 'Select Parent Category', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'academic_pro_category_blog_three_sub_category'
) ) );

// Add category blog three type category setting and control
$wp_customize->add_setting(  'academic_pro_theme_options[category_blog_three_custom_category]', array(
	'sanitize_callback' => 'sanitize_key',
) ) ;

$wp_customize->add_control( new Academic_Pro_Dropdown_Taxonomy ( $wp_customize,'academic_pro_theme_options[category_blog_three_custom_category]', array(
	'label'             => esc_html__( 'Select Taxonomy ( Category Type )', 'academic-pro' ),
	'section'           => 'academic_pro_category_blog_three',
	'type'              => 'dropdown-custom-taxonomy',
	'active_callback'	=> 'academic_pro_category_blog_three_custom_category'
) ) );