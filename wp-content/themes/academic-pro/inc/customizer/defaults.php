<?php
/**
 * academic customizer default options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */


/**
 * Returns the default options for Academic Pro.
 *
 * @since Academic Pro 1.0
 * @return array An array of default values
 */
function academic_pro_get_default_theme_options() {
	$theme_data = wp_get_theme();
	
	$academic_pro_default_options = array(
		// Additional menu options
		'append_search'          => true,
		'make_menu_sticky'       => true,
		
		// Color layout options
		'color_layout'           => '#347fe1',
		'header_title_color'     => '#ffffff',
		'header_tagline_color'   => '#ffffff',
		'theme_version'			 => 'lite-version',

		//home-layout
		'home_layout'			=> 'default-design',
		
		// Top bar options
		'top_bar_content_type'   => 'demo',
		'top_bar_show'           => true,
		'top_bar_move_menu_left' => false,
		'top_bar_field_number'   => 3,
		'top_bar_bg_color'       => '#F7FCFE',
		
		// Theme Options
		'theme_typography'       => 'default',
		'loader_enable'          => false,
		'loader_icon'            => 'fa-spinner',
		'site_layout'            => 'wide',
		'sidebar_position'       => 'right-sidebar',
		'long_excerpt_length'    => 50,
		'read_more_text'         => esc_html__( 'Read More', 'academic-pro' ),
		'breadcrumb_enable'      => false,
		'breadcrumb_separator'   => '/',
		'pagination_enable'      => true,
		'pagination_type'        => 'default',
		'scroll_top_visible'     => true,
		'reset_options'                   => false,
		'enable_frontpage_content'        => true,
		'archive_grid_layout'             => 'grid',
		'archive_content_type' 			=> 'excerpt',
		'archive_image' 				=> false,
		'archive_meta' 					=> false,
		
		//Footer Editor Options
		'copyright_text'                  => sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved', '1: Year, 2: Site Title with home URL', 'academic-pro' ), '[the-year]', '[site-link]' ) . ' &#124; ' . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'academic-pro' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( $theme_data->get( 'Author' ) ) .'</a>',
		
		// slider
		'slider_enable'                   => 'static-frontpage',
		'slider_content_effect'           => 'cubic-bezier(0.250, 0.250, 0.750, 0.750)',
		'slider_content_type'             => 'demo',
		'no_of_slider'                    => 2,
		'enable_slider_controls'          => true,
		'enable_slider_pager'             => true,
		'enable_slider_dragable'          => true,
		'slider_pause_on_hover'           => true,
		'slider_call_to_action'           => false,
		'slider_call_to_action_new_tab'   => true,
		'enable_slider_caption' 		  => true,
		
		// Testimonial
		'testimonial_enable'              => 'static-frontpage',
		'testimonial_title'               => esc_html__( 'Stories from students', 'academic-pro' ),
		'testimonial_sub_title'           => esc_html__( 'How can we help you', 'academic-pro' ),
		'testimonial_content_type'        => 'demo',
		'testimonial_infinite_enable'     => false,
		'testimonial_pager_enable'        => true,
		'testimonial_arrows_enable'       => true,
		'testimonial_autoplay_enable'     => true,
		
		// Category blog four
		'cat_blog_four_enable'            => 'static-frontpage',
		'cat_blog_four_title'             => esc_html__( 'Upcoming events', 'academic-pro' ),
		'cat_blog_four_sub_title'         => esc_html__( 'How can we help you', 'academic-pro' ),
		'cat_blog_four_content_type'      => 'demo',
		'cat_blog_four_infinite_enable'   => false,
		'cat_blog_four_pager_enable'      => false,
		'cat_blog_four_arrows_enable'     => true,
		'cat_blog_four_autoplay_enable'   => false,
		'cat_blog_four_slide_to_show'     => 3,
		'cat_blog_four_slide_to_scroll'   => 1,
		'cat_blog_four_num_of_posts'      => 6,
		
		
		// about
		'about_section_enable'            => 'static-frontpage',
		'about_content_type'              => 'demo',
		'about_content_title'             => esc_html__( 'About Us', 'academic-pro' ),
		'about_link_target'               => true,
		'about_statistics_no'             => 1,
		'about_content_enable'            => true,
		'about_right_content_type'        => 'statistics-details',
		'statistics_color'                => '#59ADDF',
		
		// category blog one
		'category_blog_one_enable'        => 'static-frontpage',
		'category_blog_one_title'         => esc_html__( 'First Category Blog', 'academic-pro' ),
		'category_blog_one_sub_title'     => esc_html__( 'How can we help you', 'academic-pro' ),
		'category_blog_one_type'          => 'demo',
		'category_blog_one_layout'        => 'masonry',
		'category_blog_one_count'         => 7,
		'category_blog_one_dragable'      => true,
		'category_blog_one_autoplay'      => true,
		
		// category blog two
		'category_blog_two_enable'        => 'static-frontpage',
		'category_blog_two_dragable'      => true,
		'category_blog_two_autoplay'      => true,
		'category_blog_two_title'         => esc_html__( 'Second Category Blog', 'academic-pro' ),
		'category_blog_two_sub_title'     => esc_html__( 'How can we help you', 'academic-pro' ),
		'category_blog_two_count'         => 8,
		'category_blog_two_type'          => 'demo',
		'category_blog_two_layout'        => 4,

		// team
		'team_section_enable'             => 'static-frontpage',
		'team_content_type'               => 'demo',
		'team_section_title'              => esc_html__( 'Our Team', 'academic-pro' ),
		'team_section_subtitle'           => esc_html__( 'Get To Know Our Team', 'academic-pro' ),
		'team_section_position'			  => esc_html__( 'Manager','academic-pro' ),
		'team_button_label'			  	  => esc_html__( 'View All Teams','academic-pro' ),
		'team_button_url'			  	  => esc_html__( '#','academic-pro' ),
		
		// category blog three
		'category_blog_three_enable'      => 'static-frontpage',
		'category_blog_three_dragable'    => true,
		'category_blog_three_autoplay'    => true,
		'category_blog_three_count'       => 7,
		'category_blog_three_layout'      => 6,
		'category_blog_three_title'       => esc_html__( 'Third Category Blog', 'academic-pro' ),
		'category_blog_three_sub_title'   => esc_html__( 'How can we help you', 'academic-pro' ),
		'category_blog_three_type'        => 'demo',
		'category_blog_three_icon'        => 'fa-snapchat-ghost',
		
		// call to action
		'call_to_action_enable'           => 'static-frontpage',
		'call_to_action_type'             => 'demo',
		'call_to_action_title'            => esc_html__( 'Make Your Success A Priority', 'academic-pro' ),
		'call_to_action_sub_title'        => esc_html__( 'Begin your Educational Journey Today.', 'academic-pro' ),
		'call_to_action_btn_enable_1'     => true,
		'call_to_action_btn_label_1'      => esc_html__( 'Enroll Today', 'academic-pro' ),
		'call_to_action_btn_link_1'       => '#',
		'call_to_action_btn_target_1'     => false,
		'call_to_action_btn_enable_2'     => true,
		'call_to_action_btn_label_2'      => esc_html__( 'View the course catalog', 'academic-pro' ),
		'call_to_action_btn_link_2'       => '#',
		'call_to_action_btn_target_2'     => false,
		
		// Partners
		'partner_enable'                  => 'static-frontpage',
		'partner_type'                    => 'demo',
		'partner_title'                   => esc_html__( 'Our Partners', 'academic-pro' ),
		'partner_sub_title'               => esc_html__( 'How can we help you', 'academic-pro' ),
		'no_of_partner'                   => 3,
		'partner_layout'                  => 6,
		'partner_dragable'                => true,
		'partner_autoplay'                => true,
		
		// news letter
		'newsletter_enable'              => 'static-frontpage',
		'newsletter_title'               => esc_html__( 'Stay Updated With University', 'academic-pro' ),
		'newsletter_sub_title'           => esc_html__( 'Lorem Ipsum roin gravida nibh vel', 'academic-pro' ),
		
		// Contact info
		'contact_us_contact_info_title'   => esc_html__( 'Contact Info', 'academic-pro' ),
		'contact_us_contact_info_phone'   => '+977-123456789',
		'contact_us_contact_info_address' => esc_html__( '28 Jackson Blvd Ste 1020 Chicago IL 60604-2340', 'academic-pro' ),
		'contact_us_contact_info_email'   => 'info@university.com',
		'contact_us_contact_map_title'    => esc_html__( 'Location Map', 'academic-pro' ),
		'contact_us_social_icon_enable'   => false,
		
		// Schedule 
		'schedule_post_num'               => 8,
	);

	$output = apply_filters( 'academic_pro_default_theme_options', $academic_pro_default_options );
	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}