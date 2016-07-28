<?php
/**
 * MVPWP Theme Customizer.
 *
 * @package MVPWP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mvpwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'mvpwp_customize_register' );


/**
* Add the configuration.
* This way all the fields using the 'mvpwp_opt' ID
* will inherit these options
*/
MVPWP_Kirki::add_config( 'mvpwp_opt', array(
  'capability'    => 'edit_theme_options',
  'option_type'   => 'theme_mod',
) );


/** 
*
*
* Homepage Settings 
*
*
**/

/** Homepage Panel */
MVPWP_Kirki::add_panel( 'homepage_panel', array(
    'priority'    => 150,
    'title'       => __( 'Homepage', 'mvpwp' ),
    'description' => __( 'Settings for the homepage layout.', 'mvpwp' ),
) );

/** Homepage Banner */
MVPWP_Kirki::add_section( 'homepage_banner_section', array(
    'title'          => __( 'Banner' , 'mvpwp'),
    'description'    => __( 'Settings for the homepage banner', 'mvpwp' ),
    'panel'          => 'homepage_panel', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'image',
  'settings'    => 'banner_img',
  'label'       => __( 'Upload Banner BG', 'mvpwp' ),
  'description' => __( 'Use ~1400x800', 'mvpwp' ),
  'section'     => 'homepage_banner_section',
  'default'     => '',
  'priority'    => 10,
) );

/** Hompage Banner Text */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'textarea',
  'settings'    => 'banner_text',
  'label'       => __( 'Banner Content', 'mvpwp' ),
  'section'     => 'homepage_banner_section',
  'priority'    => 10,
) );

/** Homepage CTA */
MVPWP_Kirki::add_section( 'homepage_cta_section', array(
    'title'          => __( 'Call to Action' , 'mvpwp'),
    'description'    => __( 'Settings for the homepage CTA.', 'mvpwp' ),
    'panel'          => 'homepage_panel', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/** Hompage Enable/Disable CTA Switch */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'switch',
  'settings'    => 'cta_switch',
  'label'       => __( 'Enable/Disable CTA', 'mvpwp' ),
  'section'     => 'homepage_cta_section',
  'default'     => '0',
  'priority'    => 10,
  'choices'     => array(
    'on'  => esc_attr__( 'Enable', 'mvpwp' ),
    'off' => esc_attr__( 'Disable', 'mvpwp' ),
  ),
) );


/** Hompage Enable/Disable CTA Content */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'textarea',
  'settings'    => 'cta_text',
  'label'       => __( 'CTA Content', 'mvpwp' ),
  'section'     => 'homepage_cta_section',
  'priority'    => 10,
  'required'    => array(
      array(
          'setting'  => 'cta_switch',
          'value'    => '1',
          'operator' => '==',
      ),
  ),
) );

/** Homepage Features */
MVPWP_Kirki::add_section( 'homepage_features_section', array(
    'title'          => __( 'Features' , 'mvpwp'),
    'description'    => __( 'Settings for the homepage features.', 'mvpwp' ),
    'panel'          => 'homepage_panel', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/** Hompage Enable/Disable Features Switch */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'switch',
  'settings'    => 'features_switch',
  'label'       => __( 'Enable/Disable Features', 'mvpwp' ),
  'section'     => 'homepage_features_section',
  'default'     => '0',
  'priority'    => 10,
  'choices'     => array(
    'on'  => esc_attr__( 'Enable', 'mvpwp' ),
    'off' => esc_attr__( 'Disable', 'mvpwp' ),
  ),
) );

/** Homepage Features Repeater Fields */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'repeater',
  'label'       => esc_attr__( 'Features', 'mvpwp' ),
  'section'     => 'homepage_features_section',
  'priority'    => 10,
  'settings'    => 'homepage_features',
  'row_label'     => array(
    'type'          => 'field',
    'value'         => 'feature',
    'field'         => 'section_header',
  ),
  'required'    => array(
      array(
          'setting'  => 'features_switch',
          'value'    => '1',
          'operator' => '==',
      ),
  ),
  'default'     => array(
    array(
      'feature_text' => esc_attr__( 'Nunc interdum lacus sit amet orci.', 'mvpwp' ),
      'feature_icon'  => 'gitlab',
      'feature_icon_color'  => 'default',
    ),
  ),
  'fields' => array(
    'feature_icon' => array (
      'type'        => 'text',
      'label'       => __( 'Feature Icon', 'mvpwp' ),
      'description' => __( 'Use a Font Awesome Icon (http://fontawesome.io/icons/)', 'mvpwp' ),
    ),
    'feature_icon_color' => array(
      'type'        => 'select',
      'label'       => esc_attr__( 'Feature Icon Color', 'mvpwp' ),
      'description' => esc_attr__( 'Color for Icon', 'mvpwp' ),
      'default'     => 'default',
      'choices'     => array(
        'default' => esc_attr__( 'Default', 'mvpwp' ),
        'primary' => esc_attr__( 'Primary', 'mvpwp' ),
        'info' => esc_attr__( 'Info', 'mvpwp' ),
        'success' => esc_attr__( 'Success', 'mvpwp' ),
        'warning' => esc_attr__( 'Warning', 'mvpwp' ),
        'danger' => esc_attr__( 'Danger', 'mvpwp' ),
        'white' => esc_attr__( 'White', 'mvpwp' ),
      ),
    ),
    'feature_text' => array(
      'type'        => 'textarea',
      'label'       => esc_attr__( 'Feature Content', 'mvpwp' ),
      'description' => esc_attr__( 'Copy for the feature.', 'mvpwp' ),
      'default'     => '',
    ),
  )
) );

