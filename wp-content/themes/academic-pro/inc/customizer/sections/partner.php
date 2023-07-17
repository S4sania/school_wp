<?php
/**
* Partners options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add Partners enable section
$wp_customize->add_section( 'academic_pro_partner', array(
	'title'             => esc_html__( 'Partners','academic-pro' ),
	'description'       => esc_html__( 'Partners options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add Partners enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[partner_enable]', array(
	'default'           => $options['partner_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[partner_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Add Partners type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[partner_type]', array(
	'default'           => $options['partner_type'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[partner_type]', array(
	'label'             => esc_html__( 'Content Type', 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'select',
	'choices'           => academic_pro_partner_content_type(),
	'active_callback'	=> 'academic_pro_partner_active'
) );

// Add Partners title.
$wp_customize->add_setting( 'academic_pro_theme_options[partner_title]', array(
	'default'           => $options['partner_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[partner_title]', array(
	'label'             => esc_html__( 'Title', 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_partner_custom_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[partner_title]', array(
		'selector'            => '#our-partners .container .entry-header .entry-title',
		'render_callback'     => 'academic_pro_partial_partner_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add Partners title.
$wp_customize->add_setting( 'academic_pro_theme_options[partner_sub_title]', array(
	'default'           => $options['partner_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_pro_theme_options[partner_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'text',
	'active_callback'	=> 'academic_pro_partner_custom_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[partner_sub_title]', array(
		'selector'            => '#our-partners .container .entry-header .entry-subtitle',
		'render_callback'     => 'academic_pro_partial_partner_sub_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add partner layout.
$wp_customize->add_setting( 'academic_pro_theme_options[partner_layout]', array(
	'default'           => $options['partner_layout'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[partner_layout]', array(
	'label'             => esc_html__( 'Layout', 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'select',
	'choices'           => academic_pro_partner_layout(),
	'active_callback'	=> 'academic_pro_partner_active'
) );

// Add partner slider dragable.
$wp_customize->add_setting( 'academic_pro_theme_options[partner_dragable]', array(
	'default'           => $options['partner_dragable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[partner_dragable]', array(
	'label'             => esc_html__( 'Enable Slide Dragable', 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_pro_partner_active'
) );

// Add category blog two slider auto play.
$wp_customize->add_setting( 'academic_pro_theme_options[partner_autoplay]', array(
	'default'           => $options['partner_autoplay'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_pro_theme_options[partner_autoplay]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_pro_partner_active'
) );

// Add no of Partners.
$wp_customize->add_setting( 'academic_pro_theme_options[no_of_partner]', array(
	'default'           => $options['no_of_partner'],
	'sanitize_callback' => 'absint',
	'validate_callback' => 'academic_pro_validate_partner_count'
) );

$wp_customize->add_control( 'academic_pro_theme_options[no_of_partner]', array(
	'label'             => esc_html__( 'No of partners', 'academic-pro' ),
	'description'		=> esc_html__( 'Min 1 / Max 15. Notice: Please refresh after the number of features is set to see the effects.' , 'academic-pro' ),
	'section'           => 'academic_pro_partner',
	'type'              => 'number',
	'input_attrs' 		=> array(
		'min' => 1,
		'max' => 15,
		'style' => 'width:100px'
		),
	'active_callback'	=> 'academic_pro_partner_active'
) );


for ( $i = 1; $i <= $options['no_of_partner']; $i++ ) { 

	// Add Partners image.
	$wp_customize->add_setting( 'academic_pro_theme_options[partner_image_'. $i .']',
	  array(
	    'sanitize_callback' 	=> 'academic_pro_sanitize_image',
	  )
	);
	$wp_customize->add_control(
	  new WP_Customize_Image_Control( $wp_customize, 'academic_pro_theme_options[partner_image_'. $i .']',
	    array(
	    	'label'       		=> sprintf( esc_html__( 'Select Image # %s', 'academic-pro' ), $i ),
			'section'     		=> 'academic_pro_partner',
			'settings'    		=> 'academic_pro_theme_options[partner_image_'. $i .']',
			'active_callback'	=> 'academic_pro_partner_custom_active',
	    )
	  )
	);

	// Add Partners title.
	$wp_customize->add_setting( 'academic_pro_theme_options[partner_alt_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[partner_alt_'. $i .']', array(
		'label'             => esc_html__( 'Alt Text', 'academic-pro' ),
		'section'           => 'academic_pro_partner',
		'type'              => 'text',
		'active_callback'	=> 'academic_pro_partner_custom_active'
	) );

	// Add Partners link.
	$wp_customize->add_setting( 'academic_pro_theme_options[partner_link_'. $i .']', array(
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[partner_link_'. $i .']', array(
		'label'             => esc_html__( 'Link URL', 'academic-pro' ),
		'section'           => 'academic_pro_partner',
		'type'              => 'url',
		'active_callback'	=> 'academic_pro_partner_custom_active'
	) );

	// hr setting and control for call to action
	$wp_customize->add_setting( 'academic_pro_theme_options[partner_hr'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Academic_Pro_Customize_Horizontal_Line( $wp_customize, 'academic_pro_theme_options[partner_hr'. $i .']',
		array(
			'section'         => 'academic_pro_partner',
			'type'			  => 'hr',
			'active_callback' => 'academic_pro_partner_custom_active'
	) ) );

	// Add Partners image.
	$wp_customize->add_setting( 'academic_pro_theme_options[partner_page_'. $i .']',
	  array(
	    'sanitize_callback' 	=> 'academic_pro_sanitize_page',
	  )
	);
	$wp_customize->add_control( 'academic_pro_theme_options[partner_page_'. $i .']',
	    array(
	    	'label'       		=> sprintf( esc_html__( 'Select Page # %s', 'academic-pro' ), $i ),
			'section'     		=> 'academic_pro_partner',
			'type'				=> 'dropdown-pages',
			'active_callback'	=> 'academic_pro_partner_page_active',
	    )
	);
}
