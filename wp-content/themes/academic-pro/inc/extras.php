<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function academic_pro_body_classes( $classes ) {
	$options = academic_pro_get_theme_options();

	// Add class only when laoder is disabled
	if ( ! $options['loader_enable'] ) {
		$classes[] = 'display-none';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class for typography
	$typography = (  $options['theme_typography'] == 'default' ) ? '' :  $options['theme_typography'];
	$classes[] = esc_attr( $typography );

	// Add a class for layout
	$classes[] = esc_attr( $options['site_layout'] );

	$sidebar_position = academic_pro_layout();

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = esc_attr( $sidebar_position );
	} else {
		$classes[] = 'no-sidebar';
	}

	if ( is_404() ) {
		$classes[] = 'no-sidebar';
	}

	$theme_version 	= ! empty( $options['theme_version'] ) ? $options['theme_version'] : '';
	$classes[]		= esc_attr( $theme_version );
	
	// Add a class for home layout
	$classes[]		= esc_attr( $options['home_layout'] );

	return $classes;
}
add_filter( 'body_class', 'academic_pro_body_classes' );


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function academic_pro_custom_search_form( $form ) {
    $form = '<form action="'. esc_url( home_url( '/' ) ) .'" method="get">
			  <input type="search" name="s" placeholder="' . esc_attr__( 'Search&hellip;', 'academic-pro' ) . '">
			  <button type="submit"><i class="fa fa-search"></i></button>
			</form>';

    return $form;
}
add_filter( 'get_search_form', 'academic_pro_custom_search_form' );
