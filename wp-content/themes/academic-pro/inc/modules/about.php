<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */
if ( ! function_exists( 'academic_pro_add_about_section' ) ) :
  /**
   * Add about section
   *
   *@since Academic Pro 1.0
   */
  function academic_pro_add_about_section() {

    // Check if about is enabled on frontpage
    $about_enable = apply_filters( 'academic_pro_section_status', true, 'about_section_enable' );
    if ( true !== $about_enable ) {
      return false;
    }

    // Get about section details
    $section_details = array();
    $section_details = apply_filters( 'academic_pro_filter_about_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render about section now.
    academic_pro_render_about_section( $section_details );
  }
endif;
add_action( 'academic_pro_primary_content', 'academic_pro_add_about_section', 20 );


if ( ! function_exists( 'academic_pro_get_about_section_details' ) ) :
  /**
   * about section details.
   *
   * @since Academic Pro 1.0
   * @param array $input about section details.
   */
  function academic_pro_get_about_section_details( $input ) {
    $options = academic_pro_get_theme_options();

    // about type
    $about_content_type  = $options['about_content_type'];

    $content = array();
    switch ( $about_content_type ) {
        case 'demo':
            $content[0]['title']        = esc_html__( 'Welcome To Our Website', 'academic-pro' );
            $content[0]['sub_title']    = esc_html__( 'How can we help you', 'academic-pro' );
            $content[0]['excerpt']      = esc_html__( 'Duis tincidunt lectus eget sem lobortis pellentesque vitae ac augue. Vestibulum pharetra libero ut massa rutrum, sit amet imperdiet odio commodo. Sed eu mi vitae ante tempor iaculis id feugiat enim.<br> Duis tincidunt lectus eget sem lobortis pellentesque vitae ac augue. Vestibulum pharetra libero ut massa rutrum, sit amet imperdiet odio commodo. Sed eu mi vitae ante tempor iaculis id feugiat enim.', 'academic-pro' );
            $content[0]['btn_label']    = esc_html__( 'Read More', 'academic-pro' );
            $content[0]['url']          = '#';
            $content[0]['btn_target']   = '';
            $statistics_title = array( 'Graduation', 'Class rooms', 'Students', 'Majors', 'Qualified staff', 'Job placement' );
            $statistics_value = array( '90%', '50+', '1043', '20+', '164', '85%' );
            $statistics_icon  = array( 'fa-snapchat-ghost', 'fa-wpbeginner', 'fa-users', 'fa-star', 'fa-support', 'fa-thumbs-up' );
            $statistics_color = array( '#357DF5', '#1483BA', '#9153C7', '#F2BD19', '#14B845', '#FC3E1E' );
            $i = 0;
            foreach ( $statistics_title as $statistics ) :
                $content[0][1][$i]['statistics_title'] = $statistics_title[$i];
                $content[0][1][$i]['statistics_value'] = $statistics_value[$i];
                $content[0][1][$i]['statistics_icon']  = $statistics_icon[$i];
                $content[0][1][$i]['statistics_color'] = $statistics_color[$i];
                $i++;
            endforeach;
        break;

        case 'custom':
            $content[0]['title']        = ! empty( $options['about_content_title'] ) ? $options['about_content_title'] : '';
            $content[0]['sub_title']    = ! empty( $options['about_content_sub_title'] ) ? $options['about_content_sub_title'] : '';
            $content[0]['excerpt']      = ! empty( $options['about_content'] ) ? academic_pro_santize_line_break( $options['about_content'] ) : '';
            $content[0]['btn_label']    = ! empty( $options['about_btn_label'] ) ? $options['about_btn_label'] : '';
            $content[0]['url']          = ! empty( $options['about_btn_link'] ) ? $options['about_btn_link'] : '';
            $content[0]['btn_target']   = ( $options['about_link_target'] == true ) ? '_blank' : '';
            $content[0]['img_array']    = ! empty( $options['about_custom_image'] ) ? $options['about_custom_image']: '';
        break;

        case 'page':
            $id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
            if( ! empty ( $id ) ) {
                $args = array(
                    'post_type'     => 'page',
                    'page_id'       => absint( $id ),
                );
            }
            // Fetch posts.
            if ( ! empty( $args ) ) {
                $posts = get_posts( $args );
                foreach ( $posts as $key => $post ) {
                    $page_id = $post->ID;
                    $content[0]['sub_title']    = '';
                    $content[0]['title']        = get_the_title( $page_id );
                    $content[0]['excerpt']      = academic_pro_trim_content( 100, $post );
                    $content[0]['alt']          = get_the_title( $page_id );
                    $content[0]['url']          = get_permalink( $page_id );
                    $content[0]['btn_label']    = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'academic-pro' );
                    $content[0]['btn_target']   = '';

                    if ( has_post_thumbnail( $page_id ) ) {
                        $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                    }
                    if ( isset( $img_array ) ) {
                        $content[0]['img_array'] = $img_array[0];
                    }
                }
            }
        break;

        default:
        break;
    }

    if ( 'demo' != $about_content_type ) {
        $no_of_statistics = $options['about_statistics_no'];
        for ( $i = 1; $i <= $no_of_statistics; $i++ ) {
            $content[0][1][$i]['statistics_title'] = ! empty( $options['about_statistics_title_' . $i] ) ? $options['about_statistics_title_' . $i] : '';
            $content[0][1][$i]['statistics_value'] = ! empty( $options['about_statistics_value_' . $i] ) ? $options['about_statistics_value_' . $i] : '';
            $content[0][1][$i]['statistics_icon']  = ! empty( $options['about_statistics_icon_' . $i] ) ? $options['about_statistics_icon_' . $i] : '';
            $content[0][1][$i]['statistics_color'] = ! empty( $options['about_statistics_color_' . $i]) ? $options['about_statistics_color_' . $i] : '';
        }
    }
    if ( empty( $content[0][1]['statistics_title'] ) && empty( $content[0][1]['statistics_value'] ) ){
        $input = "";
    }

    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// about section content details.
add_filter( 'academic_pro_filter_about_section_details', 'academic_pro_get_about_section_details' );


if ( ! function_exists( 'academic_pro_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Academic Pro 1.0
   *
   */
   function academic_pro_render_about_section( $content_details = array() ) {
        $options          = academic_pro_get_theme_options();
        $about_right_content_type = $options['about_right_content_type'];
        $about_content_enable = ( $options['about_content_enable'] == true ) ? true : false;

        if ( empty( $content_details ) ) {
          return;
        } ?>
        <section id="welcome-section" class="page-section
            <?php
            if ( $about_content_enable != true ) :
                echo 'one-col';
            else :
                echo 'two-col';
            endif;
            ?> os-animation">
            <?php foreach ( $content_details as $content ): ?>
            <div class="container">
                <?php if ( $about_content_enable == true ) : ?>
                    <div class="column-wrapper">
                        <header class="entry-header">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            <?php endif;
                            if ( ! empty( $content['sub_title'] ) ) : ?>
                                <h6 class="entry-subtitle"><?php echo esc_html( $content['sub_title'] ); ?></h6>
                            <?php endif; ?>
                        </header><!-- end .entry-header -->

                        <div class="entry-content">
                            <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                <?php echo academic_pro_santize_line_break( $content['excerpt'] ); ?>
                            <?php endif;
                             if ( ! empty( $content['url'] ) && ! empty( $content['btn_label'] ) ) : ?>
                                <div class="buttons">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" href="<?php echo esc_attr( $content['btn_target'] ); ?>" class="btn btn-blue"><?php echo esc_html( $content['btn_label'] ); ?><i class="fa fa-angle-right"></i></a>
                                </div><!-- end .buttons -->
                            <?php endif; ?>
                        </div><!-- end .entry-content -->
                    </div><!-- end .column-wrapper -->
                <?php endif;
                if ( $about_right_content_type == 'statistics-details' ) : ?>
                    <div class="column-wrapper">
                        <ul class="statistics">
                            <?php
                            foreach ( $content_details[0][1] as $content ): ?>
                                <li>
                                    <div class="statistics-details" style="background-color:<?php echo esc_attr( $content['statistics_color'] ); ?>;">
                                        <i class="fa <?php echo esc_attr( $content['statistics_icon'] ); ?>"></i>
                                        <span><?php echo esc_html( $content['statistics_title'] ); ?></span>
                                        <small><?php echo esc_html( $content['statistics_value'] ); ?></small>
                                    </div><!-- end .statistics-details -->
                                </li>
                            <?php
                            endforeach; ?>
                        </ul>
                    </div><!-- end .column-wrapper -->
                <?php else: ?>
                    <div class="column-wrapper">
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'] ); ?>"></a>
                    </div>
                <?php endif; ?>
            </div><!-- end .container -->
        <?php endforeach; ?>
    </section><!-- end #welcome-section-->
<?php
    }
endif;