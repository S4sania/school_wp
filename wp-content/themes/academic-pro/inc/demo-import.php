<?php
/**
 * Moral OCDI plugin compatible functions
 *
 * @package Moral
 */

function academic_pro_ctdi_plugin_page_setup( $default_settings ) {
    $default_settings['menu_title']  = esc_html__( 'Theme Palace Demo Import' , 'academic-pro' );

    return $default_settings;
}
add_filter( 'cp-ctdi/plugin_page_setup', 'academic_pro_ctdi_plugin_page_setup' );


function academic_pro_ctdi_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Pro', 'academic-pro' ),
            'categories'                   => array( ),
            'local_import_file'            => get_template_directory() . '/assets/demo/pro/content.xml',
            'local_import_widget_file'     => get_template_directory() . '/assets/demo/pro/widgets.wie',
            'local_import_customizer_file' => get_template_directory() . '/assets/demo/pro/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/pro/screenshot.png',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'academic-pro' ),
            'preview_url'                  => 'https://themepalacedemo.com/academic-pro',
        ),
        
        array(
            'import_file_name'             => esc_html__( 'Business', 'academic-pro' ),
            'categories'                   => array( ),
            'local_import_file'            => get_template_directory() . '/assets/demo/business/content.xml',
            'local_import_widget_file'     => get_template_directory() . '/assets/demo/business/widgets.wie',
            'local_import_customizer_file' => get_template_directory() . '/assets/demo/business/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/business/screenshot.png',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'academic-pro' ),
            'preview_url'                  => 'https://themepalacedemo.com/academic-business/',
        ),
        
    );
}
add_filter( 'cp-ctdi/import_files', 'academic_pro_ctdi_import_files' );



function academic_pro_ctdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
    $login = get_term_by('name', 'Login', 'nav_menu');

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'login' => $login->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'cp-ctdi/after_import', 'academic_pro_ctdi_after_import_setup' );
