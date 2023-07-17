<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

get_header(); 

/**
 * academic_pro_page_section hook
 *
 * @hooked academic_pro_page_section -  10
 *
 */
do_action( 'academic_pro_page_section' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : 
			$academic_pro_cat_id = get_queried_object_id();
			$options = academic_pro_get_theme_options();
			$archive_grid_layout = ! empty( $options['archive_grid_category'] ) ? $options['archive_grid_category'] : array();
			if ( in_array( $academic_pro_cat_id, $archive_grid_layout ) ) :
				get_template_part( 'template-parts/content', 'grid' );
			else :
			?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
			endif;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
		
		/**
		* Hook - academic_pro_pagination.
		*
		* @hooked academic_pro_default_pagination 
		* @hooked academic_pro_numeric_pagination 
		*/
		do_action( 'academic_pro_action_pagination' ); 
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if ( academic_pro_is_sidebar_enable() ) {
	get_sidebar();
}

/**
 * academic_pro_page_section_end hook
 *
 * @hooked academic_pro_page_section_end -  10
 *
 */
do_action( 'academic_pro_page_section_end' );


get_footer();
