<?php
/**
 * Category Blog One
 *
 * This is the template for the content of Category blog one
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */
if ( ! function_exists( 'academic_pro_add_category_blog_one' ) ) :
  /**
   * Add Category Blog One
   *
   *@since Academic Pro 1.0
   */
  function academic_pro_add_category_blog_one() {

    // Check if cat blog one is enabled on frontpage
    $category_blog_one_enable = apply_filters( 'academic_pro_section_status', true, 'category_blog_one_enable' );
    if ( true !== $category_blog_one_enable ) {
      return false;
    }

    // Get Category Blog One details
    $section_details = array();
    $section_details = apply_filters( 'academic_pro_filter_category_blog_one_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Category Blog One now.
    academic_pro_render_category_blog_one( $section_details );
  }
endif;
add_action( 'academic_pro_primary_content', 'academic_pro_add_category_blog_one', 30 );


if ( ! function_exists( 'academic_pro_get_category_blog_one_details' ) ) :
  /**
   * Category Blog One details.
   *
   * @since Academic Pro 1.0
   * @param array $input Category Blog One details.
   */
  function academic_pro_get_category_blog_one_details( $input ) {
    $options = academic_pro_get_theme_options();

    // Category Blog One Type
    $category_blog_one_type  = $options['category_blog_one_type'];

    $content = array();
    switch ( $category_blog_one_type ) {
        case 'demo':
            for ( $i = 1; $i <= 7; $i++ ) { 
                $content[$i]['title']           = esc_html__( 'Evaluating social programs', 'academic-pro');
                $content[$i]['url']             = '#';
                $content[$i]['comment_count']   = 2;
                $content[$i]['views_count']     = 325;
                $content[$i]['img_array'][0]    = get_template_directory_uri().'/assets/uploads/recent-slider-0'.$i.'.jpg';
                $content[$i]['excerpt']         = esc_html__( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit consequat ipsum, nec sagittis sem nibh id elit uis sed odio.Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit consequat ipsum, nec sagittis sem nibh id elit uis sed odio.Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit consequat ipsum, nec sagittis sem nibh id elit uis sed.', 'academic-pro');
            }
        break;

        case 'multiple-category':
            if ( ! empty( $options['category_blog_one_multiple_category'] ) ){
                $args = array(
                    'post_type' => 'post',
                    'category__in' => $options['category_blog_one_multiple_category'],
                    'posts_per_page' => absint( $options['category_blog_one_count'] )
                );
            }
        break;

        case 'recent-posts':
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => absint( $options['category_blog_one_count'] )
            );
        break;

        default:
        break;
    }

    if ( 'demo' != $category_blog_one_type &&  ! empty($args) ) {
        $posts = get_posts( $args );
        $i = 1;
        foreach ( $posts as $key => $post ) {
            $page_id    = $post->ID;
            $content[$i]['id']              = $page_id;
            $content[$i]['title']           = get_the_title( $page_id );
            $content[$i]['url']             = get_the_permalink( $page_id );
            $content[$i]['comment_count']   = get_comments_number( $page_id );
            $content[$i]['views_count']     = academic_pro_get_post_views( $page_id );
            $content[$i]['excerpt']         = academic_pro_trim_content( 120, $post );
            if ( has_post_thumbnail( $page_id ) ) {
                $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'academic-pro-category-image' );
            } else {
                $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-450x338.png';
            }
            if ( isset( $img_array ) ) {
              $content[$i]['img_array'] = $img_array;
            }
            $i++;
        }
    }

    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// Category Blog One content details.
add_filter( 'academic_pro_filter_category_blog_one_details', 'academic_pro_get_category_blog_one_details' );


if ( ! function_exists( 'academic_pro_render_category_blog_one' ) ) :
  /**
   * Start category blog one section 
   *
   * @return string category blog one content
   * @since Academic Pro 1.0
   *
   */
   function academic_pro_render_category_blog_one( $content_details = array() ) {
        $options                        = academic_pro_get_theme_options();
         $category_blog_one_type        = $options['category_blog_one_type'];
        $category_blog_one_title        = ! empty( $options['category_blog_one_title'] ) ? $options['category_blog_one_title'] : '';
        $category_blog_one_sub_title    = ! empty( $options['category_blog_one_sub_title'] ) ? $options['category_blog_one_sub_title'] : '';
        $category_blog_one_dragable     = ( $options['category_blog_one_dragable'] == true ) ? 'true' : 'false';
        $category_blog_one_autoplay     = ( $options['category_blog_one_autoplay'] == true ) ? 'true' : 'false';
        $category_blog_one_layout       = ! empty( $options['category_blog_one_layout'] ) ? $options['category_blog_one_layout'] : 'masonry';
        if ( $category_blog_one_layout == 'masonry' ){
            $variable_width = 'true';
            $center_mode    = 'true';
            $width_class    = 'variable-width';
        } else {
            $variable_width = 'false';
            $center_mode    = 'false';
            $width_class    = 'equal-width';
        }
        ?>  
        <section id="recent-courses-slider" class="page-section bg-blue slider os-animation">
            <div class="container">
                <header class="entry-header color-white">
                        <?php if ( ! empty($category_blog_one_title) ) : ?>
                            <h2 class="entry-title"><?php echo esc_html($category_blog_one_title); ?></h2>  
                        <?php endif; 
                        if ( ! empty($category_blog_one_sub_title) ) :?>
                            <h6 class="entry-subtitle"><?php echo esc_html($category_blog_one_sub_title); ?></h6>
                        <?php endif; ?>
                </header><!-- end .entry-header -->

              <div class="entry-content regular <?php echo esc_attr( $width_class ); ?>" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":true, "variableWidth": <?php echo esc_attr( $variable_width ); ?>,  "centerMode":<?php echo esc_attr( $center_mode ); ?>, "draggable": <?php echo esc_attr( $category_blog_one_dragable ); ?>, "autoplay": <?php echo esc_attr( $category_blog_one_autoplay ); ?> }'>

                <div class="slider-item">
                    <?php 
                    $i = 1;
                    $total_content = count( $content_details );
                    $item_masonry = array( 1, 3, 5, 6, 8, 10, 11 );
                    foreach( $content_details as $content ) : 
                        if( $category_blog_one_layout == 'masonry' ) : ?>
                            <div class="slider-item-<?php echo ( in_array( $i, $item_masonry ) ) ? 1 : 2; ?>">
                        <?php else : ?>  
                            <div class="slider-item-<?php echo ( $i%2 == 0 ) ? 2 : 1; ?>">  
                        <?php endif; ?>
                            <div class="image-wrapper">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'][0] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                            </div><!-- end .image-wrapper -->
                            <div class="course-contents-wrapper">
                                <div class="category-name">
                                    <?php if ( $category_blog_one_type == 'demo' ) {
                                        echo '<a href="#">' . esc_html__( 'Business Management','academic-pro' ) . '</a>';
                                    }
                                    else {
                                        the_category( '', '', $content['id'] );
                                    } ?>
                                </div><!-- end .posted-on -->
                                <div class="slide-title">
                                    <h3><a href="<?php echo esc_url( $content['url'] ); ?>" class="color-black"><?php echo esc_html( $content['title'] ); ?></a></h3>
                                </div><!-- end .slide-title -->
                                <?php if( ( $i == 5 || $i == 10 ) && $category_blog_one_layout == 'masonry' ): ?>
                                    <div class="slide-description">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- end .slide-description -->
                                <?php endif; ?>
                                <div class="slide-footer-content clear">
                                    <div class="pull-left">
                                        <div class="comments"><i class="fa fa-comment"></i><?php echo absint( $content['comment_count'] ); ?></div>
                                        <div class="users"><i class="fa fa-user"></i><?php echo absint( $content['views_count'] ); ?></div>
                                    </div><!-- end .pull-left -->
                                    
                                </div><!-- end .slide-description -->
                            </div><!-- end .course-contents-wrapper -->
                        </div><!-- end .slider-item-1 -->
                    <?php
                        if ( $category_blog_one_layout == 'masonry' ) {
                            if ( ( $i == 4 || $i == 9 ) && $i != $total_content ) {
                                echo '</div><div class="slider-item slider-variable-height">';
                            } elseif ( ( $i == 2 || $i == 5 || $i == 7 || $i == 10 ) && $i != $total_content && $category_blog_one_layout == 'masonry' ) {
                                echo '</div><div class="slider-item">';
                            }
                        } elseif ( $category_blog_one_layout == 'grid' ) {
                            if ( $i%2 == 0 && $i != $total_content ) {
                                echo '</div><div class="slider-item">';
                            }
                        }
                    $i++;
                    endforeach; ?>
                </div><!-- end .slider-item -->

              </div><!-- end .entry-content -->
            </div><!-- end .container -->
          </section><!-- end #recent-courses-slider -->
<?php 
    }
endif;