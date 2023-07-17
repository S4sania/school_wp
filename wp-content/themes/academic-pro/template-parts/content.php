<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

$options = academic_pro_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'os-animation' ); ?>>
	<?php 
	$archive_image = $options['archive_image'];  
	if ( has_post_thumbnail() && ! $archive_image ) :
		echo '<a class="post-thumbnail" href="' . esc_url( get_permalink() ) . '">';
		the_post_thumbnail( $size = 'large', array( 'alt' => get_the_title() ) );
		echo "</a>";
	endif;
	?>
	<header class="entry-header">
		<?php
		$archive_meta = $options['archive_meta']; 
		if ( 'post' === get_post_type() && ! $archive_meta ) : ?>
			<div class="entry-meta">
				<?php academic_pro_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif; 
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		$archive_content_type = $options['archive_content_type']; 

		if ( 'excerpt' === $archive_content_type ) {
			academic_pro_custom_excerpt( 'academic_pro_excerpt_length' );
		} else {
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'academic-pro' ),
				'after'  => '</div>',
			) );
		}
		?>
		<div class="buttons">
			<a href="<?php the_permalink(); ?>" class="btn btn-blue"><?php echo esc_html( $options['read_more_text'] ); ?></a>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
