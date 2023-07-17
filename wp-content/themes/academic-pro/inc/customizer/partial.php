<?php
/**
 * Customizer Partial Functions
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 *
 * @return void
 */
function academic_pro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 *
 * @return void
 */
function academic_pro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render the slider call to action for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_slider_calltoaction() {
	$options = academic_pro_get_theme_options();
	return $options['slider_call_to_action_label'];
}

/**
 * Render the about title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_about_title() {
	$options = academic_pro_get_theme_options();
	return $options['about_content_title'];
}

/**
 * Render the about sub title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_about_sub_title() {
	$options = academic_pro_get_theme_options();
	return $options['about_content_sub_title'];
}

/**
 * Render the category blog one title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_category_blog_one_title() {
	$options = academic_pro_get_theme_options();
	return $options['category_blog_one_title'];
}

/**
 * Render the category blog one sub title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_category_blog_one_sub_title() {
	$options = academic_pro_get_theme_options();
	return $options['category_blog_one_sub_title'];
}

/**
 * Render the category blog two title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_category_blog_two_title() {
	$options = academic_pro_get_theme_options();
	return $options['category_blog_two_title'];
}

/**
 * Render the category blog two sub title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_category_blog_two_sub_title() {
	$options = academic_pro_get_theme_options();
	return $options['category_blog_two_sub_title'];
}

/**
 * Render the category blog three title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_category_blog_three_title() {
	$options = academic_pro_get_theme_options();
	return $options['category_blog_three_title'];
}

/**
 * Render the category blog three sub title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_category_blog_three_sub_title() {
	$options = academic_pro_get_theme_options();
	return $options['category_blog_three_sub_title'];
}

/**
 * Render the call to action title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_call_to_action_title() {
	$options = academic_pro_get_theme_options();
	return $options['call_to_action_title'];
}

/**
 * Render the call to action sub title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_call_to_action_sub_title() {
	$options = academic_pro_get_theme_options();
	return $options['call_to_action_sub_title'];
}

/**
 * Render the partners title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_partner_title() {
	$options = academic_pro_get_theme_options();
	return $options['partner_title'];
}

/**
 * Render the partners sub title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_partner_sub_title() {
	$options = academic_pro_get_theme_options();
	return $options['partner_sub_title'];
}

/**
 * Render the team title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_team_section_title() {
	$options = academic_pro_get_theme_options();
	return $options['team_section_title'];
}

/**
 * Render the team sub title for the selective refresh partial.
 *
 * @since Academic Pro 1.0
 * @return string
 */
function academic_pro_partial_team_section_subtitle() {
	$options = academic_pro_get_theme_options();
	return $options['team_section_subtitle'];
}