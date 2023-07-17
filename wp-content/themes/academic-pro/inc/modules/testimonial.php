<?php
/**
 * Testimonial
 *
 * This is the template for adding testimonial
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

if ( ! function_exists( 'academic_pro_add_testimonial' ) ) :
    /**
     * Add testimonial section
     *
     * @since Academic Pro 1.0
     */
    function academic_pro_add_testimonial() {
      // Check if testimonial is enabled on frontpage
      $testimonial_enable = apply_filters( 'academic_pro_section_status', true, 'testimonial_enable' );
      if ( true !== $testimonial_enable ) {
        return false;
      }

      // Get testimonial section details
      $section_details = array();
      $section_details = apply_filters( 'academic_pro_filter_testimonial_section_details', $section_details );

      if ( empty( $section_details ) ) {
          return;
      }

      // Render testimonial section now.
      academic_pro_render_testimonial( $section_details );
    }
endif;
add_action( 'academic_pro_primary_content', 'academic_pro_add_testimonial', 40 );


if ( ! function_exists( 'academic_pro_testimonial_section_details' ) ) :
    /**
     * Top Bar section details.
     *
     * @since Academic Pro 1.0
     *
     * @param array $input testimonial section details.
     */
    function academic_pro_testimonial_section_details( $input ) {
        $options = academic_pro_get_theme_options();

        // Testimonial content type
        $content_type = $options['testimonial_content_type'];

        $content      = array();

        switch ( $content_type ) {
            case 'demo':
              for ( $i=1; $i<5; $i++ ) {
                  $content[$i]['img_array'][0] = get_template_directory_uri() . '/assets/uploads/student-0' . $i.'.png';
                  $content[$i]['url']          = '#';
                  $content[$i]['title']        = esc_html__( 'Jane Foster', 'academic-pro' );
                  $content[$i]['content']      = esc_html__( 'Duis tincidunt lectus eget sem lobortis pelln tesque vitae ac augue. Vestibulum pharetra libero ut massa rutrum, sit amet imperdiet iaculis id feugiat enim. Ectus eget sem lobortis ac augue. Vestibulum pharetra  ibero ut massa rutrum, sit amet libero ut massa rutrum rutrum, sit amet imperdiet odio rutrum, sit amet imperdiet odio comtempor iaculis id feugiat enimpellntesque vitae ac augue.', 'academic-pro' );
              }
            break;

            case 'testimonials':
              // $id = null;
              if ( isset( $options['testimonial_post'] ) ) {
                  $ids = (array)$options['testimonial_post'];
              }

              // Bail if no valid posts are selected.
              if ( 'null' == $ids[0] ) {
                  return $input;
              }

              $args = array(
                  'no_found_rows'  => true,
                  'orderby'        => 'post__in',
                  'post_type'      => 'jetpack-testimonial',
                  'post__in'       => $ids,
                  'posts_per_page' => 4,
              );

              $posts = get_posts( $args );

              if ( ! empty( $posts ) ) {

                  $i = 1;
                  foreach ( $posts as $key => $post ) {
                    $page_id = $post->ID;
                    $img_array = null;
                    if ( has_post_thumbnail( $page_id ) ) {
                        $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
                      if ( isset( $img_array ) ) {
                        $content[$i]['img_array'] = $img_array;
                      }

                      $content[$i]['url']      = get_permalink( $page_id );
                      $content[$i]['title']    = get_the_title( $page_id );
                      $content[$i]['content']  = academic_pro_trim_content( 40, $post );
                      $content[$i]['alt']      = get_the_title( $page_id );

                      $i++;
                    } 
                  }
              }
            break;

            default:
            break;
        }

        // Assin value if not empty
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// Top Bar section content details.
add_filter( 'academic_pro_filter_testimonial_section_details', 'academic_pro_testimonial_section_details' );


if ( ! function_exists( 'academic_pro_render_testimonial' ) ) :
    /**
     * Add testimonial
     *
     * @since Academic Pro 1.0
     */
    function academic_pro_render_testimonial( $section_details ) { 
      $options = academic_pro_get_theme_options();

      // Bail if no section details input.
      if ( empty( $section_details ) ) {
          return;
      }
      ?>

      <section id="testimonial-slider" class="page-section no-padding-bottom slider os-animation">
        <div class="container">
            <header class="entry-header">
              <?php if ( ! empty( $options['testimonial_title'] ) ) : ?>
                <h2 class="entry-title"><?php echo esc_html( $options['testimonial_title'] );?></h2>  
              <?php endif; ?>
              <?php if ( ! empty( $options['testimonial_sub_title'] ) ) : ?>
                <h6 class="entry-subtitle"><?php echo esc_html( $options['testimonial_sub_title'] );?></h6>
              <?php endif; ?>
            </header><!-- end .entry-header -->

            <div class="entry-content">
              <div class="icon-quote">
                <i class="fa fa-quote-left"></i>
              </div><!-- end .icon-quote -->
              <div class="regular" data-slick='{
                "slidesToShow": 1, 
                "slidesToScroll": 1, 
                "speed": 800, 
                "infinite": <?php echo ( $options['testimonial_infinite_enable'] ? 'true' : 'false' ); ?>, 
                "dots": <?php echo ( $options['testimonial_pager_enable'] ? 'true' : 'false' ); ?>, 
                "arrows":<?php echo ( $options['testimonial_arrows_enable'] ? 'true' : 'false' ); ?>, 
                "autoplay": <?php echo ( $options['testimonial_autoplay_enable'] ? 'true' : 'false' ); ?>
                }'>
                <?php foreach ( $section_details as $content ): ?>
                  <div class="slider-item" data-thumb="<?php echo esc_url( $content['img_array'][0] ); ?>">
                    <div class="testimonial-contents-wrapper">
                      <div class="testimonial-contents">
                        <blockquote><?php echo esc_html( $content['content'] );?></blockquote>
                        <div class="designation"><a href="<?php echo esc_url( $content['url'] );?>" class="client-name">- <?php echo esc_html( $content['title'] );?></a></div>
                      </div><!-- end .testimonial-contents -->
                    
                      <div class="testimonial-image">
                        <a href="<?php echo esc_url( $content['url'] );?>"><img alt="<?php echo esc_attr( $content['title'] );?>" src="<?php echo esc_url( $content['img_array'][0] ); ?>"></a>
                      </div><!-- end .testimonial-image -->
                    </div><!-- end .testimonial-contents-wrapper -->
                  </div><!-- end .slider-item -->
                <?php endforeach; ?>
              </div><!-- end .regular -->
            </div><!-- end .entry-content -->

        </div><!-- end .container -->
      </section><!-- end #testimonial-slider -->
<?php
    }
endif;