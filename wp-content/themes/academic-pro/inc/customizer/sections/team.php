<?php
/**
* Team options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add team enable section
$wp_customize->add_section( 'academic_pro_team_section', array(
	'title'             => esc_html__( 'Team','academic-pro' ),
	'description'       => esc_html__( 'Team section options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add team enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[team_section_enable]', array(
	'default'           => $options['team_section_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[team_section_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_team_section',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Add team title.
$wp_customize->add_setting( 'academic_pro_theme_options[team_section_title]', array(
	'default'           => $options['team_section_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[team_section_title]', array(
	'label'             => esc_html__( 'Title', 'academic-pro' ),
	'section'           => 'academic_pro_team_section',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_is_team_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[team_section_title]', array(
		'selector'            => '#our-team .entry-header .entry-title',
		'render_callback'     => 'academic_pro_partial_team_section_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add team sub title.
$wp_customize->add_setting( 'academic_pro_theme_options[team_section_subtitle]', array(
	'default'           => $options['team_section_subtitle'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[team_section_subtitle]', array(
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_team_section',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_is_team_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[team_section_subtitle]', array(
		'selector'            => '#our-team .entry-header .entry-subtitle',
		'render_callback'     => 'academic_pro_partial_team_section_subtitle',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add team content type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[team_content_type]', array(
	'default'           => $options['team_content_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[team_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'academic-pro' ),
	'section'           => 'academic_pro_team_section',
	'type'              => 'select',
	'choices'           => academic_pro_team_content_type(),
	'active_callback'	=> 'academic_pro_is_team_active'
) );

/**
 * Page Content Type
 */
for ($i=1; $i <= 4; $i++) {
	// Show page drop-down setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[team_content_page_'.$i.']', array(
		'sanitize_callback' => 'academic_pro_sanitize_page'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[team_content_page_'.$i.']', array(
		'label'           => sprintf( esc_html__( 'Page Team #%s', 'academic-pro' ), $i ),
		'section'         => 'academic_pro_team_section',
		'active_callback' => 'academic_pro_is_team_page_content_active',
		'type'				=> 'dropdown-pages'
	) );

	//team position setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[team_section_position_'.$i.']', array(
		'default'           => $options['team_section_position'],
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[team_section_position_'.$i.']', array(
		'label'           => sprintf( esc_html__( 'Team Position #%s', 'academic-pro' ), $i ),
		'section'         => 'academic_pro_team_section',
		'active_callback' => 'academic_pro_is_team_page_content_active',
		'type'			  => 'text'
	) );

	// Team page hr setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[team_content_page_hr'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[team_content_page_hr'.$i.']',
		array(
			'section'         => 'academic_pro_team_section',
			'active_callback' => 'academic_pro_is_team_page_content_active',
			'type'				=> 'hr'
	) ) );
}

/*
* Post Content Type
 */
for ($i=1; $i <= 4; $i++) {
	// Show post type setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[team_content_post_'.$i.']', array(
		'sanitize_callback' => 'academic_pro_sanitize_number_range'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[team_content_post_'.$i.']', array(
		'label'           => sprintf( esc_html__( 'Post Team #%s', 'academic-pro' ), $i ),
		'description'     => esc_html__( 'Enter the Post ID here.', 'academic-pro' ),
		'section'         => 'academic_pro_team_section',
		'active_callback' => 'academic_pro_is_team_post_content_active',
		'type'			  => 'number',
		'input_attrs'     => array(
			'min'	=> 0
			)
	) );

	//team position setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[team_position_'.$i.']', array(
		'default'           => $options['team_section_position'],
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[team_position_'.$i.']', array(
		'label'           => sprintf( esc_html__( 'Team Position #%s', 'academic-pro' ), $i ),
		'section'         => 'academic_pro_team_section',
		'active_callback' => 'academic_pro_is_team_post_content_active',
		'type'			  => 'text'
	) );

	// Team post hr setting and control
	$wp_customize->add_setting( 'academic_pro_theme_options[team_content_post_hr'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[team_content_post_hr'.$i.']',
		array(
			'section'         => 'academic_pro_team_section',
			'active_callback' => 'academic_pro_is_team_post_content_active',
			'type'				=> 'hr'
	) ) );
}


// Add team title.
$wp_customize->add_setting( 'academic_pro_theme_options[team_button_label]', array(
	'default'           => $options['team_button_label'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'academic_pro_theme_options[team_button_label]', array(
	'label'             => esc_html__( 'Button Label', 'academic-pro' ),
	'section'           => 'academic_pro_team_section',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_is_team_content_demo_not_active'
) );


// Add team title.
$wp_customize->add_setting( 'academic_pro_theme_options[team_button_url]', array(
	'default'           => $options['team_button_url'],
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'academic_pro_theme_options[team_button_url]', array(
	'label'             => esc_html__( 'Button Url', 'academic-pro' ),
	'section'           => 'academic_pro_team_section',
	'type'              => 'url',
	'active_callback'	=> 'academic_pro_is_team_content_demo_not_active'
) );