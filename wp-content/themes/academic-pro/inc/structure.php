<?php
/**
 * Academic Pro basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

if ( ! function_exists( 'academic_pro_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Academic Pro 1.0
	 */
	function academic_pro_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'academic_pro_doctype', 'academic_pro_doctype', 10 );


if ( ! function_exists( 'academic_pro_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'academic_pro_before_wp_head', 'academic_pro_head', 10 );


if ( ! function_exists( 'academic_pro_page_start' ) ) :
	/**
	 * Start div id #page and screen reader link
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_page_start() {
		?>
		<div id="page" class="hfeed site">
			<div class="site-inner">
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'academic-pro' ); ?></a>
		<?php
	}
endif;
add_action( 'academic_pro_page_start', 'academic_pro_page_start', 10 );


if ( ! function_exists( 'academic_pro_header_start' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_header_start() {
		?>
        <header id="masthead" class="site-header">
            <div class="container">
		<?php
	}
endif;
add_action( 'academic_pro_header', 'academic_pro_header_start', 10 );


if ( ! function_exists( 'academic_pro_site_branding_start' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_site_branding_start() {
		?>
        <div class="site-branding align-left"><!-- use align-right class to change logo position -->
		<?php
	}
endif;
add_action( 'academic_pro_header', 'academic_pro_site_branding_start', 20 );


if ( ! function_exists( 'academic_pro_site_logo' ) ) :
	/**
	 * Start div class .site-branding
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_site_logo() {
		?>
	        <div class="site-logo text-center">
	        	<?php
	        	if ( function_exists( 'the_custom_logo' ) ) {
	        		the_custom_logo();
	        	}
	        	?>
	        </div><!-- end .site-logo -->
		<?php
	}
endif;
add_action( 'academic_pro_header', 'academic_pro_site_logo', 30 );


if ( ! function_exists( 'academic_pro_site_header' ) ) :
	/**
	 * Start div class .site-branding
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_site_header() {
		?>
        <div id="site-header">
            <?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
        </div><!-- end #site-header -->
		<?php
	}
endif;
add_action( 'academic_pro_header', 'academic_pro_site_header', 40 );


if ( ! function_exists( 'academic_pro_site_branding_end' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_site_branding_end() {
		?>
	    </div><!--end .site-branding-->
		<?php
	}
endif;
add_action( 'academic_pro_header', 'academic_pro_site_branding_end', 50 );


if ( ! function_exists( 'academic_pro_header_end' ) ) :
	/**
	 * End header class id #masthead
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_header_end() {
		?>
        	</div><!-- end .menu-wrapper -->
        </header><!--end .site-header-->
		<?php
	}
endif;
add_action( 'academic_pro_header', 'academic_pro_header_end', 100 );


if ( ! function_exists( 'academic_pro_content_start' ) ) :
	/**
	 * Start div id #content
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'academic_pro_content_start', 'academic_pro_content_start', 10 );


if ( ! function_exists( 'academic_pro_content_end' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_content_end() {
		?>
		</div><!--end .site-content-->
		<?php
	}
endif;
add_action( 'academic_pro_content_end', 'academic_pro_content_end', 100 );


if ( ! function_exists( 'academic_pro_footer_start' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_footer_start() {
		$footer_sidebar_data = academic_pro_footer_sidebar_class();
		$class               = $footer_sidebar_data['class'];
		?>
		<footer id="colophon" class="site-footer <?php echo esc_attr( $class );?>-col" role="contentinfo">
		<?php
	}
endif;
add_action( 'academic_pro_footer', 'academic_pro_footer_start', 10 );


if ( ! function_exists( 'academic_pro_footer' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_footer() {

		$footer_sidebar_data = academic_pro_footer_sidebar_class();
		$active_id           = $footer_sidebar_data['active_id'];

		if ( empty( $active_id ) ) {
			return;
		} ?>
        <div class="container page-section">
	      	<?php for ( $i=0; $i < count( $active_id ); $i++ ) { ?>

			<div class="column-wrapper">
	      		<?php 
	      		if ( is_active_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' ) ){
	      			dynamic_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' );
	      		}
	      		?>
	      	</div>
	      	<?php } ?>
        </div><!-- end .container -->
		<?php
	}
endif;
add_action( 'academic_pro_footer', 'academic_pro_footer', 30 );


if ( ! function_exists( 'academic_pro_copyright' ) ) :
	/**
	 * End div class .site-info
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_copyright() { 
		$options = academic_pro_get_theme_options();

		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text 	= $options['copyright_text'];
		
		if ( ! empty( $copyright_text ) ) :  ?>
	    <div class="site-info copyright text-center">
	    	<div class="container">
	      		<?php 
	      		echo wp_kses_post( $copyright_text );
	      		if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '<span> | </span>' );
				}
	      		?>
	    	</div>
	    </div><!-- end .site-info -->  	
	<?php
		endif;
	}
endif;
add_action( 'academic_pro_footer', 'academic_pro_copyright', 40 );


if ( ! function_exists( 'academic_pro_footer_end' ) ) :
	/**
	 * End footer id #colophon
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_footer_end() {
		?>
        </footer><!-- end .site-footer -->
		<?php
	}
endif;
add_action( 'academic_pro_footer', 'academic_pro_footer_end', 100 );


if ( ! function_exists( 'academic_pro_back_to_top' ) ) :
	/**
	 * Back to top class .backtotop
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_back_to_top() {
		$options = academic_pro_get_theme_options();
		if ( $options['scroll_top_visible'] ) : ?>
        	<div class="backtotop"><i class="fa fa-angle-up fa-2x"></i></div><!--end .backtotop-->
		<?php endif;
	}
endif;
add_action( 'academic_pro_back_to_top', 'academic_pro_back_to_top', 10 );


if ( ! function_exists( 'academic_pro_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_loader() {
		$options = academic_pro_get_theme_options();
		if ( $options['loader_enable'] ) { ?>
			<div id="loader">
	         <div class="loader-container">
         		<i class="fa <?php echo esc_attr( $options['loader_icon'] );?> fa-spin"></i>
	         </div>
	     	</div><!-- end loader -->
		<?php }
	}
endif;
add_action( 'academic_pro_loader_action', 'academic_pro_loader', 10 );


if ( ! function_exists( 'academic_pro_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since Academic Pro 1.0
	 */
	function academic_pro_add_breadcrumb() {
		$options = academic_pro_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		$args = array(
			'show_on_front'   => false,
			'show_title'      => true,
			'show_browse'     => false,
		);
		echo '<div class="container">';
		breadcrumb_trail( $args );
		echo '</div>';
		
		return;

	}
endif;
add_action( 'academic_pro_breadcrumb_action', 'academic_pro_add_breadcrumb' , 10 );


if ( ! function_exists( 'academic_pro_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_page_end() {
		?>
				</div><!--end .site-inner -->
		</div><!-- end #page-->
		<?php
	}
endif;
add_action( 'academic_pro_page_end', 'academic_pro_page_end', 100 );


if ( ! function_exists( 'academic_pro_page_section' ) ) :
	/**
	 * Start div class .container .page-section
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_page_section() {
		?>
		<div class="container page-section">
		<?php
	}
endif;
add_action( 'academic_pro_page_section', 'academic_pro_page_section', 10 );


if ( ! function_exists( 'academic_pro_page_section_end' ) ) :
	/**
	 * Start div class .container .page-section
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_page_section_end() {
		?>
		</div><!-- end .page-section" -->
		<?php
	}
endif;
add_action( 'academic_pro_page_section_end', 'academic_pro_page_section_end', 10 );