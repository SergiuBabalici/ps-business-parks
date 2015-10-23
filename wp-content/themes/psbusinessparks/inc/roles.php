<?php
function add_theme_caps_user() {
remove_role( 'park_admin' );

add_role( 'park_admin', 'Park Admin' );

$role = get_role( "park_admin" );

    $role->add_cap( 'read' );
    $role->add_cap( 'edit_others_posts' );
    $role->add_cap( 'edit_locations' );
    $role->add_cap( 'edit_other_locations' );
    $role->add_cap( 'edit_publish_location' );
    $role->add_cap( 'edit_publish_locations' );
    $role->add_cap( 'publish_location' );
    $role->add_cap( 'publish_locations' );
    $role->add_cap( 'read_location' );
    $role->add_cap( 'read_private_locations' );

    $role->add_cap( 'edit_published_posts' );
    }
add_action( 'admin_init', 'add_theme_caps_user');

/**********************************************************************************************************************/

function add_theme_caps() {
    // gets the administrator role
    $admins = get_role( 'administrator' );

//    debug($admins);

    $admins->add_cap( 'edit_location' );
    $admins->add_cap( 'edit_locations' );
    $admins->add_cap( 'edit_other_locations' );
    $admins->add_cap( 'publish_locations' );
    $admins->add_cap( 'read_location' );
    $admins->add_cap( 'read_private_locations' );
    $admins->add_cap( 'delete_location' );

    $admins->add_cap( 'edit_others_posts' );
    $admins->add_cap( 'edit_others_location' );
    $admins->add_cap( 'edit_others_locations' );
}
add_action( 'admin_init', 'add_theme_caps');

?>