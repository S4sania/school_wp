<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'academic_pro_reset_section', array(
	'title'             => esc_html__( 'Reset all settings','academic-pro' ),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'academic-pro' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'academic_pro_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'academic_pro_sanitize_checkbox',
	'transport'			  => 'postMessage'
) );

$wp_customize->add_control( 'academic_pro_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'academic-pro' ),
	'section'           => 'academic_pro_reset_section',
	'type'              => 'checkbox',
) );