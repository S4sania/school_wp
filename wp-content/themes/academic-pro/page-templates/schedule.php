<?php
/**
 * Template Name: Schedule
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

get_header(); 
?>

<div class="container page-section">
	<div id="primary" class="content-area os-animation">
	  <main id="main" class="site-main bg-white" role="main">
	    <div class="schedules-list-wrapper">
	      	<div class="course-selection clear">
	      	<?php 
			$options             = academic_pro_get_theme_options();
			$schedule_categories = ! empty( $options['schedule_multiple_category'] ) ? $options['schedule_multiple_category'] : '' ;

			if ( ! empty( $schedule_categories ) ) :
		      for ($i=0; $i < count( $schedule_categories ); $i++) {  ?>
			      <div id="course-1" class="course-schedule">
			        <header class="entry-header">
			          <h2 class="entry-title"><?php echo esc_html( get_cat_name( $schedule_categories[ $i ] ) );?></h2>  
			        </header>
			        <table id="table1" class="schedule-table">
			          <thead>
			          <tr>
			            <th><?php esc_html_e( 'Name', 'academic-pro' );?></th>
			            <th><?php esc_html_e( 'Location', 'academic-pro' );?></th>
			            <th><?php esc_html_e( 'Date', 'academic-pro' );?></th>
			            <th><?php esc_html_e( 'Duration', 'academic-pro' );?></th>
			          </tr>
			          </thead>

			          <tbody>
			          <?php 
		      		  $num_posts = (int)$options['schedule_post_num'];
			          $args = array(
							'post_type'      => 'post',
							'posts_per_page' => $num_posts,
							'cat'            => $schedule_categories[ $i ],
			          );
			          if( ! empty ( $args ) ) :
			          	$posts = get_posts( $args );
			          endif;
			          foreach ( $posts as $post ) : 
			          	$post_id = $post->ID;?>
			            <tr>
			              <td><a href="<?php echo esc_url( get_permalink( $post_id ) );?>"><?php echo esc_html( get_the_title( $post_id ) );?></a></td>
			              <td>
			              	<?php 
			              	$location = get_post_meta( $post_id, 'academic-pro-event-location', true );
			              	if ( ! empty( $location ) ) {
			              		echo esc_html( $location );
			              	} else {
			              		echo '<i>' . esc_html__( 'not set', 'academic-pro' ) . '</i>';
			              	}
			              	?>
			              </td>
			              <td>
			              <?php 
			              	$date = get_post_meta( $post_id, 'academic-pro-event-date', true );
			              	if ( ! empty( $date ) ) {
			              		echo esc_html( $date );
			              	} else {
			              		echo '<i>' . esc_html__( 'not set', 'academic-pro' ) . '</i>';
			              	}
			              ?>
			              </td>
			              <td>
			              	<?php 
			              	$time_from = get_post_meta( $post_id, 'academic-pro-event-time-from', true ) ;
			              	$time_to = get_post_meta( $post_id, 'academic-pro-event-time-to', true );

			              	$from = strtotime( $time_from );
			              	$to = strtotime( $time_to );

			              	$diff = '';
			              	if ( ! empty( $from ) && ! empty( $to ) ) {
			              		$diff=human_time_diff( $from, $to );
			              	}

			              	if ( ! empty( $diff ) ) {
			              		echo esc_html( $diff );
			              	} else {
			              		echo '<i>' . esc_html__( 'not set', 'academic-pro' ) . '</i>';
			              	}
			              	?>
			              	</td>
			            </tr>
			          <?php endforeach;?>
			          </tbody>
			        </table>
			      </div><!-- end #course-1 -->
		      <?php }?>
	    	</div><!-- end .schedule-list-wrapper -->
	    	<?php else: ?>
				<h5><?php esc_html_e( 'Select the categories to be displayed from the Customizer.', 'academic-pro' ); ?></h5>
	   		<?php endif; ?>
	  </main>
	</div><!-- end #primary -->
	<?php 
	if ( academic_pro_is_sidebar_enable() ) {
		get_sidebar();
	} ?>
</div><!-- end .container/ ,page-section -->
<?php 
get_footer();
