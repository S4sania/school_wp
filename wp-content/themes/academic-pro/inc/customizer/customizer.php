<?php
/**
 * Academic Pro Theme Customizer.
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function academic_pro_customize_register( $wp_customize ) {
	$options = academic_pro_get_theme_options();

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load customizer custom controls functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	// Load customize partial functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'container_inclusive' => false,
			'render_callback'     => 'academic_pro_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'academic_pro_customize_partial_blogdescription',
		) );
	}

	// Header title color setting and control.
	$wp_customize->add_setting( 'academic_pro_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_pro_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'academic-pro' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'academic_pro_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_pro_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'academic-pro' ),
		'section'           => 'colors',
	) ) );

	// Load additonal menu options
	require get_template_directory() . '/inc/customizer/sections/menu.php';

	// Load color layout options
	require get_template_directory() . '/inc/customizer/sections/color.php';

	$wp_customize->add_setting( 'academic_pro_theme_options[theme_version]', array(
		'default'           => $options['theme_version'],
		'sanitize_callback' => 'academic_pro_sanitize_select',
	) );

	$wp_customize->add_control( 'academic_pro_theme_options[theme_version]', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Theme Version', 'academic-pro' ),
		'choices'  => array(
            'dark-version'   	=> esc_html__( 'Dark Version', 'academic-pro' ),
            'lite-version'      => esc_html__( 'Lite Version', 'academic-pro' ),
		),
		'section'  => 'colors',
	) );

	// Add panel for sections
	$wp_customize->add_panel( 'academic_pro_sections_panel' , array(
	    'title'      => esc_html__( 'Sections','academic-pro' ),
	    'description'=> esc_html__( 'Section Options.', 'academic-pro' ),
	    'priority'   => 140,
	) );

	// load homepage layout option
	require get_template_directory() . '/inc/customizer/sections/home-layout.php';
	
	// Load additonal menu options
	require get_template_directory() . '/inc/customizer/sections/top-bar.php';
	
	// Slider
	require get_template_directory() . '/inc/customizer/sections/slider.php';

	// About
	require get_template_directory() . '/inc/customizer/sections/about.php';

	if ( academic_pro_is_jetpack_cpt_module_enable( 'jetpack_portfolio' ) ) {
		// Testimonial
		require get_template_directory() . '/inc/customizer/sections/testimonial.php';
	}

	// category blog one
	require get_template_directory() . '/inc/customizer/sections/category-blog-one.php';

	// category blog two
	require get_template_directory() . '/inc/customizer/sections/category-blog-two.php';
	
	// team section
	require get_template_directory() . '/inc/customizer/sections/team.php';

	// category blog three
	require get_template_directory() . '/inc/customizer/sections/category-blog-three.php';

	// Category blog 
	require get_template_directory() . '/inc/customizer/sections/category-blog-four.php';
	
	// call to action
	require get_template_directory() . '/inc/customizer/sections/call-to-action.php';

	// partner
	require get_template_directory() . '/inc/customizer/sections/partner.php';

	// newsletter
	require get_template_directory() . '/inc/customizer/sections/newsletter.php';

	// Add panel for common theme options
	$wp_customize->add_panel( 'academic_pro_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','academic-pro' ),
	    'description'=> esc_html__( 'Theme Options.', 'academic-pro' ),
	    'priority'   => 150,
	) );


	// loader
	require get_template_directory() . '/inc/customizer/theme-options/loader.php';

	// typography
	require get_template_directory() . '/inc/customizer/theme-options/typography.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load excerpt option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load breadcrumb option
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// archive layout 
	require get_template_directory() . '/inc/customizer/theme-options/archive-layout.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
		// load custom css option
		require get_template_directory() . '/inc/customizer/theme-options/custom-css.php';
	}
	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';

	// Add panel for common theme options 
	$wp_customize->add_panel( 'academic_pro_custom_template_option_panel' , array(
	    'title'      => esc_html__( 'Custom Template','academic-pro' ),
	    'description'=> esc_html__( 'Custom Template Options.', 'academic-pro' ),
	    'priority'   => 150,
	) );

	// Gallery option
	require get_template_directory() . '/inc/customizer/custom-templates/gallery.php';

	// Contact Us option
	require get_template_directory() . '/inc/customizer/custom-templates/contact-us.php';

	// Schedule option
	require get_template_directory() . '/inc/customizer/custom-templates/schedule.php';
}
add_action( 'customize_register', 'academic_pro_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function academic_pro_customize_preview_js() {
	wp_enqueue_script( 'academic_pro_customizer', get_template_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'academic_pro_customize_preview_js' );


if ( ! function_exists( 'academic_pro_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Academic Pro 1.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function academic_pro_reset_options() {
		$options = academic_pro_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'academic_pro_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'academic_pro_reset_options' );

if ( ! function_exists( 'academic_pro_inline_css' ) ) :
	// Add Custom Css
	function academic_pro_inline_css() {
		$options = academic_pro_get_theme_options();
		
		$academic_pro_custom_css = '';
		$css = '';

		// Check if the custom CSS feature of 4.7 exists
		if ( function_exists( 'wp_update_custom_css_post' ) ) {
		    // Migrate any existing theme CSS to the core option added in WordPress 4.7.
		    if( !empty( $options['custom_css'] ) )
		    	$css = $options['custom_css'];
		    
		    if ( $css ) {
		        $core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
		        $return = wp_update_custom_css_post( $core_css . $css );
				
		        if ( ! is_wp_error( $return ) ) {
		            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
		   			$options['custom_css'] = '';
					set_theme_mod( 'academic_pro_theme_options', $options );
		        }
		    }
		} else {
		    // Back-compat for WordPress < 4.7.
			if ( isset( $options['custom_css'] ) ) {
				$academic_pro_custom_css = $options['custom_css'];
			}
		}

		// Get top bar bg color
		if ( ! empty( $options['top_bar_bg_color'] ) ) {
			$top_bar_bg_color = $options['top_bar_bg_color'];
		}

		$color_layout = $options[ 'color_layout' ];
		$color_layout_css = '';
		if ( '#347fe1' == $color_layout ) {
			$color_layout = '';
		}

		if ( ! empty( $color_layout ) ) {
			$color_layout_css = '
			/*--------------- COLOR LAYOUT ----------------------*/
			/*--------------- BACKGROUND COLORS ----------------------*/

			.site-header,
			.backtotop,
			li .wide, 
			li .boxed,
			.btn-blue,
			.btn-yellow,
			.main-navigation ul ul,
			.entry-title:after, 
			#secondary .widget-title:after,
			.wpcf7-form input[type="submit"],
			.portfolio-filter .active,
			.schedule-table thead,
			.sidr,
			#sidr-left-top-button,
			.bg-blue,
			.navigation.pagination a,
		 	.navigation.pagination span,
			.navigation.posts-navigation a,
			.navigation.post-navigation a,
			.navigation.post-navigation a, .blue-overlay,
			#subscribe-form button[type="submit"]:hover, 
			#subscribe-form button[type="submit"]:focus, 
			.wpcf7-form input[type="submit"]:hover, 
			.wpcf7-form input[type="submit"]:focus, 
			.comment-form input[type="submit"]:hover, 
			.comment-form input[type="submit"]:focus,
			.wpcf7-form input[type="submit"], 
			.comment-form input[type="submit"],
			.second-design .btn-yellow, 
			.second-design .btn-blue, 
			.second-design #background-image-section .buttons .btn:nth-child(1),
			.portfolio-filter .active a, 
			.portfolio-filter a:hover, 
			.portfolio-filter a:focus,
			.woocommerce #respond input#submit:hover, 
			.woocommerce a.button:hover, 
			.woocommerce button.button:hover, 
			.woocommerce input.button:hover,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover, 
			.woocommerce button.button.alt:hover, 
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:focus, 
			.woocommerce a.button:focus, 
			.woocommerce button.button:focus, 
			.woocommerce input.button:focus,
			.woocommerce #respond input#submit.alt:focus,
			.woocommerce a.button.alt:focus, 
			.woocommerce button.button.alt:focus, 
			.woocommerce input.button.alt:focus,
			.woocommerce ul.products li.product a.added_to_cart.wc-forward:hover,
			.woocommerce ul.products li.product a.added_to_cart.wc-forward:focus,
			.woocommerce span.onsale,
			.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a {
			    background-color: '.esc_attr( $color_layout ).';
			}
			.second-design .btn-yellow, 
			.second-design .btn-blue, 
			.second-design #background-image-section .buttons .btn:nth-child(1),
			.portfolio-filter ul li a,
			.woocommerce #respond input#submit, 
			.woocommerce a.button, 
			.woocommerce button.button, 
			.woocommerce input.button,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt, 
			.woocommerce button.button.alt, 
			.woocommerce input.button.alt,
			.woocommerce ul.products li.product a.added_to_cart.wc-forward,
			.woocommerce #respond input#submit.disabled, 
			.woocommerce #respond input#submit:disabled, 
			.woocommerce #respond input#submit:disabled[disabled], 
			.woocommerce a.button.disabled, 
			.woocommerce a.button:disabled, 
			.woocommerce a.button:disabled[disabled], 
			.woocommerce button.button.disabled, 
			.woocommerce button.button:disabled, 
			.woocommerce button.button:disabled[disabled], 
			.woocommerce input.button.disabled, 
			.woocommerce input.button:disabled, 
			.woocommerce input.button:disabled[disabled] {
			    border-color: '.esc_attr( $color_layout ).';
			}

			.second-design .btn-yellow, 
			.second-design .btn-blue, 
			.second-design #background-image-section .buttons .btn:nth-child(1) {
				color: #fff;
			}
			/*--------------- END BACKGROUND COLORS ----------------------*/



			/*--------------- COLORS ----------------------*/
			a,
			.address-block .fa,
			#top-bar .address-block li a:hover, 
			#top-bar .login-signup li a:hover,
			.main-slider-contents .title,
			.picker_close, 
			.picker_close:hover, 
			.picker_close:focus,
			.entry-title,
			.slick-prev:before, 
			.slick-next:before,
			.slick-dots li.slick-active button:before,
			.slick-dots li button::before,
			#recent-news .buttons .btn-blue,
			.btn-border-white:hover,
			.social-icons a:hover:before,
			.widget-title,
			.type-post .entry-title a,
			.loader-container .fa,
			#contact-information .address-block .fa,
			.breadcrumb-current, 
			#breadcrumb-list a:hover,
			ul.tabs li.active .fa,
			.star-rating li,
			.comments a:hover, 
			.users a:hover,
			.posted-on, .posted-on a, 
			.slide-title h3 a:hover, 
			#upcoming-events .slide-title h3 a:hover, 
			.slide-title h3 a.color-black:hover,
			#secondary a:hover,
			.widget .category-name,
			.designation .client-name:hover,
			.color-switcher .font-family li.active a, 
			.color-switcher .font-family li a:hover,
			.portfolio-filter ul li a,
			.type-post .entry-footer span a:hover,
			.site-info a:hover,
			.banner-wrapper .entry-title,
			.btn-border-white:hover, .btn-border-white:focus,
			.title-404, 
			.entry-title,
			ul.trail-items a:hover, 
			ul.trail-items a:focus, 
			ul.trail-items li.trail-item.trail-end span,
			.main-navigation .current_page_item > a, 
			.main-navigation .current-menu-item > a, 
			.main-navigation .current_page_ancestor > a, 
			.main-navigation .current-menu-ancestor > a,
			.second-design #site-navigation ul#primary-menu > li > a:hover, 
			.second-design #site-navigation ul#primary-menu > li > a:focus, 
			.second-design #site-navigation ul#primary-menu > li.current-menu-item > a {
				color: '.esc_attr( $color_layout ).';
			}
			.btn-yellow,
			#recent-news .buttons .btn-blue:hover,
			.color-yellow {
				color: #fff;
			}
			.main-navigation ul > li:hover > a,
			.main-navigation .current-menu-item > a {
				color: #ddd;
			}
			/*--------------- END COLORS ----------------------*/



			/*--------------- HOVER BACKGROUND COLORS ----------------------*/
			.site-header .sub-menu li:hover,
			#subscribe-form button[type="submit"]:hover,
			.wpcf7-form input[type="submit"]:hover,
			.sidr ul li:hover,
			.navigation.pagination a:after, .navigation.pagination span:after, .navigation.posts-navigation a:after, .navigation.post-navigation a:after, .navigation.post-navigation a:after,
			.btn-blue:after, .btn-yellow:after {
				background-color: rgba(0, 0, 0, 0.2);
			}


			/*--------------- END HOVER BACKGROUND COLORS ----------------------*/



			/*--------------- BORDER COLOR ----------------------*/
			#our-partners .slick-slide img:hover,
			ul.tabs li.active .fa {
			    border: 1px solid '.esc_attr( $color_layout ).';
			}
			#upcoming-events .slick-slide .image-wrapper, 
			#recent-courses-slider .slick-slide .image-wrapper {
			    border-bottom: 4px solid '.esc_attr( $color_layout ).';
			}
			#main-slider .slick-prev:before, 
			#main-slider .slick-next:before
			{
				border-color: '.esc_attr( $color_layout ).';
			    color: '.esc_attr( $color_layout ).';
			}
			.slick-prev:before, 
			.slick-next:before,
			#recent-courses-slider .slick-prev:before, 
			#recent-courses-slider .slick-next:before {
			    border: 2px solid #ddd;
			    color: #aaa;
			}
			#recent-courses-slider .slick-prev:before, 
			#recent-courses-slider .slick-next:before
			{
			    color: #eee;
			}
			/*--------------- END BORDER COLOR ----------------------*/
			/*--------------- COLOR LAYOUT ENDS ----------------------*/
			';
		}
		$css = '';
		$header_title_color = $options['header_title_color'];
		$header_tagline_color = $options['header_tagline_color'];

		/*
		 * If no custom options for text are set, let's bail.
		 */
		if ( $header_title_color && $header_tagline_color ) {

			// If we get this far, we have custom styles. Let's do this.
				// Has the text been hidden?
			if ( ! display_header_text() ) :
			$css .='	
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}';

			// If the user has set a custom color for the text use that.
			else :
			$css .='
			.site-title a,
			#site-header .site-title a {
				color: '.esc_attr( $header_title_color ).';
			}
			.site-description {
				color: '.esc_attr( $header_tagline_color ).';
			}';
			endif; 
		}
		$css .= '
			/* Social menu background color */
			#top-bar {
				background-color: '.esc_attr( $top_bar_bg_color ).';
			}';

		$css .= $color_layout_css;
		$css .= $academic_pro_custom_css;
		wp_add_inline_style( 'academic-pro-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'academic_pro_inline_css', 10 );



if ( ! function_exists( 'academic_pro_add_inline_scripts' ) ) :
	function academic_pro_add_inline_scripts() {
		$options = academic_pro_get_theme_options();

		$fixed_menu_script = '';
		if ( $options['make_menu_sticky'] ) {
	   		$fixed_menu_script = '
	   			( function( $ ) {
	   				$(window).scroll(function() {    
					    var scroll = $(window).scrollTop();  
					    if (scroll > 50) {
					        $(".site-header").addClass("active");
					        $(".site-header").addClass("fixed");
					    }
					    else {
					         $(".site-header").removeClass("active");
					        $(".site-header").removeClass("fixed");
					    }
					});
				} )( jQuery );';
		}
		$script = $fixed_menu_script;
	   	wp_add_inline_script( 'academic-pro-custom', $script );
	}
endif;
add_action( 'wp_enqueue_scripts', 'academic_pro_add_inline_scripts' );
