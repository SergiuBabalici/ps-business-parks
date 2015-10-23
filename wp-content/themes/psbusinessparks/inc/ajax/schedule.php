<?php

function scheduler_ajax_request()
{

    $search = trim($_POST['search']);

    if (strlen($search) > 0) {

    $args = array(
        'posts_per_page' => -1,
        'offset' => 0,
        'category' => '',
        'category_name' => '',
        'orderby' => 'date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'location',
        'post_mime_type' => '',
        'post_parent' => '',
        'author' => '',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $posts_array = get_posts($args);

    $total = 0;

    foreach ($posts_array as $value) {

        $verify = 0;

        if (strpos($value->post_title, $search) === FALSE) {
        } else {
            $verify = 1;
            $total++;
            ?>
            <div class="search-block">
                <div class="left-side">
                    <h4><?=$value->post_title?></h4>

                    <p><?= get_field("street", $value->ID) ?></p>

                    <p><?= get_field("city", $value->ID) ?>
                        , <?= get_field("state", $value->ID) ?> <?= get_field("zipcode", $value->ID) ?></p>
                    <span><?= get_field("telephone", $value->ID) ?></span>
                    <a href="javascript:;" class="red-btn schedule-step3" data-toggle="modal" data-target="#step3-modal"
                       title="Schedule a Walk-Through">Schedule a Walk-Through</a>
                </div>
                <div class="right-side">
                    <span>1.3 miles</span>
                    <a href="javascript:;" title="View on map">
                        <span>View on map</span>
                        <span class="icon-map-marker"></span>
                    </a>
                </div>
            </div>
            <?php
        }

        if (strpos(get_field("zipcode", $value->ID), $search) === FALSE) {
        } else {
            if ($verify == 0) {
                $total++;
                ?>
                <div class="search-block">
                    <div class="left-side">
                        <p class="title"><?=$value->post_title?></p>

                        <p><?= get_field("street", $value->ID) ?></p>

                        <p><?= get_field("city", $value->ID) ?>
                            , <?= get_field("state", $value->ID) ?> <?= get_field("zipcode", $value->ID) ?></p>
                        <span><?= get_field("telephone", $value->ID) ?></span>
                        <a href="javascript:;" class="red-btn schedule-step3" data-toggle="modal"
                           data-target="#step3-modal" title="Schedule a Walk-Through">Schedule a Walk-Through</a>
                    </div>
                    <div class="right-side">
                        <span>1.3 miles</span>
                        <a href="javascript:;" title="View on map">
                            <span>View on map</span>
                            <span class="icon-map-marker"></span>
                        </a>
                    </div>
                </div>
                <?php
            }
        }

        }
    }

//    if ( $total < 3 ){
//
//        $dist = 25;
//
//        global $wpdb;
//
//        $search = "91501";
//
//        $results = $wpdb->get_results( 'SELECT * FROM us_cities WHERE zip = '.$search, OBJECT );
//        //debug( $results );
//
//        $lat = $results[0]->lat;
//        $lng = $results[0]->lng;
//
//        //debug($lat);
//        //debug($lng);
//
//        foreach ( $posts_array as $value ){
//
//            //debug($value);
//
//            //debug (get_field( "latitude", $value->ID ));
//            //debug (get_field( "longitude", $value->ID ));
//
//            echo $lat."---".$lng."---".get_field( "latitude", $value->ID )."---".get_field( "longitude", $value->ID );
//
//            $distance = distance( $lat, $lng, get_field( "latitude", $value->ID ), get_field( "longitude", $value->ID ) );
//
//            debug( $distance );
//
//        }
//
//
//        //echo distance( 39.366266, -101.292136, 39.366233, -101.291125 );
//        //curl( "http://dev.virtualearth.net/REST/v1/Locations?CountryRegion=US&postalCode=".$search."&key=Avc92YNdFp6hlBlRQjkSFoRrwOg7qUELxlux2N1XoEDh4VIHwq4fRpNtamE5sdcU" );
//        //curl( "https://maps.googleapis.com/maps/api/geocode/json?address=99714".$search );
//    }







//    <p class="text-center">
//        <a href="javascript:;" title="View More Locations">
//            <span>View More Locations</span>
//            <span class="icon-chevron-right"></span>
//        </a>
//    </p>

    die();
}

add_action( 'wp_ajax_scheduler_ajax_request', 'scheduler_ajax_request' );

?>