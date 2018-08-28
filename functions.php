<?php

/* Register, enqueue scripts, execute action */
function asuwp_enqueue_scripts() {
    
    wp_register_style( 'divi', get_template_directory_uri() . '/style.css');
    wp_register_style( 'divi-style', get_stylesheet_directory_uri().'/style.css', array('divi'), wp_get_theme()->get('Version'));
    wp_register_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i');
    
    wp_register_script( 'font-awesome-five', get_stylesheet_directory_uri().'/vendor/fontawesome-pro/js/all.js', false, '5.2.0');
    // wp_register_script( 'asu-header', 'https://www.asu.edu/asuthemes/4.6/heads/default.shtml', array() , '4.6', false );
    
    wp_enqueue_style( 'divi' );
    wp_enqueue_style( 'divi-style' );
    wp_enqueue_style( 'roboto-font' );
    
    wp_enqueue_script( 'font-awesome-five' );
    // wp_enqueue_script( 'asu-header' );

}
add_action( 'wp_enqueue_scripts', 'asuwp_enqueue_scripts' );

// Deregister unused Divi theme elements
function asuwp_remove_unused_divi_menus() {
    unregister_nav_menu( 'secondary-menu' );
    unregister_nav_menu( 'footer-menu' );
}
add_action( 'after_setup_theme', 'asuwp_remove_unused_divi_menus', 20 );

// Include customizer additions for ASU Global Header
// Inspired by GIOS theme for WordPress
require get_stylesheet_directory() . '/inc/customizer.php';

// Include additional widgets for Super Footer. Uses Carbon Fields.
add_action( 'after_setup_theme', 'asufse_crb_load_widgets' );
function asufse_crb_load_widgets() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();

    include_once( 'inc/super-footer-widgets.php' );
}

// Load global assets via remote get. Allows for easy access to the version in each of the URLs below.
function asuwp_load_global_head_scripts() {
	$request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/heads/default.shtml');
	$response = wp_remote_retrieve_body( $request );
	echo $response;
}

// Build header parent site name based on customizer settings
function asuwp_load_header_sitenames() {

    if ( is_array( get_option( 'wordpress_asu_theme_options' ) ) ) {
        $cOptions = get_option( 'wordpress_asu_theme_options' );
    }

    if ( isset( $cOptions ) && $cOptions['parent']) {
        // Check box is true. 
        $parent = '<a href="%1$s" id="parent-site">%2$s</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
        $parent = sprintf( $parent, esc_html( $cOptions['parent_url'] ), $cOptions['parent_site_name'] );
    } else {
        $parent = '';
    }
    
    return $parent;
}

// Remote get ASU global header elements. Print site name along with returned code.
function asuwp_load_global_header() {
    $request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/headers/default.shtml');
    $response = wp_remote_retrieve_body( $request );

    $parent = asuwp_load_header_sitenames();

    $response .= '<div id="sitename-wrapper">' . $parent . '<a href="'. get_home_url() . '" title="Home" rel="home" id="current-site">'. get_bloginfo( 'name' ) . '</a></div>';
    echo $response;

}
// Remote get ASU global footer elements.
function asuwp_load_global_footer() {
    $request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/includes/footer.shtml');
    $response = wp_remote_retrieve_body( $request );
    echo $response;
}

// Add custom home icon & menu entry to main nav manu.
function asuwp_add_home_menu_icon ( $items, $args ) {
    if ($args->theme_location == 'primary-menu') {

        if (is_front_page()) {
            $homeicon = '<li id="menu-item-home" class="menu_item current-menu-item">';
        } else {
            $homeicon = '<li id="menu-item-home" class="menu_item">';
        }

        $homeicon .= '<a href="' . get_home_url() . '" title="Home" id="home-icon-main-nav">';
        $homeicon .= '<span class="fa fa-home" aria-hidden="true"></span>';
        $homeicon .= '</a>';
        $homeicon .= '</li>';
        
        $items = $homeicon . $items;
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'asuwp_add_home_menu_icon', 10, 2 );

