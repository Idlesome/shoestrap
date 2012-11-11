<?php

/*
 * This class creates a custom textarea control to be used in the "advanced" settings of the theme.
 * This will allow users to add their custom css & sripts right from the customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
  class Shoestrap_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
    
    public function render_content() { ?>
      <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
      </label>
    <?php }
  }
}

/*
 * Create the controls in the customizer.
 */
function shoestrap_register_controls( $wp_customize ){

  $wp_customize->remove_control( 'background_color' );  
/*
 * HEADER AND BRANDING
 */
 
 // Header mode (Header/Navbar)
  $wp_customize->add_control( 'shoestrap_header_mode', array(
    'label'       => __( 'Branding Mode', 'shoestrap' ),
    'section'     => 'shoestrap_header',
    'settings'    => 'shoestrap_header_mode',
    'type'        => 'select',
    'priority'    => 1,
    'choices'     => array(
      'header'    => __( 'Extra Header Area', 'shoestrap' ),
      'navbar'    => __( 'NavBar', 'shoestrap' ),
    ),
  ));
  
  // Logo Image uploader
  $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'shoestrap_logo_Image',
    array(
      'label'     => __( 'Logo Image', 'shoestrap' ),
      'section'   => 'shoestrap_header',
      'settings'  => 'shoestrap_logo',
      'priority'  => 2
    )
  ));
  
  // Header Background
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_header_backgroundcolor',
    array(
      'label'     => 'Header Region Background Color',
      'section'   => 'shoestrap_header',
      'settings'  => 'shoestrap_header_backgroundcolor',
      'priority'  => 3
    )
  ));
  
  // Header textcolor
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_header_textcolor',
    array(
      'label'     => 'Header Text Color',
      'section'   => 'shoestrap_header',
      'settings'  => 'shoestrap_header_textcolor',
      'priority'  => 4
    )
  ));

  // Navbar background color
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_navbar_color',
    array(
      'label'     => 'Navbar Color',
      'section'   => 'shoestrap_header',
      'settings'  => 'shoestrap_navbar_color',
      'priority'  => 5
    )
  ));
  
  // Show/Hide the login link
  $wp_customize->add_control( 'shoestrap_header_loginlink', array(
    'label'       => __( 'Show Login/Logout Link', 'shoestrap' ),
    'section'     => 'shoestrap_header',
    'settings'    => 'shoestrap_header_loginlink',
    'type'        => 'select',
    'priority'    => 1,
    'choices'     => array(
      '1'         => __( 'Show', 'shoestrap' ),
      '0'         => __( 'Hide', 'shoestrap' ),
    ),
  ));
  

