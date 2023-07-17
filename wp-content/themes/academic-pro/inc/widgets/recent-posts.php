<?php
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

if ( ! class_exists( 'Academic_Pro_Recent_Posts' ) ) :

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Academic_Pro_Recent_Posts extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'academic-pro-recent-posts',
			'description' => esc_html__( 'Your site&#8217;s most recent Posts with Featured Image.', 'academic-pro' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'academic-pro-recent-posts', esc_html__( 'TP: Recent Posts', 'academic-pro' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'academic-pro' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$post_category = isset( $instance['post_category'] ) ? $instance['post_category'] : false;
		
		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'cat'				  => (int)$post_category
		) ) );

		if ($r->have_posts()) : ?>
			<?php echo $args['before_widget']; ?>

				<?php if ( $title ) {
					echo $args['before_title'] . $title . $args['after_title'];
				} ?>
				<ul>
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( '', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
							<?php get_the_title() ? the_title() : the_ID(); ?>
						</a>
					<?php if ( $show_date ) : ?>
						<time><i class="fa fa-clock-o"></i><?php echo date_i18n( get_option( 'date_format' ), get_the_date( 'U' ) ); ?></time>
					<?php endif; ?>
					</li>
				<?php endwhile; ?>
				</ul>
			<?php echo $args['after_widget']; ?>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']         = sanitize_text_field( $new_instance['title'] );
		$instance['number']        = (int) $new_instance['number'];
		$instance['show_date']     = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['post_category'] = (int) $new_instance['post_category'];
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title         = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number        = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date     = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$post_category = isset( $instance['post_category'] ) ? (int) $instance['post_category'] : 0;
	?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'academic-pro' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo absint( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'academic-pro' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo absint( $number ); ?>" size="3" /></p>

	   <p>
	   	<label for="<?php echo esc_attr( $this->get_field_id( 'post_category' ) ); ?>"><?php esc_html_e( 'Select Category:', 'academic-pro' ); ?></label>
	   	<?php 
	   	$args = array(
	   		'show_option_all'    => esc_html__( 'All Categories', 'academic-pro' ),
	   		'show_count'         => 1,
	   		'hide_empty'         => 0,
	   		'selected'           => $post_category,
	   		'name'               => esc_attr( $this->get_field_name( 'post_category' ) ),
	   		'id'                 => esc_attr( $this->get_field_id( 'post_category' ) ),
	   		'class'              => 'postform',
	   		'depth'              => 0,
	   		'tab_index'          => 0,
	   		'taxonomy'           => 'category',
	   		'hide_if_empty'      => false,
	   		'value_field'	     => 'term_id',
   		);

	   	wp_dropdown_categories( $args ); ?>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'academic-pro' ); ?></label></p>
<?php
	}
}
endif;
