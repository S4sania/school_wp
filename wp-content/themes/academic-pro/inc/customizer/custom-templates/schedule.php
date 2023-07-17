<?php
/**
* Schedule Page options
*
* @package Theme Palace
* @subpackage Academic Pro
* @since 1.0
*/

// Add schedule section
$wp_customize->add_section( 'academic_pro_schedule', array(
	'title'             => esc_html__( 'Schedule Page','academic-pro' ),
	'description'       => esc_html__( 'Schedule Page options.', 'academic-pro' ),
	'panel'             => 'academic_pro_custom_template_option_panel'
) );

// Add schedulte category setting and control
$wp_customize->add_setting(  'academic_pro_theme_options[schedule_multiple_category]', array(
	'sanitize_callback' => 'academic_pro_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Academic_Pro_Dropdown_Category_Control ( $wp_customize,'academic_pro_theme_options[schedule_multiple_category]', array(
	'label'             => esc_html__( 'Select Categories', 'academic-pro' ),
	'description'       => esc_html__( 'Displays schedule meta of post related to selected categories.', 'academic-pro' ),
	'section'           => 'academic_pro_schedule',
	'type'              => 'dropdown-categories',
) ) );

// Add schedulte category setting and control
$wp_customize->add_setting(  'academic_pro_theme_options[schedule_post_num]', array(
	'sanitize_callback' => 'academic_pro_sanitize_number_range',
	'default'			=> $options['schedule_post_num']
) ) ;

$wp_customize->add_control( 'academic_pro_theme_options[schedule_post_num]', array(
	'label'             => esc_html__( 'Number of posts:', 'academic-pro' ),
	'description'       => esc_html__( 'Number of posts to be shown for each category. Input -1 to show all posts.', 'academic-pro' ),
	'section'           => 'academic_pro_schedule',
	'type'              => 'number',
	'input_attrs'		=> array( 'min' => -1 )
) );