/*
 * LAYOUT SECTION
 */
 
  // Responsive/Fixed-Width layout
  $wp_customize->add_control( 'shoestrap_responsive', array(
    'label'       => __( 'Responsive / Fixed-width', 'shoestrap' ),
    'section'     => 'shoestrap_layout',
    'settings'    => 'shoestrap_responsive',
    'type'        => 'select',
    'priority'    => 1,
    'choices'     => array(
      '1'         => __( 'Responsive', 'shoestrap' ),
      '0'         => __( 'Fixed-Width', 'shoestrap' ),
    ),
  ));
  
  // Layout selection
  $wp_customize->add_control( 'shoestrap_layout', array(
    'label'       => __( 'Layout', 'shoestrap' ),
    'section'     => 'shoestrap_layout',
    'settings'    => 'shoestrap_layout',
    'type'        => 'select',
    'priority'    => 2,
    'choices'     => array(
      'm'         => __( 'Main only', 'shoestrap' ),
      'mp'        => __( 'Main-Primary', 'shoestrap' ),
      'pm'        => __( 'Primary-Main', 'shoestrap' ),
      'ms'        => __( 'Main-Secondary', 'shoestrap' ),
      'sm'        => __( 'Secondary-Main', 'shoestrap' ),
      'mps'       => __( 'Main-Primary-Secondary', 'shoestrap' ),
      'msp'       => __( 'Main-Secondary-Primary', 'shoestrap' ),
      'pms'       => __( 'Primary-Main-Secondary', 'shoestrap' ),
      'psm'       => __( 'Primary-Secondary-Main', 'shoestrap' ),
      'smp'       => __( 'Secondary-Main-Primary', 'shoestrap' ),
      'spm'       => __( 'Secondary-Primary-Main', 'shoestrap' ),
    ),
  ));
  
  // Primary Sidebar width
  $wp_customize->add_control( 'shoestrap_aside_width', array(
    'label'       => __( 'Primary Sidebar Width', 'shoestrap' ),
    'section'     => 'shoestrap_layout',
    'settings'    => 'shoestrap_aside_width',
    'type'        => 'select',
    'priority'    => 3,
    'choices'     => array(
      '2'         => __( '2/12', 'shoestrap' ),
      '3'         => __( '3/12', 'shoestrap' ),
      '4'         => __( '4/12', 'shoestrap' ),
      '5'         => __( '5/12', 'shoestrap' ),
      '6'         => __( '6/12', 'shoestrap' ),
    ),
  ));
  
  // Secondary Sidebar width
  $wp_customize->add_control( 'shoestrap_secondary_width', array(
    'label'       => __( 'Secondary Sidebar Width', 'shoestrap' ),
    'section'     => 'shoestrap_layout',
    'settings'    => 'shoestrap_secondary_width',
    'type'        => 'select',
    'priority'    => 5,
    'choices'     => array(
      '2'         => __( '2/12', 'shoestrap' ),
      '3'         => __( '3/12', 'shoestrap' ),
      '4'         => __( '4/12', 'shoestrap' ),
    ),
  ));
  
  // Show sidebars on the Home Page
  $wp_customize->add_control( 'shoestrap_sidebar_on_front', array(
    'label'       => __( 'Show sidebars on the Home Page', 'shoestrap' ),
    'section'     => 'shoestrap_layout',
    'settings'    => 'shoestrap_sidebar_on_front',
    'type'        => 'select',
    'priority'    => 6,
    'choices'     => array(
      'show'         => __( 'Show', 'shoestrap' ),
      'hide'         => __( 'Hide', 'shoestrap' )
    ),
  ));
  
  // "Affix" Sidebar (see http://twitter.github.com/bootstrap/javascript.html#affix)
  // $wp_customize->add_control( 'shoestrap_aside_affix', array(
    // 'label'       => __( '"Affix" Sidebar', 'shoestrap' ),
    // 'section'     => 'shoestrap_layout',
    // 'settings'    => 'shoestrap_aside_affix',
    // 'type'        => 'select',
    // 'priority'    => 4,
    // 'choices'     => array(
      // 'normal'    => __( 'Normal', 'shoestrap' ),
      // 'affix'     => __( 'Affix', 'shoestrap' ),
    // ),
  // ));
  
/*
 * TYPOGRAPHY SECTION
 */
  
  // Enter the name of the Webfont to be used
  $wp_customize->add_control( 'shoestrap_google_webfonts', array(
    'label'       => __( 'Google Webfont Name', 'shoestrap' ),
    'section'     => 'shoestrap_typography',
    'settings'    => 'shoestrap_google_webfonts',
    'type'        => 'text',
    'priority'    => 1,
  ));
  
  // Select target of the webfont
  $wp_customize->add_control( 'shoestrap_webfonts_assign', array(
    'label'       => __( 'Apply Webfont to:', 'shoestrap' ),
    'section'     => 'shoestrap_typography',
    'settings'    => 'shoestrap_webfonts_assign',
    'type'        => 'select',
    'priority'    => 2,
    'choices'     => array(
      'sitename'  => __( 'Site Name', 'shoestrap' ),
      'headers'   => __( 'Headers', 'shoestrap' ),
      'all'       => __( 'Everywhere', 'shoestrap' ),
    ),
  ));
  
  
