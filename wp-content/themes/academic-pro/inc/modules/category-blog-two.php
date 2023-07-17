<?php
/**
 * Category Blog two
 *
 * This is the template for the content of Category blog two
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */
if ( ! function_exists( 'academic_pro_add_category_blog_two' ) ) :
  /**
   * Add Category Blog two
   *
   *@since Academic Pro 1.0
   */
  function academic_pro_add_category_blog_two() {

    // Check if cat blog two is enabled on frontpage
    $category_blog_two_enable = apply_filters( 'academic_pro_section_status', true, 'category_blog_two_enable' );
    if ( true !== $category_blog_two_enable ) {
      return false;
    }

    // Get Category Blog two details
    $section_details = array();
    $section_details = apply_filters( 'academic_pro_filter_category_blog_two_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Category Blog two now.
    academic_pro_render_category_blog_two( $section_details );
  }
endif;
add_action( 'academic_pro_primary_content', 'academic_pro_add_category_blog_two', 50 );


if ( ! function_exists( 'academic_pro_get_category_blog_two_details' ) ) :
  /**
   * Category Blog two details.
   *
   * @since Academic Pro 1.0
   * @param array $input Category Blog two details.
   */
  function academic_pro_get_category_blog_two_details( $input ) {
    $options = academic_pro_get_theme_options();

    // Category Blog two Type
    $category_blog_two_type  = $options['category_blog_two_type'];

    $content = array();
    switch ( $category_blog_two_type ) {
        case 'demo':
            for ( $i = 1; $i <= 6; $i++ ) { 
                $img_count = ( $i%2 == 0 ) ? 1 : 2;
                $content[$i]['title']           = esc_html__( 'Retail banks wake up to digital lending', 'academic-pro');
                $content[$i]['url']             = '#';
                $content[$i]['comment_count']   = 2;
                $content[$i]['date']            = date_i18n( "M d, Y", strtotime( 'May 20, 2016' ) );
                $content[$i]['img_array'][0]    = get_template_directory_uri().'/assets/uploads/recent-news-0'.$img_count.'.jpg';
                $content[$i]['excerpt']         = esc_html__( 'Duis tincidunt lectus eget sem lobortis pelln tesque vitae ac augue. Vestibulum pharetra libero..', 'academic-pro');
            }
        break;

        case 'multiple-category':
            if ( ! empty( $options['category_blog_two_multiple_category'] ) ) {
                $args = array(
                    'post_type' => 'post',
                    'category__in' =>  $options['category_blog_two_multiple_category'],
                    'posts_per_page' => absint( $options['category_blog_two_count'] )
                );
            }
        break;

        case 'recent-posts':
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => absint( $options['category_blog_two_count'] )
            );
        break;

        default:
        break;
    }

    if ( 'demo' != $category_blog_two_type && ! empty( $args ) ) {
        $posts = get_posts( $args );
        $i = 1;
        foreach ( $posts as $key => $post ) {
            $page_id    = $post->ID;
            $content[$i]['title']           = get_the_title( $page_id );
            $content[$i]['url']             = get_the_permalink( $page_id );
            $content[$i]['comment_count']   = get_comments_number( $page_id );
            $content[$i]['date']            = get_the_date( 'M d, Y', $page_id );
            $content[$i]['excerpt']         = academic_pro_trim_content( 15, $post  );
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
// Category Blog two content details.
add_filter( 'academic_pro_filter_category_blog_two_details', 'academic_pro_get_category_blog_two_details' );


if ( ! function_exists( 'academic_pro_render_category_blog_two' ) ) :
  /**
   * Start category blog two section 
   *
   * @return string category blog two content
   * @since Academic Pro 1.0
   *
   */
   function academic_pro_render_category_blog_two( $content_details = array() ) {
        $options                        = academic_pro_get_theme_options();
        $category_blog_two_title        = ! empty( $options['category_blog_two_title'] ) ? $options['category_blog_two_title'] : '';
        $category_blog_two_sub_title    = ! empty( $options['category_blog_two_sub_title'] ) ? $options['category_blog_two_sub_title'] : '';
        $category_blog_two_layout       = ! empty( $options['category_blog_two_layout'] ) ? $options['category_blog_two_layout'] : 4;
        $category_blog_two_dragable     = ( $options['category_blog_two_dragable'] == true ) ? 'true' : 'false';
        $category_blog_two_autoplay     = ( $options['category_blog_two_autoplay'] == true ) ? 'true' : 'false';
        ?>  
        <section id="recent-news" class="page-section bg-black slider os-animation">
            <div class="container">
                <header class="entry-header color-white">
                        <?php if ( ! empty( $category_blog_two_title ) ) : ?>
                            <h2 class="entry-title"><?php echo esc_html( $category_blog_two_title ); ?></h2>  
                        <?php endif; 
                        if ( ! empty($category_blog_two_sub_title) ) :?>
                            <h6 class="entry-subtitle"><?php echo esc_html( $category_blog_two_sub_title ); ?></h6>
                        <?php endif; ?>
                </header><!-- end .entry-header -->

                <div class="entry-content regular" data-slick='{"slidesToShow": <?php echo absint( $category_blog_two_layout ); ?>, "slidesToScroll": 1, "infinite": true, "speed": 500, "dots": false, "arrows":true, "draggable": <?php echo esc_attr( $category_blog_two_dragable ); ?>, "autoplay": <?php echo esc_attr( $category_blog_two_autoplay ); ?> }'>
                    <?php 
                    $i = 1;
                    foreach( $content_details as $content ) : 
                        $comment_sufix = ( $content['comment_count'] <= 1 ) ? 'comment' : 'comments';
                    ?>
                        <div class="slider-item">
                            <div class="image-wrapper">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'][0] ); ?>" /></a>
                            </div><!-- end .image-wrapper -->

                            <div class="course-contents-wrapper">
                                <div class="posted-on">
                                    <a class="date"><?php echo esc_html( $content['date'] ); ?></a> | <a class="comments"><?php echo absint( $content['comment_count'] ).' '.esc_html( $comment_sufix ); ?></a>
                                </div><!-- end .posted-on -->
                                <div class="slide-title">
                                    <h3><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h3>
                                </div><!-- end .slide-title -->
                                <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="slide-description">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- end .slide-description -->
                                <?php endif; ?>
                                <?php if ( ! empty( $content['read_more_text'] ) ) : ?>
                                <div class="buttons">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-blue"><?php echo esc_html( $options['read_more_text'] ); ?><i class="fa fa-angle-right"></i></a>
                                </div><!-- end .buttons -->
                                <?php endif; ?>
                            </div><!-- end .slider-contents wrapper -->
                        </div><!-- end .slider-item -->

                    <?php
                    $i++;
                    endforeach; ?>

                </div><!-- end .entry-content -->
            </div><!-- end .container -->
        </section><!-- end #recent-courses-slider -->
<?php 
    }
endif;