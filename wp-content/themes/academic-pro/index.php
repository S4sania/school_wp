<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 

		/**
		* Hook - academic_pro_action_pagination.
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
