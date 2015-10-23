<?php
/**
 * Template Name: Location
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */
get_header();


if ( $wp_query->query_vars['location_slug'] == "state" ) {
    include ( get_template_directory()."/inc/templates/state.php" );
}
else {
    include ( get_template_directory()."/inc/templates/location.php" );
}


get_footer();
?>123