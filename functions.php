<?php

/* Register, enqueue scripts, execute action */
function asuwp_enqueue_scripts() {

    wp_register_style( 'divi', get_template_directory_uri() . '/style.css');
    wp_register_style( 'asu-divi', get_stylesheet_directory_uri().'/style.css', array('divi'), wp_get_theme()->get('Version'));
    wp_register_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0' );
    wp_register_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i');

    // wp_register_script( 'asu-header', 'https://www.asu.edu/asuthemes/4.6/heads/default.shtml', array() , '4.6', false );

    wp_enqueue_style( 'divi' );
    wp_enqueue_style( 'asu-divi' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'roboto-font' );

    // wp_enqueue_script( 'asu-header' );

}
add_action( 'wp_enqueue_scripts', 'asuwp_enqueue_scripts' );

// Load global assets via remote get. Allows for easy access to the version in each of the URLs below.
function asuwp_load_global_head_scripts() {
	$request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/heads/default.shtml');
	$response = wp_remote_retrieve_body( $request );
	echo $response;
}

function asuwp_load_global_header() {
    $request = wp_remote_get('http://www.asu.edu/asuthemes/4.6/headers/default.shtml');
    $response = wp_remote_retrieve_body( $request );
    $response .= '<div class="header__sitename_wrapper"><a href="/" title="Home" rel="home" class="header__sitename">'. get_bloginfo( 'name' ) . '</a></span></div>';
    echo $response;
}

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
