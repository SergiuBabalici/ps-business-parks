<?php
/**
 * Template Name: Referral Program
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */

get_header();
?>
    <div class="page-container refer-page">
        <section class="page-path">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <p><a href="<?=home_url()?>">Home</a> / <a href="<?=home_url()?>/customer-center/">Customer Center</a> / <b>REferral program</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        ?>

        <section class="page-image" style="background-image: url('<?=$image[0]?>');">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class="full-width-text">
                                <h2><?=get_field("title", $post->ID)?></h2>
                                <p><?=get_field("description", $post->ID)?></p>
                                <a href="<?=get_field("url", $post->ID)?>" type="button" class="btn red-btn"><?=get_field("button_title", $post->ID)?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 text-center refer-steps">
                            <h2><?=get_field("title_steps", $post->ID)?></h2>

                            <div class="table equal-height-cells">
                                <div class="table-row">
                                    <?php
                                    foreach ( get_field( "steps", $post->ID ) as $key => $value ) {
                                        ?>
                                        <div class="table-cell column greyed">
                                            <div class="column-header">
                                                <?=$value['header_title']?>
                                            </div>
                                            <div class="column-body">
                                                <div class="amenity-image">
                                                    <img src="<?=$value['icon']?>">
                                                </div>
                                                <h2><?=$value['title']?></h2>

                                                <p><?=$value['description']?></p>
                                            </div>
                                        </div>
                                        <?php
                                        if ( ($key % 2) == 0 ) {
                                            ?>
                                            <div class="table-cell empty-cell">&nbsp;</div>
                                            <?php
                                        }
                                        elseif ( ($key > 0) ){
                                            ?>
                                            </div>
                                            <div class="table-row">
                                                <div class="table-cell empty-cell"></div>
                                                <div class="table-cell empty-cell"></div>
                                                <div class="table-cell empty-cell"></div>
                                            </div>
                                            <div class="table-row">
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <h2>Refer a Friend Today</h2>
                            <div class="table">
                                <div class="table-row">
                                    <div class="form-container text-left">
                                        <?=do_shortcode('[gravityform id="2" title="false" description="true" ajax="true"]')?>
                                    </div>
                                    <div class="table-cell empty">&nbsp;</div>
                                    <div class="greyed form-additional-info text-left">
                                        <p class="title"><?=get_field("title_terms", $post->ID)?></p>
                                        <p><?=get_field("description_terms", $post->ID)?></p>
                                    </div>
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