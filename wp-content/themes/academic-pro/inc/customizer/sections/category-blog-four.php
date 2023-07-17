<?php
/**
* Category Blog Four section options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add cat blog four section
$wp_customize->add_section( 'academic_pro_cat_blog_four', array(
	'title'             => esc_html__( 'Fourth Category Blog','academic-pro' ),
	'description'       => esc_html__( 'Fourth Category Blog section options.', 'academic-pro' ),
	'panel'             => 'academic_pro_sections_panel'
) );

// Add cat blog four enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_enable]', array(
	'default'           => $options['cat_blog_four_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_select'
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_enable]', array(
	'label'             => esc_html__( 'Enable on', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'select',
	'choices'           => academic_pro_enable_disable_options()
) );

// Category blog four title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_title]', array(
	'default'           => $options['cat_blog_four_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage'
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_title]', array(
	'active_callback' => 'academic_pro_is_cat_blog_four_enabled',
	'label'           => esc_html__( 'Title', 'academic-pro' ),
	'section'         => 'academic_pro_cat_blog_four',
	'type'            => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[cat_blog_four_title]', array(
		'selector'            => '#upcoming-events h2.entry-title',
		'settings'            => 'academic_pro_theme_options[cat_blog_four_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['cat_blog_four_title'] );
        },
    ) );
}
 
// Category blog four sub title setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_sub_title]', array(
	'default'           => $options['cat_blog_four_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage'
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_sub_title]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Sub Title', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'academic_pro_theme_options[cat_blog_four_sub_title]', array(
		'selector'            => '#upcoming-events h6.entry-subtitle',
		'settings'            => 'academic_pro_theme_options[cat_blog_four_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => function() {
          	$options = academic_pro_get_theme_options();
			return esc_html( $options['cat_blog_four_sub_title'] );
        },
    ) );
}

// Category blog four content type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_content_type]', array(
	'default'           => $options['cat_blog_four_content_type'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_content_type]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Content Type', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'select',
	'choices'           => academic_pro_cat_blog_four_content_type()
) );

// Category blog four infinite setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_infinite_enable]', array(
	'default'           => $options['cat_blog_four_infinite_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_infinite_enable]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Enable infinite slider.', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'checkbox',
) );

// Category blog four pager enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_pager_enable]', array(
	'default'           => $options['cat_blog_four_pager_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_pager_enable]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Enable slider pager.', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'checkbox',
) );

// Category blog four arrows enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_arrows_enable]', array(
	'default'           => $options['cat_blog_four_arrows_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_arrows_enable]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Show arrows.', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'checkbox',
) );

// Category blog four autoplay setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_autoplay_enable]', array(
	'default'           => $options['cat_blog_four_autoplay_enable'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_autoplay_enable]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Enable autoplay.', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'checkbox',
) );

// Category blog four number of slides to show setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_slide_to_show]', array(
	'default'           => $options['cat_blog_four_slide_to_show'],
	'sanitize_callback' => 'academic_pro_sanitize_select',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_slide_to_show]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Layout.', 'academic-pro' ),
	'description'             => esc_html__( 'Works only on desktop view.', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'select',
	'choices'			=> academic_pro_category_blog_four_layout()
) );

// Category blog four number of slides to scroll autoplay setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_slide_to_scroll]', array(
	'default'           => $options['cat_blog_four_slide_to_scroll'],
	'sanitize_callback' => 'academic_pro_sanitize_number_range',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_slide_to_scroll]', array(
	'active_callback'=> 'academic_pro_is_cat_blog_four_enabled',
	'label'             => esc_html__( 'Number of slides to scroll.', 'academic-pro' ),
	'description'             => esc_html__( 'Works only on desktop view.', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'number',
	'input_attrs'		=> array(
		'max' => 4, 
		'min' => 1 
		),
) );

// Category blog four category content type setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_content_type_cat]', array(
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Academic_Pro_Dropdown_Taxonomies_Control( $wp_customize, 'academic_pro_theme_options[cat_blog_four_content_type_cat]', array(
	'active_callback'=> 'academic_pro_is_content_type_cat_blog_four_enabled',
	'label'             => esc_html__( 'Posts from Category', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'dropdown-taxonomies',
	'taxonomy'           => 'post'
) ) );

// Number of posts setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[cat_blog_four_num_of_posts]', array(
	'default'           => $options['cat_blog_four_num_of_posts'],
	'sanitize_callback' => 'academic_pro_sanitize_number_range',
	'validate_callback' => 'academic_pro_validate_cat_blog_four_post_num_range',
) );

$wp_customize->add_control( 'academic_pro_theme_options[cat_blog_four_num_of_posts]', array(
	'active_callback'=> 'academic_pro_is_content_type_cat_blog_four_enabled',
	'label'             => esc_html__( 'Number of posts', 'academic-pro' ),
	'section'           => 'academic_pro_cat_blog_four',
	'type'              => 'number',
	'input_attrs'     => array(
		'max' => 15,
		'min' => 1
	)
) );