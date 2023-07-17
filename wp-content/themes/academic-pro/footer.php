<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
* academic_pro_footer_content hook
*
* @hooked academic_pro_add_partner - 10
* @hooked academic_pro_add_newsletter - 20
*
*/
do_action( 'academic_pro_footer_content' );

/**
* academic_pro_content_end hook
*
* @hooked academic_pro_content_end -  100
*
*/
do_action( 'academic_pro_content_end' );


/**
* academic_pro_footer hook
*
* @hooked academic_pro_footer_start -  10
* @hooked academic_pro_footer -  30
* @hooked academic_pro_copyright -  40
* @hooked academic_pro_footer_end -  100
*
*/
do_action( 'academic_pro_footer' );


/**
* academic_pro_back_to_top hook
*
* @hooked academic_pro_back_to_top -  10
*
*/
do_action( 'academic_pro_back_to_top' );

wp_footer(); ?>

</body>
</html>
