<?php
/**
 * All codes related to custom header
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses academic_pro_header_style()
 */
function academic_pro_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'academic_pro_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'academic_pro_custom_header_setup' );



if ( ! function_exists( 'academic_pro_custom_header' ) ) :
	/**
	 * Custom Header Codes
	 *
	 * @since Academic Pro 1.0
	 *
	 */
	function academic_pro_custom_header() {

		/**
		 * Filter the default twentysixteen custom header sizes attribute.
		 *
		 * @since Academic Pro 1.0
		 *
		 */
		$header_image_meta = academic_pro_header_image_meta_option();

		if ( ( '' == $header_image_meta && ! get_header_image() ) || ! $header_image_meta ) {
			return;
		}
		?>
		<section id="banner-image">
            <div class="black-overlay"></div>
          	<div class="container">
              	<div class="banner-wrapper">
	                <div class="page-title">
	                  <header class="entry-header">
	                    <h2 class="entry-title">
	                    	<?php academic_pro_title_as_per_template();?>
	                    </h2>
	                  </header>
	                </div><!-- end .page-title -->
                </div><!-- end .container -->
         	</div><!-- end .banner-wrapper -->
	        </section><!-- end #banner-image -->
		<?php
	}
endif;
add_action( 'academic_pro_banner_image_action', 'academic_pro_custom_header', 10 );

if ( ! function_exists( 'academic_pro_header_inline_css' ) ) :
	// Add Custom Css
	function academic_pro_header_inline_css() {
		$options = academic_pro_get_theme_options();

		$css = '';


		global $wp_query, $post;

		// Get front page ID
		$page_on_front	  = get_option('page_on_front');
		$page_for_posts   = get_option('page_for_posts');
		// Get Page ID outside Loop
		$page_id          = $wp_query->get_queried_object_id( $post );

		if( ( is_home() && $page_on_front == $page_id ) ) {
			return;
		}
		else {
			// Set header image by comparing the meta values
			$header_image = academic_pro_header_image_meta_option();

			if ( is_array( $header_image ) ) {
				$header_image = $header_image[0];
			} else {
				$header_image = $header_image;
			}

			$css .= '
			#banner-image {
				background-image: url("'.esc_url( $header_image ).'");
			}';
		}

		// Get breadcrumb separator value.
		$options = academic_pro_get_theme_options();
		$css .= 'ul.trail-items li:after {
				    content: "' . esc_attr( $options['breadcrumb_separator'] ) . '";
				}';

	wp_add_inline_style( 'academic-pro-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'academic_pro_header_inline_css', 10 );