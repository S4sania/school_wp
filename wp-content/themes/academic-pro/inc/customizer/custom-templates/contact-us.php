<?php
/**
* Contact Us Page options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add about enable section
$wp_customize->add_section( 'academic_pro_contact_us_page', array(
	'title'             => esc_html__( 'Contact Us Page','academic-pro' ),
	'description'       => esc_html__( 'Contact Us Page options.', 'academic-pro' ),
	'panel'             => 'academic_pro_custom_template_option_panel'
) );

// Add contact us form shortcode
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_contact_info_title]', array(
	'default'           => $options['contact_us_contact_info_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_contact_info_title]', array(
	'label'             => esc_html__( 'Contact Info Title', 'academic-pro' ),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[contact_us_contact_info_title]', array(
		'selector'            => '#contact-information .contact-info h2.entry-title',
		'settings'            => 'academic_pro_theme_options[contact_us_contact_info_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['contact_us_contact_info_title'] );
        },
    ) );
}

// Add contact us phone shortcode
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_contact_info_phone]', array(
	'default'           => $options['contact_us_contact_info_phone'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_contact_info_phone]', array(
	'label'             => esc_html__( 'Phone', 'academic-pro' ),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[contact_us_contact_info_phone]', array(
		'selector'            => '#contact-information .address-block .phone a',
		'settings'            => 'academic_pro_theme_options[contact_us_contact_info_phone]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['contact_us_contact_info_phone'] );
        },
    ) );
}


// Add contact us address shortcode
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_contact_info_address]', array(
	'default'           => $options['contact_us_contact_info_address'],
	'sanitize_callback' => 'esc_textarea',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_contact_info_address]', array(
	'label'             => esc_html__( 'Address', 'academic-pro' ),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[contact_us_contact_info_address]', array(
		'selector'            => '#contact-information .address-block .address p',
		'settings'            => 'academic_pro_theme_options[contact_us_contact_info_address]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['contact_us_contact_info_address'] );
        },
    ) );
}

// Add contact us address shortcode
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_contact_info_email]', array(
	'default'           => $options['contact_us_contact_info_email'],
	'sanitize_callback' => 'sanitize_email',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_contact_info_email]', array(
	'label'             => esc_html__( 'Email', 'academic-pro' ),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[contact_us_contact_info_email]', array(
		'selector'            => '#contact-information .address-block li.email a',
		'settings'            => 'academic_pro_theme_options[contact_us_contact_info_email]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['contact_us_contact_info_email'] );
        },
    ) );
}

// Add contact us map title shortcode
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_contact_map_title]', array(
	'default'           => $options['contact_us_contact_map_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_contact_map_title]', array(
	'label'             => esc_html__( 'Map Title', 'academic-pro' ),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[contact_us_contact_map_title]', array(
		'selector'            => '#contact-information .map-location h2.entry-title',
		'settings'            => 'academic_pro_theme_options[contact_us_contact_map_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['contact_us_contact_map_title'] );
        },
    ) );
}

// Add contact us map shortcode
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_map_shortcode]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_map_shortcode]', array(
	'label'             => esc_html__( 'Map Shortcode', 'academic-pro' ),
	'description'       => esc_html__( 'Input the shortcode provided by the suggested plugin.', 'academic-pro' ),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'textarea',
	'input_attrs'		=> array(
		'placeholder'	=> '[contact-form-7 id="1880" title="Contact form 1"]',
		)
) );

// Add contact us social icon enable
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_social_icon_enable]', array(
	'default'           => $options['contact_us_social_icon_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_social_icon_enable]', array(
	'label'             => esc_html__( 'Enable Social Icons', 'academic-pro' ),
	'description'       => esc_html__( 'This enable Social Icons on the left of Contact form on Contact Us template.','academic-pro'),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'checkbox',
) );

for( $i=1; $i<=6; $i++ ) { 
	// Add contact us address shortcode
	$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_social_icon_'. $i. ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[contact_us_social_icon_'. $i. ']', array(
		'label'             => sprintf( esc_html__( 'Social Icon %s', 'academic-pro' ), $i ),
		'section'           => 'academic_pro_contact_us_page',
		'active_callback'   => 'academic_pro_contact_us_social_icon_enable',
		'type'              => 'url',
	) );
}

// Add contact us form shortcode
$wp_customize->add_setting( 'academic_pro_theme_options[contact_us_form_shortcode]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'academic_pro_theme_options[contact_us_form_shortcode]', array(
	'label'             => esc_html__( 'Form Shortcode', 'academic-pro' ),
	'description'       => esc_html__( 'Input the shortcode provided by the suggested plugin.', 'academic-pro' ),
	'section'           => 'academic_pro_contact_us_page',
	'type'              => 'textarea',
	'input_attrs'		=> array(
		'placeholder'	=> '[contact-form-7 id="1880" title="Contact form 1"]',
		)
) );