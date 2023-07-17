<?php
 /**
  * Newsletter
  *
  * This is the template for the content of Newsletter
  *
  * @package Theme Palace
  * @subpackage Academic Pro
  * @since 1.0
  */
 if ( ! function_exists( 'academic_pro_add_newsletter' ) ) :
   /**
    * Add Newsletter
    *
    *@since Academic Pro 1.0
    */
   function academic_pro_add_newsletter() { 
    $options = academic_pro_get_theme_options();

    $newsletter_enable = apply_filters( 'academic_pro_section_status', true, 'newsletter_enable' );

    if ( true !== $newsletter_enable ) {
      return false;
    }
    ?>
     <section id="subscribe-form" class="page-section bg-black two-col os-animation">
      <div class="container">
      <div class="column-wrapper">
        <img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/uploads/message-icon.jpg'; ?>" alt="">
        <header class="entry-header">
        <?php if ( ! empty( $options['newsletter_title'] ) ) { ?>
          <h2 class="entry-title"><?php echo esc_html( $options['newsletter_title'] ); ?></h2>  
        <?php } ?>
        <?php if ( ! empty( $options['newsletter_sub_title'] ) ) { ?>
          <h6 class="entry-subtitle"><?php echo esc_html( $options['newsletter_sub_title'] ); ?></h6>
        <?php } ?>
        </header><!-- end .entry-header -->
      </div><!-- end .column-wrapper -->
      <?php if ( is_active_sidebar( 'academic-pro-newsletter' ) ) : ?>
        <div class="column-wrapper">
          <?php dynamic_sidebar( 'academic-pro-newsletter' ); ?>
        </div><!-- end .column-wrapper -->
      <?php endif; ?>
      </div><!-- end .container -->
    </section><!-- end #subscribe-form -->
<?php
  }
endif;
add_action( 'academic_pro_footer_content', 'academic_pro_add_newsletter', 20 );