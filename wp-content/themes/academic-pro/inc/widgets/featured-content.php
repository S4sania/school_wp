<?php
/**
 * Featured content widget
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

if ( ! class_exists( 'Academic_Pro_Featured_Content' ) ) :
/**
 * Custom Info class.
 *
 * @since 1.0
 */
class Academic_Pro_Featured_Content extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'academic-pro-featured-content-widget',
			'description' => esc_html__( 'A widget to display featured content.', 'academic-pro' ),
		);
		parent::__construct( 'academic-pro-featured-content-widget', esc_html__( 'TP : Featured Content', 'academic-pro' ), $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		// Get title value
		$title               = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Featured Content', 'academic-pro' );
		// Get post type value
		$post_type           = isset( $instance['post_type'] ) ? esc_html( $instance['post_type'] ) : 'post';
		
		// Get post id value
		$post_id             = isset( $instance['post_id'] ) ? absint( $instance['post_id'] ) : '';

		// Get page id value
		$page_id             = isset( $instance['page_id'] ) ? absint( $instance['page_id'] ) : '';
		
		// Get content type featured_image_size
		$content_type        = isset( $instance['content_type'] ) ? esc_html( $instance['content_type'] ) : '';
		
		// Get featured image size
		$featured_image_size = isset( $instance['featured_image_size'] ) ? esc_html( $instance['featured_image_size'] ) : '';
		
		// Get hide image value
		$hide_title          = isset( $instance['hide_title'] ) ? (bool) $instance['hide_title'] : false;
		
		echo $args['before_widget'];


		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		} 
		if ( 'post' == $post_type ) { 
			$query_args = array( 'p' => $post_id );
		} elseif ( 'page' == $post_type ) {
			$query_args = array( 'page_id' => $page_id );
		}
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				
				if ( ! $hide_title ) { ?>
					<header class="entry-header">
						<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->
				<?php } ?>
				<div class="post-thumbnail">
					<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
						<?php the_post_thumbnail( $featured_image_size, array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
					</a>
				</div>
				<div class="entry-content">
					<?php 
					if ( 'null' == $content_type ) {
						echo null;
					}elseif ( 'content' == $content_type ) {
						the_content();
					}elseif ( 'excerpt' == $content_type ) {
						the_excerpt();
					}
					?>
				</div><!-- .entry-content -->
			<?php 
			}
		}
		echo $args['after_widget'];
	}

	/**
	 * Make thumbnail size list
	 * 
	 * @since 0.1
	 *
	 * @return array $img_sizes  
	 */ 
	function academic_pro_thumbnail_sizes(){
	  	global $_wp_additional_image_sizes;

	  	$sizes = array();

	  	foreach ( get_intermediate_image_sizes() as $_size ) {
	  		if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
	  			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
	  			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
	  		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
	  			$sizes[ $_size ] = array(
	  				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
	  				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
	  			);
	  		}
	  	}


		foreach( $sizes as $size => $atts ){
		    $size_title = ucwords( str_replace("-"," ", $size ) );
		    $img_sizes[ $size ] =  $size_title . ' (' . implode( 'x', $atts ) . ')';
		}
	  
	  return $img_sizes;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title               = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Featured Content', 'academic-pro' );
		$post_type           = isset( $instance['post_type'] ) ? esc_html( $instance['post_type'] ) : 'post';
		$post_id             = isset( $instance['post_id'] ) ? absint( $instance['post_id'] ) : '';
		$content_type        = isset( $instance['content_type'] ) ? esc_html( $instance['content_type'] ) : 'excerpt';
		$featured_image_size = isset( $instance['featured_image_size'] ) ? esc_html( $instance['featured_image_size'] ) : 'thumbnail';
		$hide_title          = isset( $instance['hide_title'] ) ? (bool) $instance['hide_title'] : false;
		$page_id             = isset( $instance['page_id'] ) ? (int) $instance['page_id'] : 0;
	   ?>

	   <p>
		   <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'academic-pro' ); ?></label>
		   <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	   </p>

	   <p>
	   	<label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php esc_html_e( 'Select Post Type:', 'academic-pro' ); ?></label>
	   	<select id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
   			<option value="post" <?php selected( 'post', $post_type ); ?>>
   				<?php esc_html_e( 'Post', 'academic-pro' ); ?>
   			</option>
   			<option value="page" <?php selected( 'page', $post_type ); ?>>
   				<?php esc_html_e( 'Page', 'academic-pro' ); ?>
   			</option>
	   	</select><br />
	   	<i><?php esc_html_e( 'Save after changing the value to see other options.', 'academic-pro' );?></i>
	   </p>

	   <?php if ( 'post' == $post_type ) { ?>
		   <p>
			   	<label for="<?php echo esc_attr( $this->get_field_id( 'post_id' ) ); ?>"><?php esc_html_e( 'Post ID:', 'academic-pro' ); ?></label>
			   	<input id="<?php echo esc_attr( $this->get_field_id('post_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_id') ); ?>" type="number" value="<?php echo esc_attr( $post_id ); ?>" />
		   		<?php
		   		$post_ids = get_posts( array(
		   		    'fields'        => 'ids', // Only get post IDs
		   		    'posts_per_page'=> -1,
		   		) );
		   		if ( ! in_array( $post_id, $post_ids ) ) : ?>
		   			<small style="color:red;"><?php esc_html_e( 'Invalid post ID', 'academic-pro' );?></small>
		   		<?php endif; ?>
		   </p>
	   <?php } elseif ( 'page' == $post_type ) { ?>
	   	   <p>
	   	   	<label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select Page:', 'academic-pro' ); ?></label>
	   	   	<?php wp_dropdown_pages(  array( 'name' => esc_attr( $this->get_field_name( 'page_id' ) ), 'selected' => $page_id ) );?>
	   	   </p>
	   <?php } ?>

   	   <p>
   	   	<label for="<?php echo esc_attr( $this->get_field_id( 'content_type' ) ); ?>"><?php esc_html_e( 'Select Content Type:', 'academic-pro' ); ?></label>
   	   	<select id="<?php echo esc_attr( $this->get_field_id( 'content_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_type' ) ); ?>">
   	   		<option value="null"><?php esc_html_e( '&mdash; Hide Content &mdash;', 'academic-pro' ); ?></option>
      			<option value="content" <?php selected( 'content', $content_type ); ?>>
      				<?php esc_html_e( 'Content', 'academic-pro' ); ?>
      			</option>
      			<option value="excerpt" <?php selected( 'excerpt', $content_type ); ?>>
      				<?php esc_html_e( 'Excerpt', 'academic-pro' ); ?>
      			</option>
   	   	</select>
   	   </p>

   	   <p>
   	   	<label for="<?php echo esc_attr( $this->get_field_id( 'featured_image_size' ) ); ?>"><?php esc_html_e( 'Image Size:', 'academic-pro' ); ?></label>
   	   	<select id="<?php echo esc_attr( $this->get_field_id( 'featured_image_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'featured_image_size' ) ); ?>">
   	   		<option value="null"><?php esc_html_e( '&mdash; Hide Image &mdash;', 'academic-pro' ); ?></option>
   	   		<?php $image_sizes = $this->academic_pro_thumbnail_sizes();
   	   		foreach ( $image_sizes as $image_size => $image_size_name ) { ?>
	  			<option value="<?php echo esc_attr( $image_size );?>" <?php selected( $image_size, $featured_image_size ); ?>>
	  				<?php echo esc_html( $image_size_name ); ?>
	  			</option>
   	   		<?php } ?>
   	   	</select>
   	   </p>

  	   <p>
		<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id('hide_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('hide_title') ); ?>" type="checkbox"<?php checked( $hide_title ); ?> />
  	   	<label for="<?php echo esc_attr( $this->get_field_id( 'hide_title' ) ); ?>"><?php esc_html_e( 'Hide Title?', 'academic-pro' ); ?></label>
  	   </p>
	   <?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// Processes widget options to be saved
		$instance                        = $old_instance;
		$instance['title']               = sanitize_text_field( $new_instance['title'] );
		$instance['post_type']           = esc_html( $new_instance['post_type'] );
		if ( in_array( $new_instance['post_type'], array( 'post', 'page' ) ) ) {
			$instance['post_type']           = esc_html( $new_instance['post_type'] );
		} else {
			$instance['post_type']           = 'post';
		}
		$instance['post_id']             = (int) $new_instance['post_id'];
		$instance['content_type']        = esc_html( $new_instance['content_type'] );
		$instance['featured_image_size'] = esc_html( $new_instance['featured_image_size'] );
		$instance['hide_title']          = isset( $new_instance['hide_title'] ) ? (bool) $new_instance['hide_title'] : false;
		$instance['page_id']             = isset( $new_instance['page_id'] ) ? (int) $new_instance['page_id'] : 0;
		
		
		return $instance;
	}
}
endif;