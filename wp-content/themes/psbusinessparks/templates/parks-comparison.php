<?php
/**
 * Template Name: Parks Comparison
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */

$park_id = trim($_GET['park_id']);
$suit_id = trim($_GET['suit_id']);
if ( !ctype_digit($park_id) ) { die( "Park ID Error" ); }

get_header();

$post = get_post( $park_id );
?>

<div class="page-container park-comparison">
    <section class="page-path">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p><a href="javascript:;"><span class="icon-triangle-left"></span><b>BACK TO PARK DETAIL</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-split2">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-8">
                        <h1><?=$post->post_title?> | Suite Comparison</h1>
                        <p><?=$post->post_content?></p>
                    </div>
                    <div class="col-xs-4 call-us text-center">
                        <p><b>CALL US TODAY</b><strong><?=get_field( "telephone", $post->ID )?></strong></p>
                        <button type="button" class="btn red-btn">Schedule a Walk-through</button>
                        <div>
                            <div class="amenity-image">
                                <img src="<?=get_template_directory_uri()?>/images/amenities/print.png" alt="">
                            </div>
                            <div class="amenity-image">
                                <img src="<?=get_template_directory_uri()?>/images/amenities/email.png" alt="">
                            </div>
                            <div class="amenity-image">
                                <img src="<?=get_template_directory_uri()?>/images/amenities/share.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="compare-table">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table">
                            <div class="table-row">

                                <?php
                                $suits = explode( ",", $suit_id );

                                $suite = get_field( "suite", $post->ID );

                                foreach ( $suite as $key => $value ) {
                                    if ( in_array($value['id_suite'], $suits) ) {
                                        ?>

                                        <div class="table-cell">
                                            <div id="myCarousel1" class="carousel small-carousel slide"
                                                 data-ride="carousel">
                                                <div class="carousel-inner">

                                                    <?php
                                                    $items=null;
                                                    foreach ( $value['suite_image'] as $key_image => $value_image ) {
                                                        $active = ($key_image==0)?"active":"";
                                                        ?>

                                                        <div class="item <?=$active?>">
                                                            <img src="<?=$value_image['image']?>" style="width:100%"
                                                                 alt="">
                                                        </div>
                                                        <?php
                                                        $items .= '<li data-target="#myCarousel1" data-slide-to="0" class="'.$active.'"></li>';
                                                    }
                                                    ?>

                                                </div>
                                                <ol class="carousel-indicators">
                                                    <?=$items?>
                                                </ol>
                                            </div>
                                            <p class="title"><b>Suite <?=$value['id_suite']?></b></p>

                                            <p class="subtitle">
                                                <b>SQUARE FOOTAGE:</b> <?=$value['square_feet']?> <br>
                                                <b>PROPERTY TYPE:</b>
                                                <?php $term = get_term( $value['type'], "property_type");?>
                                                <?=$term->name?>
                                                <br>
                                            </p>
                                            <ul class="info-list">
                                                <?php
                                                foreach ( $value['options'] as $value_options ){
                                                    ?>
                                                    <li><?=$value_options['item']?></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <?=($key != 2)?'<div class="table-cell empty-cell">&nbsp;</div>':''?>
                                        <?php
                                    }
                                }
                                ?>

                            </div>

                            <div class="table-row">

                                <?php
                                foreach ( $suite as $key => $value ) {
                                    if ( in_array($value['id_suite'], $suits) ) {
                                        ?>
                                        <div class="table-cell"><p><?= $value['description'] ?></p></div>
                                        <?= ($key != 2) ? '<div class="table-cell empty-cell">&nbsp;</div>' : '' ?>
                                        <?php
                                    }
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
get_footer();
?>
