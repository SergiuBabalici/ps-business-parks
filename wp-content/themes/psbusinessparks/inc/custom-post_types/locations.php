<?php

$slug = 'location';
$singular_name = 'Location';
$plural_name = 'Locations';
$menu_icon = 'dashicons-admin-post';

$support = array('title', 'editor');

register_post_type($slug, array(
    'label' => $plural_name,
    'show_in_nav_menus' => '1',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capabilities' => array(
        'edit_post' => 'edit_location',
        'edit_posts' => 'edit_locations',
        'edit_others_posts' => 'edit_other_locations',
        'publish_posts' => 'publish_locations',
        'read_post' => 'read_location',
        'read_private_posts' => 'read_private_locations',
        'delete_post' => 'delete_location'
    ),
    'map_meta_cap' => true,
    'hierarchical' => false,
    'has_archive' => false,
    'rewrite' => array(
        'slug' => $slug.'s'.'/%state%',
        'with_front' => true
    ),
    'query_var' => true,
    'supports' => $support,
    'menu_icon' => $menu_icon,
    'labels' => array(
        'name' => $plural_name,
        'singular_name' => $singular_name,
        'menu_name' => $plural_name,
        'add_new' => 'Add ' . $singular_name,
        'add_new_item' => 'Add New ' . $singular_name,
        'edit' => 'Edit',
        'edit_item' => 'Edit ' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'view' => 'View ' . $singular_name,
        'view_item' => 'View ' . $singular_name,
        'search_items' => 'Search ' . $plural_name,
        'not_found' => 'No ' . $plural_name . ' Found',
        'not_found_in_trash' => 'No ' . $plural_name . ' Found in Trash',
        'parent' => 'Parent ' . $singular_name,
    )
));


//Add taxonomy
$slug_tax = 'state';
$singular_name = 'State & Region';
$plural_name = 'States & Regions';
$labels = array(
    'name'              => _x( $plural_name, 'taxonomy general name' ),
    'singular_name'     => _x( $singular_name, 'taxonomy singular name' ),
    'search_items'      => __( 'Search '.$plural_name ),
    'all_items'         => __( 'All '.$plural_name ),
    'parent_item'       => __( 'Parent '.$singular_name ),
    'parent_item_colon' => __( 'Parent '.$singular_name.':' ),
    'edit_item'         => __( 'Edit '.$singular_name ),
    'update_item'       => __( 'Update '.$singular_name ),
    'add_new_item'      => __( 'Add New '.$singular_name ),
    'new_item_name'     => __( 'New '.$singular_name.' Name' ),
    'menu_name'         => __( $singular_name ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => $slug_tax ),
//    'capabilities' => array (
//        'manage_terms' => 'park_admin', //by default only admin
//        'edit_terms' => 'park_admin',
//        'delete_terms' => 'administrator',
//        'assign_terms' => 'park_admin'  // means administrator', 'editor', 'author', 'contributor'
//    )
);

register_taxonomy( $slug_tax, array( $slug ), $args );

/**********************************************************************************************************************/
$slug_tax = 'state_location';
$singular_name = 'State & City';
$plural_name = 'States & Citis';
$labels = array(
    'name'              => _x( $plural_name, 'taxonomy general name' ),
    'singular_name'     => _x( $singular_name, 'taxonomy singular name' ),
    'search_items'      => __( 'Search '.$plural_name ),
    'all_items'         => __( 'All '.$plural_name ),
    'parent_item'       => __( 'Parent '.$singular_name ),
    'parent_item_colon' => __( 'Parent '.$singular_name.':' ),
    'edit_item'         => __( 'Edit '.$singular_name ),
    'update_item'       => __( 'Update '.$singular_name ),
    'add_new_item'      => __( 'Add New '.$singular_name ),
    'new_item_name'     => __( 'New '.$singular_name.' Name' ),
    'menu_name'         => __( $singular_name ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => $slug_tax ),
//    'capabilities' => array (
//        'manage_terms' => 'park_admin', //by default only admin
//        'edit_terms' => 'park_admin',
//        'delete_terms' => 'administrator',
//        'assign_terms' => 'park_admin'  // means administrator', 'editor', 'author', 'contributor'
//    )

);

register_taxonomy( $slug_tax, array( $slug ), $args );

/**********************************************************************************************************************/

$slug_tax = 'property_type';
$singular_name = 'Property type';
$plural_name = 'Property types';
$labels = array(
    'name'              => _x( $plural_name, 'taxonomy general name' ),
    'singular_name'     => _x( $singular_name, 'taxonomy singular name' ),
    'search_items'      => __( 'Search '.$plural_name ),
    'all_items'         => __( 'All '.$plural_name ),
    'parent_item'       => __( 'Parent '.$singular_name ),
    'parent_item_colon' => __( 'Parent '.$singular_name.':' ),
    'edit_item'         => __( 'Edit '.$singular_name ),
    'update_item'       => __( 'Update '.$singular_name ),
    'add_new_item'      => __( 'Add New '.$singular_name ),
    'new_item_name'     => __( 'New '.$singular_name.' Name' ),
    'menu_name'         => __( $singular_name ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'meta_box_cb'       => false,
    'rewrite'           => array( 'slug' => $slug_tax ),
);

register_taxonomy( $slug_tax, array( $slug ), $args );


?>