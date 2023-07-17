<?php
/**
 * Add Academic Pro modules
 *
 * This is the template that includes all featured modules of Academic Pro
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

// Add top bar
require get_template_directory() . '/inc/modules/top-bar.php';

// Add menu
require get_template_directory() . '/inc/modules/menu.php';

// Add slider section
require get_template_directory() . '/inc/modules/slider.php';

// Add about section
require get_template_directory() . '/inc/modules/about.php';

// Add category blog one
require get_template_directory() . '/inc/modules/category-blog-one.php';

if ( academic_pro_is_jetpack_cpt_module_enable( 'jetpack_portfolio' ) ) {
	// Add testimonial section
	require get_template_directory() . '/inc/modules/testimonial.php';
}

// Add category blog two
require get_template_directory() . '/inc/modules/category-blog-two.php';

// Add team section
require get_template_directory() . '/inc/modules/team.php';

// Add category blog three
require get_template_directory() . '/inc/modules/category-blog-three.php';

// Add cat blog four section
require get_template_directory() . '/inc/modules/category-blog-four.php';

// Add call to action
require get_template_directory() . '/inc/modules/call-to-action.php';

// Add partner
require get_template_directory() . '/inc/modules/partner.php';

// Add newsletter
require get_template_directory() . '/inc/modules/newsletter.php';
