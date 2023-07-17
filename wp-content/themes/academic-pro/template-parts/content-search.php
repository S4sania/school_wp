<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php  
	if ( has_post_thumbnail() ) :
		echo '<a class="post-thumbnail" href="' . esc_url( get_permalink() ) . '">';
		the_post_thumbnail( $size = 'large', array( 'alt' => get_the_title() ) );
		echo "</a>";
	endif;
	?>
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php academic_pro_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">
		<p><?php academic_pro_custom_excerpt( 'academic_pro_excerpt_length' ); ?></p>
		<div class="buttons">
			<?php  $options = academic_pro_get_theme_options(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-blue"><?php echo esc_html( $options['read_more_text'] ); ?></a>
		</div>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
