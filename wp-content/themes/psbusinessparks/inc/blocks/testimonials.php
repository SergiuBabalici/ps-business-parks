<?php
    if ( $wp_query->query_vars['location_slug'] );
?>

<section class="testimonials greyed">
    <div class="wrapper">
        <div class="container-fluid">
            <div>
                <div class="col-md-8 col-md-offset-2">
                    <p class="section-title">See what our customers have to say</p>
                </div>
                <div class="col-md-2 red-link header-link">
                    <a href="javascript:;"><b>See all testimonials</b> <span class="arrow"></span></a>
                </div>
            </div>
            <div class="row">

                <?php
                $testimonials = get_custom_post_type ( "testimonial", 3 );
                if ( $testimonials ) {

                    foreach ($testimonials->posts as $key_tax => $post_tax) {

                        $term = get_field( "select_park" , $post_tax->ID );

                        if ( ( isset($wp_query->query_vars['location_slug']) and $post->ID == $term->ID ) or !isset($wp_query->query_vars['location_slug']) )
                        {

                            $custom_fields = get_post_custom($post_tax->ID);
                            ?>
                            <div class="col-xs-12 col-sm-4 columns <?= ($key_tax & 1) ? 'right' : 'left'; ?>-indicator">
                                <div class="blue-bg">
                                    <div class="stars-rating _<?= $custom_fields['wpcf-star-rating'][0] ?>-star"></div>
                                    <p><?= $post_tax->post_content ?></p>

                                    <div class="author">
                                        <b>&mdash; <?= $post_tax->post_title ?></b><br>
                                        <?= $custom_fields['wpcf-position'][0] ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>