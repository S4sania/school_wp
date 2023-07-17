<?php
/**
 * Menu Customizer options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */


// Add additonal menu section
$wp_customize->add_section( 'academic_pro_testimonial', array(
	'title'             => esc_html__( 'Testimonials','academic-pro' ),
	'description'       => esc_html__( 'Testimonial options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel',
) );

// Testimonial enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_enable]', array(
	'default'           => $options['testimonial_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select',
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Testimonial title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_title]', array(
	'default'           => $options['testimonial_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage'
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_title]', array(
	'active_callback'=> 'academic_pro_is_testimonial_enabled',
	'label'             => esc_html__( 'Title', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[testimonial_title]', array(
		'selector'            => '#testimonial-slider h2.entry-title',
		'settings'            => 'academic_pro_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['testimonial_title'] );
        },
    ) );
}
 
// Testimonial sub title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_sub_title]', array(
	'default'           => $options['testimonial_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage'
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_sub_title]', array(
	'active_callback'=> 'academic_pro_is_testimonial_enabled',
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[testimonial_sub_title]', array(
		'selector'            => '#testimonial-slider h6.entry-subtitle',
		'settings'            => 'academic_pro_theme_options[testimonial_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['testimonial_sub_title'] );
        },
    ) );
}

// Testimonial content type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_content_type]', array(
	'default'           => $options['testimonial_content_type'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_content_type]', array(
	'active_callback'=> 'academic_pro_is_testimonial_enabled',
	'label'             => esc_html__( 'Content Type', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'select',
	'choices'           => academic_pro_testimonial_content_type()
) );

// Testimonial infinite setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_infinite_enable]', array(
	'default'           => $options['testimonial_infinite_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_infinite_enable]', array(
	'active_callback'=> 'academic_pro_is_testimonial_enabled',
	'label'             => esc_html__( 'Enable infinite slider.', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'checkbox',
) );

// Testimonial pager enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_pager_enable]', array(
	'default'           => $options['testimonial_pager_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_pager_enable]', array(
	'active_callback'=> 'academic_pro_is_testimonial_enabled',
	'label'             => esc_html__( 'Enable slider pager.', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'checkbox',
) );

// Testimonial arrows enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_arrows_enable]', array(
	'default'           => $options['testimonial_arrows_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_arrows_enable]', array(
	'active_callback'=> 'academic_pro_is_testimonial_enabled',
	'label'             => esc_html__( 'Show arrows.', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'checkbox',
) );

// Testimonial autoplay setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_autoplay_enable]', array(
	'default'           => $options['testimonial_autoplay_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[testimonial_autoplay_enable]', array(
	'active_callback'=> 'academic_pro_is_testimonial_enabled',
	'label'             => esc_html__( 'Enable autoplay.', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'checkbox',
) );

// Testimonial posts setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[testimonial_post]', array(
	'sanitize_callback' => 'academic_pro_sanitize_testimonial_list',
	'validate_callback' => 'academic_pro_validate_testimonial_list',
) );

$wp_customize->add_control( new Academic_Pro_Testimonial_Post_Control ( $wp_customize, 'academic_pro_theme_options[testimonial_post]', array(
	'active_callback'=> 'academic_pro_is_content_type_testimonial_enabled',
	'label'             => esc_html__( 'Testimonial Posts', 'academic-pro' ),
	'description'       => esc_html__( 'Max number of testimonials is 4.', 'academic-pro' ),
	'section'           => 'academic_pro_testimonial',
	'type'              => 'testimonial-post',
) ) );