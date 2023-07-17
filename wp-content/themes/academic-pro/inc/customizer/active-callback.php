<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */


/**
 * Check if loader is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_loader_enable( $control ) {
	return $control->manager->get_setting( 'academic_pro_theme_options[loader_enable]' )->value();
}

/**
 * Check if breadcrumb is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_breadcrumb_enable( $control ) {
	return $control->manager->get_setting( 'academic_pro_theme_options[breadcrumb_enable]' )->value();
}


/**
 * Check if pagination is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */

function academic_pro_is_pagination_enable( $control ) {
	return $control->manager->get_setting( 'academic_pro_theme_options[pagination_enable]' )->value();
}

/**
 * Check if top bar is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_top_bar_enable( $control ) {
	return $control->manager->get_setting( 'academic_pro_theme_options[top_bar_show]' )->value();
}

/**
 * Check if top bar demo content is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
*/
function academic_pro_is_top_bar_demo_disable( $control ) {
	if ( $control->manager->get_setting( 'academic_pro_theme_options[top_bar_show]' )->value() && 'demo' != $control->manager->get_setting( 'academic_pro_theme_options[top_bar_content_type]' )->value() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if slider is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */

function academic_pro_is_slider_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[slider_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if slider content is page.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_slider_page_content_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[slider_enable]' )->value() && 'page' == $control->manager->get_setting( 'academic_pro_theme_options[slider_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if slider content is post.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_slider_post_content_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[slider_enable]' )->value() && 'post' == $control->manager->get_setting( 'academic_pro_theme_options[slider_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if slider content is category.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_slider_content_category_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[slider_enable]' )->value() && 'category' == $control->manager->get_setting( 'academic_pro_theme_options[slider_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if slider content is not demo.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_slider_demo_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[slider_enable]' )->value() && 'demo' != $control->manager->get_setting( 'academic_pro_theme_options[slider_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if slider call to action is enable.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_slider_call_to_action( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[slider_enable]' )->value() && true == $control->manager->get_setting( 'academic_pro_theme_options[slider_call_to_action]' )->value() )
		return true;

	return false;
}


/**
 * Check if about is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_about_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[about_section_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if about demo is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_about_demo_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[about_section_enable]' )->value() && 'demo' != $control->manager->get_setting( 'academic_pro_theme_options[about_content_type]' )->value() )
		return true;

	return false;
}


/**
 * Check if about content is custom.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_about_content_custom( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[about_section_enable]' )->value() && 'custom' == $control->manager->get_setting( 'academic_pro_theme_options[about_content_type]' )->value() && true == $control->manager->get_setting( 'academic_pro_theme_options[about_content_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if about content is custom and display image is enable.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_about_content_custom_display_image( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[about_section_enable]' )->value() && 'custom' == $control->manager->get_setting( 'academic_pro_theme_options[about_content_type]' )->value() && 'display-image' == $control->manager->get_setting( 'academic_pro_theme_options[about_right_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if about content is page.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_about_content_page( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[about_section_enable]' )->value() && 'page' == $control->manager->get_setting( 'academic_pro_theme_options[about_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if about content is not demo.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_about_demo_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[about_section_enable]' )->value() && 'demo' != $control->manager->get_setting( 'academic_pro_theme_options[about_content_type]' )->value() && 'statistics-details' == $control->manager->get_setting( 'academic_pro_theme_options[about_right_content_type]' )->value() )
		return true;

	return false;
}



/**
 * Check if category blog one is enable.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_one_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_one_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if category blog one type is multiple category.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_one_multiple_category( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_one_enable]' )->value() && 'multiple-category' == $control->manager->get_setting( 'academic_pro_theme_options[category_blog_one_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if category blog two is enable.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_two_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_two_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if category blog two type is multiple category.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_two_multiple_category( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_two_enable]' )->value() && 'multiple-category' == $control->manager->get_setting( 'academic_pro_theme_options[category_blog_two_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if category blog three is enable.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_three_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_three_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if testimonial is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_testimonial_enabled( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[testimonial_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if category blog three type is sub category.
 * 
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_three_sub_category( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_three_enable]' )->value() && 'sub-category' == $control->manager->get_setting( 'academic_pro_theme_options[category_blog_three_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if category blog three type is custom category.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_three_custom_category( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_three_enable]' )->value() && 'custom' == $control->manager->get_setting( 'academic_pro_theme_options[category_blog_three_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if testimonial content type posts is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_content_type_testimonial_enabled( $control ) {
	if ( academic_pro_is_testimonial_enabled( $control ) && 'testimonials' == $control->manager->get_setting( 'academic_pro_theme_options[testimonial_content_type]' )->value()  )
		return true;

	return false;
}


 /**
 * Check if category blog three type is not demo
 * 
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_category_blog_three_demo_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_three_enable]' )->value() && 'demo' != $control->manager->get_setting( 'academic_pro_theme_options[category_blog_three_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if call to action is enable.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_call_to_action_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if call to action type is custom.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_call_to_action_custom_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_enable]' )->value() && 'custom' == $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_type]' )->value() )
		return true;

	return false;
}


/**
 * Check if call to action btn 1 is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_call_to_action_btn_1( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_enable]' )->value() && 'custom' == $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_type]' )->value() && true == $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_btn_enable_1]' )->value() )
		return true;

	return false;
}

/**
 * Check if call to action btn 2 is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_call_to_action_btn_2( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_enable]' )->value() && 'custom' == $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_type]' )->value() && true == $control->manager->get_setting( 'academic_pro_theme_options[call_to_action_btn_enable_2]' )->value() )
		return true;

	return false;
}

/**
 * Check if cat blog four is enabled
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_cat_blog_four_enabled( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[cat_blog_four_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if cat blog four is category.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_content_type_cat_blog_four_enabled( $control ) {
	if ( academic_pro_is_cat_blog_four_enabled( $control ) && 'category' == $control->manager->get_setting( 'academic_pro_theme_options[cat_blog_four_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if partner is enable.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_partner_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[partner_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if partner content type is custom
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_partner_custom_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[partner_enable]' )->value() && 'custom' == $control->manager->get_setting( 'academic_pro_theme_options[partner_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if partner content type is page
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_partner_page_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[partner_enable]' )->value() && 'page' == $control->manager->get_setting( 'academic_pro_theme_options[partner_type]' )->value() )
		return true;

	return false;
}


/**
 * Check if newsletter is enabled
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_newsletter_enabled( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[newsletter_enable]' )->value() )
		return true;

	return false;
}



/**
 * Check if newsletter is enabled
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_contact_us_social_icon_enable( $control ) {
	if ( true === $control->manager->get_setting( 'academic_pro_theme_options[contact_us_social_icon_enable]' )->value() )
		return true;

	return false;
}


/**
 * Check if team is enabled.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */

function academic_pro_is_team_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[team_section_enable]' )->value() )
		return true;

	return false;
}

/**
 * Check if team content is page.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_team_page_content_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[team_section_enable]' )->value() && 'page' == $control->manager->get_setting( 'academic_pro_theme_options[team_content_type]' )->value() )
		return true;

	return false;
}

/**
 * Check if team content is post.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_team_post_content_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[team_section_enable]' )->value() && 'post' == $control->manager->get_setting( 'academic_pro_theme_options[team_content_type]' )->value() )
		return true;

	return false;
}


/**
 * Check if team content is not demo.
 *
 * @since Academic Pro 1.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function academic_pro_is_team_content_demo_not_active( $control ) {
	if ( 'disabled' != $control->manager->get_setting( 'academic_pro_theme_options[team_section_enable]' )->value() && 'demo' != $control->manager->get_setting( 'academic_pro_theme_options[team_content_type]' )->value() )
		return true;

	return false;
}