/*
 * GENERAL COLORS AND BACKGROUND SECTION
 */
 
  // Links color
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_background_color',
    array(
      'label'     => 'Background Color',
      'section'   => 'colors',
      'settings'  => 'shoestrap_background_color',
      'priority'  => 1
    )
  ));
  
  // Links color
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_link_color',
    array(
      'label'     => 'Links Color',
      'section'   => 'colors',
      'settings'  => 'shoestrap_link_color',
      'priority'  => 2
    )
  ));
  
  // Buttons color
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_buttons_color',
    array(
      'label'     => 'Buttons Color',
      'section'   => 'colors',
      'settings'  => 'shoestrap_buttons_color',
      'priority'  => 3
    )
  ));

/*
 * HERO SECTION
 */
 
  // Hero region title
  $wp_customize->add_control( 'shoestrap_hero_title', array(
    'label'       => __( 'Title', 'shoestrap' ),
    'section'     => 'shoestrap_hero',
    'settings'    => 'shoestrap_hero_title',
    'type'        => 'text',
    'priority'    => 1
  ));
  
  // Hero Region content
  $wp_customize->add_control( 'shoestrap_hero_content', array(
    'label'       => __( 'Content', 'shoestrap' ),
    'section'     => 'shoestrap_hero',
    'settings'    => 'shoestrap_hero_content',
    'type'        => 'text',
    'priority'    => 2
  ));
  
  // Hero Region Call to action button label
  $wp_customize->add_control( 'shoestrap_hero_cta_text', array(
    'label'       => __( 'Call To Action Button Text', 'shoestrap' ),
    'section'     => 'shoestrap_hero',
    'settings'    => 'shoestrap_hero_cta_text',
    'type'        => 'text',
    'priority'    => 3
  ));
  
  // Hero Region Call to action button link
  $wp_customize->add_control( 'shoestrap_hero_cta_link', array(
    'label'       => __( 'Call To Action Button Link', 'shoestrap' ),
    'section'     => 'shoestrap_hero',
    'settings'    => 'shoestrap_hero_cta_link',
    'type'        => 'text',
    'priority'    => 4
  ));
  
  // Call to action button color
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_hero_cta_color',
    array(
    'label'       => __( 'Call To Action Button Color', 'shoestrap' ),
    'section'     => 'shoestrap_hero',
    'settings'    => 'shoestrap_hero_cta_color',
      'priority'  => 5
    )
  ));

  // Hero region background image
  $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'hero_background',
    array(
      'label'     => __( 'Background', 'shoestrap' ),
      'section'   => 'shoestrap_hero',
      'settings'  => 'shoestrap_hero_background',
      'priority'  => 6
    )
  ));
  
  // Hero region background color
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_hero_background_color',
    array(
      'label'     => 'Hero Region Background Color',
      'section'   => 'shoestrap_hero',
      'settings'  => 'shoestrap_hero_background_color',
      'priority'  => 7
    )
  ));
  
 // Hero region textcolor
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_hero_textcolor',
    array(
      'label'     => 'Hero Region Text Color',
      'section'   => 'shoestrap_hero',
      'settings'  => 'shoestrap_hero_textcolor',
      'priority'  => 8
    )
  ));

  // Visibility of the Hero region (frontpage/site-wide)
  $wp_customize->add_control( 'shoestrap_hero_visibility', array(
    'label'       => __( 'Hero Region Visibility', 'shoestrap' ),
    'section'     => 'shoestrap_hero',
    'settings'    => 'shoestrap_hero_visibility',
    'type'        => 'select',
    'priority'    => 9,
    'choices'     => array(
      'front'     => __( 'Frontpage', 'shoestrap' ),
      'site'      => __( 'Site-Wide', 'shoestrap' ),
    ),
  ));

  
