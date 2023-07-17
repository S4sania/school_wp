<?php
/**
 * Template Name: Contact Us
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

get_header();

global $post;
$options = academic_pro_get_theme_options();
?>

<section id="contact-information" class="page-section no-padding-bottom two-col os-animation">
    <div class="container">
      <div class="column-wrapper contact-info">
      <?php if ( ! empty( $options['contact_us_contact_info_title'] ) ) : ?>
        <header class="entry-header">
          <h2 class="entry-title"><?php echo esc_html( $options['contact_us_contact_info_title'] ); ?></h2>
        </header><!-- end .entry-header -->
      <?php endif; ?>

        <div class="entry-content">
          <ul class="address-block">
     	 	<?php if ( ! empty( $options['contact_us_contact_info_phone'] ) ) : ?>
            <li class="phone"><i class="fa fa-phone"></i><label><?php esc_html_e( 'Phone number', 'academic-pro' ); ?>:</label><a href="tel:<?php echo esc_attr( $options['contact_us_contact_info_phone'] );?>"><?php echo esc_html( $options['contact_us_contact_info_phone'] );?></a></li>
      	<?php endif; ?>
     	 	<?php if ( ! empty( $options['contact_us_contact_info_address'] ) ) : ?>
            <li class="address"><i class="fa fa-map-marker"></i><label><?php esc_html_e( 'Our Address', 'academic-pro' ); ?>:</label><?php echo esc_html( $options['contact_us_contact_info_address'] );?></li>
      	<?php endif; ?>
     	 	<?php if ( ! empty( $options['contact_us_contact_info_email'] ) ) : ?>
            <li class="email"><i class="fa fa-envelope"></i><label><?php esc_html_e( 'Email address', 'academic-pro' ); ?>:</label><a href="mailto:<?php echo sanitize_email( $options['contact_us_contact_info_email'] );?>"><?php echo sanitize_email( $options['contact_us_contact_info_email'] );?></a></li>
      	<?php endif; ?>
          </ul>
        </div><!-- end .entry-content -->
      </div><!-- end .column-wrapper -->

      <div class="column-wrapper map-location">
  		<?php if ( ! empty( $options['contact_us_contact_map_title'] ) ) : ?>
  		  	<header class="entry-header">
  		    	<h2 class="entry-title"><?php echo esc_html( $options['contact_us_contact_map_title'] ); ?></h2>
  		  	</header><!-- end .entry-header -->
  		<?php endif; ?>

        <?php if ( ! empty( $options['contact_us_map_shortcode'] ) ) { ?>
            <div class="entry-content">
              <div id="map"><?php echo do_shortcode( wp_kses_post( $options['contact_us_map_shortcode'] ) );?></div>
            </div><!-- end .entry-content -->
        <?php } ?>
      </div><!-- end .column-wrapper -->
    </div><!-- end .container -->
</section><!-- end #contact-information -->

<section id="contact-form" class="page-section two-col os-animation">
  <div class="container">
    <div class="column-wrapper">
      <header class="entry-header">
        <h2 class="entry-title"><?php single_post_title();?></h2>
      </header><!-- end .entry-header -->
      <div class="entry-content">
        <div class="text-widget">
          <?php echo wp_kses_post( $post->post_content ); ?>
        </div>
        <ul class="social-icons">
        <?php for( $i=1; $i<=6; $i++ ) {
          if ( ! empty( $options['contact_us_social_icon_' .$i ] ) ){
            echo '<li><a href="' . esc_url( $options['contact_us_social_icon_'.$i ] ) . '" class="btn-js"></a></li>';
          }
        } ?>
        </ul>
      </div><!-- end .entry-content -->
    </div><!-- end .column-wrapper -->

	<?php
	if ( ! empty( $options['contact_us_form_shortcode'] ) ) :
  $form_shortcode = $options['contact_us_form_shortcode']; ?>
    <div class="column-wrapper">
    	<?php echo do_shortcode( wp_kses_post( $form_shortcode ) );?>
    </div><!-- end .column-wrapper -->
	<?php endif; ?>
  </div><!-- end .container -->
</section><!-- end #contact-information -->
<?php

get_footer();