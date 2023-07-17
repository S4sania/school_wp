<?php
/**
 * Template Name: Gallery Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

get_header(); 

$options = academic_pro_get_theme_options();
$gallery_content_type    = ! empty( $options['gallery_multiple_category'] ) ? $options['gallery_multiple_category'] : '' ;

$args = array(
	'post_type'         => 'post',
	'posts_per_page'    => 8,
	'category__in'      => $gallery_content_type,
);

if( ! empty ( $args ) ) :

$custom_posts = get_posts( $args );

?>
<section id="portfolio-gallery" class="page-section os-animation">
	<div class="container">
		<div class="entry-content">
			<nav class="portfolio-filter">
		        <ul>
					<li class="active"><a href="#" data-filter="*" ><?php esc_html_e( 'All', 'academic-pro' ); ?></a></li>
					<?php
					if ( ! empty( $gallery_content_type ) ) :
						foreach ( $gallery_content_type as $tp_cat_id ) {
							$tp_category = get_category( $tp_cat_id );
							echo '<li><a href="#" data-filter=".' . esc_attr( $tp_category->slug ) . '">' . esc_html( $tp_category->name ) . '</a></li>';
						}
					endif;
					?>
				</ul>
		    </nav> 

			<div id="threecol" class="portfolio">
				<?php foreach ( $custom_posts as $custom_post ) :
					$category_slug = '';
					$post_categories = get_the_category( $custom_post->ID );
					foreach ( $post_categories as $post_category ) {
						$category_slug .= $post_category->slug . ' ';
					} ?>
					<div class="portfolio-item hovereffect <?php echo $category_slug; ?>">
						<div class="image-wrapper">
							<?php if ( has_post_thumbnail( $custom_post->ID ) ) :
								$img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post->ID ), 'academic-pro-category-image' );
								$img_array_large = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post->ID ), 'large' );
							?>
								<img src="<?php echo esc_url( $img_array[0] ); ?>" alt="<?php echo esc_attr( get_the_title( $custom_post->ID ) ); ?>">
							<?php else :
								echo '<img src="' . get_template_directory_uri() . '/assets/uploads/no-featured-image-450x338.png" alt="">';
							endif; ?>
							<div class="black-overlay"></div>
						</div>
						<div class="hovercontent">
							<div class="hoverbutton inlinebutton">
								<a href="<?php the_permalink( $custom_post->ID ); ?>"><i class="fa fa-link"></i></a>
								<?php if ( has_post_thumbnail( $custom_post->ID ) ) : ?>
									<a data-title="Gallery" href="<?php echo esc_url( $img_array_large[0] ); ?>" data-lightbox="masonry"><i class="fa fa-eye"></i></a>
								<?php endif; ?>
								<p><a href="<?php the_permalink( $custom_post->ID ); ?>"><?php echo esc_html( get_the_title( $custom_post->ID ) ); ?></a></p>
							</div><!-- end .hover-button-->
						</div><!-- end .hover-content -->
					</div><!-- end .portfolio-item -->
				<?php endforeach; 
				?>
			</div><!--end #threecol-->
			<div class="buttons">
		        <a id="loadmore" href="#" class="btn btn-blue"><?php esc_html_e( 'Load More', 'academic-pro' ); ?></a>
		    </div><!-- end .buttons -->
   		</div><!--.entry-content -->
	</div><!-- .container -->
<?php
endif;
if ( academic_pro_is_sidebar_enable() ) {
	get_sidebar();
}
?>
</section><!--end #portfolio-gallery-->
<?php
/**
 * academic_pro_page_section_end hook
 *
 * @hooked academic_pro_page_section_end -  10
 *
 */
do_action( 'academic_pro_page_section_end' );
get_footer();