/*
 * FOOTER SECTION
 */
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'shoestrap_footer_background_color',
    array(
      'label'     => 'Footer Background',
      'section'   => 'shoestrap_footer',
      'settings'  => 'shoestrap_footer_background_color',
      'priority'  => 1
    )
  ));

/*
 * SOCIAL LINKS SECTION
 */
 
  // Facebook link
  $wp_customize->add_control( 'shoestrap_facebook_link', array(
    'label'       => __( 'Facebook Page Link', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_facebook_link',
    'type'        => 'text',
    'priority'    => 1,
  ));

  // Twitter link
  $wp_customize->add_control( 'shoestrap_twitter_link', array(
    'label'       => __( 'Twitter URL or @username', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_twitter_link',
    'type'        => 'text',
    'priority'    => 2,
  ));

  // Google+ link
  $wp_customize->add_control( 'shoestrap_google_plus_link', array(
    'label'       => __( 'Google+ Profile Link', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_google_plus_link',
    'type'        => 'text',
    'priority'    => 3,
  ));

  // Pinterest link
  $wp_customize->add_control( 'shoestrap_pinterest_link', array(
    'label'       => __( 'Pinterest Profile Link', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_pinterest_link',
    'type'        => 'text',
    'priority'    => 4,
  ));

  // Facebook share buttons on posts
  $wp_customize->add_control( 'shoestrap_facebook_on_posts', array(
    'label'       => __( 'Share Buttons on Posts: Facebook', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_facebook_on_posts',
    'type'        => 'checkbox',
    'priority'    => 5,
  ));

  // Twitter share buttons on posts
  $wp_customize->add_control( 'shoestrap_twitter_on_posts', array(
    'label'       => __( 'Share Buttons on Posts: Twitter', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_twitter_on_posts',
    'type'        => 'checkbox',
    'priority'    => 6,
  ));

  // Google Plus share buttons on posts
  $wp_customize->add_control( 'shoestrap_gplus_on_posts', array(
    'label'       => __( 'Share Buttons on Posts: Google Plus', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_gplus_on_posts',
    'type'        => 'checkbox',
    'priority'    => 7,
  ));

  // Linkedin share buttons on posts
  $wp_customize->add_control( 'shoestrap_linkedin_on_posts', array(
    'label'       => __( 'Share Buttons on Posts: Linkedin', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_linkedin_on_posts',
    'type'        => 'checkbox',
    'priority'    => 8,
  ));

  // Pinterest share buttons on posts
  $wp_customize->add_control( 'shoestrap_pinterest_on_posts', array(
    'label'       => __( 'Share Buttons on Posts: Pinterest', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_pinterest_on_posts',
    'type'        => 'checkbox',
    'priority'    => 9,
  ));

  // Visibility of the Hero region (frontpage/site-wide)
  $wp_customize->add_control( 'shoestrap_single_social_position', array(
    'label'       => __( 'Location of social shares', 'shoestrap' ),
    'section'     => 'shoestrap_social',
    'settings'    => 'shoestrap_single_social_position',
    'type'        => 'select',
    'priority'    => 10,
    'choices'     => array(
      'top'       => __( 'Top', 'shoestrap' ),
      'bottom'    => __( 'Bottom', 'shoestrap' ),
      'both'      => __( 'Both', 'shoestrap' ),
      'none'      => __( 'None', 'shoestrap' )
    ),
  ));


/*
 * ADVANCED SECTION
 */
 
  // Header scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_head', array(
    'label'       => 'Header Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_head',
    'priority'    => 1,
  )));

  // Footer scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_footer', array(
    'label'       => 'Footer Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_footer',
    'priority'    => 2,
  )));

  $wp_customize -> get_setting( 'blogname' )                -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_title' )    -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_content' )  -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_cta_text' ) -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_cta_text' ) -> transport = 'postMessage';
  $wp_customize -> get_setting( 'background_color' )        -> transport = 'postMessage';
}
add_action( 'customize_register', 'shoestrap_register_controls' );