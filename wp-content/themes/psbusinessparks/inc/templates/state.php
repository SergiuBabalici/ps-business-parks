<?php

$post = get_post (333);

//debug($post);

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>

<div class="page-container park-state">
    <section class="page-path">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p><a href="<?=home_url()?>">Home</a> / <a href="<?=home_url()?>/search-locations/">Locate a park</a> / <b>State</b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-image" style="background-image: url('<?=$image[0]?>');">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="finder">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h1>Find your new business or office space</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="form-inline" method="get" action="/search-locations/">
                                <div class="form-inputs">
                                    <div class="form-group">
                                        <label class="sr-only" for="propertyType">Property type</label>
                                        <select class="form-control" name="type" id="propertyType">
                                            <option value="" disabled selected style='display:none;'>Property type</option>
                                            <?php
                                            $property_type = get_all_terms('property_type');
                                            foreach ( $property_type as $key =>$value ){
                                                ?>
                                                <option value="<?= $value->slug ?>"><?= $value->name ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="cityOrZipCode">City, state, or zip code</label>
                                        <input type="text" id="cityOrZipCode" name="locations" class="form-control" placeholder="City, state, or zip code">
                                    </div>
                                </div>
                                <button type="submit" class="btn red-btn"><b>Find properties</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="state-table">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <div class="full-width-text">
                            <?=$post->post_content?>
                        </div>
                    </div>
                </div>
                <div class="row column-grid-3">
                    <?php
                    $state_location = get_all_terms('state_location');
                    foreach ( $state_location as $value ) {
                        ?>
                        <div class="col-xs-6 col-sm-4 column-grid-3-cell">
                            <img src="<?=get_field('image', 'state_location_'.$value->term_id)?>" alt="">

                            <h2><?=$value->name?></h2>
                            <h3>Donec Ultricies</h3>
                            <h3>Egetattis</h3>
                            <h3>Malaceratiat</h3>
                            <h3>Pellentesque</h3>
                            <h3>Aliquamsoll</h3>
                            <h3>Tempor</h3>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>