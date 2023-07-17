<?php
/**
 * academic options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */


/**
 * Section content type
 * @return array content type options
 */
function academic_pro_content_type() {
  $academic_pro_content_type = array(
    'demo'  => esc_html__( 'Demo', 'academic-pro' ),
    'custom'=> esc_html__( 'Custom', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_content_type', $academic_pro_content_type );

  return $output;
}


/**
 * Returns list of typography
 * @return array font styles
 */
function academic_pro_typography_options(){

    $choices = array(
      'poppins'   => esc_html__( 'POPPINS AND COURGETTE FONT', 'academic-pro' ),
      'roboto'    => esc_html__( 'ROBOTO AND MONTSERRAT FONT', 'academic-pro' ),
      'raleway'   => esc_html__( 'RALEWAY AND POPPINS FONT', 'academic-pro' ),
      'courgette' => esc_html__( 'COURGETTE AND ROBOTO FONT', 'academic-pro' ),
      'montserrat'=> esc_html__( 'MONTSERRAT FONT', 'academic-pro' ),
      'default'   => esc_html__( 'DEFAULT', 'academic-pro' ),
    );
    $output = apply_filters( 'academic_pro_typography_options', $choices );
    if ( ! empty( $output ) ) {
      ksort( $output );
    }
    return $output;

}

/**
 * Site Layout
 * @return array site layout options
 */
function academic_pro_site_layout() {
  $academic_pro_site_layout = array(
    'wide'  => esc_html__( 'Wide', 'academic-pro' ),
    'boxed' => esc_html__( 'Boxed', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_site_layout', $academic_pro_site_layout );

  return $output;
}

/**
 * Sidebar position
 * @return array Sidbar positions
 */
function academic_pro_sidebar_position() {
  $academic_pro_sidebar_position = array(
    'right-sidebar' => esc_html__( 'Right', 'academic-pro' ),
    'left-sidebar'  => esc_html__( 'Left', 'academic-pro' ),
    'no-sidebar'    => esc_html__( 'No Sidebar', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_sidebar_position', $academic_pro_sidebar_position );

  return $output;
}

/**
 * Header image options
 * @return array Header image options
 */
function academic_pro_header_image() {
  $academic_pro_header_image = array(
    'enable' => esc_html__( 'Enable( Featured Image )', 'academic-pro' ),
    '' => esc_html__( 'Default ( Customizer Header Image )', 'academic-pro' ),
    'show-both' => esc_html__( 'Show Both( Featured and Header Image )', 'academic-pro' ),
    'disable'  => esc_html__( 'Disable', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_header_image', $academic_pro_header_image );

  return $output;
}

/**
 * Pagination
 * @return array site pagination options
 */
function academic_pro_pagination_options() {
  $academic_pro_pagination_options = array(
    'numeric'=> esc_html__( 'Numeric', 'academic-pro' ),
    'default'=> esc_html__( 'Default(Older/Newer)', 'academic-pro' ),
  );
  if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
        $academic_pro_pagination_options['infinite-click'] = 'Infinite Click';
        $academic_pro_pagination_options['infinite-scroll'] = 'Infinite Scroll';
    }

  $output = apply_filters( 'academic_pro_pagination_options', $academic_pro_pagination_options );

  return $output;
}


/**
 * Slider
 * @return array slider options
 */
function academic_pro_enable_disable_options() {
  $academic_pro_enable_disable_options = array(
    'static-frontpage'  => esc_html__( 'Static Frontpage', 'academic-pro' ),
    'disabled'          => esc_html__( 'Disabled', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_enable_disable_options', $academic_pro_enable_disable_options );

  return $output;
}


/**
 * Enabling options
 * @return array Enable options
 */
function academic_pro_enable_entire_option() {
  $academic_pro_enable_entire_option = array(
    'static-frontpage'  => esc_html__( 'Static Frontpage', 'academic-pro' ),
    'disabled'          => esc_html__( 'Disabled', 'academic-pro' ),
    'entire-site'          => esc_html__( 'Entrie Site', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_enable_entire_option', $academic_pro_enable_entire_option );

  return $output;
}

/**
 * Slider content types
 * @return array Content types
 */
function academic_pro_slider_content_type() {
  $academic_pro_content_type = array(
    'demo'      => esc_html__( 'Demo', 'academic-pro' ),
    'page'      => esc_html__( 'Page', 'academic-pro' ),
    'post'      => esc_html__( 'Post', 'academic-pro' ),
    'category'  => esc_html__( 'Category', 'academic-pro' ),
  ); 

  $output = apply_filters( 'academic_pro_slider_content_type', $academic_pro_content_type );

  // Sort array in ascending order, according to the key:
  if ( ! empty( $output ) ) {
    ksort( $output );
  }

  return $output;
}

/**
 * Slider effects
 * @return array Slider effects
 */
function academic_pro_slider_effect() {
  $academic_pro_slider_effect = array(
    'fade'                                        => esc_html__( 'Fade', 'academic-pro' ),
    'cubic-bezier(0.250, 0.250, 0.750, 0.750)'    => esc_html__( 'Linear', 'academic-pro' ),
    'cubic-bezier(0.250, 0.100, 0.250, 1.000)'    => esc_html__( 'Ease', 'academic-pro' ),
    'cubic-bezier(0.950, 0.050, 0.795, 0.035)'    => esc_html__( 'cubic', 'academic-pro' ),
    'cubic-bezier(0.600, -0.280, 0.735, 0.045)'   => esc_html__( 'Ease In Back', 'academic-pro' ),
    'cubic-bezier(0.785, 0.135, 0.150, 0.860)'    => esc_html__( 'EaseInOutCirc', 'academic-pro' ),
    'cubic-bezier(0.680, -0.550, 0.265, 1.550)'   => esc_html__( 'EaseInOutBack', 'academic-pro' ),
  );

  $output =  apply_filters( 'academic_pro_slider_effect', $academic_pro_slider_effect );

  // Sort array in ascending order, according to the key:
  if ( ! empty( $output ) ) {
    ksort( $output );
  }

  return $output;
}


/**
 * About Section
 * @return array slider options
 */
function academic_pro_about_content_options() {
  $academic_pro_about_content_options = array(
    'custom'    => esc_html__( 'Custom', 'academic-pro' ),
    'page'      => esc_html__( 'Page', 'academic-pro' ),
    'demo'      => esc_html__( 'Demo', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_about_content_options', $academic_pro_about_content_options );

  return $output;
}


/**
 * Testimonial
 * @return array Testimonial content type
 */
function academic_pro_testimonial_content_type() {
  $academic_pro_testimonial_content_type = array(
    'demo'         => esc_html__( 'Demo', 'academic-pro' ),
    'testimonials' => esc_html__( 'Testimonials', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_testimonial_content_type', $academic_pro_testimonial_content_type );
  return $output;
}


/**
 * Category blog one content type
 * @return array Category blog one content type options
 */
function academic_pro_category_blog_one_type() {
  $academic_pro_category_blog_one_type = array(
    'demo'              => esc_html__( 'Demo', 'academic-pro' ),
    'multiple-category' => esc_html__( 'Multiple Category', 'academic-pro' ),
    'recent-posts'      => esc_html__( 'Recent Posts', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_category_blog_one_type', $academic_pro_category_blog_one_type );

  return $output;
}


/**
 * Category blog one content layout
 * @return array Category blog one content type options
 */
function academic_pro_category_blog_one_layout() {
  $academic_pro_category_blog_one_layout = array(
    'grid'          => esc_html__( 'Grid', 'academic-pro' ),
    'masonry'       => esc_html__( 'Masonry', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_category_blog_one_layout', $academic_pro_category_blog_one_layout );

  return $output;
}

/**
 * Category blog two content layout
 * @return array Category blog two content type options
 */
function academic_pro_category_blog_two_layout() {
  $academic_pro_category_blog_two_layout = array(
    3  => esc_html__( '3 Column', 'academic-pro' ),
    4  => esc_html__( '4 Column', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_category_blog_two_layout', $academic_pro_category_blog_two_layout );

  return $output;
}


/**
 * Category blog four
 * @return array cat blog four content type
 */
function academic_pro_cat_blog_four_content_type() {
  $academic_pro_cat_blog_four_content_type = array(
    'demo'         => esc_html__( 'Demo', 'academic-pro' ),
    'category' => esc_html__( 'Category', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_cat_blog_four_content_type', $academic_pro_cat_blog_four_content_type );
  
  return $output;
}


/**
 * Category blog four content layout
 * @return array Category blog four content type options
 */
function academic_pro_category_blog_four_layout() {
  $academic_pro_category_blog_four_layout = array(
    2  => esc_html__( '2 Column', 'academic-pro' ),
    3  => esc_html__( '3 Column', 'academic-pro' ),
    4  => esc_html__( '4 Column', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_category_blog_four_layout', $academic_pro_category_blog_four_layout );

  return $output;
}

/**
 * Category blog three content layout
 * @return array Category blog three content type options
 */
function academic_pro_category_blog_three_layout() {
  $academic_pro_category_blog_three_layout = array(
    4  => esc_html__( '4 Column', 'academic-pro' ),
    5  => esc_html__( '5 Column', 'academic-pro' ),
    6  => esc_html__( '6 Column', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_category_blog_three_layout', $academic_pro_category_blog_three_layout );

  return $output;
}

/**
 * Category blog three content type
 * @return array Category blog three content type options
 */
function academic_pro_category_blog_three_type() {
  $academic_pro_category_blog_three_type = array(
    'demo'              => esc_html__( 'Demo', 'academic-pro' ),
    'category'          => esc_html__( 'Categories', 'academic-pro' ),
    'sub-category'      => esc_html__( 'Sub Categories', 'academic-pro' ),
  );
  $taxonomies = get_taxonomies();
  if ( count( $taxonomies ) > 0 ) {
    $academic_pro_category_blog_three_type = array_merge( $academic_pro_category_blog_three_type, array( 'custom'   => esc_html__( 'Custom Categories', 'academic-pro' ), ) );
  }

  $output = apply_filters( 'academic_pro_category_blog_three_type', $academic_pro_category_blog_three_type );

  return $output;
}

/**
 * Partner content type
 * @return array Call to action content type options
 */
function academic_pro_partner_content_type() {
  $academic_pro_partner_content_type = array(
    'demo'   => esc_html__( 'Demo', 'academic-pro' ),
    'custom' => esc_html__( 'Custom', 'academic-pro' ),
    'page'   => esc_html__( 'Page', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_partner_content_type', $academic_pro_partner_content_type );

  return $output;
}

/**
 * Category partner content layout
 * @return array Category blog one content type options
 */
function academic_pro_partner_layout() {
  $academic_pro_partner_layout = array(
    6  => esc_html__( 'Six Col', 'academic-pro' ),
    5  => esc_html__( 'Five Col', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_partner_layout', $academic_pro_partner_layout );

  return $output;
}

/**
 * Archive Grid Layout
 * @return array site archive grid layout options
 */
function academic_pro_archive_gird_layout() {
  $academic_pro_archive_gird_layout = array(
    'grid'    => esc_html__( 'Grid', 'academic-pro' ),
    'list'    => esc_html__( 'List', 'academic-pro' ),
  );

  $output = apply_filters( 'academic_pro_archive_gird_layout', $academic_pro_archive_gird_layout );

  return $output;
}


/**
 * Team content types
 * @return array Content types
 */
function academic_pro_team_content_type() {
  $academic_pro_content_type = array(
    'demo'      => esc_html__( 'Demo', 'academic-pro' ),
    'page'      => esc_html__( 'Page', 'academic-pro' ),
    'post'      => esc_html__( 'Post', 'academic-pro' ),
  ); 

  $output = apply_filters( 'academic_pro_team_content_type', $academic_pro_content_type );

  // Sort array in ascending order, according to the key:
  if ( ! empty( $output ) ) {
    ksort( $output );
  }

  return $output;
}