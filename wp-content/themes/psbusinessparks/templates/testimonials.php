<?php
/**
 * Template Name: Testimonials
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */

get_header();
?>

    <div class="page-container">
        <section class="page-path">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <p><a href="<?=home_url()?>">Home</a> / <a href="<?=home_url()?>/about/">About</a> / <span>Testimonials</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials-page">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h1>Testimonials</h1>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $testimonials = get_custom_post_type ( "testimonial", 3 );
                        if ( $testimonials ) {

                            foreach ($testimonials->posts as $key_tax => $post_tax) {
                                $stars = 5;
                                $star_tes = get_field("star-rating", $post_tax->ID);

                                ?>

                                <div class="col-sm-6 col-xs-12 testim-block">
                                    <div class="rating-star-holder">
                                        <span class="rating-stars-<?=$star_tes?> full icon-red icon-large"></span>
                                        <span class="rating-stars-<?=$stars-$star_tes?> full icon-grey icon-large"></span>
                                    </div>

                                    <figure class="testim-content">
                                        <blockquote>
                                            <?=$post_tax->post_content?>
                                        </blockquote>
                                        <figcaption class="attribution">
                                            <b> &#8211&#8211 <?=$post_tax->post_title?></b>
                                            <span><?=get_field( "position", $post_tax->ID)?></span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
<!--                    <div class="col-xs-12 text-center">-->
<!--                        <a href="javascript:;" class="btn red-btn" title="Load More">Load More</a>-->
<!--                    </div>-->
                </div>
            </div>
        </section>

    </div>


<?php
get_footer();
?>