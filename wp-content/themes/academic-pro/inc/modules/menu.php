<?php
/**
 * Menu
 *
 * This is the template for all registered menus
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

if ( ! function_exists( 'academic_pro_navigation' ) ) :
	/**
	 * Add primary menu
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_navigation() {
		?>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
        <?php 
        endif;
	}
endif;
add_action( 'academic_pro_header', 'academic_pro_navigation', 60 );


if ( ! function_exists( 'academic_pro_append_search' ) ) :
	/**
	 * Add search bar to menu
	 */

	function academic_pro_append_search( $items, $args ) {
		if ( 'primary' == $args->theme_location ) {
			$options        = academic_pro_get_theme_options();

			$append_search = $options['append_search'];

		   // Search Box
		   if ( ! $append_search ) {
		        $search = '';
		   } else {
		     $search = '<div class="search-btn"><i class="fa fa-search" id="show-search"></i></div><!-- end .search-btn -->
					<div class="search" id="search">
					  <div class="container">
					    <form action="'. esc_url( home_url( '/' ) ) .'" method="get">
					      <input type="text" name="s" placeholder="' . esc_attr__( 'Search...', 'academic-pro' ) . '">
					      <button type="submit"><i class="fa fa-search"></i></button>
					      <a href="#."><i class="fa fa-close" id="close-search"></i></a>
					    </form>
					  </div><!-- end .container -->
					</div><!-- end .search -->';
		   }

		   $items = $items.$search;
		}
		return $items;
	}
endif;

add_filter('wp_nav_menu_items','academic_pro_append_search', 10, 2 );


if ( ! function_exists( 'academic_pro_mobile_menu' ) ) :
	/**
	 * Add mobile menu
	 */

	function academic_pro_mobile_menu() { ?>
		<!-- Mobile Menu -->
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
	        <nav id="sidr-left-top" class="mobile-menu sidr left">
	          <div class="site-branding text-center">
	          	<?php academic_pro_site_logo();?>
	          	<?php academic_pro_site_header(); ?>
	          </div>
	          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul' ) ); ?>
	        </nav><!-- end left-menu -->

	        <a id="sidr-left-top-button" class="menu-button right" href="#sidr-left-top"><i class="fa fa-bars"></i></a>
		<?php endif;
	}
endif;
add_filter( 'academic_pro_mobile_menu','academic_pro_mobile_menu', 70 );