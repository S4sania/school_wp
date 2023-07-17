<?php
/**
 * Academic Pro widgets inclusion
 *
 * This is the template that includes all custom widgets of Academic Pro
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function academic_pro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'academic-pro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'academic-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Newsletter', 'academic-pro' ),
		'id'            => 'academic-pro-newsletter',
		'description'   => esc_html__( 'This sidebar is only for the Newletter widget.', 'academic-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for ($i=1; $i < 4; $i++) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer ', 'academic-pro' ).$i,
			'id'            => 'footer-'.$i,
			'description'   => esc_html__( 'Add footer widgets here.', 'academic-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'academic_pro_widgets_init' );


/**
 * Include Social Link widget file
 */
require get_template_directory() . '/inc/widgets/social-link.php';

/**
 * Add Contact Info widget file
 */
require get_template_directory() . '/inc/widgets/contact-info.php';

/**
 * Add Featured Content widget file
 */
require get_template_directory() . '/inc/widgets/featured-content.php';

/**
 * Add popular post meta
 */
require get_template_directory() . '/inc/widgets/popular-post/popular-post-meta.php';

/**
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/popular-post/popular-post-widget.php';

/**
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/recent-posts.php';

/**
 * Add advertisement widget
 */
require get_template_directory() . '/inc/widgets/advertisement.php';

/**
 * Add featured image widget
 */
require get_template_directory() . '/inc/widgets/featured-image.php';

/**
 * Add newsletter widget
 */
require get_template_directory() . '/inc/widgets/newsletter.php';

/**
 * Register widgets
 */
function academic_pro_register_widgets() {
	// Register Social Link widget
	register_widget( 'Academic_Pro_Social_Link' );

	// Register Custom Info widget
	register_widget( 'Academic_Pro_Contact_Info' );

	// Register Featured Content widget
	register_widget( 'Academic_Pro_Featured_Content' );

	// Register Popular Post widget
	register_widget( 'Academic_Pro_Popular_Post' );

	// Register Recent Post widget
	register_widget( 'Academic_Pro_Recent_Posts' );

	// Register Advertisement widget
	register_widget( 'Academic_Pro_Advertisement' );

	// Register Featured Image widget
	register_widget( 'Academic_Pro_Featured_Image' );

	// Register Newsletter widget
	register_widget( 'Academic_Pro_Newsletter' );
}
add_action( 'widgets_init', 'academic_pro_register_widgets' );
