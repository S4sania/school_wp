<?php
/**
 * Custom Advertisement Widget
 *
 * @package Theme Palace
 * @subpackage Academic Pro 
 * @since 1.0
 */

if ( ! class_exists( 'Academic_Pro_Advertisement' ) ) :

	/**
	 * Adds Tp image widget.
	 */
	class Academic_Pro_Advertisement extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'academic-pro-advertisement', // Base ID
				esc_html__( 'TP: Advertisement', 'academic-pro' ), // Name
				array( 'description' => esc_html__( 'An widget to upload Ad and images in sidebar.', 'academic-pro' ), ) // Args
			);
		}


		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			$title             = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$image_url         = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '';
			$link              = ! empty( $instance['link'] ) ? $instance['link'] : '';
			$alt_text          = ! empty( $instance['alt_text'] ) ? $instance['alt_text'] : '';
			$open_link         = ! empty( $instance['open_link'] ) ? $instance['open_link'] : false;
			$ad_code           = ! empty( $instance['ad_code'] ) ? $instance['ad_code'] : '';
			
			$instance['link_open']  = '';
			$instance['link_close'] = '';
			
			if ( ! empty ( $link ) ) {
			
				$target                 = ( empty( $open_link ) ) ? '' : ' target="_blank" ';
				$instance['link_open']  = '<a href="' . esc_url( $link ) . '"' . esc_attr( $target ) . '>';
				$instance['link_close'] = '</a>';

	        }
			echo $args['before_widget'];

			if ( $title ) {
		        echo $args['before_title'] ;
		        echo esc_html( $title );
	          	echo $args['after_title'] ;
	        }

	        if ( ! empty( $ad_code ) ) {
				echo $ad_code;
			} 
			elseif ( ! empty( $image_url ) ) {
				$sizes = array();
				$alt_text = ( ! empty( $alt_text ) ) ? $alt_text : basename( $image_url );
				$imgtag = '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $alt_text ) . '"  />';
				echo sprintf( '%s%s%s',
				$instance['link_open'],
				$imgtag,
				$instance['link_close']
				);
	        } // End if : image is there.
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			// Defaults.
	        $instance = wp_parse_args( (array) $instance, array(
				'title'                	=>  '',
				'image_url'       	=>  '',
				'link'            	=>  '',
				'alt_text'        	=>  '',
				'open_link'       	=>  0,
				'ad_code'         	=>  '',
	      	) );

			$title                	= htmlspecialchars( $instance['title'] );
			$ad_type        = isset( $instance['ad_type'] ) ? esc_html( $instance['ad_type'] ) : 'image-ad';
			$image_url             = isset( $instance['image_url'] ) ? $instance['image_url'] : '';
			$link                  = isset( $instance['link'] ) ? $instance['link'] : '';
			$alt_text              = isset( $instance['alt_text'] ) ? $instance['alt_text'] : '';
			$open_link             = isset( $instance['open_link'] ) ? $instance['open_link'] : false;
			$ad_code          		= isset( $instance['ad_code' ] ) ? $instance['ad_code'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title :', 'academic-pro' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>

		   	<p>
			   	<label for="<?php echo esc_attr( $this->get_field_id( 'ad_type' ) ); ?>"><?php esc_html_e( 'Select Ad Type:', 'academic-pro' ); ?></label>
			   	<select id="<?php echo esc_attr( $this->get_field_id( 'ad_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_type' ) ); ?>">
		   			<option value="image-ad" <?php selected( 'image-ad', $ad_type ); ?>>
		   				<?php esc_html_e( 'Image Ad', 'academic-pro' ); ?>
		   			</option>
		   			<option value="html-js-ad" <?php selected( 'html-js-ad', $ad_type ); ?>>
		   				<?php esc_html_e( 'HTML/JS Ad ', 'academic-pro' ); ?>
		   			</option>
			   	</select>
		   		<i><?php esc_html_e( 'Save after you change the options.', 'academic-pro' );?></i>
		   	</p>

		   	<?php if ( 'html-js-ad' == $ad_type ) { ?>
				<p>
					<i><?php esc_html_e( 'Paste your Google ad tag, or any other ad tag in this widget below.', 'academic-pro' );?></i><br />
					<label for="<?php echo esc_attr( $this->get_field_id( 'ad_code' ) ); ?>"><?php esc_html_e( 'Ad Code', 'academic-pro' ); ?>:</label>
					<textarea class="widefat" rows="2" id="<?php echo esc_attr( $this->get_field_id( 'ad_code' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_code' ) ); ?>"><?php echo esc_textarea( $ad_code ); ?></textarea>
			    </p>
		   	<?php 
		   	}else { ?>

			<!-- Place holder for image upload -->
			<div>
				<label for="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>"><?php esc_html_e( 'Image URL', 'academic-pro' ); ?></label>:<br />
				<input type="url" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'image_url' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>" value="<?php echo esc_url( $image_url ); ?>" /><br />
				<input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'academic-pro' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'academic-pro' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'academic-pro' ); ?>" style="margin-top:5px;" />

		      	<?php
		        $full_image_url = '';
		        if (! empty( $image_url ) ){
		          $full_image_url = $image_url;
		        }
		        $wrap_style = '';
		        if ( empty( $full_image_url ) ) {
		          $wrap_style = ' style="display:none;" ';
		        }
		      	?>
		      	<div class="tpiw-preview-wrap" <?php echo esc_attr( $wrap_style ); ?>>
		        	<img src="<?php echo esc_url( $full_image_url ); ?>" alt="<?php esc_attr_e('Preview', 'academic-pro'); ?>" style="max-width: 100%;"  />
		      	</div><!-- .tpiw-preview-wrap -->

	    	</div>

		    <p>
		      	<label for="<?php echo esc_attr( $this->get_field_id( 'alt_text' ) ); ?>"><?php esc_html_e( 'Alt Text', 'academic-pro' ); ?>:</label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'alt_text' ) ); ?>"
		        name="<?php echo esc_attr( $this->get_field_name( 'alt_text' ) ); ?>" type="text" value="<?php echo esc_attr( $alt_text ); ?>" />
		    </p>

		    <p>
		      	<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link', 'academic-pro' ); ?>:</label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"
		        name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="url" value="<?php echo esc_url( $link ); ?>" />
		    </p>

		    <p>
		      <label for="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>"><?php esc_html_e( 'Open in New Tab', 'academic-pro' ); ?>:</label>
		      <input id="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'open_link' ) ); ?>" type="checkbox" <?php checked( isset( $instance['open_link'] ) ? $instance['open_link'] : 0 ); ?> />
		    </p>
		<?php }
		}


		function academic_pro_sanitize_ad_code( $input ) {
		    global $allowedposttags;
		    $custom_allowedtags["embed"] = array(
		      "src" => array(),
		      "type" => array(),
		      "allowfullscreen" => array(),
		      "allowscriptaccess" => array(),
		      "height" => array(),
		      "width" => array()
		      );
		      $custom_allowedtags["script"] = array();
		  
		      $custom_allowedtags = array_merge( $custom_allowedtags, $allowedposttags );
		      $output = wp_kses( $input, $custom_allowedtags );
		    return $output;
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance              = $old_instance;
			
			$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ): '';
			$instance['image_url'] = esc_url_raw( $new_instance['image_url'] );
			$instance['link']      = esc_url_raw( $new_instance['link'] );
			$instance['alt_text']  = sanitize_text_field( $new_instance['alt_text'] );
			$instance['open_link'] = isset( $new_instance['open_link'] ) ? (bool) $new_instance['open_link'] : false;
			$instance['ad_code']   =  $this->academic_pro_sanitize_ad_code( $new_instance['ad_code'] );
			if ( in_array( $new_instance['ad_type'], array( 'image-ad', 'html-js-ad' ) ) ) {
				$instance['ad_type']           = esc_html( $new_instance['ad_type'] );
			} else {
				$instance['ad_type']           = 'image-ad';
			}

			return $instance;
		}

	} // class Academic_Pro_Advertisement
endif;

/**
 * Enqueue admin scripts for Image Widget
 * @uses  wp_enqueue_script, and  admin_enqueue_scripts hook
 *
 * @since Academic Pro 1.0
 */
function academic_pro_advertisement_upload_enqueue( $hook ) {

  if( 'widgets.php' !== $hook )
      return;

  wp_enqueue_media();
  wp_enqueue_script( 'academic-pro-image-widget-upload-script', get_template_directory_uri().'/assets/js/upload.min.js', array( 'jquery' ), '1.1', true );

}
add_action( 'admin_enqueue_scripts', 'academic_pro_advertisement_upload_enqueue' );