<?php
/**
 * Call To Acton
 *
 * This is the template for the content of Call To Acton
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */
if ( ! function_exists( 'academic_pro_add_call_to_action' ) ) :
  /**
   * Add Call To Acton
   *
   *@since Academic Pro 1.0
   */
  function academic_pro_add_call_to_action() {

    // Check if call to action is enabled on frontpage
    $call_to_action_enable = apply_filters( 'academic_pro_section_status', true, 'call_to_action_enable' );
    if ( true !== $call_to_action_enable ) {
      return false;
    }

    // Get Call To Acton details
    $section_details = array();
    $section_details = apply_filters( 'academic_pro_filter_call_to_action_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Call To Acton now.
    academic_pro_render_call_to_action( $section_details );
  }
endif;
add_action( 'academic_pro_primary_content', 'academic_pro_add_call_to_action', 80 );


if ( ! function_exists( 'academic_pro_get_call_to_action_details' ) ) :
  /**
   * Call To Acton details.
   *
   * @since Academic Pro 1.0
   * @param array $input Call To Acton details.
   */
  function academic_pro_get_call_to_action_details( $input ) {
    $options = academic_pro_get_theme_options();

    // Call To Acton Type
    $call_to_action_type    = $options['call_to_action_type'];
    $i = 1;
    $content = array();
    switch ( $call_to_action_type ) {
        case 'demo':
            $content[$i]['title']           = esc_html__( 'Make Your Success A Priority', 'academic-pro' );
            $content[$i]['sub_title']       = esc_html__( 'Begin your Educational Journey Today.', 'academic-pro' );
            $content[$i]['btn_label_1']     = esc_html__( 'Enroll Today', 'academic-pro' );
            $content[$i]['btn_url_1']       = '#';
            $content[$i]['btn_target_1']    = '';
            $content[$i]['btn_label_2']     = esc_html__( 'View the course catalog', 'academic-pro' );
            $content[$i]['btn_url_2']       = '#';
            $content[$i]['btn_target_2']    = '';
        break;

        case 'custom':
            $content[$i]['title']           = ! empty( $options['call_to_action_title'] ) ? $options['call_to_action_title'] : '';
            $content[$i]['sub_title']       = ! empty( $options['call_to_action_sub_title'] ) ? $options['call_to_action_sub_title'] : '';
            $content[$i]['btn_label_1']     = ! empty( $options['call_to_action_btn_label_1'] ) ? $options['call_to_action_btn_label_1'] : '';
            $content[$i]['btn_url_1']       = ! empty( $options['call_to_action_btn_link_1'] ) ? $options['call_to_action_btn_link_1'] : '';
            $content[$i]['btn_target_1']    = ( $options['call_to_action_btn_target_1'] == true ) ? '_blank' : '';
            $content[$i]['btn_label_2']     = ! empty( $options['call_to_action_btn_label_2'] ) ? $options['call_to_action_btn_label_2'] : '';
            $content[$i]['btn_url_2']       = ! empty( $options['call_to_action_btn_link_2'] ) ? $options['call_to_action_btn_link_2'] : '';
            $content[$i]['btn_target_2']    = ( $options['call_to_action_btn_target_2'] == true ) ? '_blank' : '';
        break;

        default:
        break;
    }

    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// Call To Acton content details.
add_filter( 'academic_pro_filter_call_to_action_details', 'academic_pro_get_call_to_action_details' );


if ( ! function_exists( 'academic_pro_render_call_to_action' ) ) :
  /**
   * Start Call To Acton section 
   *
   * @return string Call To Acton content
   * @since Academic Pro 1.0
   *
   */
   function academic_pro_render_call_to_action( $content_details = array() ) {
        $options = academic_pro_get_theme_options();    
        ?>  
         <section id="background-image-section" class="page-section os-animation">
            <div class="blue-overlay"></div>
            <?php foreach ( $content_details as $content ) : ?>
                <div class="container content-wrapper">
                  <?php if ( ! empty( $content['title'] ) ) : ?>
                    <h2 class="color-white text-capitalize"><?php echo esc_html( $content['title'] ); ?></h2>
                  <?php endif; ?>
                  <?php if ( ! empty( $content['sub_title'] ) ) : ?>
                    <h2 class="color-yellow"><?php echo esc_html( $content['sub_title'] ); ?></h2>
                  <?php endif; ?>
                    <div class="buttons">
                        <?php if( $options['call_to_action_btn_enable_1'] == true ) : ?>
                            <a href="<?php echo esc_url( $content['btn_url_1'] ); ?>" target="<?php echo esc_html( $content['btn_target_1'] ); ?>" class="btn btn-border-white"><?php echo esc_html( $content['btn_label_1'] ); ?><i class="fa fa-angle-right"></i></a>
                        <?php endif;
                        if( $options['call_to_action_btn_enable_2'] == true ) : ?>
                            <a href="<?php echo esc_url( $content['btn_url_2'] ); ?>" target="<?php echo esc_html( $content['btn_target_2'] ); ?>" class="btn btn-border-white"><?php echo esc_html( $content['btn_label_2'] ); ?><i class="fa fa-angle-right"></i></a>
                        <?php endif; ?>
                    </div><!-- end .buttons -->
                </div><!-- end .container -->
            <?php endforeach; ?>
          </section><!-- end #background-image-section -->
    <?php 
    }
endif;