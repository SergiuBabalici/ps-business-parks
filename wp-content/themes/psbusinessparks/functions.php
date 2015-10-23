<?php

function roles (){
    $current_user = wp_get_current_user();
    $user_roles = array_shift($current_user->roles);
    return $user_roles;
}
$user_role = roles ();

add_theme_support( 'post-thumbnails' );

function get_all_terms ( $tax, $parent = 0, $order_by = "name", $order = "ASC" ){
    $taxonomies = array(
        $tax,
    );

    $args = array(
        'orderby'           => $order_by,
        'order'             => $order,
        'hide_empty'        => false,
        'parent'            => $parent,
    );

    return get_terms($taxonomies, $args);
}

function get_custom_post_type ( $type, $posts_per_page = -1, $caller_get_posts = 1, $orderby = "post_date", $order = "DESC", $taxonomy = false, $taxonomy_terms = false ) {

    if ( $taxonomy ) {
        if ( $taxonomy_terms == "-" ){
            $operator = "operator";
            $operator_val = "NOT IN";
            $taxonomy_terms = NULL;

            foreach ( get_terms( $taxonomy ) as $value ){
                $taxonomy_terms[] = $value->slug;
            }
        }
        $tax =  array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $taxonomy_terms,
                $operator  => $operator_val,
            ),
        );
    }
    else {
        $tax = NULL;
    }

    $args=array(
        'post_type' => $type,
        'post_status' => 'publish',
        'tax_query' => $tax,
        'posts_per_page' => $posts_per_page,
        'caller_get_posts'=> $caller_get_posts,
        'orderby' => $orderby,
        'order'   => $order
    );

    $query = null;
    $query = new WP_Query($args);

    if( !$query->have_posts() ) {
        return false;
    }
    else {
        return $query;
    }
}

function breadcrumb() {
    if ( !is_front_page() ) {
        echo '<p class="breadcrumb"> <a href="';
        echo get_option('home');
        echo '">';
        echo "HOME";
        echo "</a> &raquo; ";
    }

    if ( is_category() || is_single() ) {
        $category = get_the_category();
        $ID = $category[0]->cat_ID;
        echo get_category_parents($ID, TRUE, ' &raquo; ', FALSE );
    }

    if(is_single() || is_page()) {the_title();}
    if(is_tag()){ echo "Tag: ".single_tag_title('',FALSE); }
    if(is_404()){ echo "404 - Page not Found"; }
    if(is_search()){ echo "Search"; }
    if(is_year()){ echo get_the_time('Y'); }

    echo "</p>";
}


