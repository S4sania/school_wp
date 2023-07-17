<?php
/**
 * Academic Pro widgets inclusion
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

if ( ! class_exists( 'Academic_Pro_Popular_Post' ) ) :

     
    class Academic_Pro_Popular_Post extends WP_Widget {
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $tp_widget_popular_post = array(
                'classname'   => 'academic-pro-popular-post',
                'description' => esc_html__( 'Retrive top viewed posts.', 'academic-pro' ),
            );
            parent::__construct( 'academic-pro-popular-post', esc_html__( 'TP : Popular Posts', 'academic-pro' ), $tp_widget_popular_post );
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

            $title  = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : esc_html__( 'Popular', 'academic-pro' );
            $post_number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
            
            $show_views_count = isset( $instance['show_views_count'] ) ? $instance['show_views_count'] : false;

            echo $args['before_widget'];
                if ( ! empty( $title ) ) {
                    echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                }
            $popular_args = new WP_Query( apply_filters( 'widget_posts_args', array(
                'post_type'      => 'post',
                'posts_per_page' => $post_number,
                'meta_key'       => 'post_views_count',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC',
                'ignore_sticky_posts' => true
                ) ) );
            if ($popular_args->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <ul>
            <?php while ( $popular_args->have_posts() ) : $popular_args->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                <?php if ( $show_views_count ) : ?>
                    <small class="post-date">( <?php echo academic_pro_get_post_views( get_the_id() ); ?> )</small>
                <?php endif; ?>
                </li>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

            endif;
            echo $args['after_widget'];
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            $title            = isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Popular', 'academic-pro' );
            $post_number      = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
            
            $show_views_count = isset( $instance['show_views_count'] ) ? (bool) $instance['show_views_count'] : false;

           ?>

           <p>
               <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'academic-pro' ); ?></label>
               <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
           </p>

           <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'academic-pro' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="7" value="<?php echo absint( $post_number ); ?>" size="3" />
           </p>

           <p><input class="checkbox" type="checkbox"<?php checked( $show_views_count ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_views_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_views_count' ) ); ?>" />
           <label for="<?php echo esc_attr( $this->get_field_id( 'show_views_count' ) ); ?>"><?php esc_html_e( 'Display post views count?', 'academic-pro' ); ?></label></p>

           <?php
        }

        /**
        * Processing widget options on save
        *
        * @param array $new_instance The new options
        * @param array $old_instance The previous options
        */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance           = $old_instance;
            $instance['title']  = sanitize_text_field( $new_instance['title'] );
            $instance['number'] = (int) $new_instance['number'];
            $instance['show_views_count'] = isset( $new_instance['show_views_count'] ) ? (bool) $new_instance['show_views_count'] : false;
           
            return $instance;
        }
    }
endif;