/** Homepage Contact Form */
MVPWP_Kirki::add_section( 'homepage_contact_section', array(
    'title'          => __( 'Contact Form' , 'mvpwp'),
    'description'    => __( 'Settings for the homepage contact form.', 'mvpwp' ),
    'panel'          => 'homepage_panel', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/** Hompage Enable/Disable Contact Form Switch Switch */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'switch',
  'settings'    => 'contact_switch',
  'label'       => __( 'Enable/Disable Contact Form', 'mvpwp' ),
  'section'     => 'homepage_contact_section',
  'default'     => '0',
  'priority'    => 10,
  'choices'     => array(
    'on'  => esc_attr__( 'Enable', 'mvpwp' ),
    'off' => esc_attr__( 'Disable', 'mvpwp' ),
  ),
) );

/** Hompage Enable/Disable Contact Content */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'textarea',
  'settings'    => 'contact_text',
  'label'       => __( 'CTA Content', 'mvpwp' ),
  'section'     => 'homepage_contact_section',
  'priority'    => 10,
  'required'    => array(
      array(
          'setting'  => 'contact_switch',
          'value'    => '1',
          'operator' => '==',
      ),
  ),
) );

/** 
*
*
* Blog Settings 
*
*
**/

/** Blog Section */
MVPWP_Kirki::add_section( 'blog_settings', array(
    'title'          => __( 'Blog' ),
    'description'    => __( 'Settings for the blog layout.' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'image',
  'settings'    => 'blog_img',
  'label'       => __( 'Upload Banner BG', 'mvpwp' ),
  'description' => __( 'Use ~1400x800', 'mvpwp' ),
  'section'     => 'blog_settings',
  'default'     => '',
  'priority'    => 10,
) );

/** Hompage Banner Text */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'textarea',
  'settings'    => 'blog_text',
  'label'       => __( 'Blog Title', 'mvpwp' ),
  'section'     => 'blog_settings',
  'priority'    => 10,
) );

/** Blog Enable/Disable Tags Switch */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'switch',
  'settings'    => 'tag_switch',
  'label'       => __( 'Enable/Disable Tags', 'mvpwp' ),
  'section'     => 'blog_settings',
  'default'     => '1',
  'priority'    => 10,
  'choices'     => array(
    'on'  => esc_attr__( 'Enable', 'mvpwp' ),
    'off' => esc_attr__( 'Disable', 'mvpwp' ),
  ),
) );



/** 
*
*
* Footer Settings 
*
*
**/

/** Footer Panel */
MVPWP_Kirki::add_panel( 'footer_panel', array(
    'priority'    => 200,
    'title'       => __( 'Footer', 'mvpwp' ),
    'description' => __( 'Settings for the footer.', 'mvpwp' ),
) );

/** Footer Copyright Section */
MVPWP_Kirki::add_section( 'footer_copyright_section', array(
    'title'          => __( 'Copyright' ),
    'description'    => __( 'Footer Copyright' ),
    'panel'          => 'footer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/** Footer Copyright */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
    'type'        => 'textarea',
    'settings'    => 'copyright_text',
    'label'       => __( 'Copyright Text', 'mvpwp' ),
    'section'     => 'footer_copyright_section',
    'priority'    => 10,
) );

/** Footer Social Section */
MVPWP_Kirki::add_section( 'footer_social_section', array(
    'title'          => __( 'Social' ),
    'description'    => __( 'Footer Social Links' ),
    'panel'          => 'footer_panel', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/** Footer Social Repeater Fields */
MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'repeater',
  'label'       => esc_attr__( 'Social Icons', 'mvpwp' ),
  'section'     => 'footer_social_section',
  'priority'    => 10,
  'settings'    => 'footer_social',
  'row_label'     => array(
    'type'          => 'field',
    'value'         => 'social icon',
    'field'         => 'section_header',
  ),
  'default'     => array(
    array(
      'social_url' => esc_attr__( 'http://', 'mvpwp' ),
      'social_icon'  => 'facebook',
    ),
  ),
  'fields' => array(
    'social_icon' => array (
      'type'        => 'text',
      'label'       => __( 'Social Icon', 'mvpwp' ),
      'description' => __( 'Use a Font Awesome Icon (http://fontawesome.io/icons/)', 'mvpwp' ),
      'default'     => 'facebook',
    ),
    'social_url' => array(
      'type'        => 'text',
      'label'       => esc_attr__( 'Social URL', 'mvpwp' ),
      'description' => esc_attr__( 'Full URL path.', 'mvpwp' ),
      'default'     => 'http://',
    ),
  )
) );


