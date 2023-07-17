<?php
/**
* Newsletter section options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add newsletter section
$wp_customize->add_section( 'academic_pro_newsletter', array(
	'title'             => esc_html__( 'Newsletter','academic-pro' ),
	'description'       => esc_html__( 'Newsletter section options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add newsletter enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[newsletter_enable]', array(
	'default'           => $options['newsletter_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[newsletter_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_newsletter',
	'type'              => 'select',
	'choices'           => academic_pro_enable_entire_option()
) );


// Newsletter title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[newsletter_title]', array(
	'default'           => $options['newsletter_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage'
) );


$wp_customize->add_control( 'academic_pro_theme_options[newsletter_title]', array(
	'active_callback' => 'academic_pro_is_newsletter_enabled',
	'label'           => esc_html__( 'Title', 'academic-pro' ),
	'section'         => 'academic_pro_newsletter',
	'type'            => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[newsletter_title]', array(
		'selector'            => '#subscribe-form h2.entry-title',
		'settings'            => 'academic_pro_theme_options[newsletter_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['newsletter_title'] );
        },
    ) );
}
 
// Newsletter sub title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[newsletter_sub_title]', array(
	'default'           => $options['newsletter_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage'
) );

$wp_customize->add_control( 'academic_pro_theme_options[newsletter_sub_title]', array(
	'active_callback'=> 'academic_pro_is_newsletter_enabled',
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_newsletter',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[newsletter_sub_title]', array(
		'selector'            => '#subscribe-form h6.entry-subtitle',
		'settings'            => 'academic_pro_theme_options[newsletter_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['newsletter_sub_title'] );
        },
    ) );
}