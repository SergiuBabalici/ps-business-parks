<?php
/**
 * Template Name: Acquisitions
 */
get_header();
?>
    <div class="page-container customer-marketplace">
        <?php require_once get_template_directory() . "/inc/blocks/breadcrumbs.php"; ?>
        <section class="faqs-page acquisitions-page">
            <div class="wrapper">
                <div class="container-fluid vert-offset-bottom-1">
                    <h1 class="text-center"><?php the_title(); ?></h1>

                    <?= $post->post_content ?>
                    <br>

                    <div class="management-page">
                        <div class="wrapper width_100">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 no-padding">

                                        <div class="directors-block vert-offset-top-1 customer-center centered"
                                             id="officers">

                                            <?php

                                            $faqs = get_field('acquisitions_faqs');
                                            if (!empty($faqs)) {
                                                $i = 1;
                                                foreach ($faqs as $faq) {
                                                    ?>

                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8 management-padding center-block">
                                                        <div class="management-box" data-toggle="modal"
                                                             data-target="#management-modal">
                                                            <div class="description">
                                                                <div class="inner">
                                                                    <p class="js-title">
                                                                        <b><?= str_replace(" ", "<br>", $faq['question']) ?></b>
                                                                    </p>
                                                                    <p class="management-position"></p>
                                                                    <p class="js-title-description hide"><?= htmlspecialchars($faq['answer']) ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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

                    <div class="modal fade" id="management-modal" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <img id="modal-image-management-team" class="img-responsive wrapped-image" src="">
                                    <p class="name"></p>
                                    <p class="management-position"></p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $content = get_field('content');
                    if (!empty($content)):
                        foreach ($content as $key => $item) {
                            ?>
                            <div class="row vert-offset-top-2">

                                <div class="col-sm-5 col-xs-12 <?php echo $item['image_position'] === 'right' ? "pull-right" : ""; ?>">

                                    <?php

                                    if (count($item['images']) > 1) {
                                        ?>
                                        <div class=" trigger-lightbox">
                                            <div id="trigger_carousel_<?php echo $key; ?>"
                                                 class="carousel small-carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">

                                                    <?php
                                                    foreach ($item['images'] as $image_key => $image) {
                                                        ?>
                                                        <div class="item <?php if ($image_key == 0) { ?>active<?php } ?>">
                                                            <img src="<?php echo $image['image']['url']; ?>">
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                                <a class="left carousel-control"
                                                   href="#trigger_carousel_<?php echo $key; ?>" role="button"
                                                   data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left"
                                                          aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control"
                                                   href="#trigger_carousel_<?php echo $key; ?>" role="button"
                                                   data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right"
                                                          aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>

                                                <ol class="carousel-indicators">

                                                    <?php
                                                    foreach ($item['images'] as $image_key => $image) {
                                                        ?>
                                                        <li data-target="#trigger_carousel_<?php echo $key; ?>"
                                                            data-slide-to="<?php echo $image_key; ?>"
                                                            class="<?php if ($image_key == 0) { ?>active<?php } ?>"></li>
                                                        <?php
                                                    }
                                                    ?>

                                                </ol>

                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        if (isset($item['images'][0]['image']['url']) and !empty($item['images'][0]['image']['url'])) {
                                            ?>
                                            <img class="responsive-image"
                                                 src="<?php echo $item['images'][0]['image']['url']; ?>"
                                                 alt="<?php echo create_SEO_alt($item['title']) ?>">
                                            <?php
                                        }
                                    } ?>

                                </div>

                                <div class="col-sm-7 col-xs-12">
                                    <h2><?php echo $item['title'] ?></h2>

                                    <p><?php echo $item['content'] ?></p>
                                    <?php if ($item['park_url'] != ""): ?>
                                        <a href="<?php echo $item['park_url'] ?>" class="blued pull-right"
                                           title="See more details">See more details</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        }
                    endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();