function load_custom_wp_admin_style() {
    wp_enqueue_script( 'Google-Map-Coordonates', get_template_directory_uri().'/js/coordonates.js', array(), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


function debug ( $arr ) {
    echo "<div style='background-color: #000000 !important; color: #00ff00 !important; padding: 15px !important; margin: 15px !important;'>";
    echo "<pre style='background-color: #000000 !important; color: #00ff00 !important;'>";
    print_r($arr);
    echo "</pre>";
    echo "</div>";
}

function theme_name_scripts() {
    wp_enqueue_style( 'Bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );

    wp_enqueue_style( 'Fancybox', get_template_directory_uri()."/css/stylesheets/jquery.fancybox.css" );
    wp_enqueue_style( 'BootstrapDatetimepickerBuild', get_template_directory_uri()."/css/stylesheets/bootstrap-datetimepicker-build.css" );
    wp_enqueue_style( 'BootstrapSelectCustom', get_template_directory_uri()."/css/stylesheets/bootstrap-select-custom.css" );

    wp_enqueue_style( 'screen', get_template_directory_uri()."/css/stylesheets/screen.css" );

    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-1.11.3.min.js', array(), '1.0.0', false );

    wp_enqueue_script( 'jqueryui', get_template_directory_uri() . '/js/vendor/jquery-ui.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Moment', get_template_directory_uri() . '/js/vendor/moment.js', array(), '1.0.0', true );

    wp_enqueue_script( 'Bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array(), '1.0.0', true );

    wp_enqueue_script( 'BootstrapSelect', get_template_directory_uri() . '/js/vendor/bootstrap-select.js', array(), '1.0.0', true );
    wp_enqueue_script( 'BootstrapDatetimepicker', get_template_directory_uri() . '/js/vendor/bootstrap-datetimepicker.js', array(), '1.0.0', true );

    wp_enqueue_script( 'GoogleMapAPI', 'https://maps.googleapis.com/maps/api/js', array(), '1.0.0', true );
    wp_enqueue_script( 'GoogleMap', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Lodash', get_template_directory_uri() . '/js/lodash.min.js', array(), '1.0.0', true );

    wp_enqueue_script( 'Fancybox', get_template_directory_uri() . '/js/fancybox.min.js', array(), '1.0.0', true );

    wp_enqueue_script( 'Main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Ajax', get_template_directory_uri() . '/js/ajax.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Comparison', get_template_directory_uri() . '/js/comparison.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

register_nav_menus( array(
'primary' => __( 'Primary Menu',      'psbbusinessparks' ),
'social'  => __( 'Social Links Menu', 'psbbusinessparks' ),
) );

add_theme_support( 'custom-background', apply_filters( 'psbbusinessparks_custom_background_args', array(
    'default-color'      => $default_color,
    'default-attachment' => 'fixed',
) ) );

function psbbusinessparks_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'psbbusinessparks' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'psbbusinessparks' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'psbbusinessparks_widgets_init' );


function psbbusinessparks_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'psbbusinessparks_scripts' );

wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajaxurl' => admin_url('admin-ajax.php' ) ) );

//** INCLUDE FILE */**//
require_once "inc/custom-post_types/ins.php";

require_once "inc/ajax/schedule.php";


$wp->add_query_var('locations', 'state_slug', 'location_slug');

add_filter('query_vars', 'wpse12965_query_vars');

function wpse12965_query_vars($query_vars) {
    $query_vars[] = 'locations';
    $query_vars[] = 'state_slug';
    $query_vars[] = 'location_slug';
    return $query_vars;
}
add_action('init', 'wpse12065_init');

function wpse12065_init() {
    global $wp_rewrite;

    add_rewrite_rule('locations/([^/]+)$', 'index.php?pagename=locations&state_slug=$matches[1]', 'top');
    add_rewrite_rule('locations/([^/]+)/([^/]+)$', 'index.php?pagename=park-details&state_slug=$matches[1]&location_slug=$matches[2]', 'top');

//    add_rewrite_rule('locations/([^/]+)$', 'index.php?pagename=park-details&plocation_slug=$matches[1]', 'top');

    $wp_rewrite->flush_rules();
}

function request ( $url ){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
}

function get_yahoo_finance () {


    $output = json_decode( request( "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%3D%22PSB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys" ) );

    $array ['LastTradePriceOnly'] = $output->query->results->quote->LastTradePriceOnly;
    $array ['LastTradeTime'] = strtoupper($output->query->results->quote->LastTradeTime);
    $array ['LastTradeDate'] = date( "M d, Y" , strtotime( $output->query->results->quote->LastTradeDate));
    $array ['LastTradeDateValue'] = str_replace( "%", "", $output->query->results->quote->PercentChange );

    if ( strpos( $output->query->results->quote->PercentChange, "+" ) === FALSE ){
        $array ['PercentChange'] = "down";
    }
    else {
        $array ['PercentChange'] = "up";
    }

    return $array;
}
$yahoo_finance = null;

function get_yahoo_finance_header ( ){
    global $yahoo_finance;

    $yahoo_finance = get_yahoo_finance ();

    return $yahoo_finance;
}

function distance($lat1, $lon1, $lat2, $lon2) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;

    return $miles;
}

// http://dev.virtualearth.net/REST/v1/Locations?CountryRegion=US&postalCode=99714&key=Avc92YNdFp6hlBlRQjkSFoRrwOg7qUELxlux2N1XoEDh4VIHwq4fRpNtamE5sdcU
// https://maps.googleapis.com/maps/api/geocode/json?address=99714

function wpa_course_post_link( $post_link, $id = 0 ){
    $post = get_post($id);
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'course' );
        if( $terms ){
            return str_replace( '/%state%' , "" , $post_link );
        }
    }
    return $post_link;
    //return false;
}
add_filter( 'post_type_link', 'wpa_course_post_link', 1, 3 );

/**********************************************************************************************************************/

function exclude_category( $query ) {
    global $user_role;

    $users = wp_get_current_user();
    $region_id = get_field('user_access_to_the_region', 'user_'.$users->data->ID);

    $term = get_term( $region_id, "state" );

    if ( $user_role == "park_admin" and $term ) {

        if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'location' ){

            $taxquery = array(
                array(
                    'taxonomy' => 'state',
                    'field' => 'slug',
                    'terms' => $term->slug
                )
            );

            $query->set('tax_query', $taxquery);
        }

    }
    return $query;
}
add_action( 'pre_get_posts', 'exclude_category' );

/**********************************************************************************************************************/

function pw_loading_scripts_wrong() {
    global $user_role;
    if ( $user_role == "psp_project_manager" ) {
        ?>
        <script type="text/javascript">
            jQuery(".wp-submenu-wrap li:nth-child(3)").css("display", "none");
        </script>
        <?php
    }
}
add_action('admin_footer', 'pw_loading_scripts_wrong');


//add_action( 'admin_menu', 'wpse_59032_remove_acf_menu', 9999 );
//add_action( 'admin_head-edit.php', 'wpse_59032_block_acf_screens' );
//add_action( 'admin_head-custom-fields_page_acf-settings', 'wpse_59032_block_acf_screens' );
//
//function wpse_59032_remove_acf_menu()
//{
//    /* if not our allowed users, hide menu */
//    if ( !current_user_can('delete_plugins') ) {
//        remove_menu_page('edit.php?post_type=acf');
//    }
//}

//function wpse_59032_block_acf_screens()
//{
//    global $current_screen;
//
//    /* not our screen, do nothing */
//    if( 'edit-acf' != $current_screen->id && 'custom-fields_page_acf-settings' != $current_screen->id )
//        return;
//
//    /* if not our allowed users, block access */
//    if ( !current_user_can('delete_plugins') ) {
//        wp_die('message');
//    }
//
//}

include "inc/roles.php";

?>