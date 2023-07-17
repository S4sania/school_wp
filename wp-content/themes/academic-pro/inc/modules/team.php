<?php
/**
 * Team
 *
 * This is the template for the content of Team
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */
if ( ! function_exists( 'academic_pro_add_team_section' ) ) :
  /**
   * Add Team
   *
   *@since Academic Pro 1.0
   */
  function academic_pro_add_team_section() {

    // Check if cat blog two is enabled on frontpage
    $team_section_enable = apply_filters( 'academic_pro_section_status', true, 'team_section_enable' );
    if ( true !== $team_section_enable ) {
      return false;
    }

    // Get Team details
    $section_details = array();
    $section_details = apply_filters( 'academic_pro_filter_team_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Team now.
    academic_pro_render_team_section( $section_details );
  }
endif;
add_action( 'academic_pro_primary_content', 'academic_pro_add_team_section', 50 );


if ( ! function_exists( 'academic_pro_get_team_section_details' ) ) :
  /**
   * Team details.
   *
   * @since Academic Pro 1.0
   * @param array $input Team details.
   */
  function academic_pro_get_team_section_details( $input ) {
    $options = academic_pro_get_theme_options();

    // Team Type
    $team_section_type  = $options['team_content_type'];

    $content = array();
    switch ( $team_section_type ) {
        case 'demo':
            for ( $i = 1; $i <= 4; $i++ ) { 
                $content[$i]['title']           = esc_html__( 'Michele Johnson', 'academic-pro');
                $content[$i]['team_position']   = esc_html__( 'Manager', 'academic-pro');
                $content[$i]['url']             = '#';
                $content[$i]['img_array'][0]    = get_template_directory_uri().'/assets/uploads/team-0'.$i.'.jpg';
                $content[$i]['excerpt']         = esc_html__( 'Quisque sodales purus sit amet libero pellentesque cursus. Sed blandit nisl purus, ac rutrum risus bibend. Vestibulum pharetra libero..', 'academic-pro');
                $content[$i]['button_url']      = '#';
                $content[$i]['button_label']    = esc_html__( 'View All Team','academic-pro' );
            }
        break;

        case 'post':
            $ids = array();

            for ( $i = 1; $i <= 4; $i++ ) {
                $id = null;
                if ( isset( $options[ 'team_content_post_'.$i ] ) ) {
                    $id = $options[ 'team_content_post_'.$i ];
                }
                if ( ! empty( $id ) ) {
                    $ids[] = absint( $id );
                }
            }

            // Bail if no valid pages are selected.
            if ( empty( $ids ) ) {
                return $input;
            }

            $args = array(
                'no_found_rows'  => true,
                'orderby'        => 'post__in',
                'post_type'      => 'post',
                'post__in'       => $ids,
            );            
        break;

        case 'page':
            $ids = array();

            for ( $i = 1; $i <= 4; $i++ ) {
                $id = null;
                if ( isset( $options[ 'team_content_page_'.$i ] ) ) {
                    $id = $options[ 'team_content_page_'.$i ];
                }
                if ( ! empty( $id ) ) {
                    $ids[] = absint( $id );
                }
            }

            // Bail if no valid pages are selected.
            if ( empty( $ids ) ) {
                return $input;
            }

            $args = array(
                'no_found_rows'  => true,
                'orderby'        => 'post__in',
                'post_type'      => 'page',
                'post__in'       => $ids,
            );            
        break;

        default:
        break;
    }

    if ( 'demo' != $team_section_type && ! empty( $args ) ) {
        $posts = get_posts( $args );
        $i = 1;
        foreach ( $posts as $key => $post ) {
            $page_id    = $post->ID;
            $content[$i]['title']           = get_the_title( $page_id );
            $content[$i]['url']             = get_the_permalink( $page_id );
            $content[$i]['excerpt']         = academic_pro_trim_content( 15, $post  );
            if ( has_post_thumbnail( $page_id ) ) {
                $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'medium' );
            } else {
                $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-450x338.png';
            }
            if ( isset( $img_array ) ) {
              $content[$i]['img_array'] = $img_array;
            }
            
            if( ! empty( $options['team_button_label'] ) ) {
                $content[$i]['button_label'] = $options['team_button_label'];
            }
            if( ! empty( $options['team_button_url'] ) ) {
                $content[$i]['button_url'] = $options['team_button_url'];
            }
            if ( 'post' == $team_section_type ) {
                for( $j=1; $j<=4; $j++ ){
                    if( ! empty( $options['team_position_'.$i] ) ) {
                        $content[$i]['team_position'] = $options['team_position_'.$i];
                    }
                }
            }
            else {
                for( $j=1; $j<=4; $j++ ){
                    if( ! empty( $options['team_section_position_'.$i] ) ) {
                        $content[$i]['team_position'] = $options['team_section_position_'.$i];
                    }
                }
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
// Team content details.
add_filter( 'academic_pro_filter_team_section_details', 'academic_pro_get_team_section_details' );


if ( ! function_exists( 'academic_pro_render_team_section' ) ) :
    /**
    * Start Team section 
    *
    * @return string Team content
    * @since Academic Pro 1.0
    *
    */
    function academic_pro_render_team_section( $content_details = array() ) {

        $options   = academic_pro_get_theme_options();
        $team_section_title     = ! empty( $options['team_section_title'] ) ? $options['team_section_title'] : '';
        $team_section_subtitle  = ! empty( $options['team_section_subtitle'] ) ? $options['team_section_subtitle'] : '';

        if ( empty( $content_details ) ) {
          return;
        } ?>

        <section id="our-team" class="page-section no-padding-bottom os-animation">
            <div class="container">
                <header class="entry-header">
                    <?php if ( ! empty( $team_section_title ) ) : ?>
                        <h2 class="entry-title"><?php echo esc_html( $team_section_title ); ?></h2>  
                    <?php endif; 
                    if ( ! empty($team_section_subtitle) ) :?>
                        <h6 class="entry-subtitle"><?php echo esc_html( $team_section_subtitle ); ?></h6>
                    <?php endif; ?>
                </header><!-- end .entry-header -->

                <div class="entry-content four-col">
                <?php foreach ( $content_details as $content ) { ?>
                    <div class="column-wrapper">
                        <div class="member-name">
                            <h3><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h3>
                        </div><!-- end .member-name -->
                        <?php if( ! empty( $content['team_position'] ) ) { ?>
                        <span class="member-position"><?php echo esc_html( $content['team_position'] ); ?></span>
                        <?php }
                        if( ! empty( $content['excerpt'] ) ) { ?>
                        <div class="team-description">
                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                        </div><!-- end .team-description -->
                        <?php } ?>
                        <div class="image-wrapper">
                            <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'][0] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                        </div><!-- end .image-wrapper -->
                    </div><!-- end .column-wrapper -->
                <?php } ?>                 
                </div><!-- end .entry-content -->
                <?php if( ! empty( $content['button_label'] ) ) { ?>
                <div class="buttons">
                    <a href="<?php echo esc_url( $content['button_url'] ); ?>" class="btn btn-blue"><?php echo esc_html( $content['button_label'] ); ?><i class="fa fa-angle-right"></i></a>
                </div>
                <?php } ?>
            </div><!-- end .container -->
        </section><!-- end #recent-courses-slider -->
    <?php 
    }
endif;