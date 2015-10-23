<?php
/**
 * Template Name: Customer Feedback
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */

get_header();

//$post = get_post (69);
//echo do_shortcode($post->post_content);

//debug($post);

?>

    <div class="page-container feedback-page">
        <section class="page-path">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <p><a href="<?=home_url()?>">Home</a> / <a href="<?=home_url()?>/customer-center/">Customer Center</a> / <b><?=$post->post_title?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        ?>

        <section class="page-image" style="background-image: url('<?=$image[0]?>');"></section>
        <section class="schedule-section">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <span>Find answers to your questions in our FAQ section</span>
                            <button type="button" class="btn red-btn">Go to faqs</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greyed">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class="full-width-text">
                                <h1><?=$post->post_title?></h1>
                                <?=$post->post_content?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback-form">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table">
                                <div class="table-row">
                                    <div class="form-container">
                                        <p class="title">Give us feedback</p>

                                        <?=do_shortcode('[gravityform id="1" title="false" description="true" ajax="true"]')?>

                                    </div>

                                    <div class="table-cell empty">&nbsp;</div>

                                    <div class="customer-service-data greyed form-additional-info">
                                        <p>
                                            customer service<br>
                                            <span class="phone-nr">800-447-3070</span>
                                        </p>
                                        <p>
                                            customer service email<br>
                                            <a href="javascript:;">info@psbusinessparks.com </a>
                                        </p>
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