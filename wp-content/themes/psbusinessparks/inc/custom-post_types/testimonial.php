<?php

$slug = 'testimonial';
$singular_name = 'Testimonials';
$plural_name = 'Testimonial';
$menu_icon = 'dashicons-admin-comments';

$support = array('title', 'editor');

register_post_type($slug, array(
    'label' => $plural_name,
    'show_in_nav_menus' => '1',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'has_archive' => false,
    'rewrite' => array(
        'slug' => $slug.'s',
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

?>