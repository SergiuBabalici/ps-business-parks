<?php

//global $wp_query;
//$wp_query->set_404();
//status_header( 404 );
//get_template_part( 404 ); exit();


$args = array(
    'name'        => $wp_query->query_vars['location_slug'],
    'post_type'   => 'location',
    'post_status' => 'publish',
    'numberposts' => 1
);
$post = get_posts($args);
get_posts($wp_query->query_vars['location_slug']);

$post = $post[0];
?>

<script type="text/javascript">
    var coords = [
        {
            lat:'<?=get_field("latitude", $post->ID)?>',
            long: '<?=get_field("longitude", $post->ID)?>',
            desc: '' +
            '<div class="maps-infobox">' +
            '<p class="maps-place-title"><?=$post->post_title?></p>' +
            '<p class="maps-place-info">'+
            '<?=get_field( "street", $post->ID)?><br>' +
            '<?=get_field( "city", $post->ID)?>, <?=get_field( "state", $post->ID)?> <?=get_field( "zipcode", $post->ID)?>' +
            '</p>' +
            '<button type="button" class="btn red-btn"><b>Get Directions</b></button>' +
            '</div>'
        }
    ];
</script>

<div class="page-container park-details">
    <section class="page-path">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p><a href="<?=home_url()?>">Home</a> / <a href="javascript:;">Locations</a> / <a href="javascript:;">southern california</a> / <span><?=$post->post_title?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-description page-split">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table">
                            <div class="table-row">
                                <div class="table-cell left-part">
                                    <h1><?=$post->post_title?></h1>
                                    <p><?=$post->post_content?></p>

                                    <p class="call-us">CALL US TODAY &nbsp;<strong><?=get_field("telephone", $post->ID)?></strong></p>
                                    <button type="button" class="btn red-btn">Schedule a Walk-through</button>
                                </div>
                                <div class="table-cell right-part slideshow-container">
                                    <div class="inner-slideshow">
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                $carusel = NULL;
                                                foreach ( get_field( "slider", $post->ID ) as $key => $value ) {
                                                    $active = ($key==0)?"active":"";
                                                    if ( pathinfo($value['image_video'], PATHINFO_EXTENSION) == "mp4" ){
                                                        ?>
                                                        <div class="item <?=$active?>">
                                                            <div class="video-container">
                                                                <div class="playVideoCover">
                                                                    <div class="playVideoButton"></div>
                                                                </div>
                                                                <video>
                                                                    <source src="<?=$value['image_video']?>" type="video/mp4">
                                                                    Your browser does not support HTML5 video.
                                                                </video>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <div class="item <?=$active?>">
                                                            <img src="<?=$value['image_video']?>" style="width:100%">
                                                        </div>
                                                        <?php
                                                    }
                                                    $carusel .= '<li data-target="#myCarousel" data-slide-to="'.$key.'" class="'.$active.'"></li>';
                                                }
                                                ?>
                                            </div>
                                            <ol class="carousel-indicators">
                                                <?=$carusel?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="park-info page-split greyed">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table">
                            <div class="table-row">
                                <div class="table-cell left-part">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="park-title">
                                                <p class="title"><b><?=$post->post_title?></b></p>
                                                <h2 class="subtitle">
                                                    <?=get_field('street', $post->ID)?><br>
                                                    <?=get_field('city', $post->ID)?>, <?=get_field('state', $post->ID)?> <?=get_field('zipcode', $post->ID)?>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="info-cell">
                                                <p class="title"><b>Leasing Contact</b></p>
                                                <?php
                                                foreach ( get_field( "leasing_contact", $post->ID ) as $value ){
                                                    ?>
                                                    <a class="person-contact"
                                                       data-content='<p class="title"><b><?=$value['name']?></b></p>P: <?=$value['phone']?> <br> F: <?=$value['fax']?> <br><a role="button" class="btn red-btn" href="mailto:<?=$value['email']?>"><b>Email</b></a>'
                                                       role="button" tabindex="0"><?=$value['name']?></a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="info-cell">
                                                <p class="title"><b>Property Management Contact</b></p>
                                                <?php
                                                foreach ( get_field( "property_management_contact", $post->ID ) as $value ){
                                                    ?>
                                                    <a class="person-contact"
                                                       data-content='<p class="title"><b><?=$value['name']?></b></p>P: <?=$value['phone']?> <br> F: <?=$value['fax']?> <br><a role="button" class="btn red-btn" href="mailto:<?=$value['email']?>"><b>Email</b></a>'
                                                       role="button" tabindex="0"><?=$value['name']?></a>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="info-cell">
                                                <p class="title"><b>Amenities</b></p>
                                                <div class="amenities">
                                                    <div class="table">

                                                        <div class="table-row">
                                                            <?php
                                                            $i==0;
                                                            foreach ( get_field('amenities', $post->ID) as $key => $value ) {
                                                            ?>
                                                            <div class="table-cell">
                                                                <div class="amenity-image">
                                                                    <img src="<?=$value['icon']?>" alt="<?=$value['title']?>">
                                                                </div>
                                                                <span><?=$value['title']?></span>
                                                            </div>
                                                            <?php
                                                            if ( $i & 1 and $i>0 ){
                                                            ?>
                                                        </div><div class="table-row">
                                                            <?php
                                                            }
                                                            $i++;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-cell right-part">
                                    <div id="map"></div>

                                    <ul class="info-list">
                                        <?php
                                        foreach ( get_field( "options", $post->ID ) as $value_option ) {
                                            ?>
                                            <li><?=$value_option['item']?></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="available-space">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2>Available space</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="locator">
                            <div class="top-fields">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="form-inline">
                                            <div class="form-inputs">
                                                <div class="form-group has-feedback">
                                                    <label class="sr-only" for="propertyType">Property type</label>
                                                    <select class="form-control" id="propertyType">
                                                        <option value="" disabled selected style='display:none;'>View: All properties types</option>
                                                        <?php
                                                        $property_type = get_all_terms('property_type');
                                                        foreach ( $property_type as $key =>$value ){
                                                            ?>
                                                            <option value="<?= $value->slug ?>"><?= $value->name ?></option>
                                                            <?php
                                                        }
                                                        ?>                                                    </select>
                                                    <span class="icon-triangle-down form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label class="sr-only" for="squareFootage">Square Footage</label>
                                                    <select class="form-control" id="squareFootage">
                                                        <option value="" disabled selected style='display:none;'>Square footage: 1,000 - 2,500</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    <span class="icon-triangle-down form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 text-right actionable">
                                        <span class="info">Select up to 3 suites to compare</span>
                                        <input type="hidden" name="park_id" value="<?=$post->ID?>">
                                        <button type="button" class="btn red-btn compare disabled"><b>Compare</b></button>
                                    </div>
                                </div>
                            </div>
                            <div class="table location-spaces">
                                <div class="table-header-group">
                                    <div class="table-row">
                                        <div class="table-cell table-suite">Suite</div>
                                        <div class="table-cell table-description">Description</div>
                                        <div class="table-cell table-square-feet">Square feet</div>
                                        <div class="table-cell table-type">Type</div>
                                        <div class="table-cell table-select">Select</div>
                                    </div>
                                    <div class="table-row empty-row"></div>
                                </div>
                                <div class="table-row-group">
                                    <?php

                                    foreach ( get_field("suite", $post->ID) as $value ) {
                                        ?>
                                        <div class="table-row">
                                            <div class="table-cell">
                                                <div id="myCarousel1" class="carousel small-carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php
                                                        $carusel = NULL;
                                                        foreach ( $value['suite_image'] as $key_image => $value_image ){
                                                            $active = ($key_image==0)?"active":"";
                                                            ?>
                                                            <div class="item <?=$active?>">
                                                                <img src="<?=$value_image['image']?>" style="width:100%" alt="">
                                                            </div>
                                                            <?php
                                                            $carusel .= '<li data-target="#myCarousel1" data-slide-to="'.$key_image.'" class="'.$active.'"></li>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <ol class="carousel-indicators">
                                                        <?=$carusel?>
                                                    </ol>
                                                </div>
                                                <p class="space-nr"><?=$value['id_suite']?></p>
                                            </div>
                                            <div class="table-cell"><?=$value['description']?></div>
                                            <div class="table-cell"><?=$value['square_feet']?></div>
                                            <div class="table-cell">
                                                <?php $term = get_term( $value['type'], "property_type");?>
                                                <?=$term->name?>
                                            </div>
                                            <div class="table-cell greyed select-box">
                                                <input type="checkbox" name="space" value="<?=$value['id_suite']?>">
                                                <label></label>
                                            </div>
                                        </div>

                                        <div class="table-row empty-row"></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php ////TESTIMONIALS ?>
    <?php include get_template_directory()."/inc/blocks/testimonials.php" ; ?>

    <section class="meet-the-team">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="col-md-12 text-center">
                    <h2>Meet the team</h2>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <img src="<?=get_field( "image_meet_the_team", $post->ID )?>" alt="">
                    </div>
                    <div class="col-xs-6">
                        <p class="title"><b><?=get_field( "title_meet_the_team", $post->ID )?></b></p>
                        <p><?=get_field( "description_meet_the_team", $post->ID )?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_yahoo_finance(); ?>

    <section class="location-services greyed">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2 class="section-title">Services at this location</h2>
                    </div>
                </div>
                <div class="text-center same-height-container">
                    <?php
                    foreach ( get_field( "services_at_this_location" , $post->ID ) as $value_service ){
                        ?>
                        <div class="same-height-column columns bordered-column">
                            <div class="amenity-image">
                                <img src="<?=$value_service['icon']?>" alt="">
                            </div>
                            <h3 class="title">
                                <b><?=$value_service['name']?></b>
                            </h3>
                            <p><?=$value_service['description']?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2>Additional services</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="columns additional bordered-column">
                            <div class="row">
                                <?php
                                foreach ( get_field( "additional_services" , $post->ID ) as $value_service ){
                                    ?>
                                    <div class="col-xs-6 col-md-3 text-center">
                                        <div class="amenity-image">
                                            <img src="<?=$value_service['icon']?>" alt="">
                                        </div>
                                        <p class="title">
                                            <b><?=$value_service['name']?></b>
                                        </p>
                                        <p><?=$value_service['description']?></p>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
include ( get_template_directory()."/inc/blocks/schedule-section.php" );
?>
