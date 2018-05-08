<?php
/**
 * asu-wordpress-web-standards-theme Theme Customizer
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 *
 * @package asu-wordpress-web-standards
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function asu_webstandards_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'asu_webstandards_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function asu_webstandards_customize_preview_js() {
  wp_enqueue_script( 'asu_webstandards_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'asu_webstandards_customize_preview_js' );

/**
 * Sanitizer that does nothing
 */
function wordpress_asu_sanitize_nothing( $data ) {
  return $data;
}

/**
 * Sanitizer that checks if the data is an url
 */
function wordpress_asu_sanitize_url( $data ) {
  // TODO check that $data is an email or url
  return $data;
}

/**
 * Sanitizer that checks if the data is an email or url
 */
function wordpress_asu_sanitize_email_or_url( $data ) {
  // TODO check that $data is an email or url
  return $data;
}

/**
 * Sanitizer that checks if the data is a phone number
 */
function wordpress_asu_sanitize_phone( $data ) {
  // TODO check that $data is a phone number
  return $data;
}

/**
 * Custom theme manager.  Special settings for the theme
 * get defined here.
 */
function wordpress_asu_customize_register( $wp_customize ) {
  
  //  =============================
  //  =============================
  //  =      ASU Brand Panel      =
  //  =============================
  //  =============================

  $wp_customize->add_panel(
      'wordpress_asu_theme_panel' ,
      array(
        'title'      => __( 'ASU Branding Elements','asu_wordpress' ),
        'priority'   => 1,
      )
  );


  //  =============================
  //  =============================
  //  = School Info Section       =
  //  =============================
  //  =============================

  $wp_customize->add_section(
      'wordpress_asu_theme_section' ,
      array(
        'title'      => __( 'School Information','asu_wordpress' ),
        'priority'   => 30,
        'panel' => 'wordpress_asu_theme_panel',
      )
  );

  //  =============================
  //  = School Logo               =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[logo]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_logo_text',
      array(
        'type'       => 'select',
        'choices'    => array(
            '' => __( 'Don\'t use a logo' ),
            'asu_fultonengineering_horiz_rgb_white_150ppi.png' => __( 'ASU Engineering' ),
            'asu_sustainability_master_rgb_digital_final_102816_horiz_rgb_white_150ppi.png' => __( 'ASU School of Sustainability' ),
            'asu_enterprisedevelopment_horiz_rgb_white_150ppi_1.png' => __( 'ASU Office of Knowledge Enterprise Development' ),
            'asu_library_horiz_rgb_white_150ppi_0.png' => __('ASU Library'),
        ),
        'label'      => __( 'ASU Endorsed Logo', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[logo]',
        'priority'   => 0,
      )
  );

  //  =============================
  //  = Organization Text         =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[org]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_org_text',
      array(
        'label'      => __( 'Parent Organization', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[org]',
        'priority'   => 1,
      )
  );

  //  =============================
  //  = Organization Link         =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[org_link]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_org_link',
      array(
        'label'      => __( 'Parent Organization URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[org_link]',
        'priority'   => 10,
      )
  );

  //  =============================
  //  = Text Below Logo in Footer =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[campus_address]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_text_in_footer',
      array(
        'label'      => __( 'Text Below Logo in Footer', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[campus_address]',
        'type'       => 'textarea',
        'priority'   => 21,
      )
  );

  //  =============================
  //  = Phone                     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[phone]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_phone',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_phone',
      array(
        'label'      => __( 'Phone Number (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[phone]',
        'priority'   => 30,
      )
  );

  //  =============================
  //  = Fax                       =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[fax]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_phone',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_fax',
      array(
        'label'      => __( 'Fax Number (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[fax]',
        'priority'   => 40,
      )
  );

  //  =============================
  //  = Contact Us Email or URL   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contact]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_email_or_url',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contact',
      array(
        'label'      => __( 'Contact Us Email or URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[contact]',
        'priority'   => 50,
      )
  );

  //  =============================
  //  = Contact Us Email Subject  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contact_subject]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contact_subject',
      array(
        'label'      => __( 'Contact Us Email Subject (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[contact_subject]',
        'priority'   => 60,
      )
  );

  //  =============================
  //  = Contact Us Email Body     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contact_body]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contact_body',
      array(
        'label'    => __( 'Contact Us Email Body (Optional)', 'asu_wordpress' ),
        'section'  => 'wordpress_asu_theme_section',
        'settings' => 'wordpress_asu_theme_options[contact_body]',
        'type'     => 'textarea',
        'priority' => 70,
      )
  );

  //  =============================
  //  = Contribute URL            =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contribute]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_url',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contribute',
      array(
        'label'      => __( 'Contribute URL (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[contribute]',
        'priority'   => 80,
      )
  );

  //  =============================
  //  =============================
  //  = Social Media Section      =
  //  =============================
  //  =============================

  $wp_customize->add_section(
      'wordpress_asu_theme_section_social',
      array(
        'title'      => __( 'Social Media','asu_wordpress' ),
        'priority'   => 31,
        'panel' => 'wordpress_asu_theme_panel',
      )
  );

  //  =============================
  //  = Facebook                  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[facebook]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_facebook',
      array(
        'label'      => __( 'Facebook URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[facebook]',
      )
  );

  //  =============================
  //  = Twitter                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[twitter]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_twitter',
      array(
        'label'      => __( 'Twitter URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[twitter]',
      )
  );

  //  =============================
  //  = Google+                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[google_plus]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_google_plus',
      array(
        'label'      => __( 'Google Plus URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[google_plus]',
      )
  );

  //  =============================
  //  = LinkedIn                  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[linkedin]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_linkedin',
      array(
        'label'      => __( 'Linked In URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[linkedin]',
      )
  );

  //  =============================
  //  = Youtube                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[youtube]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_youtube',
      array(
        'label'      => __( 'Youtube URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[youtube]',
      )
  );

  //  =============================
  //  = Vimeo                     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[vimeo]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_vimeo',
      array(
        'label'      => __( 'Vimeo URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[vimeo]',
      )
  );

  //  =============================
  //  = Instagram                 =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[instagram]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_instagram',
      array(
        'label'      => __( 'Instagram URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[instagram]',
      )
  );

  //  =============================
  //  = Fickr                     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[flickr]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_flickr',
      array(
        'label'      => __( 'Flickr URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[flickr]',
      )
  );

  //  =============================
  //  = Pinterest                 =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[pinterest]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_pinterest',
      array(
        'label'      => __( 'Pinterest URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[pinterest]',
      )
  );

  //  =============================
  //  = RSS                       =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[rss]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_rss',
      array(
        'label'      => __( 'RSS URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[rss]',
      )
  );


  // ======================================
  // ======================================
  // = GLobal Header Items                =
  // ======================================
  // ======================================

  $wp_customize->add_section(
      'wordpress_asu_theme_section_subsite_settings',
      array(
        'title'      => __( 'Global Header','asu_wordpress' ),
        'priority'   => 10,
        'panel' => 'wordpress_asu_theme_panel',
      )
  );

  //  =============================
  //  = Is Subsite                =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[parent]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      new WP_Customize_Control(
          $wp_customize,
          'subsite',
          array(
            'label'      => __( 'Does this site have a parent?', 'asu_wordpress' ),
            'section'    => 'wordpress_asu_theme_section_subsite_settings',
            'settings'   => 'wordpress_asu_theme_options[parent]',
            'type'       => 'checkbox',
          )
      )
  );

  //  =============================
  //  = Parent Name               =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[parent_site_name]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_nothing',
      )
  );

  $wp_customize->add_control(
      new WP_Customize_Control(
          $wp_customize,
          'parent_blog_name',
          array(
            'label'      => __( 'Parent Site Name', 'asu_wordpress' ),
            'section'    => 'wordpress_asu_theme_section_subsite_settings',
            'settings'   => 'wordpress_asu_theme_options[parent_site_name]',
          )
      )
  );

  //  =============================
  //  = Parent URL                =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[parent_url]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_asu_sanitize_url',
      )
  );

  $wp_customize->add_control(
      new WP_Customize_Control(
          $wp_customize,
          'parent_blog_id',
          array(
            'label'      => __( 'Parent Site URL', 'asu_wordpress' ),
            'section'    => 'wordpress_asu_theme_section_subsite_settings',
            'settings'   => 'wordpress_asu_theme_options[parent_url]'
          )
      )
  );


  // ======================================
  // ======================================
  // = Remove Confusing Divi Items        =
  // ======================================
  // ======================================
  // $wp_customize->remove_control( 'header_textcolor' );
}
add_action( 'customize_register', 'wordpress_asu_customize_register' );