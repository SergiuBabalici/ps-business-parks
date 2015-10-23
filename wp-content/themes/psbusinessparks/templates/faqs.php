<?php
/**
 * Template Name: FAQs
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */

get_header();
?>

    <div class="page-container benefits">
        <section class="page-path">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <p><a href="<?=home_url()?>">Home</a> / <a href="<?=home_url()?>/about/">About</a> / <a href="<?=home_url()?>/about/careers/">Careers</a> / <b><?=$post->post_title?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-8">
                            <h1><?=get_field( "front_title", $post->ID )?></h1>
                            <p><?=$post->post_content?></p>
                        </div>
                        <div class="col-xs-4">
                            <ul class="list-style list-inline">
                                <li><a href="Javascript:;" title="Print" class="print-icon"></a></li>
                                <li><a href="Javascript:;" title="Email" class="email-icon"></a></li>
                                <li><a href="Javascript:;" title="Share" class="share-icon"></a></li>
                            </ul>
                            <a href="javascript:;" type="button" class="btn red-btn">View Career Opportunities</a>

                            <div class="text-center">
                                <div class="locket greyed">
                                    <div class="amenity-image">
                                        <img src="<?=get_field( "icon", $post->ID )?>">
                                    </div>
                                    <h2><?=get_field( "title", $post->ID )?></h2>
                                    <p><?=get_field( "description", $post->ID )?></p>
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