<?php
/**
 * Top bar
 *
 * This is the template for adding top bar
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

if ( ! function_exists( 'academic_pro_add_top_bar' ) ) :
    /**
     * Add top bar section
     *
     * @since Academic Pro 1.0
     */
    function academic_pro_add_top_bar() {
      $options = academic_pro_get_theme_options();

      // Check if top bar is enabled
      $top_bar_show = $options['top_bar_show'];
      if ( ! $top_bar_show ) {
          return;
      }

      // Get top bar section details
      $section_details = array();
      $section_details = apply_filters( 'academic_pro_filter_top_bar_section_details', $section_details );

      if ( empty( $section_details ) ) {
          return;
      }

      // Render top bar section now.
      academic_pro_render_top_bar( $section_details );
    }
endif;
add_action( 'academic_pro_top_bar', 'academic_pro_add_top_bar', 10 );


if ( ! function_exists( 'academic_pro_top_bar_section_details' ) ) :
    /**
     * Top Bar section details.
     *
     * @since Academic Pro 1.0
     *
     * @param array $input top bar section details.
     */
    function academic_pro_top_bar_section_details( $input ) {
        $options = academic_pro_get_theme_options();

        // Top bar content type
        $content_type = $options['top_bar_content_type'];

        $content      = array();

        switch ( $content_type ) {
            case 'demo':
              $icons_arr = array( 'fa-phone', 'fa-map-marker', 'fa-clock-o' );
              $value_arr = array( '(000) 000-00000', esc_html__( '1010 Moon ave, New York, NY US', 'academic-pro' ), esc_html__( 'Mon - Sat 8.00 - 18.00. Sunday CLOSED', 'academic-pro' ) );
              for ( $i=0; $i<3; $i++ ) {
                  $content[ $i ]['icon'] = $icons_arr[ $i ];
                  $content[ $i ]['value']= $value_arr[ $i ];
              }
            break;

            case 'custom':
              for ( $i = 1; $i <= $options['top_bar_field_number']; $i++ ) {
                  if ( isset( $options[ 'top_bar_icon_'.$i ] ) ) {
                      $content[ $i ]['icon'] = $options[ 'top_bar_icon_'.$i ];
                  }
                  if ( isset( $options[ 'top_bar_value_'.$i ] ) ) {
                      $content[ $i ]['value'] = $options[ 'top_bar_value_'.$i ];
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
add_filter( 'academic_pro_filter_top_bar_section_details', 'academic_pro_top_bar_section_details' );


if ( ! function_exists( 'academic_pro_render_top_bar' ) ) :
    /**
     * Add top bar
     *
     * @since Academic Pro 1.0
     */
    function academic_pro_render_top_bar( $section_details ) { 
      $options = academic_pro_get_theme_options();

      // Bail if no section details input.
      if ( empty( $section_details ) ) {
          return;
      }

      // Check the value to move the login menu
      if ( $options['top_bar_move_menu_left'] ) {
        $menu_align_class   = 'left';
        $address_align_class= 'right';
      } else {
        $menu_align_class   = 'right';
        $address_align_class= 'left';
      }
      ?>
      <section id="top-bar">
        <button class="topbar-toggle"><i class="fa fa-angle-left"></i></button>
        <div class="container topbar-dropdown">
          <div class="pull-<?php echo esc_attr( $address_align_class );?>">
            <ul class="address-block">
            <?php foreach ( $section_details as $content ) { 
              if ( ! empty( $content[ 'icon' ] ) || ! empty( $content['value'] ) ) {
              ?>
              <li>
                <i class="fa <?php echo esc_attr( $content['icon'] );?>"></i>
                <?php 
                $haystack = $content['icon'];
                if( strpos( $haystack, 'phone' ) !== false ) {
                  echo '
                      <a href="tel:' . esc_attr( $content['value'] ) . '" title="' . esc_attr( $content['value'] ) . '">
                        ' . esc_html( $content['value'] ) . '
                      </a>';
                } elseif ( strpos( $haystack, 'email' ) !== false ) {
                  echo '
                      <a href="mailto:' . esc_attr( $content['value'] ) .'">
                        ' . esc_html( $content['value'] ) . '
                      </a>';
                } elseif ( strpos( $haystack, 'skype' ) !== false ) {
                   echo '
                      <a href="callto://' . esc_attr( $content['value'] ) .'">
                        ' . esc_html( $content['value'] ) . '
                      </a>';
                } else{
                  echo esc_html( $content['value'] );
                } ?>
              </li>
            <?php 
              } 
            }
            ?>
            </ul><!-- end .address-block -->
          </div><!-- end .pull-left -->

          <?php if ( has_nav_menu( 'login' ) ) : ?>
            <div class="pull-<?php echo esc_attr( $menu_align_class );?>">
              <?php wp_nav_menu( array( 'theme_location' => 'login', 'container' => 'ul', 'menu_class' => 'login-signup' ) ); ?>
            </div><!-- end .pull-right -->
          <?php endif; ?>
        </div><!-- end .container -->
      </section><!-- end .top-bar -->
<?php
    }
endif;